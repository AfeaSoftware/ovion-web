@extends('main')

@section('title', $accessory->name.' — '.__('ui.ak_meta_title'))
@section('description', $accessory->summary ?? '')
@section('theme', 'dark')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/aksesuarlar.css') }}" />
@endpush

@php
  $isEn = ($locale ?? 'tr') === 'en';
  $r = fn (string $tr, string $en, array $params = []) => route($isEn ? $en : $tr, $params);

  $catLabels = [
    'kilif' => __('ui.ak_cat_cases'),
    'ekran' => __('ui.ak_cat_screen'),
    'sarj'  => __('ui.ak_cat_charge'),
    'kayis' => __('ui.ak_cat_straps'),
    'diger' => __('ui.ak_cat_all'),
  ];

  $productRouteByType = [
    'phone'     => ['phones.show', 'en.phones.show'],
    'watch'     => ['watches.show', 'en.watches.show'],
    'headphone' => ['headphones.show', 'en.headphones.show'],
  ];

  $imgUrl = $accessory->imageUrl();
  $catLabel = $catLabels[$accessory->category] ?? $accessory->category;
@endphp

@section('content')

<section class="ak-detay" style="padding: clamp(80px, 10vw, 140px) 0 clamp(60px, 8vw, 100px);">
  <div class="wrap" style="max-width: 1100px;">

    <nav style="margin-bottom: 24px; font-size: 13px; color: var(--muted);">
      <a href="{{ $r('aksesuarlar', 'en.accessories') }}" style="color: var(--muted); text-decoration: none;">
        ← {{ __('ui.ak_meta_title') }}
      </a>
    </nav>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: clamp(32px, 5vw, 80px); align-items: center;">

      <div class="ak-card-media" style="aspect-ratio: 1/1; border-radius: 24px; min-height: 360px;">
        @if($imgUrl)
          <img src="{{ $imgUrl }}" alt="{{ $accessory->name }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 24px;" />
        @endif
      </div>

      <div>
        <p class="eyebrow" style="margin-bottom: 16px;">{{ $catLabel }}</p>
        <h1 style="font-size: clamp(28px, 4vw, 48px); letter-spacing: -0.02em; line-height: 1.1; margin: 0 0 16px;">
          {{ $accessory->name }}
        </h1>

        @if($accessory->summary)
          <p style="font-size: 16px; color: var(--muted); margin: 0 0 24px; line-height: 1.6;">
            {{ $accessory->summary }}
          </p>
        @endif

        @if($accessory->description)
          <p style="font-size: 15px; color: var(--ink); margin: 0 0 32px; line-height: 1.7; opacity: 0.85;">
            {{ $accessory->description }}
          </p>
        @endif

        @if($accessory->priceLabel())
          <div style="margin-bottom: 24px;">
            <span style="font-size: 28px; font-weight: 500; letter-spacing: -0.01em;">{{ $accessory->priceLabel() }}</span>
            @if($accessory->price_note)
              <p style="font-size: 13px; color: var(--muted); margin: 6px 0 0;">{{ $accessory->price_note }}</p>
            @endif
          </div>
        @endif

        @if($accessory->buy_url)
          <a class="btn btn-primary" href="{{ $accessory->buy_url }}">
            {{ __('ui.btn_buy') ?? 'Satın Al' }} →
          </a>
        @endif
      </div>

    </div>

    @if($accessory->products->isNotEmpty())
      <div style="margin-top: clamp(60px, 8vw, 100px);">
        <p class="eyebrow" style="margin-bottom: 12px;">{{ __('ui.ak_compat_ey') }}</p>
        <h2 style="font-size: clamp(22px, 3vw, 32px); letter-spacing: -0.02em; line-height: 1.15; margin: 0 0 28px;">
          {{ __('ui.ak_compat_phone') }} · {{ __('ui.ak_compat_watch') }} · {{ __('ui.ak_compat_hp') }}
        </h2>

        <div class="ak-compat-grid">
          @foreach($accessory->products as $product)
            @php
              $routes = $productRouteByType[$product->type] ?? null;
              if (! $routes) { continue; }
              $url = $r($routes[0], $routes[1], ['slug' => $product->slug]);
            @endphp
            <a href="{{ $url }}" class="ak-compat-card">
              <div class="ak-compat-icon" aria-hidden="true">
                <span style="font-size:10px">{{ Str::words($product->name, 2, '') }}</span>
              </div>
              <div class="ak-compat-info">
                <span class="ak-compat-label">{{ ucfirst($product->type) }}</span>
                <span class="ak-compat-name">{{ $product->name }}</span>
              </div>
              <svg class="ak-compat-arrow" width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                <path d="M4 9h10M9 4l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
          @endforeach
        </div>
      </div>
    @endif

  </div>
</section>

@endsection
