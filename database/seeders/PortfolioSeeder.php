<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $weddingCategory = Category::firstOrCreate(['slug' => 'wedding'], ['name' => 'Wedding']);
        $gradCategory = Category::firstOrCreate(['slug' => 'graduation'], ['name' => 'Graduation']);

        // Seed 8 Foto Wedding
        for ($i = 1; $i <= 8; $i++) {
            Portfolio::firstOrCreate(
                ['image_path' => "assets/images/wedding-$i.jpg"],
                [
                    'title' => "Signature Wedding Look #$i",
                    'category_id' => $weddingCategory->id,
                    'description' => 'Luxury bridal makeup look with timeless and glowing finish.',
                    'is_active' => true,
                    'order' => $i,
                ]
            );
        }

        // Seed 8 Foto Graduation
        for ($i = 1; $i <= 8; $i++) {
            Portfolio::firstOrCreate(
                ['image_path' => "assets/images/grad-$i.jpg"],
                [
                    'title' => "Graduation Fresh Glam #$i",
                    'category_id' => $gradCategory->id,
                    'description' => 'Flawless and fresh makeup look designed for all-day graduation events.',
                    'is_active' => true,
                    'order' => $i + 10,
                ]
            );
        }
    }
}
