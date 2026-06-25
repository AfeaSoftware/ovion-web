<?php

namespace Database\Seeders;

use App\Models\Accessory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessoriesSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $rows = [
            [
                'category' => 'kilif',
                'slug' => [
                    'tr' => 'v11-lite-silikon-kilif',
                    'en' => 'silicone-case-en-test',
                ],
                'name' => [
                    'tr' => 'V11 Lite Silikon Kılıf',
                    'en' => 'V11 Lite Silicone Case',
                ],
                'summary' => [
                    'tr' => 'Siyah · Beyaz · Lacivert · Kırmızı',
                    'en' => 'Black · White · Navy · Red',
                ],
                'description' => [],
                'price' => 299,
                'price_note' => [],
                'buy_url' => null,
                'meta_title' => [
                    'tr' => null,
                ],
                'meta_description' => [
                    'tr' => null,
                ],
                'is_active' => 0,
                'order' => 0,
                'is_spotlight' => 1,
            ],
            [
                'category' => 'kilif',
                'slug' => [
                    'tr' => 'v11-lite-seffaf-kilif',
                ],
                'name' => [
                    'tr' => 'V11 Lite Şeffaf Kılıf',
                    'en' => 'V11 Lite Clear Case',
                ],
                'summary' => [
                    'tr' => 'Sararmaya dayanıklı polikarbonat',
                    'en' => 'Yellowing-resistant polycarbonate',
                ],
                'description' => [
                    'tr' => null,
                ],
                'price' => 199,
                'price_note' => [
                    'tr' => null,
                ],
                'buy_url' => null,
                'meta_title' => [
                    'tr' => null,
                ],
                'meta_description' => [
                    'tr' => null,
                ],
                'is_active' => 0,
                'order' => 1,
                'is_spotlight' => 0,
            ],
            [
                'category' => 'kilif',
                'slug' => [
                    'tr' => 'v11-lite-premium-deri',
                ],
                'name' => [
                    'tr' => 'V11 Lite Premium Deri',
                    'en' => 'V11 Lite Premium Leather',
                ],
                'summary' => [
                    'tr' => 'Camel · Siyah · Koyu Yeşil',
                    'en' => 'Camel · Black · Dark Green',
                ],
                'description' => [
                    'tr' => null,
                ],
                'price' => 499,
                'price_note' => [
                    'tr' => null,
                ],
                'buy_url' => null,
                'meta_title' => [
                    'tr' => null,
                ],
                'meta_description' => [
                    'tr' => null,
                ],
                'is_active' => 0,
                'order' => 2,
                'is_spotlight' => 0,
            ],
            [
                'category' => 'ekran',
                'slug' => [
                    'tr' => 'v11-lite-temperli-cam',
                ],
                'name' => [
                    'tr' => 'V11 Lite Temperli Cam',
                    'en' => 'V11 Lite Tempered Glass',
                ],
                'summary' => [
                    'tr' => '9H sertlik · 2.5D kenar · 2\'li paket',
                    'en' => '9H hardness · 2.5D edge · 2-pack',
                ],
                'description' => [
                    'tr' => null,
                ],
                'price' => 149,
                'price_note' => [
                    'tr' => null,
                ],
                'buy_url' => null,
                'meta_title' => [
                    'tr' => null,
                ],
                'meta_description' => [
                    'tr' => null,
                ],
                'is_active' => 0,
                'order' => 3,
                'is_spotlight' => 0,
            ],
            [
                'category' => 'ekran',
                'slug' => [
                    'tr' => 'v11-lite-mat-film',
                ],
                'name' => [
                    'tr' => 'V11 Lite Mat Film',
                    'en' => 'V11 Lite Matte Film',
                ],
                'summary' => [
                    'tr' => 'Parmak izi gizleyici · Anti-yansıma',
                    'en' => 'Anti-fingerprint · Anti-glare',
                ],
                'description' => [
                    'tr' => null,
                ],
                'price' => 129,
                'price_note' => [
                    'tr' => null,
                ],
                'buy_url' => null,
                'meta_title' => [
                    'tr' => null,
                ],
                'meta_description' => [
                    'tr' => null,
                ],
                'is_active' => 0,
                'order' => 4,
                'is_spotlight' => 0,
            ],
            [
                'category' => 'sarj',
                'slug' => [
                    'tr' => 'ovion-65w-gan-adapter',
                ],
                'name' => [
                    'tr' => 'Ovion 65W GaN Adaptör',
                    'en' => 'Ovion 65W GaN Adapter',
                ],
                'summary' => [
                    'tr' => 'USB-C PD · Katlanabilir priz',
                    'en' => 'USB-C PD · Foldable plug',
                ],
                'description' => [
                    'tr' => null,
                ],
                'price' => 349,
                'price_note' => [
                    'tr' => null,
                ],
                'buy_url' => null,
                'meta_title' => [
                    'tr' => null,
                ],
                'meta_description' => [
                    'tr' => null,
                ],
                'is_active' => 0,
                'order' => 5,
                'is_spotlight' => 0,
            ],
            [
                'category' => 'sarj',
                'slug' => [
                    'tr' => 'usb-c-orgulu-kablo',
                ],
                'name' => [
                    'tr' => 'USB-C Örgülü Kablo',
                    'en' => 'USB-C Braided Cable',
                ],
                'summary' => [
                    'tr' => '100W · 2 metre · Naylon örgü',
                    'en' => '100W · 2 metres · Nylon braid',
                ],
                'description' => [
                    'tr' => null,
                ],
                'price' => 99,
                'price_note' => [
                    'tr' => null,
                ],
                'buy_url' => null,
                'meta_title' => [
                    'tr' => null,
                ],
                'meta_description' => [
                    'tr' => null,
                ],
                'is_active' => 0,
                'order' => 6,
                'is_spotlight' => 0,
            ],
            [
                'category' => 'kayis',
                'slug' => [
                    'tr' => 's3-pro-spor-kayis',
                ],
                'name' => [
                    'tr' => 'S3 Pro Spor Kayış',
                    'en' => 'S3 Pro Sport Strap',
                ],
                'summary' => [
                    'tr' => 'Gece Mavisi · Koyu Kırmızı · Siyah',
                    'en' => 'Midnight Blue · Deep Red · Black',
                ],
                'description' => [
                    'tr' => null,
                ],
                'price' => 179,
                'price_note' => [
                    'tr' => null,
                ],
                'buy_url' => null,
                'meta_title' => [
                    'tr' => null,
                ],
                'meta_description' => [
                    'tr' => null,
                ],
                'is_active' => 0,
                'order' => 7,
                'is_spotlight' => 0,
            ],
            [
                'category' => 'kayis',
                'slug' => [
                    'tr' => 's3-pro-milan-orgu',
                ],
                'name' => [
                    'tr' => 'S3 Pro Milan Örgü',
                    'en' => 'S3 Pro Milanese Loop',
                ],
                'summary' => [
                    'tr' => 'Paslanmaz çelik · Gümüş · Gold',
                    'en' => 'Stainless steel · Silver · Gold',
                ],
                'description' => [
                    'tr' => null,
                ],
                'price' => 379,
                'price_note' => [
                    'tr' => null,
                ],
                'buy_url' => null,
                'meta_title' => [
                    'tr' => null,
                ],
                'meta_description' => [
                    'tr' => null,
                ],
                'is_active' => 0,
                'order' => 8,
                'is_spotlight' => 0,
            ],
        ];

        foreach ($rows as $row) {
            Accessory::updateOrCreate(
                ['slug->tr' => $row['slug']['tr'] ?? null],
                $row,
            );
        }
    }
}
