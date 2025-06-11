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
            $slug = Str::slug($model->judul);
            $originalSlug = $slug;
            $count = 1;

            // Cek slug unik
            while (static::where('slug', $slug)
                ->where('id', '!=', $model->id ?? 0)
                ->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            $model->slug = $slug;
        });
    }

    // public function rekomendasi($limit = 4)
    // {
    //     $beritaLain = Berita::where('id', '!=', $this->id)->get();

    //     return $beritaLain->sortByDesc(function ($item) {
    //         // Hitung similarity judul
    //         similar_text(strip_tags($this->judul), strip_tags($item->judul), $similarJudul);

    //         // Hitung similarity isi
    //         similar_text(strip_tags($this->isi), strip_tags($item->isi), $similarIsi);

    //         // Bobot: 70% judul, 30% isi
    //         return (0.7 * $similarJudul) + (0.3 * $similarIsi);
    //     })->take($limit);
    // }


    public function rekomendasi($limit = 4)
    {
        $beritaLain = Berita::where('id', '!=', $this->id)->get();

        // Hitung skor kemiripan untuk setiap berita lain dan tambahkan sebagai atribut sementara
        $beritaDenganScore = $beritaLain->map(function ($item) {
            // Hitung similarity judul
            similar_text(strip_tags($this->judul), strip_tags($item->judul), $similarJudul);

            // Hitung similarity isi
            similar_text(strip_tags($this->isi), strip_tags($item->isi), $similarIsi);

            // Bobot: 70% judul, 30% isi
            $score = (0.7 * $similarJudul) + (0.3 * $similarIsi);
            $item->similarity_score = $score; // Tambahkan skor sebagai atribut sementara
            return $item;
        });

        // Filter berita yang memiliki skor kemiripan kurang dari 100 (tidak identik)
        $filteredBerita = $beritaDenganScore->filter(function ($item) {
            return $item->similarity_score < 100;
        });

        // Urutkan berdasarkan skor kemiripan secara menurun dan ambil sejumlah limit
        return $filteredBerita->sortByDesc('similarity_score')->take($limit);
    }

}
