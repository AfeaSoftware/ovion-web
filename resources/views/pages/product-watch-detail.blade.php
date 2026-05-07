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
  $heroImg = $product->heroUrl('webp') ?? $product->heroUrl() ?? (file_exists(public_path('assets/s3-hero.png')) ? asset('assets/s3-hero.png') : null);
  $healthImg = $product->getFirstMediaUrl('health', 'webp') ?: $product->getFirstMediaUrl('health') ?: (file_exists(public_path('assets/s3-health.png')) ? asset('assets/s3-health.png') : null);
  $designImg = $product->getFirstMediaUrl('design', 'webp') ?: $product->getFirstMediaUrl('design') ?: (file_exists(public_path('assets/s3-design.png')) ? asset('assets/s3-design.png') : null);
  $activityImg = $product->getFirstMediaUrl('activity', 'webp') ?: $product->getFirstMediaUrl('activity') ?: (file_exists(public_path('assets/s3-activity.png')) ? asset('assets/s3-activity.png') : null);
  $batteryImg = $product->getFirstMediaUrl('battery_img', 'webp') ?: $product->getFirstMediaUrl('battery_img') ?: (file_exists(public_path('assets/s3-side.png')) ? asset('assets/s3-side.png') : null);
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
    </ul>
    <button class="pd-subnav-arrow pd-subnav-arrow--next" aria-label="{{ __('ui.nav_next') }}">
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M5 2l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <a href="#wd-buy" class="pd-subnav-cta" style="background:var(--watch-red,#ff3b30)">
      {{ $product->cta_primary ?: __('ui.pd_buy_watch') }}
      <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</div>

{{-- ═══════════════════════════════════════ HERO ═══════════ --}}
<section class="wd-hero" id="wd-hero" data-wd-section="wd-hero">
  <div class="wd-hero-stage">
    <div class="wd-hero-copy">
      <p class="wd-hero-eyebrow">{{ $product->eyebrow ?: __('ui.wt_hero_eyebrow') }}</p>
      <h1>{{ $product->name }}</h1>
      <p class="wd-hero-tagline">{!! $product->tagline ?: __('ui.wt_hero_tagline') !!}</p>
      <div class="wd-hero-actions">
        <a href="{{ $product->buy_url ?: '#wd-buy' }}" class="btn btn-primary">{{ $product->cta_primary ?: __('ui.wt_hero_buy') }}</a>
        <a href="{{ $product->cta_secondary_url ?: '#wd-specs' }}" class="btn btn-ghost">{{ $product->cta_secondary ?: __('ui.wt_hero_specs') }}</a>
      </div>
    </div>

    <div class="wd-hero-watch">
      <div class="wd-hero-watch-glow" aria-hidden="true"></div>
      @if($heroImg)
        <img src="{{ $heroImg }}" alt="{{ $product->name }}" width="600" height="700" fetchpriority="high" decoding="async" />
      @else
        <div class="wd-hero-watch-placeholder" aria-hidden="true">
          <div class="wd-watch-body">
            <div class="wd-watch-face">
              <div class="wd-watch-time">10:09</div>
              <div class="wd-watch-date">{{ __('ui.wt_hero_date_d') }} 22</div>
              <div class="wd-watch-rings">
                <div class="wd-ring wd-ring--move"></div>
                <div class="wd-ring wd-ring--cal"></div>
                <div class="wd-ring wd-ring--stand"></div>
              </div>
            </div>
          </div>
          <div class="wd-watch-strap wd-watch-strap--top"></div>
          <div class="wd-watch-strap wd-watch-strap--bot"></div>
          <div class="wd-watch-crown"></div>
        </div>
      @endif
    </div>
  </div>

  <div class="wd-hero-strip">
    @if($stripStats->isNotEmpty())
      @foreach($stripStats as $stat)
        <div class="wd-hero-stat">
          <span class="wd-hero-stat-val">{{ $stat['value'] ?? '' }}</span>
          <span class="wd-hero-stat-lbl">{{ $stat['label'] ?? '' }}</span>
        </div>
      @endforeach
    @else
      <div class="wd-hero-stat"><span class="wd-hero-stat-val">{{ __('ui.wt_strip1_val') }}</span><span class="wd-hero-stat-lbl">{{ __('ui.wt_strip1_lbl') }}</span></div>
      <div class="wd-hero-stat"><span class="wd-hero-stat-val">100+</span><span class="wd-hero-stat-lbl">{{ __('ui.wt_strip2_lbl') }}</span></div>
      <div class="wd-hero-stat"><span class="wd-hero-stat-val">5 ATM</span><span class="wd-hero-stat-lbl">{{ __('ui.wt_strip3_lbl') }}</span></div>
      <div class="wd-hero-stat"><span class="wd-hero-stat-val">GPS</span><span class="wd-hero-stat-lbl">{{ __('ui.wt_strip4_lbl') }}</span></div>
      <div class="wd-hero-stat"><span class="wd-hero-stat-val">{{ __('ui.wt_strip5_val') }}</span><span class="wd-hero-stat-lbl">{{ __('ui.wt_strip5_lbl') }}</span></div>
    @endif
  </div>
</section>

{{-- ═══════════════════════════════════════ HEALTH BILLBOARD ══ --}}
<section class="wd-health-billboard" id="wd-health" data-wd-section="wd-health">
  <div class="wd-health-billboard-media">
    @if($healthImg)
      <img src="{{ $healthImg }}" alt="{{ $product->name }}" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;background:linear-gradient(135deg,#0d0d0d 0%,#1a0a0a 40%,#0a0a1a 100%);"></div>
    @endif
  </div>
  <div class="wd-health-billboard-overlay" aria-hidden="true"></div>
  <div class="wd-health-billboard-content wd-reveal">
    <p class="wd-eyebrow">@pc('health.eyebrow', 'ui.wt_health_ey')</p>
    <h2>@pcRaw('health.title', 'ui.wt_health_title')</h2>
    <p>@pc('health.description', 'ui.wt_health_desc')</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ HEALTH CARDS ══════ --}}
<section class="wd-cards-section" id="wd-health-features">
  <div class="wrap">
    <p class="wd-eyebrow wd-reveal">@pc('health_cards.eyebrow', 'ui.wt_hf_ey')</p>
    <h2 class="wd-reveal wd-reveal-delay-1">@pcRaw('health_cards.title', 'ui.wt_hf_title')</h2>
    <div class="wd-cards-grid">
      @if($healthCards->isNotEmpty())
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
      @else
        @foreach(range(1, 6) as $i)
          <div class="wd-card wd-reveal{{ $i > 1 ? ' wd-reveal-delay-'.min(($i - 1) % 3, 2) : '' }}">
            <div class="wd-card-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </div>
            <h3>{{ __('ui.wt_hf_c'.$i.'_title') }}</h3>
            <p>{{ __('ui.wt_hf_c'.$i.'_desc') }}</p>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ WATCH FACES ════════ --}}
<section class="wd-faces-section" id="wd-faces" data-wd-section="wd-faces">
  <div class="wrap">
    <p class="wd-eyebrow wd-reveal">@pc('customization.eyebrow', 'ui.wt_faces_ey')</p>
    <h2 class="wd-reveal wd-reveal-delay-1">@pcRaw('customization.title', 'ui.wt_faces_title')</h2>
    <div class="wd-faces-grid">
      @if($faces->isNotEmpty())
        @foreach($faces as $i => $face)
          <div class="wd-face-card wd-reveal{{ $i > 0 ? ' wd-reveal-delay-'.min($i, 3) : '' }}">
            <div class="wd-face-preview wd-face-preview--sport">
              <div class="wd-face-mock wd-face-mock--sport">
                <div class="wd-face-time">10:09</div>
              </div>
            </div>
            <div class="wd-face-info">
              <h3>{{ $face['name'] ?? '' }}</h3>
              <p>{{ $face['tags'] ?? '' }}</p>
            </div>
          </div>
        @endforeach
      @else
        <div class="wd-face-card wd-reveal">
          <div class="wd-face-preview wd-face-preview--sport">
            <div class="wd-face-mock wd-face-mock--sport">
              <span class="wd-face-complication wd-face-complication--top wd-face-complication--sport">❤ 72</span>
              <div class="wd-face-time">10:09</div>
              <div class="wd-face-date" style="color:rgba(255,255,255,.4)">{{ __('ui.wt_face_date_d') }}</div>
              <span class="wd-face-complication wd-face-complication--bottom wd-face-complication--sport">↑ 8,420</span>
            </div>
          </div>
          <div class="wd-face-info"><h3>{{ __('ui.wt_face1_title') }}</h3><p>{{ __('ui.wt_face1_desc') }}</p></div>
        </div>
        <div class="wd-face-card wd-reveal wd-reveal-delay-1">
          <div class="wd-face-preview wd-face-preview--classic">
            <div class="wd-face-mock wd-face-mock--classic">
              <span class="wd-face-complication wd-face-complication--top wd-face-complication--gold">{{ __('ui.wt_face_pz') }}</span>
              <div class="wd-face-time" style="font-size:clamp(14px,3vw,22px);letter-spacing:.08em;">10:09</div>
              <div class="wd-face-date" style="color:#c8a86d;letter-spacing:.12em;font-size:8px;">{{ __('ui.wt_face_date_full') }}</div>
              <span class="wd-face-complication wd-face-complication--bottom wd-face-complication--gold">{{ __('ui.wt_face_city') }}</span>
            </div>
          </div>
          <div class="wd-face-info"><h3>{{ __('ui.wt_face2_title') }}</h3><p>{{ __('ui.wt_face2_desc') }}</p></div>
        </div>
        <div class="wd-face-card wd-reveal wd-reveal-delay-2">
          <div class="wd-face-preview wd-face-preview--minimal">
            <div class="wd-face-mock wd-face-mock--minimal">
              <div class="wd-face-time" style="color:#1c1c1e;font-size:clamp(15px,3vw,24px);">10:09</div>
              <div class="wd-face-date" style="color:rgba(0,0,0,.35);font-size:8px;letter-spacing:.1em;">{{ __('ui.wt_face_minimal_d') }}</div>
            </div>
          </div>
          <div class="wd-face-info"><h3>{{ __('ui.wt_face3_title') }}</h3><p>{{ __('ui.wt_face3_desc') }}</p></div>
        </div>
        <div class="wd-face-card wd-reveal wd-reveal-delay-3">
          <div class="wd-face-preview wd-face-preview--digital">
            <div class="wd-face-mock wd-face-mock--digital">
              <span class="wd-face-complication wd-face-complication--top wd-face-complication--blue">GPS ●</span>
              <div class="wd-face-time" style="font-size:clamp(13px,3vw,20px);letter-spacing:.04em;">10:09:34</div>
              <div class="wd-face-date" style="color:#0a84ff;font-size:8px;letter-spacing:.08em;">22°C ☁</div>
              <span class="wd-face-complication wd-face-complication--bottom wd-face-complication--blue">SpO2 98%</span>
            </div>
          </div>
          <div class="wd-face-info"><h3>{{ __('ui.wt_face4_title') }}</h3><p>{{ __('ui.wt_face4_desc') }}</p></div>
        </div>
      @endif
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ DESIGN SPLIT ═══════ --}}
<section class="wd-split" id="wd-design" data-wd-section="wd-design">
  <div class="wd-split-media" style="background:#e8e8ed; min-height:520px;">
    @if($designImg)
      <img src="{{ $designImg }}" alt="{{ $product->name }}" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#e8e8ed,#d8d8df);">
        <div style="width:140px;height:165px;background:#1c1c1e;border-radius:38px;"></div>
      </div>
    @endif
  </div>
  <div class="wd-split-copy wd-reveal" style="background:var(--bg-2);">
    <p class="wd-eyebrow">@pc('design.eyebrow', 'ui.wt_design_ey')</p>
    <h2>@pcRaw('design.title', 'ui.wt_design_title')</h2>
    <p>@pc('design.description', 'ui.wt_design_desc')</p>
    <ul class="wd-feature-list">
      @if($designItems->isNotEmpty())
        @foreach($designItems as $i => $item)
          <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
        @endforeach
      @else
        <li data-n="01">{{ __('ui.wt_design_li1') }}</li>
        <li data-n="02">{{ __('ui.wt_design_li2') }}</li>
        <li data-n="03">{{ __('ui.wt_design_li3') }}</li>
        <li data-n="04">{{ __('ui.wt_design_li4') }}</li>
        <li data-n="05">{{ __('ui.wt_design_li5') }}</li>
      @endif
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ ACTIVITY BILLBOARD ══ --}}
<section class="wd-activity-billboard" id="wd-activity" data-wd-section="wd-activity">
  <div class="wd-activity-media">
    @if($activityImg)
      <img src="{{ $activityImg }}" alt="{{ $product->name }}" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;background:linear-gradient(160deg,#0a1628 0%,#1a0a08 100%);"></div>
    @endif
  </div>
  <div class="wd-activity-content wd-reveal">
    <p class="wd-eyebrow" style="color:var(--watch-coral,#ff6b5b)">@pc('activity.eyebrow', 'ui.wt_act_ey')</p>
    <h2>@pcRaw('activity.title', 'ui.wt_act_title')</h2>
    <p>@pc('activity.description', 'ui.wt_act_desc')</p>
    <div class="wd-activity-metrics">
      @if($activityStats->isNotEmpty())
        @foreach($activityStats as $stat)
          <div class="wd-activity-metric">
            <span class="wd-activity-metric-val">{{ $stat['value'] ?? '' }}</span>
            <span class="wd-activity-metric-lbl">{{ $stat['label'] ?? '' }}</span>
          </div>
        @endforeach
      @else
        <div class="wd-activity-metric"><span class="wd-activity-metric-val">100+</span><span class="wd-activity-metric-lbl">{{ __('ui.wt_act_m1_lbl') }}</span></div>
        <div class="wd-activity-metric"><span class="wd-activity-metric-val">GPS</span><span class="wd-activity-metric-lbl">{{ __('ui.wt_act_m2_lbl') }}</span></div>
        <div class="wd-activity-metric"><span class="wd-activity-metric-val">5 ATM</span><span class="wd-activity-metric-lbl">{{ __('ui.wt_act_m3_lbl') }}</span></div>
      @endif
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ BATTERY SPLIT ═══════ --}}
<section class="wd-split wd-split--flip" style="background:var(--bg);">
  <div class="wd-split-media" style="background:#f2f2f7; min-height:480px;">
    @if($batteryImg)
      <img src="{{ $batteryImg }}" alt="{{ $product->name }}" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#f2f2f7,#e5e5ea);">
        <div style="width:80px;height:200px;background:#1c1c1e;border-radius:28px;"></div>
      </div>
    @endif
  </div>
  <div class="wd-split-copy wd-reveal" style="background:var(--bg);">
    <p class="wd-eyebrow">@pc('battery.eyebrow', 'ui.wt_bat_ey')</p>
    <h2>@pcRaw('battery.title', 'ui.wt_bat_title')</h2>
    <p>@pc('battery.description', 'ui.wt_bat_desc')</p>
    <ul class="wd-feature-list" style="margin-top:20px;">
      @if($batteryItems->isNotEmpty())
        @foreach($batteryItems as $i => $item)
          <li data-n="{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}">{{ $item['text'] ?? '' }}</li>
        @endforeach
      @else
        <li data-n="01">{{ __('ui.wt_bat_li1') }}</li>
        <li data-n="02">{{ __('ui.wt_bat_li2') }}</li>
        <li data-n="03">{{ __('ui.wt_bat_li3') }}</li>
        <li data-n="04">{{ __('ui.wt_bat_li4') }}</li>
      @endif
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ FULL SPECS ════════ --}}
<section class="wd-specs-section" id="wd-specs" data-wd-section="wd-specs">
  <div class="wrap">
    <p class="wd-eyebrow wd-reveal">@pc('specs_section.eyebrow', 'ui.wt_specs_ey')</p>
    <h2 class="wd-reveal wd-reveal-delay-1">@pcRaw('specs_section.title', 'ui.wt_specs_title')</h2>

    <div class="wd-specs-table">
      @if(!empty($product->specs))
        @foreach($product->specs as $spec)
          <div class="wd-spec-row">
            <div class="wd-spec-row-k">{{ $spec['key'] ?? '' }}</div>
            <div class="wd-spec-row-v">{{ $spec['value'] ?? '' }}@if(!empty($spec['note']))<span class="wd-spec-row-sub">{{ $spec['note'] }}</span>@endif</div>
          </div>
        @endforeach
      @else
        @foreach (['disp','cpu','bat','sens','loc','conn','sport','health','water','body','strap','color'] as $row)
          <div class="wd-spec-row">
            <div class="wd-spec-row-k">{{ __('ui.wt_spec_'.$row.'_k') }}</div>
            <div class="wd-spec-row-v">{{ __('ui.wt_spec_'.$row.'_v') }}<span class="wd-spec-row-sub">{{ __('ui.wt_spec_'.$row.'_s') }}</span></div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ BUY ════════════════ --}}
<section class="wd-buy" id="wd-buy" data-wd-section="wd-buy">
  <div class="wrap wd-reveal">
    <p class="wd-eyebrow" style="justify-content:center">@pc('buy_section.eyebrow', 'ui.wt_buy_ey')</p>
    <h2>@pcRaw('buy_section.title', 'ui.wt_buy_title')</h2>
    <div class="wd-buy-price">
      <strong>{{ $product->price_label ?: __('ui.wt_buy_price') }}</strong>{{ $product->price_note ? ' · '.$product->price_note : __('ui.wt_buy_price_sub') }}
    </div>
    <div class="wd-buy-actions">
      <a href="{{ $product->buy_url ?: '#' }}" class="btn btn-primary" style="font-size:16px; height:52px; padding:0 32px; background:var(--watch-red,#ff3b30); border-color:var(--watch-red,#ff3b30);">{{ $product->cta_primary ?: __('ui.wt_buy_cta1') }}</a>
      <a href="{{ $product->cta_secondary_url ?: '#wd-specs' }}" class="btn btn-ghost" style="font-size:16px; height:52px; padding:0 32px;">{{ $product->cta_secondary ?: __('ui.wt_buy_cta2') }}</a>
    </div>
    <p class="wd-buy-note">{{ __('ui.wt_buy_note') }}</p>
  </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/watch-detail.js') }}"></script>
@endpush
