<?php

namespace Tests\Feature;

use App\Models\SupportTopic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupportTopicTest extends TestCase
{
    use RefreshDatabase;

    private function makeTopic(array $overrides = []): SupportTopic
    {
        return SupportTopic::create(array_merge([
            'icon' => 'doc',
            'order' => 0,
            'is_active' => true,
            'slug' => ['tr' => 'kullanim-kilavuzlari', 'en' => 'user-manuals'],
            'title' => ['tr' => 'Kullanım Kılavuzları', 'en' => 'User Manuals'],
            'summary' => ['tr' => 'TR özet', 'en' => 'EN summary'],
            'intro' => ['tr' => 'TR giriş', 'en' => 'EN intro'],
            'documents' => [],
        ], $overrides));
    }

    public function test_support_index_lists_active_topic_card_linking_to_detail(): void
    {
        $this->makeTopic();

        $this->get(route('destek'))
            ->assertOk()
            ->assertSee('Kullanım Kılavuzları')
            ->assertSee(route('destek.show', ['slug' => 'kullanim-kilavuzlari']));
    }

    public function test_support_index_hides_inactive_topics(): void
    {
        $this->makeTopic(['is_active' => false]);

        $this->get(route('destek'))
            ->assertOk()
            ->assertDontSee(route('destek.show', ['slug' => 'kullanim-kilavuzlari']));
    }

    public function test_topic_detail_page_renders_with_documents(): void
    {
        $this->makeTopic([
            'documents' => [
                'tr' => [['label' => 'V11 Kılavuz', 'file' => 'support/documents/v11.pdf']],
                'en' => [],
            ],
        ]);

        $this->get(route('destek.show', ['slug' => 'kullanim-kilavuzlari']))
            ->assertOk()
            ->assertSee('Kullanım Kılavuzları')
            ->assertSee('V11 Kılavuz')
            ->assertSee('TR giriş');
    }

    public function test_detail_resolves_by_english_slug_on_en_route(): void
    {
        $this->makeTopic();

        $this->get(route('en.support.show', ['slug' => 'user-manuals']))
            ->assertOk()
            ->assertSee('User Manuals');
    }

    public function test_unknown_slug_returns_404(): void
    {
        $this->get(route('destek.show', ['slug' => 'yok-boyle-bir-sey']))
            ->assertNotFound();
    }

    public function test_inactive_topic_detail_returns_404(): void
    {
        $this->makeTopic(['is_active' => false]);

        $this->get(route('destek.show', ['slug' => 'kullanim-kilavuzlari']))
            ->assertNotFound();
    }
}
