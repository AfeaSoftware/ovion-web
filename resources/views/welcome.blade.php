<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title>Ovion V11 Lite — A phone built around the everyday.</title>
<meta name="description" content="The Ovion V11 Lite is a 6.56″ 90 Hz smartphone with a 50 MP AI camera and 5000 mAh battery. Designed and assembled in Türkiye." />
<meta name="theme-color" content="#f6f5f1" />
<meta name="robots" content="index, follow" />
<link rel="canonical" href="{{ url('/') }}" />

<meta property="og:type" content="product" />
<meta property="og:title" content="Ovion V11 Lite" />
<meta property="og:description" content="A 6.56″ 90 Hz smartphone with a 50 MP AI camera and 5000 mAh battery. Made in Türkiye." />
<meta property="og:image" content="{{ asset('assets/v11-hero.png') }}" />
<meta property="og:url" content="{{ url('/') }}" />
<meta property="og:site_name" content="Ovion" />
<meta property="og:locale" content="en_US" />
<meta property="og:locale:alternate" content="tr_TR" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Ovion V11 Lite" />
<meta name="twitter:description" content="A 6.56″ 90 Hz smartphone with a 50 MP AI camera and 5000 mAh battery." />
<meta name="twitter:image" content="{{ asset('assets/v11-hero.png') }}" />

<link rel="preload" as="image" href="{{ asset('assets/v11-hero.png') }}" fetchpriority="high" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />

<script type="application/ld+json">
{
  "@@context": "https://schema.org/",
  "@@type": "Product",
  "name": "Ovion V11 Lite",
  "image": ["{{ asset('assets/v11-hero.png') }}"],
  "description": "6.56-inch 90 Hz smartphone with a 50 MP AI camera, 5000 mAh battery and 18W fast charging. Designed and assembled in Türkiye.",
  "brand": { "@@type": "Brand", "name": "Ovion" },
  "manufacturer": { "@@type": "Organization", "name": "Ovion", "address": "Türkiye" },
  "model": "V11 Lite",
  "countryOfOrigin": "TR",
  "offers": {
    "@@type": "Offer",
    "priceCurrency": "TRY",
    "price": "4999",
    "availability": "https://schema.org/InStock",
    "url": "{{ url('/') }}"
  }
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Organization",
  "name": "Ovion",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('assets/v11-hero.png') }}",
  "address": { "@@type": "PostalAddress", "addressCountry": "TR" }
}
</script>
</head>
<body data-theme="light">

<!-- NAV -->
<header class="nav">
  <div class="wrap nav-inner">
    <a href="#" class="brand" aria-label="Ovion home">
      <span class="brand-mark" aria-hidden="true"></span>
      <span>ovion</span>
    </a>
    <nav aria-label="Primary">
      <ul class="nav-links">
        <li><a href="#phone">V11 Lite</a></li>
        <li><a href="#camera">Camera</a></li>
        <li><a href="#specs">Specs</a></li>
        <li><a href="#support">Support</a></li>
      </ul>
    </nav>
    <a class="nav-cta" href="#buy">
      Buy
      <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</header>

<!-- HERO -->
<section class="hero" id="phone">
  <!-- Video arka planı — Gerçek videonu şu şekilde ekleyebilirsin:
       <video autoplay muted loop playsinline class="hero-video-bg">
         <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4" />
       </video>
       Öneri: 1920×1080, 10-15 sn loop, karanlık tonda sinematik ürün geçişi -->
  <div class="hero-video-bg" aria-hidden="true">
    <div class="img-placeholder img-placeholder--hero">
      <p>Video / Hero Görsel<br/>1920 × 1080 — Sinematik ürün loop videosu<br/>veya yüksek çözünürlüklü full-bleed ürün fotoğrafı<br/>Koyu, filmik ton — Ovion logolu kapanış önerilir</p>
    </div>
  </div>

  <div class="wrap hero-grid">
    <div class="hero-copy stagger">
      <p class="eyebrow" style="--i:0">New — V11 Lite</p>
      <h1 style="--i:1" data-split>Teknolojiyle<br/>gelen <em>deneyim.</em></h1>
      <p class="lede" style="--i:2">
        6.56 inç 90 Hz ekran, 50 MP yapay zekâ kamera ve tüm günü karşılayan 5000 mAh batarya. İstanbul tasarımı, Türkiye üretimi.
      </p>
      <div class="hero-cta" style="--i:3">
        <a class="btn btn-primary" href="#products">OVION Deneyimini Keşfet</a>
        <a class="btn btn-ghost" href="#specs">Teknik Özellikler</a>
      </div>
    </div>
    <div class="hero-media">
      <img src="{{ asset('assets/v11-hero.png') }}"
           alt="Ovion V11 Lite Pearl White, ön ve arka görünüm"
           width="1000" height="1250"
           fetchpriority="high" decoding="async" />
    </div>
  </div>
</section>

<!-- STAT STRIP -->
<section class="stat-strip" aria-label="At a glance">
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
<section class="section" id="products">
  <div class="wrap">
    <div class="section-kicker"><span>Koleksiyon</span></div>
    <h2>Her ihtiyacınız için<br/>bir OVION var.</h2>
  </div>
  <div class="wrap product-grid stagger">

    <article class="product-card" style="--i:0">
      <div class="product-card-media">
        <img src="{{ asset('assets/v11-hero.png') }}" alt="Ovion V11 Lite Telefon" loading="lazy" decoding="async" />
      </div>
      <div class="product-card-body">
        <span class="product-card-cat">Telefon</span>
        <h3 class="product-card-name">V11 Lite</h3>
        <p class="product-card-desc">90 Hz · 50 MP AI · 5000 mAh</p>
        <a href="#phone" class="btn btn-ghost">Keşfet
          <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </article>

    <article class="product-card" style="--i:1">
      <div class="product-card-media product-card-media--placeholder">
        <div class="img-placeholder">
          <strong>Kulaklık Görseli</strong>
          <p>Ovion kulaklık — ¾ açı<br/>Şeffaf / gradient zemin<br/>Min. 1000 × 1200 px PNG</p>
        </div>
      </div>
      <div class="product-card-body">
        <span class="product-card-cat">Kulaklık</span>
        <h3 class="product-card-name">Yakında</h3>
        <p class="product-card-desc">Gürültü engelleme · Hi-Fi ses</p>
        <a href="#" class="btn btn-ghost">Keşfet
          <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </article>

    <article class="product-card" style="--i:2">
      <div class="product-card-media product-card-media--placeholder">
        <div class="img-placeholder">
          <strong>Saat Görseli</strong>
          <p>Ovion akıllı saat — frontal açı<br/>Kordon görünür, koyu/açık arka plan<br/>Min. 1000 × 1200 px PNG</p>
        </div>
      </div>
      <div class="product-card-body">
        <span class="product-card-cat">Saat</span>
        <h3 class="product-card-name">Yakında</h3>
        <p class="product-card-desc">Sağlık takibi · AMOLED ekran</p>
        <a href="#" class="btn btn-ghost">Keşfet
          <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </article>

  </div>
</section>

<!-- TECH BANNER -->
<section class="tech-banner">
  <div class="wrap tech-banner-inner">
    <div class="tech-banner-copy stagger">
      <p class="eyebrow" style="--i:0">Öne Çıkan Teknoloji</p>
      <h2 style="--i:1">Yapay Zeka<br/>Destekli Kamera</h2>
      <p style="--i:2">50 MP sensör ve akıllı sahne tanıma, her ışık koşulunda mükemmel fotoğrafı yakalar. Deklanşöre basmadan önce pozlama otomatik dengelenir.</p>
      <div style="--i:3"><a href="#camera" class="btn btn-primary">Kamerayı Keşfet</a></div>
    </div>
    <div class="tech-banner-media">
      <img src="{{ asset('assets/v11-duo.png') }}" alt="V11 Lite kamera detay" loading="lazy" decoding="async" />
    </div>
  </div>
</section>

<!-- CAMERA (DARK) -->
<section class="showcase" id="camera">
  <div class="wrap section">
    <div class="section-kicker"><span>02</span><span>Camera</span></div>
    <h2>A 50 MP sensor, trained to read the light.</h2>
    <p class="kicker-sub">
      AI scene recognition balances exposure before you tap the shutter.
      Phase-detect autofocus locks in under 0.3 s. HDR handles the
      awkward backlight your eye already forgave.
    </p>

    <div class="camera-grid">
      <div class="camera-photo">
        <img src="{{ asset('assets/v11-duo.png') }}"
             alt="Close-up of the V11 Lite rear camera ring"
             loading="lazy" decoding="async"
             width="1600" height="1000" />
      </div>
      <div>
        <ul class="feature-list">
          <li>
            <span class="f-num">01</span>
            <div>
              <h3>50 MP main camera</h3>
              <p>A large-pixel sensor that holds detail in low light without flattening skin tones.</p>
            </div>
          </li>
          <li>
            <span class="f-num">02</span>
            <div>
              <h3>AI scene mode</h3>
              <p>Recognises over forty common scenes — night, food, portrait — and tunes colour, contrast and sharpening to match.</p>
            </div>
          </li>
          <li>
            <span class="f-num">03</span>
            <div>
              <h3>Phase-detect autofocus</h3>
              <p>Locks focus in a fraction of a second. A burst mode keeps the moment that would have been gone.</p>
            </div>
          </li>
          <li>
            <span class="f-num">04</span>
            <div>
              <h3>8 MP front camera</h3>
              <p>Punch-hole, in-display. Tuned for natural skin tones in daylight and indoors.</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- SCROLL SHOWCASE 3D -->
<section class="scroll-stage" id="showcase-3d" aria-label="360 derece ürün görünümü">
  <div class="scroll-sticky">
    <div class="wrap scroll-layout">

      <div class="scroll-media-wrap">
        <img class="scroll-img is-active" src="{{ asset('assets/v11-front.png') }}"   alt="V11 Lite ön yüz"        loading="lazy" decoding="async" />
        <img class="scroll-img"            src="{{ asset('assets/v11-side-a.png') }}" alt="V11 Lite profil A"      loading="lazy" decoding="async" />
        <img class="scroll-img"            src="{{ asset('assets/v11-back.png') }}"   alt="V11 Lite arka yüz"      loading="lazy" decoding="async" />
        <img class="scroll-img"            src="{{ asset('assets/v11-side-b.png') }}" alt="V11 Lite profil B"      loading="lazy" decoding="async" />
      </div>

      <div class="scroll-texts">
        <div class="scroll-text is-active">
          <p class="eyebrow">Ön Tasarım</p>
          <h2>90 Hz'de her<br/>kıvrım önemli.</h2>
          <p>6.56 inç HD+ ekran, punch-hole kamera ve ince çerçeveler ile tam ekran deneyimi sunar.</p>
        </div>
        <div class="scroll-text">
          <p class="eyebrow">İnce Profil</p>
          <h2>8.45 mm.<br/>Elde kaybolur.</h2>
          <p>Ergonomik 164 mm gövde, alüminyum çerçeve ve parmak izi dirençli Pearl White yüzey.</p>
        </div>
        <div class="scroll-text">
          <p class="eyebrow">Arka Tasarım</p>
          <h2>Kamera mühendisliği<br/>sahnede.</h2>
          <p>50 MP ana kamera, dairesel modül tasarımı ve Ovion imzası ile dikkat çeken bir arka yüz.</p>
        </div>
        <div class="scroll-text">
          <p class="eyebrow">Her Detay</p>
          <h2>Yan tuştan<br/>güce ulaş.</h2>
          <p>Yan yerleşimli parmak izi sensörü, fiziksel ses tuşları ve USB-C şarj girişi.</p>
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
    <div class="section-kicker"><span>03</span><span>Display &amp; Battery</span></div>
    <h2>A calmer 90 Hz.<br/>A battery that keeps going.</h2>
  </div>
  <div class="wrap showcase-hero">
    <div class="showcase-copy">
      <p style="font-size: clamp(16px, 1.25vw, 19px); max-width: 42ch; color: var(--ink-2);">
        The 6.56-inch HD+ panel refreshes at 90 Hz, so scrolling feels like
        the page moves with your thumb, not after it. Multi-touch, always-on
        display, and a punch-hole front camera keep the frame clean.
      </p>
      <p style="font-size: clamp(16px, 1.25vw, 19px); max-width: 42ch; color: var(--ink-2); margin-top: 18px;">
        Underneath, a 5000 mAh cell and 18 W fast charging. A full day of
        heavy use, or two lighter ones. Top up to hours of playback in a
        coffee break.
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
<section class="section" id="specs" style="background: var(--bg-2); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);">
  <div class="wrap">
    <div class="section-kicker"><span>04</span><span>Specifications</span></div>
    <h2>Everything you'd check.</h2>

    <div class="specs">
      <div class="spec"><div class="spec-k">Display</div><div class="spec-v">6.56″ HD+</div><div class="spec-sub">90 Hz · Multi-touch</div></div>
      <div class="spec"><div class="spec-k">Main Camera</div><div class="spec-v">50 MP</div><div class="spec-sub">PDAF · HDR · AI scene</div></div>
      <div class="spec"><div class="spec-k">Front Camera</div><div class="spec-v">8 MP</div><div class="spec-sub">Punch-hole, in-display</div></div>
      <div class="spec"><div class="spec-k">Battery</div><div class="spec-v">5000 mAh</div><div class="spec-sub">18 W fast charge</div></div>
      <div class="spec"><div class="spec-k">Chipset</div><div class="spec-v">Unisoc T606</div><div class="spec-sub">Octa-core · 1.6 GHz</div></div>
      <div class="spec"><div class="spec-k">Memory</div><div class="spec-v">4 GB / 128 GB</div><div class="spec-sub">microSD expandable</div></div>
      <div class="spec"><div class="spec-k">Dimensions</div><div class="spec-v">164.3 × 76.0 × 8.45 mm</div><div class="spec-sub">179 g</div></div>
      <div class="spec"><div class="spec-k">Security</div><div class="spec-v">Fingerprint + Face</div><div class="spec-sub">Side-mounted sensor</div></div>
      <div class="spec"><div class="spec-k">Origin</div><div class="spec-v">Made in Türkiye</div><div class="spec-sub">Türkiye Garantili</div></div>
    </div>
  </div>
</section>

<!-- BLOG / HABERLER -->
<section class="section" id="news">
  <div class="wrap">
    <div class="section-kicker"><span>05</span><span>Haberler &amp; Lansman</span></div>
    <h2>Güncel &amp; Lansman.</h2>
  </div>
  <div class="wrap news-grid stagger">

    <article class="news-card news-featured" style="--i:0">
      <a href="#" class="news-card-link">
        <div class="news-media">
          <div class="img-placeholder img-placeholder--news">
            <strong>Lansman / Hero Görseli</strong>
            <p>Sinematik ürün sahnesi, koyu arka plan<br/>V11 Lite veya yeni model lansmanı<br/>Min. 1400 × 800 px — 16:9 oran</p>
          </div>
        </div>
        <div class="news-body">
          <span class="news-tag">Lansman</span>
          <h3>Yeni Modelimiz Yayında</h3>
          <p>Ovion V11 Lite, Türkiye'nin en uygun fiyatlı 50 MP AI kameralı telefonu olarak kullanıcılarla buluşuyor.</p>
          <span class="news-date">22 Nisan 2026</span>
        </div>
      </a>
    </article>

    <article class="news-card" style="--i:1">
      <a href="#" class="news-card-link">
        <div class="news-media news-media--sm">
          <div class="img-placeholder img-placeholder--news">
            <strong>Teknoloji Görseli</strong>
            <p>Kamera makro veya AI grafik<br/>Min. 800 × 500 px</p>
          </div>
        </div>
        <div class="news-body">
          <span class="news-tag">Teknoloji</span>
          <h3>Yapay Zeka Kamera Nasıl Çalışır?</h3>
          <p>V11 Lite'ın sahne tanıma motoru 40'tan fazla kategoriyi saniyeler içinde analiz eder.</p>
          <span class="news-date">15 Nisan 2026</span>
        </div>
      </a>
    </article>

    <article class="news-card" style="--i:2">
      <a href="#" class="news-card-link">
        <div class="news-media news-media--sm">
          <div class="img-placeholder img-placeholder--news">
            <strong>Fabrika / Üretim Görseli</strong>
            <p>Türkiye üretim tesisi<br/>veya montaj sahnesi<br/>Min. 800 × 500 px</p>
          </div>
        </div>
        <div class="news-body">
          <span class="news-tag">Şirket</span>
          <h3>Türkiye Üretiminin Gururunu Taşıyoruz</h3>
          <p>Her Ovion cihazı, yerli üretim tesislerimizde titizlikle tasarlanıp üretiliyor.</p>
          <span class="news-date">8 Nisan 2026</span>
        </div>
      </a>
    </article>

  </div>
</section>

<!-- BUY -->
<section class="buy" id="buy">
  <div class="wrap buy-inner">
    <div>
      <h2>Ready when you are.</h2>
      <div class="price">
        <strong>From ₺4,999</strong>
        <span>— free shipping in Türkiye · 24-month warranty</span>
      </div>
    </div>
    <div style="display:flex; gap:12px; flex-wrap: wrap;">
      <a class="btn btn-primary" href="#">Configure &amp; buy</a>
      <a class="btn btn-ghost" href="#support">Find a reseller</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer id="support">
  <div class="wrap">
    <div class="foot-grid">
      <div>
        <div class="brand" style="font-size:18px">
          <span class="brand-mark" aria-hidden="true"></span>
          <span>ovion</span>
        </div>
        <p class="foot-about">
          Ovion is a Turkish electronics brand designing everyday smartphones,
          assembled in Türkiye with a Türkiye-wide warranty.
        </p>
      </div>
      <div>
        <h4>Phones</h4>
        <ul>
          <li><a href="#">V11 Lite</a></li>
          <li><a href="#">Compare models</a></li>
          <li><a href="#">Accessories</a></li>
        </ul>
      </div>
      <div>
        <h4>Support</h4>
        <ul>
          <li><a href="#">Service centres</a></li>
          <li><a href="#">Warranty</a></li>
          <li><a href="#">User guides</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div>
        <h4>Company</h4>
        <ul>
          <li><a href="#">About Ovion</a></li>
          <li><a href="#">Newsroom</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Sustainability</a></li>
        </ul>
      </div>
    </div>
    <div class="foot-bot">
      <div>© 2026 Ovion Elektronik A.Ş. — İstanbul, Türkiye</div>
      <div style="display:flex; gap:18px;">
        <a href="#">Privacy</a>
        <a href="#">Cookies</a>
        <a href="#">Terms</a>
      </div>
    </div>
  </div>
</footer>

<!-- TWEAKS -->
<aside class="tweaks" id="tweaks" aria-label="Tweaks">
  <h5>Tweaks</h5>
  <div class="tweaks-row">
    <span>Theme</span>
    <div class="tweaks-btns" data-group="theme">
      <button data-val="light">Light</button>
      <button data-val="dark">Dark</button>
    </div>
  </div>
  <div class="tweaks-row">
    <span>Accent</span>
    <div class="tweaks-btns" data-group="accent">
      <button data-val="amber">Amber</button>
      <button data-val="slate">Slate</button>
      <button data-val="emerald">Emerald</button>
      <button data-val="ink">Ink</button>
    </div>
  </div>
  <div class="tweaks-row">
    <span>Language</span>
    <div class="tweaks-btns" data-group="lang">
      <button data-val="en">EN</button>
      <button data-val="tr">TR</button>
    </div>
  </div>
</aside>

<script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>
