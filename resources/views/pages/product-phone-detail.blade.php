@extends('main')

@section('title', $product->seo?->title ?? $product->name)
@section('description', $product->seo?->description ?? $product->tagline ?? __('ui.ph_meta_desc'))
@section('theme', 'dark')

@push('preload')
@php $heroPreload = $product->heroUrl('webp') ?? $product->heroUrl(); @endphp
<link rel="preload" as="image" href="{{ $heroPreload ?? asset('assets/v11-hero.png') }}" fetchpriority="high" />
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/phone-detail.css') }}" />
@endpush

@section('content')

@php
  $heroImg = $product->heroUrl('webp') ?? $product->heroUrl() ?? asset('assets/v11-hero.png');
  $cameraImg = $product->getFirstMediaUrl('camera', 'webp') ?: $product->getFirstMediaUrl('camera') ?: asset('assets/v11-duo.png');
  $displayImg = $product->getFirstMediaUrl('display', 'webp') ?: $product->getFirstMediaUrl('display') ?: asset('assets/v11-front.png');
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
      {{ $product->cta_primary ?: __('ui.pd_buy_phone') }}
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
    <img src="{{ $heroImg }}"
         alt="{{ $product->name }}"
         width="900" height="1100"
         fetchpriority="high" decoding="async" />
  </div>

  <div class="pd-hero-bottom">
    <p class="pd-hero-sub" style="margin:0;">@pc('hero.byline', 'ui.ph_hero_byline')</p>
    <div class="pd-hero-actions">
      <a href="{{ $product->buy_url ?: '#pd-buy' }}" class="btn btn-primary">{{ $product->cta_primary ?: __('ui.ph_hero_buy') }}</a>
      <a href="{{ $product->cta_secondary_url ?: '#pd-specs' }}" class="btn btn-ghost">{{ $product->cta_secondary ?: __('ui.ph_hero_specs') }}</a>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ SPEC STRIP ══════ --}}
<section class="pd-specs-strip" aria-label="{{ __('ui.ph_strip_aria') }}">
  <div class="wrap pd-specs-row">
    @if($stripStats->isNotEmpty())
      @foreach($stripStats as $i => $stat)
        <div class="pd-spec-item pd-reveal{{ $i > 0 ? ' pd-reveal-delay-'.min($i, 3) : '' }}">
          <span class="pd-spec-val">{{ $stat['value'] ?? '' }}</span>
          <span class="pd-spec-lbl">{{ $stat['label'] ?? '' }}</span>
        </div>
      @endforeach
    @else
      <div class="pd-spec-item pd-reveal">
        <span class="pd-spec-val" data-count="6.56" data-suffix="″" data-decimals="2">6.56″</span>
        <span class="pd-spec-lbl">{{ __('ui.ph_strip1_lbl') }}</span>
      </div>
      <div class="pd-spec-item pd-reveal pd-reveal-delay-1">
        <span class="pd-spec-val" data-count="50" data-suffix=" MP">50 MP</span>
        <span class="pd-spec-lbl">{{ __('ui.ph_strip2_lbl') }}</span>
      </div>
      <div class="pd-spec-item pd-reveal pd-reveal-delay-2">
        <span class="pd-spec-val" data-count="5000" data-suffix=" mAh">5000 mAh</span>
        <span class="pd-spec-lbl">{{ __('ui.ph_strip3_lbl') }}</span>
      </div>
      <div class="pd-spec-item pd-reveal pd-reveal-delay-3">
        <span class="pd-spec-val" data-count="8.45" data-suffix=" mm" data-decimals="2">8.45 mm</span>
        <span class="pd-spec-lbl">{{ __('ui.ph_strip4_lbl') }}</span>
      </div>
      <div class="pd-spec-item pd-reveal pd-reveal-delay-3">
        <span class="pd-spec-val">{{ __('ui.ph_strip5_val') }}</span>
        <span class="pd-spec-lbl">{{ __('ui.ph_strip5_lbl') }}</span>
      </div>
    @endif
  </div>
</section>

{{-- ═══════════════════════════════════════ CAMERA BILLBOARD ══ --}}
<section class="pd-feature pd-billboard" id="pd-camera" data-pd-section="pd-camera">
  <div class="pd-billboard-media">
    <img src="{{ $cameraImg }}"
         alt="{{ $product->name }}"
         loading="lazy" decoding="async"
         width="1600" height="900" />
  </div>
  <div class="pd-billboard-overlay" aria-hidden="true"></div>
  <div class="pd-billboard-content pd-reveal">
    <p class="eyebrow">@pc('camera.eyebrow', 'ui.ph_cam_ey')</p>
    <h2>@pcRaw('camera.title', 'ui.ph_cam_title')</h2>
    <p>@pc('camera.description', 'ui.ph_cam_desc')</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ CAMERA FEATURES ══ --}}
<section class="pd-cards-section pd-feature" id="pd-camera-features">
  <div class="wrap">
    <p class="eyebrow pd-reveal">@pc('camera_cards.eyebrow', 'ui.ph_camf_ey')</p>
    <h2 class="pd-reveal pd-reveal-delay-1">@pcRaw('camera_cards.title', 'ui.ph_camf_title')</h2>
    <div class="pd-cards-grid">
      @if($cameraCards->isNotEmpty())
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
      @else
        @foreach (range(1, 6) as $i)
          <div class="pd-card pd-reveal{{ $i > 1 ? ' pd-reveal-delay-'.min(($i - 1) % 3, 2) : '' }}">
            <div class="pd-card-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><rect x="3" y="3" width="18" height="18" rx="4"/></svg>
            </div>
            <h3>{{ __('ui.ph_camf_c'.$i.'_title') }}</h3>
            <p>{{ __('ui.ph_camf_c'.$i.'_desc') }}</p>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ DISPLAY BILLBOARD ══ --}}
<section class="pd-feature pd-billboard" id="pd-display" data-pd-section="pd-display" style="background:var(--bg-2);">
  <div class="pd-billboard-media">
    <img src="{{ $displayImg }}"
         alt="{{ $product->name }}"
         loading="lazy" decoding="async"
         width="1000" height="1250"
         style="object-position: center center;" />
  </div>
  <div class="pd-billboard-overlay" aria-hidden="true"></div>
  <div class="pd-billboard-content pd-reveal">
    <p class="eyebrow">@pc('display.eyebrow', 'ui.ph_disp_ey')</p>
    <h2>@pcRaw('display.title', 'ui.ph_disp_title')</h2>
    <p>@pc('display.description', 'ui.ph_disp_desc')</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ DISPLAY SPLIT ══════ --}}
<section class="pd-split" id="pd-display-split">
  <div class="pd-split-media" style="background:#f0f1f3;">
    <img src="{{ asset('assets/v11-landscape.png') }}"
         alt="{{ $product->name }}"
         loading="lazy" decoding="async"
         width="1000" height="500"
         style="object-fit:contain; padding: 32px;" />
  </div>
  <div class="pd-split-copy pd-reveal">
    <p class="eyebrow">@pc('display_list.eyebrow', 'ui.ph_dispt_ey')</p>
    <h2>@pcRaw('display_list.title', 'ui.ph_dispt_title')</h2>
    <p>@pc('display_list.description', 'ui.ph_dispt_desc')</p>
    <ul class="pd-feature-list">
      @if($displayItems->isNotEmpty())
        @foreach($displayItems as $i => $item)
          <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
        @endforeach
      @else
        <li data-n="01">{{ __('ui.ph_dispt_li1') }}</li>
        <li data-n="02">{{ __('ui.ph_dispt_li2') }}</li>
        <li data-n="03">{{ __('ui.ph_dispt_li3') }}</li>
        <li data-n="04">{{ __('ui.ph_dispt_li4') }}</li>
      @endif
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ DESIGN (CINEMA SCROLL) ══ --}}
<div id="pd-design" data-pd-section="pd-design" class="pd-cinema-wrap">
  <div class="pd-cinema-sticky">

    @if($cinemaMedia->isNotEmpty())
      @foreach($cinemaMedia as $i => $media)
        <div class="pd-cinema-img{{ $i === 0 ? ' is-active' : '' }}" data-cinema-idx="{{ $i }}">
          <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}" loading="lazy" decoding="async" />
        </div>
      @endforeach
    @else
      @foreach(['v11-back', 'v11-side-a', 'v11-side-b', 'v11-pair'] as $i => $img)
        <div class="pd-cinema-img{{ $i === 0 ? ' is-active' : '' }}" data-cinema-idx="{{ $i }}">
          <img src="{{ asset('assets/'.$img.'.png') }}" alt="{{ $product->name }}" loading="lazy" decoding="async" />
        </div>
      @endforeach
    @endif

    @if($cinemaSlides->isNotEmpty())
      @foreach($cinemaSlides as $i => $slide)
        <div class="pd-cinema-caption{{ $i === 0 ? ' is-active' : '' }}" data-cinema-idx="{{ $i }}">
          @if(!empty($slide['eyebrow']))<p class="eyebrow" style="color:rgba(255,255,255,.55)">{{ $slide['eyebrow'] }}</p>@endif
          @if(!empty($slide['title']))<h3>{{ $slide['title'] }}</h3>@endif
          @if(!empty($slide['description']))<p>{{ $slide['description'] }}</p>@endif
        </div>
      @endforeach
    @else
      @foreach ([1, 2, 3, 4] as $i)
        <div class="pd-cinema-caption{{ $i === 1 ? ' is-active' : '' }}" data-cinema-idx="{{ $i - 1 }}">
          <p class="eyebrow" style="color:rgba(255,255,255,.55)">{{ __('ui.ph_cin'.$i.'_ey') }}</p>
          <h3>{!! __('ui.ph_cin'.$i.'_title') !!}</h3>
          <p>{{ __('ui.ph_cin'.$i.'_desc') }}</p>
        </div>
      @endforeach
    @endif

    <div class="pd-cinema-dots" aria-hidden="true">
      @php $slideCount = $cinemaSlides->isNotEmpty() ? $cinemaSlides->count() : 4; @endphp
      @for($d = 0; $d < $slideCount; $d++)
        <div class="pd-cinema-dot{{ $d === 0 ? ' is-active' : '' }}"></div>
      @endfor
    </div>

  </div>
</div>

{{-- ═══════════════════════════════════════ PERFORMANCE ════════ --}}
<section class="pd-cards-section pd-feature pd-feature--mid" id="pd-performance" data-pd-section="pd-performance">
  <div class="wrap">
    <p class="eyebrow pd-reveal">@pc('performance.eyebrow', 'ui.ph_perf_ey')</p>
    <h2 class="pd-reveal pd-reveal-delay-1">@pcRaw('performance.title', 'ui.ph_perf_title')</h2>
    <div class="pd-cards-grid">
      @if($performanceCards->isNotEmpty())
        @foreach($performanceCards as $i => $card)
          <div class="pd-card pd-reveal{{ $i > 0 ? ' pd-reveal-delay-'.min($i % 3, 2) : '' }}">
            <x-product-icon :icon="$card['icon'] ?? 'star'" />
            @if(!empty($card['metric']))<div class="pd-card-num">{{ $card['metric'] }}</div>@endif
            @if(!empty($card['title']))<h3>{{ $card['title'] }}</h3>@endif
            @if(!empty($card['description']))<p>{{ $card['description'] }}</p>@endif
          </div>
        @endforeach
      @else
        @foreach(range(1, 6) as $i)
          <div class="pd-card pd-reveal{{ $i > 1 ? ' pd-reveal-delay-'.min(($i - 1) % 3, 2) : '' }}">
            <div class="pd-card-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
            </div>
            <h3>{{ __('ui.ph_perf_c'.$i.'_title') }}</h3>
            <p>{{ __('ui.ph_perf_c'.$i.'_desc') }}</p>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ SPLIT — BATTERY ════ --}}
<section class="pd-split pd-split--flip" style="background: var(--bg);">
  <div class="pd-split-media">
    <img src="{{ asset('assets/v11-pair.png') }}"
         alt="{{ $product->name }}"
         loading="lazy" decoding="async"
         width="1000" height="1250" />
  </div>
  <div class="pd-split-copy pd-reveal" style="background: var(--bg);">
    <p class="eyebrow">@pc('battery.eyebrow', 'ui.ph_bat_ey')</p>
    <h2>@pcRaw('battery.title', 'ui.ph_bat_title')</h2>
    <p>@pc('battery.description', 'ui.ph_bat_desc')</p>
    <ul class="pd-feature-list" style="margin-top:24px;">
      @if($batteryItems->isNotEmpty())
        @foreach($batteryItems as $i => $item)
          <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
        @endforeach
      @else
        <li data-n="01">{{ __('ui.ph_bat_li1') }}</li>
        <li data-n="02">{{ __('ui.ph_bat_li2') }}</li>
        <li data-n="03">{{ __('ui.ph_bat_li3') }}</li>
      @endif
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ FULL SPECS ════════ --}}
<section class="pd-specs-section" id="pd-specs" data-pd-section="pd-specs">
  <div class="wrap">
    <p class="eyebrow pd-reveal">@pc('specs_section.eyebrow', 'ui.ph_specs_ey')</p>
    <h2 class="pd-reveal pd-reveal-delay-1">@pcRaw('specs_section.title', 'ui.ph_specs_title')</h2>

    <div class="pd-specs-table">
      @if(!empty($product->specs))
        @foreach($product->specs as $spec)
          <div class="pd-spec-row">
            <div class="pd-spec-row-k">{{ $spec['key'] ?? '' }}</div>
            <div class="pd-spec-row-v">{{ $spec['value'] ?? '' }}@if(!empty($spec['note']))<span class="pd-spec-row-sub">{{ $spec['note'] }}</span>@endif</div>
          </div>
        @endforeach
      @else
        @foreach (['disp','cpu','mem','cam','fcam','bat','os','conn','sec','dim','sim','color'] as $row)
          <div class="pd-spec-row">
            <div class="pd-spec-row-k">{{ __('ui.ph_spec_'.$row.'_k') }}</div>
            <div class="pd-spec-row-v">{{ __('ui.ph_spec_'.$row.'_v') }}<span class="pd-spec-row-sub">{{ __('ui.ph_spec_'.$row.'_s') }}</span></div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ BUY ════════════════ --}}
<section class="pd-buy" id="pd-buy" data-pd-section="pd-buy">
  <div class="wrap pd-reveal">
    <p class="eyebrow" style="justify-content:center">@pc('buy_section.eyebrow', 'ui.ph_buy_ey')</p>
    <h2>@pcRaw('buy_section.title', 'ui.ph_buy_title')</h2>
    <div class="pd-buy-price">
      <strong>{{ $product->price_label ?: __('ui.ph_buy_price') }}</strong>{{ $product->price_note ? ' · '.$product->price_note : __('ui.ph_buy_price_sub') }}
    </div>
    <div class="pd-buy-actions">
      <a href="{{ $product->buy_url ?: '#' }}" class="btn btn-primary" style="font-size:16px; height:52px; padding:0 32px;">{{ $product->cta_primary ?: __('ui.ph_buy_cta1') }}</a>
      <a href="{{ $product->cta_secondary_url ?: '#pd-specs' }}" class="btn btn-ghost" style="font-size:16px; height:52px; padding:0 32px;">{{ $product->cta_secondary ?: __('ui.ph_buy_cta2') }}</a>
    </div>
    <p class="pd-buy-note">{{ __('ui.ph_buy_note') }}</p>
  </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/phone-detail.js') }}"></script>
@endpush
