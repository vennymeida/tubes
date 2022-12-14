<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_user',
        'tanggal',
        'status',
        'kode',
        'total',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli');
    }

    public function detail()
    {
        return $this->hasMany(Detail::class, 'id_transaksi');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
