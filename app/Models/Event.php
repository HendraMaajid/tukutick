<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $fillable = [
        'nama_event',
        'deskripsi_event',
        'gambar',
        'jam_event', 
        'tgl_event',
        'lokasi',
        'jml_ticket',
        'hrg_ticket',
        'status',
        'id_kategori',
        'id_penyelenggara'
    ];  
    
}
