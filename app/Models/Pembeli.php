<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Pembeli as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; // eloquent model


class Pembeli extends Model
{
    use HasFactory;

    protected $table = 'pembeli'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel pembeli
    protected $primaryKey = 'id'; // Memanggil isi DB Dengan primarykey

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
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
    public function Produk()
    {
        return $this->hasMany(Produk::class, 'id_pembeli');
    }
    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class);
    }
}
