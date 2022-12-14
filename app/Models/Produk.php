<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'foto',
    ];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli');
    }
    public function penjual()
    {
        return $this->belongsTo(Penjual::class, 'id_penjual');
    }
    public function detail()
    {
        return $this->hasMany(Detail::class, 'id_produk');
    }

}
