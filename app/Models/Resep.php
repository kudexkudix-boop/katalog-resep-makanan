<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'reseps';

    protected $fillable = [
        'nama_resep',
        'deskripsi',
        'bahan',
        'langkah',
        'waktu_memasak',
        'gambar',
    ];
}