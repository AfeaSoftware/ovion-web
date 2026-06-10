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
    return $p->collectionCardUrl();
  };
@endphp
<header class="nav">
  <div class="wrap nav-inner">
    <a href="{{ $r('home', 'en.home') }}" class="brand" aria-label="{{ __('ui.nav_homepage') }}">
      <img src="{{ asset('images/ovion-logo.png') }}" alt="Ovion" class="brand-logo" />
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

        <li><a href="{{ $r('aksesuarlar', 'en.accessories') }}">{{ __('ui.nav_accessories') }}</a></li>

        <li><a href="{{ $r('about', 'en.about') }}">{{ __('ui.nav_about') }}</a></li>

        <li><a href="{{ $r('destek', 'en.support') }}">{{ __('ui.nav_support') }}</a></li>

        <li class="nav-mobile-only nav-mobile-divider" aria-hidden="true"></li>

        <li class="nav-mobile-only">
          <a href="{{ auth()->check() ? $r('account', 'en.account') : $r('login', 'en.login') }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
            </svg>
            {{ auth()->check() ? __('ui.nav_account') : __('ui.nav_login') }}
          </a>
        </li>

        <li class="nav-mobile-only">
          <a href="{{ $r('cart.index', 'en.cart.index') }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
              <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
            </svg>
            {{ __('ui.nav_cart') }}
          </a>
        </li>

        <li class="nav-mobile-only">
          <a href="{{ $altUrl ?? '#' }}" aria-label="{{ __('ui.lang_switch_label') }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
            </svg>
            {{ __('ui.lang_switch') }}
          </a>
        </li>

      </ul>
    </nav>

    <div class="nav-actions">
      <a href="{{ $r('cart.index', 'en.cart.index') }}" class="nav-icon-btn" aria-label="{{ __('ui.nav_cart') }}" title="{{ __('ui.nav_cart') }}">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
        </svg>
      </a>
      <a href="{{ auth()->check() ? $r('account', 'en.account') : $r('login', 'en.login') }}" class="nav-icon-btn" aria-label="{{ auth()->check() ? __('ui.nav_account') : __('ui.nav_login') }}" title="{{ auth()->check() ? __('ui.nav_account') : __('ui.nav_login') }}">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
        </svg>
      </a>
      <a href="{{ $altUrl ?? '#' }}" class="nav-lang-switch" aria-label="{{ __('ui.lang_switch_label') }}">
        {{ __('ui.lang_switch') }}
      </a>
    </div>
  </div>
</header>
