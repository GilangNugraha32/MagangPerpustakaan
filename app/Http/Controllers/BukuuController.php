<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Redirect;

class BukuuController extends Controller
{
    public function buku()
    {
        $Buku = Buku::paginate(10); // Mengambil data dengan pagination
        return view('halaman.buku', compact('Buku')); // Mengirim data buku ke view
    }

    public function detail($id)
    {
        $buku = Buku::findOrFail($id); // Mengambil detail buku berdasarkan id
        return view('halaman.buku_detail', compact('buku')); // Mengirim data buku ke view
    }

    public function create()
    {
        return view('tambah.tambahbuku'); // Pastikan ada view tambahbuku.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|date',
            'status_ketersediaan' => 'required|string|max:50',
            'stok' => 'required|integer',
            'kategori' => 'required|string|max:255',
        ]);

        Buku::create([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'penerbit' => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'status_ketersediaan' => $request->input('status_ketersediaan'),
            'stok' => $request->input('stok'),
            'kategori' => $request->input('kategori'),
        ]);

        return redirect()->route('halaman.buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id); // Mengambil data buku berdasarkan id
        return view('edit.editbuku', compact('buku')); // Mengirim data buku ke view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|date',
            'status_ketersediaan' => 'required|string|max:50',
            'stok' => 'required|integer',
            'kategori' => 'required|string|max:255',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'penerbit' => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'status_ketersediaan' => $request->input('status_ketersediaan'),
            'stok' => $request->input('stok'),
            'kategori' => $request->input('kategori'),
        ]);

        return redirect()->route('halaman.buku')->with('success', 'Buku berhasil diperbarui!');
    }

    public function forcedelete($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return Redirect::route('halaman.buku')->with('error', 'Buku tidak ditemukan.');
        }

        $buku->delete();

        return Redirect::route('halaman.buku')->with('success', 'Buku berhasil dihapus.');
    }
}