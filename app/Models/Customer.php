<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $primaryKey = 'id_customer'; // Menentukan primary key
    protected $fillable = [
        'nama_customer',
        'email_customer',
        'tgl_lahir',
        'no_hp_customer',
        'alamat_customer',
        'username'
    ];

    public function pemenang()
    {
        return $this->hasMany(Pemenang::class, 'id_customer');
    }
}
