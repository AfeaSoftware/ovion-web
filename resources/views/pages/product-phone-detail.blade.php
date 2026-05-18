@extends('main')

@section('title', $product->seo?->title ?? $product->name)
@section('description', $product->seo?->description ?? $product->tagline ?? __('ui.ph_meta_desc'))
@section('theme', 'dark')

@push('preload')
@php $heroPreloadMedia = $product->getFirstMedia('hero'); @endphp
@if($heroPreloadMedia)
<link rel="preload" as="image" href="{{ $heroPreloadMedia->getUrl() }}" fetchpriority="high" />
@endif
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/phone-detail.css') }}" />
@endpush

@section('content')

@php
  $heroMedia = $product->getFirstMedia('hero');
  $heroImg = $heroMedia?->getUrl();
  $stripStats = collect($product->strip_stats ?? []);
  $cameraCards = collect(data_get($product->content, 'camera.cards') ?? []);
  $displayItems = collect(data_get($product->content, 'display.items') ?? []);
  $performanceCards = collect(data_get($product->content, 'performance.cards') ?? []);
  $batteryItems = collect(data_get($product->content, 'battery.items') ?? []);
  $cinemaSlides = collect(data_get($product->content, 'cinema.slides') ?? []);
  $cinemaMedia = $product->getMedia('cinema');
  $designImg = $cinemaMedia->first()?->getUrl();
@endphp

{{-- ═══════════════════════════════════════ SUB-NAV ════════ --}}
<div class="pd-subnav" id="pd-subnav">
  <div class="wrap pd-subnav-inner">
    <button class="pd-subnav-arrow pd-subnav-arrow--prev" aria-label="{{ __('ui.nav_prev') }}" data-hidden>
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M9 2L4 7l5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <ul class="pd-subnav-links">
      <li><a class="pd-subnav-link" href="#pd-hero">{{ __('ui.pd_overview') }}</a></li>
      <li><a class="pd-subnav-link" href="#pd-camera">{{ __('ui.pd_camera') }}</a></li>
      <li><a class="pd-subnav-link" href="#pd-display">{{ __('ui.pd_display') }}</a></li>
      <li><a class="pd-subnav-link" href="#pd-performance">{{ __('ui.pd_performance') }}</a></li>
      <li><a class="pd-subnav-link" href="#pd-battery">{{ __('ui.pd_battery') }}</a></li>
      <li><a class="pd-subnav-link" href="#pd-design">{{ __('ui.pd_design') }}</a></li>
      <li><a class="pd-subnav-link" href="#pd-specs">{{ __('ui.pd_specs') }}</a></li>
    </ul>
    <button class="pd-subnav-arrow pd-subnav-arrow--next" aria-label="{{ __('ui.nav_next') }}">
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M5 2l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <a href="#pd-buy" class="pd-subnav-cta">
      {{ __('ui.pd_buy_phone') }}
      <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</div>

<article class="pd-detail">

  <span class="pd-detail-aura pd-detail-aura--1" aria-hidden="true"></span>
  <span class="pd-detail-aura pd-detail-aura--2" aria-hidden="true"></span>
  <span class="pd-detail-aura pd-detail-aura--3" aria-hidden="true"></span>

  {{-- ═══════════════════════════════════════ HERO ═══════════ --}}
  <section class="pd-hero" id="pd-hero" data-pd-section="pd-hero">
    <div class="pd-hero-bg" aria-hidden="true"></div>

    <div class="pd-hero-content">
      <p class="pd-hero-eyebrow">{{ $product->eyebrow ?: __('ui.ph_hero_eyebrow') }}</p>
      <h1>{{ $product->name }}</h1>
      <p class="pd-hero-sub">{{ $product->tagline ?: __('ui.ph_hero_sub') }}</p>
    </div>

    <div class="pd-hero-img">
      @if($heroImg)
        <img src="{{ $heroImg }}"
             alt="{{ $product->name }}"
             width="900" height="1100"
             fetchpriority="high" decoding="async" />
      @endif
    </div>

    <div class="pd-hero-bottom">
      <p class="pd-hero-sub" style="margin:0;">@pc('hero.byline', '')</p>
      <div class="pd-hero-actions">
        <form method="POST" action="{{ ($locale ?? 'tr') === 'en' ? route('en.cart.add', $product->slug) : route('cart.add', $product->slug) }}" style="display:inline;">
          @csrf
          <button type="submit" class="btn btn-primary">{{ __('ui.btn_add_to_cart') }}</button>
        </form>
        <a href="#pd-specs" class="btn btn-ghost">{{ __('ui.ph_hero_specs') }}</a>
      </div>
    </div>
  </section>

  {{-- ═══════════════════════════════════════ SPEC STRIP ══════ --}}
  @if($stripStats->isNotEmpty())
  <section class="pd-specs-strip" aria-label="{{ __('ui.ph_strip_aria') }}">
    <div class="wrap pd-specs-row">
      @foreach($stripStats as $i => $stat)
        <div class="pd-spec-item pd-reveal{{ $i > 0 ? ' pd-reveal-delay-'.min($i, 3) : '' }}">
          <span class="pd-spec-val">{{ $stat['value'] ?? '' }}</span>
          <span class="pd-spec-lbl">{{ $stat['label'] ?? '' }}</span>
        </div>
      @endforeach
    </div>
  </section>
  @endif

  {{-- ═══════════════════════════════════════ STORY (flowing narrative) ══ --}}
  <section class="pd-story">

    {{-- 01 · KAMERA ───────────────────────── --}}
    <article class="pd-story-block" id="pd-camera" data-pd-section="pd-camera">
      <div class="pd-story-visual">
        <div class="pd-cam-scope">
          <span class="pd-cam-scope-flare"></span>
          <span class="pd-cam-scope-ring pd-cam-scope-ring--outer">
            @for($i = 0; $i < 12; $i++)<span class="pd-cam-scope-tick" style="--i:{{ $i }};"></span>@endfor
          </span>
          <span class="pd-cam-scope-ring pd-cam-scope-ring--mid"></span>
          <span class="pd-cam-scope-ring pd-cam-scope-ring--inner"></span>
          <span class="pd-cam-scope-iris"><span class="pd-cam-scope-iris-glint"></span></span>
        </div>
      </div>
      <div class="pd-story-copy pd-reveal">
        <span class="pd-story-step">01 — {{ __('ui.pd_camera') }}</span>
        <p class="eyebrow">@pc('camera.eyebrow', '')</p>
        <h2>@pcRaw('camera.title', '')</h2>
        <p class="pd-story-lede">@pc('camera.description', '')</p>
        @if($cameraCards->isNotEmpty())
          <div class="pd-story-grid">
            @foreach($cameraCards as $card)
              <div class="pd-story-mini">
                <x-product-icon :icon="$card['icon'] ?? 'star'" />
                @if(!empty($card['metric']))<div class="pd-story-mini-num">{{ $card['metric'] }}</div>@endif
                @if(!empty($card['title']))<h4>{{ $card['title'] }}</h4>@endif
                @if(!empty($card['description']))<p>{{ $card['description'] }}</p>@endif
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </article>

    {{-- 02 · EKRAN ──────────────────────────── --}}
    <article class="pd-story-block pd-story-block--flip" id="pd-display" data-pd-section="pd-display">
      <div class="pd-story-visual">
        <div class="pd-display-tile">
          <span class="pd-display-tile-glow"></span>
          <span class="pd-display-tile-screen">
            <span class="pd-display-blob pd-display-blob--1"></span>
            <span class="pd-display-blob pd-display-blob--2"></span>
            <span class="pd-display-blob pd-display-blob--3"></span>
            <span class="pd-display-blob pd-display-blob--4"></span>
            <span class="pd-display-tile-notch"></span>
            <span class="pd-display-tile-pulse"></span>
          </span>
        </div>
      </div>
      <div class="pd-story-copy pd-reveal">
        <span class="pd-story-step">02 — {{ __('ui.pd_display') }}</span>
        <p class="eyebrow">@pc('display.eyebrow', '')</p>
        <h2>@pcRaw('display.title', '')</h2>
        <p class="pd-story-lede">@pc('display.description', '')</p>
        @if($displayItems->isNotEmpty())
          <ul class="pd-feature-list">
            @foreach($displayItems as $i => $item)
              <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
            @endforeach
          </ul>
        @endif
      </div>
    </article>

    {{-- 03 · PERFORMANS ────────────────────── --}}
    <article class="pd-story-block pd-story-block--flip" id="pd-performance" data-pd-section="pd-performance">
      <div class="pd-story-visual">
        <div class="pd-chip">
          <span class="pd-chip-glow"></span>
          <span class="pd-chip-frame">
            @for($p = 0; $p < 4; $p++)
              <span class="pd-chip-pin pd-chip-pin--t" style="--p:{{ $p }};"></span>
              <span class="pd-chip-pin pd-chip-pin--b" style="--p:{{ $p }};"></span>
              <span class="pd-chip-pin pd-chip-pin--l" style="--p:{{ $p }};"></span>
              <span class="pd-chip-pin pd-chip-pin--r" style="--p:{{ $p }};"></span>
            @endfor
          </span>
          <span class="pd-chip-die">
            @for($r = 0; $r < 4; $r++)
              @for($c = 0; $c < 4; $c++)
                <span class="pd-chip-core" style="--ci:{{ $r * 4 + $c }};"></span>
              @endfor
            @endfor
          </span>
          <span class="pd-chip-label">SoC</span>
        </div>
      </div>
      <div class="pd-story-copy pd-reveal">
        <span class="pd-story-step">03 — {{ __('ui.pd_performance') }}</span>
        <p class="eyebrow">@pc('performance.eyebrow', '')</p>
        <h2>@pcRaw('performance.title', '')</h2>
        <p class="pd-story-lede">@pc('performance.description', '')</p>
        @if($performanceCards->isNotEmpty())
          <div class="pd-story-grid">
            @foreach($performanceCards as $card)
              <div class="pd-story-mini">
                <x-product-icon :icon="$card['icon'] ?? 'star'" />
                @if(!empty($card['metric']))<div class="pd-story-mini-num">{{ $card['metric'] }}</div>@endif
                @if(!empty($card['title']))<h4>{{ $card['title'] }}</h4>@endif
                @if(!empty($card['description']))<p>{{ $card['description'] }}</p>@endif
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </article>

    {{-- 04 · PİL ──────────────────────────── --}}
    <article class="pd-story-block" id="pd-battery" data-pd-section="pd-battery">
      <div class="pd-story-visual">
        <div class="pd-battery-cell" aria-hidden="true">
          <span class="pd-battery-glow"></span>
          <span class="pd-battery-spark pd-battery-spark--1"></span>
          <span class="pd-battery-spark pd-battery-spark--2"></span>
          <span class="pd-battery-spark pd-battery-spark--3"></span>
          <span class="pd-battery-spark pd-battery-spark--4"></span>
          <div class="pd-battery-cap"></div>
          <div class="pd-battery-shell">
            <div class="pd-battery-fluid">
              <svg class="pd-battery-wave pd-battery-wave--1" viewBox="0 0 200 24" preserveAspectRatio="none">
                <path d="M0 12 Q 25 0 50 12 T 100 12 T 150 12 T 200 12 V24 H0 Z"/>
              </svg>
              <svg class="pd-battery-wave pd-battery-wave--2" viewBox="0 0 200 24" preserveAspectRatio="none">
                <path d="M0 14 Q 30 2 60 14 T 120 14 T 200 14 V24 H0 Z"/>
              </svg>
            </div>
            <span class="pd-battery-grid"></span>
            <div class="pd-battery-readout">
              <svg viewBox="0 0 24 24" class="pd-battery-bolt">
                <path d="M13 2 4 14h6l-1 8 9-12h-6l1-8z" fill="currentColor"/>
              </svg>
              <span class="pd-battery-pct"><b>100</b><i>%</i></span>
              <span class="pd-battery-cap-label">5000 mAh</span>
            </div>
          </div>
        </div>
      </div>
      <div class="pd-story-copy pd-reveal">
        <span class="pd-story-step">04 — {{ __('ui.pd_battery') }}</span>
        <p class="eyebrow">@pc('battery.eyebrow', '')</p>
        <h2>@pcRaw('battery.title', '')</h2>
        <p class="pd-story-lede">@pc('battery.description', '')</p>
        @if($batteryItems->isNotEmpty())
          <ul class="pd-feature-list">
            @foreach($batteryItems as $i => $item)
              <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
            @endforeach
          </ul>
        @endif
      </div>
    </article>

    {{-- 05 · TASARIM ──────────────────────────── --}}
    @php $cinemaCount = max($cinemaMedia->count(), $cinemaSlides->count(), 1); @endphp
    <section class="pd-story-cinema" id="pd-design" data-pd-section="pd-design" style="--slides: {{ $cinemaCount }};">
      <div class="pd-story-cinema-sticky">
        <div class="pd-story-cinema-visual">
          @foreach($cinemaMedia as $i => $media)
            <div class="pd-story-cinema-img{{ $i === 0 ? ' is-active' : '' }}" data-cinema-idx="{{ $i }}">
              <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}" loading="lazy" decoding="async" />
            </div>
          @endforeach
          <span class="pd-story-cinema-halo" aria-hidden="true"></span>
        </div>
        <div class="pd-story-cinema-copy">
          <span class="pd-story-step">05 — {{ __('ui.pd_design') }}</span>
          <div class="pd-story-cinema-caps">
            @foreach($cinemaSlides as $i => $slide)
              <div class="pd-story-cinema-cap{{ $i === 0 ? ' is-active' : '' }}" data-cinema-idx="{{ $i }}">
                @if(!empty($slide['eyebrow']))<p class="eyebrow">{{ $slide['eyebrow'] }}</p>@endif
                @if(!empty($slide['title']))<h2>{!! $slide['title'] !!}</h2>@endif
                @if(!empty($slide['description']))<p class="pd-story-lede">{{ $slide['description'] }}</p>@endif
              </div>
            @endforeach
          </div>
          @if($cinemaSlides->count() > 1)
            <div class="pd-story-cinema-dots" aria-hidden="true">
              @for($d = 0; $d < $cinemaSlides->count(); $d++)
                <span class="pd-story-cinema-dot{{ $d === 0 ? ' is-active' : '' }}"></span>
              @endfor
            </div>
          @endif
        </div>
      </div>
    </section>

  </section>

  {{-- ═══════════════════════════════════════ FULL SPECS ════════ --}}
  <section class="pd-specs-section" id="pd-specs" data-pd-section="pd-specs">
    <div class="wrap">
      <p class="eyebrow pd-reveal">@pc('specs_section.eyebrow', '')</p>
      <h2 class="pd-reveal pd-reveal-delay-1">@pcRaw('specs_section.title', '')</h2>

      <div class="pd-specs-table">
        @foreach($product->specs ?? [] as $spec)
          <div class="pd-spec-row">
            <div class="pd-spec-row-k">{{ $spec['key'] ?? '' }}</div>
            <div class="pd-spec-row-v">{{ $spec['value'] ?? '' }}@if(!empty($spec['note']))<span class="pd-spec-row-sub">{{ $spec['note'] }}</span>@endif</div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ═══════════════════════════════════════ COMPATIBLE ACCESSORIES ══ --}}
  @include('pages.partials.product-compatible-accessories')

  {{-- ═══════════════════════════════════════ BUY ════════════════ --}}
  <section class="pd-buy" id="pd-buy" data-pd-section="pd-buy">
    <div class="wrap pd-reveal">
      <p class="eyebrow" style="justify-content:center">@pc('buy_section.eyebrow', '')</p>
      <h2>@pcRaw('buy_section.title', '')</h2>
      <div class="pd-buy-price">
        <strong>{{ $product->priceLabel() ?: __('ui.ph_buy_price') }}</strong>
        @if($product->price !== null)<span style="color: var(--muted); margin-left: 8px;">{{ __('ui.price_tax_included') }}</span>@endif
      </div>
      <div class="pd-buy-actions">
        <form method="POST" action="{{ ($locale ?? 'tr') === 'en' ? route('en.cart.add', $product->slug) : route('cart.add', $product->slug) }}" style="display:inline;">
          @csrf
          <button type="submit" class="btn btn-primary" style="font-size:16px; height:52px; padding:0 32px;">{{ __('ui.btn_add_to_cart') }}</button>
        </form>
        <a href="#pd-specs" class="btn btn-ghost" style="font-size:16px; height:52px; padding:0 32px;">{{ __('ui.ph_buy_cta2') }}</a>
      </div>
      <p class="pd-buy-note">{{ __('ui.ph_buy_note') }}</p>
    </div>
  </section>

</article>

@endsection

@push('scripts')
<script src="{{ asset('js/phone-detail.js') }}"></script>
@endpush
