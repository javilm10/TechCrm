<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasacion extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla en la base de datos
    protected $table = 'tasaciones';

    // Los atributos que son asignables en masa
    protected $fillable = [
        'cliente_nombre',
        'cliente_contacto',
        'direccion',
        'precio',
        'comentarios',
        'estado',
    ];

    // Relación con el modelo HistorialTasacion
    public function historialTasaciones()
    {
        return $this->hasMany(HistorialTasacion::class);
    }
}
