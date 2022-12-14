<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 
use App\Models\Transaksi;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaksi = [
            [
                'id_pembeli' => 1,
                'tanggal' => Carbon::parse('2022-06-14'),
                'total' => 99.000,
            ],
        ];
        DB::table('transaksi')->insert($transaksi);
    }
}
