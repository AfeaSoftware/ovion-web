@extends('main')

@section('title', __('ui.support_meta_title'))
@section('description', __('ui.support_meta_desc'))
@section('canonical', ($locale ?? 'tr') === 'en' ? route('en.support') : route('destek'))
@section('theme', 'dark')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/destek.css') }}" />
@endpush

@section('content')

@php
  $isEn = ($locale ?? 'tr') === 'en';
  $warrantyList = collect($content?->get('warranty_list') ?? []);
  $serviceSteps = collect($content?->get('service_steps') ?? []);
  $topicRouteName = $isEn ? 'en.support.show' : 'destek.show';

  $has = fn (array $keys) => \App\Support\PageContentHelper::hasAny($content ?? null, $keys);
  $showWarranty = $has(['war_title', 'war_desc']) || $warrantyList->isNotEmpty();
  $showService  = $has(['steps_title']) || $serviceSteps->isNotEmpty();
@endphp

{{-- ════════════════════ HERO ════════════════════ --}}
<section class="sp-hero">
  <div class="wrap">
    <p class="eyebrow" style="justify-content:center;">@pc('hero_eyebrow', '')</p>
    <h1>@pcRaw('hero_title', '')</h1>
    <p class="sp-hero-sub">@pc('hero_sub', '')</p>

    <!-- <form class="sp-search-wrap" action="{{ ($locale ?? 'tr') === 'en' ? route('en.search') : route('search') }}" method="GET" role="search">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
      <input type="search" name="q" placeholder="{{ __('ui.support_search_ph') }}" required />
      <button class="sp-search-btn" type="submit">{{ __('ui.support_search_btn') }}</button>
    </form>
    <div class="sp-search-hint">
      <span>{{ __('ui.support_popular') }}</span>
      <button type="button">{{ __('ui.support_pop_battery') }}</button>
      <button type="button">{{ __('ui.support_pop_screen') }}</button>
      <button type="button">{{ __('ui.support_pop_warranty') }}</button>
      <button type="button">{{ __('ui.support_pop_update') }}</button>
    </div> -->
  </div>
</section>

{{-- ════════════════════ HIZLI ERİŞİM ════════════════════ --}}
@if($supportTopics->isNotEmpty())
<section class="section" style="background: var(--bg-2); padding-top: clamp(48px, 7vw, 96px); padding-bottom: clamp(48px, 7vw, 96px);">
  <div class="wrap">
    <p class="eyebrow sp-reveal">@pc('quick_eyebrow', '')</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(26px, 3vw, 40px); letter-spacing: -0.03em; margin-top: 8px;">@pc('quick_title', '')</h2>

    <div class="sp-actions-grid">
      @foreach($supportTopics as $i => $topic)
        @php
          $delayClass = $i > 0 ? ' sp-reveal-d' . min($i, 2) : '';
          $iconKey = $topic->icon ?? 'book';
        @endphp
        <a href="{{ route($topicRouteName, ['slug' => $topic->slug]) }}" class="sp-action sp-reveal{{ $delayClass }}">
          <div class="sp-action-icon">
            @switch($iconKey)
              @case('wrench')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
              @break
              @case('book')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
              @break
              @case('doc')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9" y1="13" x2="15" y2="13"/><line x1="9" y1="17" x2="15" y2="17"/></svg>
              @break
              @case('question')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
              @break
              @case('chat')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              @break
              @case('pin')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              @break
              @case('phone')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.18 6.18l1.19-1.19a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              @break
              @case('mail')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              @break
              @default
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            @endswitch
          </div>
          <h3>{{ $topic->title }}</h3>
          @if($topic->summary)
            <p>{{ $topic->summary }}</p>
          @endif
          <div class="sp-action-arrow">{{ __('ui.support_topic_cta') }} <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ════════════════════ SSS ════════════════════ --}}
@if(!empty($faqs) && $faqs->isNotEmpty())
<section class="section" id="faq">
  <div class="wrap" style="max-width: 880px;">
    <p class="eyebrow sp-reveal">{{ __('ui.support_faq_ey') }}</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px; margin-bottom: clamp(32px, 5vw, 56px);">{!! __('ui.support_faq_title') !!}</h2>

    <div class="sp-faq">

      @foreach ($faqs as $faq)
      <div class="sp-faq-item">
        <details>
          <summary class="sp-faq-q">
            {{ $faq->question }}
            <span class="sp-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
            </span>
          </summary>
          <p class="sp-faq-a">{!! $faq->answer !!}</p>
        </details>
      </div>
      @endforeach

    </div>
  </div>
</section>
@endif

{{-- ════════════════════ GARANTİ ════════════════════ --}}
@if($showWarranty)
<section class="section" id="garanti" style="background: var(--bg-2);">
  <div class="wrap">
    <p class="eyebrow sp-reveal">@pc('war_eyebrow', '')</p>
    <div class="sp-warranty-grid">
      <div class="sp-warranty-copy sp-reveal sp-reveal-d1">
        <h2>@pcRaw('war_title', '')</h2>
        <p>@pc('war_desc', '')</p>
        <ul class="sp-warranty-list">
          @foreach($warrantyList as $li)
            <li>{{ is_array($li) ? ($li['text'] ?? '') : $li }}</li>
          @endforeach
        </ul>
        <div style="margin-top: 28px; display: flex; gap: 12px; flex-wrap: wrap;">
          <a href="#" class="btn btn-primary">{{ __('ui.support_war_check') }}</a>
          <a href="#" class="btn btn-ghost">{{ __('ui.support_war_terms') }}</a>
        </div>
      </div>
      <div class="sp-warranty-card sp-reveal sp-reveal-d2">
        <div class="sp-warranty-badge">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          @pc('war_badge', '')
        </div>
        <div>
          <div class="sp-warranty-num">@pc('war_months', '') <span>@pc('war_unit', '')</span></div>
          <p style="margin-top: 10px; font-size: 14px; color: var(--muted);">@pc('war_sub', '')</p>
        </div>
        <div style="border-top: 1px solid var(--line-2); padding-top: 20px; display: flex; flex-direction: column; gap: 10px;">
          <div style="display:flex; justify-content:space-between; font-size:14px;">
            <span style="color:var(--muted);">@pc('war_row1_lbl', '')</span>
            <span style="color:var(--ink); font-weight:500;">@pc('war_row1_val', '')</span>
          </div>
          <div style="display:flex; justify-content:space-between; font-size:14px;">
            <span style="color:var(--muted);">@pc('war_row2_lbl', '')</span>
            <span style="color:var(--ink); font-weight:500;">@pc('war_row2_val', '')</span>
          </div>
          <div style="display:flex; justify-content:space-between; font-size:14px;">
            <span style="color:var(--muted);">@pc('war_row3_lbl', '')</span>
            <span style="color:var(--ink); font-weight:500;">@pc('war_row3_val', '')</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

{{-- ════════════════════ MÜŞTERİ YORUMLARI ════════════════════ --}}
@if(!empty($testimonials) && $testimonials->isNotEmpty())
<section class="section" id="yorumlar">
  <div class="wrap">
    <p class="eyebrow sp-reveal">{{ __('ui.support_reviews_ey') }}</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px; margin-bottom: clamp(32px, 5vw, 56px);">Ovion'u <em>seviyorlar.</em></h2>

    <div class="sp-reviews-grid">
      @foreach ($testimonials as $t)
      @php
        $thumbUrl = $t->getFirstMediaUrl('testimonials/thumbnails');
        $thumb = $thumbUrl ? preg_replace('#^https?://[^/]+#', '', $thumbUrl) : null;
      @endphp
      <div class="sp-review sp-reveal{{ $loop->index > 0 ? ' sp-reveal-d' . min($loop->index, 3) : '' }}">
        <div class="sp-review-stars" aria-label="5 yıldız">
          @for ($s = 0; $s < 5; $s++)
          <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          @endfor
        </div>
        @if($t->summary)
        <p class="sp-review-summary">&ldquo;{{ $t->summary }}&rdquo;</p>
        @endif
        @if($t->content)
        <div class="sp-review-body">{!! $t->content !!}</div>
        @endif
        <div class="sp-review-author">
          @if($thumb)
          <img src="{{ $thumb }}" alt="{{ $t->name }}" class="sp-review-avatar" width="36" height="36" loading="lazy" />
          @else
          <div class="sp-review-avatar sp-review-avatar--initials">{{ mb_substr($t->name, 0, 1) }}</div>
          @endif
          <div>
            <span class="sp-review-name">{{ $t->name }}</span>
            @if($t->title || $t->company)
            <span class="sp-review-role">{{ implode(', ', array_filter([$t->title, $t->company])) }}</span>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ════════════════════ SERVİS ADIMLARI ════════════════════ --}}
@if($showService)
<section class="section" id="servis">
  <div class="wrap">
    <p class="eyebrow sp-reveal">@pc('steps_eyebrow', '')</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px;">@pcRaw('steps_title', '')</h2>

    <div class="sp-steps">
      @foreach($serviceSteps as $i => $step)
        <div class="sp-step sp-reveal{{ $i > 0 ? ' sp-reveal-d' . min($i, 3) : '' }}">
          <div class="sp-step-num">{{ __('ui.support_step_label') }} {{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}</div>
          <h3>{{ $step['title'] ?? '' }}</h3>
          <p>{{ $step['desc'] ?? '' }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ════════════════════ İLETİŞİM ════════════════════ --}}
<section class="section" id="iletisim" style="background: var(--bg-2);">
  <div class="wrap">
    <p class="eyebrow sp-reveal">@pc('contact_eyebrow', '')</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px;">@pcRaw('contact_title', '')</h2>

    <div class="sp-contact-grid">

      <div class="sp-contact-card sp-reveal sp-reveal-d1" style="grid-column: 1 / -1;">
        <div class="sp-contact-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.247-.694.247-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
        </div>
        <h3>{{ __('ui.support_wa_title') }}</h3>
        <p class="sp-contact-detail">
          <a href="https://wa.me/905419104838" target="_blank" rel="noopener">0541 910 48 38</a>
          <span style="color: var(--muted);"> | </span>
          <a href="https://wa.me/905449104838" target="_blank" rel="noopener">0544 910 48 38</a>
        </p>
        <p><strong>{{ __('ui.support_wa_hours_label') }}:</strong> {{ __('ui.support_wa_hours') }}</p>
      </div>

    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
  const els = document.querySelectorAll('.sp-reveal');
  if (!els.length) return;
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } });
  }, { threshold: 0.08 });
  els.forEach(el => io.observe(el));
})();
</script>
@endpush
