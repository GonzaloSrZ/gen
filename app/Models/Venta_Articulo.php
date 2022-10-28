<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta_Articulo extends Model
{
    use HasFactory;

    //protected para guardar en base de datos
    protected $fillable = ['cantidad','precio','id_venta','id_articulo'];
}
