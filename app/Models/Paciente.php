<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'especie',
        'raza',
        'sexo',
        'peso',
        'nacimiento',
        'propietario_rut',
    ];

    //Relacion uno a muchos
    public function propietario()
    {
        return $this->belongsTo('App\Models\Propietario','rut','propietario_rut');
    }

    public function historial()
    {
        return $this->hasMany('App\Models\Historial', 'paciente_id', 'id');
    }

}
