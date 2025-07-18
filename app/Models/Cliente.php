<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'Clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;
    
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'fecha_registro'
    ];

    // Relación: Un cliente tiene muchos pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_cliente');
    }
}
