@extends('main')

@php
  $disk = \Illuminate\Support\Facades\Storage::disk('public');

  $isEn = ($locale ?? 'tr') === 'en';
  $indexRoute = $isEn ? route('en.support') : route('destek');
  $canonical = $isEn ? route('en.support.show', ['slug' => $topic->slug]) : route('destek.show', ['slug' => $topic->slug]);

  $documents = $topic->documentList();
  $metaTitle = trim((string) ($topic->meta_title ?? '')) ?: $topic->title.' — Ovion';
  $metaDesc  = trim((string) ($topic->meta_description ?? '')) ?: (string) ($topic->summary ?? '');

  $fileSize = function (?string $path) use ($disk): ?string {
      if (! $path || ! $disk->exists($path)) {
          return null;
      }
      $bytes = $disk->size($path);
      if ($bytes >= 1048576) {
          return number_format($bytes / 1048576, 1).' MB';
      }
      return max(1, (int) round($bytes / 1024)).' KB';
  };
@endphp

@section('title', $metaTitle)
@section('description', $metaDesc)
@section('canonical', $canonical)
@section('theme', 'dark')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/destek.css') }}" />
@endpush

@section('content')

{{-- ════════════════════ HERO ════════════════════ --}}
<section class="sp-hero">
  <div class="wrap">
    <p class="eyebrow" style="justify-content:center;">{{ __('ui.support_eyebrow') }}</p>
    <h1>{{ $topic->title }}</h1>
    @if($topic->summary)
      <p class="sp-hero-sub">{{ $topic->summary }}</p>
    @endif
    <p style="margin-top:24px;">
      <a href="{{ $indexRoute }}" class="btn btn-ghost" style="height:40px; font-size:14px; padding:0 18px;">
        <svg width="11" height="11" viewBox="0 0 12 12" fill="none" style="margin-right:6px;"><path d="M10 6H2M6 2 2 6l4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        {{ __('ui.support_back') }}
      </a>
    </p>
  </div>
</section>

{{-- ════════════════════ İÇERİK ════════════════════ --}}
<section class="section" style="background: var(--bg-2);">
  <div class="wrap" style="max-width: 880px;">

    @if($topic->intro)
      <div class="sp-doc-intro sp-reveal">{!! nl2br(e($topic->intro)) !!}</div>
    @endif

    @if($documents->isNotEmpty())
      <div class="sp-docs">
        @foreach($documents as $i => $doc)
          @php
            $size = $fileSize($doc['file'] ?? null);
            $url = $disk->url($doc['file']);
            $docMeta = 'PDF'.($size ? ' · '.$size : '');
          @endphp
          <a href="{{ $url }}" class="sp-doc sp-reveal{{ $i > 0 ? ' sp-reveal-d' . min($i, 3) : '' }}" target="_blank" rel="noopener" download>
            <span class="sp-doc-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            </span>
            <span class="sp-doc-body">
              <span class="sp-doc-label">{{ $doc['label'] ?? __('ui.support_doc_default') }}</span>
              <span class="sp-doc-meta">{{ $docMeta }}</span>
            </span>
            <span class="sp-doc-dl" aria-hidden="true">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            </span>
          </a>
        @endforeach
      </div>
    @else
      <p class="sp-doc-empty">{{ __('ui.support_doc_empty') }}</p>
    @endif

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
