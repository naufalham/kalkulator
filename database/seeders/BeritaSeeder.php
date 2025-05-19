<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::create([
            'judul' => 'anu',
            'foto' => 'aksbdn.jpg',
            'isi' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.',
        ],
        );
    }
}
