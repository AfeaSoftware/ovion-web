<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\PageContent;
use App\Models\Product;
use Illuminate\Support\Facades\App;

class AccessoriesController extends Controller
{
    public function index()
    {
        $content = PageContent::contentFor('accessories', App::getLocale());

        $accessories = Accessory::active()
            ->ordered()
            ->with('media', 'products:id,type')
            ->get();

        $spotlight = Accessory::active()
            ->spotlight()
            ->with('media', 'products:id,type')
            ->first();

        $compatProducts = Product::active()
            ->ordered()
            ->whereHas('accessories', fn ($q) => $q->where('is_active', true))
            ->with('media')
            ->get();

        return view('pages.aksesuarlar', compact('content', 'accessories', 'compatProducts', 'spotlight'));
    }

    public function show(string $slug)
    {
        $locale = App::getLocale();

        $accessory = Accessory::active()
            ->where(fn ($q) => $q
                ->where('slug->'.$locale, $slug)
                ->orWhere('slug->tr', $slug)
                ->orWhere('slug->en', $slug)
            )
            ->with(['media', 'products' => fn ($q) => $q->where('is_active', true)])
            ->firstOrFail();

        return view('pages.aksesuar-detay', compact('accessory'));
    }
}
