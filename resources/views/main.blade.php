<!doctype html>
<html lang="{{ $locale ?? 'tr' }}">

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
    <a class="skip-link" href="#main-content">{{ __('ui.a11y_skip') }}</a>
    @include('components.navbar')

    <main id="main-content">
        @yield('content')
    </main>

    @include('components.footer')

    <!-- TWEAKS -->
    <aside class="tweaks" id="tweaks" aria-label="{{ __('ui.tw_label') }}">
        <p class="tweaks-label">{{ __('ui.tw_label') }}</p>
        <div class="tweaks-row">
            <span>{{ __('ui.tw_theme') }}</span>
            <div class="tweaks-btns" data-group="theme">
                <button data-val="light">{{ __('ui.tw_theme_light') }}</button>
                <button data-val="dark">{{ __('ui.tw_theme_dark') }}</button>
            </div>
        </div>
        <div class="tweaks-row">
            <span>{{ __('ui.tw_accent') }}</span>
            <div class="tweaks-btns" data-group="accent">
                <button data-val="amber">{{ __('ui.tw_accent_amber') }}</button>
                <button data-val="slate">{{ __('ui.tw_accent_slate') }}</button>
                <button data-val="emerald">{{ __('ui.tw_accent_emerald') }}</button>
                <button data-val="ink">{{ __('ui.tw_accent_ink') }}</button>
            </div>
        </div>
    </aside>

    <script src="{{ asset('js/subnav.js') }}"></script>
    <script src="{{ asset('js/reveal.js') }}"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
    @stack('scripts')
</body>
</html>
