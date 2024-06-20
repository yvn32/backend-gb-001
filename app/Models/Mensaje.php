<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $table = 'mensaje';

    protected $fillable = [
        'origen',
        'destino',
        'mensaje',
        'llave'
    ];

    public function origenUsuario()
    {
        return $this->belongsTo(Cuenta::class, 'origen');
    }

    public function destinoUsuario()
    {
        return $this->belongsTo(Cuenta::class, 'destino');
    }
    
}
