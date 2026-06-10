@extends('main')

@section('title', $product->seo?->title ?? $product->name)
@section('description', $product->seo?->description ?? $product->tagline ?? __('ui.wt_meta_desc'))
@section('theme', 'dark')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/phone-detail.css') }}" />
<link rel="stylesheet" href="{{ asset('css/watch-detail.css') }}" />
@endpush

@section('content')

@php
  $heroImg = $product->heroUrl('webp') ?? $product->heroUrl();
  $stripStats = collect($product->strip_stats ?? []);
  $healthCards = collect(data_get($product->content, 'health.cards') ?? []);
  $faces = collect(data_get($product->content, 'customization.faces') ?? []);
  $designItems = collect(data_get($product->content, 'design.items') ?? []);
  $activityStats = collect(data_get($product->content, 'activity.stats') ?? []);
  $batteryItems = collect(data_get($product->content, 'battery.items') ?? []);
@endphp

{{-- ═══════════════════════════════════════ SUB-NAV ════════ --}}
<div class="pd-subnav">
  <div class="wrap pd-subnav-inner">
    <button class="pd-subnav-arrow pd-subnav-arrow--prev" aria-label="{{ __('ui.nav_prev') }}" data-hidden>
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M9 2L4 7l5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <ul class="pd-subnav-links">
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-hero">{{ __('ui.pd_overview') }}</a></li>
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-health">{{ __('ui.pd_health') }}</a></li>
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-faces">{{ __('ui.pd_watch_faces') }}</a></li>
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-design">{{ __('ui.pd_design') }}</a></li>
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-activity">{{ __('ui.pd_activity') }}</a></li>
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-specs">{{ __('ui.pd_specs') }}</a></li>
      @if(($compatibleAccessories ?? collect())->isNotEmpty())
        <li><a class="pd-subnav-link wd-subnav-link" href="#pd-compat">{{ __('ui.pd_compat_ey') }}</a></li>
      @endif
    </ul>
    <button class="pd-subnav-arrow pd-subnav-arrow--next" aria-label="{{ __('ui.nav_next') }}">
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M5 2l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <a href="#wd-buy" class="pd-subnav-cta" style="background:var(--watch-red,#ff3b30)">
      {{ __('ui.pd_buy_watch') }}
      <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</div>

{{-- ═══════════════════════════════════════ HERO ═══════════ --}}
<section class="pd-hero" id="wd-hero" data-pd-section="wd-hero">
  <div class="pd-hero-bg" aria-hidden="true"></div>

  <div class="pd-hero-content">
    <p class="pd-hero-eyebrow">{{ $product->eyebrow ?: __('ui.wt_hero_eyebrow') }}</p>
    <h1>{{ $product->name }}</h1>
    @if($product->tagline)
      <p class="pd-hero-sub">{!! $product->tagline !!}</p>
    @endif
  </div>

  <div class="pd-hero-img">
    @if($heroImg)
      <img src="{{ $heroImg }}" alt="{{ $product->name }}"
           width="900" height="1100"
           fetchpriority="high" decoding="async" />
    @endif
  </div>

  <div class="pd-hero-bottom">
    <div class="pd-hero-actions">
      <form method="POST" action="{{ ($locale ?? 'tr') === 'en' ? route('en.cart.add', $product->slug) : route('cart.add', $product->slug) }}" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-primary">{{ __('ui.btn_add_to_cart') }}</button>
      </form>
      <a href="#wd-specs" class="btn btn-ghost">{{ __('ui.wt_hero_specs') }}</a>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ SPEC STRIP ══════ --}}
@if($stripStats->isNotEmpty())
<section class="pd-specs-strip" aria-label="{{ __('ui.wt_strip_aria') }}">
  <div class="wrap pd-specs-row">
    @foreach($stripStats as $i => $stat)
      <div class="pd-spec-item wd-reveal{{ $i > 0 ? ' wd-reveal-delay-'.min($i, 3) : '' }}">
        <span class="pd-spec-val">{{ $stat['value'] ?? '' }}</span>
        <span class="pd-spec-lbl">{{ $stat['label'] ?? '' }}</span>
      </div>
    @endforeach
  </div>
</section>
@endif

{{-- ═══════════════════════════════════════ HEALTH BILLBOARD ══ --}}
<section class="wd-health-billboard wd-health-billboard--decor" id="wd-health" data-wd-section="wd-health">
  <div class="wd-health-billboard-decor" aria-hidden="true">
    <svg viewBox="0 0 600 200" preserveAspectRatio="none" class="wd-pulse-svg" xmlns="http://www.w3.org/2000/svg">
      <path d="M0 100 L120 100 L150 60 L180 140 L210 40 L240 160 L270 100 L600 100" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" pathLength="100" />
    </svg>
  </div>
  <div class="wd-health-billboard-content wd-reveal">
    <p class="wd-eyebrow">@pc('health.eyebrow', '')</p>
    <h2>@pcRaw('health.title', '')</h2>
    <p>@pc('health.description', '')</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ HEALTH CARDS ══════ --}}
<section class="wd-cards-section" id="wd-health-features">
  <div class="wrap">
    <p class="wd-eyebrow wd-reveal">@pc('health_cards.eyebrow', '')</p>
    <h2 class="wd-reveal wd-reveal-delay-1">@pcRaw('health_cards.title', '')</h2>
    <div class="wd-cards-grid">
      @foreach($healthCards as $i => $card)
        <div class="wd-card wd-reveal{{ $i > 0 ? ' wd-reveal-delay-'.min($i % 3, 2) : '' }}">
          <div class="wd-card-icon">
            <x-product-icon :icon="$card['icon'] ?? 'heart'" />
          </div>
          @if(!empty($card['metric']))<div class="wd-card-metric">{{ $card['metric'] }}</div>@endif
          @if(!empty($card['title']))<h3>{{ $card['title'] }}</h3>@endif
          @if(!empty($card['description']))<p>{{ $card['description'] }}</p>@endif
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ DESIGN SPLIT ═══════ --}}
<section class="wd-split wd-split--decor" id="wd-design" data-wd-section="wd-design">
  <div class="wd-split-media wd-split-media--decor" style="background:#e8e8ed; min-height:520px;" aria-hidden="true">
    <span class="wd-watch-mock">
      <span class="wd-watch-mock-dial">
        <span class="wd-watch-mock-hand wd-watch-mock-hand--h"></span>
        <span class="wd-watch-mock-hand wd-watch-mock-hand--m"></span>
        <span class="wd-watch-mock-center"></span>
      </span>
      <span class="wd-watch-mock-strap wd-watch-mock-strap--top"></span>
      <span class="wd-watch-mock-strap wd-watch-mock-strap--bot"></span>
    </span>
  </div>
  <div class="wd-split-copy wd-reveal" style="background:var(--bg-2);">
    <p class="wd-eyebrow">@pc('design.eyebrow', '')</p>
    <h2>@pcRaw('design.title', '')</h2>
    <p>@pc('design.description', '')</p>
    <ul class="wd-feature-list">
      @foreach($designItems as $i => $item)
        <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
      @endforeach
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ ACTIVITY BILLBOARD ══ --}}
<section class="wd-activity-billboard wd-activity-billboard--decor" id="wd-activity" data-wd-section="wd-activity">
  <div class="wd-activity-content wd-reveal">
    <p class="wd-eyebrow" style="color:var(--watch-coral,#ff6b5b)">@pc('activity.eyebrow', '')</p>
    <h2>@pcRaw('activity.title', '')</h2>
    <p>@pc('activity.description', '')</p>
    <div class="wd-activity-metrics">
      @foreach($activityStats as $stat)
        <div class="wd-activity-metric">
          <span class="wd-activity-metric-val">{{ $stat['value'] ?? '' }}</span>
          <span class="wd-activity-metric-lbl">{{ $stat['label'] ?? '' }}</span>
        </div>
      @endforeach
    </div>
  </div>
  <div class="wd-activity-decor" aria-hidden="true">
    <svg viewBox="0 0 200 200" class="wd-rings-svg" xmlns="http://www.w3.org/2000/svg">
      <g transform="rotate(-90 100 100)">
        <circle cx="100" cy="100" r="84" class="wd-ring-track wd-ring-track--move" />
        <circle cx="100" cy="100" r="84" class="wd-ring-fill wd-ring-fill--move" pathLength="100" />
        <circle cx="100" cy="100" r="64" class="wd-ring-track wd-ring-track--ex" />
        <circle cx="100" cy="100" r="64" class="wd-ring-fill wd-ring-fill--ex" pathLength="100" />
        <circle cx="100" cy="100" r="44" class="wd-ring-track wd-ring-track--stand" />
        <circle cx="100" cy="100" r="44" class="wd-ring-fill wd-ring-fill--stand" pathLength="100" />
      </g>
    </svg>
  </div>
</section>

{{-- ═══════════════════════════════════════ BATTERY SPLIT ═══════ --}}
<section class="wd-split wd-split--flip wd-split--decor" style="background:var(--bg);">
  <div class="wd-split-copy wd-reveal" style="background:var(--bg);">
    <p class="wd-eyebrow">@pc('battery.eyebrow', '')</p>
    <h2>@pcRaw('battery.title', '')</h2>
    <p>@pc('battery.description', '')</p>
    <ul class="wd-feature-list" style="margin-top:20px;">
      @foreach($batteryItems as $i => $item)
        <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
      @endforeach
    </ul>
  </div>
  <div class="wd-split-media wd-split-media--decor" style="background:#f2f2f7; min-height:480px;" aria-hidden="true">
    <span class="wd-battery-mock">
      <span class="wd-battery-mock-fill"></span>
      <span class="wd-battery-mock-tip"></span>
    </span>
  </div>
</section>

{{-- ═══════════════════════════════════════ FULL SPECS ════════ --}}
<section class="wd-specs-section" id="wd-specs" data-wd-section="wd-specs">
  <div class="wrap">
    <p class="wd-eyebrow wd-reveal">@pc('specs_section.eyebrow', '')</p>
    <h2 class="wd-reveal wd-reveal-delay-1">@pcRaw('specs_section.title', '')</h2>

    <div class="wd-specs-table">
      @foreach($product->specs ?? [] as $spec)
        <div class="wd-spec-row">
          <div class="wd-spec-row-k">{{ $spec['key'] ?? '' }}</div>
          <div class="wd-spec-row-v">{{ $spec['value'] ?? '' }}@if(!empty($spec['note']))<span class="wd-spec-row-sub">{{ $spec['note'] }}</span>@endif</div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ COMPATIBLE ACCESSORIES ══ --}}
@include('pages.partials.product-compatible-accessories')

{{-- ═══════════════════════════════════════ BUY ════════════════ --}}
<section class="wd-buy" id="wd-buy" data-wd-section="wd-buy">
  <div class="wrap wd-reveal">
    <p class="wd-eyebrow" style="justify-content:center">@pc('buy_section.eyebrow', '')</p>
    <h2>@pcRaw('buy_section.title', '')</h2>
    <div class="wd-buy-price">
      <strong>{{ $product->priceLabel() ?: __('ui.wt_buy_price') }}</strong>
      @if($product->price !== null)<span style="color: var(--muted); margin-left: 8px;">{{ __('ui.price_tax_included') }}</span>@endif
    </div>
    <div class="wd-buy-actions">
      <form method="POST" action="{{ ($locale ?? 'tr') === 'en' ? route('en.cart.add', $product->slug) : route('cart.add', $product->slug) }}" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-primary" style="font-size:16px; height:52px; padding:0 32px; background:var(--watch-red,#ff3b30); border-color:var(--watch-red,#ff3b30);">{{ __('ui.btn_add_to_cart') }}</button>
      </form>
      <a href="#wd-specs" class="btn btn-ghost" style="font-size:16px; height:52px; padding:0 32px;">{{ __('ui.wt_buy_cta2') }}</a>
    </div>
    <p class="wd-buy-note">{{ __('ui.wt_buy_note') }}</p>
  </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/watch-detail.js') }}"></script>
@endpush
