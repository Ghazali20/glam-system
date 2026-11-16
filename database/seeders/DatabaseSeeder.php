<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminPassword = env('ADMIN_PASSWORD');

        if (! $adminPassword) {
            throw new \RuntimeException('ADMIN_PASSWORD wajib diatur sebelum menjalankan database seeder.');
        }

        // Membuat akun Admin untuk login ke Dashboard Filament
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin01@glambyramdiah.com')],
            [
                'name' => 'Admin Glam By Ramdiah',
                'password' => $adminPassword,
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // Memanggil ServiceSeeder & PortfolioSeeder
        $this->call([
            ServiceSeeder::class,
            PortfolioSeeder::class,
        ]);
    }
}