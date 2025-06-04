<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as FakerFactory;


class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create('id_ID');
        
        // Contoh membuat data manual dengan faker Indonesia
        foreach(range(1, 100) as $i) {
            \App\Models\Berita::create([
                'judul' => $faker->sentence(3),
                'slug' => \Illuminate\Support\Str::slug($faker->sentence(3)),
                'foto' => $faker->imageUrl(640, 480, 'news', true, 'Berita'),
                'isi' => $faker->paragraphs(3, true),
            ]);
        }
    }

}
