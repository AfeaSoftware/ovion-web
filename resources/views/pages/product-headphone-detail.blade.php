@extends('main')

@section('title', $product->seo?->title ?? $product->name)
@section('description', $product->seo?->description ?? $product->tagline ?? __('ui.hp_meta_desc'))
@section('theme', 'dark')

@push('preload')
@php $heroPreload = $product->heroUrl('webp') ?? $product->heroUrl(); @endphp
@if($heroPreload)
<link rel="preload" as="image" href="{{ $heroPreload }}" fetchpriority="high" />
@elseif(file_exists(public_path('assets/h1-hero.png')))
<link rel="preload" as="image" href="{{ asset('assets/h1-hero.png') }}" fetchpriority="high" />
@endif
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/headphone-detail.css') }}" />
@endpush

@section('content')

@php
  $heroImg = $product->heroUrl('webp') ?? $product->heroUrl() ?? (file_exists(public_path('assets/h1-hero.png')) ? asset('assets/h1-hero.png') : null);
  $ancImg = $product->getFirstMediaUrl('anc', 'webp') ?: $product->getFirstMediaUrl('anc') ?: (file_exists(public_path('assets/h1-anc.png')) ? asset('assets/h1-anc.png') : null);
  $soundImg = $product->getFirstMediaUrl('sound', 'webp') ?: $product->getFirstMediaUrl('sound') ?: (file_exists(public_path('assets/h1-sound.png')) ? asset('assets/h1-sound.png') : null);
  $designImg = $product->getFirstMediaUrl('headphone_design', 'webp') ?: $product->getFirstMediaUrl('headphone_design') ?: (file_exists(public_path('assets/h1-design.png')) ? asset('assets/h1-design.png') : null);
  $stripStats = collect($product->strip_stats ?? []);
  $ancCards = collect(data_get($product->content, 'anc.cards') ?? []);
  $ancDb = data_get($product->content, 'anc.db_value') ?: '38';
  $soundItems = collect(data_get($product->content, 'sound.items') ?? []);
  $designItems = collect(data_get($product->content, 'design.items') ?? []);
  $batteryStats = collect(data_get($product->content, 'battery.stats') ?? []);
  $connectivityCards = collect(data_get($product->content, 'connectivity.cards') ?? []);
@endphp

{{-- ═══════════════════════════════════════ SUB-NAV ════════ --}}
<div class="hd-subnav" id="hd-subnav">
  <div class="wrap hd-subnav-inner">
    <button class="hd-subnav-arrow hd-subnav-arrow--prev" aria-label="{{ __('ui.nav_prev') }}" data-hidden>
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M9 2L4 7l5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <ul class="hd-subnav-links">
      <li><a class="hd-subnav-link" href="#hd-hero">{{ __('ui.pd_overview') }}</a></li>
      <li><a class="hd-subnav-link" href="#pd-anc">{{ __('ui.pd_anc') }}</a></li>
      <li><a class="hd-subnav-link" href="#pd-sound">{{ __('ui.pd_sound') }}</a></li>
      <li><a class="hd-subnav-link" href="#pd-design">{{ __('ui.pd_design') }}</a></li>
      <li><a class="hd-subnav-link" href="#pd-connectivity">{{ __('ui.pd_connectivity') }}</a></li>
      <li><a class="hd-subnav-link" href="#pd-specs">{{ __('ui.pd_specs') }}</a></li>
    </ul>
    <button class="hd-subnav-arrow hd-subnav-arrow--next" aria-label="{{ __('ui.nav_next') }}">
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M5 2l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <a href="#pd-buy" class="hd-subnav-cta">
      {{ $product->cta_primary ?: __('ui.pd_buy_hp') }}
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
    <p class="hd-hero-sub">{{ $product->tagline ?: __('ui.hp_hero_sub') }}</p>
  </div>

  <div class="hd-hero-img">
    @if($heroImg)
      <img src="{{ $heroImg }}" alt="{{ $product->name }}" width="800" height="700" fetchpriority="high" decoding="async" />
    @else
      <div class="hd-hero-placeholder" aria-label="{{ $product->name }}">
        <div class="hd-ph-band"></div>
        <div class="hd-ph-arm-l"></div>
        <div class="hd-ph-arm-r"></div>
        <div class="hd-ph-cup-l"></div>
        <div class="hd-ph-cup-r"></div>
      </div>
    @endif
  </div>

  <div class="hd-hero-bottom">
    <div class="hd-hero-actions">
      <a href="{{ $product->buy_url ?: '#pd-buy' }}" class="btn-hd-primary">{{ $product->cta_primary ?: __('ui.hp_hero_buy') }}</a>
      <a href="{{ $product->cta_secondary_url ?: '#pd-specs' }}" class="btn btn-ghost" style="height:52px;padding:0 32px;font-size:16px;">{{ $product->cta_secondary ?: __('ui.hp_hero_specs') }}</a>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ SPEC STRIP ══════ --}}
<section class="hd-specs-strip" aria-label="{{ __('ui.hp_strip_aria') }}">
  <div class="wrap hd-specs-row">
    @if($stripStats->isNotEmpty())
      @foreach($stripStats as $i => $stat)
        <div class="hd-spec-item hd-reveal{{ $i > 0 ? ' hd-reveal-delay-'.min($i, 3) : '' }}">
          <span class="hd-spec-val">{{ $stat['value'] ?? '' }}</span>
          <span class="hd-spec-lbl">{{ $stat['label'] ?? '' }}</span>
        </div>
      @endforeach
    @else
      <div class="hd-spec-item hd-reveal">
        <span class="hd-spec-val">30 <span style="font-size:.55em;color:var(--muted);font-weight:400;">{{ __('ui.hp_strip1_unit') }}</span></span>
        <span class="hd-spec-lbl">{{ __('ui.hp_strip1_lbl') }}</span>
      </div>
      <div class="hd-spec-item hd-reveal hd-reveal-delay-1">
        <span class="hd-spec-val">40 <span style="font-size:.55em;color:var(--muted);font-weight:400;">{{ __('ui.hp_strip2_unit') }}</span></span>
        <span class="hd-spec-lbl">{{ __('ui.hp_strip2_lbl') }}</span>
      </div>
      <div class="hd-spec-item hd-reveal hd-reveal-delay-2">
        <span class="hd-spec-val hd-spec-val--blue">ANC</span>
        <span class="hd-spec-lbl">{{ __('ui.hp_strip3_lbl') }}</span>
      </div>
      <div class="hd-spec-item hd-reveal hd-reveal-delay-2">
        <span class="hd-spec-val">3</span>
        <span class="hd-spec-lbl">{{ __('ui.hp_strip4_lbl') }}</span>
      </div>
      <div class="hd-spec-item hd-reveal hd-reveal-delay-3">
        <span class="hd-spec-val hd-spec-val--blue">BT 5.3</span>
        <span class="hd-spec-lbl">{{ __('ui.hp_strip5_lbl') }}</span>
      </div>
    @endif
  </div>
</section>

{{-- ═══════════════════════════════════════ ANC BILLBOARD ═══ --}}
<section class="hd-billboard" id="pd-anc" data-pd-section="pd-anc">
  <div class="hd-billboard-media">
    @if($ancImg)
      <img src="{{ $ancImg }}" alt="{{ $product->name }}" loading="lazy" decoding="async" width="1600" height="900" />
    @else
      <div class="hd-billboard-placeholder">
        <div class="hd-billboard-placeholder-inner" aria-hidden="true">ANC</div>
      </div>
    @endif
  </div>
  <div class="hd-billboard-overlay" aria-hidden="true"></div>
  <div class="hd-billboard-content hd-reveal">
    <p class="eyebrow" style="color:rgba(10,132,255,.9)">@pc('anc.eyebrow', 'ui.hp_anc_ey')</p>
    <h2>@pcRaw('anc.title', 'ui.hp_anc_title')</h2>
    <p>@pc('anc.description', 'ui.hp_anc_desc')</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ ANC FEATURES ════ --}}
<section class="hd-cards-section" id="pd-anc-features" data-pd-section="pd-anc">
  <div class="wrap">
    <p class="eyebrow hd-reveal">@pc('anc_cards.eyebrow', 'ui.hp_ancf_ey')</p>
    <h2 class="hd-reveal hd-reveal-delay-1">@pcRaw('anc_cards.title', 'ui.hp_ancf_title')</h2>

    <div class="hd-cards-grid">
      @if($ancCards->isNotEmpty())
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
      @else
        @foreach(range(1, 3) as $i)
          <div class="hd-card hd-reveal{{ $i > 1 ? ' hd-reveal-delay-'.($i - 1) : '' }}">
            <div class="hd-card-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/></svg>
            </div>
            <h3>{{ __('ui.hp_ancf_c'.$i.'_title') }}</h3>
            <p>{{ __('ui.hp_ancf_c'.$i.'_desc') }}</p>
          </div>
        @endforeach
      @endif
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

{{-- ═══════════════════════════════════════ SOUND SPLIT ══════ --}}
<section class="hd-split" id="pd-sound" data-pd-section="pd-sound">
  <div class="hd-split-media">
    @if($soundImg)
      <img src="{{ $soundImg }}" alt="{{ $product->name }}" loading="lazy" decoding="async" width="900" height="900" />
    @else
      <div class="hd-split-placeholder">
        <div class="hd-split-ph-headphone" aria-hidden="true">
          <div class="ph-band"></div>
          <div class="ph-arm-l"></div>
          <div class="ph-arm-r"></div>
          <div class="ph-cup-l"></div>
          <div class="ph-cup-r"></div>
        </div>
      </div>
    @endif
  </div>
  <div class="hd-split-copy hd-reveal">
    <p class="eyebrow">@pc('sound.eyebrow', 'ui.hp_sound_ey')</p>
    <h2>@pcRaw('sound.title', 'ui.hp_sound_title')</h2>
    <p>@pc('sound.description', 'ui.hp_sound_desc')</p>
    <ul class="hd-feature-list">
      @if($soundItems->isNotEmpty())
        @foreach($soundItems as $i => $item)
          <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
        @endforeach
      @else
        <li data-n="01">{{ __('ui.hp_sound_li1') }}</li>
        <li data-n="02">{{ __('ui.hp_sound_li2') }}</li>
        <li data-n="03">{{ __('ui.hp_sound_li3') }}</li>
        <li data-n="04">{{ __('ui.hp_sound_li4') }}</li>
      @endif
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ DESIGN SPLIT ═════ --}}
<section class="hd-split hd-split--flip" id="pd-design" data-pd-section="pd-design" style="background:var(--bg-2);">
  <div class="hd-split-copy hd-reveal" style="background:var(--bg-2);">
    <p class="eyebrow">@pc('design.eyebrow', 'ui.hp_design_ey')</p>
    <h2>@pcRaw('design.title', 'ui.hp_design_title')</h2>
    <p>@pc('design.description', 'ui.hp_design_desc')</p>
    <ul class="hd-feature-list">
      @if($designItems->isNotEmpty())
        @foreach($designItems as $i => $item)
          <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
        @endforeach
      @else
        <li data-n="01">{{ __('ui.hp_design_li1') }}</li>
        <li data-n="02">{{ __('ui.hp_design_li2') }}</li>
        <li data-n="03">{{ __('ui.hp_design_li3') }}</li>
        <li data-n="04">{{ __('ui.hp_design_li4') }}</li>
      @endif
    </ul>
  </div>
  <div class="hd-split-media">
    @if($designImg)
      <img src="{{ $designImg }}" alt="{{ $product->name }}" loading="lazy" decoding="async" width="900" height="900" />
    @else
      <div class="hd-split-placeholder">
        <div class="hd-split-ph-headphone" aria-hidden="true">
          <div class="ph-band"></div>
          <div class="ph-arm-l"></div>
          <div class="ph-arm-r"></div>
          <div class="ph-cup-l"></div>
          <div class="ph-cup-r"></div>
        </div>
      </div>
    @endif
  </div>
</section>

{{-- ═══════════════════════════════════════ BATTERY BILLBOARD ══ --}}
<section class="hd-battery-billboard" id="pd-battery" data-pd-section="pd-battery">
  <div class="hd-battery-billboard-inner">
    <p class="eyebrow hd-reveal" style="color:var(--hd-teal);justify-content:center;">@pc('battery.eyebrow', 'ui.hp_bat_ey')</p>
    <h2 class="hd-reveal hd-reveal-delay-1">@pcRaw('battery.title', 'ui.hp_bat_title')</h2>
    <p class="hd-reveal hd-reveal-delay-2" style="color:rgba(255,255,255,.65);max-width:40ch;margin:0 auto;font-size:clamp(15px,1.3vw,18px);">
      @pc('battery.description', 'ui.hp_bat_desc')
    </p>
    <div class="hd-battery-stats hd-reveal hd-reveal-delay-3">
      @if($batteryStats->isNotEmpty())
        @foreach($batteryStats as $stat)
          <div class="hd-battery-stat">
            <span class="hd-battery-stat-val">{{ $stat['value'] ?? '' }}</span>
            <span class="hd-battery-stat-lbl">{{ $stat['label'] ?? '' }}</span>
          </div>
        @endforeach
      @else
        <div class="hd-battery-stat"><span class="hd-battery-stat-val">{{ __('ui.hp_bat_s1_val') }}</span><span class="hd-battery-stat-lbl">{{ __('ui.hp_bat_s1_lbl') }}</span></div>
        <div class="hd-battery-stat"><span class="hd-battery-stat-val">{{ __('ui.hp_bat_s2_val') }}</span><span class="hd-battery-stat-lbl">{{ __('ui.hp_bat_s2_lbl') }}</span></div>
        <div class="hd-battery-stat"><span class="hd-battery-stat-val">{{ __('ui.hp_bat_s3_val') }}</span><span class="hd-battery-stat-lbl">{{ __('ui.hp_bat_s3_lbl') }}</span></div>
      @endif
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ CONNECTIVITY CARDS ══ --}}
<section class="hd-cards-section" id="pd-connectivity" data-pd-section="pd-connectivity" style="background:var(--bg);">
  <div class="wrap">
    <p class="eyebrow hd-reveal">@pc('connectivity.eyebrow', 'ui.hp_conn_ey')</p>
    <h2 class="hd-reveal hd-reveal-delay-1">@pcRaw('connectivity.title', 'ui.hp_conn_title')</h2>

    <div class="hd-cards-grid">
      @if($connectivityCards->isNotEmpty())
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
      @else
        @foreach(range(1, 3) as $i)
          <div class="hd-card hd-reveal{{ $i > 1 ? ' hd-reveal-delay-'.($i - 1) : '' }}">
            <div class="hd-card-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="5" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>
            </div>
            <h3>{{ __('ui.hp_conn_c'.$i.'_title') }}</h3>
            <p>{{ __('ui.hp_conn_c'.$i.'_desc') }}</p>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ FULL SPECS ═══════ --}}
<section class="hd-specs-section" id="pd-specs" data-pd-section="pd-specs">
  <div class="wrap">
    <p class="eyebrow hd-reveal">@pc('specs_section.eyebrow', 'ui.hp_specs_ey')</p>
    <h2 class="hd-reveal hd-reveal-delay-1">@pcRaw('specs_section.title', 'ui.hp_specs_title')</h2>

    <div class="hd-specs-table">
      @if(!empty($product->specs))
        @foreach($product->specs as $spec)
          <div class="hd-spec-row">
            <div class="hd-spec-row-k">{{ $spec['key'] ?? '' }}</div>
            <div class="hd-spec-row-v">{{ $spec['value'] ?? '' }}@if(!empty($spec['note']))<span class="hd-spec-row-sub">{{ $spec['note'] }}</span>@endif</div>
          </div>
        @endforeach
      @else
        @foreach (['driver','freq','imp','bat','anc','bt','codec','w','conn','war'] as $row)
          <div class="hd-spec-row">
            <div class="hd-spec-row-k">{{ __('ui.hp_spec_'.$row.'_k') }}</div>
            <div class="hd-spec-row-v">{{ __('ui.hp_spec_'.$row.'_v') }}<span class="hd-spec-row-sub">{{ __('ui.hp_spec_'.$row.'_s') }}</span></div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ BUY ══════════════ --}}
<section class="hd-buy" id="pd-buy" data-pd-section="pd-buy">
  <div class="wrap hd-reveal">
    <p class="eyebrow" style="justify-content:center;">@pc('buy_section.eyebrow', 'ui.hp_buy_ey')</p>
    <h2>@pcRaw('buy_section.title', 'ui.hp_buy_title')</h2>
    <div class="hd-buy-price">
      <strong>{{ $product->price_label ?: __('ui.hp_buy_price') }}</strong>{{ $product->price_note ? ' · '.$product->price_note : ' · '.__('ui.hp_buy_shipping') }}
    </div>
    <div class="hd-buy-actions">
      <a href="{{ $product->buy_url ?: '#' }}" class="btn-hd-primary">{{ $product->cta_primary ?: __('ui.hp_buy_cta1') }}</a>
      <a href="{{ $product->cta_secondary_url ?: '#pd-specs' }}" class="btn btn-ghost" style="height:52px;padding:0 32px;font-size:16px;">{{ $product->cta_secondary ?: __('ui.hp_buy_cta2') }}</a>
    </div>
    <p class="hd-buy-note">{{ __('ui.hp_buy_note') }}</p>
  </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/headphone-detail.js') }}"></script>
@endpush
