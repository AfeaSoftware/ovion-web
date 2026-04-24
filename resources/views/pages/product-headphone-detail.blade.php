<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Ovion H1 Pro — ANC Kablosuz Kulak Üstü Kulaklık · 30 Saat Batarya</title>
<meta name="description" content="Ovion H1 Pro: Hibrit ANC, 40 mm Hi-Fi sürücüler, 30 saat batarya ve Bluetooth 5.3 multipoint. Sessizlik, müzik, özgürlük." />
<link rel="canonical" href="{{ url('/kulakliklar/h1-pro') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
<link rel="stylesheet" href="{{ asset('css/headphone-detail.css') }}" />
@if(file_exists(public_path('assets/h1-hero.png')))
<link rel="preload" as="image" href="{{ asset('assets/h1-hero.png') }}" fetchpriority="high" />
@endif
</head>
<body data-theme="dark">

@include('components.navbar')

{{-- ═══════════════════════════════════════ SUB-NAV ════════ --}}
<div class="hd-subnav" id="hd-subnav">
  <div class="wrap hd-subnav-inner">
    <ul class="hd-subnav-links">
      <li><a class="hd-subnav-link" href="#hd-hero">Genel Bakış</a></li>
      <li><a class="hd-subnav-link" href="#pd-anc">ANC</a></li>
      <li><a class="hd-subnav-link" href="#pd-sound">Ses</a></li>
      <li><a class="hd-subnav-link" href="#pd-design">Tasarım</a></li>
      <li><a class="hd-subnav-link" href="#pd-connectivity">Bağlantı</a></li>
      <li><a class="hd-subnav-link" href="#pd-specs">Teknik Özellikler</a></li>
    </ul>
    <a href="#pd-buy" class="hd-subnav-cta">
      ₺2,499'dan başlayan fiyatlarla
      <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</div>

{{-- ═══════════════════════════════════════ HERO ═══════════ --}}
<section class="hd-hero" id="hd-hero" data-pd-section="hd-hero">
  <div class="hd-hero-bg" aria-hidden="true"></div>

  <div class="hd-hero-content">
    <p class="hd-hero-eyebrow">Yeni — 2025</p>
    <h1>H1 Pro</h1>
    <p class="hd-hero-sub">Sessizlik. Müzik. Özgürlük.</p>
  </div>

  <div class="hd-hero-img">
    @if(file_exists(public_path('assets/h1-hero.png')))
      <img src="{{ asset('assets/h1-hero.png') }}"
           alt="Ovion H1 Pro kablosuz kulak üstü kulaklık"
           width="800" height="700"
           fetchpriority="high" decoding="async" />
    @else
      <div class="hd-hero-placeholder" aria-label="H1 Pro kulaklık görseli">
        <div class="hd-ph-band"></div>
        <div class="hd-ph-arm-l"></div>
        <div class="hd-ph-arm-r"></div>
        <div class="hd-ph-cup-l"></div>
        <div class="hd-ph-cup-r"></div>
      </div>
    @endif
  </div>

  <div class="hd-hero-bottom">
    <div class="hd-hero-actions">
      <a href="#pd-buy" class="btn-hd-primary">₺2,499'dan Satın Al</a>
      <a href="#pd-specs" class="btn btn-ghost" style="height:52px;padding:0 32px;font-size:16px;">Teknik Özellikler</a>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ SPEC STRIP ══════ --}}
<section class="hd-specs-strip" aria-label="Öne çıkan özellikler">
  <div class="wrap hd-specs-row">
    <div class="hd-spec-item hd-reveal">
      <span class="hd-spec-val">30 <span style="font-size:.55em;color:var(--muted);font-weight:400;">saat</span></span>
      <span class="hd-spec-lbl">Batarya (ANC Açık)</span>
    </div>
    <div class="hd-spec-item hd-reveal hd-reveal-delay-1">
      <span class="hd-spec-val">40 <span style="font-size:.55em;color:var(--muted);font-weight:400;">mm</span></span>
      <span class="hd-spec-lbl">Hi-Fi Sürücü</span>
    </div>
    <div class="hd-spec-item hd-reveal hd-reveal-delay-2">
      <span class="hd-spec-val hd-spec-val--blue">ANC</span>
      <span class="hd-spec-lbl">–38 dB Azaltma</span>
    </div>
    <div class="hd-spec-item hd-reveal hd-reveal-delay-2">
      <span class="hd-spec-val">3</span>
      <span class="hd-spec-lbl">Mikrofon Sistemi</span>
    </div>
    <div class="hd-spec-item hd-reveal hd-reveal-delay-3">
      <span class="hd-spec-val hd-spec-val--blue">BT 5.3</span>
      <span class="hd-spec-lbl">Multipoint</span>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ ANC BILLBOARD ═══ --}}
<section class="hd-billboard" id="pd-anc" data-pd-section="pd-anc">
  <div class="hd-billboard-media">
    @if(file_exists(public_path('assets/h1-anc.png')))
      <img src="{{ asset('assets/h1-anc.png') }}"
           alt="H1 Pro ANC ortam görseli"
           loading="lazy" decoding="async"
           width="1600" height="900" />
    @else
      <div class="hd-billboard-placeholder">
        <div class="hd-billboard-placeholder-inner" aria-hidden="true">ANC</div>
      </div>
    @endif
  </div>
  <div class="hd-billboard-overlay" aria-hidden="true"></div>
  <div class="hd-billboard-content hd-reveal">
    <p class="eyebrow" style="color:rgba(10,132,255,.9)">Aktif Gürültü Engelleme</p>
    <h2>Dünyanın gürültüsünü<br/>kapat.</h2>
    <p>Hibrit ANC teknolojisi, çevrenizi gerçek zamanlı analiz ederek –38 dB'e kadar gürültü azaltma sağlar. Uçakta, metroda, ofiste — tam sessizlik.</p>
  </div>
</section>

{{-- ═══════════════════════════════════════ ANC FEATURES ════ --}}
<section class="hd-cards-section" id="pd-anc-features" data-pd-section="pd-anc">
  <div class="wrap">
    <p class="eyebrow hd-reveal">Gürültü Engelleme Sistemi</p>
    <h2 class="hd-reveal hd-reveal-delay-1">Üç katmanlı<br/>sessizlik teknolojisi.</h2>

    <div class="hd-cards-grid">

      <div class="hd-card hd-reveal">
        <div class="hd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>
        </div>
        <div class="hd-card-num">–38 <span>dB</span></div>
        <h3>Hibrit ANC</h3>
        <p>3 mikrofon sistemi, kulak içi ve kulak dışı sesi eş zamanlı analiz ederek –38 dB gürültü azaltma sağlar. Uçak motoru, metro gürültüsü, ofis kalabalığı — hepsi sessizliğe döner.</p>
      </div>

      <div class="hd-card hd-reveal hd-reveal-delay-1">
        <div class="hd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
        </div>
        <h3>Çevre Sesi Modu</h3>
        <p>Havalimanı anonsları, trafik uyarıları veya bir konuşmayı kaçırmak istemiyorsanız Çevre Sesi Modu çevrenizle bağlantıda kalmanızı sağlar. Kulaklığı çıkarmaya gerek yok.</p>
      </div>

      <div class="hd-card hd-reveal hd-reveal-delay-2">
        <div class="hd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
        <h3>Adaptif ANC</h3>
        <p>Ortamı sürekli dinleyen yapay zekâ algoritması, ANC seviyesini otomatik olarak ayarlar. Sakin bir kafede hafif, kalabalık bir metroda maksimum koruma — sizin müdahalenize gerek yok.</p>
      </div>

    </div>

    {{-- ANC Slider --}}
    <div class="hd-anc-slider-section" style="margin-top:clamp(48px,6vw,80px);border-radius:calc(var(--radius)*1.4);border:1px solid var(--line-2);">
      <div class="hd-anc-slider-inner">
        <h3>Gürültü azaltmayı<br/>hissedin.</h3>
        <p>Kaydırıcıyı hareket ettirerek H1 Pro'nun ANC kapasitesini keşfedin.</p>
        <div>
          <div class="hd-anc-slider-label">Gürültü azaltma seviyesi</div>
          <div class="hd-anc-display" id="hd-anc-display" aria-live="polite">
            <span class="hd-anc-num" id="hd-anc-value">38</span><span> dB</span>
          </div>
          <input
            type="range"
            class="hd-anc-range"
            id="hd-anc-range"
            min="0"
            max="38"
            value="38"
            step="0.5"
            aria-label="ANC gürültü azaltma seviyesi"
            style="--pct:100%"
          />
        </div>
        <p class="hd-anc-caption" id="hd-anc-caption">Maksimum — –38 dB tam gürültü engelleme.</p>
      </div>
    </div>

  </div>
</section>

{{-- ═══════════════════════════════════════ SOUND SPLIT ══════ --}}
<section class="hd-split" id="pd-sound" data-pd-section="pd-sound">
  <div class="hd-split-media">
    @if(file_exists(public_path('assets/h1-sound.png')))
      <img src="{{ asset('assets/h1-sound.png') }}"
           alt="H1 Pro sürücü yakın çekim"
           loading="lazy" decoding="async"
           width="900" height="900" />
    @else
      <div class="hd-split-placeholder">
        <div class="hd-split-ph-headphone" aria-hidden="true">
          <div class="ph-band"></div>
          <div class="ph-arm-l"></div>
          <div class="ph-arm-r"></div>
          <div class="ph-cup-l"></div>
          <div class="ph-cup-r"></div>
        </div>
      </div>
    @endif
  </div>
  <div class="hd-split-copy hd-reveal">
    <p class="eyebrow">Ses Kalitesi</p>
    <h2>Stüdyo kalitesi<br/>kulağınızda.</h2>
    <p>40 mm özel Hi-Fi sürücüler, 20 Hz – 20 kHz tam frekans aralığında kusursuz ses yeniden üretimi sağlar. LDAC ve aptX HD codec desteğiyle kayıpsız kablosuz ses.</p>
    <ul class="hd-feature-list">
      <li data-n="01">40 mm özel dinamik sürücü</li>
      <li data-n="02">20 Hz – 20 kHz frekans yanıtı</li>
      <li data-n="03">LDAC · aptX HD · AAC · SBC codec</li>
      <li data-n="04">32 Ω empedans · 103 dB/mW hassasiyet</li>
    </ul>
  </div>
</section>

{{-- ═══════════════════════════════════════ DESIGN SPLIT ═════ --}}
<section class="hd-split hd-split--flip" id="pd-design" data-pd-section="pd-design" style="background:var(--bg-2);">
  <div class="hd-split-copy hd-reveal" style="background:var(--bg-2);">
    <p class="eyebrow">Tasarım</p>
    <h2>Taşınmak için<br/>tasarlandı.</h2>
    <p>Katlanabilir tasarımı sayesinde çantanıza sığar, 285 g ağırlığıyla saatlerce konforla taşınır. Bellek köpüğü kulak yastıkları, uzun dinleme seanslarında kulağınızı rahat tutar.</p>
    <ul class="hd-feature-list">
      <li data-n="01">Katlanabilir tasarım — seyahat dostu</li>
      <li data-n="02">285 g hafif gövde</li>
      <li data-n="03">Bellek köpüğü kulak yastıkları</li>
      <li data-n="04">Ayarlanabilir alüminyum kafa bandı</li>
    </ul>
  </div>
  <div class="hd-split-media">
    @if(file_exists(public_path('assets/h1-design.png')))
      <img src="{{ asset('assets/h1-design.png') }}"
           alt="H1 Pro katlanmış tasarım"
           loading="lazy" decoding="async"
           width="900" height="900" />
    @else
      <div class="hd-split-placeholder">
        <div class="hd-split-ph-headphone" aria-hidden="true">
          <div class="ph-band"></div>
          <div class="ph-arm-l"></div>
          <div class="ph-arm-r"></div>
          <div class="ph-cup-l"></div>
          <div class="ph-cup-r"></div>
        </div>
      </div>
    @endif
  </div>
</section>

{{-- ═══════════════════════════════════════ BATTERY BILLBOARD ══ --}}
<section class="hd-battery-billboard" id="pd-battery" data-pd-section="pd-battery">
  <div class="hd-battery-billboard-inner">
    <p class="eyebrow hd-reveal" style="color:var(--hd-teal);justify-content:center;">Batarya</p>
    <h2 class="hd-reveal hd-reveal-delay-1">30 saat<br/>kesintisiz müzik.</h2>
    <p class="hd-reveal hd-reveal-delay-2" style="color:rgba(255,255,255,.65);max-width:40ch;margin:0 auto;font-size:clamp(15px,1.3vw,18px);">
      ANC açık olsa bile 30 saat çalma süresi sunar. ANC'yi kapattığınızda 40 saate ulaşır. Sabah kahveniz hazırlanırken 10 dakika şarjla 3 saatlik müzik.
    </p>
    <div class="hd-battery-stats hd-reveal hd-reveal-delay-3">
      <div class="hd-battery-stat">
        <span class="hd-battery-stat-val">30 saat</span>
        <span class="hd-battery-stat-lbl">ANC Açık</span>
      </div>
      <div class="hd-battery-stat">
        <span class="hd-battery-stat-val">40 saat</span>
        <span class="hd-battery-stat-lbl">ANC Kapalı</span>
      </div>
      <div class="hd-battery-stat">
        <span class="hd-battery-stat-val">3 saat</span>
        <span class="hd-battery-stat-lbl">10 dk Şarjla</span>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ CONNECTIVITY CARDS ══ --}}
<section class="hd-cards-section" id="pd-connectivity" data-pd-section="pd-connectivity" style="background:var(--bg);">
  <div class="wrap">
    <p class="eyebrow hd-reveal">Bağlantı</p>
    <h2 class="hd-reveal hd-reveal-delay-1">Her cihaza,<br/>her anda bağlı.</h2>

    <div class="hd-cards-grid">

      <div class="hd-card hd-reveal">
        <div class="hd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 6l4-4 4 4M8 18l4 4 4-4M4 12h16"/><circle cx="5" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>
        </div>
        <div class="hd-card-num">2 <span>cihaz</span></div>
        <h3>Bluetooth 5.3 Multipoint</h3>
        <p>Telefon ve bilgisayarınıza aynı anda bağlı kalın. Toplantıya giren çağrıyı bilgisayardan telefona anında aktarın — kesinti yok, kapatma yok.</p>
      </div>

      <div class="hd-card hd-reveal hd-reveal-delay-1">
        <div class="hd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 18H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3.19M15 6h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3.19"/><line x1="23" y1="13" x2="23" y2="11"/><polyline points="11 6 7 12 13 12 9 18"/></svg>
        </div>
        <h3>USB-C + 3.5 mm</h3>
        <p>USB-C ile hızlı şarj ve kablolu dinleme. 3.5 mm jack bağlantısıyla uçakta veya pili biten cihazlarda kablo üzerinden kayıpsız ses deneyimi yaşayın.</p>
      </div>

      <div class="hd-card hd-reveal hd-reveal-delay-2">
        <div class="hd-card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        </div>
        <h3>Touch Kontrol</h3>
        <p>Sağ kulak kupasındaki dokunmatik yüzey; müzik oynatma/duraklatma, ses seviyesi, ANC modu ve aramaları telefona dokunmadan yönetmenizi sağlar.</p>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ FULL SPECS ═══════ --}}
<section class="hd-specs-section" id="pd-specs" data-pd-section="pd-specs">
  <div class="wrap">
    <p class="eyebrow hd-reveal">Teknik Özellikler</p>
    <h2 class="hd-reveal hd-reveal-delay-1">Her detayı<br/>burada bulursunuz.</h2>

    <div class="hd-specs-table">

      <div class="hd-spec-row">
        <div class="hd-spec-row-k">Sürücü</div>
        <div class="hd-spec-row-v">40 mm Dinamik Hi-Fi<span class="hd-spec-row-sub">Özel diyafram · Neodimyum mıknatıs</span></div>
      </div>

      <div class="hd-spec-row">
        <div class="hd-spec-row-k">Frekans</div>
        <div class="hd-spec-row-v">20 Hz – 20.000 Hz<span class="hd-spec-row-sub">Tam işitme aralığı</span></div>
      </div>

      <div class="hd-spec-row">
        <div class="hd-spec-row-k">Empedans</div>
        <div class="hd-spec-row-v">32 Ω<span class="hd-spec-row-sub">103 dB/mW hassasiyet</span></div>
      </div>

      <div class="hd-spec-row">
        <div class="hd-spec-row-k">Batarya</div>
        <div class="hd-spec-row-v">30 saat (ANC açık) · 40 saat (ANC kapalı)<span class="hd-spec-row-sub">10 dk şarj = 3 saat · USB-C</span></div>
      </div>

      <div class="hd-spec-row">
        <div class="hd-spec-row-k">ANC</div>
        <div class="hd-spec-row-v">Hibrit Aktif Gürültü Engelleme<span class="hd-spec-row-sub">–38 dB · Adaptif mod · Çevre sesi modu</span></div>
      </div>

      <div class="hd-spec-row">
        <div class="hd-spec-row-k">Bluetooth</div>
        <div class="hd-spec-row-v">5.3 · Multipoint (2 cihaz)<span class="hd-spec-row-sub">10 m menzil</span></div>
      </div>

      <div class="hd-spec-row">
        <div class="hd-spec-row-k">Codec</div>
        <div class="hd-spec-row-v">LDAC · aptX HD · AAC · SBC<span class="hd-spec-row-sub">Kayıpsız kablosuz ses</span></div>
      </div>

      <div class="hd-spec-row">
        <div class="hd-spec-row-k">Ağırlık</div>
        <div class="hd-spec-row-v">285 g<span class="hd-spec-row-sub">Katlanabilir tasarım</span></div>
      </div>

      <div class="hd-spec-row">
        <div class="hd-spec-row-k">Bağlantı</div>
        <div class="hd-spec-row-v">USB-C · 3.5 mm stereo jack<span class="hd-spec-row-sub">Kablolu mod desteği</span></div>
      </div>

      <div class="hd-spec-row">
        <div class="hd-spec-row-k">Garanti</div>
        <div class="hd-spec-row-v">24 ay Türkiye Garantisi<span class="hd-spec-row-sub">Türkiye'de tasarlandı</span></div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════ BUY ══════════════ --}}
<section class="hd-buy" id="pd-buy" data-pd-section="pd-buy">
  <div class="wrap hd-reveal">
    <p class="eyebrow" style="justify-content:center;">Satın Al</p>
    <h2>Şimdi<br/>Sahip Ol.</h2>
    <div class="hd-buy-price">
      <strong>₺2,499</strong> · Türkiye geneli ücretsiz kargo
    </div>
    <div class="hd-buy-actions">
      <a href="#" class="btn-hd-primary">Satın Al</a>
      <a href="#" class="btn btn-ghost" style="height:52px;padding:0 32px;font-size:16px;">Bayi Bul</a>
    </div>
    <p class="hd-buy-note">24 ay Türkiye garantisi · Ücretsiz kargo · Ücretsiz iade (30 gün)</p>
  </div>
</section>

@include('components.footer')

<script src="{{ asset('js/welcome.js') }}"></script>
<script src="{{ asset('js/headphone-detail.js') }}"></script>
</body>
</html>
