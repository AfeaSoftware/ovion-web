@extends('main')

@section('title', __('ui.home_meta_title'))
@section('description', __('ui.home_meta_desc'))
@section('canonical', ($locale ?? 'tr') === 'en' ? route('en.home') : route('home'))
@section('theme', 'dark')

@section('content')
    <!-- HERO SLIDER -->
    <section class="hero hero-slider" id="phone" aria-label="Öne çıkan ürünler">

        <div class="hero-slides" aria-live="polite">

            @foreach($heroes as $hero)
            <div class="hero-slide {{ $loop->first ? 'is-active' : '' }}" data-slide="{{ $loop->index }}" aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
                <div class="wrap hero-grid">
                    <div class="hero-copy">
                        @if($hero->badge_text)
                            <p class="eyebrow">{{ $hero->badge_text }}</p>
                        @endif
                        <h1>{!! $hero->title !!}</h1>
                        @if($hero->description)
                            <p class="lede">{{ $hero->description }}</p>
                        @endif
                        @if($hero->cta_text && $hero->cta_url)
                            <div class="hero-cta">
                                <a class="btn btn-primary" href="{{ $hero->cta_url }}">{{ $hero->cta_text }}</a>
                                <a class="btn btn-ghost" href="#products">Tüm Ürünler</a>
                            </div>
                        @endif
                    </div>
                    @php
                        $heroImg = $hero->imageUrl('webp') ?: $hero->imageUrl();
                        $heroImg = $heroImg ? preg_replace('#^https?://[^/]+#', '', $heroImg) : null;
                    @endphp
                    <div class="hero-media {{ $heroImg ? '' : 'hero-media--placeholder' }}">
                        @if($heroImg)
                            <img src="{{ $heroImg }}"
                                alt="{{ strip_tags($hero->title) }}"
                                width="1000" height="1250"
                                {{ $loop->first ? 'fetchpriority="high"' : 'loading="lazy"' }}
                                decoding="async" />
                        @else
                            <span>{!! $hero->title !!}<br/><small>Görsel yakında</small></span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        {{-- Slider controls --}}
        @if($heroes->count() > 1)
        <div class="hero-slider-ui" aria-label="Slider kontrolleri">
            <button class="hero-slider-btn hero-slider-prev" aria-label="Önceki slayt">
                <svg width="18" height="18" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M13 4l-6 6 6 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="hero-slider-dots" role="tablist" aria-label="Slaytlar">
                @foreach($heroes as $hero)
                    <button class="hero-dot {{ $loop->first ? 'is-active' : '' }}"
                        data-slide="{{ $loop->index }}"
                        role="tab"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                        aria-label="Slayt {{ $loop->iteration }}"></button>
                @endforeach
            </div>
            <button class="hero-slider-btn hero-slider-next" aria-label="Sonraki slayt">
                <svg width="18" height="18" viewBox="0 0 20 20" fill="none" aria-hidden="true">
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
    <section class="stat-strip" aria-label="{{ __('ui.home_strip_aria') }}">
        <div class="wrap stat-row stagger">
            @if($homeStats->isNotEmpty())
                @foreach($homeStats as $i => $stat)
                    <div class="stat" style="--i:{{ $i }}">
                        <span class="stat-num" data-count="{{ $stat['value'] ?? '' }}" @if(!empty($stat['suffix'])) data-suffix="{{ $stat['suffix'] }}" @endif>{{ $stat['value'] ?? '' }}{{ $stat['suffix'] ?? '' }}</span>
                        <span class="stat-lbl">{{ $stat['label'] ?? '' }}</span>
                    </div>
                @endforeach
            @else
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
            @endif
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

                </div>
            </div>
        </div>
    </section>

    <!-- SCROLL SHOWCASE — KATEGORİLER -->
    @php
      $homeScroll = collect($content?->get('home_scroll') ?? []);
    @endphp
    <section class="scroll-stage" id="kategoriler" aria-label="Ürün kategorileri">
        <div class="scroll-sticky">
            <div class="wrap scroll-layout">

                @if($homeScroll->isNotEmpty())
                  {{-- Dynamic --}}
                  <div class="scroll-media-wrap">
                    @foreach($homeScroll as $i => $row)
                      @php $img = !empty($row['image']) ? \Illuminate\Support\Facades\Storage::url($row['image']) : null; @endphp
                      @if($img)
                        <img class="scroll-img{{ $i === 0 ? ' is-active' : '' }}" src="{{ $img }}" alt="{{ $row['title'] ?? '' }}" loading="lazy" decoding="async" />
                      @else
                        <div class="scroll-img scroll-img--ph{{ $i === 0 ? ' is-active' : '' }}"><span>{{ $row['title'] ?? '' }}<br/><small>Görsel yakında</small></span></div>
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
                @else
                  {{-- Static fallback --}}
                  <div class="scroll-media-wrap">
                      <img class="scroll-img is-active" src="{{ asset('assets/v11-hero.png') }}" alt="Ovion V11 Lite" loading="lazy" decoding="async" />
                      <div class="scroll-img scroll-img--ph"><span>S3 Pro<br/><small>Görsel yakında</small></span></div>
                      <div class="scroll-img scroll-img--ph"><span>H1 Pro<br/><small>Görsel yakında</small></span></div>
                  </div>
                  <div class="scroll-texts">
                      <div class="scroll-text is-active">
                          <div class="scroll-cat-icon"><svg width="24" height="24" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="2" width="14" height="24" rx="3"/><circle cx="14" cy="21" r="1" fill="currentColor" stroke="none"/></svg></div>
                          <p class="eyebrow">Telefon — V Serisi</p>
                          <h2>Akıllı Telefonlar</h2>
                          <p>V serisi ile günlük yaşamı kolaylaştıran, Türkiye'de tasarlanmış ve üretilmiş telefon deneyimi. 90 Hz ekran, 50 MP AI kamera ve 5000 mAh batarya.</p>
                          <a href="{{ url('/telefonlar/v11-lite') }}" class="btn btn-primary" style="align-self: flex-start; margin-top: 8px;">V11 Lite'ı Keşfet</a>
                      </div>
                      <div class="scroll-text">
                          <div class="scroll-cat-icon"><svg width="24" height="24" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="6" width="10" height="16" rx="3"/><path d="M11 6V4M17 6V4M11 22v2M17 22v2"/><circle cx="14" cy="14" r="2.5"/></svg></div>
                          <p class="eyebrow">Saat — S Serisi</p>
                          <h2>Akıllı Saatler</h2>
                          <p>S serisi ile sağlığınızı, adımlarınızı ve uyku düzeninizi gerçek zamanlı takip edin. AMOLED ekran, GPS ve 14 günlük pil ömrü.</p>
                          <a href="{{ url('/saatler/s3-pro') }}" class="btn btn-primary" style="align-self: flex-start; margin-top: 8px;">S3 Pro'yu Keşfet</a>
                      </div>
                      <div class="scroll-text">
                          <div class="scroll-cat-icon"><svg width="24" height="24" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 16v-4a8 8 0 0 1 16 0v4"/><rect x="4" y="16" width="4" height="6" rx="2"/><rect x="20" y="16" width="4" height="6" rx="2"/></svg></div>
                          <p class="eyebrow">Kulaklık — H Serisi</p>
                          <h2>Kulaklıklar</h2>
                          <p>H serisi ile Hi-Fi ses kalitesi ve hibrit ANC bir arada. 30 saatlik pil ömrüyle müziğinize kesintisiz odaklanın.</p>
                          <a href="{{ url('/kulakliklar/h1-pro') }}" class="btn btn-primary" style="align-self: flex-start; margin-top: 8px;">H1 Pro'yu Keşfet</a>
                      </div>
                  </div>
                @endif

            </div>
            <div class="scroll-progress-track" aria-hidden="true">
                <div class="scroll-progress-bar"></div>
            </div>
        </div>
    </section>

    <!-- NEDEN OVİON — FEATURE BENTO -->
    @php
      $homeFeatTitle = $content?->get('home_feat_title');
      $homeFeatCards = collect($content?->get('home_feat_cards') ?? []);
    @endphp
    <section class="section feat-section">
        <div class="wrap">
            <h2 class="feat-heading">{!! $homeFeatTitle ?: 'Ovion: Güçlü Teknoloji,<br>Her İhtiyaca Uygun Tasarım' !!}</h2>
            <div class="feat-grid">

                @if($homeFeatCards->isNotEmpty())
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
                @else

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

                @endif
            </div>
        </div>
    </section>

    <!-- OVION GÜVENCESİ -->
    @php
      $homeTrustEyebrow = $content?->get('home_trust_eyebrow');
      $homeTrustTitle = $content?->get('home_trust_title');
      $homeTrustCards = collect($content?->get('home_trust_cards') ?? []);
    @endphp
    <section class="section trust-section trust-section--light">
        <div class="wrap">
            <p class="trust-eyebrow">{{ $homeTrustEyebrow ?: 'Ovion Güvencesi' }}</p>
            <h2 class="trust-title">{!! $homeTrustTitle ?: 'Satın aldıktan<br/>sonra da yanınızdayız.' !!}</h2>
            <div class="trust-grid">

                @if($homeTrustCards->isNotEmpty())
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
                @else
                    <div class="trust-card trust-card--static">
                        <div class="trust-icon">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3l9 4v7c0 5-4 9-9 11C5 23 1 19 1 14V7l9-4z" transform="translate(1,1) scale(0.9)"/><path d="M10 14l2.5 2.5L17 11" stroke-width="1.6"/></svg>
                        </div>
                        <h3>Resmi Garanti</h3>
                        <p>Tüm Ovion ürünlerinde standart 2 yıl resmi Türkiye garantisi. Satın aldığınız günden itibaren geçerli.</p>
                    </div>

                    <div class="trust-card trust-card--static">
                        <div class="trust-icon">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="14" cy="11" r="4"/><path d="M6 24c0-4.4 3.6-8 8-8s8 3.6 8 8"/><path d="M20 7c1.1.9 2 2.3 2 3.8 0 2.2-1.8 4-4 4"/><path d="M8 7C6.9 7.9 6 9.3 6 10.8c0 2.2 1.8 4 4 4"/></svg>
                        </div>
                        <h3>Yetkili Servis</h3>
                        <p>Türkiye'nin 81 ilinde yetkili Ovion servis noktası. Onarım için en yakın servisi kolayca bulun.</p>
                    </div>

                    <div class="trust-card trust-card--static">
                        <div class="trust-icon">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="14" rx="2"/><path d="M6 20l-2 4M18 20l2 4M4 24h16"/><path d="M8 13h8M11 10v6" stroke-width="1.6"/></svg>
                        </div>
                        <h3>Türkiye'de Üretim</h3>
                        <p>Her ürün İstanbul'da tasarlanır, Türkiye'deki üretim tesisimizde üretilir. Yerli sertifikalı.</p>
                    </div>

                    <a href="{{ url('/destek') }}" class="trust-card">
                        <div class="trust-icon">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14a10 10 0 1 0 4.5 8.4"/><path d="M4 18v-4h4"/><circle cx="14" cy="14" r="3"/></svg>
                        </div>
                        <h3>Müşteri Desteği</h3>
                        <p>Telefon, e-posta ve canlı sohbet ile 7/24 destek ekibimize ulaşın. Sorularınız cevapsız kalmaz.</p>
                        <span class="trust-link">Destek Merkezi
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                    </a>
                @endif

            </div>
        </div>
    </section>

    <!-- BLOG / HABERLER -->
    <section class="section" id="news">
        <div class="wrap">
            <div class="section-kicker"><span>05</span><span>{!! __('ui.home_news_kicker') !!}</span></div>
            <h2>{!! __('ui.home_news_title') !!}</h2>
        </div>

        @if($latestPosts->isNotEmpty())
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
        @endif
    </section>

    <!-- BUY -->
    @php
      $homeBuyCta1Url = $content?->get('home_buy_cta1_url') ?: '#';
      $homeBuyCta2Url = $content?->get('home_buy_cta2_url') ?: '#support';
    @endphp
    <section class="buy" id="buy">
        <div class="wrap buy-inner">
            <div>
                <h2>@pc('home_buy_title', 'ui.home_buy_title')</h2>
                <div class="price">
                    <strong>@pc('home_buy_price', 'ui.home_buy_price')</strong>
                    <span>— @pc('home_buy_shipping', 'ui.home_buy_shipping')</span>
                </div>
            </div>
            <div style="display:flex; gap:12px; flex-wrap: wrap;">
                <a class="btn btn-primary" href="{{ $homeBuyCta1Url }}">@pcRaw('home_buy_cta1_text', 'ui.home_buy_cta1')</a>
                <a class="btn btn-ghost" href="{{ $homeBuyCta2Url }}">@pcRaw('home_buy_cta2_text', 'ui.home_buy_cta2')</a>
            </div>
        </div>
    </section>
@endsection
