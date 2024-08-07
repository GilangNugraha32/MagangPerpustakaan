<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Member extends Authenticatable
{
    use HasRoles;

    protected $table = 'members'; // Nama tabel di database

    protected $fillable = [
        'nama',
        'no_telepon',
        'email',
        'password',
    ];

    public $timestamps = true; // Jika model menggunakan timestamps

    protected $hidden = [
        'password', // Menyembunyikan password
    ];

    // Mengambil password untuk otentikasi
    public function getAuthPassword()
    {
        return $this->password;
    }
}