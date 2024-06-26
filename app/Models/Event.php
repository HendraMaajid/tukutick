<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $primaryKey = 'id_event'; // Menentukan primary key

    protected $dates = [
        'created_at',
        'updated_at',
        'tgl_event', // Ganti dengan nama kolom tanggal di database Anda
        'jam_event'
    ];

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


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($event) {
            // Hapus preorder terkait
            $event->preorder()->delete();

            // Hapus pemenang terkait
            $event->pemenang()->delete();
        });
    }
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function penyelenggara()
    {
        return $this->belongsTo(Penyelenggara::class, 'id_penyelenggara', 'id_penyelenggara');
    }

    public function pemenang()
    {
        return $this->hasMany(Pemenang::class, 'id_event', 'id_event');
    }

    public function preorder(){
        return $this->hasMany(Preorder::class, 'id_event', 'id_event');
    }

}
