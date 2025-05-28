<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecordPengeluaran extends Model
{
    protected $fillable = ['user_id', 'layanan_id', 'nama_pengeluaran_id', 'value'];
}
