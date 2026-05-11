@extends('main')

@section('title', __('ui.home_meta_title'))
@section('description', __('ui.home_meta_desc'))
@section('canonical', ($locale ?? 'tr') === 'en' ? route('en.home') : route('home'))
@section('theme', 'dark')

@section('content')
    {{-- ═══════════════════════════════════════ HERO BANNER SLIDER ══ --}}
    <section class="ov-hero" aria-label="Öne çıkan slaytlar">

        <div class="ov-hero-slides" aria-live="polite">
            @foreach($heroes as $i => $hero)
                @php
                    $heroImg = !empty($hero['image']) ? \Illuminate\Support\Facades\Storage::url($hero['image']) : null;
                    $heroTitle = $hero['title'] ?? '';
                    $heroBadge = $hero['badge_text'] ?? '';
                    $heroDesc = $hero['description'] ?? '';
                    $heroCta = $hero['cta_text'] ?? '';
                    $heroCtaUrl = $hero['cta_url'] ?? '';
                @endphp
                <div class="ov-hero-slide{{ $i === 0 ? ' is-active' : '' }}"
                     data-slide="{{ $i }}"
                     aria-hidden="{{ $i === 0 ? 'false' : 'true' }}">

                    @if($heroImg)
                        <img class="ov-hero-img" src="{{ $heroImg }}"
                             alt="{{ strip_tags($heroTitle) }}"
                             {{ $i === 0 ? 'fetchpriority="high"' : 'loading="lazy"' }}
                             decoding="async" />
                    @endif
                    <div class="ov-hero-shade" aria-hidden="true"></div>

                    <div class="wrap ov-hero-content">
                        @if($heroBadge)
                            <p class="eyebrow ov-hero-eyebrow">{{ $heroBadge }}</p>
                        @endif
                        <h1 class="ov-hero-title">{!! $heroTitle !!}</h1>
                        @if($heroDesc)
                            <p class="ov-hero-lede">{{ $heroDesc }}</p>
                        @endif
                        @if($heroCta && $heroCtaUrl)
                            <div class="ov-hero-cta">
                                <a class="btn btn-primary" href="{{ $heroCtaUrl }}">{{ $heroCta }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        @if($heroes->count() > 1)
            <div class="ov-hero-ui" aria-label="Slider kontrolleri">
                <button type="button" class="ov-hero-btn hero-slider-prev" aria-label="Önceki slayt">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M13 4l-6 6 6 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="ov-hero-dots hero-slider-dots" role="tablist">
                    @foreach($heroes as $i => $hero)
                        <button type="button"
                                class="ov-hero-dot hero-dot{{ $i === 0 ? ' is-active' : '' }}"
                                data-slide="{{ $i }}"
                                role="tab"
                                aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                                aria-label="Slayt {{ $i + 1 }}"></button>
                    @endforeach
                </div>
                <button type="button" class="ov-hero-btn hero-slider-next" aria-label="Sonraki slayt">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M7 4l6 6-6 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        @endif

    </section>

    <!-- STAT STRIP -->
    @php
      $homeStats = collect($content?->get('home_stats') ?? []);
    @endphp
    @if($homeStats->isNotEmpty())
    <section class="stat-strip" aria-label="{{ __('ui.home_strip_aria') }}">
        <div class="wrap stat-row stagger">
            @foreach($homeStats as $i => $stat)
                <div class="stat" style="--i:{{ $i }}">
                    <span class="stat-num" data-count="{{ $stat['value'] ?? '' }}" @if(!empty($stat['suffix'])) data-suffix="{{ $stat['suffix'] }}" @endif>{{ $stat['value'] ?? '' }}{{ $stat['suffix'] ?? '' }}</span>
                    <span class="stat-lbl">{{ $stat['label'] ?? '' }}</span>
                </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- PRODUCT GROUPS -->
    @php
      $showcaseKicker = $content?->get('home_showcase_kicker') ?: __('ui.home_collection_kicker');
      $showcaseTitle = $content?->get('home_showcase_title') ?: 'Tüm Ürünler';
      $showcaseTabAll = $content?->get('home_showcase_tab_all') ?: 'Tümü';
      $showcaseLinkText = $content?->get('home_showcase_link_text') ?: 'Daha fazlası için';

      $isEnglish = ($locale ?? 'tr') === 'en';
      $productRouteMap = [
        'phone' => $isEnglish ? 'en.phones.show' : 'phones.show',
        'watch' => $isEnglish ? 'en.watches.show' : 'watches.show',
        'headphone' => $isEnglish ? 'en.headphones.show' : 'headphones.show',
      ];
      $accessoryRouteName = $isEnglish ? 'en.accessories.show' : 'aksesuarlar.show';

      $showcaseTabs ??= [];
      $showcaseProducts ??= collect();
      $showcaseAccessories ??= collect();

      $productCardImg = function ($product): ?string {
          $url = $product->getFirstMediaUrl('collection_card');
          if ($url !== '') {
              return $url;
          }
          $hero = $product->getFirstMediaUrl('hero');
          return $hero !== '' ? $hero : null;
      };

      $accessoryCardImg = function ($accessory): ?string {
          $url = $accessory->getFirstMediaUrl();
          return $url !== '' ? $url : null;
      };
    @endphp
    <section class="section pshowcase-section" id="products">
        <div class="wrap">
            <div class="section-kicker"><span>{{ $showcaseKicker }}</span></div>
            <h2>{{ $showcaseTitle }}</h2>

            {{-- Category filter tabs (dynamic) --}}
            <div class="pcat-tabs" role="tablist">
                <button class="pcat-tab is-active" data-cat="all">{{ $showcaseTabAll }}</button>
                @foreach($showcaseTabs as $key => $label)
                    <button class="pcat-tab" data-cat="{{ $key }}">{{ $label }}</button>
                @endforeach
            </div>

            {{-- Showcase grid: first visible card becomes hero (.is-featured via JS) --}}
            <div class="pshowcase">
                @foreach($showcaseProducts as $product)
                    @php
                      $cImg = $productCardImg($product);
                      $cHref = isset($productRouteMap[$product->type]) ? route($productRouteMap[$product->type], $product->slug) : '#';
                      $cCatLabel = $showcaseTabs[$product->type] ?? '';
                      $cDesc = data_get($product->content, 'collection_card.description');
                    @endphp
                    <a href="{{ $cHref }}" class="pshowcase-card" data-cat="{{ $product->type }}">
                        <div class="pshowcase-card-media pshowcase-card-media--ph">
                            @if($cImg)
                                <img src="{{ $cImg }}" alt="{{ $product->name }}" loading="lazy" decoding="async" />
                            @endif
                        </div>
                        <div class="pshowcase-card-body">
                            <span class="pshowcase-cat">{{ $cCatLabel }}</span>
                            <h4>{{ $product->name }}</h4>
                            @if($cDesc)<p class="pshowcase-card-desc">{{ $cDesc }}</p>@endif
                            <span class="pshowcase-link">{{ $showcaseLinkText }}
                                <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                    </a>
                @endforeach

                @foreach($showcaseAccessories as $accessory)
                    @php
                      $aImg = $accessoryCardImg($accessory);
                      $aHref = route($accessoryRouteName, $accessory->slug);
                      $aCatLabel = $showcaseTabs[$accessory->category] ?? '';
                      $aDesc = $accessory->summary;
                    @endphp
                    <a href="{{ $aHref }}" class="pshowcase-card" data-cat="{{ $accessory->category }}">
                        <div class="pshowcase-card-media pshowcase-card-media--ph">
                            @if($aImg)
                                <img src="{{ $aImg }}" alt="{{ $accessory->name }}" loading="lazy" decoding="async" />
                            @endif
                        </div>
                        <div class="pshowcase-card-body">
                            <span class="pshowcase-cat">{{ $aCatLabel }}</span>
                            <h4>{{ $accessory->name }}</h4>
                            @if($aDesc)<p class="pshowcase-card-desc">{{ $aDesc }}</p>@endif
                            <span class="pshowcase-link">{{ $showcaseLinkText }}
                                <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SCROLL SHOWCASE — KATEGORİLER -->
    @php
      $homeScroll = collect($content?->get('home_scroll') ?? []);
    @endphp
    @if($homeScroll->isNotEmpty())
    <section class="scroll-stage" id="kategoriler" aria-label="Ürün kategorileri">
        <div class="scroll-sticky">
            <div class="wrap scroll-layout">
                <div class="scroll-media-wrap">
                    @foreach($homeScroll as $i => $row)
                      @php $img = !empty($row['image']) ? \Illuminate\Support\Facades\Storage::url($row['image']) : null; @endphp
                      @if($img)
                        <img class="scroll-img{{ $i === 0 ? ' is-active' : '' }}" src="{{ $img }}" alt="{{ $row['title'] ?? '' }}" loading="lazy" decoding="async" />
                      @endif
                    @endforeach
                </div>

                <div class="scroll-texts">
                    @foreach($homeScroll as $i => $row)
                      <div class="scroll-text{{ $i === 0 ? ' is-active' : '' }}">
                        <div class="scroll-cat-icon">
                          <svg width="24" height="24" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="2" width="14" height="24" rx="3"/><circle cx="14" cy="21" r="1" fill="currentColor" stroke="none"/></svg>
                        </div>
                        @if(!empty($row['eyebrow']))<p class="eyebrow">{{ $row['eyebrow'] }}</p>@endif
                        <h2>{{ $row['title'] ?? '' }}</h2>
                        @if(!empty($row['description']))<p>{{ $row['description'] }}</p>@endif
                        @if(!empty($row['btn_text']) && !empty($row['btn_url']))
                          <a href="{{ $row['btn_url'] }}" class="btn btn-primary" style="align-self: flex-start; margin-top: 8px;">{{ $row['btn_text'] }}</a>
                        @endif
                      </div>
                    @endforeach
                </div>
            </div>
            <div class="scroll-progress-track" aria-hidden="true">
                <div class="scroll-progress-bar"></div>
            </div>
        </div>
    </section>
    @endif

    <!-- NEDEN OVİON — FEATURE BENTO -->
    @php
      $homeFeatTitle = $content?->get('home_feat_title');
      $homeFeatCards = collect($content?->get('home_feat_cards') ?? []);
    @endphp
    @if($homeFeatCards->isNotEmpty() || !empty($homeFeatTitle))
    <section class="section feat-section">
        <div class="wrap">
            @if(!empty($homeFeatTitle))
                <h2 class="feat-heading">{!! $homeFeatTitle !!}</h2>
            @endif
            <div class="feat-grid">
                @foreach($homeFeatCards as $card)
                    @php
                      $sizeClass = ($card['size'] ?? 'narrow') === 'wide' ? ' feat-card--wide' : '';
                      $reverseClass = !empty($card['reverse']) ? ' feat-card--reverse' : '';
                      $color = $card['color'] ?? 'none';
                      $img = !empty($card['image']) ? \Illuminate\Support\Facades\Storage::url($card['image']) : null;
                    @endphp
                    <div class="feat-card{{ $sizeClass }}{{ $reverseClass }} stagger">
                        @if(($card['size'] ?? 'narrow') === 'wide' && ($img || $color !== 'none'))
                            <div class="feat-visual feat-visual--{{ $color !== 'none' ? $color : 'amber' }}">
                                @if($img)
                                    <img src="{{ $img }}" alt="{{ $card['title'] ?? '' }}" style="width:100%; height:100%; object-fit:cover;" loading="lazy" decoding="async" />
                                @endif
                            </div>
                            <div class="feat-content">
                                @if(!empty($card['title']))<h3>{{ $card['title'] }}</h3>@endif
                                @if(!empty($card['description']))<p>{{ $card['description'] }}</p>@endif
                            </div>
                        @else
                            @if(!empty($card['title']))<h3>{{ $card['title'] }}</h3>@endif
                            @if(!empty($card['description']))<p>{{ $card['description'] }}</p>@endif
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- OVION GÜVENCESİ -->
    @php
      $homeTrustEyebrow = $content?->get('home_trust_eyebrow');
      $homeTrustTitle = $content?->get('home_trust_title');
      $homeTrustCards = collect($content?->get('home_trust_cards') ?? []);
    @endphp
    @if($homeTrustCards->isNotEmpty() || !empty($homeTrustEyebrow) || !empty($homeTrustTitle))
    <section class="section trust-section trust-section--light">
        <div class="wrap">
            @if(!empty($homeTrustEyebrow))
                <p class="trust-eyebrow">{{ $homeTrustEyebrow }}</p>
            @endif
            @if(!empty($homeTrustTitle))
                <h2 class="trust-title">{!! $homeTrustTitle !!}</h2>
            @endif
            <div class="trust-grid">
                @foreach($homeTrustCards as $card)
                    @php $hasLink = !empty($card['link_url']); @endphp
                    <{{ $hasLink ? 'a' : 'div' }} {{ $hasLink ? 'href="'.e($card['link_url']).'"' : '' }} class="trust-card{{ $hasLink ? '' : ' trust-card--static' }}">
                        <div class="trust-icon">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3l9 4v7c0 5-4 9-9 11C5 23 1 19 1 14V7l9-4z" transform="translate(1,1) scale(0.9)"/><path d="M10 14l2.5 2.5L17 11" stroke-width="1.6"/></svg>
                        </div>
                        <h3>{{ $card['title'] ?? '' }}</h3>
                        <p>{{ $card['description'] ?? '' }}</p>
                        @if($hasLink && !empty($card['link_text']))
                            <span class="trust-link">{{ $card['link_text'] }}
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        @endif
                    </{{ $hasLink ? 'a' : 'div' }}>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- BLOG / HABERLER -->
    @if($latestPosts->isNotEmpty())
    <section class="section" id="news">
        <div class="wrap">
            <div class="section-kicker"><span>05</span><span>{!! __('ui.home_news_kicker') !!}</span></div>
            <h2>{!! __('ui.home_news_title') !!}</h2>
        </div>

        <div class="wrap news-grid stagger">
            @foreach($latestPosts as $post)
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
                            @if($loop->first && $post->content)
                                <p>{{ Str::limit(strip_tags($post->content), 120) }}</p>
                            @endif
                            <span class="news-date">{{ $post->published_at?->translatedFormat('d F Y') }}</span>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    </section>
    @endif

    <!-- BUY -->
    @php
      $homeBuyTitle = $content?->get('home_buy_title');
      $homeBuyPrice = $content?->get('home_buy_price');
      $homeBuyShipping = $content?->get('home_buy_shipping');
      $homeBuyCta1Text = $content?->get('home_buy_cta1_text');
      $homeBuyCta1Url = $content?->get('home_buy_cta1_url');
      $homeBuyCta2Text = $content?->get('home_buy_cta2_text');
      $homeBuyCta2Url = $content?->get('home_buy_cta2_url');
    @endphp
    @if(!empty($homeBuyTitle) || $startingFromLabel || !empty($homeBuyPrice) || !empty($homeBuyCta1Text) || !empty($homeBuyCta2Text))
    <section class="buy" id="buy">
        <div class="wrap buy-inner">
            <div>
                @if(!empty($homeBuyTitle))<h2>{{ $homeBuyTitle }}</h2>@endif
                <div class="price">
                    @if($startingFromLabel)
                        <strong>{{ __('ui.price_starting_from', ['price' => $startingFromLabel]) }}</strong>
                        <span>— {{ __('ui.price_tax_included') }}</span>
                    @else
                        @if(!empty($homeBuyPrice))<strong>{{ $homeBuyPrice }}</strong>@endif
                        @if(!empty($homeBuyShipping))<span>— {{ $homeBuyShipping }}</span>@endif
                    @endif
                </div>
            </div>
            <div style="display:flex; gap:12px; flex-wrap: wrap;">
                @if(!empty($homeBuyCta1Text))
                    <a class="btn btn-primary" href="{{ $homeBuyCta1Url ?: '#' }}">{!! $homeBuyCta1Text !!}</a>
                @endif
                @if(!empty($homeBuyCta2Text))
                    <a class="btn btn-ghost" href="{{ $homeBuyCta2Url ?: '#' }}">{!! $homeBuyCta2Text !!}</a>
                @endif
            </div>
        </div>
    </section>
    @endif
@endsection
