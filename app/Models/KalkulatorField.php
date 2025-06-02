<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KalkulatorField extends Model
{
    protected $fillable = ['kalkulator_id', 'nama_field', 'label', 'tipe', 'keterangan', 'urutan'];
    public function kalkulator() {
        return $this->belongsTo(Kalkulator::class);
    }
}
