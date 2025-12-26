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
        // Membuat akun Admin untuk login ke Dashboard nantinya
        User::factory()->create([
            'name' => 'Admin GlamByRamdiah',
            'email' => 'admin@glambyramdiah.com',
            'password' => bcrypt('password123'), // Ganti dengan password yang lebih aman nanti
        ]);

        // Memanggil ServiceSeeder untuk mengisi tabel daftar layanan/paket makeup
        $this->call([
            ServiceSeeder::class,
        ]);
    }
}