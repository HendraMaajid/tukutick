<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyelenggara extends Model
{
    use HasFactory;
    protected $table = 'penyelenggara';
    protected $fillable = [
        'nama_penyelenggara',
        'email_penyelenggara',
        'alamat_kantor',
        'kontak',
        'lisensi',
        'username',
    ];
}
