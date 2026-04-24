@php
  $isEn = ($locale ?? 'tr') === 'en';
  $r = fn (string $tr, string $en) => route($isEn ? $en : $tr);
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

        <li class="nav-has-drop">
          <a href="#">{{ __('ui.nav_phones') }}
            <svg class="nav-chevron" width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <div class="nav-mega">
            <div class="wrap mega-inner">
              <div class="mega-grid">

                <a href="{{ $r('phones.v11-lite', 'en.phones.v11-lite') }}" class="mega-card">
                  <div class="mega-card-media">
                    <img src="{{ asset('assets/v11-hero.png') }}" alt="V11 Lite" />
                  </div>
                  <div class="mega-card-body">
                    <span class="mega-card-cat">{{ __('ui.nav_cat_phone') }}</span>
                    <p class="mega-card-name">V11 Lite <span aria-hidden="true">→</span></p>
                    <p>{{ __('ui.nav_v11_specs') }}</p>
                  </div>
                </a>

                <a href="#" class="mega-card">
                  <div class="mega-card-media mega-card-media--ph">
                    <span>V10 Pro<br/><small>{{ __('ui.nav_coming_soon') }}</small></span>
                  </div>
                  <div class="mega-card-body">
                    <span class="mega-card-cat">{{ __('ui.nav_cat_phone') }}</span>
                    <p class="mega-card-name">V10 Pro <span aria-hidden="true">→</span></p>
                    <p>{{ __('ui.nav_v10_specs') }}</p>
                  </div>
                </a>

                <a href="#" class="mega-card">
                  <div class="mega-card-media mega-card-media--ph">
                    <span>V9<br/><small>{{ __('ui.nav_coming_soon') }}</small></span>
                  </div>
                  <div class="mega-card-body">
                    <span class="mega-card-cat">{{ __('ui.nav_cat_phone') }}</span>
                    <p class="mega-card-name">V9 <span aria-hidden="true">→</span></p>
                    <p>{{ __('ui.nav_v9_specs') }}</p>
                  </div>
                </a>

              </div>
            </div>
          </div>
        </li>

        <li class="nav-has-drop">
          <a href="#">{{ __('ui.nav_watches') }}
            <svg class="nav-chevron" width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <div class="nav-mega">
            <div class="wrap mega-inner">
              <div class="mega-grid">

                <a href="{{ $r('watches.s3-pro', 'en.watches.s3-pro') }}" class="mega-card">
                  <div class="mega-card-media mega-card-media--ph">
                    <span>S3 Pro<br/><small>{{ __('ui.nav_coming_soon') }}</small></span>
                  </div>
                  <div class="mega-card-body">
                    <span class="mega-card-cat">{{ __('ui.nav_cat_watch') }}</span>
                    <p class="mega-card-name">S3 Pro <span aria-hidden="true">→</span></p>
                    <p>{{ __('ui.nav_s3_specs') }}</p>
                  </div>
                </a>

                <a href="#" class="mega-card">
                  <div class="mega-card-media mega-card-media--ph">
                    <span>S2<br/><small>{{ __('ui.nav_coming_soon') }}</small></span>
                  </div>
                  <div class="mega-card-body">
                    <span class="mega-card-cat">{{ __('ui.nav_cat_watch') }}</span>
                    <p class="mega-card-name">S2 <span aria-hidden="true">→</span></p>
                    <p>{{ __('ui.nav_s2_specs') }}</p>
                  </div>
                </a>

                <a href="#" class="mega-card">
                  <div class="mega-card-media mega-card-media--ph">
                    <span>S1 Lite<br/><small>{{ __('ui.nav_coming_soon') }}</small></span>
                  </div>
                  <div class="mega-card-body">
                    <span class="mega-card-cat">{{ __('ui.nav_cat_watch') }}</span>
                    <p class="mega-card-name">S1 Lite <span aria-hidden="true">→</span></p>
                    <p>{{ __('ui.nav_s1_specs') }}</p>
                  </div>
                </a>

              </div>
            </div>
          </div>
        </li>

        <li class="nav-has-drop">
          <a href="#">{{ __('ui.nav_headphones') }}
            <svg class="nav-chevron" width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <div class="nav-mega">
            <div class="wrap mega-inner">
              <div class="mega-grid">

                <a href="{{ $r('headphones.h1-pro', 'en.headphones.h1-pro') }}" class="mega-card">
                  <div class="mega-card-media mega-card-media--ph">
                    <span>H1 Pro<br/><small>{{ __('ui.nav_coming_soon') }}</small></span>
                  </div>
                  <div class="mega-card-body">
                    <span class="mega-card-cat">{{ __('ui.nav_cat_headphone') }}</span>
                    <p class="mega-card-name">H1 Pro <span aria-hidden="true">→</span></p>
                    <p>{{ __('ui.nav_h1_specs') }}</p>
                  </div>
                </a>

              </div>
            </div>
          </div>
        </li>

        <li>
          <a href="{{ $r('aksesuarlar', 'en.accessories') }}">{{ __('ui.nav_accessories') }}</a>
        </li>

        <li><a href="{{ $r('about', 'en.about') }}">{{ __('ui.nav_about') }}</a></li>

        <li><a href="{{ $r('destek', 'en.support') }}">{{ __('ui.nav_support') }}</a></li>

      </ul>
    </nav>

    <a href="{{ $altUrl ?? '#' }}" class="nav-lang-switch" aria-label="{{ __('ui.lang_switch_label') }}">
      {{ __('ui.lang_switch') }}
    </a>
  </div>
</header>
