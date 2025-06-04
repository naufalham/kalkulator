<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kalkulator;
use App\Models\KalkulatorField;

class KalkulatorSeeder extends Seeder
{
    public function run()
    {
        $bep = Kalkulator::create([
            'slug' => 'bep',
            'nama' => 'Break Even Point',
            'deskripsi' => 'Menghitung titik impas usaha Anda.'
        ]);
        $modal = Kalkulator::create([
            'slug' => 'modal',
            'nama' => 'Modal Usaha',
            'deskripsi' => 'Menghitung modal yang dibutuhkan untuk memulai usaha.'
        ]);
        $laba = Kalkulator::create([
            'slug' => 'laba',
            'nama' => 'Laba Usaha',
            'deskripsi' => 'Menghitung laba bersih usaha Anda.'
        ]);
        $hargaJual = Kalkulator::create([
            'slug' => 'harga-jual',
            'nama' => 'Harga Jual',
            'deskripsi' => 'Menghitung harga jual produk berdasarkan biaya dan margin yang diinginkan.'
        ]);
        $stok = Kalkulator::create([
            'slug' => 'stok',
            'nama' => 'Estimasi Modal Stok',
            'deskripsi' => 'Menghitung total modal yang diperlukan untuk membeli stok barang berdasarkan jumlah unit dan harga beli per unit.'
        ]);

        KalkulatorField::insert([
            [
                'kalkulator_id' => $bep->id,
                'nama_field' => 'fixedCost',
                'label' => 'Biaya Tetap (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Biaya yang tidak berubah meskipun jumlah penjualan berubah',
                'opsi' => null,
                'urutan' => 1
            ],
            [
                'kalkulator_id' => $bep->id,
                'nama_field' => 'unitPrice',
                'label' => 'Harga Jual Per Unit (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Harga jual produk per unit',
                'opsi' => null,
                'urutan' => 2
            ],
            [
                'kalkulator_id' => $bep->id,
                'nama_field' => 'variableCost',
                'label' => 'Biaya Variable Per Unit (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Biaya variabel per unit produk',
                'opsi' => null,
                'urutan' => 3
            ],
            [
                'kalkulator_id' => $bep->id,
                'nama_field' => 'category',
                'label' => 'Pilih kategori (Salah Satu)',
                'tipe' => 'radio',
                'keterangan' => null,
                'opsi' => json_encode([
                    ['value' => 'unit', 'label' => 'Unit barang/jasa yang harus dijual'],
                    ['value' => 'revenue', 'label' => 'Berapa rupiah penjualan yang dibutuhkan'],
                ]),
                'urutan' => 4
            ],
            [
                'kalkulator_id' => $modal->id,
                'nama_field' => 'sewaTempat',
                'label' => 'Sewa Tempat (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Biaya yang dikeluarkan untuk menyewa lokasi usaha sebagai lokasi operasional bisnis',
                'opsi' => null,
                'urutan' => 1
            ],
            [
                'kalkulator_id' => $modal->id,
                'nama_field' => 'biayaOperasional',
                'label' => 'Biaya alat & perlengkapan (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Pengeluaran untuk membeli peralatan penunjang usaha',
                'opsi' => null,
                'urutan' => 2
            ],
            [
                'kalkulator_id' => $modal->id,
                'nama_field' => 'beliStokBarang',
                'label' => 'Beli stok barang (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Biaya untuk membeli barang dagangan awal atau bahan baku produksi',
                'opsi' => null,
                'urutan' => 3
            ],
            [
                'kalkulator_id' => $modal->id,
                'nama_field' => 'biayaPromosi',
                'label' => 'Biaya promosi awal (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Anggaran yang digunakan untuk mengenalkan usaha',
                'opsi' => null,
                'urutan' => 4
            ],
            [
                'kalkulator_id' => $laba->id,
                'nama_field' => 'pendapatan',
                'label' => 'Total Pendapatan (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Jumlah seluruh pemasukan dari hasil penjualan produk atau jasa dalam periode tertentu',
                'opsi' => null,
                'urutan' => 1
            ],
            [
                'kalkulator_id' => $laba->id,
                'nama_field' => 'totalBiaya',
                'label' => 'Total Biaya (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Jumlah seluruh pengeluaran usaha dalam periode yang sama, termasuk biaya tetap dan biaya variabel',
                'opsi' => null,
                'urutan' => 2
            ],
            [
                'kalkulator_id' => $hargaJual->id,
                'nama_field' => 'biayaTetap',
                'label' => 'Biaya Tetap (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Biaya yang tidak berubah meskipun jumlah penjualan berubah (Contoh: sewa tempat, gaji tetap, listrik bulanan)',
                'opsi' => null,
                'urutan' => 1
            ],
            [
                'kalkulator_id' => $hargaJual->id,
                'nama_field' => 'marginKontribusi',
                'label' => 'Rasio Margin Kontribusi (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Selisih antara harga jual per unit dan biaya variabel per unit',
                'opsi' => null,
                'urutan' => 2
            ],
            [
                'kalkulator_id' => $hargaJual->id,
                'nama_field' => 'targetLaba',
                'label' => 'Target Laba (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Jumlah keuntungan yang ingin dicapai',
                'opsi' => null,
                'urutan' => 3
            ],
            [
                'kalkulator_id' => $stok->id,
                'nama_field' => 'jumlahUnit',
                'label' => 'Jumlah Unit Barang',
                'tipe' => 'number',
                'keterangan' => 'Jumlah produk atau barang yang ingin dibeli untuk dijadikan stok',
                'opsi' => null,
                'urutan' => 1
            ],
            [
                'kalkulator_id' => $stok->id,
                'nama_field' => 'hargaBeliPerUnit',
                'label' => 'Harga Beli per Unit (Rp)',
                'tipe' => 'number',
                'keterangan' => 'Harga pembelian untuk satu unit barang dari supplier',
                'opsi' => null,
                'urutan' => 2
            ],
        ]);
        
        
    }
}