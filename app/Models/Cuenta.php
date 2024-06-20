<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $table = "cuenta";

    protected $fillable = [
		'nombre',
		'correo',
		'pwd',
		'llave'
    ];

}
