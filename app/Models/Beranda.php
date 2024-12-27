<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;
use Cviebrock\EloquentSluggable\Sluggable;





class Beranda extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    use Sluggable;
    protected $fillable = [
        'judul',
        'keterangan',
        'kategori',
        'slug',
        'tanggal',
        'foto',
    ];
    protected $casts = [
        'tanggal' => 'datetime', // Ini akan mengonversi 'tanggal' menjadi instance Carbon
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
