<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    use HasFactory;

    protected $table = 'penjual';

    protected $fillable = [
        'id_users',
        'nama',
        'alamat',
        'no',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_penjual');
    }
}
