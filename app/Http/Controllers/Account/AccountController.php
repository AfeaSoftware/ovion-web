<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $carts = $user ? $user->carts()->with('items.product')->latest()->get() : collect();

        return view('pages.account.index', compact('user', 'carts'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        abort_unless($user, 401);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => ['required', 'string', 'max:30'],
        ]);

        $user->fill($data)->save();

        return back()->with('status', 'Bilgilerin güncellendi.');
    }
}
