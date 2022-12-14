<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 
use App\Models\DetailTransaksi;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detail_transaksi = [
            [
                'id_transaksi' => 1,
                'id_produk' => 2,
                'jumlah' => 1,
                'harga' => 99000,
            ],
        ];
        DB::table('detail_transaksi')->insert($detail_transaksi);
    }
}
