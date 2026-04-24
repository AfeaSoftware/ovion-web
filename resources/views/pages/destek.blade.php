@extends('main')

@section('title', __('ui.support_meta_title'))
@section('description', __('ui.support_meta_desc'))
@section('canonical', ($locale ?? 'tr') === 'en' ? route('en.support') : route('destek'))
@section('theme', 'dark')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/destek.css') }}" />
@endpush

@section('content')

{{-- ════════════════════ HERO ════════════════════ --}}
<section class="sp-hero">
  <div class="wrap">
    <p class="eyebrow" style="justify-content:center;">{{ __('ui.support_eyebrow') }}</p>
    <h1>{!! __('ui.support_hero_title') !!}</h1>
    <p class="sp-hero-sub">{{ __('ui.support_hero_sub') }}</p>

    <div class="sp-search-wrap">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
      <input type="search" placeholder="{{ __('ui.support_search_ph') }}" />
      <button class="sp-search-btn" type="button">{{ __('ui.support_search_btn') }}</button>
    </div>
    <div class="sp-search-hint">
      <span>{{ __('ui.support_popular') }}</span>
      <button type="button">{{ __('ui.support_pop_battery') }}</button>
      <button type="button">{{ __('ui.support_pop_screen') }}</button>
      <button type="button">{{ __('ui.support_pop_warranty') }}</button>
      <button type="button">{{ __('ui.support_pop_update') }}</button>
    </div>
  </div>
</section>

{{-- ════════════════════ HIZLI ERİŞİM ════════════════════ --}}
<section class="section" style="background: var(--bg-2); padding-top: clamp(48px, 7vw, 96px); padding-bottom: clamp(48px, 7vw, 96px);">
  <div class="wrap">
    <p class="eyebrow sp-reveal">{{ __('ui.support_quick_ey') }}</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(26px, 3vw, 40px); letter-spacing: -0.03em; margin-top: 8px;">{{ __('ui.support_quick_title') }}</h2>

    <div class="sp-actions-grid">

      <a href="#garanti" class="sp-action sp-reveal">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3>{{ __('ui.support_act1_title') }}</h3>
        <p>{{ __('ui.support_act1_desc') }}</p>
        <div class="sp-action-arrow">{{ __('ui.support_act1_cta') }} <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

      <a href="#servis" class="sp-action sp-reveal sp-reveal-d1">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
        </div>
        <h3>{{ __('ui.support_act2_title') }}</h3>
        <p>{{ __('ui.support_act2_desc') }}</p>
        <div class="sp-action-arrow">{{ __('ui.support_act2_cta') }} <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

      <a href="#kilavuz" class="sp-action sp-reveal sp-reveal-d2">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
        </div>
        <h3>{{ __('ui.support_act3_title') }}</h3>
        <p>{{ __('ui.support_act3_desc') }}</p>
        <div class="sp-action-arrow">{{ __('ui.support_act3_cta') }} <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

      <a href="#faq" class="sp-action sp-reveal">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        </div>
        <h3>{{ __('ui.support_act4_title') }}</h3>
        <p>{{ __('ui.support_act4_desc') }}</p>
        <div class="sp-action-arrow">{{ __('ui.support_act4_cta') }} <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

      <a href="#iletisim" class="sp-action sp-reveal sp-reveal-d1">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3>{{ __('ui.support_act5_title') }}</h3>
        <p>{{ __('ui.support_act5_desc') }}</p>
        <div class="sp-action-arrow">{{ __('ui.support_act5_cta') }} <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

      <a href="#servis" class="sp-action sp-reveal sp-reveal-d2">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <h3>{!! __('ui.support_act6_title') !!}</h3>
        <p>{{ __('ui.support_act6_desc') }}</p>
        <div class="sp-action-arrow">{{ __('ui.support_act6_cta') }} <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

    </div>
  </div>
</section>

{{-- ════════════════════ SSS ════════════════════ --}}
<section class="section" id="faq">
  <div class="wrap" style="max-width: 880px;">
    <p class="eyebrow sp-reveal">{{ __('ui.support_faq_ey') }}</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px; margin-bottom: clamp(32px, 5vw, 56px);">{!! __('ui.support_faq_title') !!}</h2>

    <div class="sp-faq">

      @foreach (range(1, 6) as $i)
      <div class="sp-faq-item">
        <details>
          <summary class="sp-faq-q">
            {{ __('ui.support_faq_q' . $i) }}
            <span class="sp-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
            </span>
          </summary>
          <p class="sp-faq-a">{!! __('ui.support_faq_a' . $i) !!}</p>
        </details>
      </div>
      @endforeach

    </div>
  </div>
</section>

{{-- ════════════════════ GARANTİ ════════════════════ --}}
<section class="section" id="garanti" style="background: var(--bg-2);">
  <div class="wrap">
    <p class="eyebrow sp-reveal">{{ __('ui.support_war_ey') }}</p>
    <div class="sp-warranty-grid">
      <div class="sp-warranty-copy sp-reveal sp-reveal-d1">
        <h2>{!! __('ui.support_war_title') !!}</h2>
        <p>{{ __('ui.support_war_desc') }}</p>
        <ul class="sp-warranty-list">
          <li>{{ __('ui.support_war_li1') }}</li>
          <li>{{ __('ui.support_war_li2') }}</li>
          <li>{{ __('ui.support_war_li3') }}</li>
          <li>{{ __('ui.support_war_li4') }}</li>
          <li>{{ __('ui.support_war_li5') }}</li>
        </ul>
        <div style="margin-top: 28px; display: flex; gap: 12px; flex-wrap: wrap;">
          <a href="#" class="btn btn-primary">{{ __('ui.support_war_check') }}</a>
          <a href="#" class="btn btn-ghost">{{ __('ui.support_war_terms') }}</a>
        </div>
      </div>
      <div class="sp-warranty-card sp-reveal sp-reveal-d2">
        <div class="sp-warranty-badge">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          {{ __('ui.support_war_badge') }}
        </div>
        <div>
          <div class="sp-warranty-num">24 <span>{{ __('ui.support_war_unit') }}</span></div>
          <p style="margin-top: 10px; font-size: 14px; color: var(--muted);">{{ __('ui.support_war_sub') }}</p>
        </div>
        <div style="border-top: 1px solid var(--line-2); padding-top: 20px; display: flex; flex-direction: column; gap: 10px;">
          <div style="display:flex; justify-content:space-between; font-size:14px;">
            <span style="color:var(--muted);">{{ __('ui.support_war_row1_lbl') }}</span>
            <span style="color:var(--ink); font-weight:500;">{{ __('ui.support_war_row1_val') }}</span>
          </div>
          <div style="display:flex; justify-content:space-between; font-size:14px;">
            <span style="color:var(--muted);">{{ __('ui.support_war_row2_lbl') }}</span>
            <span style="color:var(--ink); font-weight:500;">{{ __('ui.support_war_row2_val') }}</span>
          </div>
          <div style="display:flex; justify-content:space-between; font-size:14px;">
            <span style="color:var(--muted);">{{ __('ui.support_war_row3_lbl') }}</span>
            <span style="color:var(--ink); font-weight:500;">{{ __('ui.support_war_row3_val') }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ════════════════════ SERVİS ADIMLARI ════════════════════ --}}
<section class="section" id="servis">
  <div class="wrap">
    <p class="eyebrow sp-reveal">{{ __('ui.support_steps_ey') }}</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px;">{!! __('ui.support_steps_title') !!}</h2>

    <div class="sp-steps">
      @foreach (range(1, 4) as $i)
      <div class="sp-step sp-reveal{{ $i > 1 ? ' sp-reveal-d' . ($i - 1) : '' }}">
        <div class="sp-step-num">{{ __('ui.support_step_label') }} 0{{ $i }}</div>
        <h3>{{ __('ui.support_step' . $i . '_title') }}</h3>
        <p>{{ __('ui.support_step' . $i . '_desc') }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ════════════════════ İLETİŞİM ════════════════════ --}}
<section class="section" id="iletisim" style="background: var(--bg-2);">
  <div class="wrap">
    <p class="eyebrow sp-reveal">{{ __('ui.support_contact_ey') }}</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px;">{!! __('ui.support_contact_title') !!}</h2>

    <div class="sp-contact-grid">

      <div class="sp-contact-card sp-reveal">
        <div class="sp-contact-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.18 6.18l1.19-1.19a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <h3>{{ __('ui.support_c1_title') }}</h3>
        <p>{{ __('ui.support_c1_hours') }}</p>
        <p class="sp-contact-detail">0850 000 00 00</p>
        <a href="tel:08500000000" class="btn btn-ghost" style="height:40px; font-size:14px; padding:0 16px;">{{ __('ui.support_c1_cta') }}</a>
      </div>

      <div class="sp-contact-card sp-reveal sp-reveal-d1">
        <div class="sp-contact-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <h3>{{ __('ui.support_c2_title') }}</h3>
        <p>{{ __('ui.support_c2_hours') }}</p>
        <p class="sp-contact-detail">destek@ovion.com.tr</p>
        <a href="mailto:destek@ovion.com.tr" class="btn btn-ghost" style="height:40px; font-size:14px; padding:0 16px;">{{ __('ui.support_c2_cta') }}</a>
      </div>

      <div class="sp-contact-card sp-reveal sp-reveal-d2">
        <div class="sp-contact-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3>{{ __('ui.support_c3_title') }}</h3>
        <p>{{ __('ui.support_c3_hours') }}</p>
        <p class="sp-contact-detail" style="color: var(--accent-ink);">{{ __('ui.support_c3_status') }}</p>
        <a href="#" class="btn btn-primary" style="height:40px; font-size:14px; padding:0 16px;">{{ __('ui.support_c3_cta') }}</a>
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
