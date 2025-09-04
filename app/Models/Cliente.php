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

    // Relación: un usuario pertenece a una provincia
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
}

