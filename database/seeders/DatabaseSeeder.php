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
        // Membuat akun Admin untuk login ke Dashboard Filament
        User::firstOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin01@glambyramdiah.com')],
            [
                'name' => 'Admin Glam By Ramdiah',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Memanggil ServiceSeeder untuk mengisi tabel kategori dan layanan
        $this->call([
            ServiceSeeder::class,
        ]);
    }
}