<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presupuesto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'codigo',
        'fecha',
        'titulo',
        'estado',
        'total',
        'cliente',
    ];

    // Relacion: un presupuesto pertenece a un cliente
    public function clienteRelacion()
    {
        return $this->belongsTo(Cliente::class, 'cliente', 'id'); 
    }
}
