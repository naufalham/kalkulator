<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kalkulator extends Model
{
    protected $fillable = ['slug', 'nama', 'deskripsi'];
    public function fields() {
        return $this->hasMany(KalkulatorField::class)->orderBy('urutan');
    }
}
