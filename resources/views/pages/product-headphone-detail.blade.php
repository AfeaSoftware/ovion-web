@extends('main')

@section('title', $product->seo?->title ?? $product->name)
@section('description', $product->seo?->description ?? $product->tagline ?? __('ui.hp_meta_desc'))
@section('theme', 'dark')

@push('preload')
@php $heroPreloadMedia = $product->getFirstMedia('hero'); @endphp
@if($heroPreloadMedia)
<link rel="preload" as="image" href="{{ $heroPreloadMedia->getUrl() }}" fetchpriority="high" />
@endif
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/headphone-detail.css') }}" />
@endpush

@section('content')

@php
  $heroMedia = $product->getFirstMedia('hero');
  $heroImg = $heroMedia?->getUrl();
  $stripStats = collect($product->strip_stats ?? []);
  $ancCards = collect(data_get($product->content, 'anc.cards') ?? []);
  $ancDb = data_get($product->content, 'anc.db_value') ?: '38';
  $soundItems = collect(data_get($product->content, 'sound.items') ?? []);
  $designItems = collect(data_get($product->content, 'design.items') ?? []);
  $batteryStats = collect(data_get($product->content, 'battery.stats') ?? []);
  $connectivityCards = collect(data_get($product->content, 'connectivity.cards') ?? []);

  $has = fn (array $keys) => \App\Support\PageContentHelper::hasAny($content ?? null, $keys);
  $showAncBillboard = $has(['anc.eyebrow', 'anc.title', 'anc.description']);
  $showAncCards = $has(['anc_cards.eyebrow', 'anc_cards.title']) || $ancCards->isNotEmpty();
  $showAncSection = $showAncBillboard || $showAncCards;
  $showSound = $has(['sound.eyebrow', 'sound.title', 'sound.description']) || $soundItems->isNotEmpty();
  $showDesign = $has(['design.eyebrow', 'design.title', 'design.description']) || $designItems->isNotEmpty();
  $showBattery = $has(['battery.eyebrow', 'battery.title', 'battery.description']) || $batteryStats->isNotEmpty();
  $showConnectivity = $has(['connectivity.eyebrow', 'connectivity.title']) || $connectivityCards->isNotEmpty();
  $showSpecsSection = $has(['specs_section.eyebrow', 'specs_section.title']) || ! empty($product->specs ?? []);
  $showBuySection = $has(['buy_section.eyebrow', 'buy_section.title']) || $product->price !== null;
@endphp

{{-- ═══════════════════════════════════════ SUB-NAV ════════ --}}
<div class="hd-subnav" id="hd-subnav">
  <div class="wrap hd-subnav-inner">
    <button class="hd-subnav-arrow hd-subnav-arrow--prev" aria-label="{{ __('ui.nav_prev') }}" data-hidden>
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M9 2L4 7l5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <ul class="hd-subnav-links">
      <li><a class="hd-subnav-link" href="#hd-hero">{{ __('ui.pd_overview') }}</a></li>
      @if($showAncSection)<li><a class="hd-subnav-link" href="#pd-anc">{{ __('ui.pd_anc') }}</a></li>@endif
      @if($showSound)<li><a class="hd-subnav-link" href="#pd-sound">{{ __('ui.pd_sound') }}</a></li>@endif
      @if($showDesign)<li><a class="hd-subnav-link" href="#pd-design">{{ __('ui.pd_design') }}</a></li>@endif
      @if($showConnectivity)<li><a class="hd-subnav-link" href="#pd-connectivity">{{ __('ui.pd_connectivity') }}</a></li>@endif
      @if($showSpecsSection)<li><a class="hd-subnav-link" href="#pd-specs">{{ __('ui.pd_specs') }}</a></li>@endif
      @if(($compatibleAccessories ?? collect())->isNotEmpty())
        <li><a class="hd-subnav-link" href="#pd-compat">{{ __('ui.pd_compat_ey') }}</a></li>
      @endif
    </ul>
    <button class="hd-subnav-arrow hd-subnav-arrow--next" aria-label="{{ __('ui.nav_next') }}">
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M5 2l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <a href="#pd-buy" class="hd-subnav-cta">
      {{ __('ui.pd_buy_hp') }}
      <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</div>

{{-- ═══════════════════════════════════════ HERO ═══════════ --}}
<section class="hd-hero" id="hd-hero" data-pd-section="hd-hero">
  <div class="hd-hero-bg" aria-hidden="true"></div>

  <div class="hd-hero-content">
    <p class="hd-hero-eyebrow">{{ $product->eyebrow ?: __('ui.hp_hero_eyebrow') }}</p>
    <h1>{{ $product->name }}</h1>
    @if($product->tagline)
      <p class="hd-hero-sub">{!! $product->tagline !!}</p>
    @endif
  </div>

  <div class="hd-hero-img">
    @if($heroImg)
      <img src="{{ $heroImg }}" alt="{{ $product->name }}" width="800" height="700" fetchpriority="high" decoding="async" />
    @endif
  </div>

  <div class="hd-hero-bottom">
    <div class="hd-hero-actions">
      <form method="POST" action="{{ ($locale ?? 'tr') === 'en' ? route('en.cart.add', $product->slug) : route('cart.add', $product->slug) }}" style="display:inline;">
        @csrf
        <button type="submit" class="btn-hd-primary">{{ __('ui.btn_add_to_cart') }}</button>
      </form>
      <a href="#pd-specs" class="btn btn-ghost" style="height:52px;padding:0 32px;font-size:16px;">{{ __('ui.hp_hero_specs') }}</a>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ SPEC STRIP ══════ --}}
@if($stripStats->isNotEmpty())
<section class="hd-specs-strip" aria-label="{{ __('ui.hp_strip_aria') }}">
  <div class="wrap hd-specs-row">
    @foreach($stripStats as $i => $stat)
      <div class="hd-spec-item hd-reveal{{ $i > 0 ? ' hd-reveal-delay-'.min($i, 3) : '' }}">
        <span class="hd-spec-val">{{ $stat['value'] ?? '' }}</span>
        <span class="hd-spec-lbl">{{ $stat['label'] ?? '' }}</span>
      </div>
    @endforeach
  </div>
</section>
@endif

@if($showAncBillboard)
{{-- ═══════════════════════════════════════ ANC BILLBOARD ═══ --}}
<section class="hd-billboard hd-billboard--decor" id="pd-anc" data-pd-section="pd-anc">
  <div class="hd-billboard-decor" aria-hidden="true">
    <span class="hd-wave">
      <span class="hd-wave-bar"></span><span class="hd-wave-bar"></span><span class="hd-wave-bar"></span>
      <span class="hd-wave-bar"></span><span class="hd-wave-bar"></span><span class="hd-wave-bar"></span>
      <span class="hd-wave-bar"></span><span class="hd-wave-bar"></span><span class="hd-wave-bar"></span>
    </span>
  </div>
  <div class="hd-billboard-content hd-reveal">
    <p class="eyebrow" style="color:rgba(10,132,255,.9)">@pc('anc.eyebrow', '')</p>
    <h2>@pcRaw('anc.title', '')</h2>
    <p>@pc('anc.description', '')</p>
  </div>
</section>
@endif

@if($showAncCards)
{{-- ═══════════════════════════════════════ ANC FEATURES ════ --}}
<section class="hd-cards-section" id="pd-anc-features" data-pd-section="pd-anc">
  <div class="wrap">
    <p class="eyebrow hd-reveal">@pc('anc_cards.eyebrow', '')</p>
    <h2 class="hd-reveal hd-reveal-delay-1">@pcRaw('anc_cards.title', '')</h2>

    <div class="hd-cards-grid">
      @foreach($ancCards as $i => $card)
        <div class="hd-card hd-reveal{{ $i > 0 ? ' hd-reveal-delay-'.min($i, 2) : '' }}">
          <div class="hd-card-icon">
            <x-product-icon :icon="$card['icon'] ?? 'wifi'" />
          </div>
          @if(!empty($card['metric']))<div class="hd-card-num">{{ $card['metric'] }}</div>@endif
          @if(!empty($card['title']))<h3>{{ $card['title'] }}</h3>@endif
          @if(!empty($card['description']))<p>{{ $card['description'] }}</p>@endif
        </div>
      @endforeach
    </div>

    {{-- ANC Slider --}}
    <div class="hd-anc-slider-section" style="margin-top:clamp(48px,6vw,80px);border-radius:calc(var(--radius)*1.4);border:1px solid var(--line-2);">
      <div class="hd-anc-slider-inner">
        <h3>{!! __('ui.hp_ancf_slider_title') !!}</h3>
        <p>{{ __('ui.hp_ancf_slider_desc') }}</p>
        <div>
          <div class="hd-anc-slider-label">{{ __('ui.anc_slider_label') }}</div>
          <div class="hd-anc-display" id="hd-anc-value" aria-live="polite">
            <span class="hd-anc-num">{{ $ancDb }}</span><span> dB</span>
          </div>
          <input type="range" class="hd-anc-range" id="hd-anc-range"
            min="0" max="{{ $ancDb }}" value="{{ $ancDb }}" step="0.5"
            aria-label="{{ __('ui.anc_slider_aria') }}"
            style="--pct:100%"
            data-captions="{{ json_encode([__('ui.anc_cap_0'),__('ui.anc_cap_1'),__('ui.anc_cap_2'),__('ui.anc_cap_3'),__('ui.anc_cap_4')]) }}" />
        </div>
        <p class="hd-anc-caption" id="hd-anc-caption">{{ __('ui.anc_cap_4') }}</p>
      </div>
    </div>

  </div>
</section>
@endif

@if($showSound)
{{-- ═══════════════════════════════════════ SOUND SPLIT ══════ --}}
<section class="hd-split hd-split--decor" id="pd-sound" data-pd-section="pd-sound">
  <div class="hd-split-media hd-split-media--decor" aria-hidden="true">
    <span class="hd-driver-mock">
      <span class="hd-driver-ring hd-driver-ring--1"></span>
      <span class="hd-driver-ring hd-driver-ring--2"></span>
      <span class="hd-driver-ring hd-driver-ring--3"></span>
      <span class="hd-driver-core"></span>
    </span>
  </div>
  <div class="hd-split-copy hd-reveal">
    <p class="eyebrow">@pc('sound.eyebrow', '')</p>
    <h2>@pcRaw('sound.title', '')</h2>
    <p>@pc('sound.description', '')</p>
    <ul class="hd-feature-list">
      @foreach($soundItems as $i => $item)
        <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
      @endforeach
    </ul>
  </div>
</section>
@endif

@if($showDesign)
{{-- ═══════════════════════════════════════ DESIGN SPLIT ═════ --}}
<section class="hd-split hd-split--flip hd-split--decor" id="pd-design" data-pd-section="pd-design" style="background:var(--bg-2);">
  <div class="hd-split-media hd-split-media--decor" aria-hidden="true">
    <span class="hd-headphone-mock">
      <span class="hd-headphone-band"></span>
      <span class="hd-headphone-cup hd-headphone-cup--l"></span>
      <span class="hd-headphone-cup hd-headphone-cup--r"></span>
    </span>
  </div>
  <div class="hd-split-copy hd-reveal" style="background:var(--bg-2);">
    <p class="eyebrow">@pc('design.eyebrow', '')</p>
    <h2>@pcRaw('design.title', '')</h2>
    <p>@pc('design.description', '')</p>
    <ul class="hd-feature-list">
      @foreach($designItems as $i => $item)
        <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
      @endforeach
    </ul>
  </div>
</section>
@endif

@if($showBattery)
{{-- ═══════════════════════════════════════ BATTERY BILLBOARD ══ --}}
<section class="hd-battery-billboard" id="pd-battery" data-pd-section="pd-battery">
  <div class="hd-battery-billboard-inner">
    <p class="eyebrow hd-reveal" style="color:var(--hd-teal);justify-content:center;">@pc('battery.eyebrow', '')</p>
    <h2 class="hd-reveal hd-reveal-delay-1">@pcRaw('battery.title', '')</h2>
    <p class="hd-reveal hd-reveal-delay-2" style="color:rgba(255,255,255,.65);max-width:40ch;margin:0 auto;font-size:clamp(15px,1.3vw,18px);">
      @pc('battery.description', '')
    </p>
    <div class="hd-battery-stats hd-reveal hd-reveal-delay-3">
      @foreach($batteryStats as $stat)
        <div class="hd-battery-stat">
          <span class="hd-battery-stat-val">{{ $stat['value'] ?? '' }}</span>
          <span class="hd-battery-stat-lbl">{{ $stat['label'] ?? '' }}</span>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@if($showConnectivity)
{{-- ═══════════════════════════════════════ CONNECTIVITY CARDS ══ --}}
<section class="hd-cards-section" id="pd-connectivity" data-pd-section="pd-connectivity" style="background:var(--bg);">
  <div class="wrap">
    <p class="eyebrow hd-reveal">@pc('connectivity.eyebrow', '')</p>
    <h2 class="hd-reveal hd-reveal-delay-1">@pcRaw('connectivity.title', '')</h2>

    <div class="hd-cards-grid">
      @foreach($connectivityCards as $i => $card)
        <div class="hd-card hd-reveal{{ $i > 0 ? ' hd-reveal-delay-'.min($i, 2) : '' }}">
          <div class="hd-card-icon">
            <x-product-icon :icon="$card['icon'] ?? 'wifi'" />
          </div>
          @if(!empty($card['metric']))<div class="hd-card-num">{{ $card['metric'] }}</div>@endif
          @if(!empty($card['title']))<h3>{{ $card['title'] }}</h3>@endif
          @if(!empty($card['description']))<p>{{ $card['description'] }}</p>@endif
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@if($showSpecsSection)
{{-- ═══════════════════════════════════════ FULL SPECS ═══════ --}}
<section class="hd-specs-section" id="pd-specs" data-pd-section="pd-specs">
  <div class="wrap">
    <p class="eyebrow hd-reveal">@pc('specs_section.eyebrow', '')</p>
    <h2 class="hd-reveal hd-reveal-delay-1">@pcRaw('specs_section.title', '')</h2>

    <div class="hd-specs-table">
      @foreach($product->specs ?? [] as $spec)
        <div class="hd-spec-row">
          <div class="hd-spec-row-k">{{ $spec['key'] ?? '' }}</div>
          <div class="hd-spec-row-v">{{ $spec['value'] ?? '' }}@if(!empty($spec['note']))<span class="hd-spec-row-sub">{{ $spec['note'] }}</span>@endif</div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ═══════════════════════════════════════ COMPATIBLE ACCESSORIES ══ --}}
@include('pages.partials.product-compatible-accessories')

@if($showBuySection)
{{-- ═══════════════════════════════════════ BUY ══════════════ --}}
<section class="hd-buy" id="pd-buy" data-pd-section="pd-buy">
  <div class="wrap hd-reveal">
    <p class="eyebrow" style="justify-content:center;">@pc('buy_section.eyebrow', '')</p>
    <h2>@pcRaw('buy_section.title', '')</h2>
    <div class="hd-buy-price">
      <strong>{{ $product->priceLabel() ?: __('ui.hp_buy_price') }}</strong>
      @if($product->price !== null)<span style="color: var(--muted); margin-left: 8px;">{{ __('ui.price_tax_included') }}</span>@endif
    </div>
    <div class="hd-buy-actions">
      <form method="POST" action="{{ ($locale ?? 'tr') === 'en' ? route('en.cart.add', $product->slug) : route('cart.add', $product->slug) }}" style="display:inline;">
        @csrf
        <button type="submit" class="btn-hd-primary">{{ __('ui.btn_add_to_cart') }}</button>
      </form>
      <a href="#pd-specs" class="btn btn-ghost" style="height:52px;padding:0 32px;font-size:16px;">{{ __('ui.hp_buy_cta2') }}</a>
    </div>
    <p class="hd-buy-note">{{ __('ui.hp_buy_note') }}</p>
  </div>
</section>
@endif

@endsection

@push('scripts')
<script src="{{ asset('js/headphone-detail.js') }}"></script>
@endpush
