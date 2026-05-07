@php
  use App\Models\Product;

  $isEn = ($locale ?? 'tr') === 'en';
  $r    = fn (string $tr, string $en, array $params = []) => route($isEn ? $en : $tr, $params);

  $navProducts = Product::active()->ordered()->with('media')->get(['id','type','name','slug','tagline']);

  $navPhones     = $navProducts->where('type', 'phone');
  $navWatches    = $navProducts->where('type', 'watch');
  $navHeadphones = $navProducts->where('type', 'headphone');

  $typeRoute = [
    'phone'     => ['phones.show',     'en.phones.show'],
    'watch'     => ['watches.show',    'en.watches.show'],
    'headphone' => ['headphones.show', 'en.headphones.show'],
  ];
  $typeCat = [
    'phone'     => __('ui.nav_cat_phone'),
    'watch'     => __('ui.nav_cat_watch'),
    'headphone' => __('ui.nav_cat_headphone'),
  ];

  $productUrl = function (Product $p) use ($isEn, $typeRoute): string {
    [$tr, $en] = $typeRoute[$p->type];
    return route($isEn ? $en : $tr, ['slug' => $p->slug]);
  };

  $heroUrl = function (Product $p): ?string {
    return $p->heroUrl();
  };
@endphp
<header class="nav">
  <div class="wrap nav-inner">
    <a href="{{ $r('home', 'en.home') }}" class="brand" aria-label="{{ __('ui.nav_homepage') }}">
      <span class="brand-mark" aria-hidden="true"></span>
      <span>ovion</span>
    </a>
    <button class="nav-hamburger"
            aria-label="{{ __('ui.nav_open_menu') }}"
            aria-expanded="false"
            data-label-open="{{ __('ui.nav_open_menu') }}"
            data-label-close="{{ __('ui.nav_close_menu') }}">
      <span></span><span></span><span></span>
    </button>
    <nav aria-label="{{ __('ui.nav_main_menu') }}">
      <ul class="nav-links">

        @foreach([
          ['label' => __('ui.nav_phones'),     'products' => $navPhones],
          ['label' => __('ui.nav_watches'),    'products' => $navWatches],
          ['label' => __('ui.nav_headphones'), 'products' => $navHeadphones],
        ] as $group)
        @if($group['products']->isNotEmpty())
        <li class="nav-has-drop">
          <a href="#">{{ $group['label'] }}
            <svg class="nav-chevron" width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <div class="nav-mega">
            <div class="wrap mega-inner">
              <div class="mega-grid">
                @foreach($group['products'] as $p)
                @php
                  $pUrl  = $productUrl($p);
                  $pHero = $heroUrl($p);
                  $pCat  = $typeCat[$p->type];
                @endphp
                <a href="{{ $pUrl }}" class="mega-card">
                  <div class="mega-card-media{{ $pHero ? '' : ' mega-card-media--ph' }}">
                    @if($pHero)
                    <img src="{{ $pHero }}" alt="{{ $p->name }}" />
                    @else
                    <span>{{ $p->name }}<br/><small>{{ __('ui.nav_coming_soon') }}</small></span>
                    @endif
                  </div>
                  <div class="mega-card-body">
                    <span class="mega-card-cat">{{ $pCat }}</span>
                    <p class="mega-card-name">{{ $p->name }} <span aria-hidden="true">→</span></p>
                    @if($p->tagline)<p>{{ $p->tagline }}</p>@endif
                  </div>
                </a>
                @endforeach
              </div>
            </div>
          </div>
        </li>
        @endif
        @endforeach

        <li><a href="{{ $r('about', 'en.about') }}">{{ __('ui.nav_about') }}</a></li>

        <li><a href="{{ $r('destek', 'en.support') }}">{{ __('ui.nav_support') }}</a></li>

      </ul>
    </nav>

    <a href="{{ $altUrl ?? '#' }}" class="nav-lang-switch" aria-label="{{ __('ui.lang_switch_label') }}">
      {{ __('ui.lang_switch') }}
    </a>
  </div>
</header>
