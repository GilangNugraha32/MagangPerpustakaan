<?php


namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{ public function index()
    {
        $kategoriBuku = KategoriBuku::paginate(10);
        return view('halaman.kategoribuku', compact('kategoriBuku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi_kategori' => 'nullable|string',
        ]);

        KategoriBuku::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi_kategori' => $request->deskripsi_kategori,
        ]);

        return response()->json(['success' => 'Kategori Buku berhasil ditambahkan!']);
    }

    public function getKategoriBuku()
    {
        $kategoriBuku = KategoriBuku::all();
        return response()->json(['data' => $kategoriBuku]);
    }

    public function edit(Request $request)
    {
        $kategoriBuku = KategoriBuku::findOrFail($request->id_kategori);
        return response()->json(['data' => $kategoriBuku]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori_buku,id_kategori',
            'nama_kategori' => 'required|string|max:255',
            'deskripsi_kategori' => 'nullable|string',
        ]);

        $kategoriBuku = KategoriBuku::findOrFail($request->id_kategori);
        $kategoriBuku->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi_kategori' => $request->deskripsi_kategori,
        ]);

        return response()->json(['success' => 'Kategori Buku berhasil diperbarui!']);
    }

    public function destroy(Request $request)
    {
        $kategoriBuku = KategoriBuku::findOrFail($request->id_kategori);
        $kategoriBuku->delete();

        return response()->json(['success' => 'Kategori Buku berhasil dihapus!']);
    }
    // public function index()
    // {
    //     $kategoriBuku = KategoriBuku::paginate(10); // Mengambil data dengan pagination
    //     return view('halaman.kategoribuku', compact('kategoriBuku')); // Mengirim data kategori buku ke view
    // }
    // public function create()
    // {
    //     return view('tambah.tambahkategoribuku'); // Pastikan ada view tambahbuku.blade.php
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_kategori' => 'required|string|max:255',
    //         'deskripsi_kategori' => 'required|string|max:255',
    //         'tanggal_dibuat' => 'required|date',
    //         'tanggal_diperbarui' => '00-00-0000',
    //         'status' => '-',
    //     ]);

    //     KategoriBuku::create([
    //         'nama_kategori' => $request->input('nama_kategori'),
    //         'deskripsi_kategori' => $request->input('deskripsi_kategori'),
    //         'tanggal_dibuat' => $request->input('tanggal_dibuat'),
    //         'tanggal_diperbarui' => $request->input('tanggal_diperbarui'),
    //         'status' => '-',
    //     ]);

    //     return redirect()->route('halaman.kategoribuku')->with('success', 'Buku berhasil ditambahkan!');
    // }

    //     // Menampilkan form update kategori
    //     public function edit($id_kategori)
    //     {
    //         $kategori = KategoriBuku::findOrFail($id_kategori);
    //         return view('edit.editkategoribuku', compact('kategori'));
    //     }
    
    //     // Menyimpan perubahan kategori
    //     public function update(Request $request, $id_kategori)
    //     {
    //         $request->validate([
    //             'nama_kategori' => 'required|string|max:255',
    //             'deskripsi_kategori' => 'required|string',
    //             'tanggal_dibuat' => 'required|date',
    //             'tanggal_diperbarui' => 'nullable|date',
    //         ]);
    
    //         $kategori = KategoriBuku::findOrFail($id_kategori);
    //         $kategori->update([
    //             'nama_kategori' => $request->input('nama_kategori'),
    //             'deskripsi_kategori' => $request->input('deskripsi_kategori'),
    //             'tanggal_dibuat' => $request->input('tanggal_dibuat'),
    //             'tanggal_diperbarui' => $request->input('tanggal_diperbarui'),
    //         ]);
    
    //         return redirect()->route('halaman.kategoribuku')->with('success', 'Kategori buku berhasil diperbarui!');
    //     }

    public function detail($id)
    {
        $kategoriBuku = KategoriBuku::findOrFail($id); // Mengambil detail kategori buku berdasarkan id
        return view('halaman.detail_kategoribuku', compact('kategoriBuku')); // Mengirim data kategori buku ke view
    }
}