<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    //protected algo que tiene que ver con configurar los factories y seeders
    protected $fillable = ['dni','nombre','apellido','domicilio','localidad','provincia','telefono_1','telefono_2'];
}