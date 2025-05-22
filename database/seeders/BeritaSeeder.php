<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('berita')->insert([
            [
                'judul' => 'anu',
                'slug' => Str::slug('anu'),
                'foto' => 'aksbdn.jpg',
                'isi' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.',
            ],
            [
                'judul' => 'una',
                'slug' => Str::slug('una'),
                'foto' => 'asdgfh.jpg',
                'isi' => 'alorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.',
            ],
            [
                'judul' => 'aku',
                'slug' => Str::slug('aku'),
                'foto' => 'tyref.jpg',
                'isi' => 'blorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.',
            ],
        ]);
    }
}
