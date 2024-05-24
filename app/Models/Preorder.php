<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
    use HasFactory;
    protected $table = 'preorder';
    protected $primaryKey = 'id_preorder'; // Menentukan primary key
    protected $fillable = [
        'id_customer',
        'id_event',
    ];
}
