<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Ovion V11 Lite — A phone built around the everyday.</title>
    <meta name="description"
        content="The Ovion V11 Lite is a 6.56″ 90 Hz smartphone with a 50 MP AI camera and 5000 mAh battery. Designed and assembled in Türkiye." />
    <meta name="theme-color" content="#f6f5f1" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{ url('/') }}" />

    <meta property="og:type" content="product" />
    <meta property="og:title" content="Ovion V11 Lite" />
    <meta property="og:description"
        content="A 6.56″ 90 Hz smartphone with a 50 MP AI camera and 5000 mAh battery. Made in Türkiye." />
    <meta property="og:image" content="{{ asset('assets/v11-hero.png') }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:site_name" content="Ovion" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:locale:alternate" content="tr_TR" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Ovion V11 Lite" />
    <meta name="twitter:description" content="A 6.56″ 90 Hz smartphone with a 50 MP AI camera and 5000 mAh battery." />
    <meta name="twitter:image" content="{{ asset('assets/v11-hero.png') }}" />

    <link rel="preload" as="image" href="{{ asset('assets/v11-hero.png') }}" fetchpriority="high" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />

    <script type="application/ld+json">
        {
        "@@context": "https://schema.org/",
        "@@type": "Product",
        "name": "Ovion V11 Lite",
        "image": ["{{ asset('assets/v11-hero.png') }}"],
        "description": "6.56-inch 90 Hz smartphone with a 50 MP AI camera, 5000 mAh battery and 18W fast charging. Designed and assembled in Türkiye.",
        "brand": { "@@type": "Brand", "name": "Ovion" },
        "manufacturer": { "@@type": "Organization", "name": "Ovion", "address": "Türkiye" },
        "model": "V11 Lite",
        "countryOfOrigin": "TR",
        "offers": {
            "@@type": "Offer",
            "priceCurrency": "TRY",
            "price": "4999",
            "availability": "https://schema.org/InStock",
            "url": "{{ url('/') }}"
        }
        }
        </script>
            <script type="application/ld+json">
        {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "Ovion",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('assets/v11-hero.png') }}",
        "address": { "@@type": "PostalAddress", "addressCountry": "TR" }
        }
    </script>
</head>

<body data-theme="light">
    @include('../components/navbar')

    @yield('content')

    @include('../components/footer')

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
</body>
</html>