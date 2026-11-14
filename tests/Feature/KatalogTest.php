<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_katalog_page_can_be_rendered(): void
    {
        $response = $this->get(route('user.katalog'));
        $response->assertStatus(200);
    }

    public function test_katalog_displays_active_portfolios(): void
    {
        $category = Category::create(['name' => 'Wedding', 'slug' => 'wedding']);

        $activePortfolio = Portfolio::create([
            'title' => 'Signature Wedding Look Padang',
            'category_id' => $category->id,
            'image_path' => 'assets/images/wedding-1.jpg',
            'is_active' => true,
        ]);

        $inactivePortfolio = Portfolio::create([
            'title' => 'Draft Inactive Look',
            'category_id' => $category->id,
            'image_path' => 'assets/images/wedding-2.jpg',
            'is_active' => false,
        ]);

        $response = $this->get(route('user.katalog'));
        $response->assertStatus(200);
        $response->assertSee('Signature Wedding Look Padang');
        $response->assertDontSee('Draft Inactive Look');
    }
}
