<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_layanan',
        'tipe', // Assuming 'tipe' is a fillable field based on your controller logic
        // Add other fillable fields as necessary
    ];

    /**
     * Get the pendapatan associated with the layanan.
     */
    public function pendapatan()
    {
        return $this->hasMany(\App\Models\NamaPendapatan::class, 'layanan_id');
    }

    /**
     * Get the pengeluaran associated with the layanan.
     */
    public function pengeluaran()
    {
        return $this->hasMany(\App\Models\NamaPengeluaran::class, 'layanan_id');
    }

    // Add other relationships or methods as needed
}
