<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
    
    protected $table = 'Envios';
    protected $primaryKey = 'id_envio';
    public $timestamps = false;
    
    protected $fillable = [
        'id_pedido',
        'id_repartidor',
        'fecha_despacho',
        'fecha_entrega_estimada',
        'fecha_entrega_real',
        'estado_envio'
    ];

    // Relación inversa: Un envío pertenece a un pedido
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }
    
    // Relación inversa: Un envío pertenece a un repartidor
    public function repartidor()
    {
        return $this->belongsTo(Repartidor::class, 'id_repartidor');
    }
}
