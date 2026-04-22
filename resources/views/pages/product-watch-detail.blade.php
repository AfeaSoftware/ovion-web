<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Ovion S3 Pro — Sağlık · GPS · 14 Gün Batarya</title>
<meta name="description" content="Ovion S3 Pro akıllı saat: 100'den fazla spor modu, 14 gün batarya ömrü, kalp ritmi ve SpO2 takibi ile her anınızda yanınızda." />
<link rel="canonical" href="{{ url('/saatler/s3-pro') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
<link rel="stylesheet" href="{{ asset('css/phone-detail.css') }}" />
<link rel="stylesheet" href="{{ asset('css/watch-detail.css') }}" />
</head>
<body data-theme="dark">

{{-- ═══════════════════════════════════════ NAV (shared) ══ --}}
<header class="nav">
  <div class="wrap nav-inner">
    <a href="{{ url('/') }}" class="brand" aria-label="Ovion ana sayfa">
      <span class="brand-mark" aria-hidden="true"></span>
      <span>ovion</span>
    </a>
    <nav aria-label="Ana menü">
      <ul class="nav-links">
        <li class="nav-has-drop">
          <a href="{{ url('/') }}#products">Telefonlar
            <svg class="nav-chevron" width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <div class="nav-mega">
            <div class="wrap mega-inner">
              <div class="mega-grid">
                <a href="{{ url('/telefonlar/v11-lite') }}" class="mega-card">
                  <div class="mega-card-media"><img src="{{ asset('assets/v11-hero.png') }}" alt="V11 Lite" /></div>
                  <div class="mega-card-body"><span class="mega-card-cat">Telefon</span><h4>V11 Lite <span>→</span></h4><p>90 Hz · 50 MP AI · 5000 mAh</p></div>
                </a>
                <a href="#" class="mega-card">
                  <div class="mega-card-media mega-card-media--ph"><span>V10 Pro<br/><small>Yakında</small></span></div>
                  <div class="mega-card-body"><span class="mega-card-cat">Telefon</span><h4>V10 Pro <span>→</span></h4><p>AMOLED · 64 MP · 4800 mAh</p></div>
                </a>
                <a href="#" class="mega-card">
                  <div class="mega-card-media mega-card-media--ph"><span>V9<br/><small>Yakında</small></span></div>
                  <div class="mega-card-body"><span class="mega-card-cat">Telefon</span><h4>V9 <span>→</span></h4><p>IPS · 48 MP · 4500 mAh</p></div>
                </a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-has-drop">
          <a href="#">Saatler
            <svg class="nav-chevron" width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <div class="nav-mega">
            <div class="wrap mega-inner">
              <div class="mega-grid">
                <a href="{{ url('/saatler/s3-pro') }}" class="mega-card">
                  <div class="mega-card-media mega-card-media--ph" style="background:linear-gradient(135deg,#1c1c1e,#2c2c2e)"><span style="color:#fff">S3 Pro</span></div>
                  <div class="mega-card-body"><span class="mega-card-cat">Saat</span><h4>S3 Pro <span>→</span></h4><p>GPS · 14 Gün · Sağlık</p></div>
                </a>
                <a href="#" class="mega-card">
                  <div class="mega-card-media mega-card-media--ph"><span>S2<br/><small>Yakında</small></span></div>
                  <div class="mega-card-body"><span class="mega-card-cat">Saat</span><h4>S2 <span>→</span></h4><p>AMOLED · 7 Gün · Spor</p></div>
                </a>
                <a href="#" class="mega-card">
                  <div class="mega-card-media mega-card-media--ph"><span>S1 Lite<br/><small>Yakında</small></span></div>
                  <div class="mega-card-body"><span class="mega-card-cat">Saat</span><h4>S1 Lite <span>→</span></h4><p>IPS · 10 Gün · Giriş</p></div>
                </a>
              </div>
            </div>
          </div>
        </li>
        <li><a href="#">Kulaklık</a></li>
        <li><a href="#">Aksesuarlar</a></li>
        <li><a href="#wd-support">Destek</a></li>
      </ul>
    </nav>
    <a class="nav-cta" href="#wd-buy">
      Satın Al
      <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</header>

{{-- ═══════════════════════════════════════ SUB-NAV ════════ --}}
<div class="pd-subnav">
  <div class="wrap pd-subnav-inner">
    <ul class="pd-subnav-links">
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-hero">Genel Bakış</a></li>
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-health">Sağlık</a></li>
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-faces">Saat Yüzleri</a></li>
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-design">Tasarım</a></li>
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-activity">Aktivite</a></li>
      <li><a class="pd-subnav-link wd-subnav-link" href="#wd-specs">Teknik Özellikler</a></li>
    </ul>
    <a href="#wd-buy" class="pd-subnav-cta" style="background:var(--watch-red,#ff3b30)">
      ₺2,499'dan başlayan fiyatlarla
      <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</div>

{{-- ═══════════════════════════════════════ HERO ═══════════ --}}
<section class="wd-hero" id="wd-hero" data-wd-section="wd-hero">

  <div class="wd-hero-stage">
    {{-- Copy left --}}
    <div class="wd-hero-copy">
      <p class="wd-hero-eyebrow">Yeni — 2026</p>
      <h1>S3<br/>Pro</h1>
      <p class="wd-hero-tagline">
        Sadece saatiniz değil,<br/>sağlık partneriniz.
      </p>
      <div class="wd-hero-actions">
        <a href="#wd-buy" class="btn btn-primary">₺2,499'dan Satın Al</a>
        <a href="#wd-specs" class="btn btn-ghost">Teknik Özellikler</a>
      </div>
    </div>

    {{-- Watch right --}}
    <div class="wd-hero-watch">
      <div class="wd-hero-watch-glow" aria-hidden="true"></div>
      @if(file_exists(public_path('assets/s3-hero.png')))
        <img src="{{ asset('assets/s3-hero.png') }}" alt="Ovion S3 Pro akıllı saat"
             width="600" height="700" fetchpriority="high" decoding="async" />
      @else
        {{-- CSS watch placeholder --}}
        <div class="wd-hero-watch-placeholder" aria-hidden="true">
          <div class="wd-watch-body">
            <div class="wd-watch-face">
              <div class="wd-watch-time">10:09</div>
              <div class="wd-watch-date">SAL 22</div>
              <div class="wd-watch-rings">
                <div class="wd-ring wd-ring--move"></div>
                <div class="wd-ring wd-ring--cal"></div>
                <div class="wd-ring wd-ring--stand"></div>
              </div>
            </div>
          </div>
          <div class="wd-watch-strap wd-watch-strap--top"></div>
          <div class="wd-watch-strap wd-watch-strap--bot"></div>
          <div class="wd-watch-crown"></div>
        </div>
      @endif
    </div>
  </div>

  {{-- Stats strip --}}
  <div class="wd-hero-strip">
    <div class="wd-hero-stat">
      <span class="wd-hero-stat-val">14 gün</span>
      <span class="wd-hero-stat-lbl">Batarya</span>
    </div>
    <div class="wd-hero-stat">
      <span class="wd-hero-stat-val">100+</span>
      <span class="wd-hero-stat-lbl">Spor Modu</span>
    </div>
    <div class="wd-hero-stat">
      <span class="wd-hero-stat-val">5 ATM</span>
      <span class="wd-hero-stat-lbl">Su Direnci</span>
    </div>
    <div class="wd-hero-stat">
      <span class="wd-hero-stat-val">GPS</span>
      <span class="wd-hero-stat-lbl">Yerleşik</span>
    </div>
    <div class="wd-hero-stat">
      <span class="wd-hero-stat-val">24 ay</span>
      <span class="wd-hero-stat-lbl">Türkiye Garantisi</span>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ HEALTH BILLBOARD ══ --}}
<section class="wd-health-billboard" id="wd-health" data-wd-section="wd-health">
  <div class="wd-health-billboard-media">
    @if(file_exists(public_path('assets/s3-health.png')))
      <img src="{{ asset('assets/s3-health.png') }}" alt="S3 Pro sağlık takibi" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;background:linear-gradient(135deg,#0d0d0d 0%,#1a0a0a 40%,#0a0a1a 100%);"></div>
    @endif
  </div>
  <div class="wd-health-billboard-overlay" aria-hidden="true"></div>
  <div class="wd-health-billboard-content wd-reveal">
    <p class="wd-eyebrow">Sağlık</p>
    <h2>Vücudunuzu<br/>dinleyen saat.</h2>
    <p>Kalp ritminizden uykunuza, stres seviyenizden kan oksijenine — S3 Pro günün her saati sizi izler, siz izlemeden.</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ HEALTH CARDS ══════ --}}
<section class="wd-cards-section" id="wd-health-features">
  <div class="wrap">
    <p class="wd-eyebrow wd-reveal">Sağlık Sistemi</p>
    <h2 class="wd-reveal wd-reveal-delay-1">Her nabzınızda<br/>bir adım öteye.</h2>
    <div class="wd-cards-grid">

      <div class="wd-card wd-reveal">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        </div>
        <div class="wd-card-metric">24/7 <span>İzleme</span></div>
        <h3>Kalp Ritmi</h3>
        <p>Optik kalp ritmi sensörü istirahat, egzersiz ve uyku sırasında sürekli ölçüm yapar. Anormal ritimde uyarı verir.</p>
      </div>

      <div class="wd-card wd-reveal wd-reveal-delay-1">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
        </div>
        <div class="wd-card-metric">SpO2 <span>Sensörü</span></div>
        <h3>Kan Oksijeni</h3>
        <p>Kan oksijen doygunluğunu (SpO2) saniyeler içinde ölçer. Yüksek irtifa uyarısı ve uyku apnesi tespiti sunar.</p>
      </div>

      <div class="wd-card wd-reveal wd-reveal-delay-2">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <div class="wd-card-metric">8 <span>Aşama</span></div>
        <h3>Uyku Takibi</h3>
        <p>REM, derin uyku ve hafif uyku aşamalarını ayrı ayrı analiz eder. Sabah uyku kalite raporu sunar.</p>
      </div>

      <div class="wd-card wd-reveal">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
        <div class="wd-card-metric">HRV <span>Analiz</span></div>
        <h3>Stres Seviyesi</h3>
        <p>Kalp ritmi değişkenliği (HRV) analizi ile günlük stres seviyenizi takip eder, nefes egzersizleri önerir.</p>
      </div>

      <div class="wd-card wd-reveal wd-reveal-delay-1">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <div class="wd-card-metric">30 <span>Gün</span></div>
        <h3>Döngü Takibi</h3>
        <p>Kadın sağlığı özelliği ile menstrüel döngüyü takip eder, semptomları kaydeder ve tahmin sunar.</p>
      </div>

      <div class="wd-card wd-reveal wd-reveal-delay-2">
        <div class="wd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <div class="wd-card-metric">VO₂ <span>Max</span></div>
        <h3>Fitness Skoru</h3>
        <p>VO₂ Max tahmini ile kardiyo kondisyonunuzu ölçer. Zaman içindeki gelişiminizi grafikle gösterir.</p>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ WATCH FACES ════════ --}}
<section class="wd-faces-section" id="wd-faces" data-wd-section="wd-faces">
  <div class="wrap">
    <p class="wd-eyebrow wd-reveal">Kişiselleştirme</p>
    <h2 class="wd-reveal wd-reveal-delay-1">Her güne başka<br/>bir yüz.</h2>
    <div class="wd-faces-grid">

      <div class="wd-face-card wd-reveal">
        <div class="wd-face-preview wd-face-preview--sport">
          <div class="wd-face-mock wd-face-mock--sport">
            <div class="wd-face-rings-wrap" style="position:absolute;inset:0;border-radius:28%;overflow:hidden;">
              <div class="wd-face-ring wd-face-ring--1"></div>
              <div class="wd-face-ring wd-face-ring--2"></div>
            </div>
            <span class="wd-face-complication wd-face-complication--top wd-face-complication--sport">❤ 72</span>
            <div class="wd-face-time">10:09</div>
            <div class="wd-face-date" style="color:rgba(255,255,255,.4)">SAL 22</div>
            <span class="wd-face-complication wd-face-complication--bottom wd-face-complication--sport">↑ 8,420</span>
          </div>
        </div>
        <div class="wd-face-info">
          <h4>Sport Ring</h4>
          <p>Aktivite halkaları · Kalp ritmi</p>
        </div>
      </div>

      <div class="wd-face-card wd-reveal wd-reveal-delay-1">
        <div class="wd-face-preview wd-face-preview--classic">
          <div class="wd-face-mock wd-face-mock--classic">
            <span class="wd-face-complication wd-face-complication--top wd-face-complication--gold">PAZ</span>
            <div class="wd-face-time" style="font-size:clamp(14px,3vw,22px);letter-spacing:.08em;">10:09</div>
            <div class="wd-face-date" style="color:#c8a86d;letter-spacing:.12em;font-size:8px;">22 NİS 2026</div>
            <span class="wd-face-complication wd-face-complication--bottom wd-face-complication--gold">İSTANBUL</span>
          </div>
        </div>
        <div class="wd-face-info">
          <h4>Klasik Altın</h4>
          <p>Analog stil · Tarih · Şehir</p>
        </div>
      </div>

      <div class="wd-face-card wd-reveal wd-reveal-delay-2">
        <div class="wd-face-preview wd-face-preview--minimal">
          <div class="wd-face-mock wd-face-mock--minimal">
            <div class="wd-face-time" style="color:#1c1c1e;font-size:clamp(15px,3vw,24px);">10:09</div>
            <div class="wd-face-date" style="color:rgba(0,0,0,.35);font-size:8px;letter-spacing:.1em;">SALı</div>
          </div>
        </div>
        <div class="wd-face-info">
          <h4>Minimal</h4>
          <p>Sade · Şık · Odaklanma</p>
        </div>
      </div>

      <div class="wd-face-card wd-reveal wd-reveal-delay-3">
        <div class="wd-face-preview wd-face-preview--digital">
          <div class="wd-face-mock wd-face-mock--digital">
            <span class="wd-face-complication wd-face-complication--top wd-face-complication--blue">GPS ●</span>
            <div class="wd-face-time" style="font-size:clamp(13px,3vw,20px);letter-spacing:.04em;font-variant-numeric:tabular-nums;">10:09:34</div>
            <div class="wd-face-date" style="color:#0a84ff;font-size:8px;letter-spacing:.08em;">22°C ☁</div>
            <span class="wd-face-complication wd-face-complication--bottom wd-face-complication--blue">SpO2 98%</span>
          </div>
        </div>
        <div class="wd-face-info">
          <h4>Data Pro</h4>
          <p>GPS · Hava · SpO2</p>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ DESIGN SPLIT ═══════ --}}
<section class="wd-split" id="wd-design" data-wd-section="wd-design">
  <div class="wd-split-media" style="background:#e8e8ed; min-height:520px;">
    @if(file_exists(public_path('assets/s3-design.png')))
      <img src="{{ asset('assets/s3-design.png') }}" alt="S3 Pro tasarım" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#e8e8ed,#d8d8df);">
        <div style="width:140px;height:165px;background:#1c1c1e;border-radius:38px;display:flex;align-items:center;justify-content:center;box-shadow:0 24px 64px rgba(0,0,0,.25);">
          <div style="width:100px;height:100px;border-radius:28px;background:#2c2c2e;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:4px;">
            <span style="color:#ff3b30;font-size:10px;font-weight:600;letter-spacing:.08em">S3 PRO</span>
            <span style="color:#fff;font-size:20px;font-weight:500;letter-spacing:-.02em">10:09</span>
            <span style="color:rgba(255,255,255,.4);font-size:9px">SALı 22</span>
          </div>
        </div>
      </div>
    @endif
  </div>
  <div class="wd-split-copy wd-reveal" style="background:var(--bg-2);">
    <p class="wd-eyebrow">Tasarım</p>
    <h2>Alüminyum.<br/>Hafif. Dayanıklı.</h2>
    <p>Havacılık sınıfı alüminyum gövde, 1.96 inç AMOLED ekran ve değiştirilebilir kordon sistemi. İş toplantısından spor pistine kadar her ortama uyum sağlar.</p>
    <ul class="wd-feature-list">
      <li data-n="01">1.96 inç AMOLED · 410 × 502 px · 326 ppi</li>
      <li data-n="02">Havacılık sınıfı alüminyum gövde</li>
      <li data-n="03">Florüre kauçuk · silikon kordon dahil</li>
      <li data-n="04">Değiştirilebilir 22 mm kordon sistemi</li>
      <li data-n="05">5 ATM su direnci · yüzme uyumlu</li>
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ ACTIVITY BILLBOARD ══ --}}
<section class="wd-activity-billboard" id="wd-activity" data-wd-section="wd-activity">
  <div class="wd-activity-media">
    @if(file_exists(public_path('assets/s3-activity.png')))
      <img src="{{ asset('assets/s3-activity.png') }}" alt="S3 Pro aktivite takibi" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;background:linear-gradient(160deg,#0a1628 0%,#1a0a08 100%);display:flex;align-items:center;justify-content:center;">
        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="rgba(255,59,48,.4)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
      </div>
    @endif
  </div>
  <div class="wd-activity-content wd-reveal">
    <p class="wd-eyebrow" style="color:var(--watch-coral,#ff6b5b)">Aktivite & GPS</p>
    <h2>Koşuyor,<br/>izliyor,<br/>analiz ediyor.</h2>
    <p>Yerleşik GPS ile parkur haritanızı çizin. 100'den fazla spor modundan birini seçin. S3 Pro her adımı, her kaloriyi, her rakım değişimini kaydeder.</p>
    <div class="wd-activity-metrics">
      <div class="wd-activity-metric">
        <span class="wd-activity-metric-val">100+</span>
        <span class="wd-activity-metric-lbl">Spor Modu</span>
      </div>
      <div class="wd-activity-metric">
        <span class="wd-activity-metric-val">GPS</span>
        <span class="wd-activity-metric-lbl">+ GLONASS</span>
      </div>
      <div class="wd-activity-metric">
        <span class="wd-activity-metric-val">5 ATM</span>
        <span class="wd-activity-metric-lbl">Su Direnci</span>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ BATTERY SPLIT ═══════ --}}
<section class="wd-split wd-split--flip" style="background:var(--bg);">
  <div class="wd-split-media" style="background:#f2f2f7; min-height:480px;">
    @if(file_exists(public_path('assets/s3-side.png')))
      <img src="{{ asset('assets/s3-side.png') }}" alt="S3 Pro yan görünüm" loading="lazy" decoding="async" />
    @else
      <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#f2f2f7,#e5e5ea);">
        <div style="width:80px;height:200px;background:#1c1c1e;border-radius:28px;box-shadow:0 20px 56px rgba(0,0,0,.2);position:relative;">
          <div style="position:absolute;right:-8px;top:60px;width:6px;height:28px;background:#3a3a3c;border-radius:3px;"></div>
          <div style="position:absolute;bottom:24px;left:50%;transform:translateX(-50%);width:32px;height:4px;background:rgba(255,59,48,.8);border-radius:2px;box-shadow:0 0 8px rgba(255,59,48,.6);"></div>
        </div>
      </div>
    @endif
  </div>
  <div class="wd-split-copy wd-reveal" style="background:var(--bg);">
    <p class="wd-eyebrow">Batarya</p>
    <h2>14 gün.<br/>Şarj'ı<br/>unutun.</h2>
    <p>Gelişmiş düşük güç mimarisi sayesinde S3 Pro tek şarjla 14 güne kadar dayanır. GPS aktifken bile 30 saate kadar sürekli çalışır.</p>
    <ul class="wd-feature-list" style="margin-top:20px;">
      <li data-n="01">14 gün tipik kullanım</li>
      <li data-n="02">30 saat GPS modu</li>
      <li data-n="03">Manyetik hızlı şarj · 2 saatte tam dolu</li>
      <li data-n="04">Güç tasarrufu modunda 30 güne kadar</li>
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ FULL SPECS ════════ --}}
<section class="wd-specs-section" id="wd-specs" data-wd-section="wd-specs">
  <div class="wrap">
    <p class="wd-eyebrow wd-reveal">Teknik Özellikler</p>
    <h2 class="wd-reveal wd-reveal-delay-1">Her detay,<br/>burada.</h2>

    <div class="wd-specs-table">
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">Ekran</div>
        <div class="wd-spec-row-v">1.96 inç AMOLED<span class="wd-spec-row-sub">410 × 502 px · 326 ppi · Always-On</span></div>
      </div>
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">İşlemci</div>
        <div class="wd-spec-row-v">Dual-core akıllı saat SoC<span class="wd-spec-row-sub">Düşük güç + ana çekirdek</span></div>
      </div>
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">Batarya</div>
        <div class="wd-spec-row-v">500 mAh<span class="wd-spec-row-sub">14 gün tipik · 30 saat GPS · 2 sa. şarj</span></div>
      </div>
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">Sensörler</div>
        <div class="wd-spec-row-v">Kalp ritmi · SpO2 · İvme · Jiroskop<span class="wd-spec-row-sub">Barometre · Pusula · Sıcaklık</span></div>
      </div>
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">Konum</div>
        <div class="wd-spec-row-v">GPS + GLONASS + BeiDou<span class="wd-spec-row-sub">Galileo dahil çoklu uydu sistemi</span></div>
      </div>
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">Bağlantı</div>
        <div class="wd-spec-row-v">Bluetooth 5.3<span class="wd-spec-row-sub">Android 8+ / iOS 14+ uyumlu</span></div>
      </div>
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">Spor Modları</div>
        <div class="wd-spec-row-v">100'den fazla mod<span class="wd-spec-row-sub">Koşu · Yüzme · Bisiklet · Yoga · HIIT</span></div>
      </div>
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">Sağlık</div>
        <div class="wd-spec-row-v">24/7 kalp ritmi · Uyku takibi<span class="wd-spec-row-sub">Stres · SpO2 · VO₂Max · Döngü takibi</span></div>
      </div>
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">Su Direnci</div>
        <div class="wd-spec-row-v">5 ATM (50 metre)<span class="wd-spec-row-sub">Yüzme uyumlu · Su sporları</span></div>
      </div>
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">Gövde</div>
        <div class="wd-spec-row-v">Havacılık alüminyum · Mineral cam<span class="wd-spec-row-sub">46 mm · 39 g (kordon hariç)</span></div>
      </div>
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">Kordon</div>
        <div class="wd-spec-row-v">22 mm değiştirilebilir<span class="wd-spec-row-sub">Florüre kauçuk · silikon · naylon seçenek</span></div>
      </div>
      <div class="wd-spec-row">
        <div class="wd-spec-row-k">Renk</div>
        <div class="wd-spec-row-v">Uzay Grisi · Yıldız Işığı · Koral<span class="wd-spec-row-sub">Türkiye'de tasarlandı ve üretildi</span></div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ BUY ════════════════ --}}
<section class="wd-buy" id="wd-buy" data-wd-section="wd-buy">
  <div class="wrap wd-reveal">
    <p class="wd-eyebrow" style="justify-content:center">Satın Al</p>
    <h2>Sağlığınıza<br/>en iyi yatırım.</h2>
    <div class="wd-buy-price">
      <strong>₺2,499</strong>'dan başlayan fiyatlar · Türkiye geneli ücretsiz kargo
    </div>
    <div class="wd-buy-actions">
      <a href="#" class="btn btn-primary" style="font-size:16px; height:52px; padding:0 32px; background:var(--watch-red,#ff3b30); border-color:var(--watch-red,#ff3b30);">Şimdi Satın Al</a>
      <a href="#" class="btn btn-ghost" style="font-size:16px; height:52px; padding:0 32px;">Bayi Bul</a>
    </div>
    <p class="wd-buy-note">24 ay Türkiye garantisi · Ücretsiz kargo · Ücretsiz iade (30 gün)</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ FOOTER (shared) ══ --}}
<footer id="wd-support">
  <div class="wrap">
    <div class="foot-grid">
      <div class="foot-brand-col">
        <div class="brand" style="font-size:18px">
          <span class="brand-mark" aria-hidden="true"></span>
          <span>ovion</span>
        </div>
        <p class="foot-about">Ovion, günlük yaşamı kolaylaştıran akıllı cihazlar tasarlayan bir Türk elektroniği markasıdır. Tüm ürünler Türkiye'de üretilir.</p>
      </div>
      <div>
        <h4>Telefonlar</h4>
        <ul>
          <li><a href="{{ url('/telefonlar/v11-lite') }}">V11 Lite</a></li>
          <li><a href="#">V10 Pro</a></li>
          <li><a href="#">V9</a></li>
        </ul>
      </div>
      <div>
        <h4>Saatler &amp; Kulaklık</h4>
        <ul>
          <li><a href="{{ url('/saatler/s3-pro') }}">S3 Pro</a></li>
          <li><a href="#">S2</a></li>
          <li><a href="#">S1 Lite</a></li>
          <li><a href="#">H1 Pro Kulaklık</a></li>
        </ul>
      </div>
      <div>
        <h4>Aksesuarlar</h4>
        <ul>
          <li><a href="#">Kılıflar</a></li>
          <li><a href="#">Ekran Koruyucular</a></li>
          <li><a href="#">Şarj Adaptörleri</a></li>
          <li><a href="#">Kordonlar</a></li>
        </ul>
      </div>
      <div>
        <h4>Destek</h4>
        <ul>
          <li><a href="#">Teknik Destek</a></li>
          <li><a href="#">Servis Merkezleri</a></li>
          <li><a href="#">Garanti</a></li>
          <li><a href="#">Kullanım Kılavuzları</a></li>
        </ul>
      </div>
      <div>
        <h4>Kurumsal</h4>
        <ul>
          <li><a href="#">Hakkımızda</a></li>
          <li><a href="#">Kariyer</a></li>
          <li><a href="#">Basın</a></li>
        </ul>
      </div>
    </div>
    <div class="foot-bot">
      <div>© 2026 Ovion Elektronik A.Ş. — İstanbul, Türkiye</div>
      <div style="display:flex;gap:18px;">
        <a href="#">Gizlilik</a>
        <a href="#">Çerezler</a>
        <a href="#">Kullanım Şartları</a>
      </div>
    </div>
  </div>
</footer>

<script src="{{ asset('js/welcome.js') }}"></script>
<script src="{{ asset('js/watch-detail.js') }}"></script>
</body>
</html>
