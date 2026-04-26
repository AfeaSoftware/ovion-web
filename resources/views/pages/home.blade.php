@extends('main')

@section('title', __('ui.home_meta_title'))
@section('description', __('ui.home_meta_desc'))
@section('canonical', ($locale ?? 'tr') === 'en' ? route('en.home') : route('home'))
@section('theme', 'dark')

@section('content')
    <!-- HERO SLIDER -->
    <section class="hero hero-slider" id="phone" aria-label="Öne çıkan ürünler">

        <div class="hero-slides" aria-live="polite">

            {{-- Slide 1 — V11 Lite --}}
            <div class="hero-slide is-active" data-slide="0" aria-hidden="false">
                <div class="hero-video-bg" aria-hidden="true">
                    <div class="img-placeholder img-placeholder--hero">
                        <p><strong>{{ __('ui.home_ph_video_title') }}</strong><br />{!! __('ui.home_ph_video_desc') !!}</p>
                    </div>
                </div>
                <div class="wrap hero-grid">
                    <div class="hero-copy">
                        <p class="eyebrow">{{ __('ui.home_hero_eyebrow') }}</p>
                        <h1>{!! __('ui.home_hero_title') !!}</h1>
                        <p class="lede">{{ __('ui.home_hero_lede') }}</p>
                        <div class="hero-cta">
                            <a class="btn btn-primary" href="#products">{{ __('ui.home_hero_cta_primary') }}</a>
                            <a class="btn btn-ghost" href="#specs">{{ __('ui.home_hero_cta_ghost') }}</a>
                        </div>
                    </div>
                    <div class="hero-media">
                        <img src="{{ asset('assets/v11-hero.png') }}" alt="Ovion V11 Lite Pearl White, ön ve arka görünüm"
                            width="1000" height="1250" fetchpriority="high" decoding="async" />
                    </div>
                </div>
            </div>

            {{-- Slide 2 — S3 Pro --}}
            <div class="hero-slide" data-slide="1" aria-hidden="true">
                <div class="hero-slide-bg hero-slide-bg--watch" aria-hidden="true"></div>
                <div class="wrap hero-grid">
                    <div class="hero-copy">
                        <p class="eyebrow">Yeni — Akıllı Saat</p>
                        <h1>Özgürlüğün<br/><em>ritmi.</em></h1>
                        <p class="lede">14 gün pil ömrü, GPS ve AMOLED ekranla hayatınızı bilek bilekte takip edin. S3 Pro şimdi satışta.</p>
                        <div class="hero-cta">
                            <a class="btn btn-primary" href="{{ url('/saatler/s3-pro') }}">S3 Pro'yu Keşfet</a>
                            <a class="btn btn-ghost" href="#products">Tüm Ürünler</a>
                        </div>
                    </div>
                    <div class="hero-media hero-media--placeholder">
                        <span>S3 Pro<br/><small>Görsel yakında</small></span>
                    </div>
                </div>
            </div>

            {{-- Slide 3 — H1 Pro --}}
            <div class="hero-slide" data-slide="2" aria-hidden="true">
                <div class="hero-slide-bg hero-slide-bg--headphone" aria-hidden="true"></div>
                <div class="wrap hero-grid">
                    <div class="hero-copy">
                        <p class="eyebrow">Yeni — Kulaklık</p>
                        <h1>Sessizliği<br/><em>hisset.</em></h1>
                        <p class="lede">Hibrit ANC, Hi-Fi ses ve 30 saatlik pil ömrü. Müziğinize gerçekten odaklanın. H1 Pro şimdi satışta.</p>
                        <div class="hero-cta">
                            <a class="btn btn-primary" href="{{ url('/kulakliklar/h1-pro') }}">H1 Pro'yu Keşfet</a>
                            <a class="btn btn-ghost" href="#products">Tüm Ürünler</a>
                        </div>
                    </div>
                    <div class="hero-media hero-media--placeholder">
                        <span>H1 Pro<br/><small>Görsel yakında</small></span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Slider controls --}}
        <div class="hero-slider-ui" aria-label="Slider kontrolleri">
            <button class="hero-slider-btn hero-slider-prev" aria-label="Önceki slayt">
                <svg width="18" height="18" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M13 4l-6 6 6 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="hero-slider-dots" role="tablist" aria-label="Slaytlar">
                <button class="hero-dot is-active" data-slide="0" role="tab" aria-selected="true" aria-label="Slayt 1"></button>
                <button class="hero-dot" data-slide="1" role="tab" aria-selected="false" aria-label="Slayt 2"></button>
                <button class="hero-dot" data-slide="2" role="tab" aria-selected="false" aria-label="Slayt 3"></button>
            </div>
            <button class="hero-slider-btn hero-slider-next" aria-label="Sonraki slayt">
                <svg width="18" height="18" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M7 4l6 6-6 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>

    </section>

    <!-- STAT STRIP -->
    <section class="stat-strip" aria-label="{{ __('ui.home_strip_aria') }}">
        <div class="wrap stat-row stagger">
            <div class="stat" style="--i:0">
                <span class="stat-num" data-count="6.56" data-suffix="″" data-decimals="2">6.56″</span>
                <span class="stat-lbl">HD+ display · 90 Hz</span>
            </div>
            <div class="stat" style="--i:1">
                <span class="stat-num" data-count="50" data-suffix=" MP">50 MP</span>
                <span class="stat-lbl">AI main camera</span>
            </div>
            <div class="stat" style="--i:2">
                <span class="stat-num" data-count="5000" data-suffix=" mAh">5000 mAh</span>
                <span class="stat-lbl">Battery · 18 W fast charge</span>
            </div>
            <div class="stat" style="--i:3">
                <span class="stat-num" data-count="8.45" data-suffix=" mm" data-decimals="2">8.45 mm</span>
                <span class="stat-lbl">Slim · 179 g</span>
            </div>
        </div>
    </section>

    <!-- PRODUCT GROUPS -->
    <section class="section pshowcase-section" id="products">
        <div class="wrap">
            <div class="section-kicker"><span>{{ __('ui.home_collection_kicker') }}</span></div>
            <h2>{!! __('ui.home_collection_title') !!}</h2>

            {{-- Category filter tabs --}}
            <div class="pcat-tabs" role="tablist">
                <button class="pcat-tab is-active" data-cat="all">Tümü</button>
                <button class="pcat-tab" data-cat="phone">Telefonlar</button>
                <button class="pcat-tab" data-cat="watch">Saatler</button>
                <button class="pcat-tab" data-cat="headphone">Kulaklıklar</button>
                <button class="pcat-tab" data-cat="accessory">Aksesuarlar</button>
            </div>

            {{-- Showcase grid --}}
            <div class="pshowcase">

                {{-- Featured hero card (left) --}}
                <a href="#phone" class="pshowcase-hero" data-cat="phone">
                    <div class="pshowcase-hero-media">
                        <img src="{{ asset('assets/v11-hero.png') }}" alt="Ovion V11 Lite" loading="lazy" decoding="async" />
                    </div>
                    <div class="pshowcase-hero-body">
                        <span class="pshowcase-cat">Telefon</span>
                        <h3>Ovion V11 Lite</h3>
                        <p>90 Hz · 50 MP AI Kamera · 5000 mAh</p>
                        <span class="pshowcase-link">Daha fazlası için
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                    </div>
                </a>

                {{-- 2×2 right grid --}}
                <div class="pshowcase-grid">

                    <a href="{{ url('/saatler/s3-pro') }}" class="pshowcase-card" data-cat="watch">
                        <div class="pshowcase-card-media pshowcase-card-media--ph">
                            <span>S3 Pro</span>
                        </div>
                        <div class="pshowcase-card-body">
                            <span class="pshowcase-cat">Saat</span>
                            <h4>Ovion S3 Pro</h4>
                            <span class="pshowcase-link">Daha fazlası için
                                <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                    </a>

                    <a href="{{ url('/kulakliklar/h1-pro') }}" class="pshowcase-card" data-cat="headphone">
                        <div class="pshowcase-card-media pshowcase-card-media--ph">
                            <span>H1 Pro</span>
                        </div>
                        <div class="pshowcase-card-body">
                            <span class="pshowcase-cat">Kulaklık</span>
                            <h4>Ovion H1 Pro</h4>
                            <span class="pshowcase-link">Daha fazlası için
                                <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                    </a>

                    <a href="#" class="pshowcase-card pshowcase-card--soon" data-cat="phone">
                        <div class="pshowcase-card-media pshowcase-card-media--ph">
                            <span>V10 Pro</span>
                        </div>
                        <div class="pshowcase-card-body">
                            <span class="pshowcase-cat">Telefon</span>
                            <h4>Ovion V10 Pro</h4>
                            <span class="pshowcase-badge">Yakında</span>
                        </div>
                    </a>

                    <a href="{{ url('/aksesuarlar') }}" class="pshowcase-card" data-cat="accessory">
                        <div class="pshowcase-card-media pshowcase-card-media--ph">
                            <span>Aksesuarlar</span>
                        </div>
                        <div class="pshowcase-card-body">
                            <span class="pshowcase-cat">Aksesuar</span>
                            <h4>Tüm Aksesuarlar</h4>
                            <span class="pshowcase-link">Daha fazlası için
                                <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </section>

    <!-- TECH BANNER -->
    <section class="tech-banner">
        <div class="wrap tech-banner-inner">
            <div class="tech-banner-copy stagger">
                <p class="eyebrow" style="--i:0">{{ __('ui.home_tech_ey') }}</p>
                <h2 style="--i:1">{!! __('ui.home_tech_title') !!}</h2>
                <p style="--i:2">{{ __('ui.home_tech_desc') }}</p>
                <div style="--i:3"><a href="#camera" class="btn btn-primary">{{ __('ui.home_tech_cta') }}</a></div>
            </div>
            <div class="tech-banner-media">
                <img src="{{ asset('assets/v11-duo.png') }}" alt="V11 Lite kamera detay" loading="lazy" decoding="async" />
            </div>
        </div>
    </section>

    <!-- CAMERA (DARK) -->
    <section class="showcase" id="camera">
        <div class="wrap section">
            <div class="section-kicker"><span>02</span><span>{{ __('ui.home_cam_kicker') }}</span></div>
            <h2>{{ __('ui.home_cam_title') }}</h2>
            <p class="kicker-sub">{{ __('ui.home_cam_sub') }}</p>

            <div class="camera-grid">
                <div class="camera-photo">
                    <img src="{{ asset('assets/v11-duo.png') }}" alt="Close-up of the V11 Lite rear camera ring"
                        loading="lazy" decoding="async" width="1600" height="1000" />
                </div>
                <div>
                    <ul class="feature-list">
                        <li>
                            <span class="f-num">01</span>
                            <div>
                                <h3>{{ __('ui.home_cam_f1_title') }}</h3>
                                <p>{{ __('ui.home_cam_f1_desc') }}</p>
                            </div>
                        </li>
                        <li>
                            <span class="f-num">02</span>
                            <div>
                                <h3>{{ __('ui.home_cam_f2_title') }}</h3>
                                <p>{{ __('ui.home_cam_f2_desc') }}</p>
                            </div>
                        </li>
                        <li>
                            <span class="f-num">03</span>
                            <div>
                                <h3>{{ __('ui.home_cam_f3_title') }}</h3>
                                <p>{{ __('ui.home_cam_f3_desc') }}</p>
                            </div>
                        </li>
                        <li>
                            <span class="f-num">04</span>
                            <div>
                                <h3>{{ __('ui.home_cam_f4_title') }}</h3>
                                <p>{{ __('ui.home_cam_f4_desc') }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- SCROLL SHOWCASE 3D -->
    <section class="scroll-stage" id="showcase-3d" aria-label="{{ __('ui.home_360_aria') }}">
        <div class="scroll-sticky">
            <div class="wrap scroll-layout">

                <div class="scroll-media-wrap">
                    <img class="scroll-img is-active" src="{{ asset('assets/v11-front.png') }}" alt="V11 Lite ön yüz" loading="lazy" decoding="async" />
                    <img class="scroll-img" src="{{ asset('assets/v11-side-a.png') }}" alt="V11 Lite profil A" loading="lazy" decoding="async" />
                    <img class="scroll-img" src="{{ asset('assets/v11-back.png') }}" alt="V11 Lite arka yüz" loading="lazy" decoding="async" />
                    <img class="scroll-img" src="{{ asset('assets/v11-side-b.png') }}" alt="V11 Lite profil B" loading="lazy" decoding="async" />
                </div>

                <div class="scroll-texts">
                    <div class="scroll-text is-active">
                        <p class="eyebrow">{{ __('ui.home_scroll_s1_ey') }}</p>
                        <h2>{!! __('ui.home_scroll_s1_title') !!}</h2>
                        <p>{{ __('ui.home_scroll_s1_desc') }}</p>
                    </div>
                    <div class="scroll-text">
                        <p class="eyebrow">{{ __('ui.home_scroll_s2_ey') }}</p>
                        <h2>{!! __('ui.home_scroll_s2_title') !!}</h2>
                        <p>{{ __('ui.home_scroll_s2_desc') }}</p>
                    </div>
                    <div class="scroll-text">
                        <p class="eyebrow">{{ __('ui.home_scroll_s3_ey') }}</p>
                        <h2>{!! __('ui.home_scroll_s3_title') !!}</h2>
                        <p>{{ __('ui.home_scroll_s3_desc') }}</p>
                    </div>
                    <div class="scroll-text">
                        <p class="eyebrow">{{ __('ui.home_scroll_s4_ey') }}</p>
                        <h2>{!! __('ui.home_scroll_s4_title') !!}</h2>
                        <p>{{ __('ui.home_scroll_s4_desc') }}</p>
                    </div>
                </div>

            </div>
            <div class="scroll-progress-track" aria-hidden="true">
                <div class="scroll-progress-bar"></div>
            </div>
        </div>
    </section>

    <!-- DISPLAY / BATTERY -->
    <section class="section">
        <div class="wrap">
            <div class="section-kicker"><span>03</span><span>{!! __('ui.home_disp_kicker') !!}</span></div>
            <h2>{!! __('ui.home_disp_title') !!}</h2>
        </div>
        <div class="wrap showcase-hero">
            <div class="showcase-copy">
                <p style="font-size: clamp(16px, 1.25vw, 19px); max-width: 42ch; color: var(--ink-2);">
                    {{ __('ui.home_disp_p1') }}
                </p>
                <p style="font-size: clamp(16px, 1.25vw, 19px); max-width: 42ch; color: var(--ink-2); margin-top: 18px;">
                    {{ __('ui.home_disp_p2') }}
                </p>
            </div>
            <figure class="camera-photo" style="aspect-ratio: 4/5; background: var(--bg-2); border:1px solid var(--line-2);">
                <img src="{{ asset('assets/v11-pair.png') }}"
                    alt="V11 Lite front display showing the wave wallpaper, with the back in soft focus behind it"
                    loading="lazy" decoding="async" width="1000" height="1250" />
            </figure>
        </div>
    </section>

    <!-- SPECS -->
    <section class="section" id="specs"
        style="background: var(--bg-2); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);">
        <div class="wrap">
            <div class="section-kicker"><span>04</span><span>{{ __('ui.home_specs_kicker') }}</span></div>
            <h2>{{ __('ui.home_specs_title') }}</h2>

            <div class="specs">
                <div class="spec">
                    <div class="spec-k">Display</div>
                    <div class="spec-v">6.56″ HD+</div>
                    <div class="spec-sub">90 Hz · Multi-touch</div>
                </div>
                <div class="spec">
                    <div class="spec-k">Main Camera</div>
                    <div class="spec-v">50 MP</div>
                    <div class="spec-sub">PDAF · HDR · AI scene</div>
                </div>
                <div class="spec">
                    <div class="spec-k">Front Camera</div>
                    <div class="spec-v">8 MP</div>
                    <div class="spec-sub">Punch-hole, in-display</div>
                </div>
                <div class="spec">
                    <div class="spec-k">Battery</div>
                    <div class="spec-v">5000 mAh</div>
                    <div class="spec-sub">18 W fast charge</div>
                </div>
                <div class="spec">
                    <div class="spec-k">Chipset</div>
                    <div class="spec-v">Unisoc T606</div>
                    <div class="spec-sub">Octa-core · 1.6 GHz</div>
                </div>
                <div class="spec">
                    <div class="spec-k">Memory</div>
                    <div class="spec-v">4 GB / 128 GB</div>
                    <div class="spec-sub">microSD expandable</div>
                </div>
                <div class="spec">
                    <div class="spec-k">Dimensions</div>
                    <div class="spec-v">164.3 × 76.0 × 8.45 mm</div>
                    <div class="spec-sub">179 g</div>
                </div>
                <div class="spec">
                    <div class="spec-k">Security</div>
                    <div class="spec-v">Fingerprint + Face</div>
                    <div class="spec-sub">Side-mounted sensor</div>
                </div>
                <div class="spec">
                    <div class="spec-k">Origin</div>
                    <div class="spec-v">Made in Türkiye</div>
                    <div class="spec-sub">Türkiye Garantili</div>
                </div>
            </div>
        </div>
    </section>

    <!-- BLOG / HABERLER -->
    <section class="section" id="news">
        <div class="wrap">
            <div class="section-kicker"><span>05</span><span>{!! __('ui.home_news_kicker') !!}</span></div>
            <h2>{!! __('ui.home_news_title') !!}</h2>
        </div>
        <div class="wrap news-grid stagger">

            <article class="news-card news-featured" style="--i:0">
                <a href="#" class="news-card-link">
                    <div class="news-media">
                        <div class="img-placeholder img-placeholder--news">
                            <strong>{{ __('ui.home_ph_news_launch') }}</strong>
                            <p>{{ __('ui.home_ph_news_size_lg') }}</p>
                        </div>
                    </div>
                    <div class="news-body">
                        <span class="news-tag">{{ __('ui.home_news_tag_launch') }}</span>
                        <h3>{{ __('ui.home_news_1_title') }}</h3>
                        <p>{{ __('ui.home_news_1_desc') }}</p>
                        <span class="news-date">{{ __('ui.home_news_1_date') }}</span>
                    </div>
                </a>
            </article>

            <article class="news-card" style="--i:1">
                <a href="#" class="news-card-link">
                    <div class="news-media news-media--sm">
                        <div class="img-placeholder img-placeholder--news">
                            <strong>{{ __('ui.home_ph_news_tech') }}</strong>
                            <p>{{ __('ui.home_ph_news_size_sm') }}</p>
                        </div>
                    </div>
                    <div class="news-body">
                        <span class="news-tag">{{ __('ui.home_news_tag_tech') }}</span>
                        <h3>{{ __('ui.home_news_2_title') }}</h3>
                        <p>{{ __('ui.home_news_2_desc') }}</p>
                        <span class="news-date">{{ __('ui.home_news_2_date') }}</span>
                    </div>
                </a>
            </article>

            <article class="news-card" style="--i:2">
                <a href="#" class="news-card-link">
                    <div class="news-media news-media--sm">
                        <div class="img-placeholder img-placeholder--news">
                            <strong>{{ __('ui.home_ph_news_factory') }}</strong>
                            <p>{{ __('ui.home_ph_news_size_sm') }}</p>
                        </div>
                    </div>
                    <div class="news-body">
                        <span class="news-tag">{{ __('ui.home_news_tag_company') }}</span>
                        <h3>{{ __('ui.home_news_3_title') }}</h3>
                        <p>{{ __('ui.home_news_3_desc') }}</p>
                        <span class="news-date">{{ __('ui.home_news_3_date') }}</span>
                    </div>
                </a>
            </article>

        </div>
    </section>

    <!-- BUY -->
    <section class="buy" id="buy">
        <div class="wrap buy-inner">
            <div>
                <h2>{{ __('ui.home_buy_title') }}</h2>
                <div class="price">
                    <strong>{{ __('ui.home_buy_price') }}</strong>
                    <span>— {{ __('ui.home_buy_shipping') }}</span>
                </div>
            </div>
            <div style="display:flex; gap:12px; flex-wrap: wrap;">
                <a class="btn btn-primary" href="#">{!! __('ui.home_buy_cta1') !!}</a>
                <a class="btn btn-ghost" href="#support">{!! __('ui.home_buy_cta2') !!}</a>
            </div>
        </div>
    </section>
@endsection
