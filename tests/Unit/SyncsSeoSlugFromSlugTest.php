<?php

namespace Tests\Unit;

use App\Filament\Concerns\SyncsSeoSlugFromSlug;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class SyncsSeoSlugFromSlugTest extends TestCase
{
    /**
     * Build a stub Filament page exposing the SEO-slug sync behaviour.
     */
    private function makePage(?string $activeLocale, ?Model $record = null): object
    {
        return new class($activeLocale, $record)
        {
            use SyncsSeoSlugFromSlug;

            /** @var array<string, mixed> */
            public array $data = [];

            public function __construct(public ?string $activeLocale, private ?Model $record) {}

            protected function getDefaultActiveLocale(): string
            {
                return 'tr';
            }

            public function getRecord(): ?Model
            {
                return $this->record;
            }

            /**
             * @param  array<string, mixed>  $data
             */
            public function sync(array $data): void
            {
                $this->syncSeoSlugFromData($data);
            }
        };
    }

    public function test_seo_slug_is_filled_from_primary_locale_slug(): void
    {
        $page = $this->makePage(activeLocale: 'tr');

        $page->sync(['slug' => 'v20-pro']);

        $this->assertSame('v20-pro', $page->data['seo_slug']);
    }

    public function test_seo_slug_defaults_to_primary_locale_when_active_locale_is_null(): void
    {
        $page = $this->makePage(activeLocale: null);

        $page->sync(['slug' => 'v8-lite']);

        $this->assertSame('v8-lite', $page->data['seo_slug']);
    }

    public function test_secondary_locale_keeps_primary_slug_from_record(): void
    {
        $product = new Product;
        $product->setTranslation('slug', 'tr', 'v20-pro');

        $page = $this->makePage(activeLocale: 'en', record: $product);

        // Editing the English locale must not overwrite the canonical SEO slug.
        $page->sync(['slug' => 'v20-pro-en']);

        $this->assertSame('v20-pro', $page->data['seo_slug']);
    }

    public function test_secondary_locale_falls_back_to_data_slug_without_primary_translation(): void
    {
        $page = $this->makePage(activeLocale: 'en', record: new Product);

        $page->sync(['slug' => 'fallback-en']);

        $this->assertSame('fallback-en', $page->data['seo_slug']);
    }

    public function test_empty_slug_does_not_set_seo_slug(): void
    {
        $page = $this->makePage(activeLocale: 'tr');

        $page->sync(['slug' => '']);

        $this->assertArrayNotHasKey('seo_slug', $page->data);
    }
}
