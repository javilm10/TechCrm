<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialTasacion extends Model
{
    use HasFactory;

    protected $table = 'historial_tasaciones';

    protected $fillable = [
        'tasacion_id',
        'estado',
        'user_id',
    ];

    public function tasacion()
    {
        return $this->belongsTo(Tasacion::class);
    }
}
