<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EstadosPresupuesto extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
    ];

    // Relacion: un estado puede estar asignado a muchos presupuestos
    public function presupuestosRelaciones()
    {
        return $this->hasMany(Presupuesto::class, 'estado', 'id');
    }
}
