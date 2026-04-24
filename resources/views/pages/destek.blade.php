<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Destek — Ovion</title>
<meta name="description" content="Ovion ürünleri için garanti sorgulama, servis talebi, kullanım kılavuzları ve teknik destek." />
<link rel="canonical" href="{{ url('/destek') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
<style>
/* ── Support hero ── */
.sp-hero {
  padding: clamp(96px, 14vw, 180px) 0 clamp(64px, 9vw, 120px);
  background: var(--bg);
  text-align: center;
  position: relative; overflow: hidden;
}
.sp-hero::before {
  content: "";
  position: absolute; inset: 0;
  background:
    radial-gradient(ellipse 55% 45% at 50% 70%, color-mix(in oklab, var(--accent) 12%, transparent), transparent 65%);
  pointer-events: none;
}
.sp-hero .wrap { position: relative; z-index: 1; }
.sp-hero h1 {
  font-size: clamp(44px, 7vw, 100px);
  letter-spacing: -0.04em; line-height: 0.95; font-weight: 500;
  margin: 16px auto 24px; max-width: 18ch;
}
.sp-hero-sub {
  font-size: clamp(15px, 1.3vw, 19px);
  color: var(--ink-2); max-width: 44ch; margin: 0 auto 40px;
}

/* ── Search visual ── */
.sp-search-wrap {
  display: flex; align-items: center;
  max-width: 560px; margin: 0 auto;
  background: var(--card);
  border: 1px solid var(--line);
  border-radius: 999px;
  padding: 4px 6px 4px 20px;
  gap: 8px;
  box-shadow: 0 2px 20px color-mix(in oklab, var(--ink) 6%, transparent);
}
.sp-search-wrap input {
  flex: 1; background: none; border: none; outline: none;
  font-family: inherit; font-size: 15px; color: var(--ink);
  padding: 8px 0;
}
.sp-search-wrap input::placeholder { color: var(--muted); }
.sp-search-btn {
  height: 38px; padding: 0 18px; border-radius: 999px;
  background: var(--ink); color: var(--bg);
  border: none; cursor: pointer; font-family: inherit;
  font-size: 14px; font-weight: 500; white-space: nowrap;
  transition: transform .2s var(--ease);
}
.sp-search-btn:hover { transform: scale(1.02); }
.sp-search-hint {
  font-size: 12.5px; color: var(--muted); margin-top: 12px;
  display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;
}
.sp-search-hint button {
  background: none; border: 1px solid var(--line-2); border-radius: 6px;
  padding: 3px 10px; cursor: pointer; font-family: inherit;
  font-size: 12px; color: var(--muted);
  transition: border-color .15s, color .15s;
}
.sp-search-hint button:hover { border-color: var(--ink); color: var(--ink); }

/* ── Quick action cards ── */
.sp-actions-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 12px;
  margin-top: clamp(40px, 6vw, 72px);
}
@media (max-width: 860px) { .sp-actions-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 560px) { .sp-actions-grid { grid-template-columns: 1fr; } }
.sp-action {
  background: var(--card);
  border: 1px solid var(--line-2);
  border-radius: calc(var(--radius) * 1.2);
  padding: clamp(20px, 3vw, 32px);
  display: flex; flex-direction: column; gap: 12px;
  text-decoration: none; color: inherit;
  transition: border-color .2s, transform .2s var(--ease), box-shadow .2s;
  cursor: pointer;
}
.sp-action:hover {
  border-color: var(--accent);
  transform: translateY(-3px);
  box-shadow: 0 8px 32px color-mix(in oklab, var(--ink) 8%, transparent);
}
.sp-action-icon {
  width: 44px; height: 44px; border-radius: 12px;
  background: color-mix(in oklab, var(--accent) 12%, var(--bg));
  display: grid; place-items: center;
  color: var(--accent-ink);
}
.sp-action h3 {
  font-size: clamp(15px, 1.2vw, 17px); font-weight: 500;
  letter-spacing: -0.01em; margin: 0;
}
.sp-action p { font-size: 13.5px; color: var(--muted); line-height: 1.55; margin: 0; }
.sp-action-arrow {
  margin-top: auto; padding-top: 8px;
  font-size: 13px; color: var(--accent-ink); font-weight: 500;
  display: flex; align-items: center; gap: 4px;
}

/* ── FAQ section ── */
.sp-faq { border-top: 1px solid var(--line); }
.sp-faq-item {
  border-bottom: 1px solid var(--line-2);
}
.sp-faq-q {
  display: flex; align-items: center; justify-content: space-between;
  gap: 16px; padding: 22px 0;
  cursor: pointer; list-style: none;
  font-size: clamp(15px, 1.2vw, 17px); font-weight: 500;
  color: var(--ink);
  transition: color .15s;
}
.sp-faq-q:hover { color: var(--accent-ink); }
.sp-faq-q::marker, .sp-faq-q::-webkit-details-marker { display: none; }
.sp-faq-icon {
  flex-shrink: 0; width: 28px; height: 28px; border-radius: 8px;
  background: color-mix(in oklab, var(--ink) 6%, transparent);
  display: grid; place-items: center;
  transition: transform .3s var(--ease), background .2s;
}
details[open] .sp-faq-icon { transform: rotate(45deg); background: color-mix(in oklab, var(--accent) 12%, transparent); }
details[open] .sp-faq-q { color: var(--ink); }
.sp-faq-a {
  padding: 0 0 22px;
  font-size: 15px; color: var(--ink-2); line-height: 1.65;
  max-width: 72ch;
}
.sp-faq-a a { color: var(--accent-ink); text-decoration: underline; text-underline-offset: 3px; }

/* ── Warranty section ── */
.sp-warranty-grid {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: clamp(24px, 4vw, 64px);
  align-items: start;
  margin-top: clamp(40px, 6vw, 72px);
}
@media (max-width: 720px) { .sp-warranty-grid { grid-template-columns: 1fr; } }
.sp-warranty-copy h2 {
  font-size: clamp(26px, 3vw, 44px);
  letter-spacing: -0.03em; line-height: 1.04;
}
.sp-warranty-copy p {
  margin-top: 16px; font-size: clamp(14px, 1.1vw, 16px);
  color: var(--ink-2); line-height: 1.65; max-width: 46ch;
}
.sp-warranty-list {
  display: flex; flex-direction: column; gap: 12px;
  margin-top: 28px; list-style: none; padding: 0;
}
.sp-warranty-list li {
  display: grid; grid-template-columns: 20px 1fr;
  gap: 10px; align-items: start;
  font-size: 14.5px; color: var(--ink-2);
}
.sp-warranty-list li::before {
  content: "";
  width: 8px; height: 8px; border-radius: 50%;
  background: var(--accent);
  margin-top: 7px;
}
.sp-warranty-card {
  background: var(--card);
  border: 1px solid var(--line-2);
  border-radius: calc(var(--radius) * 1.4);
  padding: clamp(24px, 3vw, 40px);
  display: flex; flex-direction: column; gap: 20px;
}
.sp-warranty-badge {
  display: inline-flex; align-items: center; gap: 8px;
  font-size: 12px; font-weight: 600; letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--accent-ink);
  background: color-mix(in oklab, var(--accent) 10%, var(--bg));
  border: 1px solid color-mix(in oklab, var(--accent) 20%, transparent);
  padding: 5px 12px; border-radius: 999px;
  width: fit-content;
}
.sp-warranty-num {
  font-size: clamp(52px, 8vw, 96px); font-weight: 500;
  letter-spacing: -0.05em; line-height: 0.85;
  color: var(--ink);
}
.sp-warranty-num span { font-size: .32em; color: var(--muted); font-weight: 400; letter-spacing: -0.02em; }
.sp-warranty-card p { font-size: 13.5px; color: var(--muted); margin: 0; line-height: 1.6; }

/* ── Service steps ── */
.sp-steps {
  display: grid; grid-template-columns: repeat(4, 1fr);
  gap: 1px; background: var(--line);
  border: 1px solid var(--line);
  border-radius: var(--radius); overflow: hidden;
  margin-top: clamp(40px, 6vw, 72px);
}
@media (max-width: 820px) { .sp-steps { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 480px) { .sp-steps { grid-template-columns: 1fr; } }
.sp-step {
  background: var(--card); padding: clamp(20px, 3vw, 36px);
  display: flex; flex-direction: column; gap: 14px;
}
.sp-step-num {
  font-size: 12px; font-weight: 700; letter-spacing: 0.12em;
  text-transform: uppercase; color: var(--accent-ink);
}
.sp-step h4 {
  font-size: clamp(16px, 1.3vw, 18px); font-weight: 500;
  letter-spacing: -0.015em;
}
.sp-step p { font-size: 13.5px; color: var(--muted); line-height: 1.6; margin: 0; }

/* ── Contact ── */
.sp-contact-grid {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 12px;
  margin-top: clamp(40px, 6vw, 72px);
}
@media (max-width: 720px) { .sp-contact-grid { grid-template-columns: 1fr; } }
.sp-contact-card {
  background: var(--card);
  border: 1px solid var(--line-2);
  border-radius: calc(var(--radius) * 1.2);
  padding: clamp(24px, 3vw, 40px);
  display: flex; flex-direction: column; gap: 16px;
}
.sp-contact-icon {
  width: 48px; height: 48px; border-radius: 14px;
  background: color-mix(in oklab, var(--accent) 12%, var(--bg));
  display: grid; place-items: center; color: var(--accent-ink);
}
.sp-contact-card h3 {
  font-size: clamp(16px, 1.3vw, 19px); font-weight: 500;
  letter-spacing: -0.015em; margin: 0;
}
.sp-contact-card p { font-size: 14px; color: var(--muted); margin: 0; line-height: 1.6; }
.sp-contact-card .sp-contact-detail {
  font-size: 15px; font-weight: 500; color: var(--ink); margin: 0;
}
.sp-contact-card .btn { margin-top: 4px; align-self: flex-start; }

/* ── Reveal ── */
.sp-reveal {
  opacity: 0; transform: translateY(22px);
  transition: opacity .65s var(--ease), transform .65s var(--ease);
}
.sp-reveal.is-in { opacity: 1; transform: none; }
.sp-reveal-d1 { transition-delay: .1s; }
.sp-reveal-d2 { transition-delay: .2s; }
.sp-reveal-d3 { transition-delay: .3s; }
</style>
</head>
<body data-theme="dark">

@include('components.navbar')

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

@include('components.footer')

<script src="{{ asset('js/welcome.js') }}"></script>
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
</body>
</html>
