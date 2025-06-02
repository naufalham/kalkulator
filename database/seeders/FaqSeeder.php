<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Faq::insert([
            [
            'question' => 'Bagaimana cara menggunakan kalkulator analisis?',
            'answer' => 'Cukup pilih jenis usaha → masukkan data yang diminta → klik "Hitung". Anda akan diminta melakukan pembayaran terlebih dahulu untuk mendapatkan hasil analisis dalam bentuk file Excel.'
            ],
            [
            'question' => 'Apakah saya perlu membayar untuk menggunakan kalkulator?',
            'answer' => 'Ya, Anda perlu melakukan pembayaran untuk mendapatkan hasil analisis. Setelah pembayaran, Anda akan menerima file Excel dengan hasil analisis usaha Anda.'
            ],
            [
            'question' => 'Apa yang harus saya lakukan jika hasil analisis tidak sesuai harapan?',
            'answer' => 'Jika hasil analisis tidak sesuai harapan, Anda dapat menghubungi tim dukungan kami melalui email atau formulir kontak di situs web untuk mendapatkan bantuan lebih lanjut.'
            ],
            [
            'question' => 'Apakah ada batasan jumlah usaha yang dapat saya analisis?',
            'answer' => 'Tidak ada batasan jumlah usaha yang dapat Anda analisis. Anda dapat menggunakan kalkulator untuk berbagai jenis usaha sesuai kebutuhan Anda.'
            ],
        ]);
    }
}
