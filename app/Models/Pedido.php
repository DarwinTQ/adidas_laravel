<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'Pedidos';
    protected $primaryKey = 'id_pedido';
    public $timestamps = false;
    
    protected $fillable = [
        'id_cliente',
        'fecha_pedido',
        'direccion_envio',
        'ciudad_envio',
        'monto_total',
        'estado_pago'
    ];

    // Relación inversa: Un pedido pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relación: Un pedido tiene un envío
    public function envio()
    {
        return $this->hasOne(Envio::class, 'id_pedido');
    }

    // Relación N:M con Productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'Detalle_Pedidos', 'id_pedido', 'id_producto')
                    ->withPivot('cantidad', 'precio_unitario');
    }
}
