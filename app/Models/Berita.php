<?php

namespace App\Models;

use Illuminate\Support\Str;
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
        'slug',
    ];

    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : null;
    }
    
    // Membuat slug otomatis dari judul
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->judul);
        });
    }
}
