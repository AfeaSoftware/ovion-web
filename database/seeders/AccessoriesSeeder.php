<?php

namespace Database\Seeders;

use App\Models\Accessory;
use Illuminate\Database\Seeder;

class AccessoriesSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'slug' => 'v11-lite-silikon-kilif',
                'category' => 'kilif',
                'price' => 299.00,
                'name' => ['tr' => 'V11 Lite Silikon Kılıf', 'en' => 'V11 Lite Silicone Case'],
                'summary' => ['tr' => 'Siyah · Beyaz · Lacivert · Kırmızı', 'en' => 'Black · White · Navy · Red'],
            ],
            [
                'slug' => 'v11-lite-seffaf-kilif',
                'category' => 'kilif',
                'price' => 199.00,
                'name' => ['tr' => 'V11 Lite Şeffaf Kılıf', 'en' => 'V11 Lite Clear Case'],
                'summary' => ['tr' => 'Sararmaya dayanıklı polikarbonat', 'en' => 'Yellowing-resistant polycarbonate'],
            ],
            [
                'slug' => 'v11-lite-premium-deri',
                'category' => 'kilif',
                'price' => 499.00,
                'name' => ['tr' => 'V11 Lite Premium Deri', 'en' => 'V11 Lite Premium Leather'],
                'summary' => ['tr' => 'Camel · Siyah · Koyu Yeşil', 'en' => 'Camel · Black · Dark Green'],
            ],
            [
                'slug' => 'v11-lite-temperli-cam',
                'category' => 'ekran',
                'price' => 149.00,
                'name' => ['tr' => 'V11 Lite Temperli Cam', 'en' => 'V11 Lite Tempered Glass'],
                'summary' => ['tr' => '9H sertlik · 2.5D kenar · 2\'li paket', 'en' => '9H hardness · 2.5D edge · 2-pack'],
            ],
            [
                'slug' => 'v11-lite-mat-film',
                'category' => 'ekran',
                'price' => 129.00,
                'name' => ['tr' => 'V11 Lite Mat Film', 'en' => 'V11 Lite Matte Film'],
                'summary' => ['tr' => 'Parmak izi gizleyici · Anti-yansıma', 'en' => 'Anti-fingerprint · Anti-glare'],
            ],
            [
                'slug' => 'ovion-65w-gan-adapter',
                'category' => 'sarj',
                'price' => 349.00,
                'name' => ['tr' => 'Ovion 65W GaN Adaptör', 'en' => 'Ovion 65W GaN Adapter'],
                'summary' => ['tr' => 'USB-C PD · Katlanabilir priz', 'en' => 'USB-C PD · Foldable plug'],
            ],
            [
                'slug' => 'usb-c-orgulu-kablo',
                'category' => 'sarj',
                'price' => 99.00,
                'name' => ['tr' => 'USB-C Örgülü Kablo', 'en' => 'USB-C Braided Cable'],
                'summary' => ['tr' => '100W · 2 metre · Naylon örgü', 'en' => '100W · 2 metres · Nylon braid'],
            ],
            [
                'slug' => 's3-pro-spor-kayis',
                'category' => 'kayis',
                'price' => 179.00,
                'name' => ['tr' => 'S3 Pro Spor Kayış', 'en' => 'S3 Pro Sport Strap'],
                'summary' => ['tr' => 'Gece Mavisi · Koyu Kırmızı · Siyah', 'en' => 'Midnight Blue · Deep Red · Black'],
            ],
            [
                'slug' => 's3-pro-milan-orgu',
                'category' => 'kayis',
                'price' => 379.00,
                'name' => ['tr' => 'S3 Pro Milan Örgü', 'en' => 'S3 Pro Milanese Loop'],
                'summary' => ['tr' => 'Paslanmaz çelik · Gümüş · Gold', 'en' => 'Stainless steel · Silver · Gold'],
            ],
        ];

        foreach ($items as $i => $data) {
            Accessory::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'category' => $data['category'],
                    'name' => $data['name'],
                    'summary' => $data['summary'],
                    'price' => $data['price'],
                    'is_active' => true,
                    'order' => $i,
                ],
            );
        }
    }
}
