<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    protected $primaryKey = 'id_penyelenggara';


    //satu penyelenggara bisa memiliki lebih dari satu event
    function event() : HasMany {
        return $this->hasMany(Event::class, 'id_penyelenggara');
    }
}
