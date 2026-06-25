<?php

namespace App\Http\Controllers;

use Afea\Cms\Blog\Models\BlogPost;
use App\Filament\Resources\AccessoryResource;
use App\Filament\Resources\ProductResource;
use App\Models\Accessory;
use App\Models\PageContent;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class HomePageController extends Controller
{
    public function index()
    {
        $latestPosts = BlogPost::published()
            ->with(['category', 'media'])
            ->latest('published_at')
            ->limit(3)
            ->get();

        $content = PageContent::contentFor('home', App::getLocale());
        $heroes = collect($content?->get('home_hero') ?? []);

        $cheapestPrice = Product::active()
            ->whereNotNull('price')
            ->orderBy('price')
            ->value('price');

        $startingFromLabel = $cheapestPrice !== null
            ? '₺'.number_format((float) $cheapestPrice, 2, ',', '.')
            : null;

        $showcaseProducts = Product::active()
            ->orderByRaw("CASE WHEN type = 'phone' THEN 0 ELSE 1 END")
            ->orderByDesc('is_spotlight')
            ->orderBy('order')
            ->with('media')
            ->limit(12)
            ->get();

        $showcaseAccessories = Accessory::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->with('media')
            ->get()
            ->groupBy('category')
            ->flatMap(fn ($items) => $items->take(2))
            ->values();

        $productTypes = Product::active()->orderBy('id')->pluck('type')->unique()->filter()->values();
        $accessoryCategories = Accessory::query()->where('is_active', true)->orderBy('id')->pluck('category')->unique()->filter()->values();

        $showcaseTabs = $this->buildShowcaseTabs($productTypes, $accessoryCategories);

        return view('pages.home', compact(
            'heroes',
            'latestPosts',
            'content',
            'startingFromLabel',
            'showcaseProducts',
            'showcaseAccessories',
            'showcaseTabs',
        ));
    }

    /**
     * @param  Collection<int, string>  $productTypes
     * @param  Collection<int, string>  $accessoryCategories
     * @return array<string, string>
     */
    private function buildShowcaseTabs($productTypes, $accessoryCategories): array
    {
        $productLabels = ProductResource::typeOptions();
        $accessoryLabels = AccessoryResource::categoryOptions();

        $tabs = [];

        foreach ($productTypes as $type) {
            $tabs[$type] = $productLabels[$type] ?? $type;
        }

        foreach ($accessoryCategories as $category) {
            $tabs[$category] = $accessoryLabels[$category] ?? $category;
        }

        return $tabs;
    }
}
