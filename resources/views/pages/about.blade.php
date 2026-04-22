<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Ovion Hakkimizda</title>
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
</head>
<body data-theme="light">
  <header class="nav">
    <div class="wrap nav-inner">
      <a href="{{ url('/') }}" class="brand" aria-label="Ovion ana sayfa">
        <span class="brand-mark" aria-hidden="true"></span>
        <span>ovion</span>
      </a>
      <nav aria-label="Ana menü">
        <ul class="nav-links">
          <li><a href="{{ url('/') }}#products">Telefonlar</a></li>
          <li><a href="{{ url('/aksesuarlar') }}">Aksesuarlar</a></li>
          <li><a href="{{ url('/') }}#buy">Satın Al</a></li>
          <li><a href="{{ url('/') }}#support">Destek</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="section" style="padding-top: 120px; min-height: 70vh;">
    <div class="wrap" style="max-width: 840px;">
      <h1>Hakkimizda</h1>
      <p style="margin-top: 14px; color: var(--muted);">
        Ovion, gunluk hayata uyum saglayan, sade ve guvenilir tuketici elektroni gi tasarlamak icin kuruldu.
        Urunlerimizde performans, dayaniklilik ve ulasilabilirligi birlikte onceliklendiriyoruz.
      </p>
      <p style="margin-top: 12px; color: var(--muted);">
        Tasarim sureclerimizi yerel kullanici beklentileriyle sekillendiriyor, uzun omurlu urun deneyimi icin surekli gelistirme yaklasimi benimsiyoruz.
      </p>
    </div>
  </main>
</body>
</html>
