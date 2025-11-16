<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * ===================== LOGIN =====================
     */
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Coba login
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // regenerasi session agar aman
            // Redirect sesuai role
            $request->session()->regenerate();
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role === 'member') {
                return redirect()->route('member.home');
            } else {
                Auth::logout();
                return redirect()->route('beranda')->with('error', 'Role tidak dikenali.');
            }
        }


        // Jika gagal login
        return back()->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }

    /**
     * ===================== CRUD USER =====================
     */
    public function index()
    {
        $users = User::all();
        $produks = Produk::all();
        return view('admin.user', compact('users', 'produks'));
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
            'password' => 'required|string|min:4|max:100',
            'role' => 'required',
        ]);

        User::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100',
            'kontak' => 'nullable|string|max:13',
            'username' => 'required|string|max:20|unique:users,username,' . $id . ',id_user',
            'password' => 'nullable|string|min:4|max:100',
            'role' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }
}
