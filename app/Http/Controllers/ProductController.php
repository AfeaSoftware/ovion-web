<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    public function phone(Request $request, string $slug)
    {
        return $this->show($slug, 'phone', 'pages.product-phone-detail');
    }

    public function watch(Request $request, string $slug)
    {
        return $this->show($slug, 'watch', 'pages.product-watch-detail');
    }

    public function headphone(Request $request, string $slug)
    {
        return $this->show($slug, 'headphone', 'pages.product-headphone-detail');
    }

    private function show(string $slug, string $type, string $view)
    {
        $locale = App::getLocale();

        $product = Product::query()
            ->where(fn ($q) => $q
                ->where('slug->'.$locale, $slug)
                ->orWhere('slug->tr', $slug)
                ->orWhere('slug->en', $slug)
            )
            ->where('type', $type)
            ->where('is_active', true)
            ->firstOrFail();

        $content = collect($product->content ?? []);

        $compatibleAccessories = $product->accessories()
            ->where('is_active', true)
            ->with('media')
            ->orderBy('order')
            ->get();

        return view($view, compact('product', 'content', 'compatibleAccessories'));
    }
}
