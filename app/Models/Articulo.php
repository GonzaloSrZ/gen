<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
     //protected para guardar en base de datos
     protected $fillable = ['nombre','precio','tipo','stock'];
}
