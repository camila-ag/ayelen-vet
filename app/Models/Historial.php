<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historial';

    protected $fillable = [
        'motivo',
        'tratamiento',
        'fecha',
        'peso',
        'temperatura',
        'cc',
        'paciente_id',
        'user_id',
    ];

    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente','id','paciente_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','id','user_id');
    }
}
