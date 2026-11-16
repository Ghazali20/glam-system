<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    protected $guarded = [];

    protected $casts = [
        'marquee_speed' => 'integer',
        'collection_active' => 'boolean',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'collection_badge' => 'Daily Collection',
                'collection_title' => 'Koleksi Hasil Riasan',
                'collection_description' => 'Inspirasi look yang terus bergerak untuk menemani Anda menemukan gaya riasan yang paling cocok.',
                'marquee_text' => 'Signature Glam • Skin-first preparation • 12+ jam tahan lama •',
                'marquee_speed' => 32,
                'collection_active' => true,
            ],
        );
    }
}
