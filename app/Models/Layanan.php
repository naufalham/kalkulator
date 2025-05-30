<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanans';
    protected $fillable = ['nama_layanan', 'deskripsi'];

    public function recordPendapatan()
    {
        return $this->hasMany(RecordPendapatan::class, 'layanan_id');
    }

    public function recordPengeluaran()
    {
        return $this->hasMany(RecordPengeluaran::class, 'layanan_id');
    }
}
 