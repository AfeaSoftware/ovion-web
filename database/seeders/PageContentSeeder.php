<?php

namespace Database\Seeders;

use App\Models\PageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $rows = [
            [
                'type' => 'about',
                'locale' => 'tr',
                'content' => [
                    'hero_eyebrow' => 'Hakkımızda',
                    'hero_title' => 'İstanbul\'dan<br/>dünyaya<br/><em>teknoloji.</em>',
                    'hero_lede' => 'Ovion, insanların günlük hayatını kolaylaştıran akıllı cihazlar tasarlamak için 2023\'te kuruldu. Her ürün İstanbul\'da tasarlanır, Türkiye\'de üretilir.',
                    'stats' => [
                        [
                            'value' => '2023',
                            'label' => 'Kuruluş yılı',
                        ],
                        [
                            'value' => '200+',
                            'label' => 'Çalışan',
                        ],
                        [
                            'value' => '5',
                            'label' => 'Ürün ailesi',
                        ],
                        [
                            'value' => '81',
                            'label' => 'İlde servis ağı',
                        ],
                    ],
                    'story_year' => '2023',
                    'story_year_lbl' => 'Kuruluş — İstanbul',
                    'story_eyebrow' => 'Hikayemiz',
                    'story_title' => 'Türkiye\'nin kendi teknoloji markası olmalıydı.',
                    'story_p1' => 'Ovion, "neden Türkiye\'de tasarlanmış, Türkiye\'de üretilmiş bir akıllı cihaz markası yok?" sorusundan doğdu. İstanbul\'un merkezinde bir araya gelen küçük bir mühendis ve tasarımcı ekibi, bu soruyu cevaplamak için kolları sıvadı.',
                    'story_p2' => 'İlk ürünümüz V11 Lite, sadece bir telefon değil; yerli üretim ile modern tasarımın bir arada olabileceğinin kanıtıdır. Piyasaya çıktığı günden itibaren aldığı ilgi, bize daha fazlasını yapma güvenini verdi.',
                    'values_eyebrow' => 'Değerlerimiz',
                    'values_title' => 'Tasarladığımız her üründe<br/>üç ilkeyi ön planda tutarız.',
                    'values' => [
                        [
                            'title' => 'Kalite',
                            'desc' => 'Bütçe dostu fiyat, ödün verilen kalite anlamına gelmez. Her V11 Lite, üretimden çıkmadan 120 noktalı kalite testinden geçer.',
                        ],
                        [
                            'title' => 'Erişilebilirlik',
                            'desc' => 'İyi teknoloji, herkesin hayatına girmelidir. Ürünlerimizi Türkiye\'nin 81 ilinde servis ağı ve rekabetçi fiyatlarla sunuyoruz.',
                        ],
                        [
                            'title' => 'İnovasyon',
                            'desc' => 'İstanbul tasarım merkezimizde 80\'den fazla AR-GE uzmanı, yarının ürünlerini bugün geliştiriyor. Patentli sensör ve kamera teknolojileri üzerinde çalışıyoruz.',
                        ],
                    ],
                    'made_eyebrow' => 'Üretim',
                    'made_title' => 'Türkiye\'de<br/>tasarlandı.<br/><em>Türkiye\'de</em><br/>üretildi.',
                    'made_sub' => 'Fabrikamız, Anadolu Yakası\'nda 22.000 m² kapalı alanda faaliyet gösteriyor. Montaj, test ve paketleme süreçlerinin tamamı Türkiye\'de gerçekleştiriliyor. Bu, sadece bir sertifika değil; çalıştığımız 4.000\'den fazla yerel tedarikçiyle verdiğimiz bir sözdür.',
                    'tl_eyebrow' => 'Kilometre Taşları',
                    'tl_title' => 'Kısa sürede çok şeyi<br/>başardık.',
                    'timeline' => [
                        [
                            'year' => 'Oca 2023',
                            'title' => 'Ovion kuruldu',
                            'desc' => '7 kurucu ortak, İstanbul Teknopark\'ta Ovion\'u resmen kurdu. İlk ofis: 120 m², ilk ekip: 12 kişi.',
                        ],
                        [
                            'year' => 'Haz 2023',
                            'title' => 'İlk üretim tesisi devreye girdi',
                            'desc' => 'Pendik\'teki fabrika, pilot üretim hattıyla faaliyete geçti. Aynı ay Sanayi Bakanlığı\'ndan yerli üretim sertifikası alındı.',
                        ],
                        [
                            'year' => 'Mar 2024',
                            'title' => 'V11 Lite piyasaya çıktı',
                            'desc' => 'İlk ürünümüz V11 Lite, lansman gününde 10.000\'den fazla ön sipariş aldı. Ulusal basında geniş yer buldu.',
                        ],
                        [
                            'year' => 'Eyl 2024',
                            'title' => 'Saat ve kulaklık AR-GE başladı',
                            'desc' => 'Wearable ürün ailesi için AR-GE yatırımı resmileşti. S serisi saat ve H serisi kulaklık projeleri başladı.',
                        ],
                        [
                            'year' => 'Oca 2025',
                            'title' => 'S3 Pro saat tanıtıldı',
                            'desc' => 'AMOLED ekran, GPS ve 14 günlük pil ömrüyle S3 Pro, Türkiye\'nin en kapsamlı yerli akıllı saati oldu.',
                        ],
                        [
                            'year' => '2026',
                            'title' => 'Genişleme — Orta Asya ve MENA',
                            'desc' => 'Kazakistan, Azerbaycan ve BAE dağıtım anlaşmalarıyla Ovion, sınırlarımızın ötesine taşınıyor.',
                        ],
                    ],
                    'cta_eyebrow' => 'Birlikte büyüyelim',
                    'cta_title' => 'Ovion ailesine<br/>katılmak ister misin?',
                    'cta_sub' => 'Mühendis, tasarımcı, pazarlamacı ya da satış uzmanı — doğru kişiyi her zaman arıyoruz.',
                    'cta_btn1_text' => 'Açık Pozisyonlar',
                    'cta_btn1_url' => null,
                    'cta_btn2_text' => 'Ürünleri Keşfet',
                ],
            ],
            [
                'type' => 'about',
                'locale' => 'en',
                'content' => [
                    'hero_eyebrow' => 'About Us',
                    'hero_title' => 'Technology<br/>from Istanbul<br/><em>to the world.</em>',
                    'hero_lede' => 'Ovion was founded in 2023 to design smart devices that make people\'s daily lives easier. Every product is designed in Istanbul and made in Türkiye.',
                    'stats' => [
                        [
                            'value' => '2023',
                            'label' => 'Year founded',
                        ],
                        [
                            'value' => '200+',
                            'label' => 'Employees',
                        ],
                        [
                            'value' => '5',
                            'label' => 'Product lines',
                        ],
                        [
                            'value' => '81',
                            'label' => 'Cities with service',
                        ],
                    ],
                    'story_year' => '2023',
                    'story_year_lbl' => 'Founded — Istanbul',
                    'story_eyebrow' => 'Our Story',
                    'story_title' => 'Türkiye deserved its own technology brand.',
                    'story_p1' => 'Ovion was born from the question: "Why isn\'t there a smart device brand designed and made in Türkiye?" A small team of engineers and designers, gathered in the heart of Istanbul, rolled up their sleeves to answer it.',
                    'story_p2' => 'Our first product, the V11 Lite, is not just a phone — it is proof that domestic production and modern design can go hand in hand. The reception it received from day one gave us the confidence to build more.',
                    'values_eyebrow' => 'Our Values',
                    'values_title' => 'Three principles guide<br/>every product we design.',
                    'values' => [
                        [
                            'title' => 'Quality',
                            'desc' => 'An affordable price does not mean compromised quality. Every V11 Lite passes a 120-point quality check before leaving the factory.',
                        ],
                        [
                            'title' => 'Accessibility',
                            'desc' => 'Good technology should reach everyone. We offer our products with a service network spanning all 81 provinces of Türkiye at competitive prices.',
                        ],
                        [
                            'title' => 'Innovation',
                            'desc' => 'Over 80 R&D specialists at our Istanbul design centre are building tomorrow\'s products today. We are working on patented sensor and camera technologies.',
                        ],
                    ],
                    'made_eyebrow' => 'Manufacturing',
                    'made_title' => 'Designed<br/>in Türkiye.<br/><em>Made</em><br/>in Türkiye.',
                    'made_sub' => 'Our factory operates across 22,000 m² of closed space on the Anatolian side of Istanbul. Assembly, testing and packaging all happen in Türkiye. This is not just a certification — it is a promise we keep with over 4,000 local suppliers.',
                    'tl_eyebrow' => 'Milestones',
                    'tl_title' => 'A lot achieved<br/>in a short time.',
                    'timeline' => [
                        [
                            'year' => 'Jan 2023',
                            'title' => 'Ovion founded',
                            'desc' => '7 founding partners officially registered Ovion at Istanbul Technopark. First office: 120 m², first team: 12 people.',
                        ],
                        [
                            'year' => 'Jun 2023',
                            'title' => 'First production facility launched',
                            'desc' => 'The Pendik factory went live with its pilot production line. That same month, a domestic production certificate was received from the Ministry of Industry.',
                        ],
                        [
                            'year' => 'Mar 2024',
                            'title' => 'V11 Lite launched',
                            'desc' => 'Our first product, the V11 Lite, received over 10,000 pre-orders on launch day and was widely covered in the national press.',
                        ],
                        [
                            'year' => 'Sep 2024',
                            'title' => 'Watch & headphone R&D begins',
                            'desc' => 'R&D investment for the wearable product family was formalised. The S-series watch and H-series headphone projects kicked off.',
                        ],
                        [
                            'year' => 'Jan 2025',
                            'title' => 'S3 Pro watch unveiled',
                            'desc' => 'With an AMOLED display, GPS and 14-day battery life, the S3 Pro became Türkiye\'s most comprehensive domestic smartwatch.',
                        ],
                        [
                            'year' => '2026',
                            'title' => 'Expansion — Central Asia & MENA',
                            'desc' => 'Distribution deals in Kazakhstan, Azerbaijan and the UAE take Ovion beyond its borders.',
                        ],
                    ],
                    'cta_eyebrow' => 'Grow with us',
                    'cta_title' => 'Want to join<br/>the Ovion family?',
                    'cta_sub' => 'Engineer, designer, marketer or sales professional — we are always looking for the right person.',
                    'cta_btn1_text' => 'Open Positions',
                    'cta_btn1_url' => '#',
                    'cta_btn2_text' => 'Explore Products',
                ],
            ],
            [
                'type' => 'support',
                'locale' => 'tr',
                'content' => [
                    'hero_eyebrow' => 'Destek',
                    'hero_title' => 'Nasıl yardımcı<br/>olabiliriz?',
                    'hero_sub' => 'Garanti sorgulama, servis talebi, kılavuz veya teknik destek — doğru yere geldiniz.',
                    'quick_eyebrow' => 'Hızlı Erişim',
                    'quick_title' => 'Ne yapmak istiyorsunuz?',
                    'quick_actions' => [
                        [
                            'icon' => 'shield',
                            'title' => 'Garanti Sorgula',
                            'desc' => 'Seri numaranızla garanti durumunuzu anında öğrenin.',
                            'cta' => 'Sorgula',
                            'url' => '#garanti',
                        ],
                        [
                            'icon' => 'wrench',
                            'title' => 'Servis Talebi Oluştur',
                            'desc' => 'Cihazınız için yetkili servis randevusu alın.',
                            'cta' => 'Talep Oluştur',
                            'url' => '#servis',
                        ],
                        [
                            'icon' => 'book',
                            'title' => 'Kullanım Kılavuzları',
                            'desc' => 'V11 Lite, S3 Pro ve tüm ürünler için PDF kılavuzlar.',
                            'cta' => 'İndir',
                            'url' => '#kilavuz',
                        ],
                        [
                            'icon' => 'question',
                            'title' => 'Sıkça Sorulan Sorular',
                            'desc' => 'En çok sorulan soruların cevapları burada.',
                            'cta' => 'Görüntüle',
                            'url' => '#faq',
                        ],
                        [
                            'icon' => 'chat',
                            'title' => 'Canlı Destek',
                            'desc' => 'Hafta içi 09:00–18:00 arasında bir uzmanla konuşun.',
                            'cta' => 'Başlat',
                            'url' => '#iletisim',
                        ],
                        [
                            'icon' => 'pin',
                            'title' => 'Bayi ve Servis Bul',
                            'desc' => 'Yakınızdaki yetkili bayi ve servis merkezlerini bulun.',
                            'cta' => 'Haritada Gör',
                            'url' => '#servis',
                        ],
                    ],
                    'war_eyebrow' => 'Garanti',
                    'war_title' => '24 ay güvenceli<br/>kullanım.',
                    'war_desc' => 'Ovion, tüm ürünlerini 24 aylık Türkiye garantisiyle teslim eder. Yerli üretimin avantajıyla yedek parça teminini çok daha hızlı sağlıyor ve garanti süreçlerini tamamen dijitalleştiriyoruz.',
                    'warranty_list' => [
                        [
                            'text' => 'Üretim kaynaklı donanım arızaları',
                        ],
                        [
                            'text' => 'Yazılım ve sistem sorunları',
                        ],
                        [
                            'text' => 'Batarya kapasitesi (normal kullanımda %80 altı)',
                        ],
                        [
                            'text' => 'Ekran ve kamera modülü fabrika hataları',
                        ],
                        [
                            'text' => 'Şarj portu ve fiziksel düğme arızaları',
                        ],
                    ],
                    'war_badge' => 'Türkiye Garantisi',
                    'war_months' => '24',
                    'war_unit' => 'ay',
                    'war_sub' => 'Tüm Ovion ürünleri için standart garanti süresi',
                    'war_row1_lbl' => 'Servis süresi',
                    'war_row1_val' => 'Ortalama 3 iş günü',
                    'war_row2_lbl' => 'Yetkili servis',
                    'war_row2_val' => '200+ nokta',
                    'war_row3_lbl' => 'Kargo desteği',
                    'war_row3_val' => 'Garanti kapsamında ücretsiz',
                    'steps_eyebrow' => 'Servis Süreci',
                    'steps_title' => 'Servis talebi<br/>4 adımda tamamlanır.',
                    'service_steps' => [
                        [
                            'title' => 'Talep Oluştur',
                            'desc' => 'Web veya uygulama üzerinden servis talebi oluşturun. Sorununuzu kısa bir notla açıklayın.',
                        ],
                        [
                            'title' => 'Kargo veya Servis',
                            'desc' => 'Cihazınızı en yakın servise götürün ya da kapıdan kargo ile gönderin; karşılıklı teslim ücretsizdir.',
                        ],
                        [
                            'title' => 'Teşhis ve Onarım',
                            'desc' => 'Uzman teknisyenlerimiz cihazı inceler, size teşhis raporu gönderir ve onayınızla onarıma başlar.',
                        ],
                        [
                            'title' => 'Teslim',
                            'desc' => 'Ortalama 3 iş günü içinde cihazınız kapınıza teslim edilir. Süreç SMS ve e-posta ile takip edilebilir.',
                        ],
                    ],
                    'contact_eyebrow' => 'İletişim',
                    'contact_title' => 'Uzmanlarımız<br/>her zaman burada.',
                ],
            ],
            [
                'type' => 'support',
                'locale' => 'en',
                'content' => [
                    'hero_eyebrow' => 'Support',
                    'hero_title' => 'How can we<br/>help you?',
                    'hero_sub' => 'Warranty check, service request, user manual or technical support — you\'ve come to the right place.',
                    'quick_eyebrow' => 'Quick Access',
                    'quick_title' => 'What would you like to do?',
                    'quick_actions' => [
                        [
                            'icon' => 'shield',
                            'title' => 'Check Warranty',
                            'desc' => 'Find your warranty status instantly with your serial number.',
                            'cta' => 'Check',
                            'url' => '#garanti',
                        ],
                        [
                            'icon' => 'wrench',
                            'title' => 'Create Service Request',
                            'desc' => 'Book an authorised service appointment for your device.',
                            'cta' => 'Create Request',
                            'url' => '#servis',
                        ],
                        [
                            'icon' => 'book',
                            'title' => 'User Manuals',
                            'desc' => 'PDF manuals for V11 Lite, S3 Pro and all products.',
                            'cta' => 'Download',
                            'url' => '#kilavuz',
                        ],
                        [
                            'icon' => 'question',
                            'title' => 'Frequently Asked Questions',
                            'desc' => 'Answers to the most common questions, right here.',
                            'cta' => 'View',
                            'url' => '#faq',
                        ],
                        [
                            'icon' => 'chat',
                            'title' => 'Live Support',
                            'desc' => 'Talk to a specialist weekdays 09:00–18:00.',
                            'cta' => 'Start',
                            'url' => '#iletisim',
                        ],
                        [
                            'icon' => 'pin',
                            'title' => 'Find Dealer & Service',
                            'desc' => 'Find the nearest authorised dealer and service centre.',
                            'cta' => 'Show on Map',
                            'url' => '#servis',
                        ],
                    ],
                    'war_eyebrow' => 'Warranty',
                    'war_title' => '24 months of<br/>secured use.',
                    'war_desc' => 'Ovion delivers all its products with a 24-month Türkiye warranty. Thanks to domestic manufacturing, we provide spare parts faster and have fully digitalised our warranty processes.',
                    'warranty_list' => [
                        [
                            'text' => 'Manufacturing-related hardware faults',
                        ],
                        [
                            'text' => 'Software and system issues',
                        ],
                        [
                            'text' => 'Battery capacity (below 80% under normal use)',
                        ],
                        [
                            'text' => 'Screen and camera module factory defects',
                        ],
                        [
                            'text' => 'Charging port and physical button faults',
                        ],
                    ],
                    'war_badge' => 'Türkiye Warranty',
                    'war_months' => '24',
                    'war_unit' => 'mo.',
                    'war_sub' => 'Standard warranty period for all Ovion products',
                    'war_row1_lbl' => 'Service time',
                    'war_row1_val' => '~3 business days',
                    'war_row2_lbl' => 'Authorised service',
                    'war_row2_val' => '200+ locations',
                    'war_row3_lbl' => 'Shipping support',
                    'war_row3_val' => 'Free under warranty',
                    'steps_eyebrow' => 'Service Process',
                    'steps_title' => 'Service request<br/>completed in 4 steps.',
                    'service_steps' => [
                        [
                            'title' => 'Create Request',
                            'desc' => 'Create a service request via web or app. Briefly describe your issue.',
                        ],
                        [
                            'title' => 'Drop-off or Courier',
                            'desc' => 'Drop your device off at the nearest service centre or send it by courier; round-trip delivery is free.',
                        ],
                        [
                            'title' => 'Diagnosis and Repair',
                            'desc' => 'Our expert technicians inspect the device, send you a diagnostic report and start the repair upon your approval.',
                        ],
                        [
                            'title' => 'Delivery',
                            'desc' => 'On average within 3 business days, your device is delivered to your door. The process can be tracked via SMS and email.',
                        ],
                    ],
                    'contact_eyebrow' => 'Contact',
                    'contact_title' => 'Our experts<br/>are always here.',
                ],
            ],
            [
                'type' => 'home',
                'locale' => 'tr',
                'content' => [
                    'home_hero' => [
                        [
                            'image' => null,
                            'badge_text' => 'Yeni — V11 Lite',
                            'title' => 'Teknolojiyle<br />gelen <em>deneyim.</em>',
                            'description' => '6.56 inç 90 Hz ekran, 50 MP yapay zekâ kamera ve tüm günü karşılayan 5000 mAh batarya. İstanbul tasarımı, Türkiye üretimi.',
                            'cta_text' => 'OVION Deneyimini Keşfet',
                            'cta_url' => '#products',
                        ],
                    ],
                    'home_stats' => [
                        [
                            'value' => '3',
                            'suffix' => '',
                            'label' => 'Ürün kategorisi',
                        ],
                        [
                            'value' => '81',
                            'suffix' => '',
                            'label' => 'İlde servis ağı',
                        ],
                        [
                            'value' => '200',
                            'suffix' => '+',
                            'label' => 'Çalışan · İstanbul',
                        ],
                        [
                            'value' => '2',
                            'suffix' => ' yıl',
                            'label' => 'Standart garanti',
                        ],
                    ],
                    'home_scroll' => [
                        [
                            'image' => null,
                            'eyebrow' => 'Telefon — V Serisi',
                            'title' => 'Akıllı Telefonlar',
                            'description' => 'V serisi ile günlük yaşamı kolaylaştıran, Türkiye\'de tasarlanmış ve üretilmiş telefon deneyimi. 90 Hz ekran, 50 MP AI kamera ve 5000 mAh batarya.',
                            'btn_text' => 'V11 Lite\'ı Keşfet',
                            'btn_url' => '/telefonlar/v11-lite',
                        ],
                        [
                            'image' => null,
                            'eyebrow' => 'Saat — S Serisi',
                            'title' => 'Akıllı Saatler',
                            'description' => 'S serisi ile sağlığınızı, adımlarınızı ve uyku düzeninizi gerçek zamanlı takip edin. AMOLED ekran, GPS ve 14 günlük pil ömrü.',
                            'btn_text' => 'S3 Pro\'yu Keşfet',
                            'btn_url' => '/saatler/s3-pro',
                        ],
                        [
                            'image' => null,
                            'eyebrow' => 'Kulaklık — H Serisi',
                            'title' => 'Kulaklıklar',
                            'description' => 'H serisi ile Hi-Fi ses kalitesi ve hibrit ANC bir arada. 30 saatlik pil ömrüyle müziğinize kesintisiz odaklanın.',
                            'btn_text' => 'H1 Pro\'yu Keşfet',
                            'btn_url' => '/kulakliklar/h1-pro',
                        ],
                    ],
                    'home_showcase_kicker' => 'Koleksiyon',
                    'home_showcase_title' => 'Tüm Ürünler',
                    'home_showcase_tab_all' => 'Tümü',
                    'home_showcase_link_text' => 'Daha fazlası için',
                    'home_feat_title' => 'Ovion: Güçlü Teknoloji,<br>Her İhtiyaca Uygun Tasarım',
                    'home_feat_cards' => [
                        [
                            'size' => 'wide',
                            'color' => 'amber',
                            'reverse' => false,
                            'image' => null,
                            'title' => 'Gün Boyu Güç',
                            'description' => 'Uzun ömürlü batarya teknolojisi ve hızlı şarj desteğiyle tüm Ovion ürünleri sizi hiç şarjsız bırakmaz.',
                        ],
                        [
                            'size' => 'narrow',
                            'color' => 'none',
                            'reverse' => false,
                            'image' => null,
                            'title' => 'Üst Segment Performans',
                            'description' => 'Son nesil işlemciler ve optimize edilmiş yazılımla Ovion cihazları hem hız hem de verimlilik konusunda rakiplerinin önünde.',
                        ],
                        [
                            'size' => 'narrow',
                            'color' => 'none',
                            'reverse' => false,
                            'image' => null,
                            'title' => 'Göz Alıcı Ekranlar',
                            'description' => 'AMOLED paneller, yüksek yenileme hızı ve akıllı parlaklık yönetimiyle Ovion ekranları her ortamda mükemmel görüntü sunar.',
                        ],
                        [
                            'size' => 'wide',
                            'color' => 'indigo',
                            'reverse' => true,
                            'image' => null,
                            'title' => 'Akıllı Bağlantı',
                            'description' => 'NFC, 5G, Bluetooth 5.3 ve Dual SIM desteğiyle Ovion ürünleri sizi her an dijital dünyaya bağlar; ödeme ve paylaşım kolaylaşır.',
                        ],
                    ],
                    'home_trust_eyebrow' => 'Ovion Güvencesi',
                    'home_trust_title' => 'Satın aldıktan<br/>sonra da yanınızdayız.',
                    'home_trust_cards' => [
                        [
                            'title' => 'Resmi Garanti',
                            'link_url' => '',
                            'description' => 'Tüm Ovion ürünlerinde standart 2 yıl resmi Türkiye garantisi. Satın aldığınız günden itibaren geçerli.',
                            'link_text' => '',
                        ],
                        [
                            'title' => 'Yetkili Servis',
                            'link_url' => '',
                            'description' => 'Türkiye\'nin 81 ilinde yetkili Ovion servis noktası. Onarım için en yakın servisi kolayca bulun.',
                            'link_text' => '',
                        ],
                        [
                            'title' => 'Türkiye\'de Üretim',
                            'link_url' => '',
                            'description' => 'Her ürün İstanbul\'da tasarlanır, Türkiye\'deki üretim tesisimizde üretilir. Yerli sertifikalı.',
                            'link_text' => '',
                        ],
                        [
                            'title' => 'Müşteri Desteği',
                            'link_url' => '/destek',
                            'description' => 'Telefon, e-posta ve canlı sohbet ile 7/24 destek ekibimize ulaşın. Sorularınız cevapsız kalmaz.',
                            'link_text' => 'Destek Merkezi',
                        ],
                    ],
                    'home_buy_title' => 'Satın almaya hazır mısınız?',
                    'home_buy_price' => '₺4.999\'dan başlayan fiyatlarla',
                    'home_buy_shipping' => 'ücretsiz kargo · 24 ay garanti',
                    'home_buy_cta1_text' => 'Satın Al',
                    'home_buy_cta1_url' => '#products',
                    'home_buy_cta2_text' => 'Bayi Bul',
                    'home_buy_cta2_url' => '/destek',
                ],
            ],
            [
                'type' => 'home',
                'locale' => 'en',
                'content' => [
                    'home_hero' => [
                        [
                            'image' => null,
                            'badge_text' => 'New — V11 Lite',
                            'title' => 'Technology that<br />shapes <em>experience.</em>',
                            'description' => '6.56-inch 90 Hz display, 50 MP AI camera and a 5000 mAh battery that lasts all day. Designed in Istanbul, made in Türkiye.',
                            'cta_text' => 'Discover OVION',
                            'cta_url' => '#products',
                        ],
                    ],
                    'home_stats' => [
                        [
                            'value' => '3',
                            'suffix' => '',
                            'label' => 'Product categories',
                        ],
                        [
                            'value' => '81',
                            'suffix' => '',
                            'label' => 'Cities with service',
                        ],
                        [
                            'value' => '200',
                            'suffix' => '+',
                            'label' => 'Employees · Istanbul',
                        ],
                        [
                            'value' => '2',
                            'suffix' => ' yr',
                            'label' => 'Standard warranty',
                        ],
                    ],
                    'home_scroll' => [
                        [
                            'image' => null,
                            'eyebrow' => 'Phone — V Series',
                            'title' => 'Smartphones',
                            'description' => 'V-series phones, designed and made in Türkiye, simplify your daily life. 90 Hz display, 50 MP AI camera and 5000 mAh battery.',
                            'btn_text' => 'Discover V11 Lite',
                            'btn_url' => '/en/phones/v11-lite',
                        ],
                        [
                            'image' => null,
                            'eyebrow' => 'Watch — S Series',
                            'title' => 'Smartwatches',
                            'description' => 'Track your health, steps and sleep in real time with the S series. AMOLED display, GPS and 14-day battery life.',
                            'btn_text' => 'Discover S3 Pro',
                            'btn_url' => '/en/watches/s3-pro',
                        ],
                        [
                            'image' => null,
                            'eyebrow' => 'Headphones — H Series',
                            'title' => 'Headphones',
                            'description' => 'H-series brings together Hi-Fi sound and hybrid ANC. 30-hour battery keeps you focused on your music.',
                            'btn_text' => 'Discover H1 Pro',
                            'btn_url' => '/en/headphones/h1-pro',
                        ],
                    ],
                    'home_showcase_kicker' => 'Collection',
                    'home_showcase_title' => 'All Products',
                    'home_showcase_tab_all' => 'All',
                    'home_showcase_link_text' => 'Learn more',
                    'home_feat_title' => 'Ovion: Powerful Technology,<br>Designed for Every Need',
                    'home_feat_cards' => [
                        [
                            'size' => 'wide',
                            'color' => 'amber',
                            'reverse' => false,
                            'image' => null,
                            'title' => 'All-Day Power',
                            'description' => 'Long-lasting battery technology and fast charging mean Ovion products never leave you without power.',
                        ],
                        [
                            'size' => 'narrow',
                            'color' => 'none',
                            'reverse' => false,
                            'image' => null,
                            'title' => 'Top-Tier Performance',
                            'description' => 'Latest-generation processors and optimised software put Ovion devices ahead in both speed and efficiency.',
                        ],
                        [
                            'size' => 'narrow',
                            'color' => 'none',
                            'reverse' => false,
                            'image' => null,
                            'title' => 'Stunning Displays',
                            'description' => 'AMOLED panels, high refresh rates and smart brightness deliver perfect picture quality in every environment.',
                        ],
                        [
                            'size' => 'wide',
                            'color' => 'indigo',
                            'reverse' => true,
                            'image' => null,
                            'title' => 'Smart Connectivity',
                            'description' => 'NFC, 5G, Bluetooth 5.3 and Dual SIM keep you connected at all times — payments and sharing made effortless.',
                        ],
                    ],
                    'home_trust_eyebrow' => 'The Ovion Guarantee',
                    'home_trust_title' => 'We are with you<br/>after the purchase, too.',
                    'home_trust_cards' => [
                        [
                            'title' => 'Official Warranty',
                            'link_url' => '',
                            'description' => 'A standard 2-year official Türkiye warranty on all Ovion products. Valid from the day of purchase.',
                            'link_text' => '',
                        ],
                        [
                            'title' => 'Authorised Service',
                            'link_url' => '',
                            'description' => 'Authorised Ovion service points across all 81 provinces of Türkiye. Easily find the nearest one for repairs.',
                            'link_text' => '',
                        ],
                        [
                            'title' => 'Made in Türkiye',
                            'link_url' => '',
                            'description' => 'Every product is designed in Istanbul and produced in our domestic facility. Locally certified.',
                            'link_text' => '',
                        ],
                        [
                            'title' => 'Customer Support',
                            'link_url' => '/en/support',
                            'description' => 'Reach our team 24/7 via phone, email and live chat. Your questions never go unanswered.',
                            'link_text' => 'Support Centre',
                        ],
                    ],
                    'home_buy_title' => 'Ready when you are.',
                    'home_buy_price' => 'From ₺4,999',
                    'home_buy_shipping' => 'free shipping in Türkiye · 24-month warranty',
                    'home_buy_cta1_text' => 'Configure & buy',
                    'home_buy_cta1_url' => '#products',
                    'home_buy_cta2_text' => 'Find a reseller',
                    'home_buy_cta2_url' => '/en/support',
                ],
            ],
            [
                'type' => 'accessories',
                'locale' => 'tr',
                'content' => [
                    'hero_eyebrow' => 'Aksesuarlar',
                    'hero_title' => 'Her detayda<br /><em>Ovion kalitesi.</em>',
                    'hero_lede' => 'Cihazlarınızı korumak, şarj etmek ve kişiselleştirmek için tasarlanmış aksesuarlar. Ovion ürünleriyle mükemmel uyum.',
                    'cta_all_text' => 'Tümünü İncele',
                    'cta_device_text' => 'Cihazıma Göre Bul',
                    'spot_eyebrow' => 'Öne Çıkan',
                    'spot_title' => 'Koruma ve<br />zariflik bir arada.',
                    'grid_eyebrow' => 'Tüm Aksesuarlar',
                    'grid_title' => 'Koleksiyonu keşfet.',
                    'cta_eyebrow' => 'Aksesuar Dünyası',
                    'cta_title' => 'Ovion\'u<br /><em>tamamla.</em>',
                    'cta_desc' => 'Cihazlarınızın performansını ve görünümünü bir üst seviyeye taşıyın. Tüm ürünler Ovion garantisi ile sunulur.',
                    'cta_btn1_text' => 'Destek Merkezi',
                    'cta_btn1_url' => '/destek',
                    'cta_btn2_text' => 'Anasayfa',
                    'cta_btn2_url' => '/',
                ],
            ],
            [
                'type' => 'accessories',
                'locale' => 'en',
                'content' => [
                    'hero_eyebrow' => 'Accessories',
                    'hero_title' => 'Ovion quality<br /><em>in every detail.</em>',
                    'hero_lede' => 'Accessories designed to protect, charge and personalise your devices. A perfect fit for Ovion products.',
                    'cta_all_text' => 'View All',
                    'cta_device_text' => 'Find by Device',
                    'spot_eyebrow' => 'Featured',
                    'spot_title' => 'Protection and<br />elegance together.',
                    'grid_eyebrow' => 'All Accessories',
                    'grid_title' => 'Explore the collection.',
                    'cta_eyebrow' => 'Accessory World',
                    'cta_title' => 'Complete<br /><em>your Ovion.</em>',
                    'cta_desc' => 'Take your devices\' performance and look to the next level. All products come with the Ovion warranty.',
                    'cta_btn1_text' => 'Support Centre',
                    'cta_btn1_url' => '/en/support',
                    'cta_btn2_text' => 'Home',
                    'cta_btn2_url' => '/en',
                ],
            ],
        ];

        foreach ($rows as $row) {
            PageContent::updateOrCreate(
                ['type' => $row['type'], 'locale' => $row['locale']],
                ['content' => $row['content']],
            );
        }
    }
}
