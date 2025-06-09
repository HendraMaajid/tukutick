<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemenang extends Model
{
    use HasFactory;
    protected $table = 'pemenang';
    protected $primaryKey = 'id_pemenang'; // Menentukan primary key
    protected $fillable = [
        'status_transaksi',
        'id_customer',
        'id_event',
        'id_transaksi'
    ];

    //relasi ke model customer, satu id_pemenang hanya dimiliki oleh satu customer
    function customer() : BelongsTo {
        return $this->belongsTo(Customer::class, 'id_customer');
    }


    //relasi ke model event, satu id_pemenang hanya memiliki oleh satu event
    function event() : BelongsTo {
        return $this->belongsTo(Event::class, 'id_event');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_pemenang', 'id_pemenang');
    }
}
