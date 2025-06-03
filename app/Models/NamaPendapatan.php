<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NamaPendapatan extends Model
{
    protected $fillable = [
        'nama_pendapatan',
        'layanan_id'
    ];

    public function layanan() {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
