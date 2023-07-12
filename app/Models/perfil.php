<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perfil extends Model
{
    use HasFactory;
    protected $fillable = [
        'imagen',
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'nacimiento',
        'pais',
        'estado',
        'ciudad',
        'direccion',
        'descripcion',
    ];
}
