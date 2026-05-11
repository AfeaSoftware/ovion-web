@extends('main')

@section('title', ($query ?: __('ui.search_default_title')).' — '.__('ui.search_meta_suffix'))
@section('description', __('ui.search_meta_desc'))
@section('theme', 'dark')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/destek.css') }}" />
@endpush

@section('content')

@php $isEn = ($locale ?? 'tr') === 'en'; @endphp

<section class="sp-hero">
  <div class="wrap">
    <p class="eyebrow" style="justify-content:center;">{{ __('ui.search_eyebrow') }}</p>
    <h1>{{ __('ui.search_title') }}</h1>
    @if($query !== '')
      <p class="sp-hero-sub">"{{ $query }}" {{ __('ui.search_for') }} — {{ $results->count() }} {{ __('ui.search_results_count') }}</p>
    @endif

    <form class="sp-search-wrap" action="{{ $isEn ? route('en.search') : route('search') }}" method="GET" role="search" style="margin-top:24px;">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
      <input type="search" name="q" value="{{ $query }}" placeholder="{{ __('ui.support_search_ph') }}" required autofocus />
      <button class="sp-search-btn" type="submit">{{ __('ui.support_search_btn') }}</button>
    </form>
  </div>
</section>

<section class="section" style="background: var(--bg);">
  <div class="wrap" style="max-width: 880px;">
    @if($query === '')
      <p style="color: var(--muted);">{{ __('ui.search_prompt') }}</p>
    @elseif($results->isEmpty())
      <div style="padding: 48px 0; text-align:center; color: var(--muted);">
        <p style="font-size: 16px;">{{ __('ui.search_empty') }}</p>
      </div>
    @else
      <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:16px;">
        @foreach($results as $hit)
          <li>
            <a href="{{ $hit['url'] }}" style="display:block; padding:20px 24px; border:1px solid var(--line-2); border-radius:12px; transition: border-color .2s, transform .2s;">
              <div style="display:flex; gap:12px; align-items:center; margin-bottom:6px;">
                <span style="font-size:11px; letter-spacing:0.12em; text-transform:uppercase; color: var(--accent-ink); font-weight: 500;">{{ $hit['label'] }}</span>
              </div>
              <h3 style="font-size:18px; font-weight:500; margin:0 0 6px; color: var(--ink);">{{ $hit['title'] }}</h3>
              @if(!empty($hit['description']))
                <p style="font-size:14px; color: var(--muted); margin:0; line-height:1.5;">{{ \Illuminate\Support\Str::limit($hit['description'], 180) }}</p>
              @endif
            </a>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</section>

@endsection
