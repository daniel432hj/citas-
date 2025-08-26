<?php

// En app/Models/Tratamiento.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'costo',
    ];
}