<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produks = Produk::all();
        return view('admin.produk', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $produks = Produk::all();
        $tokos = Toko::all();
        $kategoris = Kategori::all();
        return view('admin.produk-create',compact('produks','kategoris','tokos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required|string|max:100',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'tanggal_upload' => 'required|date',
            'id_toko' => 'required',
        ]);

        $filename = null;

        if ($request->hasFile('gambar_produk')) {
            $gambar = $request->file('gambar_produk');
            $filename = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('gambar', $filename, 'public');
        }

        Produk::create([
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'gambar_produk' => $filename,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'tanggal_upload' => $request->tanggal_upload,
            'id_toko' => $request->id_toko,
        ]);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    // public function show(Produk $produk)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk, $id)
    {
        //
        $produk = Produk::findOrFail($id);
        $tokos = Toko::all();
        $kategoris = Kategori::all();
        return view('admin.produk-edit', compact('produk','kategoris','tokos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required|string|max:100',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'tanggal_upload' => 'required|date',
            'id_toko' => 'required',
        ]);
        $produk = Produk::findOrFail($id);

        if ($request->hasFile('gambar_produk')) {
        $gambar = $request->file('gambar_produk');
        $filename = time() . '_' . $gambar->getClientOriginalName();
        $gambar->storeAs('gambar', $filename, 'public');
        $produk->gambar_produk = $filename;
    }

        $produk->update([
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'gambar_produk' => $produk->gambar_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'tanggal_upload' => $request->tanggal_upload,
            'id_toko' => $request->id_toko,
        ]);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk, $id)
    {
        //
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
