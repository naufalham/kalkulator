<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecordPendapatan extends Model
{
    protected $fillable = ['user_id', 'layanan_id', 'nama_pendapatan_id', 'value'];
    
    public function layanan()
    {
        return $this->belongsTo(\App\Models\Layanan::class, 'layanan_id');
    }
}
