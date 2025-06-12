<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendapatanPengeluaranSeeder extends Seeder
{
    public function run(): void
    {
        // Data pendapatan per layanan
        $fieldsPendapatan = [
            1 => [
                ['label' => 'Penjualan produk'],
                ['label' => 'Custom order'],
                ['label' => 'Reseller'],
            ],
            2 => [
                ['label' => 'Penjualan'],
                ['label' => 'Pemesanan katering'],
                ['label' => 'Pendapatan dari platform online (GoFood, ShopeeFood, dll)'],
            ],
            3 => [
                ['label' => 'Tarif jasa'],
                ['label' => 'Paket layanan'],
                ['label' => 'Pendapatan konsultasi / desain / les privat'],
            ],
            4 => [
                ['label' => 'Penjualan kerajinan tangan'],
                ['label' => 'Pesanan dari toko atau pameran'],
                ['label' => 'Online marketplace (Tokopedia, Shopee, dll)'],
            ],
            5 => [
            ]
        ];


        // Data pengeluaran per layanan
        $fieldsPengeluaran = [
            1 => [
                ['label' => 'Bahan baku'],
                ['label' => 'Gaji penjahit, desainer, admin'],
                ['label' => 'Biaya produksi'],
                ['label' => 'Biaya packaging'],
                ['label' => 'Biaya sewa toko'],
                ['label' => 'Biaya listrik, air, internet'],
                ['label' => 'Biaya promosi'],
            ],
            2 => [
                ['label' => 'Gaji koki dan karyawan'],
                ['label' => 'Gas, air, listrik'],
                ['label' => 'Alat dapur dan perlengkapan'],
                ['label' => 'Kemasan makanan'],
                ['label' => 'Sewa tempat'],
            ],
            3 => [
                ['label' => 'Gaji penyedia jasa'],
                ['label' => 'Alat kerja'],
                ['label' => 'Sewa tempat layanan'],
                ['label' => 'Internet & listrik'],
                ['label' => 'Promosi jasa online (Instagram Ads, brosur, dll)'],
                ['label' => 'Software / tools berlangganan (untuk desain, akuntansi, dll)'],
            ],
            4 => [
                ['label' => 'Bahan dasar (kayu, tanah liat, resin, kain flanel, dll)'],
                ['label' => 'Alat produksi kerajinan'],
                ['label' => 'Gaji perajin'],
                ['label' => 'Kemasan & pengiriman'],
                ['label' => 'Promosi dan foto produk'],
                ['label' => 'Biaya pameran/booth'],
            ],
            5 => [
            ]
        ];

        // Insert ke nama_pendapatans
        $pendapatan = [];
        foreach ($fieldsPendapatan as $layanan_id => $fields) {
            foreach ($fields as $field) {
                $pendapatan[] = [
                    'layanan_id' => $layanan_id,
                    'nama_pendapatan' => $field['label'],
                ];
            }
        }

        // Insert ke nama_pengeluarans
        $pengeluaran = [];
        foreach ($fieldsPengeluaran as $layanan_id => $fields) {
            foreach ($fields as $field) {
                $pengeluaran[] = [
                    'layanan_id' => $layanan_id,
                    'nama_pengeluaran' => $field['label'],
                ];
            }
        }

        DB::table('nama_pendapatans')->insert($pendapatan);
        DB::table('nama_pengeluarans')->insert($pengeluaran);
    }
}