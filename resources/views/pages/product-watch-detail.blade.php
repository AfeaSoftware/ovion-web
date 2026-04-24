@extends('main')

@section('title', __('ui.wt_meta_title'))
@section('description', __('ui.wt_meta_desc'))
@section('canonical', ($locale ?? 'tr') === 'en' ? route('en.watches.s3-pro') : route('watches.s3-pro'))
@section('theme', 'dark')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/phone-detail.css') }}" />
<link rel="stylesheet" href="{{ asset('css/watch-detail.css') }}" />
@endpush

@section('content')

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
      {{ __('ui.pd_buy_watch') }}
      <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</div>

{{-- ═══════════════════════════════════════ HERO ═══════════ --}}
<section class="wd-hero" id="wd-hero" data-wd-section="wd-hero">

  <div class="wd-hero-stage">
    {{-- Copy left --}}
    <div class="wd-hero-copy">
      <p class="wd-hero-eyebrow">{{ __('ui.wt_hero_eyebrow') }}</p>
      <h1>S3<br/>Pro</h1>
      <p class="wd-hero-tagline">
        {!! __('ui.wt_hero_tagline') !!}
      </p>
      <div class="wd-hero-actions">
        <a href="#wd-buy" class="btn btn-primary">{{ __('ui.wt_hero_buy') }}</a>
        <a href="#wd-specs" class="btn btn-ghost">{{ __('ui.wt_hero_specs') }}</a>
      </div>
    </div>

    {{-- Watch right --}}
    <div class="wd-hero-watch">
      <div class="wd-hero-watch-glow" aria-hidden="true"></div>
      @if(file_exists(public_path('assets/s3-hero.png')))
        <img src="{{ asset('assets/s3-hero.png') }}" alt="{{ __('ui.wt_hero_alt') }}"
             width="600" height="700" fetchpriority="high" decoding="async" />
      @else
        {{-- CSS watch placeholder --}}
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

  {{-- Stats strip --}}
  <div class="wd-hero-strip">
    <div class="wd-hero-stat">
      <span class="wd-hero-stat-val">{{ __('ui.wt_strip1_val') }}</span>
      <span class="wd-hero-stat-lbl">{{ __('ui.wt_strip1_lbl') }}</span>
    </div>
    <div class="wd-hero-stat">
      <span class="wd-hero-stat-val">100+</span>
      <span class="wd-hero-stat-lbl">{{ __('ui.wt_strip2_lbl') }}</span>
    </div>
    <div class="wd-hero-stat">
      <span class="wd-hero-stat-val">5 ATM</span>
      <span class="wd-hero-stat-lbl">{{ __('ui.wt_strip3_lbl') }}</span>
    </div>
    <div class="wd-hero-stat">
      <span class="wd-hero-stat-val">GPS</span>
      <span class="wd-hero-stat-lbl">{{ __('ui.wt_strip4_lbl') }}</span>
    </div>
    <div class="wd-hero-stat">
      <span class="wd-hero-stat-val">{{ __('ui.wt_strip5_val') }}</span>
      <span class="wd-hero-stat-lbl">{{ __('ui.wt_strip5_lbl') }}</span>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ HEALTH BILLBOARD ══ --}}
<section class="wd-health-billboard" id="wd-health" data-wd-section="wd-health">
  <div class="wd-health-billboard-media">
    @if(file_exists(public_path('assets/s3-health.png')))
      <img src="{{ asset('assets/s3-health.png') }}" alt="{{ __('ui.wt_health_img_alt') }}" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;background:linear-gradient(135deg,#0d0d0d 0%,#1a0a0a 40%,#0a0a1a 100%);"></div>
    @endif
  </div>
  <div class="wd-health-billboard-overlay" aria-hidden="true"></div>
  <div class="wd-health-billboard-content wd-reveal">
    <p class="wd-eyebrow">{{ __('ui.wt_health_ey') }}</p>
    <h2>{!! __('ui.wt_health_title') !!}</h2>
    <p>{{ __('ui.wt_health_desc') }}</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ HEALTH CARDS ══════ --}}
<section class="wd-cards-section" id="wd-health-features">
  <div class="wrap">
    <p class="wd-eyebrow wd-reveal">{{ __('ui.wt_hf_ey') }}</p>
    <h2 class="wd-reveal wd-reveal-delay-1">{!! __('ui.wt_hf_title') !!}</h2>
    <div class="wd-cards-grid">

      <div class="wd-card wd-reveal">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        </div>
        <div class="wd-card-metric">24/7 <span>{{ __('ui.wt_hf_c1_metric') }}</span></div>
        <h3>{{ __('ui.wt_hf_c1_title') }}</h3>
        <p>{{ __('ui.wt_hf_c1_desc') }}</p>
      </div>

      <div class="wd-card wd-reveal wd-reveal-delay-1">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
        </div>
        <div class="wd-card-metric">SpO2 <span>{{ __('ui.wt_hf_c2_metric') }}</span></div>
        <h3>{{ __('ui.wt_hf_c2_title') }}</h3>
        <p>{{ __('ui.wt_hf_c2_desc') }}</p>
      </div>

      <div class="wd-card wd-reveal wd-reveal-delay-2">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <div class="wd-card-metric">8 <span>{{ __('ui.wt_hf_c3_metric') }}</span></div>
        <h3>{{ __('ui.wt_hf_c3_title') }}</h3>
        <p>{{ __('ui.wt_hf_c3_desc') }}</p>
      </div>

      <div class="wd-card wd-reveal">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
        <div class="wd-card-metric">HRV <span>{{ __('ui.wt_hf_c4_metric') }}</span></div>
        <h3>{{ __('ui.wt_hf_c4_title') }}</h3>
        <p>{{ __('ui.wt_hf_c4_desc') }}</p>
      </div>

      <div class="wd-card wd-reveal wd-reveal-delay-1">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <div class="wd-card-metric">30 <span>{{ __('ui.wt_hf_c5_metric') }}</span></div>
        <h3>{{ __('ui.wt_hf_c5_title') }}</h3>
        <p>{{ __('ui.wt_hf_c5_desc') }}</p>
      </div>

      <div class="wd-card wd-reveal wd-reveal-delay-2">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <div class="wd-card-metric">VO₂ <span>{{ __('ui.wt_hf_c6_metric') }}</span></div>
        <h3>{{ __('ui.wt_hf_c6_title') }}</h3>
        <p>{{ __('ui.wt_hf_c6_desc') }}</p>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ WATCH FACES ════════ --}}
<section class="wd-faces-section" id="wd-faces" data-wd-section="wd-faces">
  <div class="wrap">
    <p class="wd-eyebrow wd-reveal">{{ __('ui.wt_faces_ey') }}</p>
    <h2 class="wd-reveal wd-reveal-delay-1">{!! __('ui.wt_faces_title') !!}</h2>
    <div class="wd-faces-grid">

      <div class="wd-face-card wd-reveal">
        <div class="wd-face-preview wd-face-preview--sport">
          <div class="wd-face-mock wd-face-mock--sport">
            <div class="wd-face-rings-wrap" style="position:absolute;inset:0;border-radius:28%;overflow:hidden;">
              <div class="wd-face-ring wd-face-ring--1"></div>
              <div class="wd-face-ring wd-face-ring--2"></div>
            </div>
            <span class="wd-face-complication wd-face-complication--top wd-face-complication--sport">❤ 72</span>
            <div class="wd-face-time">10:09</div>
            <div class="wd-face-date" style="color:rgba(255,255,255,.4)">{{ __('ui.wt_face_date_d') }}</div>
            <span class="wd-face-complication wd-face-complication--bottom wd-face-complication--sport">↑ 8,420</span>
          </div>
        </div>
        <div class="wd-face-info">
          <h3>{{ __('ui.wt_face1_title') }}</h3>
          <p>{{ __('ui.wt_face1_desc') }}</p>
        </div>
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
        <div class="wd-face-info">
          <h3>{{ __('ui.wt_face2_title') }}</h3>
          <p>{{ __('ui.wt_face2_desc') }}</p>
        </div>
      </div>

      <div class="wd-face-card wd-reveal wd-reveal-delay-2">
        <div class="wd-face-preview wd-face-preview--minimal">
          <div class="wd-face-mock wd-face-mock--minimal">
            <div class="wd-face-time" style="color:#1c1c1e;font-size:clamp(15px,3vw,24px);">10:09</div>
            <div class="wd-face-date" style="color:rgba(0,0,0,.35);font-size:8px;letter-spacing:.1em;">{{ __('ui.wt_face_minimal_d') }}</div>
          </div>
        </div>
        <div class="wd-face-info">
          <h3>{{ __('ui.wt_face3_title') }}</h3>
          <p>{{ __('ui.wt_face3_desc') }}</p>
        </div>
      </div>

      <div class="wd-face-card wd-reveal wd-reveal-delay-3">
        <div class="wd-face-preview wd-face-preview--digital">
          <div class="wd-face-mock wd-face-mock--digital">
            <span class="wd-face-complication wd-face-complication--top wd-face-complication--blue">GPS ●</span>
            <div class="wd-face-time" style="font-size:clamp(13px,3vw,20px);letter-spacing:.04em;font-variant-numeric:tabular-nums;">10:09:34</div>
            <div class="wd-face-date" style="color:#0a84ff;font-size:8px;letter-spacing:.08em;">22°C ☁</div>
            <span class="wd-face-complication wd-face-complication--bottom wd-face-complication--blue">SpO2 98%</span>
          </div>
        </div>
        <div class="wd-face-info">
          <h3>{{ __('ui.wt_face4_title') }}</h3>
          <p>{{ __('ui.wt_face4_desc') }}</p>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ DESIGN SPLIT ═══════ --}}
<section class="wd-split" id="wd-design" data-wd-section="wd-design">
  <div class="wd-split-media" style="background:#e8e8ed; min-height:520px;">
    @if(file_exists(public_path('assets/s3-design.png')))
      <img src="{{ asset('assets/s3-design.png') }}" alt="{{ __('ui.wt_design_img_alt') }}" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#e8e8ed,#d8d8df);">
        <div style="width:140px;height:165px;background:#1c1c1e;border-radius:38px;display:flex;align-items:center;justify-content:center;box-shadow:0 24px 64px rgba(0,0,0,.25);">
          <div style="width:100px;height:100px;border-radius:28px;background:#2c2c2e;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:4px;">
            <span style="color:#ff3b30;font-size:10px;font-weight:600;letter-spacing:.08em">S3 PRO</span>
            <span style="color:#fff;font-size:20px;font-weight:500;letter-spacing:-.02em">10:09</span>
            <span style="color:rgba(255,255,255,.4);font-size:9px">{{ __('ui.wt_face_minimal_d') }} 22</span>
          </div>
        </div>
      </div>
    @endif
  </div>
  <div class="wd-split-copy wd-reveal" style="background:var(--bg-2);">
    <p class="wd-eyebrow">{{ __('ui.wt_design_ey') }}</p>
    <h2>{!! __('ui.wt_design_title') !!}</h2>
    <p>{{ __('ui.wt_design_desc') }}</p>
    <ul class="wd-feature-list">
      <li data-n="01">{{ __('ui.wt_design_li1') }}</li>
      <li data-n="02">{{ __('ui.wt_design_li2') }}</li>
      <li data-n="03">{{ __('ui.wt_design_li3') }}</li>
      <li data-n="04">{{ __('ui.wt_design_li4') }}</li>
      <li data-n="05">{{ __('ui.wt_design_li5') }}</li>
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ ACTIVITY BILLBOARD ══ --}}
<section class="wd-activity-billboard" id="wd-activity" data-wd-section="wd-activity">
  <div class="wd-activity-media">
    @if(file_exists(public_path('assets/s3-activity.png')))
      <img src="{{ asset('assets/s3-activity.png') }}" alt="{{ __('ui.wt_act_img_alt') }}" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;background:linear-gradient(160deg,#0a1628 0%,#1a0a08 100%);display:flex;align-items:center;justify-content:center;">
        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="rgba(255,59,48,.4)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
      </div>
    @endif
  </div>
  <div class="wd-activity-content wd-reveal">
    <p class="wd-eyebrow" style="color:var(--watch-coral,#ff6b5b)">{{ __('ui.wt_act_ey') }}</p>
    <h2>{!! __('ui.wt_act_title') !!}</h2>
    <p>{{ __('ui.wt_act_desc') }}</p>
    <div class="wd-activity-metrics">
      <div class="wd-activity-metric">
        <span class="wd-activity-metric-val">100+</span>
        <span class="wd-activity-metric-lbl">{{ __('ui.wt_act_m1_lbl') }}</span>
      </div>
      <div class="wd-activity-metric">
        <span class="wd-activity-metric-val">GPS</span>
        <span class="wd-activity-metric-lbl">{{ __('ui.wt_act_m2_lbl') }}</span>
      </div>
      <div class="wd-activity-metric">
        <span class="wd-activity-metric-val">5 ATM</span>
        <span class="wd-activity-metric-lbl">{{ __('ui.wt_act_m3_lbl') }}</span>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ BATTERY SPLIT ═══════ --}}
<section class="wd-split wd-split--flip" style="background:var(--bg);">
  <div class="wd-split-media" style="background:#f2f2f7; min-height:480px;">
    @if(file_exists(public_path('assets/s3-side.png')))
      <img src="{{ asset('assets/s3-side.png') }}" alt="{{ __('ui.wt_bat_img_alt') }}" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#f2f2f7,#e5e5ea);">
        <div style="width:80px;height:200px;background:#1c1c1e;border-radius:28px;box-shadow:0 20px 56px rgba(0,0,0,.2);position:relative;">
          <div style="position:absolute;right:-8px;top:60px;width:6px;height:28px;background:#3a3a3c;border-radius:3px;"></div>
          <div style="position:absolute;bottom:24px;left:50%;transform:translateX(-50%);width:32px;height:4px;background:rgba(255,59,48,.8);border-radius:2px;box-shadow:0 0 8px rgba(255,59,48,.6);"></div>
        </div>
      </div>
    @endif
  </div>
  <div class="wd-split-copy wd-reveal" style="background:var(--bg);">
    <p class="wd-eyebrow">{{ __('ui.wt_bat_ey') }}</p>
    <h2>{!! __('ui.wt_bat_title') !!}</h2>
    <p>{{ __('ui.wt_bat_desc') }}</p>
    <ul class="wd-feature-list" style="margin-top:20px;">
      <li data-n="01">{{ __('ui.wt_bat_li1') }}</li>
      <li data-n="02">{{ __('ui.wt_bat_li2') }}</li>
      <li data-n="03">{{ __('ui.wt_bat_li3') }}</li>
      <li data-n="04">{{ __('ui.wt_bat_li4') }}</li>
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ FULL SPECS ════════ --}}
<section class="wd-specs-section" id="wd-specs" data-wd-section="wd-specs">
  <div class="wrap">
    <p class="wd-eyebrow wd-reveal">{{ __('ui.wt_specs_ey') }}</p>
    <h2 class="wd-reveal wd-reveal-delay-1">{!! __('ui.wt_specs_title') !!}</h2>

    <div class="wd-specs-table">
      @foreach (['disp','cpu','bat','sens','loc','conn','sport','health','water','body','strap','color'] as $row)
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">{{ __('ui.wt_spec_' . $row . '_k') }}</div>
        <div class="wd-spec-row-v">{{ __('ui.wt_spec_' . $row . '_v') }}<span class="wd-spec-row-sub">{{ __('ui.wt_spec_' . $row . '_s') }}</span></div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ BUY ════════════════ --}}
<section class="wd-buy" id="wd-buy" data-wd-section="wd-buy">
  <div class="wrap wd-reveal">
    <p class="wd-eyebrow" style="justify-content:center">{{ __('ui.wt_buy_ey') }}</p>
    <h2>{!! __('ui.wt_buy_title') !!}</h2>
    <div class="wd-buy-price">
      <strong>{{ __('ui.wt_buy_price') }}</strong>{{ __('ui.wt_buy_price_sub') }}
    </div>
    <div class="wd-buy-actions">
      <a href="#" class="btn btn-primary" style="font-size:16px; height:52px; padding:0 32px; background:var(--watch-red,#ff3b30); border-color:var(--watch-red,#ff3b30);">{{ __('ui.wt_buy_cta1') }}</a>
      <a href="#" class="btn btn-ghost" style="font-size:16px; height:52px; padding:0 32px;">{{ __('ui.wt_buy_cta2') }}</a>
    </div>
    <p class="wd-buy-note">{{ __('ui.wt_buy_note') }}</p>
  </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/watch-detail.js') }}"></script>
@endpush
