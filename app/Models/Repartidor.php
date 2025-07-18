<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repartidor extends Model
{
    use HasFactory;
    
    protected $table = 'Repartidores';
    protected $primaryKey = 'id_repartidor';
    public $timestamps = false;
    
    protected $fillable = [
        'nombre_completo',
        'telefono',
        'vehiculo_placa'
    ];

    // Relación: Un repartidor puede tener muchos envíos
    public function envios()
    {
        return $this->hasMany(Envio::class, 'id_repartidor');
    }
}
