<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function phone(Request $request, string $slug)
    {
        $product = Product::where('slug', $slug)
            ->where('type', 'phone')
            ->where('is_active', true)
            ->firstOrFail();

        $content = collect($product->content ?? []);

        return view('pages.product-phone-detail', compact('product', 'content'));
    }

    public function watch(Request $request, string $slug)
    {
        $product = Product::where('slug', $slug)
            ->where('type', 'watch')
            ->where('is_active', true)
            ->firstOrFail();

        $content = collect($product->content ?? []);

        return view('pages.product-watch-detail', compact('product', 'content'));
    }

    public function headphone(Request $request, string $slug)
    {
        $product = Product::where('slug', $slug)
            ->where('type', 'headphone')
            ->where('is_active', true)
            ->firstOrFail();

        $content = collect($product->content ?? []);

        return view('pages.product-headphone-detail', compact('product', 'content'));
    }
}
