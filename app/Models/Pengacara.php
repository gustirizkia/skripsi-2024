<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengacara extends Model
{
    use HasFactory;

    protected $table = "pengacara";

    public function kota()
    {
        return $this->belongsTo(Kota::class, "kota_id", "id");
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriHukum::class, "kategori_hukum_id", "id");
    }
}
