<?php

namespace Tests\Feature;

use App\Models\Accessory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccessoriesVisibilityTest extends TestCase
{
    use RefreshDatabase;

    private function makeAccessory(array $overrides = []): Accessory
    {
        return Accessory::create(array_merge([
            'category' => 'kilif',
            'slug' => ['tr' => 'test-kilif', 'en' => 'test-case'],
            'name' => ['tr' => 'Test Kılıf', 'en' => 'Test Case'],
            'summary' => ['tr' => 'TR özet', 'en' => 'EN summary'],
            'is_active' => true,
            'order' => 0,
        ], $overrides));
    }

    public function test_accessories_page_returns_404_when_no_accessories_exist(): void
    {
        $this->get(route('aksesuarlar'))->assertNotFound();
    }

    public function test_accessories_page_returns_404_when_only_inactive_accessories_exist(): void
    {
        $this->makeAccessory(['is_active' => false]);

        $this->get(route('aksesuarlar'))->assertNotFound();
    }

    public function test_accessories_page_renders_when_an_active_accessory_exists(): void
    {
        $this->makeAccessory();

        $this->get(route('aksesuarlar'))
            ->assertOk()
            ->assertSee('Test Kılıf');
    }

    public function test_navbar_hides_accessories_link_when_no_active_accessory(): void
    {
        $this->makeAccessory(['is_active' => false]);

        $html = view('components.navbar')->render();

        $this->assertStringNotContainsString(route('aksesuarlar'), $html);
    }

    public function test_navbar_shows_accessories_link_when_active_accessory_exists(): void
    {
        $this->makeAccessory();

        $html = view('components.navbar')->render();

        $this->assertStringContainsString(route('aksesuarlar'), $html);
    }
}
