<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 
use App\Models\Penjual;

class PenjualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penjual = [
            [
                'id' => 1,
                'id_users' => 1,
                'nama' => 'Ardha Nur Azizah',
                'alamat' =>'Jln. Basuki Rahmad no 03 Kab. Kediri',
                'no' => '082559872333',
            ],
        ];
        DB::table('penjual')->insert($penjual);
    }
}
