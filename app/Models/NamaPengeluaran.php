<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NamaPengeluaran extends Model
{
    protected $fillable = [
        'nama_pengeluaran',
        'layanan_id'
    ];

    public function layanan() {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
