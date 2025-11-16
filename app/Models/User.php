<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id';
    protected $table = 'users';

    /**
     * Kolom yang boleh diisi mass-assignment.
     */
    protected $fillable = [
        'nama',
        'kontak',
        'username',
        'password',
        'role',
    ];

    public function tokos()
    {
        return $this->hasMany(Toko::class, 'id_user');
    }

    public function produks()
    {
        return $this->hasMany(Produk::class, Toko::class, 'id_user');
    }

    /**
     * Kolom yang disembunyikan saat serialisasi (misal: API / JSON).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Konversi otomatis kolom tertentu.
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}
