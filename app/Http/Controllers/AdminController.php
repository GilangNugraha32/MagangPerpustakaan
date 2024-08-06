<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $admins = Admin::paginate(10); // Mengambil data dengan pagination
        return view('halaman.admin', compact('admins')); // Mengirim data admin ke view
    }

    public function create()
    {
        return view('tambah.tambahadmin'); // Return the view located in the tambah folder
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_admin' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admin',
            'password' => 'required|string|min:8',
            'alamat' => 'nullable|string',
            'no_telepon' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|string'
        ]);

        // Buat admin baru
        Admin::create([
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => bcrypt($request->password), // Enkripsi password
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        // Redirect ke halaman admin dengan pesan sukses
        return redirect()->route('halaman.admin')->with('success', 'Admin berhasil ditambahkan.');
    }
}