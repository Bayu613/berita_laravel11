<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kontens extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'judul',
        'keterangan',
        'kategori',
        'tanggal',
        'slug',
        'foto',
        
    ];   




   
}
