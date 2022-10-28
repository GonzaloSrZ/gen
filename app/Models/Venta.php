<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

     //protected para guardar en base de datos
     protected $fillable = ['precioTotal','modoPedido','formaPago','estado','id_cliente','id_user'];
}