<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    protected $primaryKey = 'id_produk';
    protected $table = 'produks';
    protected $fillable = [
        'id_kategori',
        'nama_produk',
        'gambar_produk',
        'harga',
        'stok',
        'deskripsi',
        'tanggal_upload',
        'id_toko',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_user');
    }

    public function gambarProduks()
    {
        return $this->hasMany(gambar_produk::class, 'id_produk');
    }
}
