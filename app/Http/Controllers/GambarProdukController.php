<?php

namespace App\Http\Controllers;

use App\Models\gambar_produk;
use App\Models\Produk;
use Illuminate\Http\Request;

class GambarProdukController extends Controller
{
    public function index()
    {
        $gambar_produks = gambar_produk::all();
        return view('admin.gambar_produk', compact('gambar_produks'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('admin.gambar-create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produks,id_produk',
            'nama_gambar' => 'required|string|max:255',
        ]);

        gambar_produk::create([
            'id_produk' => $request->id_produk,
            'nama_gambar' => $request->nama_gambar,
        ]);

        return redirect()->route('admin.gambar.index')
            ->with('success', 'Gambar produk berhasil ditambahkan.');
    }

    public function edit(gambar_produk $gambar_produk)
    {
        $produks = Produk::all();
        return view('admin.gambar-edit', compact('gambar_produk', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $gambar_produk = gambar_produk::findOrFail($id);

        $request->validate([
            'id_produk' => 'required',
            'nama_gambar' => 'required'
        ]);

        $gambar_produk->update([
            'id_produk' => $request->id_produk,
            'nama_gambar' => $request->nama_gambar,
        ]);

        return redirect()->route('admin.gambar.index')->with('success', 'Gambar diperbarui');
    }


    public function destroy(gambar_produk $gambar_produk)
    {
        $gambar_produk->delete();
        return redirect()->route('admin.gambar.index')
            ->with('success', 'Gambar produk berhasil dihapus.');
    }
}
