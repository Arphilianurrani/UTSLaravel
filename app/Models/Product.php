<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //mendefinisikan tabel products di database
    protected $table = 'products';

    //mempersilahkan user untuk menginput langsung ke database
    protected $fillable = ['name', 'price', 'type', 'expired_at'];
}
