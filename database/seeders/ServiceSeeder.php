<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Paket Wedding Luxury',
                'description' => 'Layanan make up lengkap untuk pengantin (resepsi & akad).',
                'price' => 5000000,
                'category' => 'Wedding',
            ],
            [
                'name' => 'Paket Graduation Glam',
                'description' => 'Riasan spesial untuk hari wisuda yang tahan lama.',
                'price' => 500000,
                'category' => 'Graduation',
            ],
            [
                'name' => 'Special Occasion',
                'description' => 'Party, Bridesmaid, engagement, pre-wedding.',
                'price' => 750000,
                'category' => 'Special',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}