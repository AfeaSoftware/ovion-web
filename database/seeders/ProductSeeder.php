<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Lang;

class ProductSeeder extends Seeder
{
    /**
     * Locales seeded for every product.
     *
     * @var array<int, string>
     */
    private const LOCALES = ['tr', 'en'];

    /**
     * Translatable attributes that get filled per-locale via setTranslation().
     *
     * @var array<int, string>
     */
    private const TRANSLATABLE = [
        'name', 'eyebrow', 'tagline',
        'price_label', 'price_note', 'cta_primary', 'cta_secondary',
        'meta_title', 'meta_description',
        'strip_stats', 'content', 'specs',
    ];

    public function run(): void
    {
        $this->seedPhone();
        $this->seedWatch();
        $this->seedHeadphone();
    }

    /**
     * Persist a product with translations for every locale in self::LOCALES.
     *
     * @param  array<string, mixed>  $base
     * @param  callable(string): array<string, mixed>  $build
     */
    private function persist(array $base, callable $build): Product
    {
        $product = Product::updateOrCreate(
            ['slug' => $base['slug']],
            $base,
        );

        foreach (self::TRANSLATABLE as $attr) {
            foreach (self::LOCALES as $locale) {
                $payload = $build($locale);
                if (array_key_exists($attr, $payload)) {
                    $product->setTranslation($attr, $locale, $payload[$attr]);
                }
            }
        }

        $product->save();

        return $product;
    }

    /** Lang lookup helper. */
    private static function t(string $key, string $locale): string
    {
        return Lang::get('ui.'.$key, [], $locale);
    }

    // ─────────────────────────────────────────────────────────────────────
    // Phone — Ovion V11 Lite
    // ─────────────────────────────────────────────────────────────────────

    private function seedPhone(): void
    {
        $this->persist(
            base: [
                'type' => 'phone',
                'slug' => 'ovion-v11-lite',
                'price' => 4999,
                'buy_url' => null,
                'cta_secondary_url' => null,
                'is_active' => true,
                'order' => 1,
            ],
            build: fn (string $L): array => [
                'name' => 'Ovion V11 Lite',
                'eyebrow' => self::t('ph_hero_eyebrow', $L),
                'tagline' => self::t('ph_hero_sub', $L),
                'meta_title' => self::t('ph_meta_title', $L),
                'meta_description' => self::t('ph_meta_desc', $L),
                'cta_primary' => self::t('btn_add_to_cart', $L),
                'cta_secondary' => self::t('ph_hero_specs', $L),
                'price_note' => self::t('ph_buy_note', $L),

                'strip_stats' => [
                    ['value' => '6.56″', 'label' => self::t('ph_strip1_lbl', $L)],
                    ['value' => '50 MP', 'label' => self::t('ph_strip2_lbl', $L)],
                    ['value' => '5000 mAh', 'label' => self::t('ph_strip3_lbl', $L)],
                    ['value' => '8.45 mm', 'label' => self::t('ph_strip4_lbl', $L)],
                    ['value' => self::t('ph_strip5_val', $L), 'label' => self::t('ph_strip5_lbl', $L)],
                ],

                'content' => [
                    'hero' => [
                        'byline' => self::t('ph_hero_byline', $L),
                    ],

                    'collection_card' => [
                        'description' => '90 Hz · 50 MP AI Kamera · 5000 mAh',
                    ],

                    'camera' => [
                        'eyebrow' => self::t('ph_cam_ey', $L),
                        'title' => self::t('ph_cam_title', $L),
                        'description' => self::t('ph_cam_desc', $L),
                        'cards' => [
                            ['icon' => 'camera', 'metric' => '50 MP', 'title' => self::t('ph_camf_c1_title', $L), 'description' => self::t('ph_camf_c1_desc', $L)],
                            ['icon' => 'eye', 'metric' => '40+ '.self::t('ph_camf_c2_unit', $L), 'title' => self::t('ph_camf_c2_title', $L), 'description' => self::t('ph_camf_c2_desc', $L)],
                            ['icon' => 'bolt', 'metric' => '0.3 '.self::t('ph_camf_c3_unit', $L), 'title' => self::t('ph_camf_c3_title', $L), 'description' => self::t('ph_camf_c3_desc', $L)],
                            ['icon' => 'star', 'metric' => 'HDR', 'title' => self::t('ph_camf_c4_title', $L), 'description' => self::t('ph_camf_c4_desc', $L)],
                            ['icon' => 'camera', 'metric' => '8 MP', 'title' => self::t('ph_camf_c5_title', $L), 'description' => self::t('ph_camf_c5_desc', $L)],
                            ['icon' => 'music', 'metric' => '1080p', 'title' => self::t('ph_camf_c6_title', $L), 'description' => self::t('ph_camf_c6_desc', $L)],
                        ],
                    ],
                    'camera_cards' => [
                        'eyebrow' => self::t('ph_camf_ey', $L),
                        'title' => self::t('ph_camf_title', $L),
                    ],

                    'display' => [
                        'eyebrow' => self::t('ph_disp_ey', $L),
                        'title' => self::t('ph_disp_title', $L),
                        'description' => self::t('ph_disp_desc', $L),
                        'items' => [
                            ['text' => self::t('ph_dispt_li1', $L)],
                            ['text' => self::t('ph_dispt_li2', $L)],
                            ['text' => self::t('ph_dispt_li3', $L)],
                            ['text' => self::t('ph_dispt_li4', $L)],
                        ],
                    ],
                    'display_list' => [
                        'eyebrow' => self::t('ph_dispt_ey', $L),
                        'title' => self::t('ph_dispt_title', $L),
                        'description' => self::t('ph_dispt_desc', $L),
                    ],

                    'cinema' => [
                        'slides' => [
                            ['eyebrow' => self::t('ph_cin1_ey', $L), 'title' => self::t('ph_cin1_title', $L), 'description' => self::t('ph_cin1_desc', $L)],
                            ['eyebrow' => self::t('ph_cin2_ey', $L), 'title' => self::t('ph_cin2_title', $L), 'description' => self::t('ph_cin2_desc', $L)],
                            ['eyebrow' => self::t('ph_cin3_ey', $L), 'title' => self::t('ph_cin3_title', $L), 'description' => self::t('ph_cin3_desc', $L)],
                            ['eyebrow' => self::t('ph_cin4_ey', $L), 'title' => self::t('ph_cin4_title', $L), 'description' => self::t('ph_cin4_desc', $L)],
                        ],
                    ],

                    'performance' => [
                        'eyebrow' => self::t('ph_perf_ey', $L),
                        'title' => self::t('ph_perf_title', $L),
                        'cards' => [
                            ['icon' => 'cpu', 'metric' => 'Octa-core', 'title' => self::t('ph_perf_c1_title', $L), 'description' => self::t('ph_perf_c1_desc', $L)],
                            ['icon' => 'bolt', 'metric' => '4 '.self::t('ph_perf_c2_unit', $L), 'title' => self::t('ph_perf_c2_title', $L), 'description' => self::t('ph_perf_c2_desc', $L)],
                            ['icon' => 'battery', 'metric' => '18 W', 'title' => self::t('ph_perf_c3_title', $L), 'description' => self::t('ph_perf_c3_desc', $L)],
                            ['icon' => 'shield', 'metric' => null, 'title' => self::t('ph_perf_c4_title', $L), 'description' => self::t('ph_perf_c4_desc', $L)],
                            ['icon' => 'wifi', 'metric' => '4G LTE', 'title' => self::t('ph_perf_c5_title', $L), 'description' => self::t('ph_perf_c5_desc', $L)],
                            ['icon' => 'star', 'metric' => null, 'title' => self::t('ph_perf_c6_title', $L), 'description' => self::t('ph_perf_c6_desc', $L)],
                        ],
                    ],

                    'battery' => [
                        'eyebrow' => self::t('ph_bat_ey', $L),
                        'title' => self::t('ph_bat_title', $L),
                        'description' => self::t('ph_bat_desc', $L),
                        'items' => [
                            ['text' => self::t('ph_bat_li1', $L)],
                            ['text' => self::t('ph_bat_li2', $L)],
                            ['text' => self::t('ph_bat_li3', $L)],
                        ],
                    ],

                    'specs_section' => [
                        'eyebrow' => self::t('ph_specs_ey', $L),
                        'title' => self::t('ph_specs_title', $L),
                    ],
                    'buy_section' => [
                        'eyebrow' => self::t('ph_buy_ey', $L),
                        'title' => self::t('ph_buy_title', $L),
                    ],
                ],

                'specs' => collect(['disp', 'cpu', 'mem', 'cam', 'fcam', 'bat', 'os', 'conn', 'sec', 'dim', 'sim', 'color'])
                    ->map(fn (string $row) => [
                        'key' => self::t("ph_spec_{$row}_k", $L),
                        'value' => self::t("ph_spec_{$row}_v", $L),
                        'note' => self::t("ph_spec_{$row}_s", $L),
                    ])->all(),
            ],
        );
    }

    // ─────────────────────────────────────────────────────────────────────
    // Watch — Ovion S3 Pro
    // ─────────────────────────────────────────────────────────────────────

    private function seedWatch(): void
    {
        $this->persist(
            base: [
                'type' => 'watch',
                'slug' => 'ovion-s3-pro',
                'price' => 2499,
                'is_active' => true,
                'order' => 2,
            ],
            build: fn (string $L): array => [
                'name' => 'Ovion S3 Pro',
                'eyebrow' => self::t('wt_hero_eyebrow', $L),
                'tagline' => self::t('wt_hero_tagline', $L),
                'meta_title' => self::t('wt_meta_title', $L),
                'meta_description' => self::t('wt_meta_desc', $L),
                'cta_primary' => self::t('btn_add_to_cart', $L),
                'cta_secondary' => self::t('wt_hero_specs', $L),
                'price_note' => self::t('wt_buy_note', $L),

                'strip_stats' => [
                    ['value' => self::t('wt_strip1_val', $L), 'label' => self::t('wt_strip1_lbl', $L)],
                    ['value' => '100+', 'label' => self::t('wt_strip2_lbl', $L)],
                    ['value' => '5 ATM', 'label' => self::t('wt_strip3_lbl', $L)],
                    ['value' => 'GPS', 'label' => self::t('wt_strip4_lbl', $L)],
                    ['value' => self::t('wt_strip5_val', $L), 'label' => self::t('wt_strip5_lbl', $L)],
                ],

                'content' => [
                    'collection_card' => [
                        'description' => '14 Gün Batarya · 100+ Spor Modu · 5 ATM',
                    ],

                    'health' => [
                        'eyebrow' => self::t('wt_health_ey', $L),
                        'title' => self::t('wt_health_title', $L),
                        'description' => self::t('wt_health_desc', $L),
                        'cards' => collect(range(1, 6))->map(fn (int $i) => [
                            'icon' => ['heart', 'drop', 'moon', 'eye', 'clock', 'star'][$i - 1],
                            'metric' => self::t("wt_hf_c{$i}_metric", $L),
                            'title' => self::t("wt_hf_c{$i}_title", $L),
                            'description' => self::t("wt_hf_c{$i}_desc", $L),
                        ])->all(),
                    ],
                    'health_cards' => [
                        'eyebrow' => self::t('wt_hf_ey', $L),
                        'title' => self::t('wt_hf_title', $L),
                    ],

                    'customization' => [
                        'eyebrow' => self::t('wt_faces_ey', $L),
                        'title' => self::t('wt_faces_title', $L),
                        'faces' => [
                            ['name' => self::t('wt_face1_title', $L), 'tags' => self::t('wt_face1_desc', $L)],
                            ['name' => self::t('wt_face2_title', $L), 'tags' => self::t('wt_face2_desc', $L)],
                            ['name' => self::t('wt_face3_title', $L), 'tags' => self::t('wt_face3_desc', $L)],
                            ['name' => self::t('wt_face4_title', $L), 'tags' => self::t('wt_face4_desc', $L)],
                        ],
                    ],

                    'design' => [
                        'eyebrow' => self::t('wt_design_ey', $L),
                        'title' => self::t('wt_design_title', $L),
                        'description' => self::t('wt_design_desc', $L),
                        'items' => collect(range(1, 5))->map(fn (int $i) => ['text' => self::t("wt_design_li{$i}", $L)])->all(),
                    ],

                    'activity' => [
                        'eyebrow' => self::t('wt_act_ey', $L),
                        'title' => self::t('wt_act_title', $L),
                        'description' => self::t('wt_act_desc', $L),
                        'stats' => [
                            ['value' => '100+', 'label' => self::t('wt_act_m1_lbl', $L)],
                            ['value' => 'GPS', 'label' => self::t('wt_act_m2_lbl', $L)],
                            ['value' => '5 ATM', 'label' => self::t('wt_act_m3_lbl', $L)],
                        ],
                    ],

                    'battery' => [
                        'eyebrow' => self::t('wt_bat_ey', $L),
                        'title' => self::t('wt_bat_title', $L),
                        'description' => self::t('wt_bat_desc', $L),
                        'items' => collect(range(1, 4))->map(fn (int $i) => ['text' => self::t("wt_bat_li{$i}", $L)])->all(),
                    ],

                    'specs_section' => [
                        'eyebrow' => self::t('wt_specs_ey', $L),
                        'title' => self::t('wt_specs_title', $L),
                    ],
                    'buy_section' => [
                        'eyebrow' => self::t('wt_buy_ey', $L),
                        'title' => self::t('wt_buy_title', $L),
                    ],
                ],

                'specs' => collect(['disp', 'cpu', 'bat', 'sens', 'loc', 'conn', 'sport', 'health', 'water', 'body', 'strap', 'color'])
                    ->map(fn (string $row) => [
                        'key' => self::t("wt_spec_{$row}_k", $L),
                        'value' => self::t("wt_spec_{$row}_v", $L),
                        'note' => self::t("wt_spec_{$row}_s", $L),
                    ])->all(),
            ],
        );
    }

    // ─────────────────────────────────────────────────────────────────────
    // Headphone — Ovion H1 Pro
    // ─────────────────────────────────────────────────────────────────────

    private function seedHeadphone(): void
    {
        $this->persist(
            base: [
                'type' => 'headphone',
                'slug' => 'ovion-h1-pro',
                'price' => 2499,
                'is_active' => true,
                'order' => 3,
            ],
            build: fn (string $L): array => [
                'name' => 'Ovion H1 Pro',
                'eyebrow' => self::t('hp_hero_eyebrow', $L),
                'tagline' => self::t('hp_hero_sub', $L),
                'meta_title' => self::t('hp_meta_title', $L),
                'meta_description' => self::t('hp_meta_desc', $L),
                'cta_primary' => self::t('btn_add_to_cart', $L),
                'cta_secondary' => self::t('hp_hero_specs', $L),
                'price_note' => self::t('hp_buy_note', $L),

                'strip_stats' => [
                    ['value' => '30 '.self::t('hp_strip1_unit', $L), 'label' => self::t('hp_strip1_lbl', $L)],
                    ['value' => '40 '.self::t('hp_strip2_unit', $L), 'label' => self::t('hp_strip2_lbl', $L)],
                    ['value' => 'ANC', 'label' => self::t('hp_strip3_lbl', $L)],
                    ['value' => '3', 'label' => self::t('hp_strip4_lbl', $L)],
                    ['value' => 'BT 5.3', 'label' => self::t('hp_strip5_lbl', $L)],
                ],

                'content' => [
                    'collection_card' => [
                        'description' => 'Hibrit ANC · 40 mm Hi-Fi · 30 saat batarya',
                    ],

                    'anc' => [
                        'eyebrow' => self::t('hp_anc_ey', $L),
                        'title' => self::t('hp_anc_title', $L),
                        'description' => self::t('hp_anc_desc', $L),
                        'db_value' => '38',
                        'cards' => [
                            ['icon' => 'shield', 'metric' => '–38 dB', 'title' => self::t('hp_ancf_c1_title', $L), 'description' => self::t('hp_ancf_c1_desc', $L)],
                            ['icon' => 'mic', 'metric' => null, 'title' => self::t('hp_ancf_c2_title', $L), 'description' => self::t('hp_ancf_c2_desc', $L)],
                            ['icon' => 'cpu', 'metric' => 'AI', 'title' => self::t('hp_ancf_c3_title', $L), 'description' => self::t('hp_ancf_c3_desc', $L)],
                        ],
                    ],
                    'anc_cards' => [
                        'eyebrow' => self::t('hp_ancf_ey', $L),
                        'title' => self::t('hp_ancf_title', $L),
                    ],

                    'sound' => [
                        'eyebrow' => self::t('hp_sound_ey', $L),
                        'title' => self::t('hp_sound_title', $L),
                        'description' => self::t('hp_sound_desc', $L),
                        'items' => collect(range(1, 4))->map(fn (int $i) => ['text' => self::t("hp_sound_li{$i}", $L)])->all(),
                    ],

                    'design' => [
                        'eyebrow' => self::t('hp_design_ey', $L),
                        'title' => self::t('hp_design_title', $L),
                        'description' => self::t('hp_design_desc', $L),
                        'items' => collect(range(1, 4))->map(fn (int $i) => ['text' => self::t("hp_design_li{$i}", $L)])->all(),
                    ],

                    'battery' => [
                        'eyebrow' => self::t('hp_bat_ey', $L),
                        'title' => self::t('hp_bat_title', $L),
                        'description' => self::t('hp_bat_desc', $L),
                        'stats' => [
                            ['value' => self::t('hp_bat_s1_val', $L), 'label' => self::t('hp_bat_s1_lbl', $L)],
                            ['value' => self::t('hp_bat_s2_val', $L), 'label' => self::t('hp_bat_s2_lbl', $L)],
                            ['value' => self::t('hp_bat_s3_val', $L), 'label' => self::t('hp_bat_s3_lbl', $L)],
                        ],
                    ],

                    'connectivity' => [
                        'eyebrow' => self::t('hp_conn_ey', $L),
                        'title' => self::t('hp_conn_title', $L),
                        'cards' => [
                            ['icon' => 'wifi', 'metric' => '2 '.self::t('hp_conn_c1_unit', $L), 'title' => self::t('hp_conn_c1_title', $L), 'description' => self::t('hp_conn_c1_desc', $L)],
                            ['icon' => 'bolt', 'metric' => null, 'title' => self::t('hp_conn_c2_title', $L), 'description' => self::t('hp_conn_c2_desc', $L)],
                            ['icon' => 'headphone', 'metric' => null, 'title' => self::t('hp_conn_c3_title', $L), 'description' => self::t('hp_conn_c3_desc', $L)],
                        ],
                    ],

                    'specs_section' => [
                        'eyebrow' => self::t('hp_specs_ey', $L),
                        'title' => self::t('hp_specs_title', $L),
                    ],
                    'buy_section' => [
                        'eyebrow' => self::t('hp_buy_ey', $L),
                        'title' => self::t('hp_buy_title', $L),
                    ],
                ],

                'specs' => collect(['driver', 'freq', 'imp', 'bat', 'anc', 'bt', 'codec', 'w', 'conn', 'war'])
                    ->map(fn (string $row) => [
                        'key' => self::t("hp_spec_{$row}_k", $L),
                        'value' => self::t("hp_spec_{$row}_v", $L),
                        'note' => self::t("hp_spec_{$row}_s", $L),
                    ])->all(),
            ],
        );
    }
}
