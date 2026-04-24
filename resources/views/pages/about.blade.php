@extends('main')

@section('title', 'Hakkımızda — Ovion Elektronik')
@section('description', 'Ovion, günlük yaşamı kolaylaştıran akıllı cihazlar tasarlayan bir Türk elektroniği markasıdır. İstanbul\'da tasarlanır, Türkiye\'de üretilir.')
@section('canonical', url('/hakkimizda'))
@section('theme', 'dark')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endpush

@section('content')

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

@endsection

@push('scripts')
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
@endpush
