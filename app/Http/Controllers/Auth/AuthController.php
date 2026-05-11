<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('pages.account.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'phone' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $sessionId = $request->session()->getId();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        $this->mergeGuestCart($sessionId, $user->id);

        return redirect($this->afterAuthRedirect());
    }

    public function showLogin()
    {
        return view('pages.account.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $sessionId = $request->session()->getId();

        if (! Auth::attempt($credentials, (bool) $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'E-posta veya şifre hatalı.'])->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        $this->mergeGuestCart($sessionId, Auth::id());

        return redirect($this->afterAuthRedirect());
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect($this->homeRoute());
    }

    /**
     * Bind any open guest cart (matched by session_id) to the authenticated user.
     * Existing user cart absorbs the guest items, then the guest cart is removed.
     */
    private function mergeGuestCart(string $sessionId, int $userId): void
    {
        $guestCart = Cart::where('status', 'open')
            ->where('session_id', $sessionId)
            ->whereNull('user_id')
            ->first();

        if (! $guestCart) {
            return;
        }

        $userCart = Cart::where('status', 'open')
            ->where('user_id', $userId)
            ->where('id', '!=', $guestCart->id)
            ->first();

        if (! $userCart) {
            $guestCart->user_id = $userId;
            $guestCart->session_id = null;
            $guestCart->save();

            return;
        }

        foreach ($guestCart->items as $guestItem) {
            $existing = $userCart->items()->where('product_id', $guestItem->product_id)->first();
            if ($existing) {
                $existing->quantity += $guestItem->quantity;
                $existing->save();
            } else {
                $userCart->items()->create([
                    'product_id' => $guestItem->product_id,
                    'quantity' => $guestItem->quantity,
                    'snapshot_name' => $guestItem->snapshot_name,
                    'snapshot_price' => $guestItem->snapshot_price,
                ]);
            }
        }

        $guestCart->delete();
    }

    private function afterAuthRedirect(): string
    {
        $isEn = request()->segment(1) === 'en';
        $userId = Auth::id();

        // Pending product (guest tried to add to cart before auth) — push it now.
        $pendingSlug = session()->pull('pending_cart_product');
        $pendingQty = (int) (session()->pull('pending_cart_quantity', 1));

        if ($pendingSlug) {
            $product = Product::where('slug', $pendingSlug)->first();
            if ($product) {
                $cart = Cart::firstOrCreate(
                    ['user_id' => $userId, 'status' => 'open'],
                    ['session_id' => null],
                );

                $item = $cart->items()->where('product_id', $product->id)->first();
                if ($item) {
                    $item->quantity += $pendingQty;
                    $item->save();
                } else {
                    $cart->items()->create([
                        'product_id' => $product->id,
                        'quantity' => $pendingQty,
                        'snapshot_name' => is_array($product->name) ? ($product->name['tr'] ?? '') : (string) $product->name,
                        'snapshot_price' => $product->priceLabel(),
                    ]);
                }
            }

            return $isEn ? route('en.cart.index') : route('cart.index');
        }

        $intended = session()->pull('url.intended');
        if ($intended && ! str_contains($intended, '/sepet/ekle/') && ! str_contains($intended, '/cart/add/')) {
            return $intended;
        }

        $cart = Cart::where('status', 'open')->where('user_id', $userId)->first();
        if ($cart) {
            return $isEn ? route('en.cart.index') : route('cart.index');
        }

        return $isEn ? route('en.account') : route('account');
    }

    private function homeRoute(): string
    {
        $isEn = request()->segment(1) === 'en';

        return $isEn ? route('en.home') : route('home');
    }
}
