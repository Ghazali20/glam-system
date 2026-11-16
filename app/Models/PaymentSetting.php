<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    protected $guarded = [];

    protected $casts = [
        'bank_accounts' => 'array',
        'is_active' => 'boolean',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'bank_accounts' => [
                    [
                        'bank_name' => 'BCA',
                        'account_number' => '1234567890',
                        'account_holder' => 'Glam By Ramdiah',
                        'is_active' => true,
                    ],
                    [
                        'bank_name' => 'Mandiri',
                        'account_number' => '8877665544',
                        'account_holder' => 'Glam By Ramdiah',
                        'is_active' => true,
                    ],
                ],
                'payment_instructions' => 'Transfer sesuai total invoice, lalu kirim bukti pembayaran melalui WhatsApp admin.',
                'admin_whatsapp' => config('app.admin_whatsapp'),
                'is_active' => true,
            ],
        );
    }

    public function whatsappNumber(): ?string
    {
        $number = preg_replace('/\D+/', '', (string) $this->admin_whatsapp);

        if ($number === '') {
            return null;
        }

        return str_starts_with($number, '0')
            ? '62' . substr($number, 1)
            : $number;
    }

    public function whatsappUrl(string $message): ?string
    {
        $number = $this->whatsappNumber();

        return $number ? 'https://wa.me/' . $number . '?text=' . urlencode($message) : null;
    }

    public function activeBankAccounts(): array
    {
        return collect($this->bank_accounts ?? [])
            ->filter(fn (array $account): bool => (bool) ($account['is_active'] ?? true))
            ->values()
            ->all();
    }

    public function paymentOptions(): array
    {
        if (! $this->is_active) {
            return [];
        }

        $options = collect($this->activeBankAccounts())
            ->mapWithKeys(fn (array $account): array => [
                $account['bank_name'] => sprintf(
                    '%s - %s (a/n %s)',
                    $account['bank_name'],
                    $account['account_number'],
                    $account['account_holder'],
                ),
            ]);

        if ($this->qris_image_path) {
            $options->put('QRIS', 'QRIS (Scan untuk membayar)');
        }

        return $options->all();
    }

    public function getQrisImageUrlAttribute(): ?string
    {
        return $this->qris_image_path
            ? asset('storage/' . ltrim($this->qris_image_path, '/'))
            : null;
    }
}
