@extends('main')

@section('title', __('ui.ak_meta_title'))
@section('description', __('ui.ak_meta_desc'))
@section('canonical', ($locale ?? 'tr') === 'en' ? route('en.accessories') : route('aksesuarlar'))
@section('theme', 'dark')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/aksesuarlar.css') }}" />
@endpush

@php
  $isEn = ($locale ?? 'tr') === 'en';
  $r = fn (string $tr, string $en) => route($isEn ? $en : $tr);
@endphp

@section('content')

  <!-- HERO -->
  <section class="ak-hero">
    <div class="wrap ak-hero-grid">

      <div class="ak-hero-copy stagger">
        <p class="eyebrow" style="--i:0">{{ __('ui.ak_eyebrow') }}</p>
        <h1 style="--i:1">{!! __('ui.ak_hero_title') !!}</h1>
        <p class="ak-lede" style="--i:2">{{ __('ui.ak_hero_lede') }}</p>
        <div class="ak-hero-cta" style="--i:3">
          <a class="btn btn-primary" href="#urunler">{{ __('ui.ak_cta_all') }}</a>
          <a class="btn btn-ghost" href="#uyumluluk">{{ __('ui.ak_cta_device') }}</a>
        </div>
      </div>

      <div class="ak-hero-media" aria-hidden="true">
        <div class="ak-hero-media-grid">
          <div class="ak-hero-media-item">
            {{ __('ui.ak_hero_tile1') }}<br /><small>{{ __('ui.nav_coming_soon') }}</small>
          </div>
          <div class="ak-hero-media-item">
            {{ __('ui.ak_hero_tile2') }}<br /><small>{{ __('ui.nav_coming_soon') }}</small>
          </div>
          <div class="ak-hero-media-item">
            {{ __('ui.ak_hero_tile3') }}<br /><small>{{ __('ui.nav_coming_soon') }}</small>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- KATEGORİ FİLTRE -->
  <div class="ak-cats" role="navigation" aria-label="{{ __('ui.ak_eyebrow') }}">
    <div class="wrap">
      <div class="ak-cats-inner">
        <button class="ak-cat-btn is-active" data-cat="tumu">{{ __('ui.ak_cat_all') }}</button>
        <button class="ak-cat-btn" data-cat="kilif">{{ __('ui.ak_cat_cases') }}</button>
        <button class="ak-cat-btn" data-cat="ekran">{{ __('ui.ak_cat_screen') }}</button>
        <button class="ak-cat-btn" data-cat="sarj">{!! __('ui.ak_cat_charge') !!}</button>
        <button class="ak-cat-btn" data-cat="kayis">{{ __('ui.ak_cat_straps') }}</button>
      </div>
    </div>
  </div>

  <!-- ÖNE ÇIKAN -->
  <section class="ak-spotlight">
    <div class="wrap">
      <div class="ak-spotlight-grid">

        <div class="ak-spotlight-media ak-reveal">
          <span>{!! __('ui.ak_spot_media') !!}<br /><small style="opacity:.5">{{ __('ui.nav_coming_soon') }}</small></span>
        </div>

        <div class="ak-spotlight-copy">
          <p class="eyebrow ak-reveal">{{ __('ui.ak_featured_ey') }}</p>
          <h2 class="ak-reveal ak-reveal-d1">{!! __('ui.ak_featured_title') !!}</h2>
          <p class="ak-reveal ak-reveal-d2">{{ __('ui.ak_featured_desc') }}</p>
          <div class="ak-spotlight-meta ak-reveal ak-reveal-d3">
            <span class="ak-spotlight-price">₺499</span>
            <span class="ak-spotlight-compat">V11 Lite {{ __('ui.ak_compat_with') }}</span>
          </div>
          <div class="ak-reveal ak-reveal-d3">
            <a class="btn btn-primary" href="#">{{ __('ui.ak_inspect') }} →</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ÜRÜN GRİD -->
  <section class="ak-grid-section" id="urunler">
    <div class="wrap">
      <p class="eyebrow ak-reveal">{{ __('ui.ak_all_ey') }}</p>
      <h2 class="ak-reveal ak-reveal-d1">{{ __('ui.ak_all_title') }}</h2>

      <div class="ak-grid">

        <!-- Kılıflar -->
        <article class="ak-card ak-reveal" data-cat="kilif">
          <div class="ak-card-media">
            <span>{{ __('ui.ak_p1_media') }}<br /><small style="opacity:.5">{{ __('ui.nav_coming_soon') }}</small></span>
          </div>
          <div class="ak-card-body">
            <span class="ak-card-cat">{{ __('ui.ak_cat_cases') }}</span>
            <p class="ak-card-name">{{ __('ui.ak_p1_name') }}</p>
            <p class="ak-card-sub">{{ __('ui.ak_p1_sub') }}</p>
            <div class="ak-card-footer">
              <span class="ak-card-price">₺299</span>
              <a href="#" class="ak-card-link">{{ __('ui.ak_inspect') }} <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="ak-card ak-reveal ak-reveal-d1" data-cat="kilif">
          <div class="ak-card-media">
            <span>{{ __('ui.ak_p2_media') }}<br /><small style="opacity:.5">{{ __('ui.nav_coming_soon') }}</small></span>
          </div>
          <div class="ak-card-body">
            <span class="ak-card-cat">{{ __('ui.ak_cat_cases') }}</span>
            <p class="ak-card-name">{{ __('ui.ak_p2_name') }}</p>
            <p class="ak-card-sub">{{ __('ui.ak_p2_sub') }}</p>
            <div class="ak-card-footer">
              <span class="ak-card-price">₺199</span>
              <a href="#" class="ak-card-link">{{ __('ui.ak_inspect') }} <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="ak-card ak-reveal ak-reveal-d2" data-cat="kilif">
          <div class="ak-card-media">
            <span>{{ __('ui.ak_p3_media') }}<br /><small style="opacity:.5">{{ __('ui.nav_coming_soon') }}</small></span>
          </div>
          <div class="ak-card-body">
            <span class="ak-card-cat">{{ __('ui.ak_cat_cases') }}</span>
            <p class="ak-card-name">{{ __('ui.ak_p3_name') }}</p>
            <p class="ak-card-sub">{{ __('ui.ak_p3_sub') }}</p>
            <div class="ak-card-footer">
              <span class="ak-card-price">₺499</span>
              <a href="#" class="ak-card-link">{{ __('ui.ak_inspect') }} <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <!-- Ekran Koruyucular -->
        <article class="ak-card ak-reveal ak-reveal-d1" data-cat="ekran">
          <div class="ak-card-media">
            <span>{{ __('ui.ak_p4_media') }}<br /><small style="opacity:.5">{{ __('ui.nav_coming_soon') }}</small></span>
          </div>
          <div class="ak-card-body">
            <span class="ak-card-cat">{{ __('ui.ak_cat_screen') }}</span>
            <p class="ak-card-name">{{ __('ui.ak_p4_name') }}</p>
            <p class="ak-card-sub">{{ __('ui.ak_p4_sub') }}</p>
            <div class="ak-card-footer">
              <span class="ak-card-price">₺149</span>
              <a href="#" class="ak-card-link">{{ __('ui.ak_inspect') }} <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="ak-card ak-reveal ak-reveal-d2" data-cat="ekran">
          <div class="ak-card-media">
            <span>{{ __('ui.ak_p5_media') }}<br /><small style="opacity:.5">{{ __('ui.nav_coming_soon') }}</small></span>
          </div>
          <div class="ak-card-body">
            <span class="ak-card-cat">{{ __('ui.ak_cat_screen') }}</span>
            <p class="ak-card-name">{{ __('ui.ak_p5_name') }}</p>
            <p class="ak-card-sub">{{ __('ui.ak_p5_sub') }}</p>
            <div class="ak-card-footer">
              <span class="ak-card-price">₺129</span>
              <a href="#" class="ak-card-link">{{ __('ui.ak_inspect') }} <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <!-- Şarj & Kablo -->
        <article class="ak-card ak-reveal ak-reveal-d3" data-cat="sarj">
          <div class="ak-card-media">
            <span>{{ __('ui.ak_p6_media') }}<br /><small style="opacity:.5">{{ __('ui.nav_coming_soon') }}</small></span>
          </div>
          <div class="ak-card-body">
            <span class="ak-card-cat">{{ __('ui.ak_cat_charge') }}</span>
            <p class="ak-card-name">{{ __('ui.ak_p6_name') }}</p>
            <p class="ak-card-sub">{{ __('ui.ak_p6_sub') }}</p>
            <div class="ak-card-footer">
              <span class="ak-card-price">₺349</span>
              <a href="#" class="ak-card-link">{{ __('ui.ak_inspect') }} <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="ak-card ak-reveal" data-cat="sarj">
          <div class="ak-card-media">
            <span>{{ __('ui.ak_p7_media') }}<br /><small style="opacity:.5">{{ __('ui.nav_coming_soon') }}</small></span>
          </div>
          <div class="ak-card-body">
            <span class="ak-card-cat">{{ __('ui.ak_cat_charge') }}</span>
            <p class="ak-card-name">{{ __('ui.ak_p7_name') }}</p>
            <p class="ak-card-sub">{{ __('ui.ak_p7_sub') }}</p>
            <div class="ak-card-footer">
              <span class="ak-card-price">₺99</span>
              <a href="#" class="ak-card-link">{{ __('ui.ak_inspect') }} <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <!-- Kayışlar -->
        <article class="ak-card ak-reveal ak-reveal-d1" data-cat="kayis">
          <div class="ak-card-media">
            <span>{{ __('ui.ak_p8_media') }}<br /><small style="opacity:.5">{{ __('ui.nav_coming_soon') }}</small></span>
          </div>
          <div class="ak-card-body">
            <span class="ak-card-cat">{{ __('ui.ak_cat_straps') }}</span>
            <p class="ak-card-name">{{ __('ui.ak_p8_name') }}</p>
            <p class="ak-card-sub">{{ __('ui.ak_p8_sub') }}</p>
            <div class="ak-card-footer">
              <span class="ak-card-price">₺179</span>
              <a href="#" class="ak-card-link">{{ __('ui.ak_inspect') }} <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

        <article class="ak-card ak-reveal ak-reveal-d2" data-cat="kayis">
          <div class="ak-card-media">
            <span>{{ __('ui.ak_p9_media') }}<br /><small style="opacity:.5">{{ __('ui.nav_coming_soon') }}</small></span>
          </div>
          <div class="ak-card-body">
            <span class="ak-card-cat">{{ __('ui.ak_cat_straps') }}</span>
            <p class="ak-card-name">{{ __('ui.ak_p9_name') }}</p>
            <p class="ak-card-sub">{{ __('ui.ak_p9_sub') }}</p>
            <div class="ak-card-footer">
              <span class="ak-card-price">₺379</span>
              <a href="#" class="ak-card-link">{{ __('ui.ak_inspect') }} <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- UYUMLULUK -->
  <section class="ak-compat" id="uyumluluk">
    <div class="wrap">
      <p class="eyebrow ak-reveal">{{ __('ui.ak_compat_ey') }}</p>
      <h2 class="ak-reveal ak-reveal-d1">{!! __('ui.ak_compat_title') !!}</h2>

      <div class="ak-compat-grid">

        <a href="{{ $r('phones.v11-lite', 'en.phones.v11-lite') }}" class="ak-compat-card ak-reveal ak-reveal-d1">
          <div class="ak-compat-icon" aria-hidden="true">
            <span style="font-size:10px">V11<br/>Lite</span>
          </div>
          <div class="ak-compat-info">
            <span class="ak-compat-label">{{ __('ui.ak_compat_phone') }}</span>
            <span class="ak-compat-name">V11 Lite</span>
          </div>
          <svg class="ak-compat-arrow" width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
            <path d="M4 9h10M9 4l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>

        <a href="{{ $r('watches.s3-pro', 'en.watches.s3-pro') }}" class="ak-compat-card ak-reveal ak-reveal-d2">
          <div class="ak-compat-icon" aria-hidden="true">
            <span style="font-size:10px">S3<br/>Pro</span>
          </div>
          <div class="ak-compat-info">
            <span class="ak-compat-label">{{ __('ui.ak_compat_watch') }}</span>
            <span class="ak-compat-name">S3 Pro</span>
          </div>
          <svg class="ak-compat-arrow" width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
            <path d="M4 9h10M9 4l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>

        <a href="{{ $r('headphones.h1-pro', 'en.headphones.h1-pro') }}" class="ak-compat-card ak-reveal ak-reveal-d3">
          <div class="ak-compat-icon" aria-hidden="true">
            <span style="font-size:10px">H1<br/>Pro</span>
          </div>
          <div class="ak-compat-info">
            <span class="ak-compat-label">{{ __('ui.ak_compat_hp') }}</span>
            <span class="ak-compat-name">H1 Pro</span>
          </div>
          <svg class="ak-compat-arrow" width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
            <path d="M4 9h10M9 4l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>

      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="ak-cta">
    <div class="wrap">
      <p class="eyebrow ak-reveal">{{ __('ui.ak_cta_ey') }}</p>
      <h2 class="ak-reveal ak-reveal-d1">{!! __('ui.ak_cta_title') !!}</h2>
      <p class="ak-reveal ak-reveal-d2">{{ __('ui.ak_cta_desc') }}</p>
      <div class="ak-cta-btns ak-reveal ak-reveal-d3">
        <a class="btn btn-primary" href="{{ $r('destek', 'en.support') }}">{{ __('ui.btn_support') }}</a>
        <a class="btn btn-ghost" href="{{ $r('home', 'en.home') }}">{{ __('ui.btn_home') }}</a>
      </div>
    </div>
  </section>

@endsection

@push('scripts')
<script>
(function () {
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('is-visible'); io.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  document.querySelectorAll('.ak-reveal').forEach(el => io.observe(el));

  const btns  = document.querySelectorAll('.ak-cat-btn');
  const cards = document.querySelectorAll('.ak-card[data-cat]');
  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      btns.forEach(b => b.classList.remove('is-active'));
      btn.classList.add('is-active');
      const cat = btn.dataset.cat;
      cards.forEach(card => {
        const show = cat === 'tumu' || card.dataset.cat === cat;
        card.style.display = show ? '' : 'none';
      });
    });
  });
})();
</script>
@endpush
