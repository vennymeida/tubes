<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Ardha Nur Azizah',
                'email' => 'naardha0@gmail.com',
                'password' => Hash::make('123456'),
           ],
            [
                'name' => 'Ayu Puspita',
                'email' => 'ayupita@gmail.com',
                'password' => Hash::make('231765'),
            ],
            [
                'name' => 'Annisa Trihapsari',
                'email' => 'triannisa@gmail.com',
                'password' => Hash::make('343555'),
            ],
            [
                'name' => 'Anang Subagyo',
                'email' => 'nangyo730@gmail.com',
                'password' => Hash::make('733799'),
            ],
            [
                'name' => 'Diandra Dwi',
                'email' => 'diandwi@gmail.com',
                'password' => Hash::make('437177'),
            ],
            [
                'name' => 'Bayu Saputra',
                'email' => 'putraby@gmail.com',
                'password' => Hash::make('987654'),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
