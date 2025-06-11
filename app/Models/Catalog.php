<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = [
    'nama_jasa_cuci', 'harga', 'deskripsi', 'gambar'
    ];
}
