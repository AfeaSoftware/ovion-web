@php
  $isEn = ($locale ?? 'tr') === 'en';
  $footerSettings = app(\Afea\Cms\Settings\Settings\FooterSettings::class);
  $company = app(\Afea\Cms\Settings\Settings\CompanySettings::class);
  $blocks = \App\Support\FooterRenderer::blocks($footerSettings->blocks ?? [], $isEn);

  $socials = collect([
    'facebook'  => $company->social_facebook,
    'twitter'   => $company->social_twitter,
    'instagram' => $company->social_instagram,
    'linkedin'  => $company->social_linkedin,
    'youtube'   => $company->social_youtube,
  ])->filter();

  $address = collect([
    $company->address_street,
    trim(implode(' ', array_filter([$company->address_district, $company->address_city]))),
    trim(implode(' ', array_filter([$company->address_postal_code, $company->address_country]))),
  ])->filter()->values();

  $workingHours = collect($company->working_hours ?? [])
    ->filter(fn ($row) => ($row['is_open'] ?? false) && ! empty($row['day']));
@endphp
<footer id="support">
  <div class="wrap">

    @if($blocks->isNotEmpty())
    <div class="foot-grid foot-grid--dynamic" style="display:grid; grid-template-columns: repeat(12, 1fr); gap: 32px;">
      @foreach($blocks as $block)
        <div class="foot-block foot-block--{{ $block['type'] }}" style="grid-column: span {{ $block['colspan'] }};">
          @if($block['type'] === 'brand')
            @php
              $brandImage = !empty($block['image'])
                ? \Illuminate\Support\Facades\Storage::disk('public')->url($block['image'])
                : asset('images/ovion-logo.png');
            @endphp
            <div class="foot-brand-col">
              <div class="brand">
                <img src="{{ $brandImage }}" alt="{{ $block['title'] }}" class="brand-logo" />
              </div>
              @if(!empty($block['description']))
                <p class="foot-about">{{ $block['description'] }}</p>
              @endif
              @if($socials->isNotEmpty())
                <div class="foot-social" style="margin-top:16px; display:flex; gap:12px;">
                  @foreach($socials as $key => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($key) }}" style="color:var(--muted); transition:color .15s;" onmouseover="this.style.color='var(--ink)'" onmouseout="this.style.color='var(--muted)'">
                      @switch($key)
                        @case('facebook')
                          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
                          @break
                        @case('twitter')
                          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                          @break
                        @case('instagram')
                          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41a3.7 3.7 0 0 1-1.38-.9 3.7 3.7 0 0 1-.9-1.38c-.16-.42-.36-1.06-.41-2.23-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41 1.27-.06 1.65-.07 4.85-.07M12 0C8.74 0 8.33.01 7.05.07 5.78.13 4.9.33 4.14.63a5.86 5.86 0 0 0-2.13 1.39A5.86 5.86 0 0 0 .63 4.14C.33 4.9.13 5.78.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.06 1.27.26 2.15.56 2.91.31.79.74 1.46 1.39 2.13a5.86 5.86 0 0 0 2.13 1.39c.76.3 1.64.5 2.91.56C8.33 23.99 8.74 24 12 24s3.67-.01 4.95-.07c1.27-.06 2.15-.26 2.91-.56a5.86 5.86 0 0 0 2.13-1.39 5.86 5.86 0 0 0 1.39-2.13c.3-.76.5-1.64.56-2.91.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95c-.06-1.27-.26-2.15-.56-2.91a5.86 5.86 0 0 0-1.39-2.13A5.86 5.86 0 0 0 19.86.63c-.76-.3-1.64-.5-2.91-.56C15.67.01 15.26 0 12 0zm0 5.84a6.16 6.16 0 1 0 0 12.32 6.16 6.16 0 0 0 0-12.32zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.4-11.85a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88z"/></svg>
                          @break
                        @case('linkedin')
                          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.76 0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.27c-.97 0-1.75-.79-1.75-1.76s.78-1.76 1.75-1.76 1.75.79 1.75 1.76-.78 1.76-1.75 1.76zm13.5 12.27h-3v-5.6c0-3.37-4-3.11-4 0v5.6h-3v-11h3v1.77c1.4-2.59 7-2.78 7 2.48v6.75z"/></svg>
                          @break
                        @case('youtube')
                          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                          @break
                      @endswitch
                    </a>
                  @endforeach
                </div>
              @endif
            </div>
          @elseif($block['type'] === 'contact')
            <p class="foot-col-heading">{{ $block['title'] }}</p>
            <ul style="list-style:none; padding:0;">
              @if($company->phone)
                <li><a href="tel:{{ preg_replace('/\s+/', '', $company->phone) }}">{{ $company->phone }}</a></li>
              @endif
              @if($company->email)
                <li><a href="mailto:{{ $company->email }}">{{ $company->email }}</a></li>
              @endif
              @if($company->whatsapp)
                <li><a href="https://wa.me/{{ preg_replace('/\D+/', '', $company->whatsapp) }}" target="_blank" rel="noopener">WhatsApp: {{ $company->whatsapp }}</a></li>
              @endif
              @foreach($address as $line)
                <li style="color:var(--muted);">{{ $line }}</li>
              @endforeach
              @if($workingHours->isNotEmpty())
                <li style="margin-top:8px; color:var(--muted); font-size:13px;">
                  @foreach($workingHours as $row)
                    <div>{{ $row['day'] }}: {{ $row['open_time'] ?? '' }} – {{ $row['close_time'] ?? '' }}</div>
                  @endforeach
                </li>
              @endif
            </ul>
          @else
            <p class="foot-col-heading">{{ $block['title'] }}</p>
            @if(!empty($block['links']))
              <ul>
                @foreach($block['links'] as $link)
                  <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                @endforeach
              </ul>
            @endif
          @endif
        </div>
      @endforeach
    </div>
    @else
      {{-- Fallback footer when no FooterSettings.blocks configured --}}
      @php
        $footProducts    = \App\Models\Product::active()->ordered()->get(['id','type','name','slug']);
        $footPhones      = $footProducts->where('type', 'phone');
        $footWatches     = $footProducts->where('type', 'watch');
        $footHphones     = $footProducts->where('type', 'headphone');
        $r    = fn (string $tr, string $en, array $params = []) => route($isEn ? $en : $tr, $params);
        $productUrl = function ($p) use ($isEn): string {
          $routes = [
            'phone'     => ['phones.show',     'en.phones.show'],
            'watch'     => ['watches.show',    'en.watches.show'],
            'headphone' => ['headphones.show', 'en.headphones.show'],
          ];
          [$tr, $en] = $routes[$p->type];
          return route($isEn ? $en : $tr, ['slug' => $p->slug]);
        };
      @endphp
      <div class="foot-grid">
        <div class="foot-brand-col">
          <div class="brand">
            <img src="{{ asset('images/ovion-logo.png') }}" alt="Ovion" class="brand-logo" />
          </div>
          <p class="foot-about">{{ __('ui.footer_brand_desc') }}</p>
        </div>

        @if($footPhones->isNotEmpty())
        <div>
          <p class="foot-col-heading">{{ __('ui.footer_phones') }}</p>
          <ul>
            @foreach($footPhones as $p)
            <li><a href="{{ $productUrl($p) }}">{{ $p->name }}</a></li>
            @endforeach
          </ul>
        </div>
        @endif

        @if($footWatches->isNotEmpty())
        <div>
          <p class="foot-col-heading">{{ __('ui.footer_watches') }}</p>
          <ul>
            @foreach($footWatches as $p)
            <li><a href="{{ $productUrl($p) }}">{{ $p->name }}</a></li>
            @endforeach
          </ul>
        </div>
        @endif

        @if($footHphones->isNotEmpty())
        <div>
          <p class="foot-col-heading">{{ __('ui.footer_headphones') }}</p>
          <ul>
            @foreach($footHphones as $p)
            <li><a href="{{ $productUrl($p) }}">{{ $p->name }}</a></li>
            @endforeach
          </ul>
        </div>
        @endif

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
    @endif

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
