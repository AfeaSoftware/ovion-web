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
                <span class="stat-num" data-count="3">3</span>
                <span class="stat-lbl">Ürün kategorisi</span>
            </div>
            <div class="stat" style="--i:1">
                <span class="stat-num" data-count="81">81</span>
                <span class="stat-lbl">İlde servis ağı</span>
            </div>
            <div class="stat" style="--i:2">
                <span class="stat-num" data-count="200" data-suffix="+">200+</span>
                <span class="stat-lbl">Çalışan · İstanbul</span>
            </div>
            <div class="stat" style="--i:3">
                <span class="stat-num" data-count="2" data-suffix=" yıl">2 yıl</span>
                <span class="stat-lbl">Standart garanti</span>
            </div>
        </div>
    </section>

    <!-- PRODUCT GROUPS -->
    <section class="section pshowcase-section" id="products">
        <div class="wrap">
            <div class="section-kicker"><span>{{ __('ui.home_collection_kicker') }}</span></div>
            <h2>Tüm Ürünler</h2>

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

    <!-- SCROLL SHOWCASE — KATEGORİLER -->
    <section class="scroll-stage" id="kategoriler" aria-label="Ürün kategorileri">
        <div class="scroll-sticky">
            <div class="wrap scroll-layout">

                {{-- Sol: ürüne ait görsel --}}
                <div class="scroll-media-wrap">
                    <img class="scroll-img is-active" src="{{ asset('assets/v11-hero.png') }}" alt="Ovion V11 Lite" loading="lazy" decoding="async" />
                    <div class="scroll-img scroll-img--ph">
                        <span>S3 Pro<br/><small>Görsel yakında</small></span>
                    </div>
                    <div class="scroll-img scroll-img--ph">
                        <span>H1 Pro<br/><small>Görsel yakında</small></span>
                    </div>
                    <div class="scroll-img scroll-img--ph">
                        <span>Aksesuarlar<br/><small>Görsel yakında</small></span>
                    </div>
                </div>

                {{-- Sağ: kategori bilgileri --}}
                <div class="scroll-texts">

                    <div class="scroll-text is-active">
                        <div class="scroll-cat-icon">
                            <svg width="24" height="24" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="7" y="2" width="14" height="24" rx="3"/><circle cx="14" cy="21" r="1" fill="currentColor" stroke="none"/>
                            </svg>
                        </div>
                        <p class="eyebrow">Telefon — V Serisi</p>
                        <h2>Akıllı Telefonlar</h2>
                        <p>V serisi ile günlük yaşamı kolaylaştıran, Türkiye'de tasarlanmış ve üretilmiş telefon deneyimi. 90 Hz ekran, 50 MP AI kamera ve 5000 mAh batarya.</p>
                        <a href="{{ url('/telefonlar/v11-lite') }}" class="btn btn-primary" style="align-self: flex-start; margin-top: 8px;">V11 Lite'ı Keşfet</a>
                    </div>

                    <div class="scroll-text">
                        <div class="scroll-cat-icon">
                            <svg width="24" height="24" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="6" width="10" height="16" rx="3"/><path d="M11 6V4M17 6V4M11 22v2M17 22v2"/><circle cx="14" cy="14" r="2.5"/>
                            </svg>
                        </div>
                        <p class="eyebrow">Saat — S Serisi</p>
                        <h2>Akıllı Saatler</h2>
                        <p>S serisi ile sağlığınızı, adımlarınızı ve uyku düzeninizi gerçek zamanlı takip edin. AMOLED ekran, GPS ve 14 günlük pil ömrü.</p>
                        <a href="{{ url('/saatler/s3-pro') }}" class="btn btn-primary" style="align-self: flex-start; margin-top: 8px;">S3 Pro'yu Keşfet</a>
                    </div>

                    <div class="scroll-text">
                        <div class="scroll-cat-icon">
                            <svg width="24" height="24" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 16v-4a8 8 0 0 1 16 0v4"/><rect x="4" y="16" width="4" height="6" rx="2"/><rect x="20" y="16" width="4" height="6" rx="2"/>
                            </svg>
                        </div>
                        <p class="eyebrow">Kulaklık — H Serisi</p>
                        <h2>Kulaklıklar</h2>
                        <p>H serisi ile Hi-Fi ses kalitesi ve hibrit ANC bir arada. 30 saatlik pil ömrüyle müziğinize kesintisiz odaklanın.</p>
                        <a href="{{ url('/kulakliklar/h1-pro') }}" class="btn btn-primary" style="align-self: flex-start; margin-top: 8px;">H1 Pro'yu Keşfet</a>
                    </div>

                    <div class="scroll-text">
                        <div class="scroll-cat-icon">
                            <svg width="24" height="24" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 8h18M5 14h18M5 20h10"/><rect x="2" y="5" width="24" height="18" rx="3"/>
                            </svg>
                        </div>
                        <p class="eyebrow">Aksesuar</p>
                        <h2>Aksesuarlar</h2>
                        <p>Orijinal kılıflar, şarj adaptörleri ve kablolarla ürünlerinizi her zaman koruyun ve şarjda tutun.</p>
                        <a href="{{ url('/aksesuarlar') }}" class="btn btn-primary" style="align-self: flex-start; margin-top: 8px;">Aksesuarları Keşfet</a>
                    </div>

                </div>

            </div>
            <div class="scroll-progress-track" aria-hidden="true">
                <div class="scroll-progress-bar"></div>
            </div>
        </div>
    </section>

    <!-- NEDEN OVİON — FEATURE BENTO -->
    <section class="section feat-section">
        <div class="wrap">
            <h2 class="feat-heading">Ovion: Güçlü Teknoloji,<br>Her İhtiyaca Uygun Tasarım</h2>
            <div class="feat-grid">

                <!-- WIDE — Battery -->
                <div class="feat-card feat-card--wide stagger">
                    <div class="feat-visual feat-visual--amber">
                        <svg viewBox="0 0 80 80" fill="none" aria-hidden="true">
                            <rect x="8" y="24" width="56" height="32" rx="7" stroke="white" stroke-width="3"/>
                            <rect x="64" y="31" width="8" height="18" rx="4" fill="white"/>
                            <rect x="15" y="31" width="32" height="18" rx="4" fill="white"/>
                        </svg>
                    </div>
                    <div class="feat-content">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <rect x="2" y="7" width="18" height="10" rx="2" stroke="currentColor" stroke-width="1.8"/>
                                <rect x="20" y="10" width="2" height="4" rx="1" fill="currentColor"/>
                                <rect x="5" y="10" width="8" height="4" rx="1" fill="currentColor"/>
                            </svg>
                        </div>
                        <h3>Gün Boyu Güç</h3>
                        <p>Uzun ömürlü batarya teknolojisi ve hızlı şarj desteğiyle tüm Ovion ürünleri sizi hiç şarjsız bırakmaz.</p>
                    </div>
                </div>

                <!-- NARROW — Performance -->
                <div class="feat-card stagger">
                    <div class="feat-icon">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <rect x="6" y="6" width="12" height="12" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <rect x="9" y="9" width="6" height="6" rx="1" fill="currentColor"/>
                            <line x1="10" y1="6" x2="10" y2="3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <line x1="14" y1="6" x2="14" y2="3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <line x1="10" y1="18" x2="10" y2="21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <line x1="14" y1="18" x2="14" y2="21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <line x1="6" y1="10" x2="3" y2="10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <line x1="6" y1="14" x2="3" y2="14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <line x1="18" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <line x1="18" y1="14" x2="21" y2="14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3>Üst Segment Performans</h3>
                    <p>Son nesil işlemciler ve optimize edilmiş yazılımla Ovion cihazları hem hız hem de verimlilik konusunda rakiplerinin önünde.</p>
                </div>

                <!-- NARROW — Display -->
                <div class="feat-card stagger">
                    <div class="feat-icon">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <rect x="2" y="4" width="20" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <path d="M8 20h8M12 18v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <rect x="5" y="7" width="14" height="8" rx="1" fill="currentColor" opacity=".3"/>
                        </svg>
                    </div>
                    <h3>Göz Alıcı Ekranlar</h3>
                    <p>AMOLED paneller, yüksek yenileme hızı ve akıllı parlaklık yönetimiyle Ovion ekranları her ortamda mükemmel görüntü sunar.</p>
                </div>

                <!-- WIDE — Connectivity -->
                <div class="feat-card feat-card--wide feat-card--reverse stagger">
                    <div class="feat-visual feat-visual--indigo">
                        <svg viewBox="0 0 80 80" fill="none" aria-hidden="true">
                            <path d="M14 40c0-14.36 11.64-26 26-26s26 11.64 26 26" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <path d="M22 40c0-9.94 8.06-18 18-18s18 8.06 18 18" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <path d="M30 40c0-5.52 4.48-10 10-10s10 4.48 10 10" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <circle cx="40" cy="40" r="4" fill="white"/>
                            <path d="M40 44v12" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <path d="M32 56h16" stroke="white" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="feat-content">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M5 12.5c0-3.87 3.13-7 7-7s7 3.13 7 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                <path d="M8 12.5c0-2.21 1.79-4 4-4s4 1.79 4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                <circle cx="12" cy="12.5" r="1.5" fill="currentColor"/>
                                <path d="M12 14v5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                <path d="M9.5 19h5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3>Akıllı Bağlantı</h3>
                        <p>NFC, 5G, Bluetooth 5.3 ve Dual SIM desteğiyle Ovion ürünleri sizi her an dijital dünyaya bağlar; ödeme ve paylaşım kolaylaşır.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- OVION GÜVENCESİ -->
    <section class="section trust-section trust-section--light">
        <div class="wrap">
            <p class="trust-eyebrow">Ovion Güvencesi</p>
            <h2 class="trust-title">Satın aldıktan<br/>sonra da yanınızdayız.</h2>
            <div class="trust-grid">

                <div class="trust-card trust-card--static">
                    <div class="trust-icon">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 3l9 4v7c0 5-4 9-9 11C5 23 1 19 1 14V7l9-4z" transform="translate(1,1) scale(0.9)"/>
                            <path d="M10 14l2.5 2.5L17 11" stroke-width="1.6"/>
                        </svg>
                    </div>
                    <h3>Resmi Garanti</h3>
                    <p>Tüm Ovion ürünlerinde standart 2 yıl resmi Türkiye garantisi. Satın aldığınız günden itibaren geçerli.</p>
                </div>

                <div class="trust-card trust-card--static">
                    <div class="trust-icon">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="14" cy="11" r="4"/>
                            <path d="M6 24c0-4.4 3.6-8 8-8s8 3.6 8 8"/>
                            <path d="M20 7c1.1.9 2 2.3 2 3.8 0 2.2-1.8 4-4 4"/>
                            <path d="M8 7C6.9 7.9 6 9.3 6 10.8c0 2.2 1.8 4 4 4"/>
                        </svg>
                    </div>
                    <h3>Yetkili Servis</h3>
                    <p>Türkiye'nin 81 ilinde yetkili Ovion servis noktası. Onarım için en yakın servisi kolayca bulun.</p>
                </div>

                <div class="trust-card trust-card--static">
                    <div class="trust-icon">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="6" width="20" height="14" rx="2"/>
                            <path d="M6 20l-2 4M18 20l2 4M4 24h16"/>
                            <path d="M8 13h8M11 10v6" stroke-width="1.6"/>
                        </svg>
                    </div>
                    <h3>Türkiye'de Üretim</h3>
                    <p>Her ürün İstanbul'da tasarlanır, Türkiye'deki üretim tesisimizde üretilir. Yerli sertifikalı.</p>
                </div>

                <a href="{{ url('/destek') }}" class="trust-card">
                    <div class="trust-icon">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 14a10 10 0 1 0 4.5 8.4"/>
                            <path d="M4 18v-4h4"/>
                            <circle cx="14" cy="14" r="3"/>
                        </svg>
                    </div>
                    <h3>Müşteri Desteği</h3>
                    <p>Telefon, e-posta ve canlı sohbet ile 7/24 destek ekibimize ulaşın. Sorularınız cevapsız kalmaz.</p>
                    <span class="trust-link">Destek Merkezi
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                </a>

            </div>
        </div>
    </section>

    <!-- KAMPANYALAR -->
    <section class="section camp-section">
        <div class="wrap">
            <div class="camp-header">
                <div>
                    <p class="eyebrow">Kampanyalar</p>
                    <h2 class="camp-title">Özel Teklifler</h2>
                </div>
                <div class="camp-arrows">
                    <button class="camp-btn camp-prev" aria-label="Önceki kampanya">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M13 4l-6 6 6 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="camp-btn camp-next" aria-label="Sonraki kampanya">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M7 4l6 6-6 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="camp-track" id="campTrack">

                {{-- Kart 1: Süper Teklif --}}
                <a href="#" class="camp-card">
                    <div class="camp-visual camp-visual--flash">
                        <svg class="camp-visual-icon" viewBox="0 0 80 80" fill="none" aria-hidden="true">
                            <path d="M46 8L18 46h22l-6 26 30-38H42L46 8z" fill="currentColor" opacity=".9"/>
                        </svg>
                    </div>
                    <div class="camp-body">
                        <span class="camp-badge">Sınırlı Süre</span>
                        <h3>Süper Teklif</h3>
                        <p>V11 Lite kampanya fiyatıyla, ücretsiz kılıf hediye. Stoklar tükenmeden fırsatı kaçırma.</p>
                    </div>
                </a>

                {{-- Kart 2: Yeni Üye --}}
                <a href="#" class="camp-card">
                    <div class="camp-visual camp-visual--gift">
                        <svg class="camp-visual-icon" viewBox="0 0 80 80" fill="none" aria-hidden="true">
                            <rect x="12" y="32" width="56" height="40" rx="4" fill="currentColor" opacity=".2"/>
                            <rect x="12" y="32" width="56" height="40" rx="4" stroke="currentColor" stroke-width="2.5" opacity=".9"/>
                            <path d="M8 32h64v10H8z" fill="currentColor" opacity=".35"/>
                            <path d="M40 32v40M24 14c0-6 10-6 10 0s-10 20-10 20h32S46 20 46 14c0-6-10-6-10 0" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" opacity=".9"/>
                        </svg>
                    </div>
                    <div class="camp-body">
                        <span class="camp-badge">Yeni Üyelere Özel</span>
                        <h3>Hoş Geldin Avantajı</h3>
                        <p>Ovion hesabı oluştur, ilk siparişinde anında indirim kazan. Aramıza katılmana sevindik.</p>
                    </div>
                </a>

                {{-- Kart 3: Yeni Ürünler --}}
                <a href="{{ url('/saatler/s3-pro') }}" class="camp-card">
                    <div class="camp-visual camp-visual--new">
                        <svg class="camp-visual-icon" viewBox="0 0 80 80" fill="none" aria-hidden="true">
                            <circle cx="40" cy="40" r="28" stroke="currentColor" stroke-width="2.5" opacity=".4"/>
                            <circle cx="40" cy="40" r="18" stroke="currentColor" stroke-width="2.5" opacity=".7"/>
                            <circle cx="40" cy="40" r="6" fill="currentColor" opacity=".9"/>
                            <line x1="40" y1="8" x2="40" y2="18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" opacity=".9"/>
                            <line x1="40" y1="62" x2="40" y2="72" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" opacity=".9"/>
                            <line x1="8" y1="40" x2="18" y2="40" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" opacity=".9"/>
                            <line x1="62" y1="40" x2="72" y2="40" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" opacity=".9"/>
                        </svg>
                    </div>
                    <div class="camp-body">
                        <span class="camp-badge">Yeni</span>
                        <h3>S3 Pro Satışta</h3>
                        <p>Ovion S3 Pro akıllı saat artık satışta. AMOLED · GPS · 14 gün pil ömrü.</p>
                    </div>
                </a>

                {{-- Kart 4: Aksesuar --}}
                <a href="{{ url('/aksesuarlar') }}" class="camp-card">
                    <div class="camp-visual camp-visual--acc">
                        <svg class="camp-visual-icon" viewBox="0 0 80 80" fill="none" aria-hidden="true">
                            <path d="M40 10l6 14h14l-12 9 5 14-13-9-13 9 5-14-12-9h14z" fill="currentColor" opacity=".85"/>
                        </svg>
                    </div>
                    <div class="camp-body">
                        <span class="camp-badge">Aksesuar</span>
                        <h3>Tamamlayıcı Ürünler</h3>
                        <p>Orijinal kılıf, şarj adaptörü ve kablo çeşitleri. Ürününüzü her zaman koruyun.</p>
                    </div>
                </a>

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
