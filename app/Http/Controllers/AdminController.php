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

    public function store(Request $request)
    {
        // Tambahkan logika untuk menyimpan data admin
    }
}