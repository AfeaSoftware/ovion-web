<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Hakkımızda — Ovion Elektronik</title>
<meta name="description" content="Ovion, günlük yaşamı kolaylaştıran akıllı cihazlar tasarlayan bir Türk elektroniği markasıdır. İstanbul'da tasarlanır, Türkiye'de üretilir." />
<link rel="canonical" href="{{ url('/hakkimizda') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
<style>
/* ── About hero ── */
.ab-hero {
  min-height: 92svh;
  display: flex; flex-direction: column; justify-content: flex-end;
  padding: clamp(80px, 12vw, 160px) 0 clamp(56px, 8vw, 96px);
  position: relative; overflow: hidden;
  background: var(--bg);
}
.ab-hero-bg {
  position: absolute; inset: 0; z-index: 0;
  background:
    radial-gradient(ellipse 60% 50% at 75% 40%, color-mix(in oklab, var(--accent) 10%, transparent), transparent 70%),
    radial-gradient(ellipse 80% 40% at 20% 80%, color-mix(in oklab, var(--ink) 5%, transparent), transparent 60%);
}
.ab-hero .wrap { position: relative; z-index: 1; }
.ab-hero h1 {
  font-size: clamp(52px, 9vw, 136px);
  line-height: 0.93; letter-spacing: -0.04em; font-weight: 500;
  margin: 18px 0 28px;
}
.ab-hero h1 em { font-style: normal; color: var(--accent-ink); }
.ab-hero-lede {
  font-size: clamp(16px, 1.4vw, 20px);
  color: var(--ink-2); max-width: 52ch; line-height: 1.55;
}

/* ── Divider rule ── */
.ab-rule {
  border: none; border-top: 1px solid var(--line);
  margin: 0;
}

/* ── Story split ── */
.ab-story {
  display: grid; grid-template-columns: 1fr 1.6fr;
  min-height: 560px;
  border-bottom: 1px solid var(--line);
}
@media (max-width: 860px) { .ab-story { grid-template-columns: 1fr; } }
.ab-story-year {
  background: var(--bg-2);
  border-right: 1px solid var(--line);
  display: flex; flex-direction: column; justify-content: flex-end;
  padding: clamp(40px, 6vw, 80px);
}
@media (max-width: 860px) {
  .ab-story-year { border-right: none; border-bottom: 1px solid var(--line); min-height: 220px; }
}
.ab-story-year-num {
  font-size: clamp(80px, 14vw, 200px); font-weight: 500;
  letter-spacing: -0.05em; line-height: 0.85;
  color: var(--ink);
}
.ab-story-year-lbl {
  font-size: 13px; color: var(--muted); letter-spacing: 0.1em;
  text-transform: uppercase; margin-top: 10px;
}
.ab-story-copy {
  display: flex; flex-direction: column; justify-content: center;
  padding: clamp(40px, 6vw, 96px) clamp(32px, 5vw, 80px);
  gap: 20px;
}
.ab-story-copy h2 {
  font-size: clamp(28px, 3.5vw, 52px);
  letter-spacing: -0.03em; line-height: 1.04;
}
.ab-story-copy p {
  font-size: clamp(15px, 1.1vw, 18px);
  color: var(--ink-2); max-width: 52ch; line-height: 1.65;
}

/* ── Values section ── */
.ab-values-grid {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 1px; background: var(--line);
  border: 1px solid var(--line);
  border-radius: var(--radius); overflow: hidden;
  margin-top: clamp(40px, 6vw, 72px);
}
@media (max-width: 720px) { .ab-values-grid { grid-template-columns: 1fr; } }
.ab-value {
  background: var(--card);
  padding: clamp(28px, 4vw, 48px);
  display: flex; flex-direction: column; gap: 16px;
}
.ab-value-icon {
  width: 48px; height: 48px; border-radius: 14px;
  background: color-mix(in oklab, var(--accent) 14%, var(--bg));
  display: grid; place-items: center;
  color: var(--accent-ink);
}
.ab-value h3 {
  font-size: clamp(18px, 1.5vw, 22px); font-weight: 500;
  letter-spacing: -0.02em;
}
.ab-value p { font-size: 14.5px; color: var(--muted); line-height: 1.65; margin: 0; }

/* ── Made in Turkey billboard ── */
.ab-made {
  background: var(--ink); color: var(--bg);
  padding: clamp(72px, 11vw, 160px) 0;
  position: relative; overflow: hidden;
}
.ab-made::before {
  content: "";
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 70% 60% at 30% 50%, color-mix(in oklab, var(--accent) 8%, transparent), transparent 65%);
  pointer-events: none;
}
.ab-made .wrap { position: relative; z-index: 1; }
.ab-made h2 {
  font-size: clamp(40px, 7vw, 110px);
  letter-spacing: -0.04em; line-height: 0.93;
  color: var(--bg);
  max-width: 16ch;
}
.ab-made h2 em { font-style: normal; opacity: 0.38; }
.ab-made-sub {
  margin-top: clamp(24px, 3vw, 40px);
  font-size: clamp(15px, 1.2vw, 18px);
  color: color-mix(in oklab, var(--bg) 65%, transparent);
  max-width: 50ch; line-height: 1.65;
}

/* ── Timeline ── */
.ab-timeline {
  display: flex; flex-direction: column;
  margin-top: clamp(40px, 6vw, 72px);
  position: relative;
}
.ab-timeline::before {
  content: "";
  position: absolute; left: 0; top: 8px; bottom: 8px;
  width: 1px; background: var(--line);
}
@media (max-width: 600px) { .ab-timeline::before { display: none; } }
.ab-tl-item {
  display: grid; grid-template-columns: 160px 1fr;
  gap: 24px 40px;
  padding: 28px 0 28px 40px;
  border-bottom: 1px solid var(--line-2);
  position: relative;
}
@media (max-width: 600px) {
  .ab-tl-item { grid-template-columns: 1fr; padding-left: 0; }
}
.ab-tl-item::before {
  content: "";
  position: absolute; left: -4px; top: 36px;
  width: 8px; height: 8px; border-radius: 50%;
  background: var(--accent);
}
@media (max-width: 600px) { .ab-tl-item::before { display: none; } }
.ab-tl-item:last-child { border-bottom: none; }
.ab-tl-year {
  font-size: 13px; font-weight: 600; letter-spacing: 0.1em;
  text-transform: uppercase; color: var(--accent-ink);
  padding-top: 3px;
}
.ab-tl-copy h4 {
  font-size: clamp(17px, 1.4vw, 21px); font-weight: 500;
  letter-spacing: -0.02em; margin-bottom: 6px;
}
.ab-tl-copy p { font-size: 14.5px; color: var(--muted); line-height: 1.6; margin: 0; max-width: 54ch; }

/* ── CTA section ── */
.ab-cta {
  text-align: center;
  padding: clamp(80px, 12vw, 160px) 0;
  background: var(--bg);
  position: relative; overflow: hidden;
}
.ab-cta::before {
  content: "";
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 70% 55% at 50% 100%, color-mix(in oklab, var(--accent) 10%, transparent), transparent 65%);
  pointer-events: none;
}
.ab-cta .wrap { position: relative; z-index: 1; }
.ab-cta h2 {
  font-size: clamp(36px, 5vw, 76px);
  letter-spacing: -0.04em; line-height: 0.96; margin-bottom: 16px;
}
.ab-cta p {
  font-size: clamp(15px, 1.2vw, 18px); color: var(--ink-2);
  max-width: 44ch; margin: 0 auto 36px;
}

/* ── Reveal animations ── */
.ab-reveal {
  opacity: 0; transform: translateY(24px);
  transition: opacity .7s var(--ease), transform .7s var(--ease);
}
.ab-reveal.is-in { opacity: 1; transform: none; }
.ab-reveal-d1 { transition-delay: .1s; }
.ab-reveal-d2 { transition-delay: .2s; }
.ab-reveal-d3 { transition-delay: .3s; }

/* ── Mobile ── */
@media (max-width: 560px) {
  .ab-cta .hero-cta { flex-direction: column; padding: 0 var(--gutter); }
  .ab-cta .hero-cta .btn { width: 100%; }
}
</style>
</head>
<body data-theme="dark">

@include('components.navbar')

{{-- ════════════════════ HERO ════════════════════ --}}
<section class="ab-hero">
  <div class="ab-hero-bg" aria-hidden="true"></div>
  <div class="wrap">
    <p class="eyebrow">Hakkımızda</p>
    <h1>İstanbul'dan<br/>dünyaya<br/><em>teknoloji.</em></h1>
    <p class="ab-hero-lede">Ovion, insanların günlük hayatını kolaylaştıran akıllı cihazlar tasarlamak için 2023'te kuruldu. Her ürün İstanbul'da tasarlanır, Türkiye'de üretilir.</p>
  </div>
</section>

{{-- ════════════════════ STAT STRIP ════════════════════ --}}
<section class="stat-strip" aria-label="Ovion rakamları">
  <div class="wrap stat-row stagger">
    <div class="stat" style="--i:0">
      <span class="stat-num">2023</span>
      <span class="stat-lbl">Kuruluş yılı</span>
    </div>
    <div class="stat" style="--i:1">
      <span class="stat-num" data-count="200" data-suffix="+">200+</span>
      <span class="stat-lbl">Çalışan</span>
    </div>
    <div class="stat" style="--i:2">
      <span class="stat-num">5</span>
      <span class="stat-lbl">Ürün ailesi</span>
    </div>
    <div class="stat" style="--i:3">
      <span class="stat-num">81</span>
      <span class="stat-lbl">İlde servis ağı</span>
    </div>
  </div>
</section>

{{-- ════════════════════ HIKAYE ════════════════════ --}}
<div class="ab-story">
  <div class="ab-story-year ab-reveal">
    <div class="ab-story-year-num">2023</div>
    <div class="ab-story-year-lbl">Kuruluş — İstanbul</div>
  </div>
  <div class="ab-story-copy ab-reveal ab-reveal-d1">
    <p class="eyebrow">Hikayemiz</p>
    <h2>Türkiye'nin kendi<br/>teknoloji markası<br/>olmalıydı.</h2>
    <p>Ovion, "neden Türkiye'de tasarlanmış, Türkiye'de üretilmiş bir akıllı cihaz markası yok?" sorusundan doğdu. İstanbul'un merkezinde bir araya gelen küçük bir mühendis ve tasarımcı ekibi, bu soruyu cevaplamak için kolları sıvadı.</p>
    <p>İlk ürünümüz V11 Lite, sadece bir telefon değil; yerli üretim ile modern tasarımın bir arada olabileceğinin kanıtıdır. Piyasaya çıktığı günden itibaren aldığı ilgi, bize daha fazlasını yapma güvenini verdi.</p>
  </div>
</div>

{{-- ════════════════════ DEĞERLER ════════════════════ --}}
<section class="section" style="background: var(--bg-2);">
  <div class="wrap">
    <p class="eyebrow ab-reveal">Değerlerimiz</p>
    <h2 class="ab-reveal ab-reveal-d1" style="font-size: clamp(30px, 4vw, 56px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px; margin-bottom: 0; max-width: 24ch;">Tasarladığımız her üründe<br/>üç ilkeyi ön planda tutarız.</h2>
    <div class="ab-values-grid" style="margin-top: clamp(40px, 6vw, 72px);">

      <div class="ab-value ab-reveal">
        <div class="ab-value-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </div>
        <h3>Kalite</h3>
        <p>Bütçe dostu fiyat, ödün verilen kalite anlamına gelmez. Her V11 Lite, üretimden çıkmadan 120 noktalı kalite testinden geçer.</p>
      </div>

      <div class="ab-value ab-reveal ab-reveal-d1">
        <div class="ab-value-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        </div>
        <h3>Erişilebilirlik</h3>
        <p>İyi teknoloji, herkesin hayatına girmelidir. Ürünlerimizi Türkiye'nin 81 ilinde servis ağı ve rekabetçi fiyatlarla sunuyoruz.</p>
      </div>

      <div class="ab-value ab-reveal ab-reveal-d2">
        <div class="ab-value-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
        </div>
        <h3>İnovasyon</h3>
        <p>İstanbul tasarım merkezimizde 80'den fazla AR-GE uzmanı, yarının ürünlerini bugün geliştiriyor. Patentli sensör ve kamera teknolojileri üzerinde çalışıyoruz.</p>
      </div>

    </div>
  </div>
</section>

{{-- ════════════════════ MADE IN TURKEY ════════════════════ --}}
<section class="ab-made">
  <div class="wrap">
    <p class="eyebrow" style="color: color-mix(in oklab, var(--bg) 60%, transparent);">Üretim</p>
    <h2 class="ab-reveal">Türkiye'de<br/>tasarlandı.<br/><em>Türkiye'de</em><br/>üretildi.</h2>
    <p class="ab-made-sub ab-reveal ab-reveal-d1">Fabrikamız, Anadolu Yakası'nda 22.000 m² kapalı alanda faaliyet gösteriyor. Montaj, test ve paketleme süreçlerinin tamamı Türkiye'de gerçekleştiriliyor. Bu, sadece bir sertifika değil; çalıştığımız 4.000'den fazla yerel tedarikçiyle verdiğimiz bir sözdür.</p>
  </div>
</section>

{{-- ════════════════════ TİMLİNE ════════════════════ --}}
<section class="section">
  <div class="wrap">
    <p class="eyebrow ab-reveal">Kilometre Taşları</p>
    <h2 class="ab-reveal ab-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px; max-width: 22ch;">Kısa sürede çok şeyi<br/>başardık.</h2>

    <div class="ab-timeline">

      <div class="ab-tl-item ab-reveal">
        <div class="ab-tl-year">Oca 2023</div>
        <div class="ab-tl-copy">
          <h4>Ovion kuruldu</h4>
          <p>7 kurucu ortak, İstanbul Teknopark'ta Ovion'u resmen kurdu. İlk ofis: 120 m², ilk ekip: 12 kişi.</p>
        </div>
      </div>

      <div class="ab-tl-item ab-reveal">
        <div class="ab-tl-year">Haz 2023</div>
        <div class="ab-tl-copy">
          <h4>İlk üretim tesisi devreye girdi</h4>
          <p>Pendik'teki fabrika, pilot üretim hattıyla faaliyete geçti. Aynı ay Sanayi Bakanlığı'ndan yerli üretim sertifikası alındı.</p>
        </div>
      </div>

      <div class="ab-tl-item ab-reveal">
        <div class="ab-tl-year">Mar 2024</div>
        <div class="ab-tl-copy">
          <h4>V11 Lite piyasaya çıktı</h4>
          <p>İlk ürünümüz V11 Lite, lansman gününde 10.000'den fazla ön sipariş aldı. Ulusal basında geniş yer buldu.</p>
        </div>
      </div>

      <div class="ab-tl-item ab-reveal">
        <div class="ab-tl-year">Eyl 2024</div>
        <div class="ab-tl-copy">
          <h4>Saat ve kulaklık AR-GE başladı</h4>
          <p>Wearable ürün ailesi için AR-GE yatırımı resmileşti. S serisi saat ve H serisi kulaklık projeleri başladı.</p>
        </div>
      </div>

      <div class="ab-tl-item ab-reveal">
        <div class="ab-tl-year">Oca 2025</div>
        <div class="ab-tl-copy">
          <h4>S3 Pro saat tanıtıldı</h4>
          <p>AMOLED ekran, GPS ve 14 günlük pil ömrüyle S3 Pro, Türkiye'nin en kapsamlı yerli akıllı saati oldu.</p>
        </div>
      </div>

      <div class="ab-tl-item ab-reveal">
        <div class="ab-tl-year">2026</div>
        <div class="ab-tl-copy">
          <h4>Genişleme — Orta Asya ve MENA</h4>
          <p>Kazakistan, Azerbaycan ve BAE dağıtım anlaşmalarıyla Ovion, sınırlarımızın ötesine taşınıyor.</p>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ════════════════════ CTA ════════════════════ --}}
<section class="ab-cta">
  <div class="wrap">
    <p class="eyebrow" style="justify-content: center;">Birlikte büyüyelim</p>
    <h2 class="ab-reveal">Ovion ailesine<br/>katılmak ister misin?</h2>
    <p class="ab-reveal ab-reveal-d1">Mühendis, tasarımcı, pazarlamacı ya da satış uzmanı — doğru kişiyi her zaman arıyoruz.</p>
    <div class="hero-cta" style="justify-content: center;" class="ab-reveal ab-reveal-d2">
      <a href="#" class="btn btn-primary" style="font-size: 15px; height: 50px; padding: 0 28px;">Açık Pozisyonlar</a>
      <a href="{{ url('/') }}" class="btn btn-ghost" style="font-size: 15px; height: 50px; padding: 0 28px;">Ürünleri Keşfet</a>
    </div>
  </div>
</section>

@include('components.footer')

<script src="{{ asset('js/welcome.js') }}"></script>
<script>
(function () {
  const els = document.querySelectorAll('.ab-reveal');
  if (!els.length) return;
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } });
  }, { threshold: 0.1 });
  els.forEach(el => io.observe(el));
})();
</script>
</body>
</html>
