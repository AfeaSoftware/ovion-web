@extends('main')

@section('title', __('ui.cart_title'))
@section('theme', 'dark')

@push('styles')
<style>
  .ct-page { max-width: 880px; margin: 0 auto; padding: 64px 24px; }
  .ct-page h1 { font-size: clamp(28px, 4vw, 40px); margin: 0 0 32px; letter-spacing: -0.02em; }
  .ct-empty { text-align:center; padding: 64px 0; color: var(--muted); }
  .ct-status { padding: 12px 16px; background: rgba(48,209,88,0.08); border: 1px solid rgba(48,209,88,0.4); border-radius: 8px; margin-bottom: 24px; font-size: 14px; }
  .ct-row { display:grid; grid-template-columns: 1fr auto auto auto; gap: 16px; align-items: center; padding: 20px 0; border-bottom: 1px solid var(--line-2); }
  @media (max-width: 600px) { .ct-row { grid-template-columns: 1fr; gap: 8px; } }
  .ct-name { font-size: 16px; font-weight: 500; }
  .ct-price { color: var(--muted); font-size: 14px; }
  .ct-qty input { width: 64px; padding: 6px 8px; text-align: center; border: 1px solid var(--line); border-radius: 6px; background: transparent; color: var(--ink); }
  .ct-remove { background: transparent; border: 1px solid var(--line); border-radius: 6px; padding: 6px 12px; cursor: pointer; color: var(--muted); font-size: 13px; }
  .ct-remove:hover { color: #ff6b5b; border-color: #ff6b5b; }
  .ct-actions { margin-top: 32px; display: flex; gap: 12px; justify-content: flex-end; flex-wrap: wrap; }
</style>
@endpush

@section('content')
@php $isEn = ($locale ?? 'tr') === 'en'; @endphp

<section class="ct-page">
  <h1>{{ __('ui.cart_title') }}</h1>

  @if(session('status'))
    <div class="ct-status">{{ session('status') }}</div>
  @endif

  @if($items->isEmpty())
    <div class="ct-empty">
      <p>{{ __('ui.cart_empty') }}</p>
      <a href="{{ $isEn ? route('en.home') : route('home') }}" class="btn btn-primary" style="margin-top: 16px;">{{ __('ui.cart_browse') }}</a>
    </div>
  @else
    @foreach($items as $item)
      <div class="ct-row">
        <div>
          <div class="ct-name">{{ $item->product?->name ?? $item->snapshot_name }}</div>
          @if($item->snapshot_price)<div class="ct-price">{{ $item->snapshot_price }}</div>@endif
        </div>
        <form method="POST" action="{{ $isEn ? route('en.cart.update', $item) : route('cart.update', $item) }}" class="ct-qty">
          @csrf
          @method('PATCH')
          <input type="number" name="quantity" min="0" max="50" value="{{ $item->quantity }}" onchange="this.form.submit()" />
        </form>
        <span class="ct-price">× {{ $item->quantity }}</span>
        <form method="POST" action="{{ $isEn ? route('en.cart.remove', $item) : route('cart.remove', $item) }}">
          @csrf
          @method('DELETE')
          <button class="ct-remove" type="submit">{{ __('ui.cart_remove') }}</button>
        </form>
      </div>
    @endforeach

    <div class="ct-actions">
      <form method="POST" action="{{ $isEn ? route('en.cart.submit') : route('cart.submit') }}">
        @csrf
        <button type="submit" class="btn btn-primary">{{ __('ui.cart_submit') }}</button>
      </form>
    </div>
  @endif
</section>
@endsection
