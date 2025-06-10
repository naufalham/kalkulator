<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class BeritaFactory extends Factory
{
    protected $faker;

    public function __construct()
    {
        parent::__construct();
        $this->faker = FakerFactory::create('id_ID');  // pakai lokal Indonesia
    }

    public function definition(): array
    {
        $judul = $this->faker->sentence(3);
        return [
            'judul' => $judul,
            'slug' => Str::slug($judul),
            'foto' => $this->faker->imageUrl(640, 480, 'news', true, 'Berita'),
            'isi' => $this->faker->paragraphs(3, true),
        ];
    }
}
