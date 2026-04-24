@extends('main')

@section('title', 'Destek — Ovion')
@section('description', 'Ovion ürünleri için garanti sorgulama, servis talebi, kullanım kılavuzları ve teknik destek.')
@section('canonical', url('/destek'))
@section('theme', 'dark')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/destek.css') }}" />
@endpush

@section('content')

{{-- ════════════════════ HERO ════════════════════ --}}
<section class="sp-hero">
  <div class="wrap">
    <p class="eyebrow" style="justify-content:center;">Destek</p>
    <h1>Nasıl yardımcı<br/>olabiliriz?</h1>
    <p class="sp-hero-sub">Garanti sorgulama, servis talebi, kılavuz veya teknik destek — doğru yere geldiniz.</p>

    <div class="sp-search-wrap">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
      <input type="search" placeholder="Konu ara: garanti, şarj, ekran..." />
      <button class="sp-search-btn" type="button">Ara</button>
    </div>
    <div class="sp-search-hint">
      <span>Popüler:</span>
      <button type="button">Batarya sorunu</button>
      <button type="button">Ekran kırığı</button>
      <button type="button">Garanti süresi</button>
      <button type="button">Yazılım güncelleme</button>
    </div>
  </div>
</section>

{{-- ════════════════════ HIZLI ERİŞİM ════════════════════ --}}
<section class="section" style="background: var(--bg-2); padding-top: clamp(48px, 7vw, 96px); padding-bottom: clamp(48px, 7vw, 96px);">
  <div class="wrap">
    <p class="eyebrow sp-reveal">Hızlı Erişim</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(26px, 3vw, 40px); letter-spacing: -0.03em; margin-top: 8px;">Ne yapmak istiyorsunuz?</h2>

    <div class="sp-actions-grid">

      <a href="#garanti" class="sp-action sp-reveal">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3>Garanti Sorgula</h3>
        <p>Seri numaranızla garanti durumunuzu anında öğrenin.</p>
        <div class="sp-action-arrow">Sorgula <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

      <a href="#servis" class="sp-action sp-reveal sp-reveal-d1">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
        </div>
        <h3>Servis Talebi Oluştur</h3>
        <p>Cihazınız için yetkili servis randevusu alın.</p>
        <div class="sp-action-arrow">Talep Oluştur <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

      <a href="#kilavuz" class="sp-action sp-reveal sp-reveal-d2">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
        </div>
        <h3>Kullanım Kılavuzları</h3>
        <p>V11 Lite, S3 Pro ve tüm ürünler için PDF kılavuzlar.</p>
        <div class="sp-action-arrow">İndir <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

      <a href="#faq" class="sp-action sp-reveal">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        </div>
        <h3>Sıkça Sorulan Sorular</h3>
        <p>En çok sorulan soruların cevapları burada.</p>
        <div class="sp-action-arrow">Görüntüle <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

      <a href="#iletisim" class="sp-action sp-reveal sp-reveal-d1">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3>Canlı Destek</h3>
        <p>Hafta içi 09:00–18:00 arasında bir uzmanla konuşun.</p>
        <div class="sp-action-arrow">Başlat <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

      <a href="#servis" class="sp-action sp-reveal sp-reveal-d2">
        <div class="sp-action-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <h3>Bayi ve Servis Bul</h3>
        <p>Yakınızdaki yetkili bayi ve servis merkezlerini bulun.</p>
        <div class="sp-action-arrow">Haritada Gör <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      </a>

    </div>
  </div>
</section>

{{-- ════════════════════ SSS ════════════════════ --}}
<section class="section" id="faq">
  <div class="wrap" style="max-width: 880px;">
    <p class="eyebrow sp-reveal">SSS</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px; margin-bottom: clamp(32px, 5vw, 56px);">Sıkça sorulan<br/>sorular.</h2>

    <div class="sp-faq">

      <div class="sp-faq-item">
        <details>
          <summary class="sp-faq-q">
            V11 Lite'ımın garanti süresi kaç ay?
            <span class="sp-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
            </span>
          </summary>
          <p class="sp-faq-a">Tüm Ovion ürünleri, satın alma tarihinden itibaren <strong>24 ay Türkiye garantisi</strong> ile birlikte gelir. Garanti kapsamı; üretim kaynaklı donanım arızaları, ekran ve batarya sorunlarını (normal kullanım şartlarında) içerir. Garanti belgeniz kutuda yer almakta olup dijital kopyasına <a href="#">ovion.com.tr/garanti</a> adresinden de ulaşabilirsiniz.</p>
        </details>
      </div>

      <div class="sp-faq-item">
        <details>
          <summary class="sp-faq-q">
            Servis için cihazımı nereye götürmeliyim?
            <span class="sp-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
            </span>
          </summary>
          <p class="sp-faq-a">Türkiye genelinde 200'den fazla yetkili servis merkezimiz mevcuttur. <a href="#">Servis merkezi bulucu</a> aracımızı kullanarak ilinize en yakın servisi haritada görebilir, çevrimiçi randevu alabilirsiniz. Ürününüzü ayrıca kargo ile de gönderebilirsiniz; kargo ücreti garanti kapsamındaki arızalarda Ovion tarafından karşılanır.</p>
        </details>
      </div>

      <div class="sp-faq-item">
        <details>
          <summary class="sp-faq-q">
            Yazılım güncellemelerini nasıl alabilirim?
            <span class="sp-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
            </span>
          </summary>
          <p class="sp-faq-a">Cihazınız Wi-Fi'a bağlıyken <strong>Ayarlar → Telefon Hakkında → Yazılım Güncelleme</strong> yolunu izleyerek güncellemeleri kontrol edebilirsiniz. OvionUI yılda en az iki büyük güncelleme ve aylık güvenlik yamaları alır. V11 Lite için Android 16'ya kadar yazılım desteği taahhüt edilmiştir.</p>
        </details>
      </div>

      <div class="sp-faq-item">
        <details>
          <summary class="sp-faq-q">
            Bataryam şarj almıyor, ne yapmalıyım?
            <span class="sp-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
            </span>
          </summary>
          <p class="sp-faq-a">Önce USB-C kablosu ve adaptörünüzü değiştirmeyi deneyin; sorun sıklıkla aksesuardan kaynaklanır. Ardından cihazı 30 saniye uzun basarak yeniden başlatın. Sorun devam ediyorsa Ayarlar → Pil bölümünden pil sağlığını kontrol edin. Pil kapasitesi %80'nin altına düştüyse ve garanti süreniz dolmadıysa, ücretsiz batarya değişiminden yararlanabilirsiniz.</p>
        </details>
      </div>

      <div class="sp-faq-item">
        <details>
          <summary class="sp-faq-q">
            Ekranım kırıldı, garanti kapsar mı?
            <span class="sp-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
            </span>
          </summary>
          <p class="sp-faq-a">Fiziksel hasar (düşme, çarpma kaynaklı kırık) standart garanti kapsamı dışındadır. Ancak <strong>Ovion Ekran Koruma Paketi</strong>'ne sahipseniz ilk yıl içinde bir kez ücretsiz ekran değişimi hakkından yararlanabilirsiniz. Ek ücretli ekran değişimi için ise yetkili servis üzerinden işlem yapılır; parça fiyat listesine <a href="#">buradan</a> ulaşabilirsiniz.</p>
        </details>
      </div>

      <div class="sp-faq-item">
        <details>
          <summary class="sp-faq-q">
            Cihazımı sıfırlamak istiyorum, verilerimi nasıl yedeklerim?
            <span class="sp-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
            </span>
          </summary>
          <p class="sp-faq-a">Sıfırlamadan önce <strong>Ayarlar → OvionCloud → Yedekleme</strong> yolunu takip edin. Kişileriniz, mesajlarınız, uygulama verileriniz ve fotoğraflarınız buluta yedeklenir. Fotoğraflar için ek olarak Google Fotoğraflar ya da harici belleğe kopyalama önerilir. Yedekleme tamamlandıktan sonra <strong>Ayarlar → Genel Yönetim → Sıfırla → Fabrika Ayarlarına Sıfırla</strong> adımlarını uygulayabilirsiniz.</p>
        </details>
      </div>

    </div>
  </div>
</section>

{{-- ════════════════════ GARANTİ ════════════════════ --}}
<section class="section" id="garanti" style="background: var(--bg-2);">
  <div class="wrap">
    <p class="eyebrow sp-reveal">Garanti</p>
    <div class="sp-warranty-grid">
      <div class="sp-warranty-copy sp-reveal sp-reveal-d1">
        <h2>24 ay güvenceli<br/>kullanım.</h2>
        <p>Ovion, tüm ürünlerini 24 aylık Türkiye garantisiyle teslim eder. Yerli üretimin avantajıyla yedek parça teminini çok daha hızlı sağlıyor ve garanti süreçlerini tamamen dijitalleştiriyoruz.</p>
        <ul class="sp-warranty-list">
          <li>Üretim kaynaklı donanım arızaları</li>
          <li>Yazılım ve sistem sorunları</li>
          <li>Batarya kapasitesi (normal kullanımda %80 altı)</li>
          <li>Ekran ve kamera modülü fabrika hataları</li>
          <li>Şarj portu ve fiziksel düğme arızaları</li>
        </ul>
        <div style="margin-top: 28px; display: flex; gap: 12px; flex-wrap: wrap;">
          <a href="#" class="btn btn-primary">Garanti Sorgula</a>
          <a href="#" class="btn btn-ghost">Koşulları Oku</a>
        </div>
      </div>
      <div class="sp-warranty-card sp-reveal sp-reveal-d2">
        <div class="sp-warranty-badge">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          Türkiye Garantisi
        </div>
        <div>
          <div class="sp-warranty-num">24 <span>ay</span></div>
          <p style="margin-top: 10px; font-size: 14px; color: var(--muted);">Tüm Ovion ürünleri için standart garanti süresi</p>
        </div>
        <div style="border-top: 1px solid var(--line-2); padding-top: 20px; display: flex; flex-direction: column; gap: 10px;">
          <div style="display:flex; justify-content:space-between; font-size:14px;">
            <span style="color:var(--muted);">Servis süresi</span>
            <span style="color:var(--ink); font-weight:500;">Ortalama 3 iş günü</span>
          </div>
          <div style="display:flex; justify-content:space-between; font-size:14px;">
            <span style="color:var(--muted);">Yetkili servis</span>
            <span style="color:var(--ink); font-weight:500;">200+ nokta</span>
          </div>
          <div style="display:flex; justify-content:space-between; font-size:14px;">
            <span style="color:var(--muted);">Kargo desteği</span>
            <span style="color:var(--ink); font-weight:500;">Garanti kapsamında ücretsiz</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ════════════════════ SERVİS ADIMLARI ════════════════════ --}}
<section class="section" id="servis">
  <div class="wrap">
    <p class="eyebrow sp-reveal">Servis Süreci</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px;">Servis talebi<br/>4 adımda tamamlanır.</h2>

    <div class="sp-steps">
      <div class="sp-step sp-reveal">
        <div class="sp-step-num">Adım 01</div>
        <h4>Talep Oluştur</h4>
        <p>Web veya uygulama üzerinden servis talebi oluşturun. Sorunuzu kısa bir notla açıklayın.</p>
      </div>
      <div class="sp-step sp-reveal sp-reveal-d1">
        <div class="sp-step-num">Adım 02</div>
        <h4>Kargo veya Servis</h4>
        <p>Cihazınızı en yakın servise götürün ya da kapıdan kargo ile gönderin; karşılıklı teslim ücretsizdir.</p>
      </div>
      <div class="sp-step sp-reveal sp-reveal-d2">
        <div class="sp-step-num">Adım 03</div>
        <h4>Teşhis ve Onarım</h4>
        <p>Uzman teknisyenlerimiz cihazı inceler, size teşhis raporu gönderir ve onayınızla onarıma başlar.</p>
      </div>
      <div class="sp-step sp-reveal sp-reveal-d3">
        <div class="sp-step-num">Adım 04</div>
        <h4>Teslim</h4>
        <p>Ortalama 3 iş günü içinde cihazınız kapınıza teslim edilir. Süreç SMS ve e-posta ile takip edilebilir.</p>
      </div>
    </div>
  </div>
</section>

{{-- ════════════════════ İLETİŞİM ════════════════════ --}}
<section class="section" id="iletisim" style="background: var(--bg-2);">
  <div class="wrap">
    <p class="eyebrow sp-reveal">İletişim</p>
    <h2 class="sp-reveal sp-reveal-d1" style="font-size: clamp(28px, 3.5vw, 52px); letter-spacing: -0.03em; line-height: 1.04; margin-top: 8px;">Uzmanlarımız<br/>her zaman burada.</h2>

    <div class="sp-contact-grid">

      <div class="sp-contact-card sp-reveal">
        <div class="sp-contact-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.18 6.18l1.19-1.19a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <h3>Telefon Desteği</h3>
        <p>Pazartesi–Cuma, 09:00–18:00</p>
        <p class="sp-contact-detail">0850 000 00 00</p>
        <a href="tel:08500000000" class="btn btn-ghost" style="height:40px; font-size:14px; padding:0 16px;">Hemen Ara</a>
      </div>

      <div class="sp-contact-card sp-reveal sp-reveal-d1">
        <div class="sp-contact-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <h3>E-posta</h3>
        <p>24 saat içinde yanıt veririz</p>
        <p class="sp-contact-detail">destek@ovion.com.tr</p>
        <a href="mailto:destek@ovion.com.tr" class="btn btn-ghost" style="height:40px; font-size:14px; padding:0 16px;">E-posta Gönder</a>
      </div>

      <div class="sp-contact-card sp-reveal sp-reveal-d2">
        <div class="sp-contact-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3>Canlı Destek</h3>
        <p>Ortalama bekleme süresi: 2 dakika</p>
        <p class="sp-contact-detail" style="color: var(--accent-ink);">● Şu an aktif</p>
        <a href="#" class="btn btn-primary" style="height:40px; font-size:14px; padding:0 16px;">Sohbeti Başlat</a>
      </div>

    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
  const els = document.querySelectorAll('.sp-reveal');
  if (!els.length) return;
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } });
  }, { threshold: 0.08 });
  els.forEach(el => io.observe(el));
})();
</script>
@endpush
