<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser // Tambahkan implements ini
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Menentukan apakah pengguna adalah administrator.
     */
    public function isAdmin(): bool
    {
        $adminEmails = array_map('trim', explode(',', env('ADMIN_EMAIL', 'admin01@glambyramdiah.com,ghazali@gmail.com')));
        foreach ($adminEmails as $email) {
            if (strcasecmp($this->email, $email) === 0) {
                return true;
            }
        }
        return false;
    }

    /**
     * Menentukan siapa yang boleh masuk ke Panel Admin Filament.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin();
    }
}