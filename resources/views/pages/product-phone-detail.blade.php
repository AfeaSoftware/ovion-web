@extends('main')

@section('title', __('ui.ph_meta_title'))
@section('description', __('ui.ph_meta_desc'))
@section('canonical', ($locale ?? 'tr') === 'en' ? route('en.phones.v11-lite') : route('phones.v11-lite'))
@section('theme', 'dark')

@push('preload')
<link rel="preload" as="image" href="{{ asset('assets/v11-hero.png') }}" fetchpriority="high" />
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/phone-detail.css') }}" />
@endpush

@section('content')

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
    <p class="pd-hero-eyebrow">{{ __('ui.ph_hero_eyebrow') }}</p>
    <h1>V11 Lite</h1>
    <p class="pd-hero-sub">{{ __('ui.ph_hero_sub') }}</p>
  </div>

  <div class="pd-hero-img">
    <img src="{{ asset('assets/v11-hero.png') }}"
         alt="{{ __('ui.ph_hero_alt') }}"
         width="900" height="1100"
         fetchpriority="high" decoding="async" />
  </div>

  <div class="pd-hero-bottom">
    <p class="pd-hero-sub" style="margin:0;">{{ __('ui.ph_hero_byline') }}</p>
    <div class="pd-hero-actions">
      <a href="#pd-buy" class="btn btn-primary">{{ __('ui.ph_hero_buy') }}</a>
      <a href="#pd-specs" class="btn btn-ghost">{{ __('ui.ph_hero_specs') }}</a>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ SPEC STRIP ══════ --}}
<section class="pd-specs-strip" aria-label="{{ __('ui.ph_strip_aria') }}">
  <div class="wrap pd-specs-row">
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
  </div>
</section>

{{-- ═══════════════════════════════════════ CAMERA BILLBOARD ══ --}}
<section class="pd-feature pd-billboard" id="pd-camera" data-pd-section="pd-camera">
  <div class="pd-billboard-media">
    <img src="{{ asset('assets/v11-duo.png') }}"
         alt="{{ __('ui.ph_cam_img_alt') }}"
         loading="lazy" decoding="async"
         width="1600" height="900" />
  </div>
  <div class="pd-billboard-overlay" aria-hidden="true"></div>
  <div class="pd-billboard-content pd-reveal">
    <p class="eyebrow">{{ __('ui.ph_cam_ey') }}</p>
    <h2>{!! __('ui.ph_cam_title') !!}</h2>
    <p>{{ __('ui.ph_cam_desc') }}</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ CAMERA FEATURES ══ --}}
<section class="pd-cards-section pd-feature" id="pd-camera-features">
  <div class="wrap">
    <p class="eyebrow pd-reveal">{{ __('ui.ph_camf_ey') }}</p>
    <h2 class="pd-reveal pd-reveal-delay-1">{!! __('ui.ph_camf_title') !!}</h2>
    <div class="pd-cards-grid">

      <div class="pd-card pd-reveal">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M6.5 6.5h.01M17.5 6.5h.01M6.5 17.5h.01M17.5 17.5h.01"/><rect x="3" y="3" width="18" height="18" rx="4"/></svg>
        </div>
        <div class="pd-card-num">50 <span>MP</span></div>
        <h3>{{ __('ui.ph_camf_c1_title') }}</h3>
        <p>{{ __('ui.ph_camf_c1_desc') }}</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-1">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        </div>
        <div class="pd-card-num">40+ <span>{{ __('ui.ph_camf_c2_unit') }}</span></div>
        <h3>{{ __('ui.ph_camf_c2_title') }}</h3>
        <p>{{ __('ui.ph_camf_c2_desc') }}</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-2">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <div class="pd-card-num">0.3 <span>{{ __('ui.ph_camf_c3_unit') }}</span></div>
        <h3>{{ __('ui.ph_camf_c3_title') }}</h3>
        <p>{{ __('ui.ph_camf_c3_desc') }}</p>
      </div>

      <div class="pd-card pd-reveal">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v1m0 16v1M4.22 4.22l.71.71m12.73 12.73.71.71M3 12h1m16 0h1M4.22 19.78l.71-.71M18.36 5.64l.71-.71"/><circle cx="12" cy="12" r="4"/></svg>
        </div>
        <h3>{{ __('ui.ph_camf_c4_title') }}</h3>
        <p>{{ __('ui.ph_camf_c4_desc') }}</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-1">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <div class="pd-card-num">8 <span>MP</span></div>
        <h3>{{ __('ui.ph_camf_c5_title') }}</h3>
        <p>{{ __('ui.ph_camf_c5_desc') }}</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-2">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
        </div>
        <h3>{{ __('ui.ph_camf_c6_title') }}</h3>
        <p>{{ __('ui.ph_camf_c6_desc') }}</p>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ DISPLAY BILLBOARD ══ --}}
<section class="pd-feature pd-billboard" id="pd-display" data-pd-section="pd-display" style="background:var(--bg-2);">
  <div class="pd-billboard-media">
    <img src="{{ asset('assets/v11-front.png') }}"
         alt="{{ __('ui.ph_disp_img_alt') }}"
         loading="lazy" decoding="async"
         width="1000" height="1250"
         style="object-position: center center;" />
  </div>
  <div class="pd-billboard-overlay" aria-hidden="true"></div>
  <div class="pd-billboard-content pd-reveal">
    <p class="eyebrow">{{ __('ui.ph_disp_ey') }}</p>
    <h2>{!! __('ui.ph_disp_title') !!}</h2>
    <p>{{ __('ui.ph_disp_desc') }}</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ DISPLAY SPLIT ══════ --}}
<section class="pd-split" id="pd-display-split">
  <div class="pd-split-media" style="background:#f0f1f3;">
    <img src="{{ asset('assets/v11-landscape.png') }}"
         alt="{{ __('ui.ph_dispt_img_alt') }}"
         loading="lazy" decoding="async"
         width="1000" height="500"
         style="object-fit:contain; padding: 32px;" />
  </div>
  <div class="pd-split-copy pd-reveal">
    <p class="eyebrow">{{ __('ui.ph_dispt_ey') }}</p>
    <h2>{!! __('ui.ph_dispt_title') !!}</h2>
    <p>{{ __('ui.ph_dispt_desc') }}</p>
    <ul class="pd-feature-list">
      <li data-n="01">{{ __('ui.ph_dispt_li1') }}</li>
      <li data-n="02">{{ __('ui.ph_dispt_li2') }}</li>
      <li data-n="03">{{ __('ui.ph_dispt_li3') }}</li>
      <li data-n="04">{{ __('ui.ph_dispt_li4') }}</li>
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ DESIGN (CINEMA SCROLL) ══ --}}
<div id="pd-design" data-pd-section="pd-design" class="pd-cinema-wrap">
  <div class="pd-cinema-sticky">

    <div class="pd-cinema-img is-active" data-cinema-idx="0">
      <img src="{{ asset('assets/v11-back.png') }}" alt="{{ __('ui.ph_cin1_alt') }}" loading="lazy" decoding="async" />
    </div>
    <div class="pd-cinema-img" data-cinema-idx="1">
      <img src="{{ asset('assets/v11-side-a.png') }}" alt="{{ __('ui.ph_cin2_alt') }}" loading="lazy" decoding="async" />
    </div>
    <div class="pd-cinema-img" data-cinema-idx="2">
      <img src="{{ asset('assets/v11-side-b.png') }}" alt="{{ __('ui.ph_cin3_alt') }}" loading="lazy" decoding="async" />
    </div>
    <div class="pd-cinema-img" data-cinema-idx="3">
      <img src="{{ asset('assets/v11-pair.png') }}" alt="{{ __('ui.ph_cin4_alt') }}" loading="lazy" decoding="async" />
    </div>

    @foreach ([1, 2, 3, 4] as $i)
    <div class="pd-cinema-caption{{ $i === 1 ? ' is-active' : '' }}" data-cinema-idx="{{ $i - 1 }}">
      <p class="eyebrow" style="color:rgba(255,255,255,.55)">{{ __('ui.ph_cin' . $i . '_ey') }}</p>
      <h3>{!! __('ui.ph_cin' . $i . '_title') !!}</h3>
      <p>{{ __('ui.ph_cin' . $i . '_desc') }}</p>
    </div>
    @endforeach

    <div class="pd-cinema-dots" aria-hidden="true">
      <div class="pd-cinema-dot is-active"></div>
      <div class="pd-cinema-dot"></div>
      <div class="pd-cinema-dot"></div>
      <div class="pd-cinema-dot"></div>
    </div>

  </div>
</div>

{{-- ═══════════════════════════════════════ PERFORMANCE ════════ --}}
<section class="pd-cards-section pd-feature pd-feature--mid" id="pd-performance" data-pd-section="pd-performance">
  <div class="wrap">
    <p class="eyebrow pd-reveal">{{ __('ui.ph_perf_ey') }}</p>
    <h2 class="pd-reveal pd-reveal-delay-1">{!! __('ui.ph_perf_title') !!}</h2>
    <div class="pd-cards-grid">

      <div class="pd-card pd-reveal">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
        </div>
        <div class="pd-card-num">Unisoc <span>T606</span></div>
        <h3>{{ __('ui.ph_perf_c1_title') }}</h3>
        <p>{{ __('ui.ph_perf_c1_desc') }}</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-1">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
        </div>
        <div class="pd-card-num">4 <span>{{ __('ui.ph_perf_c2_unit') }}</span></div>
        <h3>{{ __('ui.ph_perf_c2_title') }}</h3>
        <p>{{ __('ui.ph_perf_c2_desc') }}</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-2">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 18H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3.19M15 6h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3.19"/><line x1="23" y1="13" x2="23" y2="11"/><polyline points="11 6 7 12 13 12 9 18"/></svg>
        </div>
        <div class="pd-card-num">18 <span>W</span></div>
        <h3>{{ __('ui.ph_perf_c3_title') }}</h3>
        <p>{{ __('ui.ph_perf_c3_desc') }}</p>
      </div>

      <div class="pd-card pd-reveal">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3>{{ __('ui.ph_perf_c4_title') }}</h3>
        <p>{{ __('ui.ph_perf_c4_desc') }}</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-1">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M1 6l5 5 4-4 8 8 5-5"/></svg>
        </div>
        <h3>{{ __('ui.ph_perf_c5_title') }}</h3>
        <p>{{ __('ui.ph_perf_c5_desc') }}</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-2">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        </div>
        <h3>{{ __('ui.ph_perf_c6_title') }}</h3>
        <p>{{ __('ui.ph_perf_c6_desc') }}</p>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ SPLIT — BATTERY ════ --}}
<section class="pd-split pd-split--flip" style="background: var(--bg);">
  <div class="pd-split-media">
    <img src="{{ asset('assets/v11-pair.png') }}"
         alt="{{ __('ui.ph_bat_img_alt') }}"
         loading="lazy" decoding="async"
         width="1000" height="1250" />
  </div>
  <div class="pd-split-copy pd-reveal" style="background: var(--bg);">
    <p class="eyebrow">{{ __('ui.ph_bat_ey') }}</p>
    <h2>{!! __('ui.ph_bat_title') !!}</h2>
    <p>{{ __('ui.ph_bat_desc') }}</p>
    <ul class="pd-feature-list" style="margin-top:24px;">
      <li data-n="01">{{ __('ui.ph_bat_li1') }}</li>
      <li data-n="02">{{ __('ui.ph_bat_li2') }}</li>
      <li data-n="03">{{ __('ui.ph_bat_li3') }}</li>
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ FULL SPECS ════════ --}}
<section class="pd-specs-section" id="pd-specs" data-pd-section="pd-specs">
  <div class="wrap">
    <p class="eyebrow pd-reveal">{{ __('ui.ph_specs_ey') }}</p>
    <h2 class="pd-reveal pd-reveal-delay-1">{!! __('ui.ph_specs_title') !!}</h2>

    <div class="pd-specs-table">
      @foreach (['disp','cpu','mem','cam','fcam','bat','os','conn','sec','dim','sim','color'] as $row)
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">{{ __('ui.ph_spec_' . $row . '_k') }}</div>
        <div class="pd-spec-row-v">{{ __('ui.ph_spec_' . $row . '_v') }}<span class="pd-spec-row-sub">{{ __('ui.ph_spec_' . $row . '_s') }}</span></div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ BUY ════════════════ --}}
<section class="pd-buy" id="pd-buy" data-pd-section="pd-buy">
  <div class="wrap pd-reveal">
    <p class="eyebrow" style="justify-content:center">{{ __('ui.ph_buy_ey') }}</p>
    <h2>{!! __('ui.ph_buy_title') !!}</h2>
    <div class="pd-buy-price">
      <strong>{{ __('ui.ph_buy_price') }}</strong>{{ __('ui.ph_buy_price_sub') }}
    </div>
    <div class="pd-buy-actions">
      <a href="#" class="btn btn-primary" style="font-size:16px; height:52px; padding:0 32px;">{{ __('ui.ph_buy_cta1') }}</a>
      <a href="#" class="btn btn-ghost" style="font-size:16px; height:52px; padding:0 32px;">{{ __('ui.ph_buy_cta2') }}</a>
    </div>
    <p class="pd-buy-note">{{ __('ui.ph_buy_note') }}</p>
  </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/phone-detail.js') }}"></script>
@endpush
