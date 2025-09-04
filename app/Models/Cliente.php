<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'dni',
        'nombre',
        'apellidos',
        'telefono',
        'email',
        'provincia',
    ];

    // Relacion: un usuario pertenece a una provincia
    public function provinciaRelacion()
    {
        return $this->belongsTo(Provincia::class, 'provincia');
    }

    //Relacin: un cliente puede tener muchos presupuestos
    public function presupuestos()
    {
        return $this->hasMany(Presupuesto::class, 'cliente', 'id');
    }
}

