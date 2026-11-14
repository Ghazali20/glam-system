<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Wedding' => Category::firstOrCreate(['slug' => 'wedding'], ['name' => 'Wedding']),
            'Graduation' => Category::firstOrCreate(['slug' => 'graduation'], ['name' => 'Graduation']),
            'Special Occasion' => Category::firstOrCreate(['slug' => 'special-occasion'], ['name' => 'Special Occasion']),
        ];

        $services = [
            [
                'name' => 'Paket Wedding Luxury',
                'description' => "✨ Full Glam Makeup Pengantin (Akad & Resepsi)\n✨ Riasan Tahan Hingga 12+ Jam & Anti-Crack\n✨ Free Touch Up & Pemasangan Hijab/Hairdo\n✨ Free Riasan Ringan untuk Ibu Pengantin",
                'price' => 5000000,
                'category_id' => $categories['Wedding']->id,
            ],
            [
                'name' => 'Paket Graduation Glam',
                'description' => "✨ Makeup Wisuda Flawless & Fresh\n✨ Ketahanan Tinggi untuk Aktivitas Seharian\n✨ Styling Hijab / Hairdo Wisuda Elegan\n✨ Free Bulu Mata Premium & Softlens Friendly",
                'price' => 500000,
                'category_id' => $categories['Graduation']->id,
            ],
            [
                'name' => 'Special Occasion Glam',
                'description' => "✨ Makeup untuk Pesta, Bridesmaid, Tunangan, atau Pre-wedding\n✨ Look Disesuaikan dengan Gaun & Konsep Acara\n✨ Produk High-End Skin-Prep & Finishing Halus",
                'price' => 750000,
                'category_id' => $categories['Special Occasion']->id,
            ],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(
                ['name' => $service['name']],
                $service
            );
        }
    }
}