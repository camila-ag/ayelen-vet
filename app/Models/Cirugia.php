<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cirugia extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'tipo',
        'paciente',
        'especie',
        'propietario',
        'telefono'
    ];
}
