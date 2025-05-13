<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'nama' => 'ham',
            'email' => 'ham@gmail.com',
            'kata_sandi' => bcrypt('123456'),
            'role' => 'user',
        ]);


        User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'kata_sandi' => bcrypt('123456'),
            'role' => 'admin',
        ]);
        
    }
}
