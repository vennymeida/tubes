<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 
use App\Models\Pembeli;

class PembeliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pembeli = [
            [
                'id' => 1,
                'id_users' => 2,
                'nama' => 'Ayu Puspita',
                'alamat' =>'Jln. Basuki Rahmad no 94 Kab. Kediri',
                'no' => '081123456111',
            ],
            [
                'id' => 2,
                'id_users' => 3,
                'nama' => 'Annisa Trihapsari',
                'alamat' =>'Jln. Mayor Bismo no 73 Kab. Kediri',
                'no' => '081222890555',
            ],
            [
                'id' => 3,
                'id_users' => 4,
                'nama' => 'Anang Subagyo',
                'alamat' =>'Jln. Diponegoro no 11 Kab. Kediri',
                'no' => '087777890123',
            ],
            [
                'id' => 4,
                'id_users' => 5,
                'nama' => 'Diandra Dwi',
                'alamat' =>'Jln. Mayor Bismo no 20  Kab. Kediri',
                'no' => '087777890123',
            ],
            [
                'id' => 5,
                'id_users' => 6,
                'nama' => 'Bayu Saputra',
                'alamat' =>'Jln. Hasanudin no 16  Kab. Kediri',
                'no' => '087777890123',
            ],
        ];
        DB::table('pembeli')->insert($pembeli);
    }
}
