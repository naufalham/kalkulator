<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kalkulator;
use App\Models\KalkulatorField;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            LayananSeeder::class,
            PendapatanPengeluaranSeeder::class,
            // BeritaSeeder::class,
            FaqSeeder::class,
            KalkulatorSeeder::class,
            // ProductSeeder::class,
            // // OrderSeeder::class,
            // // TransactionSeeder::class,
            // RajaOngkirSeeder::class
        ]);

        // $this->call(LayananSeeder::class);
        // $this->call(PendapatanPengeluaranSeeder::class);
        // $this->call(BeritaSeeder::class);
        // $this->call(FaqSeeder::class);
        // $this->call(KalkulatorSeeder::class);
    }
}
