<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 
use App\Models\Produk;

class ProdukBaruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [
            [
                'id_penjual' => 1,
                'nama' => 'Blender Juicer Portable',
                'deskripsi' =>'Ringan, mudah dipasang dan dibersihkan',
                'harga' => 99.000,
                'stok' => 10,
            ],
            [
                'id_penjual' => 1,
                'nama' => 'Gelas Set Tuscany isi 6',
                'deskripsi' =>'mudah pecah',
                'harga' => 36.000,
                'stok' => 11,
            ],
            [
                'id_penjual' => 1,
                'nama' => 'Rak Piring Stainless 2 Tingkat',
                'deskripsi' =>'anti karat dan bagian bawah tidak licin',
                'harga' => 147.000,
                'stok' => 5,
            ],
            [
                'id_penjual' => 1,
                'nama' => 'Toples Pandaoma 1800 ml',
                'deskripsi' =>'Bahan Food Grade dan tidak mudah pecah walaupun jatuh dari atas',
                'harga' => 45.000,
                'stok' => 7,
            ],
            [
                'id_penjual' => 1,
                'nama' => 'Angola Broom Set Dustpan',
                'deskripsi' =>'Terbuat dari bahan plastik pp dan PET yang kuat dan awet',
                'harga' => 64.000,
                'stok' => 9,
            ],
            [
                'id_penjual' => 1,
                'nama' => 'Centong Sayur Kayu',
                'deskripsi' =>'Tahan Panas',
                'harga' => 32.000,
                'stok' => 15,
            ],
        ];
        DB::table('produk')->insert($produk);
    }
}
