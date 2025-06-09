<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi'; // Menentukan primary key
    protected $fillable = [
        'jml_transaksi',
        'id_pemenang',
        'snap_token'
    ];

    public function pemenang()
    {
        return $this->hasOne(Pemenang::class, 'id_pemenang', 'id_pemenang');
    }    
    
}
