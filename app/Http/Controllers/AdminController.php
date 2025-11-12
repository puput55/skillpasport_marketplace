<?php

namespace App\Http\Controllers;

use App\Models\gambar_produk;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index ()
    {
        $totalUser = User::count();
        $totalToko = Toko::count();
        $totalProduk = Produk::count();
        $totalKategori = Kategori::count();
        $totalGambar = gambar_produk::count();
        return view('admin.dashboard', compact('totalUser', 'totalToko', 'totalProduk', 'totalKategori', 'totalGambar'));
    }
}
