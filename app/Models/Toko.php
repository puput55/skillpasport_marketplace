<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Toko extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id_toko';
    protected $table = 'tokos';
    //
    protected $fillable = [
        'nama_toko',
        'deskripsi',
        'gambar',
        'kontak_toko',
        'alamat',
        'id_user',
    ];

        // Relasi ke USER
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // 🚀 INI YANG PALING PENTING !!
    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_toko', 'id_toko');
    }


}
