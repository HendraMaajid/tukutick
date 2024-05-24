<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemenang extends Model
{
    use HasFactory;
    protected $table = 'pemenang';
    protected $primaryKey = 'id_pemenang'; // Menentukan primary key
    protected $fillable = [
        'status_transaksi',
        'id_transaksi',
        'id_customer',
        'id_event',
    ];
}
