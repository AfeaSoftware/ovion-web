@extends('main')

@php
  $isEn = ($locale ?? 'tr') === 'en';

  $titleFallback = match ($page) {
      'privacy' => $isEn ? 'Privacy Policy' : 'Gizlilik Politikası',
      'cookies' => $isEn ? 'Cookie Policy' : 'Çerez Politikası',
      'terms'   => $isEn ? 'Terms of Use' : 'Kullanım Şartları',
  };

  $routeName = 'legal.' . $page;
  $canonical = $isEn ? route('en.' . $routeName) : route($routeName);

  $eyebrow      = (string) ($content?->get('eyebrow') ?? ($isEn ? 'Legal' : 'Yasal'));
  $title        = (string) ($content?->get('title') ?? $titleFallback);
  $lede         = (string) ($content?->get('lede') ?? '');
  $lastUpdated  = (string) ($content?->get('last_updated') ?? '');
  $body         = (string) ($content?->get('body') ?? '');
  $metaTitle    = trim((string) ($content?->get('meta_title') ?? '')) ?: $title;
  $metaDesc     = trim((string) ($content?->get('meta_description') ?? '')) ?: $lede;
@endphp

@section('title', $metaTitle)
@section('description', $metaDesc)
@section('canonical', $canonical)
@section('theme', 'dark')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/legal.css') }}" />
@endpush

@section('content')

<section class="lg-hero">
  <div class="wrap">
    @if($eyebrow !== '')
      <p class="eyebrow">{{ $eyebrow }}</p>
    @endif
    <h1>{{ $title }}</h1>
    @if($lede !== '')
      <p class="lg-hero-lede">{{ $lede }}</p>
    @endif
    @if($lastUpdated !== '')
      <p class="lg-updated">{{ $lastUpdated }}</p>
    @endif
  </div>
</section>

<section class="lg-body">
  <div class="wrap">
    <article class="lg-prose">
      @if($body !== '')
        {!! $body !!}
      @else
        <p class="lg-empty">{{ $isEn ? 'This page is being prepared.' : 'Bu sayfa hazırlanıyor.' }}</p>
      @endif
    </article>
  </div>
</section>

@endsection
