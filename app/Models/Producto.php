<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    protected $table = 'Productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;
    
    protected $fillable = [
        'nombre_producto',
        'descripcion',
        'precio',
        'stock'
    ];

    // Relación N:M con Pedidos
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'Detalle_Pedidos', 'id_producto', 'id_pedido')
                    ->withPivot('cantidad', 'precio_unitario');
    }
}
