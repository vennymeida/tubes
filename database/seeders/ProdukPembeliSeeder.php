<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 
use App\Models\ProdukPembeli;
use Carbon\Carbon;

class ProdukPembeliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk_pembelis = [
            [
                'id_produk' => 1,
                'id_pembeli' => 2,
                'tanggal' => Carbon::parse('2022-05-30'),
                'total' => 99.000,
            ],
            [
                'id_produk' => 4,
                'id_pembeli' => 2,
                'tanggal' => Carbon::parse('2022-05-30'),
                'total' => 90.000,
            ],
            [
                'id_produk' => 2,
                'id_pembeli' => 2,
                'tanggal' => Carbon::parse('2022-05-30'),
                'total' => 36.000,
            ],
            [
                'id_produk' => 6,
                'id_pembeli' => 2,
                'tanggal' => Carbon::parse('2022-05-30'),
                'total' => 64.000,
            ],
        ];
        DB::table('produk_pembelis')->insert($produk_pembelis);
    }
}
