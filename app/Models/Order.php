<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'katalog_id',
        'email_pemesan',
        'tanggal_pesan',
        'status',
    ];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'katalog_id');
    }
}
