<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title', 'Ovion — Türkiye\'nin Teknoloji Markası')</title>
    <meta name="description" content="@yield('description', 'Ovion, günlük yaşamı kolaylaştıran akıllı cihazlar tasarlayan bir Türk elektroniği markasıdır.')" />
    <meta name="theme-color" content="#0c0e12" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="@yield('canonical', url('/'))" />

    @stack('preload')

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />

    @stack('styles')
    @yield('head')
</head>

<body data-theme="@yield('theme', 'dark')">
    @include('components.navbar')

    @yield('content')

    @include('components.footer')

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
    @stack('scripts')
</body>
</html>
