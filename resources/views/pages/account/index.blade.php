@extends('main')

@section('title', __('ui.account_title'))
@section('theme', 'dark')

@push('styles')
<style>
  .ac-page { max-width: 880px; margin: 0 auto; padding: 64px 24px; }
  .ac-page h1 { font-size: clamp(28px, 4vw, 40px); margin: 0 0 32px; letter-spacing: -0.02em; }
  .ac-card { padding: 28px; border: 1px solid var(--line-2); border-radius: 12px; margin-bottom: 24px; }
  .ac-card h2 { font-size: 20px; margin: 0 0 16px; font-weight: 500; }
  .ac-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
  @media (max-width: 600px) { .ac-form-row { grid-template-columns: 1fr; } }
  .ac-form-row label { display:block; font-size: 13px; color: var(--muted); margin-bottom: 6px; }
  .ac-form-row input { width: 100%; padding: 10px 14px; border: 1px solid var(--line); border-radius: 8px; background: transparent; color: var(--ink); font-size: 14px; }
  .ac-form-row input:focus { outline: 2px solid var(--accent); outline-offset: 1px; }
  .ac-status { padding: 12px 16px; background: rgba(48,209,88,0.08); border: 1px solid rgba(48,209,88,0.4); border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
  .ac-cart-item { display:flex; gap:12px; align-items:center; padding: 12px 0; border-bottom: 1px solid var(--line-2); font-size: 14px; }
  .ac-cart-item:last-child { border: none; }
  .ac-cart-status { display:inline-block; padding: 3px 10px; border-radius: 999px; font-size: 11px; letter-spacing: 0.05em; text-transform: uppercase; }
  .ac-cart-status--open { background: rgba(255,200,0,0.15); color: #d4a853; }
  .ac-cart-status--submitted { background: rgba(48,209,88,0.15); color: #30d158; }
</style>
@endpush

@section('content')
@php $isEn = ($locale ?? 'tr') === 'en'; @endphp

<section class="ac-page">
  <h1>{{ __('ui.account_title') }}</h1>

  @if(session('status'))
    <div class="ac-status">{{ session('status') }}</div>
  @endif

  <div class="ac-card">
    <h2>{{ __('ui.account_info') }}</h2>
    <form method="POST" action="{{ $isEn ? route('en.account.update') : route('account.update') }}">
      @csrf
      @method('PATCH')
      <div class="ac-form-row">
        <div>
          <label>{{ __('ui.account_name') }}</label>
          <input type="text" name="name" value="{{ old('name', $user->name) }}" required />
        </div>
        <div>
          <label>{{ __('ui.account_email') }}</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}" required />
        </div>
        <div>
          <label>{{ __('ui.account_phone') }}</label>
          <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" required />
        </div>
      </div>
      <div style="margin-top: 20px;">
        <button type="submit" class="btn btn-primary">{{ __('ui.account_update_btn') }}</button>
      </div>
    </form>
  </div>

  <div class="ac-card">
    <h2>{{ __('ui.account_carts') }}</h2>
    @if($carts->isEmpty())
      <p style="color: var(--muted); margin: 0;">{{ __('ui.account_no_carts') }}</p>
    @else
      @foreach($carts as $cart)
        <div style="margin-bottom: 24px;">
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 8px;">
            <strong>{{ $cart->created_at->format('d.m.Y H:i') }}</strong>
            <span class="ac-cart-status ac-cart-status--{{ $cart->status }}">
              {{ $cart->status === 'submitted' ? __('ui.account_cart_submitted') : __('ui.account_cart_open') }}
            </span>
          </div>
          @foreach($cart->items as $item)
            <div class="ac-cart-item">
              <span style="flex:1;">{{ $item->snapshot_name ?: ($item->product?->name ?? '—') }}</span>
              <span style="color: var(--muted);">× {{ $item->quantity }}</span>
              @if($item->snapshot_price)<span style="color: var(--muted);">{{ $item->snapshot_price }}</span>@endif
            </div>
          @endforeach
        </div>
      @endforeach
    @endif
  </div>

  <form method="POST" action="{{ $isEn ? route('en.logout') : route('logout') }}" style="text-align: center;">
    @csrf
    <button type="submit" class="btn btn-ghost">{{ __('ui.account_logout') }}</button>
  </form>
</section>
@endsection
