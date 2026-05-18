@extends('main')

@section('title', __('ui.ak_meta_title'))
@section('description', __('ui.ak_meta_desc'))
@section('canonical', ($locale ?? 'tr') === 'en' ? route('en.accessories') : route('aksesuarlar'))
@section('theme', 'dark')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/aksesuarlar.css') }}" />
@endpush

@php
  use App\Filament\Resources\AccessoryResource;
  use App\Filament\Resources\ProductResource;

  $isEn = ($locale ?? 'tr') === 'en';
  $r = fn (string $tr, string $en, array $params = []) => route($isEn ? $en : $tr, $params);

  $accessories = $accessories ?? collect();
  $compatProducts = $compatProducts ?? collect();
  $spotlight = $spotlight ?? null;

  $accessoryCategories = AccessoryResource::categoryOptions();
  $productTypes = ProductResource::typeOptions();

  $catLabels = $accessoryCategories;

  $productRouteByType = [
    'phone'     => ['phones.show', 'en.phones.show'],
    'watch'     => ['watches.show', 'en.watches.show'],
    'headphone' => ['headphones.show', 'en.headphones.show'],
  ];

  $productLabelByType = [
    'phone'     => __('ui.ak_compat_phone'),
    'watch'     => __('ui.ak_compat_watch'),
    'headphone' => __('ui.ak_compat_hp'),
  ];

  $spotlightImageUrl = $spotlight?->imageUrl();
  $spotlightCompat = $spotlight?->products
    ?->pluck('type')
    ->unique()
    ->map(fn ($t) => $productLabelByType[$t] ?? null)
    ->filter()
    ->implode(' · ');
@endphp

@section('content')

  <!-- HERO -->
  <section class="ak-hero">
    <div class="wrap ak-hero-grid">

      <div class="ak-hero-copy stagger">
        <p class="eyebrow" style="--i:0">@pc('hero_eyebrow', '')</p>
        <h1 style="--i:1">@pcRaw('hero_title', '')</h1>
        <p class="ak-lede" style="--i:2">@pc('hero_lede', '')</p>
        <div class="ak-hero-cta" style="--i:3">
          @php
            $ctaAllText = $content?->get('cta_all_text');
            $ctaDeviceText = $content?->get('cta_device_text');
          @endphp
          @if(!empty($ctaAllText))
            <a class="btn btn-primary" href="#urunler">{{ $ctaAllText }}</a>
          @endif
          @if(!empty($ctaDeviceText))
            <a class="btn btn-ghost" href="#uyumluluk">{{ $ctaDeviceText }}</a>
          @endif
        </div>
      </div>

    </div>
  </section>

  @if($spotlight)
  <!-- ÖNE ÇIKAN -->
  <section class="ak-spotlight">
    <div class="wrap">
      <div class="ak-spotlight-grid">

        <div class="ak-spotlight-media ak-reveal">
          @if($spotlightImageUrl)
            <img src="{{ $spotlightImageUrl }}" alt="{{ $spotlight->name }}" loading="lazy" />
          @endif
        </div>

        <div class="ak-spotlight-copy">
          <p class="eyebrow ak-reveal">@pc('spot_eyebrow', '')</p>
          <h2 class="ak-reveal ak-reveal-d1">@pcRaw('spot_title', '')</h2>
          <p class="ak-reveal ak-reveal-d2">{{ $spotlight->description ?: $spotlight->summary }}</p>
          <div class="ak-spotlight-meta ak-reveal ak-reveal-d3">
            @if($spotlight->priceLabel())
              <span class="ak-spotlight-price">{{ $spotlight->priceLabel() }}</span>
            @endif
            @if($spotlightCompat)
              <span class="ak-spotlight-compat">{{ $spotlightCompat }}</span>
            @endif
          </div>
          @if($spotlight->buy_url)
          <div class="ak-reveal ak-reveal-d3">
            <a class="btn btn-primary" href="{{ $spotlight->buy_url }}">{{ __('ui.ak_inspect') }} →</a>
          </div>
          @endif
        </div>

      </div>
    </div>
  </section>
  @endif

  <!-- KATEGORİ FİLTRE -->
  <div class="ak-cats" role="navigation" aria-label="{{ __('ui.ak_eyebrow') }}">
    <div class="wrap">
      <div class="ak-cats-inner">
        <button class="ak-cat-btn is-active" data-filter-type="all" data-filter-value="*">{{ __('ui.ak_cat_all') }}</button>
        @foreach($productTypes as $typeKey => $typeLabel)
          <button class="ak-cat-btn" data-filter-type="product" data-filter-value="{{ $typeKey }}">{{ $productLabelByType[$typeKey] ?? $typeLabel }}</button>
        @endforeach
        @foreach($accessoryCategories as $catKey => $catLabel)
          <button class="ak-cat-btn" data-filter-type="category" data-filter-value="{{ $catKey }}">{{ $catLabel }}</button>
        @endforeach
      </div>
    </div>
  </div>

  <!-- ÜRÜN GRİD -->
  <section class="ak-grid-section" id="urunler">
    <div class="wrap">
      <p class="eyebrow ak-reveal">@pc('grid_eyebrow', '')</p>
      <h2 class="ak-reveal ak-reveal-d1">@pc('grid_title', '')</h2>

      <div class="ak-grid">
        @foreach($accessories as $i => $accessory)
          @php
            $catLabel = $catLabels[$accessory->category] ?? $accessory->category;
            $imgUrl = $accessory->imageUrl('thumb');
            $delay = $i % 4;
            $delayClass = $delay > 0 ? ' ak-reveal-d'.$delay : '';
            $compatTypes = $accessory->products->pluck('type')->unique()->filter()->values()->all();
          @endphp
          <article class="ak-card ak-reveal{{ $delayClass }}" data-cat="{{ $accessory->category }}" data-products="{{ implode(' ', $compatTypes) }}">
            <div class="ak-card-media">
              @if($imgUrl)
                <img src="{{ $imgUrl }}" alt="{{ $accessory->name }}" loading="lazy" />
              @endif
            </div>
            <div class="ak-card-body">
              <span class="ak-card-cat">{{ $catLabel }}</span>
              <p class="ak-card-name">{{ $accessory->name }}</p>
              @if($accessory->summary)
                <p class="ak-card-sub">{{ $accessory->summary }}</p>
              @endif
              <div class="ak-card-footer">
                @if($accessory->priceLabel())
                  <span class="ak-card-price">{{ $accessory->priceLabel() }}</span>
                @else
                  <span class="ak-card-price"></span>
                @endif
                @if($accessory->buy_url)
                  <a href="{{ $accessory->buy_url }}" class="ak-card-link">{{ __('ui.ak_inspect') }} <span aria-hidden="true">→</span></a>
                @endif
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  @php
    $ctaEyebrow = $content?->get('cta_eyebrow');
    $ctaTitle = $content?->get('cta_title');
    $ctaDesc = $content?->get('cta_desc');
    $ctaBtn1Text = $content?->get('cta_btn1_text');
    $ctaBtn1Url = $content?->get('cta_btn1_url');
    $ctaBtn2Text = $content?->get('cta_btn2_text');
    $ctaBtn2Url = $content?->get('cta_btn2_url');
  @endphp
  @if(!empty($ctaEyebrow) || !empty($ctaTitle) || !empty($ctaDesc) || !empty($ctaBtn1Text) || !empty($ctaBtn2Text))
  <!-- CTA -->
  <section class="ak-cta">
    <div class="wrap">
      @if(!empty($ctaEyebrow))<p class="eyebrow ak-reveal">{{ $ctaEyebrow }}</p>@endif
      @if(!empty($ctaTitle))<h2 class="ak-reveal ak-reveal-d1">{!! $ctaTitle !!}</h2>@endif
      @if(!empty($ctaDesc))<p class="ak-reveal ak-reveal-d2">{{ $ctaDesc }}</p>@endif
      <div class="ak-cta-btns ak-reveal ak-reveal-d3">
        @if(!empty($ctaBtn1Text))
          <a class="btn btn-primary" href="{{ $ctaBtn1Url ?: '#' }}">{{ $ctaBtn1Text }}</a>
        @endif
        @if(!empty($ctaBtn2Text))
          <a class="btn btn-ghost" href="{{ $ctaBtn2Url ?: '#' }}">{{ $ctaBtn2Text }}</a>
        @endif
      </div>
    </div>
  </section>
  @endif

@endsection

@push('scripts')
<script>
(function () {
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('is-visible'); io.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  document.querySelectorAll('.ak-reveal').forEach(el => io.observe(el));

  const btns  = document.querySelectorAll('.ak-cat-btn');
  const cards = document.querySelectorAll('.ak-card[data-cat]');
  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      btns.forEach(b => b.classList.remove('is-active'));
      btn.classList.add('is-active');
      const filterType = btn.dataset.filterType;
      const filterValue = btn.dataset.filterValue;
      cards.forEach(card => {
        let show = filterType === 'all';
        if (filterType === 'category') {
          show = card.dataset.cat === filterValue;
        } else if (filterType === 'product') {
          const products = (card.dataset.products || '').split(/\s+/).filter(Boolean);
          show = products.includes(filterValue);
        }
        card.style.display = show ? '' : 'none';
      });
    });
  });
})();
</script>
@endpush
