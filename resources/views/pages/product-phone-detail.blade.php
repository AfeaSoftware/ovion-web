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
  $cameraImg = $product->getFirstMediaUrl('camera', 'webp') ?: ($product->getFirstMediaUrl('camera') ?: null);
  $displayImg = $product->getFirstMediaUrl('display', 'webp') ?: ($product->getFirstMediaUrl('display') ?: null);
  $stripStats = collect($product->strip_stats ?? []);
  $cameraCards = collect(data_get($product->content, 'camera.cards') ?? []);
  $displayItems = collect(data_get($product->content, 'display.items') ?? []);
  $performanceCards = collect(data_get($product->content, 'performance.cards') ?? []);
  $batteryItems = collect(data_get($product->content, 'battery.items') ?? []);
  $cinemaSlides = collect(data_get($product->content, 'cinema.slides') ?? []);
  $cinemaMedia = $product->getMedia('cinema');
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
      <li><a class="pd-subnav-link" href="#pd-design">{{ __('ui.pd_design') }}</a></li>
      <li><a class="pd-subnav-link" href="#pd-performance">{{ __('ui.pd_performance') }}</a></li>
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

{{-- ═══════════════════════════════════════ CAMERA BILLBOARD ══ --}}
<section class="pd-feature pd-billboard" id="pd-camera" data-pd-section="pd-camera">
  <div class="pd-billboard-media">
    @if($cameraImg)
      <img src="{{ $cameraImg }}"
           alt="{{ $product->name }}"
           loading="lazy" decoding="async"
           width="1600" height="900" />
    @endif
  </div>
  <div class="pd-billboard-overlay" aria-hidden="true"></div>
  <div class="pd-billboard-content pd-reveal">
    <p class="eyebrow">@pc('camera.eyebrow', '')</p>
    <h2>@pcRaw('camera.title', '')</h2>
    <p>@pc('camera.description', '')</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ CAMERA FEATURES ══ --}}
<section class="pd-cards-section pd-feature" id="pd-camera-features">
  <div class="wrap">
    <p class="eyebrow pd-reveal">@pc('camera_cards.eyebrow', '')</p>
    <h2 class="pd-reveal pd-reveal-delay-1">@pcRaw('camera_cards.title', '')</h2>
    <div class="pd-cards-grid">
      @foreach($cameraCards as $i => $card)
        <div class="pd-card pd-reveal{{ $i > 0 ? ' pd-reveal-delay-'.min($i % 3, 2) : '' }}">
          <x-product-icon :icon="$card['icon'] ?? 'star'" />
          @if(!empty($card['metric']))
            <div class="pd-card-num">{{ $card['metric'] }}</div>
          @endif
          @if(!empty($card['title']))<h3>{{ $card['title'] }}</h3>@endif
          @if(!empty($card['description']))<p>{{ $card['description'] }}</p>@endif
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ DISPLAY BILLBOARD ══ --}}
<section class="pd-feature pd-billboard" id="pd-display" data-pd-section="pd-display" style="background:var(--bg-2);">
  <div class="pd-billboard-media">
    @if($displayImg)
      <img src="{{ $displayImg }}"
           alt="{{ $product->name }}"
           loading="lazy" decoding="async"
           width="1000" height="1250"
           style="object-position: center center;" />
    @endif
  </div>
  <div class="pd-billboard-overlay" aria-hidden="true"></div>
  <div class="pd-billboard-content pd-reveal">
    <p class="eyebrow">@pc('display.eyebrow', '')</p>
    <h2>@pcRaw('display.title', '')</h2>
    <p>@pc('display.description', '')</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ DISPLAY SPLIT ══════ --}}
<section class="pd-split" id="pd-display-split">
  <div class="pd-split-media">
    @if($displayImg)
      <img src="{{ $displayImg }}"
           alt="{{ $product->name }}"
           loading="lazy" decoding="async"
           width="1000" height="500"
           style="object-fit:contain; padding: 32px;" />
    @endif
  </div>
  <div class="pd-split-copy pd-reveal">
    <p class="eyebrow">@pc('display_list.eyebrow', '')</p>
    <h2>@pcRaw('display_list.title', '')</h2>
    <p>@pc('display_list.description', '')</p>
    <ul class="pd-feature-list">
      @foreach($displayItems as $i => $item)
        <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
      @endforeach
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ DESIGN (CINEMA SCROLL) ══ --}}
<div id="pd-design" data-pd-section="pd-design" class="pd-cinema-wrap">
  <div class="pd-cinema-sticky">

    @foreach($cinemaMedia as $i => $media)
      <div class="pd-cinema-img{{ $i === 0 ? ' is-active' : '' }}" data-cinema-idx="{{ $i }}">
        <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}" loading="lazy" decoding="async" />
      </div>
    @endforeach

    @foreach($cinemaSlides as $i => $slide)
      <div class="pd-cinema-caption{{ $i === 0 ? ' is-active' : '' }}" data-cinema-idx="{{ $i }}">
        @if(!empty($slide['eyebrow']))<p class="eyebrow" style="color:rgba(255,255,255,.55)">{{ $slide['eyebrow'] }}</p>@endif
        @if(!empty($slide['title']))<h3>{!! $slide['title'] !!}</h3>@endif
        @if(!empty($slide['description']))<p>{{ $slide['description'] }}</p>@endif
      </div>
    @endforeach

    @if($cinemaSlides->isNotEmpty())
      <div class="pd-cinema-dots" aria-hidden="true">
        @for($d = 0; $d < $cinemaSlides->count(); $d++)
          <div class="pd-cinema-dot{{ $d === 0 ? ' is-active' : '' }}"></div>
        @endfor
      </div>
    @endif

  </div>
</div>

{{-- ═══════════════════════════════════════ PERFORMANCE ════════ --}}
<section class="pd-cards-section pd-feature pd-feature--mid" id="pd-performance" data-pd-section="pd-performance">
  <div class="wrap">
    <p class="eyebrow pd-reveal">@pc('performance.eyebrow', '')</p>
    <h2 class="pd-reveal pd-reveal-delay-1">@pcRaw('performance.title', '')</h2>
    <div class="pd-cards-grid">
      @foreach($performanceCards as $i => $card)
        <div class="pd-card pd-reveal{{ $i > 0 ? ' pd-reveal-delay-'.min($i % 3, 2) : '' }}">
          <x-product-icon :icon="$card['icon'] ?? 'star'" />
          @if(!empty($card['metric']))<div class="pd-card-num">{{ $card['metric'] }}</div>@endif
          @if(!empty($card['title']))<h3>{{ $card['title'] }}</h3>@endif
          @if(!empty($card['description']))<p>{{ $card['description'] }}</p>@endif
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ SPLIT — BATTERY ════ --}}
@php
  $batteryImg = $product->getFirstMediaUrl('battery_img', 'webp') ?: ($product->getFirstMediaUrl('battery_img') ?: null);
@endphp
<section class="pd-split pd-split--flip" style="background: var(--bg);">
  <div class="pd-split-media">
    @if($batteryImg)
      <img src="{{ $batteryImg }}"
           alt="{{ $product->name }}"
           loading="lazy" decoding="async"
           width="1000" height="1250" />
    @endif
  </div>
  <div class="pd-split-copy pd-reveal" style="background: var(--bg);">
    <p class="eyebrow">@pc('battery.eyebrow', '')</p>
    <h2>@pcRaw('battery.title', '')</h2>
    <p>@pc('battery.description', '')</p>
    <ul class="pd-feature-list" style="margin-top:24px;">
      @foreach($batteryItems as $i => $item)
        <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
      @endforeach
    </ul>
  </div>
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

@endsection

@push('scripts')
<script src="{{ asset('js/phone-detail.js') }}"></script>
@endpush
