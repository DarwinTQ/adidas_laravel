<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Envio;
use App\Models\Repartidor;
use App\Models\DetallePedido;

class LogisticaController extends Controller
{
    public function dashboard()
    {
        $totalClientes = Cliente::count();
        $totalPedidos = Pedido::count();
        $totalProductos = Producto::count();
        $enviosEnProceso = Envio::where('estado_envio', '!=', 'Entregado')->count();
        
        return view('logistica.dashboard', compact(
            'totalClientes', 
            'totalPedidos', 
            'totalProductos', 
            'enviosEnProceso'
        ));
    }

    public function envios()
    {
        $envios = Envio::with(['pedido.cliente', 'repartidor'])
                      ->orderBy('fecha_despacho', 'desc')
                      ->get();
        
        return view('logistica.envios', compact('envios'));
    }

    public function pedidos()
    {
        $pedidos = Pedido::with(['cliente', 'envio', 'productos'])
                         ->orderBy('fecha_pedido', 'desc')
                         ->get();
        
        return view('logistica.pedidos', compact('pedidos'));
    }

    public function clientes()
    {
        $clientes = Cliente::with('pedidos')->get();
        
        return view('logistica.clientes', compact('clientes'));
    }

    public function productos()
    {
        $productos = Producto::all();
        
        return view('logistica.productos', compact('productos'));
    }

    public function repartidores()
    {
        $repartidores = Repartidor::with('envios')->get();
        
        return view('logistica.repartidores', compact('repartidores'));
    }

    public function actualizarEstadoEnvio(Request $request, $id)
    {
        $envio = Envio::findOrFail($id);
        $envio->estado_envio = $request->estado_envio;
        
        if ($request->estado_envio === 'Entregado') {
            $envio->fecha_entrega_real = now();
        }
        
        $envio->save();
        
        return redirect()->back()->with('success', 'Estado de envío actualizado correctamente');
    }
}
