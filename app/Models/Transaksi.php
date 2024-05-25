<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";

    public function pengacara()
    {
        return $this->belongsTo(Pengacara::class, "pengacara_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {



            $model->kode_transaksi = "INV" . time();
        });
    }
}
