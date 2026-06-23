<?php

namespace Database\Seeders;

use App\Models\SupportTopic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportTopicSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $topics = [
            [
                'icon' => 'book',
                'order' => 1,
                'slug' => ['tr' => 'kullanim-kilavuzlari', 'en' => 'user-manuals'],
                'title' => ['tr' => 'Kullanım Kılavuzları', 'en' => 'User Manuals'],
                'summary' => [
                    'tr' => 'Tüm Ovion ürünleri için PDF kullanım kılavuzlarını indirin.',
                    'en' => 'Download PDF user manuals for all Ovion products.',
                ],
                'intro' => [
                    'tr' => 'Cihazınızın modeline ait kullanım kılavuzunu aşağıdan PDF olarak indirebilirsiniz. Kurulum, kullanım ve bakım adımlarının tamamı kılavuzlarda yer alır.',
                    'en' => 'Download the user manual for your device model as a PDF below. All setup, usage and maintenance steps are covered in the manuals.',
                ],
            ],
            [
                'icon' => 'shield',
                'order' => 2,
                'slug' => ['tr' => 'garanti-belgesi', 'en' => 'warranty-certificate'],
                'title' => ['tr' => 'Garanti Belgesi', 'en' => 'Warranty Certificate'],
                'summary' => [
                    'tr' => 'Ürünlerinize ait garanti belgelerini görüntüleyin ve indirin.',
                    'en' => 'View and download the warranty certificates for your products.',
                ],
                'intro' => [
                    'tr' => 'Ovion ürünleri 24 ay Türkiye garantisi kapsamındadır. İlgili garanti belgesini aşağıdan indirebilirsiniz.',
                    'en' => 'Ovion products are covered by a 24-month Türkiye warranty. You can download the relevant warranty certificate below.',
                ],
            ],
            [
                'icon' => 'wrench',
                'order' => 3,
                'slug' => ['tr' => 'teknik-dokumanlar', 'en' => 'technical-documents'],
                'title' => ['tr' => 'Teknik Dokümanlar', 'en' => 'Technical Documents'],
                'summary' => [
                    'tr' => 'Teknik özellik tabloları, veri sayfaları ve kurulum dökümanları.',
                    'en' => 'Technical specification sheets, datasheets and installation documents.',
                ],
                'intro' => [
                    'tr' => 'Ürünlere ait teknik veri sayfaları ve detaylı dökümanlar bu sayfada toplanmıştır.',
                    'en' => 'Technical datasheets and detailed documents for the products are collected on this page.',
                ],
            ],
            [
                'icon' => 'doc',
                'order' => 4,
                'slug' => ['tr' => 'sertifikalar-ve-uygunluk', 'en' => 'certificates-and-compliance'],
                'title' => ['tr' => 'Sertifikalar & Uygunluk', 'en' => 'Certificates & Compliance'],
                'summary' => [
                    'tr' => 'CE, uygunluk beyanları ve kalite sertifikalarına ulaşın.',
                    'en' => 'Access CE, declarations of conformity and quality certificates.',
                ],
                'intro' => [
                    'tr' => 'Ovion ürünlerinin uluslararası standartlara uygunluğunu gösteren sertifika ve beyanları aşağıdan indirebilirsiniz.',
                    'en' => 'Download the certificates and declarations demonstrating that Ovion products comply with international standards below.',
                ],
            ],
        ];

        foreach ($topics as $topic) {
            $model = SupportTopic::query()
                ->where('slug->tr', $topic['slug']['tr'])
                ->first() ?? new SupportTopic;

            $model->fill([
                'icon' => $topic['icon'],
                'order' => $topic['order'],
                'slug' => $topic['slug'],
                'title' => $topic['title'],
                'summary' => $topic['summary'],
                'intro' => $topic['intro'],
                'is_active' => true,
            ]);

            if (! $model->exists) {
                $model->documents = [];
            }

            $model->save();
        }
    }
}
