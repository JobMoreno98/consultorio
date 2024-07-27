<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'domicilio', 'telefono', 'fecha_nacimiento', 'comentarios'];
}
