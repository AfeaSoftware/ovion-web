<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Ovion Aksesuarlar</title>
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
          <li><a href="{{ url('/hakkimizda') }}">Hakkımızda</a></li>
          <li><a href="{{ url('/') }}#buy">Satın Al</a></li>
          <li><a href="{{ url('/') }}#support">Destek</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="section" style="padding-top: 120px; min-height: 70vh;">
    <div class="wrap">
      <h1>Aksesuarlar</h1>
      <p style="margin-top: 12px; max-width: 680px; color: var(--muted);">
        Ovion cihazlarinizla uyumlu aksesuarlar bu sayfada listelenecek.
      </p>

      <div class="cards" style="margin-top: 28px;">
        <article class="card">
          <h3>Kiliflar</h3>
          <p>Dayanikli, ince ve model uyumlu koruma cozumleri.</p>
        </article>
        <article class="card">
          <h3>Ekran Koruyucular</h3>
          <p>Yuksek sertlikte, net goruntu sunan koruma camlari.</p>
        </article>
        <article class="card">
          <h3>Sarj Adapterleri</h3>
          <p>Hizli sarj destekli guvenli guc adaptorleri.</p>
        </article>
      </div>
    </div>
  </main>
</body>
</html>
