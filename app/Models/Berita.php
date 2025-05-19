<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key

    protected $fillable = [
        'judul',
        'foto',
        'isi',
    ];

    public function getFotoAttribute($value)
    {
        return asset('storage/' . $value);
    }
    
}
