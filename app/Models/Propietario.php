<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    protected $fillable = [
        'rut',
        'nombre',
        'telefono',
        'direccion',
    ];

    public function pacientes()
    {
        return $this->hasMany('App\Models\Paciente', 'propietario_rut', 'rut');
    }
}
