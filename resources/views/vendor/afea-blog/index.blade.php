@extends('main')

@section('title', __('afea-blog::blog.plural_model_label') . ' — Ovion')
@section('description', 'Ovion Blog — Teknoloji haberleri, ürün güncellemeleri ve daha fazlası.')
@section('theme', 'dark')

@push('styles')
<style>
.blog-index-hero {
    padding: clamp(64px, 8vw, 100px) 0 clamp(32px, 4vw, 52px);
    border-bottom: 1px solid var(--line);
}
.blog-index-hero .eyebrow { margin-bottom: 14px; }
.blog-index-hero h1 {
    font-size: clamp(32px, 5vw, 60px);
    font-weight: 700;
    letter-spacing: -0.035em;
    line-height: 1.1;
    color: var(--ink);
    margin: 0;
}

.blog-grid-section { padding: clamp(48px, 6vw, 80px) 0 clamp(64px, 8vw, 108px); }

.blog-pagination {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: clamp(40px, 5vw, 64px);
    flex-wrap: wrap;
}
.blog-pagination a,
.blog-pagination span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 38px;
    height: 38px;
    padding: 0 10px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 500;
    border: 1px solid var(--line);
    color: var(--ink-2);
    background: var(--card);
    text-decoration: none;
    transition: border-color .2s, color .2s, background .2s;
}
.blog-pagination a:hover { border-color: var(--accent); color: var(--accent-ink); }
.blog-pagination .blog-page-active {
    background: var(--accent);
    border-color: var(--accent);
    color: var(--bg);
}
</style>
@endpush

@section('content')

    <section class="blog-index-hero">
        <div class="wrap">
            <p class="eyebrow">Blog</p>
            <h1>Haberler &amp; Yazılar</h1>
        </div>
    </section>

    <section class="blog-grid-section">
        <div class="wrap">

            @if($posts->isEmpty())
                <p style="color:var(--muted); text-align:center; padding: 48px 0;">Henüz yayınlanmış yazı yok.</p>
            @else
                <div class="news-grid stagger">
                    @foreach($posts as $post)
                        @php
                            $thumb = $post->getFirstMediaUrl(config('afea-blog.media.thumbnail_collection'), 'preview')
                                ?: $post->getFirstMediaUrl(config('afea-blog.media.thumbnail_collection'));
                            $thumb = $thumb ? preg_replace('#^https?://[^/]+#', '', $thumb) : null;
                        @endphp
                        <article class="news-card {{ $loop->first ? 'news-featured' : '' }}" style="--i:{{ $loop->index }}">
                            <a href="{{ $post->publicUrl() }}" class="news-card-link">
                                <div class="news-media {{ $loop->first ? '' : 'news-media--sm' }}">
                                    @if($thumb)
                                        <img src="{{ $thumb }}" alt="{{ $post->thumbnail_image_alt ?? $post->title }}" loading="lazy" decoding="async" />
                                    @endif
                                </div>
                                <div class="news-body">
                                    @if($post->category)
                                        <span class="news-tag">{{ $post->category->name }}</span>
                                    @endif
                                    <h3>{{ $post->title }}</h3>
                                    <span class="news-date">
                                        {{ $post->published_at?->translatedFormat('d F Y') }}
                                        &middot; {{ $post->reading_time }} dk okuma
                                    </span>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                @if($posts->hasPages())
                    <nav class="blog-pagination" aria-label="Sayfalama">
                        @if($posts->onFirstPage())
                            <span aria-disabled="true">&lsaquo;</span>
                        @else
                            <a href="{{ $posts->previousPageUrl() }}" aria-label="Önceki sayfa">&lsaquo;</a>
                        @endif

                        @foreach($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                            @if($page == $posts->currentPage())
                                <span class="blog-page-active" aria-current="page">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if($posts->hasMorePages())
                            <a href="{{ $posts->nextPageUrl() }}" aria-label="Sonraki sayfa">&rsaquo;</a>
                        @else
                            <span aria-disabled="true">&rsaquo;</span>
                        @endif
                    </nav>
                @endif
            @endif

        </div>
    </section>

@endsection
