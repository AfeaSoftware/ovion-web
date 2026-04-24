@php
  $isEn = ($locale ?? 'tr') === 'en';
  $r = fn (string $tr, string $en) => route($isEn ? $en : $tr);
@endphp
<footer id="support">
  <div class="wrap">
    <div class="foot-grid">
      <div class="foot-brand-col">
        <div class="brand" style="font-size:18px">
          <span class="brand-mark" aria-hidden="true"></span>
          <span>ovion</span>
        </div>
        <p class="foot-about">{{ __('ui.footer_brand_desc') }}</p>
      </div>

      <div>
        <p class="foot-col-heading">{{ __('ui.footer_phones') }}</p>
        <ul>
          <li><a href="{{ $r('phones.v11-lite', 'en.phones.v11-lite') }}">V11 Lite</a></li>
          <li><a href="#">V10 Pro</a></li>
          <li><a href="#">V9</a></li>
          <li><a href="#">{{ __('ui.footer_compare') }}</a></li>
        </ul>
      </div>

      <div>
        <p class="foot-col-heading">{{ __('ui.footer_watches_hp') }}</p>
        <ul>
          <li><a href="{{ $r('watches.s3-pro', 'en.watches.s3-pro') }}">S3 Pro</a></li>
          <li><a href="#">S2</a></li>
          <li><a href="#">S1 Lite</a></li>
          <li><a href="{{ $r('headphones.h1-pro', 'en.headphones.h1-pro') }}">H1 Pro</a></li>
        </ul>
      </div>

      <div>
        <p class="foot-col-heading">{{ __('ui.footer_accessories') }}</p>
        <ul>
          <li><a href="{{ $r('aksesuarlar', 'en.accessories') }}">{{ __('ui.footer_cases') }}</a></li>
          <li><a href="{{ $r('aksesuarlar', 'en.accessories') }}">{{ __('ui.footer_screen_protect') }}</a></li>
          <li><a href="{{ $r('aksesuarlar', 'en.accessories') }}">{{ __('ui.footer_chargers') }}</a></li>
          <li><a href="{{ $r('aksesuarlar', 'en.accessories') }}">{{ __('ui.footer_all_accessories') }}</a></li>
        </ul>
      </div>

      <div>
        <p class="foot-col-heading">{{ __('ui.footer_support') }}</p>
        <ul>
          <li><a href="{{ $r('destek', 'en.support') }}">{{ __('ui.footer_tech_support') }}</a></li>
          <li><a href="{{ $r('destek', 'en.support') }}">{{ __('ui.footer_service_centers') }}</a></li>
          <li><a href="{{ $r('destek', 'en.support') }}">{{ __('ui.footer_warranty') }}</a></li>
          <li><a href="{{ $r('destek', 'en.support') }}">{{ __('ui.footer_manuals') }}</a></li>
          <li><a href="{{ $r('destek', 'en.support') }}">{{ __('ui.footer_contact') }}</a></li>
        </ul>
      </div>

      <div>
        <p class="foot-col-heading">{{ __('ui.footer_corporate') }}</p>
        <ul>
          <li><a href="{{ $r('about', 'en.about') }}">{{ __('ui.footer_about') }}</a></li>
          <li><a href="#">{{ __('ui.footer_press') }}</a></li>
          <li><a href="#">{{ __('ui.footer_careers') }}</a></li>
          <li><a href="#">{{ __('ui.footer_sustainability') }}</a></li>
        </ul>
      </div>

    </div>
    <div class="foot-bot">
      <div>{{ __('ui.footer_copyright') }}</div>
      <div style="display:flex; gap:18px;">
        <a href="#">{{ __('ui.footer_privacy') }}</a>
        <a href="#">{{ __('ui.footer_cookies') }}</a>
        <a href="#">{{ __('ui.footer_terms') }}</a>
      </div>
    </div>
    <div style="margin-top:14px; padding-top:14px; border-top:1px solid var(--line-2); text-align:center; font-size:12px; color:var(--muted); letter-spacing:0.02em;">
      Produced by <a href="https://afeayazilim.com" target="_blank" rel="noopener" style="color:var(--muted); text-decoration:underline; text-underline-offset:3px; transition:color .15s;" onmouseover="this.style.color='var(--ink)'" onmouseout="this.style.color='var(--muted)'">AFEA Software</a>
    </div>
  </div>
</footer>
