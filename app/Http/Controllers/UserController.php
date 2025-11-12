<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        $produks = Produk::all();
        return view('admin.user',compact('users','produks'));
    }

    public function create()
    {
        return view('admin.user-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kontak' => 'nullable|string|max:13',
            'username' => 'required|string|max:20|unique:users,username',
            'password' => 'required|string|max:100',
            'role' => 'required',
        ]);

        User::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
    }

    // public function show($id)
    // {
    //     return view('admin.users.show', compact('id'));
    // }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kontak' => 'nullable|string|max:13',
            'username' => 'required|string|max:20|unique:users,username,' . $id . ',id_user',
            'password' => 'required|string|max:100',
            'role' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->update([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('member.home');
            }
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
