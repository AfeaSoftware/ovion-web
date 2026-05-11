<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->resolveCart(false);
        $cart?->load('items.product');

        return view('pages.cart.index', [
            'cart' => $cart,
            'items' => $cart?->items ?? collect(),
        ]);
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => ['nullable', 'integer', 'min:1', 'max:50'],
        ]);

        // Require auth — this prevents guest/duplicate-customer accounts.
        if (! Auth::check()) {
            session()->put('pending_cart_product', $product->slug);
            session()->put('pending_cart_quantity', (int) ($request->input('quantity') ?? 1));

            return redirect()->route(request()->segment(1) === 'en' ? 'en.register' : 'register')
                ->with('status', __('ui.cart_login_required'));
        }

        $cart = $this->resolveCart(true);
        $quantity = (int) ($request->input('quantity') ?? 1);

        $item = $cart->items()->where('product_id', $product->id)->first();
        if ($item) {
            $item->quantity += $quantity;
            $item->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'snapshot_name' => is_array($product->name) ? ($product->name['tr'] ?? '') : (string) $product->name,
                'snapshot_price' => $product->priceLabel(),
            ]);
        }

        return redirect()->route(request()->segment(1) === 'en' ? 'en.cart.index' : 'cart.index')
            ->with('status', 'Ürün sepete eklendi.');
    }

    public function update(Request $request, int $itemId)
    {
        $cart = $this->resolveCart(false);
        if (! $cart) {
            return back();
        }

        $item = $cart->items()->findOrFail($itemId);
        $quantity = (int) $request->input('quantity', 1);

        if ($quantity <= 0) {
            $item->delete();
        } else {
            $item->quantity = min(50, $quantity);
            $item->save();
        }

        return back()->with('status', 'Sepet güncellendi.');
    }

    public function remove(int $itemId)
    {
        $cart = $this->resolveCart(false);
        if ($cart) {
            $cart->items()->where('id', $itemId)->delete();
        }

        return back()->with('status', 'Ürün sepetten kaldırıldı.');
    }

    public function submit(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route(request()->segment(1) === 'en' ? 'en.login' : 'login')
                ->with('status', 'Sepeti tamamlamak için giriş yap.');
        }

        $cart = $this->resolveCart(false);
        if (! $cart || $cart->items()->count() === 0) {
            return back()->with('status', 'Sepetin boş.');
        }

        $cart->status = 'submitted';
        $cart->submitted_at = now();
        $cart->user_id = Auth::id();
        $cart->save();

        return redirect()->route(request()->segment(1) === 'en' ? 'en.cart.index' : 'cart.index')
            ->with('status', 'Talebiniz alındı. En kısa sürede sizinle iletişime geçeceğiz.');
    }

    private function resolveCart(bool $createIfMissing): ?Cart
    {
        $sessionId = session()->getId();
        $userId = Auth::id();

        $cart = Cart::query()
            ->where('status', 'open')
            ->where(function ($q) use ($userId, $sessionId): void {
                if ($userId) {
                    $q->where('user_id', $userId);
                } else {
                    $q->where('session_id', $sessionId);
                }
            })
            ->latest()
            ->first();

        if (! $cart && $createIfMissing) {
            $cart = Cart::create([
                'user_id' => $userId,
                'session_id' => $userId ? null : $sessionId,
                'status' => 'open',
            ]);
        }

        if ($cart && $userId && $cart->user_id === null) {
            $cart->user_id = $userId;
            $cart->session_id = null;
            $cart->save();
        }

        return $cart;
    }
}
