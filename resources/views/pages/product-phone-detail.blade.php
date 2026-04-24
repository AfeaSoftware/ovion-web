@extends('main')

@section('title', 'Ovion V11 Lite — 50 MP AI Kamera · 90 Hz · 5000 mAh')
@section('description', 'Ovion V11 Lite: 6.56 inç 90 Hz ekran, 50 MP yapay zekâ destekli kamera ve 5000 mAh batarya. İstanbul tasarımı, Türkiye üretimi.')
@section('canonical', url('/telefonlar/v11-lite'))
@section('theme', 'dark')

@push('preload')
<link rel="preload" as="image" href="{{ asset('assets/v11-hero.png') }}" fetchpriority="high" />
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/phone-detail.css') }}" />
@endpush

@section('content')

{{-- ═══════════════════════════════════════ SUB-NAV ════════ --}}
<div class="pd-subnav" id="pd-subnav">
  <div class="wrap pd-subnav-inner">
    <ul class="pd-subnav-links">
      <li><a class="pd-subnav-link" href="#pd-hero">Genel Bakış</a></li>
      <li><a class="pd-subnav-link" href="#pd-camera">Kamera</a></li>
      <li><a class="pd-subnav-link" href="#pd-display">Ekran</a></li>
      <li><a class="pd-subnav-link" href="#pd-design">Tasarım</a></li>
      <li><a class="pd-subnav-link" href="#pd-performance">Performans</a></li>
      <li><a class="pd-subnav-link" href="#pd-specs">Teknik Özellikler</a></li>
    </ul>
    <a href="#pd-buy" class="pd-subnav-cta">
      ₺4,999'dan başlayan fiyatlarla
      <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</div>

{{-- ═══════════════════════════════════════ HERO ═══════════ --}}
<section class="pd-hero" id="pd-hero" data-pd-section="pd-hero">
  <div class="pd-hero-bg" aria-hidden="true"></div>

  <div class="pd-hero-content">
    <p class="pd-hero-eyebrow">Yeni — 2026</p>
    <h1>V11 Lite</h1>
    <p class="pd-hero-sub">İnce. Akıllı. Türkiye'nin.</p>
  </div>

  <div class="pd-hero-img">
    <img src="{{ asset('assets/v11-hero.png') }}"
         alt="Ovion V11 Lite İnci Beyazı rengi, ön ve arka görünüm"
         width="900" height="1100"
         fetchpriority="high" decoding="async" />
  </div>

  <div class="pd-hero-bottom">
    <p class="pd-hero-sub" style="margin:0;">50 MP AI kamera ile tanışın.</p>
    <div class="pd-hero-actions">
      <a href="#pd-buy" class="btn btn-primary">₺4,999'dan Satın Al</a>
      <a href="#pd-specs" class="btn btn-ghost">Teknik Özellikler</a>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ SPEC STRIP ══════ --}}
<section class="pd-specs-strip" aria-label="Öne çıkan özellikler">
  <div class="wrap pd-specs-row">
    <div class="pd-spec-item pd-reveal">
      <span class="pd-spec-val" data-count="6.56" data-suffix="″" data-decimals="2">6.56″</span>
      <span class="pd-spec-lbl">HD+ · 90 Hz</span>
    </div>
    <div class="pd-spec-item pd-reveal pd-reveal-delay-1">
      <span class="pd-spec-val" data-count="50" data-suffix=" MP">50 MP</span>
      <span class="pd-spec-lbl">AI Ana Kamera</span>
    </div>
    <div class="pd-spec-item pd-reveal pd-reveal-delay-2">
      <span class="pd-spec-val" data-count="5000" data-suffix=" mAh">5000 mAh</span>
      <span class="pd-spec-lbl">Batarya · 18 W</span>
    </div>
    <div class="pd-spec-item pd-reveal pd-reveal-delay-3">
      <span class="pd-spec-val" data-count="8.45" data-suffix=" mm" data-decimals="2">8.45 mm</span>
      <span class="pd-spec-lbl">İnce Profil · 179 g</span>
    </div>
    <div class="pd-spec-item pd-reveal pd-reveal-delay-3">
      <span class="pd-spec-val">24 ay</span>
      <span class="pd-spec-lbl">Türkiye Garantisi</span>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ CAMERA BILLBOARD ══ --}}
<section class="pd-feature pd-billboard" id="pd-camera" data-pd-section="pd-camera">
  <div class="pd-billboard-media">
    <img src="{{ asset('assets/v11-duo.png') }}"
         alt="V11 Lite kamera modülü yakın çekim"
         loading="lazy" decoding="async"
         width="1600" height="900" />
  </div>
  <div class="pd-billboard-overlay" aria-hidden="true"></div>
  <div class="pd-billboard-content pd-reveal">
    <p class="eyebrow">Kamera</p>
    <h2>50 MP sensör.<br/>Işığı okumak için<br/>eğitildi.</h2>
    <p>Yapay zekâ sahne tanıma, deklanşöre basmadan pozlamayı dengeler. Phase-detect otomatik odaklama 0.3 saniye altında kilitlenir.</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ CAMERA FEATURES ══ --}}
<section class="pd-cards-section pd-feature" id="pd-camera-features">
  <div class="wrap">
    <p class="eyebrow pd-reveal">Kamera Sistemi</p>
    <h2 class="pd-reveal pd-reveal-delay-1">Her açıdan<br/>mükemmel çekim.</h2>
    <div class="pd-cards-grid">

      <div class="pd-card pd-reveal">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M6.5 6.5h.01M17.5 6.5h.01M6.5 17.5h.01M17.5 17.5h.01"/><rect x="3" y="3" width="18" height="18" rx="4"/></svg>
        </div>
        <div class="pd-card-num">50 <span>MP</span></div>
        <h3>Ana Kamera</h3>
        <p>Büyük piksel sensörü, düşük ışıkta detayı korur ve ten tonlarını doğal yansıtır.</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-1">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        </div>
        <div class="pd-card-num">40+ <span>Sahne</span></div>
        <h3>AI Sahne Modu</h3>
        <p>Gece, yemek, portre dahil 40'tan fazla sahneyi tanır; renk, kontrast ve netliği otomatik ayarlar.</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-2">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <div class="pd-card-num">0.3 <span>sn</span></div>
        <h3>Phase-Detect AF</h3>
        <p>Faz algılama otomatik odaklama, hareket eden nesneleri bile 0.3 saniye altında kilitler.</p>
      </div>

      <div class="pd-card pd-reveal">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v1m0 16v1M4.22 4.22l.71.71m12.73 12.73.71.71M3 12h1m16 0h1M4.22 19.78l.71-.71M18.36 5.64l.71-.71"/><circle cx="12" cy="12" r="4"/></svg>
        </div>
        <h3>HDR</h3>
        <p>Yüksek dinamik aralık, arka ışıkta bile hem gölgeleri hem açık alanları dengede tutar.</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-1">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <div class="pd-card-num">8 <span>MP</span></div>
        <h3>Ön Kamera</h3>
        <p>Punch-hole ön kamera, gün ışığında ve iç mekânda doğal ten tonları için ayarlanmıştır.</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-2">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
        </div>
        <h3>Video</h3>
        <p>1080p Full HD video, elektronik görüntü sabitleme ve yapay zekâ gürültü azaltma ile.</p>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ DISPLAY BILLBOARD ══ --}}
<section class="pd-feature pd-billboard" id="pd-display" data-pd-section="pd-display" style="background:var(--bg-2);">
  <div class="pd-billboard-media">
    <img src="{{ asset('assets/v11-front.png') }}"
         alt="V11 Lite ekran görseli"
         loading="lazy" decoding="async"
         width="1000" height="1250"
         style="object-position: center center;" />
  </div>
  <div class="pd-billboard-overlay" aria-hidden="true"></div>
  <div class="pd-billboard-content pd-reveal">
    <p class="eyebrow">Ekran</p>
    <h2>90 Hz akıcılık.<br/>Her kaydırmada<br/>hissedilir.</h2>
    <p>6.56 inç HD+ panel, 90 Hz'de yenilenir. Parmağınızla birlikte hareket eden, kasılmayan, gecikmeyen bir ekran.</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ DISPLAY SPLIT ══════ --}}
<section class="pd-split" id="pd-display-split">
  <div class="pd-split-media" style="background:#f0f1f3;">
    <img src="{{ asset('assets/v11-landscape.png') }}"
         alt="V11 Lite yatay modda ekran"
         loading="lazy" decoding="async"
         width="1000" height="500"
         style="object-fit:contain; padding: 32px;" />
  </div>
  <div class="pd-split-copy pd-reveal">
    <p class="eyebrow">Ekran Teknolojisi</p>
    <h2>Her içeriğe<br/>özel parlaklık.</h2>
    <p>Multi-touch 6.56 inç HD+ IPS panel, punch-hole ön kamera ile maksimum ekran alanı sunar. Güneş ışığında bile okunaklı.</p>
    <ul class="pd-feature-list">
      <li data-n="01">6.56 inç HD+ IPS LCD · 1612 × 720 px</li>
      <li data-n="02">90 Hz yüksek yenileme hızı</li>
      <li data-n="03">Punch-hole punch ön kamera</li>
      <li data-n="04">Multi-touch kapasitif dokunmatik</li>
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ DESIGN (CINEMA SCROLL) ══ --}}
<div id="pd-design" data-pd-section="pd-design" class="pd-cinema-wrap">
  <div class="pd-cinema-sticky">

    <div class="pd-cinema-img is-active" data-cinema-idx="0">
      <img src="{{ asset('assets/v11-back.png') }}" alt="V11 Lite arka yüz" loading="lazy" decoding="async" />
    </div>
    <div class="pd-cinema-img" data-cinema-idx="1">
      <img src="{{ asset('assets/v11-side-a.png') }}" alt="V11 Lite profil A" loading="lazy" decoding="async" />
    </div>
    <div class="pd-cinema-img" data-cinema-idx="2">
      <img src="{{ asset('assets/v11-side-b.png') }}" alt="V11 Lite profil B" loading="lazy" decoding="async" />
    </div>
    <div class="pd-cinema-img" data-cinema-idx="3">
      <img src="{{ asset('assets/v11-pair.png') }}" alt="V11 Lite ön ve arka" loading="lazy" decoding="async" />
    </div>

    <div class="pd-cinema-caption is-active" data-cinema-idx="0">
      <p class="eyebrow" style="color:rgba(255,255,255,.55)">Tasarım</p>
      <h3>Kamera mühendisliği<br/>sahnede.</h3>
      <p>50 MP dairesel kamera modülü, Ovion imzası ve parmak izi dirençli İnci Beyazı yüzey.</p>
    </div>
    <div class="pd-cinema-caption" data-cinema-idx="1">
      <p class="eyebrow" style="color:rgba(255,255,255,.55)">Profil</p>
      <h3>8.45 mm.<br/>Elde kaybolur.</h3>
      <p>164 mm gövdede 8.45 mm ince profil. Alüminyum çerçeve, her kenarda milimetrenin onda biri hassasiyetinde.</p>
    </div>
    <div class="pd-cinema-caption" data-cinema-idx="2">
      <p class="eyebrow" style="color:rgba(255,255,255,.55)">Tuşlar</p>
      <h3>Yan tuştan<br/>güce ulaş.</h3>
      <p>Yan yerleşimli parmak izi sensörü, fiziksel ses tuşları ve USB-C bağlantısı.</p>
    </div>
    <div class="pd-cinema-caption" data-cinema-idx="3">
      <p class="eyebrow" style="color:rgba(255,255,255,.55)">Renk</p>
      <h3>İnci Beyazı.<br/>Bir ton, sonsuz ışık.</h3>
      <p>Işıkla oynayan İnci Beyazı kaplama, günün her saatinde farklı bir görünüm sunar.</p>
    </div>

    <div class="pd-cinema-dots" aria-hidden="true">
      <div class="pd-cinema-dot is-active"></div>
      <div class="pd-cinema-dot"></div>
      <div class="pd-cinema-dot"></div>
      <div class="pd-cinema-dot"></div>
    </div>

  </div>
</div>

{{-- ═══════════════════════════════════════ PERFORMANCE ════════ --}}
<section class="pd-cards-section pd-feature pd-feature--mid" id="pd-performance" data-pd-section="pd-performance">
  <div class="wrap">
    <p class="eyebrow pd-reveal">Performans</p>
    <h2 class="pd-reveal pd-reveal-delay-1">Hızlı. Verimli.<br/>Tüm gün yanında.</h2>
    <div class="pd-cards-grid">

      <div class="pd-card pd-reveal">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
        </div>
        <div class="pd-card-num">Unisoc <span>T606</span></div>
        <h3>İşlemci</h3>
        <p>Octa-core 1.6 GHz işlemci, 12 nm süreçle verimli ve hızlı çok görevli kullanım sunar.</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-1">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
        </div>
        <div class="pd-card-num">4 <span>GB RAM</span></div>
        <h3>Bellek</h3>
        <p>4 GB RAM ile uygulamalar arasında akıcı geçiş. 128 GB dahili depolama, microSD ile genişletilebilir.</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-2">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 18H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3.19M15 6h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3.19"/><line x1="23" y1="13" x2="23" y2="11"/><polyline points="11 6 7 12 13 12 9 18"/></svg>
        </div>
        <div class="pd-card-num">18 <span>W</span></div>
        <h3>Hızlı Şarj</h3>
        <p>5000 mAh batarya, 18 W hızlı şarj desteğiyle kısa bir molada saatlerce ek kullanım sağlar.</p>
      </div>

      <div class="pd-card pd-reveal">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3>Güvenlik</h3>
        <p>Yan parmak izi sensörü + yüz tanıma. Çift katmanlı kimlik doğrulamayla verileriniz güvende.</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-1">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M1 6l5 5 4-4 8 8 5-5"/></svg>
        </div>
        <h3>Bağlantı</h3>
        <p>4G LTE, Wi-Fi 802.11 a/b/g/n, Bluetooth 5.0, GPS + GLONASS ve USB-C 2.0.</p>
      </div>

      <div class="pd-card pd-reveal pd-reveal-delay-2">
        <div class="pd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        </div>
        <h3>Türkiye Yapımı</h3>
        <p>Her V11 Lite, yerli üretim tesislerimizde üretilir. 24 aylık Türkiye garantisi ile teslim edilir.</p>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ SPLIT — BATTERY ════ --}}
<section class="pd-split pd-split--flip" style="background: var(--bg);">
  <div class="pd-split-media">
    <img src="{{ asset('assets/v11-pair.png') }}"
         alt="V11 Lite ön ve arka görünüm"
         loading="lazy" decoding="async"
         width="1000" height="1250" />
  </div>
  <div class="pd-split-copy pd-reveal" style="background: var(--bg);">
    <p class="eyebrow">Batarya</p>
    <h2>Bir şarjla<br/>tüm gün.</h2>
    <p>5000 mAh güçlü batarya, yoğun kullanımda tam bir gün, daha hafif kullanımda iki güne kadar dayanır. 18 W hızlı şarj ile sabah kahveniz hazırlanırken şarj da tamamlanır.</p>
    <ul class="pd-feature-list" style="margin-top:24px;">
      <li data-n="01">5000 mAh Li-ion batarya</li>
      <li data-n="02">18 W kablolu hızlı şarj</li>
      <li data-n="03">USB-C bağlantısı</li>
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ FULL SPECS ════════ --}}
<section class="pd-specs-section" id="pd-specs" data-pd-section="pd-specs">
  <div class="wrap">
    <p class="eyebrow pd-reveal">Teknik Özellikler</p>
    <h2 class="pd-reveal pd-reveal-delay-1">Her detayı<br/>burada bulursunuz.</h2>

    <div class="pd-specs-table">
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">Ekran</div>
        <div class="pd-spec-row-v">6.56 inç HD+ IPS LCD<span class="pd-spec-row-sub">1612 × 720 px · 90 Hz · Multi-touch</span></div>
      </div>
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">İşlemci</div>
        <div class="pd-spec-row-v">Unisoc T606<span class="pd-spec-row-sub">Octa-core · 1.6 GHz · 12 nm</span></div>
      </div>
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">Bellek</div>
        <div class="pd-spec-row-v">4 GB RAM · 128 GB Depolama<span class="pd-spec-row-sub">microSD ile genişletilebilir</span></div>
      </div>
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">Ana Kamera</div>
        <div class="pd-spec-row-v">50 MP f/1.8<span class="pd-spec-row-sub">PDAF · HDR · AI Sahne Modu</span></div>
      </div>
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">Ön Kamera</div>
        <div class="pd-spec-row-v">8 MP f/2.0<span class="pd-spec-row-sub">Punch-hole · Sabit odak</span></div>
      </div>
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">Batarya</div>
        <div class="pd-spec-row-v">5000 mAh<span class="pd-spec-row-sub">18 W hızlı şarj · USB-C</span></div>
      </div>
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">İşletim Sistemi</div>
        <div class="pd-spec-row-v">Android 14<span class="pd-spec-row-sub">Özelleştirilmiş OvionUI arayüzü</span></div>
      </div>
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">Bağlantı</div>
        <div class="pd-spec-row-v">4G LTE · Wi-Fi ac · BT 5.0 · GPS<span class="pd-spec-row-sub">GLONASS · USB-C 2.0 · 3.5 mm jack</span></div>
      </div>
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">Güvenlik</div>
        <div class="pd-spec-row-v">Yan parmak izi sensörü<span class="pd-spec-row-sub">Yüz tanıma</span></div>
      </div>
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">Boyutlar</div>
        <div class="pd-spec-row-v">164.3 × 76.0 × 8.45 mm<span class="pd-spec-row-sub">179 g</span></div>
      </div>
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">SIM</div>
        <div class="pd-spec-row-v">Çift Nano-SIM<span class="pd-spec-row-sub">Dual Standby</span></div>
      </div>
      <div class="pd-spec-row">
        <div class="pd-spec-row-k">Renk</div>
        <div class="pd-spec-row-v">İnci Beyazı<span class="pd-spec-row-sub">Türkiye'de tasarlandı ve üretildi</span></div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ BUY ════════════════ --}}
<section class="pd-buy" id="pd-buy" data-pd-section="pd-buy">
  <div class="wrap pd-reveal">
    <p class="eyebrow" style="justify-content:center">Satın Al</p>
    <h2>Hazır olduğunda<br/>buradayız.</h2>
    <div class="pd-buy-price">
      <strong>₺4,999</strong>'dan başlayan fiyatlar · Türkiye geneli ücretsiz kargo
    </div>
    <div class="pd-buy-actions">
      <a href="#" class="btn btn-primary" style="font-size:16px; height:52px; padding:0 32px;">Şimdi Satın Al</a>
      <a href="#" class="btn btn-ghost" style="font-size:16px; height:52px; padding:0 32px;">Bayi Bul</a>
    </div>
    <p class="pd-buy-note">24 ay Türkiye garantisi · Ücretsiz kargo · Ücretsiz iade (30 gün)</p>
  </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/phone-detail.js') }}"></script>
@endpush
