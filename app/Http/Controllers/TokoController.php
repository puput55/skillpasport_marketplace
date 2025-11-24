<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tokos = Toko::with('user')->get();
        return view('admin.toko', compact('tokos'));
    }

    public function create()
    {
        $members = User::where('role','member')->where('status','active')->get();
        return view('admin.toko-create', compact('members'));
    }
    public function mentok(){
        $data['toko'] = Toko::where('id_user', Auth::user()->id)->first();
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_toko' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kontak_toko' => 'required|string|max:13',
            'alamat' => 'required|string',
            'id_user' => 'required|'
        ]);

        if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $filename = time() . '_' . $request->nama_toko . '-' . $gambar->getClientOriginalName();
        $gambar->storeAs('gambar', $filename, 'public');
        }
        else {
            $filename = null; // gunakan gambar lama jika tidak ada yang diupload
        }

        Toko::create([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,
            'kontak_toko' => $request->kontak_toko,
            'alamat' => $request->alamat,
            'id_user' => $request->id_user,
        ]);

        return redirect()->route('admin.toko.index')->with('success','Toko berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $toko = Toko::findOrFail($id);
        $members = User::where('role','member')->where('status','active')->get();
        return view('admin.toko-edit', compact('toko','members'));
    }

    public function update(Request $request, $id)
    {
        $toko = Toko::findOrFail($id);

        $request->validate([
            'nama_toko' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kontak_toko' => 'required|string|max:13',
            'alamat' => 'required|string',
            'id_user' => 'required|exists:users,id_user'
        ]);

        $data = $request->only(['nama_toko','deskripsi','kontak_toko','alamat','id_user']);

        if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $filename = time() . '_' . $request->nama_toko . '-' . $gambar->getClientOriginalName();
        $gambar->storeAs('gambar', $filename, 'public');
        }
        else {
            $filename = null; // gunakan gambar lama jika tidak ada yang diupload
        }

        $toko->update($data);

        return redirect()->route('admin.toko.index')->with('success','Toko berhasil diperbarui.');
    }
    public function memberToko(){
    $toko = Toko::where('id_toko', Auth::id())->first();
    $product = Produk::all();
    return view('member-toko', compact('toko','product'));
}


    public function destroy($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->delete();
        return redirect()->route('admin.toko.index')->with('success','Toko berhasil dihapus.');
    }
}
