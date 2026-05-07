@extends('layouts.app')

@section('title', $seo->title ?? $page->name)
@section('description', $seo->description)

@push('meta')
    @if ($seo->canonical)
        <link rel="canonical" href="{{ $seo->canonical }}">
    @endif
    @if ($seo->noindex)
        <meta name="robots" content="noindex">
    @endif
    @if ($seo->keywords)
        <meta name="keywords" content="{{ $seo->keywords }}">
    @endif
@endpush

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-6xl">
        @if ($page->include_toc && ! empty($toc))
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <aside class="lg:col-span-1">
                    <nav class="sticky top-24" aria-label="{{ __('afea-pages::page.toc_aria') }}">
                        <h2 class="text-sm font-semibold uppercase tracking-wide mb-3">
                            {{ __('afea-pages::page.toc_title') }}
                        </h2>
                        @include('afea-pages::partials.toc', ['items' => $toc])
                    </nav>
                </aside>

                <article class="lg:col-span-3 prose max-w-none">
                    <h1>{{ $page->name }}</h1>
                    {!! $content !!}
                </article>
            </div>
        @else
            <article class="prose max-w-none mx-auto">
                <h1>{{ $page->name }}</h1>
                {!! $content !!}
            </article>
        @endif
    </div>
@endsection
