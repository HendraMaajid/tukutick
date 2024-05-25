<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Preorder extends Model
{
    use HasFactory;
    protected $table = 'preorder';
    protected $primaryKey = 'id_preorder'; // Menentukan primary key
    protected $fillable = [
        'id_customer',
        'id_event',
    ];

    //relasi ke model customer, satu id_preorder hanya dimiliki oleh satu customer
    function customer() : BelongsTo {
        return $this->belongsTo(Customer::class, 'id_customer');
    }


    //relasi ke model event, satu id_preorder hanya memiliki satu event
    function event() : BelongsTo {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
