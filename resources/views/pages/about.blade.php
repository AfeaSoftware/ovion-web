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
  $stats = collect($content?->get('stats') ?? [])->filter(fn ($stat) => trim((string) ($stat['value'] ?? '')) !== '' || trim((string) ($stat['label'] ?? '')) !== '')->values();
  $values = collect($content?->get('values') ?? [])->filter(fn ($val) => trim((string) ($val['title'] ?? '')) !== '' || trim((string) ($val['desc'] ?? '')) !== '')->values();
  $timeline = collect($content?->get('timeline') ?? [])->filter(fn ($item) => trim((string) ($item['year'] ?? '')) !== '' || trim((string) ($item['title'] ?? '')) !== '' || trim((string) ($item['desc'] ?? '')) !== '')->values();
  $has = fn (string ...$keys) => \App\Support\PageContentHelper::hasAny($content, $keys);
@endphp

{{-- ════════════════════ HERO ════════════════════ --}}
@if($has('hero_eyebrow', 'hero_title', 'hero_lede'))
<section class="ab-hero">
  <div class="ab-hero-bg" aria-hidden="true"></div>
  <div class="wrap">
    @if($has('hero_eyebrow'))<p class="eyebrow">@pc('hero_eyebrow', '')</p>@endif
    @if($has('hero_title'))<h1>@pcRaw('hero_title', '')</h1>@endif
    @if($has('hero_lede'))<p class="ab-hero-lede">@pc('hero_lede', '')</p>@endif
  </div>
</section>
@endif

{{-- ════════════════════ STAT STRIP ════════════════════ --}}
@if($stats->isNotEmpty())
<section class="stat-strip" aria-label="{{ __('ui.about_stats_label') }}">
  <div class="wrap stat-row stagger">
    @foreach($stats as $i => $stat)
      <div class="stat" style="--i:{{ $i }}">
        @if(trim((string) ($stat['value'] ?? '')) !== '')<span class="stat-num">{{ $stat['value'] }}</span>@endif
        @if(trim((string) ($stat['label'] ?? '')) !== '')<span class="stat-lbl">{{ $stat['label'] }}</span>@endif
      </div>
    @endforeach
  </div>
</section>
@endif

{{-- ════════════════════ HIKAYE ════════════════════ --}}
@if($has('story_year', 'story_year_lbl', 'story_eyebrow', 'story_title', 'story_p1', 'story_p2'))
<div class="ab-story">
  @if($has('story_year', 'story_year_lbl'))
  <div class="ab-story-year ab-reveal">
    @if($has('story_year'))<div class="ab-story-year-num">@pc('story_year', '')</div>@endif
    @if($has('story_year_lbl'))<div class="ab-story-year-lbl">@pc('story_year_lbl', '')</div>@endif
  </div>
  @endif
  @if($has('story_eyebrow', 'story_title', 'story_p1', 'story_p2'))
  <div class="ab-story-copy ab-reveal ab-reveal-d1">
    @if($has('story_eyebrow'))<p class="eyebrow">@pc('story_eyebrow', '')</p>@endif
    @if($has('story_title'))<h2>@pcRaw('story_title', '')</h2>@endif
    @if($has('story_p1'))<p>@pc('story_p1', '')</p>@endif
    @if($has('story_p2'))<p>@pc('story_p2', '')</p>@endif
  </div>
  @endif
</div>
@endif

{{-- ════════════════════ DEĞERLER ════════════════════ --}}
@if($values->isNotEmpty() || $has('values_eyebrow', 'values_title'))
<section class="section" style="background: var(--bg-2);">
  <div class="wrap">
    @if($has('values_eyebrow'))<p class="eyebrow ab-reveal">@pc('values_eyebrow', '')</p>@endif
    @if($has('values_title'))<h2 class="ab-reveal ab-reveal-d1" style="font-size: clamp(30px, 4vw, 56px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px; margin-bottom: 0; max-width: 24ch;">@pcRaw('values_title', '')</h2>@endif
    @if($values->isNotEmpty())
    <div class="ab-values-grid" style="margin-top: clamp(40px, 6vw, 72px);">
      @foreach($values as $i => $val)
        <div class="ab-value ab-reveal{{ $i > 0 ? ' ab-reveal-d'.min($i, 2) : '' }}">
          <div class="ab-value-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          </div>
          @if(trim((string) ($val['title'] ?? '')) !== '')<h3>{{ $val['title'] }}</h3>@endif
          @if(trim((string) ($val['desc'] ?? '')) !== '')<p>{{ $val['desc'] }}</p>@endif
        </div>
      @endforeach
    </div>
    @endif
  </div>
</section>
@endif

{{-- ════════════════════ MADE IN TURKEY ════════════════════ --}}
@if($has('made_eyebrow', 'made_title', 'made_sub'))
<section class="ab-made">
  <div class="wrap">
    @if($has('made_eyebrow'))<p class="eyebrow" style="color: color-mix(in oklab, var(--bg) 60%, transparent);">@pc('made_eyebrow', '')</p>@endif
    @if($has('made_title'))<h2 class="ab-reveal">@pcRaw('made_title', '')</h2>@endif
    @if($has('made_sub'))<p class="ab-made-sub ab-reveal ab-reveal-d1">@pc('made_sub', '')</p>@endif
  </div>
</section>
@endif

{{-- ════════════════════ TİMLİNE ════════════════════ --}}
@if($timeline->isNotEmpty() || $has('tl_eyebrow', 'tl_title'))
<section class="section">
  <div class="wrap">
    @if($has('tl_eyebrow'))<p class="eyebrow ab-reveal">@pc('tl_eyebrow', '')</p>@endif
    @if($has('tl_title'))<h2 class="ab-reveal ab-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px; max-width: 22ch;">@pcRaw('tl_title', '')</h2>@endif

    @if($timeline->isNotEmpty())
    <div class="ab-timeline">
      @foreach($timeline as $item)
        <div class="ab-tl-item ab-reveal">
          @if(trim((string) ($item['year'] ?? '')) !== '')<div class="ab-tl-year">{{ $item['year'] }}</div>@endif
          <div class="ab-tl-copy">
            @if(trim((string) ($item['title'] ?? '')) !== '')<h3>{!! $item['title'] !!}</h3>@endif
            @if(trim((string) ($item['desc'] ?? '')) !== '')<p>{{ $item['desc'] }}</p>@endif
          </div>
        </div>
      @endforeach
    </div>
    @endif
  </div>
</section>
@endif

{{-- ════════════════════ CTA ════════════════════ --}}
@php
  $ctaBtn1 = $has('cta_btn1_text');
  $ctaBtn2 = $has('cta_btn2_text');
@endphp
@if($has('cta_eyebrow', 'cta_title', 'cta_sub') || $ctaBtn1 || $ctaBtn2)
<section class="ab-cta">
  <div class="wrap">
    @if($has('cta_eyebrow'))<p class="eyebrow" style="justify-content: center;">@pc('cta_eyebrow', '')</p>@endif
    @if($has('cta_title'))<h2 class="ab-reveal">@pcRaw('cta_title', '')</h2>@endif
    @if($has('cta_sub'))<p class="ab-reveal ab-reveal-d1">@pc('cta_sub', '')</p>@endif
    @if($ctaBtn1 || $ctaBtn2)
    <div class="hero-cta ab-reveal ab-reveal-d2" style="justify-content: center;">
      @if($ctaBtn1)<a href="{{ $content?->get('cta_btn1_url') ?: '#' }}" class="btn btn-primary" style="font-size: 15px; height: 50px; padding: 0 28px;">@pc('cta_btn1_text', '')</a>@endif
      @if($ctaBtn2)<a href="{{ ($locale ?? 'tr') === 'en' ? route('en.home') : route('home') }}" class="btn btn-ghost" style="font-size: 15px; height: 50px; padding: 0 28px;">@pc('cta_btn2_text', '')</a>@endif
    </div>
    @endif
  </div>
</section>
@endif

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
