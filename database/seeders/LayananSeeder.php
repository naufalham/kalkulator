<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('layanans')->insert([
            [
                'nama_layanan' => 'Fesyen',
                'deskripsi' => 'Usaha yang berfokus pada pakaian, sepatu, dan aksesori gaya hidup.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Kuliner',
                'deskripsi' => 'Usaha di bidang makanan, minuman, dan layanan kuliner.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Jasa',
                'deskripsi' => 'Usaha yang menawarkan layanan atau keahlian untuk memenuhi kebutuhan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Kerajinan',
                'deskripsi' => 'Usaha yang mengubah kreativitas menjadi produk kerajinan bernilai.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Campuran',
                'deskripsi' => 'Usaha gabungan dari berbagai bidang untuk peluang yang lebih luas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}