@extends('main')

@section('title', __('ui.about_meta_title'))
@section('description', __('ui.about_meta_desc'))
@section('canonical', ($locale ?? 'tr') === 'en' ? route('en.about') : route('about'))
@section('theme', 'dark')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endpush

@section('content')

@php
  $stats = collect($content?->get('stats') ?? []);
  $values = collect($content?->get('values') ?? []);
  $timeline = collect($content?->get('timeline') ?? []);
@endphp

{{-- ════════════════════ HERO ════════════════════ --}}
<section class="ab-hero">
  <div class="ab-hero-bg" aria-hidden="true"></div>
  <div class="wrap">
    <p class="eyebrow">@pc('hero_eyebrow', 'ui.about_eyebrow')</p>
    <h1>@pcRaw('hero_title', 'ui.about_hero_title')</h1>
    <p class="ab-hero-lede">@pc('hero_lede', 'ui.about_hero_lede')</p>
  </div>
</section>

{{-- ════════════════════ STAT STRIP ════════════════════ --}}
<section class="stat-strip" aria-label="{{ __('ui.about_stats_label') }}">
  <div class="wrap stat-row stagger">
    @if($stats->isNotEmpty())
      @foreach($stats as $i => $stat)
        <div class="stat" style="--i:{{ $i }}">
          <span class="stat-num">{{ $stat['value'] ?? '' }}</span>
          <span class="stat-lbl">{{ $stat['label'] ?? '' }}</span>
        </div>
      @endforeach
    @else
      <div class="stat" style="--i:0">
        <span class="stat-num">2023</span>
        <span class="stat-lbl">{{ __('ui.about_stat_founded') }}</span>
      </div>
      <div class="stat" style="--i:1">
        <span class="stat-num" data-count="200" data-suffix="+">200+</span>
        <span class="stat-lbl">{{ __('ui.about_stat_staff') }}</span>
      </div>
      <div class="stat" style="--i:2">
        <span class="stat-num">5</span>
        <span class="stat-lbl">{{ __('ui.about_stat_lines') }}</span>
      </div>
      <div class="stat" style="--i:3">
        <span class="stat-num">81</span>
        <span class="stat-lbl">{{ __('ui.about_stat_cities') }}</span>
      </div>
    @endif
  </div>
</section>

{{-- ════════════════════ HIKAYE ════════════════════ --}}
<div class="ab-story">
  <div class="ab-story-year ab-reveal">
    <div class="ab-story-year-num">@pc('story_year', '2023')</div>
    <div class="ab-story-year-lbl">@pc('story_year_lbl', 'ui.about_story_year_lbl')</div>
  </div>
  <div class="ab-story-copy ab-reveal ab-reveal-d1">
    <p class="eyebrow">@pc('story_eyebrow', 'ui.about_story_eyebrow')</p>
    <h2>@pcRaw('story_title', 'ui.about_story_title')</h2>
    <p>@pc('story_p1', 'ui.about_story_p1')</p>
    <p>@pc('story_p2', 'ui.about_story_p2')</p>
  </div>
</div>

{{-- ════════════════════ DEĞERLER ════════════════════ --}}
<section class="section" style="background: var(--bg-2);">
  <div class="wrap">
    <p class="eyebrow ab-reveal">@pc('values_eyebrow', 'ui.about_values_ey')</p>
    <h2 class="ab-reveal ab-reveal-d1" style="font-size: clamp(30px, 4vw, 56px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px; margin-bottom: 0; max-width: 24ch;">@pcRaw('values_title', 'ui.about_values_title')</h2>
    <div class="ab-values-grid" style="margin-top: clamp(40px, 6vw, 72px);">

      @if($values->isNotEmpty())
        @foreach($values as $i => $val)
          <div class="ab-value ab-reveal{{ $i > 0 ? ' ab-reveal-d'.min($i, 2) : '' }}">
            <div class="ab-value-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            </div>
            <h3>{{ $val['title'] ?? '' }}</h3>
            <p>{{ $val['desc'] ?? '' }}</p>
          </div>
        @endforeach
      @else
        <div class="ab-value ab-reveal">
          <div class="ab-value-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          </div>
          <h3>{{ __('ui.about_val1_title') }}</h3>
          <p>{{ __('ui.about_val1_desc') }}</p>
        </div>

        <div class="ab-value ab-reveal ab-reveal-d1">
          <div class="ab-value-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          </div>
          <h3>{{ __('ui.about_val2_title') }}</h3>
          <p>{{ __('ui.about_val2_desc') }}</p>
        </div>

        <div class="ab-value ab-reveal ab-reveal-d2">
          <div class="ab-value-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
          </div>
          <h3>{{ __('ui.about_val3_title') }}</h3>
          <p>{{ __('ui.about_val3_desc') }}</p>
        </div>
      @endif

    </div>
  </div>
</section>

{{-- ════════════════════ MADE IN TURKEY ════════════════════ --}}
<section class="ab-made">
  <div class="wrap">
    <p class="eyebrow" style="color: color-mix(in oklab, var(--bg) 60%, transparent);">@pc('made_eyebrow', 'ui.about_made_ey')</p>
    <h2 class="ab-reveal">@pcRaw('made_title', 'ui.about_made_title')</h2>
    <p class="ab-made-sub ab-reveal ab-reveal-d1">@pc('made_sub', 'ui.about_made_sub')</p>
  </div>
</section>

{{-- ════════════════════ TİMLİNE ════════════════════ --}}
<section class="section">
  <div class="wrap">
    <p class="eyebrow ab-reveal">@pc('tl_eyebrow', 'ui.about_tl_ey')</p>
    <h2 class="ab-reveal ab-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px; max-width: 22ch;">@pcRaw('tl_title', 'ui.about_tl_title')</h2>

    <div class="ab-timeline">
      @if($timeline->isNotEmpty())
        @foreach($timeline as $item)
          <div class="ab-tl-item ab-reveal">
            <div class="ab-tl-year">{{ $item['year'] ?? '' }}</div>
            <div class="ab-tl-copy">
              <h3>{!! $item['title'] ?? '' !!}</h3>
              <p>{{ $item['desc'] ?? '' }}</p>
            </div>
          </div>
        @endforeach
      @else
        @foreach(range(1, 6) as $i)
          <div class="ab-tl-item ab-reveal">
            <div class="ab-tl-year">{{ __('ui.about_tl'.$i.'_year') }}</div>
            <div class="ab-tl-copy">
              <h3>{!! __('ui.about_tl'.$i.'_title') !!}</h3>
              <p>{{ __('ui.about_tl'.$i.'_desc') }}</p>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

{{-- ════════════════════ CTA ════════════════════ --}}
<section class="ab-cta">
  <div class="wrap">
    <p class="eyebrow" style="justify-content: center;">@pc('cta_eyebrow', 'ui.about_cta_ey')</p>
    <h2 class="ab-reveal">@pcRaw('cta_title', 'ui.about_cta_title')</h2>
    <p class="ab-reveal ab-reveal-d1">@pc('cta_sub', 'ui.about_cta_sub')</p>
    <div class="hero-cta ab-reveal ab-reveal-d2" style="justify-content: center;">
      <a href="{{ $content?->get('cta_btn1_url') ?: '#' }}" class="btn btn-primary" style="font-size: 15px; height: 50px; padding: 0 28px;">@pc('cta_btn1_text', 'ui.about_cta_btn1')</a>
      <a href="{{ ($locale ?? 'tr') === 'en' ? route('en.home') : route('home') }}" class="btn btn-ghost" style="font-size: 15px; height: 50px; padding: 0 28px;">@pc('cta_btn2_text', 'ui.about_cta_btn2')</a>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
  const els = document.querySelectorAll('.ab-reveal');
  if (!els.length) return;
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } });
  }, { threshold: 0.1 });
  els.forEach(el => io.observe(el));
})();
</script>
@endpush
