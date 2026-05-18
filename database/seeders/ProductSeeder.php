<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $rows = [
            [
                'type' => 'phone',
                'slug' => [
                    'tr' => 'ovion-v11-lite',
                    'en' => 'ovion-v11-lite',
                ],
                'name' => [
                    'tr' => 'Ovion V11 Lite',
                    'en' => 'Ovion V11 Lite',
                ],
                'eyebrow' => [
                    'tr' => 'Yeni — 2026',
                    'en' => 'New — 2026',
                ],
                'tagline' => [
                    'tr' => 'İnce. Akıllı. Türkiye\'nin.',
                    'en' => 'Slim. Smart. Türkiye\'s.',
                ],
                'strip_stats' => [
                    'tr' => [
                        [
                            'value' => '6.56″',
                            'label' => 'HD+ · 90 Hz',
                        ],
                        [
                            'value' => '50 MP',
                            'label' => 'AI Ana Kamera',
                        ],
                        [
                            'value' => '5000 mAh',
                            'label' => 'Batarya · 18 W',
                        ],
                        [
                            'value' => '8.45 mm',
                            'label' => 'İnce Profil · 179 g',
                        ],
                        [
                            'value' => '24 ay',
                            'label' => 'Türkiye Garantisi',
                        ],
                    ],
                    'en' => [
                        [
                            'value' => '6.56″',
                            'label' => 'HD+ · 90 Hz',
                        ],
                        [
                            'value' => '50 MP',
                            'label' => 'AI Main Camera',
                        ],
                        [
                            'value' => '5000 mAh',
                            'label' => 'Battery · 18 W',
                        ],
                        [
                            'value' => '8.45 mm',
                            'label' => 'Slim Profile · 179 g',
                        ],
                        [
                            'value' => '24 mo.',
                            'label' => 'Türkiye Warranty',
                        ],
                    ],
                ],
                'content' => [
                    'tr' => [
                        'collection_card' => [
                            'description' => '90 Hz · 50 MP AI Kamera · 5000 mAh',
                        ],
                        'hero' => [
                            'byline' => '50 MP AI kamera ile tanışın.',
                        ],
                        'camera' => [
                            'eyebrow' => 'Kamera',
                            'title' => '50 MP sensör.<br/>Işığı okumak için<br/>eğitildi.',
                            'cards' => [
                                [
                                    'icon' => 'camera',
                                    'metric' => '50 MP',
                                    'title' => 'Ana Kamera',
                                    'description' => 'Büyük piksel sensörü, düşük ışıkta detayı korur ve ten tonlarını doğal yansıtır.',
                                ],
                                [
                                    'icon' => 'eye',
                                    'metric' => '40+ Sahne',
                                    'title' => 'AI Sahne Modu',
                                    'description' => 'Gece, yemek, portre dahil 40\'tan fazla sahneyi tanır; renk, kontrast ve netliği otomatik ayarlar.',
                                ],
                                [
                                    'icon' => 'bolt',
                                    'metric' => '0.3 sn',
                                    'title' => 'Phase-Detect AF',
                                    'description' => 'Faz algılama otomatik odaklama, hareket eden nesneleri bile 0.3 saniye altında kilitler.',
                                ],
                                [
                                    'icon' => 'star',
                                    'metric' => 'HDR',
                                    'title' => 'HDR',
                                    'description' => 'Yüksek dinamik aralık, arka ışıkta bile hem gölgeleri hem açık alanları dengede tutar.',
                                ],
                                [
                                    'icon' => 'camera',
                                    'metric' => '8 MP',
                                    'title' => 'Ön Kamera',
                                    'description' => 'Punch-hole ön kamera, gün ışığında ve iç mekânda doğal ten tonları için ayarlanmıştır.',
                                ],
                                [
                                    'icon' => 'music',
                                    'metric' => '1080p',
                                    'title' => 'Video',
                                    'description' => '1080p Full HD video, elektronik görüntü sabitleme ve yapay zekâ gürültü azaltma ile.',
                                ],
                            ],
                        ],
                        'camera_cards' => [
                            'eyebrow' => 'Kamera Sistemi',
                            'title' => 'Her açıdan<br/>mükemmel çekim.',
                        ],
                        'display' => [
                            'eyebrow' => 'Ekran',
                            'title' => '90 Hz akıcılık.<br/>Her kaydırmada<br/>hissedilir.',
                            'items' => [
                                [
                                    'text' => '6.56 inç HD+ IPS LCD · 1612 × 720 px',
                                ],
                                [
                                    'text' => '90 Hz yüksek yenileme hızı',
                                ],
                                [
                                    'text' => 'Punch-hole ön kamera',
                                ],
                                [
                                    'text' => 'Multi-touch kapasitif dokunmatik',
                                ],
                            ],
                        ],
                        'performance' => [
                            'eyebrow' => 'Performans',
                            'title' => 'Hızlı. Verimli.<br/>Tüm gün yanında.',
                            'cards' => [
                                [
                                    'icon' => 'cpu',
                                    'metric' => 'Octa-core',
                                    'title' => 'İşlemci',
                                    'description' => 'Octa-core 1.6 GHz işlemci, 12 nm süreçle verimli ve hızlı çok görevli kullanım sunar.',
                                ],
                                [
                                    'icon' => 'bolt',
                                    'metric' => '4 GB RAM',
                                    'title' => 'Bellek',
                                    'description' => '4 GB RAM ile uygulamalar arasında akıcı geçiş. 128 GB dahili depolama, microSD ile genişletilebilir.',
                                ],
                                [
                                    'icon' => 'battery',
                                    'metric' => '18 W',
                                    'title' => 'Hızlı Şarj',
                                    'description' => '5000 mAh batarya, 18 W hızlı şarj desteğiyle kısa bir molada saatlerce ek kullanım sağlar.',
                                ],
                                [
                                    'icon' => 'shield',
                                    'metric' => null,
                                    'title' => 'Güvenlik',
                                    'description' => 'Yan parmak izi sensörü + yüz tanıma. Çift katmanlı kimlik doğrulamayla verileriniz güvende.',
                                ],
                                [
                                    'icon' => 'wifi',
                                    'metric' => '4G LTE',
                                    'title' => 'Bağlantı',
                                    'description' => '4G LTE, Wi-Fi 802.11 a/b/g/n, Bluetooth 5.0, GPS + GLONASS ve USB-C 2.0.',
                                ],
                                [
                                    'icon' => 'star',
                                    'metric' => null,
                                    'title' => 'Türkiye Yapımı',
                                    'description' => 'Her V11 Lite, yerli üretim tesislerimizde üretilir. 24 aylık Türkiye garantisi ile teslim edilir.',
                                ],
                            ],
                        ],
                        'battery' => [
                            'eyebrow' => 'Batarya',
                            'title' => 'Bir şarjla<br/>tüm gün.',
                            'items' => [
                                [
                                    'text' => '5000 mAh Li-ion batarya',
                                ],
                                [
                                    'text' => '18 W kablolu hızlı şarj',
                                ],
                                [
                                    'text' => 'USB-C bağlantısı',
                                ],
                            ],
                        ],
                        'cinema' => [
                            'slides' => [
                                [
                                    'eyebrow' => 'Tasarım',
                                    'title' => 'Kamera mühendisliği<br/>sahnede.',
                                    'description' => '50 MP dairesel kamera modülü, Ovion imzası ve parmak izi dirençli İnci Beyazı yüzey.',
                                ],
                                [
                                    'eyebrow' => 'Profil',
                                    'title' => '8.45 mm.<br/>Elde kaybolur.',
                                    'description' => '164 mm gövdede 8.45 mm ince profil. Alüminyum çerçeve, her kenarda milimetrenin onda biri hassasiyetinde.',
                                ],
                                [
                                    'eyebrow' => 'Tuşlar',
                                    'title' => 'Yan tuştan<br/>güce ulaş.',
                                    'description' => 'Yan yerleşimli parmak izi sensörü, fiziksel ses tuşları ve USB-C bağlantısı.',
                                ],
                                [
                                    'eyebrow' => 'Renk',
                                    'title' => 'İnci Beyazı.<br/>Bir ton, sonsuz ışık.',
                                    'description' => 'Işıkla oynayan İnci Beyazı kaplama, günün her saatinde farklı bir görünüm sunar.',
                                ],
                            ],
                        ],
                        'specs_section' => [
                            'eyebrow' => 'Teknik Özellikler',
                            'title' => 'Her detayı<br/>burada bulursunuz.',
                        ],
                        'buy_section' => [
                            'eyebrow' => 'Satın Al',
                            'title' => 'Hazır olduğunda<br/>buradayız.',
                        ],
                    ],
                    'en' => [
                        'collection_card' => [
                            'description' => '90 Hz · 50 MP AI Camera · 5000 mAh',
                        ],
                        'hero' => [
                            'byline' => 'Meet the 50 MP AI camera.',
                        ],
                        'camera' => [
                            'eyebrow' => 'Camera',
                            'title' => '50 MP sensor.<br/>Trained to read<br/>the light.',
                            'cards' => [
                                [
                                    'icon' => 'camera',
                                    'metric' => '50 MP',
                                    'title' => 'Main Camera',
                                    'description' => 'A large-pixel sensor that holds detail in low light without flattening skin tones.',
                                ],
                                [
                                    'icon' => 'eye',
                                    'metric' => '40+ Scenes',
                                    'title' => 'AI Scene Mode',
                                    'description' => 'Recognises over 40 scenes including night, food and portrait, automatically tuning colour, contrast and sharpening.',
                                ],
                                [
                                    'icon' => 'bolt',
                                    'metric' => '0.3 s',
                                    'title' => 'Phase-Detect AF',
                                    'description' => 'Phase-detect autofocus locks even on moving subjects in under 0.3 s.',
                                ],
                                [
                                    'icon' => 'star',
                                    'metric' => 'HDR',
                                    'title' => 'HDR',
                                    'description' => 'High dynamic range keeps shadows and highlights balanced, even in backlight.',
                                ],
                                [
                                    'icon' => 'camera',
                                    'metric' => '8 MP',
                                    'title' => 'Front Camera',
                                    'description' => 'A punch-hole front camera tuned for natural skin tones in daylight and indoors.',
                                ],
                                [
                                    'icon' => 'music',
                                    'metric' => '1080p',
                                    'title' => 'Video',
                                    'description' => '1080p Full HD video with electronic image stabilisation and AI noise reduction.',
                                ],
                            ],
                        ],
                        'camera_cards' => [
                            'eyebrow' => 'Camera System',
                            'title' => 'A perfect shot<br/>from every angle.',
                        ],
                        'display' => [
                            'eyebrow' => 'Display',
                            'title' => '90 Hz fluidity.<br/>Felt with every<br/>swipe.',
                            'items' => [
                                [
                                    'text' => '6.56-inch HD+ IPS LCD · 1612 × 720 px',
                                ],
                                [
                                    'text' => '90 Hz high refresh rate',
                                ],
                                [
                                    'text' => 'Punch-hole front camera',
                                ],
                                [
                                    'text' => 'Multi-touch capacitive surface',
                                ],
                            ],
                        ],
                        'display_list' => [
                            'eyebrow' => 'Display Technology',
                            'title' => 'Brightness tuned<br/>for every kind of content.',
                            'description' => 'A multi-touch 6.56-inch HD+ IPS panel with a punch-hole front camera offers maximum screen area. Readable even in sunlight.',
                        ],
                        'cinema' => [
                            'slides' => [
                                [
                                    'eyebrow' => 'Design',
                                    'title' => 'Camera engineering<br/>on display.',
                                    'description' => 'A 50 MP circular camera module, the Ovion signature and a fingerprint-resistant Pearl White surface.',
                                ],
                                [
                                    'eyebrow' => 'Profile',
                                    'title' => '8.45 mm.<br/>Disappears in your hand.',
                                    'description' => '8.45 mm slim profile in a 164 mm body. An aluminium frame, accurate to within a tenth of a millimetre on every edge.',
                                ],
                                [
                                    'eyebrow' => 'Buttons',
                                    'title' => 'Power at<br/>your fingertip.',
                                    'description' => 'A side-mounted fingerprint sensor, physical volume keys and a USB-C port.',
                                ],
                                [
                                    'eyebrow' => 'Colour',
                                    'title' => 'Pearl White.<br/>One tone, infinite light.',
                                    'description' => 'A Pearl White finish that plays with light, looking different from morning to night.',
                                ],
                            ],
                        ],
                        'performance' => [
                            'eyebrow' => 'Performance',
                            'title' => 'Fast. Efficient.<br/>By your side all day.',
                            'cards' => [
                                [
                                    'icon' => 'cpu',
                                    'metric' => 'Octa-core',
                                    'title' => 'Processor',
                                    'description' => 'Octa-core 1.6 GHz CPU on a 12 nm process for fast, efficient multitasking.',
                                ],
                                [
                                    'icon' => 'bolt',
                                    'metric' => '4 GB RAM',
                                    'title' => 'Memory',
                                    'description' => 'Smooth app switching with 4 GB RAM. 128 GB internal storage, expandable via microSD.',
                                ],
                                [
                                    'icon' => 'battery',
                                    'metric' => '18 W',
                                    'title' => 'Fast Charging',
                                    'description' => 'A 5000 mAh battery with 18 W fast charging gives you hours of extra use after a short break.',
                                ],
                                [
                                    'icon' => 'shield',
                                    'metric' => null,
                                    'title' => 'Security',
                                    'description' => 'Side fingerprint sensor + face recognition. Two layers of authentication keep your data safe.',
                                ],
                                [
                                    'icon' => 'wifi',
                                    'metric' => '4G LTE',
                                    'title' => 'Connectivity',
                                    'description' => '4G LTE, Wi-Fi 802.11 a/b/g/n, Bluetooth 5.0, GPS + GLONASS and USB-C 2.0.',
                                ],
                                [
                                    'icon' => 'star',
                                    'metric' => null,
                                    'title' => 'Made in Türkiye',
                                    'description' => 'Every V11 Lite is built in our domestic facilities. Delivered with a 24-month Türkiye warranty.',
                                ],
                            ],
                        ],
                        'battery' => [
                            'eyebrow' => 'Battery',
                            'title' => 'A full day<br/>on one charge.',
                            'items' => [
                                [
                                    'text' => '5000 mAh Li-ion battery',
                                ],
                                [
                                    'text' => '18 W wired fast charging',
                                ],
                                [
                                    'text' => 'USB-C connection',
                                ],
                            ],
                        ],
                        'specs_section' => [
                            'eyebrow' => 'Specifications',
                            'title' => 'Every detail,<br/>right here.',
                        ],
                        'buy_section' => [
                            'eyebrow' => 'Buy',
                            'title' => 'Ready when<br/>you are.',
                        ],
                    ],
                ],
                'specs' => [
                    'tr' => [
                        [
                            'key' => 'Ekran',
                            'value' => '6.56 inç HD+ IPS LCD',
                            'note' => '1612 × 720 px · 90 Hz · Multi-touch',
                        ],
                        [
                            'key' => 'İşlemci',
                            'value' => 'Unisoc T606',
                            'note' => 'Octa-core · 1.6 GHz · 12 nm',
                        ],
                        [
                            'key' => 'Bellek',
                            'value' => '4 GB RAM · 128 GB Depolama',
                            'note' => 'microSD ile genişletilebilir',
                        ],
                        [
                            'key' => 'Ana Kamera',
                            'value' => '50 MP f/1.8',
                            'note' => 'PDAF · HDR · AI Sahne Modu',
                        ],
                        [
                            'key' => 'Ön Kamera',
                            'value' => '8 MP f/2.0',
                            'note' => 'Punch-hole · Sabit odak',
                        ],
                        [
                            'key' => 'Batarya',
                            'value' => '5000 mAh',
                            'note' => '18 W hızlı şarj · USB-C',
                        ],
                        [
                            'key' => 'İşletim Sistemi',
                            'value' => 'Android 14',
                            'note' => 'Özelleştirilmiş OvionUI arayüzü',
                        ],
                        [
                            'key' => 'Bağlantı',
                            'value' => '4G LTE · Wi-Fi ac · BT 5.0 · GPS',
                            'note' => 'GLONASS · USB-C 2.0 · 3.5 mm jack',
                        ],
                        [
                            'key' => 'Güvenlik',
                            'value' => 'Yan parmak izi sensörü',
                            'note' => 'Yüz tanıma',
                        ],
                        [
                            'key' => 'Boyutlar',
                            'value' => '164.3 × 76.0 × 8.45 mm',
                            'note' => '179 g',
                        ],
                        [
                            'key' => 'SIM',
                            'value' => 'Çift Nano-SIM',
                            'note' => 'Dual Standby',
                        ],
                        [
                            'key' => 'Renk',
                            'value' => 'İnci Beyazı',
                            'note' => 'Türkiye\'de tasarlandı ve üretildi',
                        ],
                    ],
                    'en' => [
                        [
                            'key' => 'Display',
                            'value' => '6.56-inch HD+ IPS LCD',
                            'note' => '1612 × 720 px · 90 Hz · Multi-touch',
                        ],
                        [
                            'key' => 'Processor',
                            'value' => 'Unisoc T606',
                            'note' => 'Octa-core · 1.6 GHz · 12 nm',
                        ],
                        [
                            'key' => 'Memory',
                            'value' => '4 GB RAM · 128 GB Storage',
                            'note' => 'Expandable via microSD',
                        ],
                        [
                            'key' => 'Main Camera',
                            'value' => '50 MP f/1.8',
                            'note' => 'PDAF · HDR · AI Scene Mode',
                        ],
                        [
                            'key' => 'Front Camera',
                            'value' => '8 MP f/2.0',
                            'note' => 'Punch-hole · Fixed focus',
                        ],
                        [
                            'key' => 'Battery',
                            'value' => '5000 mAh',
                            'note' => '18 W fast charge · USB-C',
                        ],
                        [
                            'key' => 'Operating System',
                            'value' => 'Android 14',
                            'note' => 'Custom OvionUI interface',
                        ],
                        [
                            'key' => 'Connectivity',
                            'value' => '4G LTE · Wi-Fi ac · BT 5.0 · GPS',
                            'note' => 'GLONASS · USB-C 2.0 · 3.5 mm jack',
                        ],
                        [
                            'key' => 'Security',
                            'value' => 'Side fingerprint sensor',
                            'note' => 'Face recognition',
                        ],
                        [
                            'key' => 'Dimensions',
                            'value' => '164.3 × 76.0 × 8.45 mm',
                            'note' => '179 g',
                        ],
                        [
                            'key' => 'SIM',
                            'value' => 'Dual Nano-SIM',
                            'note' => 'Dual Standby',
                        ],
                        [
                            'key' => 'Colour',
                            'value' => 'Pearl White',
                            'note' => 'Designed and made in Türkiye',
                        ],
                    ],
                ],
                'price' => 4999,
                'price_label' => [
                    'tr' => null,
                ],
                'price_note' => [
                    'tr' => '24 ay Türkiye garantisi · Ücretsiz kargo · Ücretsiz iade (30 gün)',
                    'en' => '24-month Türkiye warranty · Free shipping · Free returns (30 days)',
                ],
                'cta_primary' => [
                    'tr' => 'Sepete Ekle',
                    'en' => 'Add to Cart',
                ],
                'cta_secondary' => [
                    'tr' => 'Teknik Özellikler',
                    'en' => 'Specifications',
                ],
                'buy_url' => null,
                'cta_secondary_url' => null,
                'meta_title' => [
                    'tr' => 'Ovion V11 Lite — 50 MP AI Kamera · 90 Hz · 5000 mAh',
                    'en' => 'Ovion V11 Lite — 50 MP AI Camera · 90 Hz · 5000 mAh',
                ],
                'meta_description' => [
                    'tr' => 'Ovion V11 Lite: 6.56 inç 90 Hz ekran, 50 MP yapay zekâ destekli kamera ve 5000 mAh batarya. İstanbul tasarımı, Türkiye üretimi.',
                    'en' => 'Ovion V11 Lite: 6.56-inch 90 Hz display, 50 MP AI-powered camera and 5000 mAh battery. Designed in Istanbul, made in Türkiye.',
                ],
                'is_active' => 1,
                'order' => 1,
                'is_spotlight' => 0,
            ],
            [
                'type' => 'watch',
                'slug' => [
                    'tr' => 'ovion-s3-pro',
                ],
                'name' => [
                    'tr' => 'Ovion S3 Pro',
                    'en' => 'Ovion S3 Pro',
                ],
                'eyebrow' => [
                    'tr' => 'Yeni — 2026',
                    'en' => 'New — 2026',
                ],
                'tagline' => [
                    'tr' => 'Sadece saatiniz değil,<br/>sağlık partneriniz.',
                    'en' => 'More than a watch —<br/>your health partner.',
                ],
                'strip_stats' => [
                    'tr' => [
                        [
                            'value' => '14 gün',
                            'label' => 'Batarya',
                        ],
                        [
                            'value' => '100+',
                            'label' => 'Spor Modu',
                        ],
                        [
                            'value' => '5 ATM',
                            'label' => 'Su Direnci',
                        ],
                        [
                            'value' => 'GPS',
                            'label' => 'Yerleşik',
                        ],
                        [
                            'value' => '24 ay',
                            'label' => 'Türkiye Garantisi',
                        ],
                    ],
                    'en' => [
                        [
                            'value' => '14 days',
                            'label' => 'Battery',
                        ],
                        [
                            'value' => '100+',
                            'label' => 'Sport Modes',
                        ],
                        [
                            'value' => '5 ATM',
                            'label' => 'Water resistance',
                        ],
                        [
                            'value' => 'GPS',
                            'label' => 'Built-in',
                        ],
                        [
                            'value' => '24 mo.',
                            'label' => 'Türkiye Warranty',
                        ],
                    ],
                ],
                'content' => [
                    'tr' => [
                        'collection_card' => [
                            'description' => '14 Gün Batarya · 100+ Spor Modu · 5 ATM',
                        ],
                        'health' => [
                            'eyebrow' => 'Sağlık',
                            'title' => 'Vücudunuzu<br/>dinleyen saat.',
                            'description' => 'Kalp ritminizden uykunuza, stres seviyenizden kan oksijenine — S3 Pro günün her saati sizi izler, siz izlemeden.',
                            'cards' => [
                                [
                                    'icon' => 'heart',
                                    'metric' => 'İzleme',
                                    'title' => 'Kalp Ritmi',
                                    'description' => 'Optik kalp ritmi sensörü istirahat, egzersiz ve uyku sırasında sürekli ölçüm yapar. Anormal ritimde uyarı verir.',
                                ],
                                [
                                    'icon' => 'drop',
                                    'metric' => 'Sensörü',
                                    'title' => 'Kan Oksijeni',
                                    'description' => 'Kan oksijen doygunluğunu (SpO2) saniyeler içinde ölçer. Yüksek irtifa uyarısı ve uyku apnesi tespiti sunar.',
                                ],
                                [
                                    'icon' => 'moon',
                                    'metric' => 'Aşama',
                                    'title' => 'Uyku Takibi',
                                    'description' => 'REM, derin uyku ve hafif uyku aşamalarını ayrı ayrı analiz eder. Sabah uyku kalite raporu sunar.',
                                ],
                                [
                                    'icon' => 'eye',
                                    'metric' => 'Analiz',
                                    'title' => 'Stres Seviyesi',
                                    'description' => 'Kalp ritmi değişkenliği (HRV) analizi ile günlük stres seviyenizi takip eder, nefes egzersizleri önerir.',
                                ],
                                [
                                    'icon' => 'clock',
                                    'metric' => 'Gün',
                                    'title' => 'Döngü Takibi',
                                    'description' => 'Kadın sağlığı özelliği ile menstrüel döngüyü takip eder, semptomları kaydeder ve tahmin sunar.',
                                ],
                                [
                                    'icon' => 'star',
                                    'metric' => 'Max',
                                    'title' => 'Fitness Skoru',
                                    'description' => 'VO₂ Max tahmini ile kardiyo kondisyonunuzu ölçer. Zaman içindeki gelişiminizi grafikle gösterir.',
                                ],
                            ],
                        ],
                        'health_cards' => [
                            'eyebrow' => 'Sağlık Sistemi',
                            'title' => 'Her nabzınızda<br/>bir adım öteye.',
                        ],
                        'customization' => [
                            'eyebrow' => 'Kişiselleştirme',
                            'title' => 'Her güne başka<br/>bir yüz.',
                            'faces' => [
                                [
                                    'name' => 'Sport Ring',
                                    'tags' => 'Aktivite halkaları · Kalp ritmi',
                                ],
                                [
                                    'name' => 'Klasik Altın',
                                    'tags' => 'Analog stil · Tarih · Şehir',
                                ],
                                [
                                    'name' => 'Minimal',
                                    'tags' => 'Sade · Şık · Odaklanma',
                                ],
                                [
                                    'name' => 'Data Pro',
                                    'tags' => 'GPS · Hava · SpO2',
                                ],
                            ],
                        ],
                        'design' => [
                            'eyebrow' => 'Tasarım',
                            'title' => 'Alüminyum.<br/>Hafif. Dayanıklı.',
                            'description' => 'Havacılık sınıfı alüminyum gövde, 1.96 inç AMOLED ekran ve değiştirilebilir kordon sistemi. İş toplantısından spor pistine kadar her ortama uyum sağlar.',
                            'items' => [
                                [
                                    'text' => '1.96 inç AMOLED · 410 × 502 px · 326 ppi',
                                ],
                                [
                                    'text' => 'Havacılık sınıfı alüminyum gövde',
                                ],
                                [
                                    'text' => 'Florüre kauçuk · silikon kordon dahil',
                                ],
                                [
                                    'text' => 'Değiştirilebilir 22 mm kordon sistemi',
                                ],
                                [
                                    'text' => '5 ATM su direnci · yüzme uyumlu',
                                ],
                            ],
                        ],
                        'activity' => [
                            'eyebrow' => 'Aktivite & GPS',
                            'title' => 'Koşuyor,<br/>izliyor,<br/>analiz ediyor.',
                            'description' => 'Yerleşik GPS ile parkur haritanızı çizin. 100\'den fazla spor modundan birini seçin. S3 Pro her adımı, her kaloriyi, her rakım değişimini kaydeder.',
                            'stats' => [
                                [
                                    'value' => '100+',
                                    'label' => 'Spor Modu',
                                ],
                                [
                                    'value' => 'GPS',
                                    'label' => '+ GLONASS',
                                ],
                                [
                                    'value' => '5 ATM',
                                    'label' => 'Su Direnci',
                                ],
                            ],
                        ],
                        'battery' => [
                            'eyebrow' => 'Batarya',
                            'title' => '14 gün.<br/>Şarj\'ı<br/>unutun.',
                            'description' => 'Gelişmiş düşük güç mimarisi sayesinde S3 Pro tek şarjla 14 güne kadar dayanır. GPS aktifken bile 30 saate kadar sürekli çalışır.',
                            'items' => [
                                [
                                    'text' => '14 gün tipik kullanım',
                                ],
                                [
                                    'text' => '30 saat GPS modu',
                                ],
                                [
                                    'text' => 'Manyetik hızlı şarj · 2 saatte tam dolu',
                                ],
                                [
                                    'text' => 'Güç tasarrufu modunda 30 güne kadar',
                                ],
                            ],
                        ],
                        'specs_section' => [
                            'eyebrow' => 'Teknik Özellikler',
                            'title' => 'Her detay,<br/>burada.',
                        ],
                        'buy_section' => [
                            'eyebrow' => 'Satın Al',
                            'title' => 'Sağlığınıza<br/>en iyi yatırım.',
                        ],
                    ],
                    'en' => [
                        'collection_card' => [
                            'description' => '14 Gün Batarya · 100+ Spor Modu · 5 ATM',
                        ],
                        'health' => [
                            'eyebrow' => 'Health',
                            'title' => 'A watch that<br/>listens to your body.',
                            'description' => 'From heart rate to sleep, stress level to blood oxygen — the S3 Pro watches over you every hour, without you having to.',
                            'cards' => [
                                [
                                    'icon' => 'heart',
                                    'metric' => 'Monitoring',
                                    'title' => 'Heart Rate',
                                    'description' => 'An optical heart rate sensor measures continuously at rest, during exercise and while you sleep. Alerts you to abnormal rhythms.',
                                ],
                                [
                                    'icon' => 'drop',
                                    'metric' => 'Sensor',
                                    'title' => 'Blood Oxygen',
                                    'description' => 'Measures blood oxygen saturation (SpO2) in seconds. Includes high-altitude alerts and sleep apnoea detection.',
                                ],
                                [
                                    'icon' => 'moon',
                                    'metric' => 'Stages',
                                    'title' => 'Sleep Tracking',
                                    'description' => 'Analyses REM, deep and light sleep stages separately. Delivers a sleep quality report in the morning.',
                                ],
                                [
                                    'icon' => 'eye',
                                    'metric' => 'Analysis',
                                    'title' => 'Stress Level',
                                    'description' => 'Tracks daily stress via heart rate variability (HRV) analysis and suggests breathing exercises.',
                                ],
                                [
                                    'icon' => 'clock',
                                    'metric' => 'Day',
                                    'title' => 'Cycle Tracking',
                                    'description' => 'Women\'s health features track the menstrual cycle, log symptoms and provide predictions.',
                                ],
                                [
                                    'icon' => 'star',
                                    'metric' => 'Max',
                                    'title' => 'Fitness Score',
                                    'description' => 'VO₂ Max estimation measures cardio fitness. Tracks your progress over time on a graph.',
                                ],
                            ],
                        ],
                        'health_cards' => [
                            'eyebrow' => 'Health System',
                            'title' => 'One step further<br/>with every beat.',
                        ],
                        'customization' => [
                            'eyebrow' => 'Personalisation',
                            'title' => 'A new face<br/>for every day.',
                            'faces' => [
                                [
                                    'name' => 'Sport Ring',
                                    'tags' => 'Activity rings · Heart rate',
                                ],
                                [
                                    'name' => 'Classic Gold',
                                    'tags' => 'Analog style · Date · City',
                                ],
                                [
                                    'name' => 'Minimal',
                                    'tags' => 'Simple · Elegant · Focus',
                                ],
                                [
                                    'name' => 'Data Pro',
                                    'tags' => 'GPS · Weather · SpO2',
                                ],
                            ],
                        ],
                        'design' => [
                            'eyebrow' => 'Design',
                            'title' => 'Aluminium.<br/>Light. Durable.',
                            'description' => 'Aerospace-grade aluminium body, 1.96-inch AMOLED display and an interchangeable strap system. Fits everywhere from the boardroom to the running track.',
                            'items' => [
                                [
                                    'text' => '1.96-inch AMOLED · 410 × 502 px · 326 ppi',
                                ],
                                [
                                    'text' => 'Aerospace-grade aluminium body',
                                ],
                                [
                                    'text' => 'Fluoroelastomer · silicone strap included',
                                ],
                                [
                                    'text' => 'Interchangeable 22 mm strap system',
                                ],
                                [
                                    'text' => '5 ATM water resistance · swim-friendly',
                                ],
                            ],
                        ],
                        'activity' => [
                            'eyebrow' => 'Activity & GPS',
                            'title' => 'Running,<br/>watching,<br/>analysing.',
                            'description' => 'Map your route with built-in GPS. Pick from over 100 sport modes. The S3 Pro records every step, every calorie, every change in elevation.',
                            'stats' => [
                                [
                                    'value' => '100+',
                                    'label' => 'Sport Modes',
                                ],
                                [
                                    'value' => 'GPS',
                                    'label' => '+ GLONASS',
                                ],
                                [
                                    'value' => '5 ATM',
                                    'label' => 'Water resistance',
                                ],
                            ],
                        ],
                        'battery' => [
                            'eyebrow' => 'Battery',
                            'title' => '14 days.<br/>Forget the<br/>charger.',
                            'description' => 'Thanks to advanced low-power architecture, the S3 Pro lasts up to 14 days on a single charge. Even with GPS active, it runs continuously for up to 30 hours.',
                            'items' => [
                                [
                                    'text' => '14 days typical use',
                                ],
                                [
                                    'text' => '30 hours of GPS mode',
                                ],
                                [
                                    'text' => 'Magnetic fast charge · full in 2 h',
                                ],
                                [
                                    'text' => 'Up to 30 days in power-save mode',
                                ],
                            ],
                        ],
                        'specs_section' => [
                            'eyebrow' => 'Specifications',
                            'title' => 'Every detail,<br/>right here.',
                        ],
                        'buy_section' => [
                            'eyebrow' => 'Buy',
                            'title' => 'The best investment<br/>in your health.',
                        ],
                    ],
                ],
                'specs' => [
                    'tr' => [
                        [
                            'key' => 'Ekran',
                            'value' => '1.96 inç AMOLED',
                            'note' => '410 × 502 px · 326 ppi · Always-On',
                        ],
                        [
                            'key' => 'İşlemci',
                            'value' => 'Dual-core akıllı saat SoC',
                            'note' => 'Düşük güç + ana çekirdek',
                        ],
                        [
                            'key' => 'Batarya',
                            'value' => '500 mAh',
                            'note' => '14 gün tipik · 30 saat GPS · 2 sa. şarj',
                        ],
                        [
                            'key' => 'Sensörler',
                            'value' => 'Kalp ritmi · SpO2 · İvme · Jiroskop',
                            'note' => 'Barometre · Pusula · Sıcaklık',
                        ],
                        [
                            'key' => 'Konum',
                            'value' => 'GPS + GLONASS + BeiDou',
                            'note' => 'Galileo dahil çoklu uydu sistemi',
                        ],
                        [
                            'key' => 'Bağlantı',
                            'value' => 'Bluetooth 5.3',
                            'note' => 'Android 8+ / iOS 14+ uyumlu',
                        ],
                        [
                            'key' => 'Spor Modları',
                            'value' => '100\'den fazla mod',
                            'note' => 'Koşu · Yüzme · Bisiklet · Yoga · HIIT',
                        ],
                        [
                            'key' => 'Sağlık',
                            'value' => '24/7 kalp ritmi · Uyku takibi',
                            'note' => 'Stres · SpO2 · VO₂Max · Döngü takibi',
                        ],
                        [
                            'key' => 'Su Direnci',
                            'value' => '5 ATM (50 metre)',
                            'note' => 'Yüzme uyumlu · Su sporları',
                        ],
                        [
                            'key' => 'Gövde',
                            'value' => 'Havacılık alüminyum · Mineral cam',
                            'note' => '46 mm · 39 g (kordon hariç)',
                        ],
                        [
                            'key' => 'Kordon',
                            'value' => '22 mm değiştirilebilir',
                            'note' => 'Florüre kauçuk · silikon · naylon seçenek',
                        ],
                        [
                            'key' => 'Renk',
                            'value' => 'Uzay Grisi · Yıldız Işığı · Koral',
                            'note' => 'Türkiye\'de tasarlandı ve üretildi',
                        ],
                    ],
                    'en' => [
                        [
                            'key' => 'Display',
                            'value' => '1.96-inch AMOLED',
                            'note' => '410 × 502 px · 326 ppi · Always-On',
                        ],
                        [
                            'key' => 'Processor',
                            'value' => 'Dual-core smartwatch SoC',
                            'note' => 'Low-power + main core',
                        ],
                        [
                            'key' => 'Battery',
                            'value' => '500 mAh',
                            'note' => '14 days typical · 30 h GPS · 2 h charge',
                        ],
                        [
                            'key' => 'Sensors',
                            'value' => 'Heart rate · SpO2 · Accelerometer · Gyroscope',
                            'note' => 'Barometer · Compass · Temperature',
                        ],
                        [
                            'key' => 'Location',
                            'value' => 'GPS + GLONASS + BeiDou',
                            'note' => 'Multi-satellite system including Galileo',
                        ],
                        [
                            'key' => 'Connectivity',
                            'value' => 'Bluetooth 5.3',
                            'note' => 'Android 8+ / iOS 14+ compatible',
                        ],
                        [
                            'key' => 'Sport Modes',
                            'value' => 'Over 100 modes',
                            'note' => 'Running · Swimming · Cycling · Yoga · HIIT',
                        ],
                        [
                            'key' => 'Health',
                            'value' => '24/7 heart rate · Sleep tracking',
                            'note' => 'Stress · SpO2 · VO₂Max · Cycle tracking',
                        ],
                        [
                            'key' => 'Water Resistance',
                            'value' => '5 ATM (50 metres)',
                            'note' => 'Swim-friendly · Water sports',
                        ],
                        [
                            'key' => 'Body',
                            'value' => 'Aerospace aluminium · Mineral glass',
                            'note' => '46 mm · 39 g (without strap)',
                        ],
                        [
                            'key' => 'Strap',
                            'value' => '22 mm interchangeable',
                            'note' => 'Fluoroelastomer · silicone · nylon options',
                        ],
                        [
                            'key' => 'Colour',
                            'value' => 'Space Grey · Starlight · Coral',
                            'note' => 'Designed and made in Türkiye',
                        ],
                    ],
                ],
                'price' => 2499,
                'price_label' => [
                    'tr' => null,
                ],
                'price_note' => [
                    'tr' => '24 ay Türkiye garantisi · Ücretsiz kargo · Ücretsiz iade (30 gün)',
                    'en' => '24-month Türkiye warranty · Free shipping · Free returns (30 days)',
                ],
                'cta_primary' => [
                    'tr' => 'Sepete Ekle',
                    'en' => 'Add to Cart',
                ],
                'cta_secondary' => [
                    'tr' => 'Teknik Özellikler',
                    'en' => 'Specifications',
                ],
                'buy_url' => null,
                'cta_secondary_url' => null,
                'meta_title' => [
                    'tr' => 'Ovion S3 Pro — Sağlık · GPS · 14 Gün Batarya',
                    'en' => 'Ovion S3 Pro — Health · GPS · 14-Day Battery',
                ],
                'meta_description' => [
                    'tr' => 'Ovion S3 Pro akıllı saat: 100\'den fazla spor modu, 14 gün batarya ömrü, kalp ritmi ve SpO2 takibi ile her anınızda yanınızda.',
                    'en' => 'Ovion S3 Pro smartwatch: over 100 sport modes, 14-day battery life, heart rate and SpO2 tracking — by your side every moment.',
                ],
                'is_active' => 1,
                'order' => 2,
                'is_spotlight' => 1,
            ],
            [
                'type' => 'headphone',
                'slug' => [
                    'tr' => 'ovion-h1-pro',
                ],
                'name' => [
                    'tr' => 'Ovion H1 Pro',
                    'en' => 'Ovion H1 Pro',
                ],
                'eyebrow' => [
                    'tr' => 'Yeni — 2025',
                    'en' => 'New — 2025',
                ],
                'tagline' => [
                    'tr' => 'Sessizlik. Müzik. Özgürlük.',
                    'en' => 'Silence. Music. Freedom.',
                ],
                'strip_stats' => [
                    'tr' => [
                        [
                            'value' => '30 saat',
                            'label' => 'Batarya (ANC Açık)',
                        ],
                        [
                            'value' => '40 mm',
                            'label' => 'Hi-Fi Sürücü',
                        ],
                        [
                            'value' => 'ANC',
                            'label' => '–38 dB Azaltma',
                        ],
                        [
                            'value' => '3',
                            'label' => 'Mikrofon Sistemi',
                        ],
                        [
                            'value' => 'BT 5.3',
                            'label' => 'Multipoint',
                        ],
                    ],
                    'en' => [
                        [
                            'value' => '30 h',
                            'label' => 'Battery (ANC On)',
                        ],
                        [
                            'value' => '40 mm',
                            'label' => 'Hi-Fi Driver',
                        ],
                        [
                            'value' => 'ANC',
                            'label' => '–38 dB Reduction',
                        ],
                        [
                            'value' => '3',
                            'label' => 'Microphone System',
                        ],
                        [
                            'value' => 'BT 5.3',
                            'label' => 'Multipoint',
                        ],
                    ],
                ],
                'content' => [
                    'tr' => [
                        'collection_card' => [
                            'description' => 'Hibrit ANC · 40 mm Hi-Fi · 30 saat batarya',
                        ],
                        'anc' => [
                            'eyebrow' => 'Aktif Gürültü Engelleme',
                            'title' => 'Dünyanın gürültüsünü<br/>kapat.',
                            'description' => 'Hibrit ANC teknolojisi, çevrenizi gerçek zamanlı analiz ederek –38 dB\'e kadar gürültü azaltma sağlar. Uçakta, metroda, ofiste — tam sessizlik.',
                            'db_value' => '38',
                            'cards' => [
                                [
                                    'icon' => 'shield',
                                    'metric' => '–38 dB',
                                    'title' => 'Hibrit ANC',
                                    'description' => '3 mikrofon sistemi, kulak içi ve kulak dışı sesi eş zamanlı analiz ederek –38 dB gürültü azaltma sağlar. Uçak motoru, metro gürültüsü, ofis kalabalığı — hepsi sessizliğe döner.',
                                ],
                                [
                                    'icon' => 'mic',
                                    'metric' => null,
                                    'title' => 'Çevre Sesi Modu',
                                    'description' => 'Havalimanı anonsları, trafik uyarıları veya bir konuşmayı kaçırmak istemiyorsanız Çevre Sesi Modu çevrenizle bağlantıda kalmanızı sağlar. Kulaklığı çıkarmaya gerek yok.',
                                ],
                                [
                                    'icon' => 'cpu',
                                    'metric' => 'AI',
                                    'title' => 'Adaptif ANC',
                                    'description' => 'Ortamı sürekli dinleyen yapay zekâ algoritması, ANC seviyesini otomatik olarak ayarlar. Sakin bir kafede hafif, kalabalık bir metroda maksimum koruma — sizin müdahalenize gerek yok.',
                                ],
                            ],
                        ],
                        'anc_cards' => [
                            'eyebrow' => 'Gürültü Engelleme Sistemi',
                            'title' => 'Üç katmanlı<br/>sessizlik teknolojisi.',
                        ],
                        'sound' => [
                            'eyebrow' => 'Ses Kalitesi',
                            'title' => 'Stüdyo kalitesi<br/>kulağınızda.',
                            'description' => '40 mm özel Hi-Fi sürücüler, 20 Hz – 20 kHz tam frekans aralığında kusursuz ses yeniden üretimi sağlar. LDAC ve aptX HD codec desteğiyle kayıpsız kablosuz ses.',
                            'items' => [
                                [
                                    'text' => '40 mm özel dinamik sürücü',
                                ],
                                [
                                    'text' => '20 Hz – 20 kHz frekans yanıtı',
                                ],
                                [
                                    'text' => 'LDAC · aptX HD · AAC · SBC codec',
                                ],
                                [
                                    'text' => '32 Ω empedans · 103 dB/mW hassasiyet',
                                ],
                            ],
                        ],
                        'design' => [
                            'eyebrow' => 'Tasarım',
                            'title' => 'Taşınmak için<br/>tasarlandı.',
                            'description' => 'Katlanabilir tasarımı sayesinde çantanıza sığar, 285 g ağırlığıyla saatlerce konforla taşınır. Bellek köpüğü kulak yastıkları, uzun dinleme seanslarında kulağınızı rahat tutar.',
                            'items' => [
                                [
                                    'text' => 'Katlanabilir tasarım — seyahat dostu',
                                ],
                                [
                                    'text' => '285 g hafif gövde',
                                ],
                                [
                                    'text' => 'Bellek köpüğü kulak yastıkları',
                                ],
                                [
                                    'text' => 'Ayarlanabilir alüminyum kafa bandı',
                                ],
                            ],
                        ],
                        'battery' => [
                            'eyebrow' => 'Batarya',
                            'title' => '30 saat<br/>kesintisiz müzik.',
                            'description' => 'ANC açık olsa bile 30 saat çalma süresi sunar. ANC\'yi kapattığınızda 40 saate ulaşır. Sabah kahveniz hazırlanırken 10 dakika şarjla 3 saatlik müzik.',
                            'stats' => [
                                [
                                    'value' => '30 saat',
                                    'label' => 'ANC Açık',
                                ],
                                [
                                    'value' => '40 saat',
                                    'label' => 'ANC Kapalı',
                                ],
                                [
                                    'value' => '3 saat',
                                    'label' => '10 dk Şarjla',
                                ],
                            ],
                        ],
                        'connectivity' => [
                            'eyebrow' => 'Bağlantı',
                            'title' => 'Her cihaza,<br/>her anda bağlı.',
                            'cards' => [
                                [
                                    'icon' => 'wifi',
                                    'metric' => '2 cihaz',
                                    'title' => 'Bluetooth 5.3 Multipoint',
                                    'description' => 'Telefon ve bilgisayarınıza aynı anda bağlı kalın. Toplantıya giren çağrıyı bilgisayardan telefona anında aktarın — kesinti yok, kapatma yok.',
                                ],
                                [
                                    'icon' => 'bolt',
                                    'metric' => null,
                                    'title' => 'USB-C + 3.5 mm',
                                    'description' => 'USB-C ile hızlı şarj ve kablolu dinleme. 3.5 mm jack bağlantısıyla uçakta veya pili biten cihazlarda kablo üzerinden kayıpsız ses deneyimi yaşayın.',
                                ],
                                [
                                    'icon' => 'headphone',
                                    'metric' => null,
                                    'title' => 'Touch Kontrol',
                                    'description' => 'Sağ kulak kupasındaki dokunmatik yüzey; müzik oynatma/duraklatma, ses seviyesi, ANC modu ve aramaları telefona dokunmadan yönetmenizi sağlar.',
                                ],
                            ],
                        ],
                        'specs_section' => [
                            'eyebrow' => 'Teknik Özellikler',
                            'title' => 'Her detayı<br/>burada bulursunuz.',
                        ],
                        'buy_section' => [
                            'eyebrow' => 'Satın Al',
                            'title' => 'Şimdi<br/>Sahip Ol.',
                        ],
                    ],
                    'en' => [
                        'collection_card' => [
                            'description' => 'Hibrit ANC · 40 mm Hi-Fi · 30 saat batarya',
                        ],
                        'anc' => [
                            'eyebrow' => 'Active Noise Cancellation',
                            'title' => 'Shut out<br/>the world\'s noise.',
                            'description' => 'Hybrid ANC technology analyses your surroundings in real time and reduces noise by up to –38 dB. On a plane, on the subway, in the office — total silence.',
                            'db_value' => '38',
                            'cards' => [
                                [
                                    'icon' => 'shield',
                                    'metric' => '–38 dB',
                                    'title' => 'Hybrid ANC',
                                    'description' => 'A 3-microphone system simultaneously analyses sound inside and outside the cup, delivering –38 dB of noise reduction. Aircraft engine, subway noise, office crowd — all turned to silence.',
                                ],
                                [
                                    'icon' => 'mic',
                                    'metric' => null,
                                    'title' => 'Ambient Sound Mode',
                                    'description' => 'When you don\'t want to miss airport announcements, traffic alerts or a conversation, Ambient Sound Mode keeps you connected to your surroundings. No need to take the headphones off.',
                                ],
                                [
                                    'icon' => 'cpu',
                                    'metric' => 'AI',
                                    'title' => 'Adaptive ANC',
                                    'description' => 'An AI algorithm continuously listens to your environment and automatically adjusts the ANC level. Light in a quiet café, maximum protection on a crowded subway — no input needed from you.',
                                ],
                            ],
                        ],
                        'anc_cards' => [
                            'eyebrow' => 'Noise Cancellation System',
                            'title' => 'Three-layer<br/>silence technology.',
                        ],
                        'sound' => [
                            'eyebrow' => 'Sound Quality',
                            'title' => 'Studio-grade<br/>in your ears.',
                            'description' => '40 mm custom Hi-Fi drivers deliver flawless sound reproduction across the full 20 Hz – 20 kHz range. LDAC and aptX HD codecs bring lossless wireless audio.',
                            'items' => [
                                [
                                    'text' => '40 mm custom dynamic driver',
                                ],
                                [
                                    'text' => '20 Hz – 20 kHz frequency response',
                                ],
                                [
                                    'text' => 'LDAC · aptX HD · AAC · SBC codecs',
                                ],
                                [
                                    'text' => '32 Ω impedance · 103 dB/mW sensitivity',
                                ],
                            ],
                        ],
                        'design' => [
                            'eyebrow' => 'Design',
                            'title' => 'Built<br/>to travel.',
                            'description' => 'A foldable design fits into your bag, and at 285 g it stays comfortable for hours. Memory-foam ear cushions keep your ears comfortable through long listening sessions.',
                            'items' => [
                                [
                                    'text' => 'Foldable design — travel-friendly',
                                ],
                                [
                                    'text' => '285 g lightweight body',
                                ],
                                [
                                    'text' => 'Memory-foam ear cushions',
                                ],
                                [
                                    'text' => 'Adjustable aluminium headband',
                                ],
                            ],
                        ],
                        'battery' => [
                            'eyebrow' => 'Battery',
                            'title' => '30 hours<br/>of non-stop music.',
                            'description' => 'Even with ANC on, you get 30 hours of playback. Turn ANC off and reach 40 hours. While your morning coffee brews, a 10-minute charge is good for 3 hours of music.',
                            'stats' => [
                                [
                                    'value' => '30 h',
                                    'label' => 'ANC On',
                                ],
                                [
                                    'value' => '40 h',
                                    'label' => 'ANC Off',
                                ],
                                [
                                    'value' => '3 h',
                                    'label' => 'on a 10-min charge',
                                ],
                            ],
                        ],
                        'connectivity' => [
                            'eyebrow' => 'Connectivity',
                            'title' => 'Connected<br/>to every device, every moment.',
                            'cards' => [
                                [
                                    'icon' => 'wifi',
                                    'metric' => '2 devices',
                                    'title' => 'Bluetooth 5.3 Multipoint',
                                    'description' => 'Stay connected to your phone and computer at the same time. Hand off an incoming meeting call from computer to phone instantly — no drops, no disconnects.',
                                ],
                                [
                                    'icon' => 'bolt',
                                    'metric' => null,
                                    'title' => 'USB-C + 3.5 mm',
                                    'description' => 'Fast charging and wired listening over USB-C. The 3.5 mm jack lets you enjoy lossless wired audio on a plane or with devices that have run out of battery.',
                                ],
                                [
                                    'icon' => 'headphone',
                                    'metric' => null,
                                    'title' => 'Touch Control',
                                    'description' => 'The touch surface on the right ear cup lets you control playback, volume, ANC mode and calls — all without touching your phone.',
                                ],
                            ],
                        ],
                        'specs_section' => [
                            'eyebrow' => 'Specifications',
                            'title' => 'Every detail,<br/>right here.',
                        ],
                        'buy_section' => [
                            'eyebrow' => 'Buy',
                            'title' => 'Get yours<br/>now.',
                        ],
                    ],
                ],
                'specs' => [
                    'tr' => [
                        [
                            'key' => 'Sürücü',
                            'value' => '40 mm Dinamik Hi-Fi',
                            'note' => 'Özel diyafram · Neodimyum mıknatıs',
                        ],
                        [
                            'key' => 'Frekans',
                            'value' => '20 Hz – 20.000 Hz',
                            'note' => 'Tam işitme aralığı',
                        ],
                        [
                            'key' => 'Empedans',
                            'value' => '32 Ω',
                            'note' => '103 dB/mW hassasiyet',
                        ],
                        [
                            'key' => 'Batarya',
                            'value' => '30 saat (ANC açık) · 40 saat (ANC kapalı)',
                            'note' => '10 dk şarj = 3 saat · USB-C',
                        ],
                        [
                            'key' => 'ANC',
                            'value' => 'Hibrit Aktif Gürültü Engelleme',
                            'note' => '–38 dB · Adaptif mod · Çevre sesi modu',
                        ],
                        [
                            'key' => 'Bluetooth',
                            'value' => '5.3 · Multipoint (2 cihaz)',
                            'note' => '10 m menzil',
                        ],
                        [
                            'key' => 'Codec',
                            'value' => 'LDAC · aptX HD · AAC · SBC',
                            'note' => 'Kayıpsız kablosuz ses',
                        ],
                        [
                            'key' => 'Ağırlık',
                            'value' => '285 g',
                            'note' => 'Katlanabilir tasarım',
                        ],
                        [
                            'key' => 'Bağlantı',
                            'value' => 'USB-C · 3.5 mm stereo jack',
                            'note' => 'Kablolu mod desteği',
                        ],
                        [
                            'key' => 'Garanti',
                            'value' => '24 ay Türkiye Garantisi',
                            'note' => 'Türkiye\'de tasarlandı',
                        ],
                    ],
                    'en' => [
                        [
                            'key' => 'Driver',
                            'value' => '40 mm Dynamic Hi-Fi',
                            'note' => 'Custom diaphragm · Neodymium magnet',
                        ],
                        [
                            'key' => 'Frequency',
                            'value' => '20 Hz – 20,000 Hz',
                            'note' => 'Full hearing range',
                        ],
                        [
                            'key' => 'Impedance',
                            'value' => '32 Ω',
                            'note' => '103 dB/mW sensitivity',
                        ],
                        [
                            'key' => 'Battery',
                            'value' => '30 h (ANC on) · 40 h (ANC off)',
                            'note' => '10-min charge = 3 h · USB-C',
                        ],
                        [
                            'key' => 'ANC',
                            'value' => 'Hybrid Active Noise Cancellation',
                            'note' => '–38 dB · Adaptive mode · Ambient mode',
                        ],
                        [
                            'key' => 'Bluetooth',
                            'value' => '5.3 · Multipoint (2 devices)',
                            'note' => '10 m range',
                        ],
                        [
                            'key' => 'Codec',
                            'value' => 'LDAC · aptX HD · AAC · SBC',
                            'note' => 'Lossless wireless audio',
                        ],
                        [
                            'key' => 'Weight',
                            'value' => '285 g',
                            'note' => 'Foldable design',
                        ],
                        [
                            'key' => 'Connectivity',
                            'value' => 'USB-C · 3.5 mm stereo jack',
                            'note' => 'Wired mode supported',
                        ],
                        [
                            'key' => 'Warranty',
                            'value' => '24-month Türkiye Warranty',
                            'note' => 'Designed in Türkiye',
                        ],
                    ],
                ],
                'price' => 2499,
                'price_label' => [
                    'tr' => null,
                ],
                'price_note' => [
                    'tr' => '24 ay Türkiye garantisi · Ücretsiz kargo · Ücretsiz iade (30 gün)',
                    'en' => '24-month Türkiye warranty · Free shipping · Free returns (30 days)',
                ],
                'cta_primary' => [
                    'tr' => 'Sepete Ekle',
                    'en' => 'Add to Cart',
                ],
                'cta_secondary' => [
                    'tr' => 'Teknik Özellikler',
                    'en' => 'Specifications',
                ],
                'buy_url' => null,
                'cta_secondary_url' => null,
                'meta_title' => [
                    'tr' => 'Ovion H1 Pro — ANC Kablosuz Kulak Üstü Kulaklık · 30 Saat Batarya',
                    'en' => 'Ovion H1 Pro — ANC Wireless Over-Ear Headphones · 30-Hour Battery',
                ],
                'meta_description' => [
                    'tr' => 'Ovion H1 Pro: Hibrit ANC, 40 mm Hi-Fi sürücüler, 30 saat batarya ve Bluetooth 5.3 multipoint. Sessizlik, müzik, özgürlük.',
                    'en' => 'Ovion H1 Pro: hybrid ANC, 40 mm Hi-Fi drivers, 30-hour battery and Bluetooth 5.3 multipoint. Silence, music, freedom.',
                ],
                'is_active' => 1,
                'order' => 3,
                'is_spotlight' => 0,
            ],
        ];

        foreach ($rows as $row) {
            Product::updateOrCreate(
                ['slug->tr' => $row['slug']['tr'] ?? null],
                $row,
            );
        }
    }
}
