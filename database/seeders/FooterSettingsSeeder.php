<?php

namespace Database\Seeders;

use Afea\Cms\Settings\Settings\FooterSettings;
use Illuminate\Database\Seeder;

class FooterSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = app(FooterSettings::class);
        $settings->blocks = $this->blocks();
        $settings->save();
    }

    /**
     * The footer layout: a brand column, dynamic product columns
     * (phones / watches / headphones) and static support / corporate link
     * columns. Titles, descriptions and link labels are stored per-locale so the
     * TR and EN footers stay in sync.
     *
     * @return array<int, array<string, mixed>>
     */
    private function blocks(): array
    {
        return [
            [
                'title_tr' => 'Ovion',
                'title_en' => 'Ovion',
                'grid_size' => 2,
                'colspan' => 2,
                'block_type' => 'brand',
                'image' => null,
                'description_tr' => 'Ovion, günlük yaşamı kolaylaştıran akıllı cihazlar tasarlayan bir Türk elektroniği markasıdır. Tüm ürünler Türkiye\'de üretilir, Türkiye genelinde garantiyle sunulur.',
                'description_en' => 'Ovion is a Turkish electronics brand designing smart devices that simplify everyday life. All products are made in Türkiye and come with a nationwide warranty.',
                'links' => [],
            ],
            [
                'title_tr' => 'Telefonlar',
                'title_en' => 'Phones',
                'grid_size' => 2,
                'colspan' => 2,
                'block_type' => 'dynamic',
                'model' => 'product_phones',
                'all_records' => true,
                'limit' => 5,
                'order_field' => 'order',
                'order_dir' => 'asc',
                'links' => [],
            ],
            [
                'title_tr' => 'Saatler',
                'title_en' => 'Watches',
                'grid_size' => 2,
                'colspan' => 2,
                'block_type' => 'dynamic',
                'model' => 'product_watches',
                'all_records' => true,
                'limit' => 5,
                'order_field' => 'order',
                'order_dir' => 'asc',
                'links' => [],
            ],
            [
                'title_tr' => 'Kulaklıklar',
                'title_en' => 'Headphones',
                'grid_size' => 2,
                'colspan' => 2,
                'block_type' => 'dynamic',
                'model' => 'product_headphones',
                'all_records' => true,
                'limit' => 5,
                'order_field' => 'order',
                'order_dir' => 'asc',
                'links' => [],
            ],
            [
                'title_tr' => 'Destek',
                'title_en' => 'Support',
                'grid_size' => 2,
                'colspan' => 2,
                'block_type' => 'static',
                'links' => [
                    ['label_tr' => 'Teknik Destek', 'label_en' => 'Technical Support', 'url_tr' => '/destek', 'url_en' => '/en/support'],
                    ['label_tr' => 'Servis Merkezleri', 'label_en' => 'Service Centers', 'url_tr' => '/destek', 'url_en' => '/en/support'],
                    ['label_tr' => 'Garanti', 'label_en' => 'Warranty', 'url_tr' => '/destek', 'url_en' => '/en/support'],
                    ['label_tr' => 'Kullanım Kılavuzları', 'label_en' => 'User Manuals', 'url_tr' => '/destek', 'url_en' => '/en/support'],
                    ['label_tr' => 'İletişim', 'label_en' => 'Contact', 'url_tr' => '/destek', 'url_en' => '/en/support'],
                ],
            ],
            [
                'title_tr' => 'Kurumsal',
                'title_en' => 'Corporate',
                'grid_size' => 2,
                'colspan' => 2,
                'block_type' => 'static',
                'links' => [
                    ['label_tr' => 'Hakkımızda', 'label_en' => 'About Us', 'url_tr' => '/hakkimizda', 'url_en' => '/en/about'],
                    ['label_tr' => 'Basın & Haberler', 'label_en' => 'Press & News', 'url_tr' => '#', 'url_en' => '#'],
                    ['label_tr' => 'Kariyer', 'label_en' => 'Careers', 'url_tr' => '#', 'url_en' => '#'],
                    ['label_tr' => 'Sürdürülebilirlik', 'label_en' => 'Sustainability', 'url_tr' => '#', 'url_en' => '#'],
                ],
            ],
        ];
    }
}
