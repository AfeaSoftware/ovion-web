@php
  /** @var \Illuminate\Support\Collection $compatibleAccessories */
  $compatibleAccessories ??= collect();
@endphp

@if($compatibleAccessories->isNotEmpty())
  @php
    $isEnglish = ($locale ?? 'tr') === 'en';
    $accessoryIndexRoute = $isEnglish ? 'en.accessories' : 'aksesuarlar';
    $categoryLabels = [
      'kilif' => $isEnglish ? 'Case' : 'Kılıf',
      'ekran' => $isEnglish ? 'Screen Protector' : 'Ekran Koruyucu',
      'sarj' => $isEnglish ? 'Charger & Cable' : 'Şarj & Kablo',
      'kayis' => $isEnglish ? 'Strap' : 'Kayış',
      'diger' => $isEnglish ? 'Other' : 'Diğer',
    ];
  @endphp

  <section class="pd-compat" id="pd-compat" data-pd-section="pd-compat">
    <div class="wrap">
      <p class="eyebrow">{{ __('ui.pd_compat_ey') }}</p>
      <h2 class="pd-compat-title">{!! __('ui.pd_compat_title') !!}</h2>

      <div class="pd-compat-grid">
        @foreach($compatibleAccessories as $accessory)
          @php
            $catLabel = $categoryLabels[$accessory->category] ?? $accessory->category;
            $imgUrl = $accessory->imageUrl('thumb');
            $href = $accessory->buy_url ?: route($accessoryIndexRoute);
          @endphp
          <a href="{{ $href }}" class="pd-compat-card">
            <div class="pd-compat-card-media">
              @if($imgUrl)
                <img src="{{ $imgUrl }}" alt="{{ $accessory->name }}" loading="lazy" decoding="async" />
              @else
                <span>{{ $accessory->name }}</span>
              @endif
            </div>
            <div class="pd-compat-card-body">
              <span class="pd-compat-card-cat">{{ $catLabel }}</span>
              <p class="pd-compat-card-name">{{ $accessory->name }}</p>
              @if($accessory->summary)
                <p class="pd-compat-card-sub">{{ $accessory->summary }}</p>
              @endif
              <div class="pd-compat-card-footer">
                @if($accessory->priceLabel())
                  <span class="pd-compat-card-price">{{ $accessory->priceLabel() }}</span>
                @else
                  <span></span>
                @endif
                <span class="pd-compat-card-link">{{ __('ui.ak_inspect') }} <span aria-hidden="true">→</span></span>
              </div>
            </div>
          </a>
        @endforeach
      </div>

      <div class="pd-compat-cta">
        <a href="{{ route($accessoryIndexRoute) }}" class="btn btn-ghost">{{ __('ui.pd_compat_all') }}</a>
      </div>
    </div>
  </section>
@endif

@push('styles')
<style>
  .pd-compat { padding: clamp(64px, 9vw, 112px) 0; background: var(--bg-2, #f7f7f8); border-top: 1px solid var(--line, #e6e6e8); border-bottom: 1px solid var(--line, #e6e6e8); }
  .pd-compat .wrap { max-width: 1200px; margin: 0 auto; padding: 0 clamp(20px, 4vw, 48px); }
  .pd-compat .eyebrow { display: inline-flex; align-items: center; gap: 8px; font-size: 12px; font-weight: 500; letter-spacing: 0.16em; text-transform: uppercase; color: var(--muted, #6b6b70); margin: 0 0 12px; }
  .pd-compat-title { font-size: clamp(28px, 3.5vw, 52px); font-weight: 600; letter-spacing: -0.03em; line-height: 1.05; margin: 0 0 clamp(28px, 4vw, 48px); color: var(--ink, #111); max-width: 24ch; }
  .pd-compat-title em { font-style: normal; color: var(--accent-ink, #ff3b30); }
  .pd-compat-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px; }
  .pd-compat-card { display: flex; flex-direction: column; background: var(--card, #fff); border: 1px solid var(--line-2, #e1e1e4); border-radius: 16px; overflow: hidden; text-decoration: none; color: inherit; transition: border-color .25s, box-shadow .25s, transform .25s; }
  .pd-compat-card:hover { border-color: color-mix(in oklab, var(--accent, #ff3b30) 40%, var(--line-2, #e1e1e4)); box-shadow: 0 14px 36px color-mix(in oklab, var(--ink, #111) 8%, transparent); transform: translateY(-3px); }
  .pd-compat-card-media { aspect-ratio: 4/3; background: var(--bg-2, #f7f7f8); display: flex; align-items: center; justify-content: center; padding: 16px; }
  .pd-compat-card-media img { max-width: 80%; max-height: 90%; object-fit: contain; transition: transform .45s; }
  .pd-compat-card:hover .pd-compat-card-media img { transform: scale(1.05); }
  .pd-compat-card-body { padding: 14px 16px 16px; border-top: 1px solid var(--line-2, #e1e1e4); display: flex; flex-direction: column; gap: 4px; flex: 1; }
  .pd-compat-card-cat { font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase; color: var(--muted, #6b6b70); }
  .pd-compat-card-name { font-size: 15px; font-weight: 600; letter-spacing: -0.015em; color: var(--ink, #111); margin: 2px 0 0; }
  .pd-compat-card-sub { font-size: 13px; color: var(--muted, #6b6b70); margin: 2px 0 0; line-height: 1.4; }
  .pd-compat-card-footer { display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: 12px; }
  .pd-compat-card-price { font-size: 14px; font-weight: 600; color: var(--ink, #111); }
  .pd-compat-card-link { font-size: 13px; font-weight: 500; color: var(--ink-2, #333); display: inline-flex; align-items: center; gap: 4px; transition: gap .2s; }
  .pd-compat-card:hover .pd-compat-card-link { gap: 8px; }
  .pd-compat-cta { display: flex; justify-content: center; margin-top: clamp(28px, 4vw, 40px); }
  .pd-compat-empty { font-size: 14px; color: var(--muted, #6b6b70); }
</style>
@endpush
