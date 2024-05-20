<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
     protected $primaryKey = 'id_event'; // Menentukan primary key
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
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function penyelenggara()
    {
        return $this->belongsTo(Penyelenggara::class, 'id_penyelenggara', 'id_penyelenggara');
    }

}
