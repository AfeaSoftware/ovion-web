@extends('main')

@section('title', ($seo->title ?? $post->title) . ' — Ovion Blog')
@section('description', $seo->description ?? Str::limit(strip_tags($post->content), 160))
@section('theme', 'dark')

@push('meta')
    @if ($seo->canonical ?? null)
        <link rel="canonical" href="{{ $seo->canonical }}">
    @endif
    @if ($seo->noindex ?? false)
        <meta name="robots" content="noindex">
    @endif
    @if ($seo->keywords ?? null)
        <meta name="keywords" content="{{ $seo->keywords }}">
    @endif
@endpush

@push('styles')
<style>
/* ── Progress bar ──────────────────────────── */
.bp-progress {
    position: fixed; top: 0; left: 0; z-index: 100;
    width: 0%; height: 2px;
    background: var(--accent);
    transition: width .1s linear;
    pointer-events: none;
}

/* ── Hero ───────────────────────────────────── */
.bp-hero {
    position: relative;
    width: 100%;
    min-height: clamp(380px, 55vh, 600px);
    display: flex;
    align-items: flex-end;
    overflow: hidden;
    background: var(--bg-2);
}
.bp-hero-img {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
}
.bp-hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(14,16,19,.1) 0%,
        rgba(14,16,19,.45) 40%,
        rgba(14,16,19,.88) 100%
    );
}
.bp-hero-nophoto {
    position: absolute; inset: 0;
    background: radial-gradient(ellipse 80% 60% at 50% 100%,
        color-mix(in oklab, var(--accent) 14%, transparent),
        transparent 70%),
        var(--bg-2);
}
.bp-hero-content {
    position: relative; z-index: 2;
    width: 100%;
    padding: clamp(32px, 4vw, 56px) 0;
}
.bp-hero-inner {
    max-width: var(--maxw);
    margin: 0 auto;
    padding: 0 var(--gutter);
}
.bp-hero-cat {
    display: inline-block;
    font-size: 11px; font-weight: 600; letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--accent-ink);
    background: color-mix(in oklab, var(--accent) 18%, transparent);
    padding: 4px 12px; border-radius: 999px;
    margin-bottom: 16px;
}
.bp-hero-title {
    font-size: clamp(28px, 4.5vw, 58px);
    font-weight: 700;
    letter-spacing: -0.03em;
    line-height: 1.08;
    color: #fff;
    max-width: 820px;
    margin: 0 0 20px;
    text-shadow: 0 2px 20px rgba(0,0,0,.3);
}
.bp-hero-meta {
    display: flex; align-items: center; flex-wrap: wrap;
    gap: 6px 12px;
    font-size: 13px; color: rgba(255,255,255,.6);
}
.bp-hero-meta-sep { color: rgba(255,255,255,.25); }
.bp-hero-meta time,
.bp-hero-meta span { color: rgba(255,255,255,.65); }

/* ── Back link ─────────────────────────────── */
.bp-breadcrumb {
    display: flex; align-items: center; gap: 8px;
    padding: clamp(20px, 2.5vw, 32px) 0 0;
    font-size: 13px; color: var(--muted);
}
.bp-breadcrumb a {
    display: inline-flex; align-items: center; gap: 5px;
    color: var(--muted); text-decoration: none;
    transition: color .2s;
}
.bp-breadcrumb a:hover { color: var(--ink); }
.bp-breadcrumb-sep { color: var(--line); }

/* ── Layout ────────────────────────────────── */
.bp-layout {
    display: grid;
    grid-template-columns: 1fr 260px;
    gap: clamp(32px, 4vw, 64px);
    align-items: start;
    padding: clamp(40px, 5vw, 64px) 0 clamp(64px, 8vw, 108px);
    max-width: var(--maxw);
    margin: 0 auto;
    padding-left: var(--gutter);
    padding-right: var(--gutter);
}
@media (max-width: 860px) {
    .bp-layout {
        grid-template-columns: 1fr;
    }
    .bp-sidebar { display: none; }
}

/* ── Content ────────────────────────────────── */
.bp-content {
    font-size: clamp(15.5px, 1.1vw, 17px);
    line-height: 1.8;
    color: var(--ink-2);
    min-width: 0;
}
.bp-content p { margin: 0 0 1.5em; color: var(--ink-2); }
.bp-content h2 {
    font-size: clamp(21px, 2vw, 30px);
    font-weight: 700; letter-spacing: -0.025em;
    color: var(--ink); margin: 2.4em 0 0.7em;
    padding-top: 0.2em;
    border-top: 1px solid var(--line-2);
}
.bp-content h3 {
    font-size: clamp(18px, 1.6vw, 23px);
    font-weight: 600; letter-spacing: -0.02em;
    color: var(--ink); margin: 2em 0 0.55em;
}
.bp-content h4 {
    font-size: clamp(15px, 1.2vw, 18px);
    font-weight: 600; color: var(--ink);
    margin: 1.6em 0 0.5em;
}
.bp-content ul, .bp-content ol {
    padding-left: 1.6em; margin: 0 0 1.5em;
}
.bp-content li { margin-bottom: 0.5em; }
.bp-content a {
    color: var(--accent-ink);
    text-decoration: underline;
    text-underline-offset: 3px;
    text-decoration-thickness: 1px;
}
.bp-content a:hover { color: var(--accent); }
.bp-content strong { color: var(--ink); font-weight: 600; }
.bp-content em { font-style: italic; }
.bp-content blockquote {
    border-left: 3px solid var(--accent);
    margin: 2em 0;
    padding: 16px 24px;
    background: color-mix(in oklab, var(--accent) 5%, var(--bg-2));
    border-radius: 0 var(--radius) var(--radius) 0;
    font-size: 1.05em;
    font-style: italic;
    color: var(--ink-2);
}
.bp-content blockquote p:last-child { margin: 0; }
.bp-content img {
    border-radius: var(--radius);
    margin: 2em 0;
    width: 100%;
    height: auto;
    border: 1px solid var(--line-2);
}
.bp-content pre {
    background: var(--bg-2);
    border: 1px solid var(--line);
    border-radius: var(--radius);
    padding: 20px 22px;
    overflow-x: auto;
    font-size: 13.5px;
    margin: 1.8em 0;
    line-height: 1.6;
}
.bp-content code {
    font-size: 0.85em;
    background: color-mix(in oklab, var(--accent) 10%, var(--bg-2));
    border: 1px solid color-mix(in oklab, var(--accent) 20%, var(--line));
    padding: 2px 7px; border-radius: 5px;
    font-family: ui-monospace, 'Fira Code', monospace;
}
.bp-content pre code {
    background: none; border: none; padding: 0;
    font-size: inherit;
}
.bp-content hr {
    border: none; border-top: 1px solid var(--line);
    margin: 2.8em 0;
}
.bp-content table {
    width: 100%; border-collapse: collapse;
    margin: 2em 0; font-size: 14.5px;
}
.bp-content th {
    text-align: left; font-weight: 600;
    padding: 10px 14px;
    background: var(--bg-2);
    border-bottom: 2px solid var(--accent);
    color: var(--ink);
}
.bp-content td {
    padding: 10px 14px;
    border-bottom: 1px solid var(--line-2);
    color: var(--ink-2);
}

/* ── Footer (tags) ─────────────────────────── */
.bp-article-footer {
    margin-top: clamp(48px, 5vw, 72px);
    padding-top: clamp(24px, 3vw, 36px);
    border-top: 1px solid var(--line);
    display: flex; flex-wrap: wrap; align-items: center; gap: 12px;
}
.bp-article-footer-label {
    font-size: 12px; font-weight: 600; letter-spacing: 0.1em;
    text-transform: uppercase; color: var(--muted);
}
.bp-tag {
    font-size: 12px; font-weight: 500;
    color: var(--muted);
    background: var(--bg-2);
    border: 1px solid var(--line);
    padding: 4px 13px; border-radius: 999px;
    transition: color .2s, border-color .2s;
    cursor: default;
}
.bp-tag:hover { color: var(--accent-ink); border-color: var(--accent); }

/* ── Sidebar ────────────────────────────────── */
.bp-sidebar {
    position: sticky;
    top: calc(64px + 24px);
}
.bp-sidebar-card {
    background: var(--card);
    border: 1px solid var(--line-2);
    border-radius: calc(var(--radius) * 1.2);
    padding: 22px;
    display: flex; flex-direction: column; gap: 18px;
}
.bp-sidebar-row {
    display: flex; flex-direction: column; gap: 4px;
}
.bp-sidebar-label {
    font-size: 10.5px; font-weight: 600; letter-spacing: 0.12em;
    text-transform: uppercase; color: var(--muted);
}
.bp-sidebar-val {
    font-size: 14px; font-weight: 500; color: var(--ink);
}
.bp-sidebar-sep {
    height: 1px; background: var(--line-2);
}
.bp-share-btn {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 13px; font-weight: 500;
    color: var(--ink-2);
    background: var(--bg-2); border: 1px solid var(--line);
    padding: 9px 14px; border-radius: var(--radius);
    cursor: pointer; width: 100%; justify-content: center;
    transition: border-color .2s, color .2s;
    appearance: none;
}
.bp-share-btn:hover { border-color: var(--accent); color: var(--accent-ink); }
.bp-share-btn svg { flex-shrink: 0; }

/* ── Related posts ──────────────────────────── */
.bp-related {
    background: var(--bg-2);
    border-top: 1px solid var(--line-2);
    padding: clamp(48px, 6vw, 80px) 0;
}
.bp-related-header {
    display: flex; align-items: baseline; justify-content: space-between;
    margin-bottom: clamp(28px, 3vw, 40px);
    gap: 16px; flex-wrap: wrap;
}
.bp-related-header h2 {
    font-size: clamp(20px, 2.2vw, 28px);
    font-weight: 700; letter-spacing: -0.025em;
    color: var(--ink); margin: 0;
}
.bp-related-link {
    font-size: 13px; color: var(--muted);
    text-decoration: none;
    display: inline-flex; align-items: center; gap: 4px;
    transition: color .2s;
}
.bp-related-link:hover { color: var(--accent-ink); }
</style>
@endpush

@push('scripts')
<script>
(function () {
    const bar = document.getElementById('bp-progress');
    if (!bar) return;
    function update() {
        const s = document.documentElement.scrollTop;
        const h = document.documentElement.scrollHeight - window.innerHeight;
        bar.style.width = (h > 0 ? (s / h) * 100 : 0) + '%';
    }
    window.addEventListener('scroll', update, { passive: true });
})();

(function () {
    const btn = document.getElementById('bp-share');
    if (!btn) return;
    btn.addEventListener('click', function () {
        navigator.clipboard?.writeText(location.href).then(function () {
            btn.textContent = 'Kopyalandı!';
            setTimeout(function () { btn.innerHTML = originalHTML; }, 2000);
        });
    });
    const originalHTML = btn.innerHTML;
})();
</script>
@endpush

@section('content')

@php
    $thumbnail = $post->getFirstMediaUrl(config('afea-blog.media.thumbnail_collection'), 'webp')
        ?: $post->getFirstMediaUrl(config('afea-blog.media.thumbnail_collection'));
    $thumbnail = $thumbnail ? preg_replace('#^https?://[^/]+#', '', $thumbnail) : null;

    $relatedPosts = \Afea\Cms\Blog\Models\BlogPost::published()
        ->with(['category', 'seo', 'media'])
        ->where('id', '!=', $post->id)
        ->when($post->category_id, fn($q) => $q->orderByRaw('category_id = ? DESC', [$post->category_id]))
        ->latest('published_at')
        ->limit(3)
        ->get();
@endphp

{{-- Reading progress --}}
<div class="bp-progress" id="bp-progress" aria-hidden="true"></div>

{{-- Hero --}}
<section class="bp-hero" aria-label="{{ $post->title }}">
    @if($thumbnail)
        <img class="bp-hero-img" src="{{ $thumbnail }}"
             alt="{{ $post->thumbnail_image_alt ?? $post->title }}"
             fetchpriority="high" decoding="async" />
        <div class="bp-hero-overlay" aria-hidden="true"></div>
    @else
        <div class="bp-hero-nophoto" aria-hidden="true"></div>
    @endif

    <div class="bp-hero-content">
        <div class="bp-hero-inner">
            @if($post->category)
                <span class="bp-hero-cat">{{ $post->category->name }}</span>
            @endif
            <h1 class="bp-hero-title">{{ $post->title }}</h1>
            <div class="bp-hero-meta">
                @if($post->published_at)
                    <time datetime="{{ $post->published_at->toIso8601String() }}">
                        {{ $post->published_at->translatedFormat('d F Y') }}
                    </time>
                    <span class="bp-hero-meta-sep">·</span>
                @endif
                <span>{{ $post->reading_time }} dk okuma</span>
                @if($post->author)
                    <span class="bp-hero-meta-sep">·</span>
                    <span>{{ $post->author->name }}</span>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- Main layout --}}
<div class="bp-layout">

    {{-- Article --}}
    <article id="bp-article">

        {{-- Breadcrumb --}}
        <nav class="bp-breadcrumb" aria-label="Gezinti">
            <a href="{{ url('/blog') }}">
                <svg width="14" height="14" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M13 4l-6 6 6 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Blog
            </a>
            <span class="bp-breadcrumb-sep">/</span>
            <span style="color: var(--ink-2); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 280px;">
                {{ $post->title }}
            </span>
        </nav>

        <div class="bp-content" id="bp-content" style="margin-top: clamp(32px, 4vw, 52px);">
            {!! $post->content !!}
        </div>

        @if($post->tags->isNotEmpty())
            <footer class="bp-article-footer">
                <span class="bp-article-footer-label">Etiketler</span>
                @foreach($post->tags as $tag)
                    <span class="bp-tag">{{ $tag->name }}</span>
                @endforeach
            </footer>
        @endif
    </article>

    {{-- Sidebar --}}
    <aside class="bp-sidebar" aria-label="Makale bilgileri">
        <div class="bp-sidebar-card">
            @if($post->published_at)
                <div class="bp-sidebar-row">
                    <span class="bp-sidebar-label">Yayın tarihi</span>
                    <time class="bp-sidebar-val" datetime="{{ $post->published_at->toIso8601String() }}">
                        {{ $post->published_at->translatedFormat('d F Y') }}
                    </time>
                </div>
                <div class="bp-sidebar-sep"></div>
            @endif

            <div class="bp-sidebar-row">
                <span class="bp-sidebar-label">Okuma süresi</span>
                <span class="bp-sidebar-val">{{ $post->reading_time }} dakika</span>
            </div>

            @if($post->category)
                <div class="bp-sidebar-sep"></div>
                <div class="bp-sidebar-row">
                    <span class="bp-sidebar-label">Kategori</span>
                    <span class="bp-sidebar-val">{{ $post->category->name }}</span>
                </div>
            @endif

            @if($post->author)
                <div class="bp-sidebar-sep"></div>
                <div class="bp-sidebar-row">
                    <span class="bp-sidebar-label">Yazar</span>
                    <span class="bp-sidebar-val">{{ $post->author->name }}</span>
                </div>
            @endif

            <div class="bp-sidebar-sep"></div>

            <button class="bp-share-btn" id="bp-share" type="button">
                <svg width="15" height="15" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <circle cx="15" cy="4" r="2" stroke="currentColor" stroke-width="1.6"/>
                    <circle cx="15" cy="16" r="2" stroke="currentColor" stroke-width="1.6"/>
                    <circle cx="5" cy="10" r="2" stroke="currentColor" stroke-width="1.6"/>
                    <path d="M7 9l6-3.5M7 11l6 3.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
                Bağlantıyı kopyala
            </button>
        </div>
    </aside>

</div>

{{-- Related posts --}}
@if($relatedPosts->isNotEmpty())
<section class="bp-related" aria-label="İlgili yazılar">
    <div class="wrap">
        <div class="bp-related-header">
            <h2>İlgili Yazılar</h2>
            <a href="{{ url('/blog') }}" class="bp-related-link">
                Tüm yazılar
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                    <path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        <div class="news-grid stagger">
            @foreach($relatedPosts as $related)
                @php
                    $relThumb = $related->getFirstMediaUrl(config('afea-blog.media.thumbnail_collection'), 'preview')
                        ?: $related->getFirstMediaUrl(config('afea-blog.media.thumbnail_collection'));
                    $relThumb = $relThumb ? preg_replace('#^https?://[^/]+#', '', $relThumb) : null;
                @endphp
                <article class="news-card {{ $loop->first ? 'news-featured' : '' }}" style="--i:{{ $loop->index }}">
                    <a href="{{ $related->publicUrl() }}" class="news-card-link">
                        <div class="news-media {{ $loop->first ? '' : 'news-media--sm' }}">
                            @if($relThumb)
                                <img src="{{ $relThumb }}" alt="{{ $related->thumbnail_image_alt ?? $related->title }}" loading="lazy" decoding="async" />
                            @endif
                        </div>
                        <div class="news-body">
                            @if($related->category)
                                <span class="news-tag">{{ $related->category->name }}</span>
                            @endif
                            <h3>{{ $related->title }}</h3>
                            <span class="news-date">{{ $related->published_at?->translatedFormat('d F Y') }}</span>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
