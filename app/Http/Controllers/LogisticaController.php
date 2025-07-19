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
        // Estadísticas básicas
        $totalClientes = Cliente::count();
        $totalPedidos = Pedido::count();
        $totalProductos = Producto::count();
        $enviosEnProceso = Envio::where('estado_envio', '!=', 'Entregado')->count();
        
        // Estadísticas avanzadas
        $ingresosHoy = Pedido::whereDate('fecha_pedido', now()->toDateString())
                           ->where('estado_pago', 'Pagado')
                           ->sum('monto_total');
        
        $ingresosMes = Pedido::whereMonth('fecha_pedido', now()->month)
                           ->whereYear('fecha_pedido', now()->year)
                           ->where('estado_pago', 'Pagado')
                           ->sum('monto_total');
        
        $pedidosHoy = Pedido::whereDate('fecha_pedido', now()->toDateString())->count();
        $pedidosMes = Pedido::whereMonth('fecha_pedido', now()->month)->count();
        
        $clientesNuevosHoy = Cliente::whereDate('fecha_registro', now()->toDateString())->count();
        $clientesNuevosMes = Cliente::whereMonth('fecha_registro', now()->month)->count();
        
        $entregasHoy = Envio::whereDate('fecha_entrega_real', now()->toDateString())->count();
        $entregasMes = Envio::whereMonth('fecha_entrega_real', now()->month)->count();
        
        $promedioEntrega = Envio::whereNotNull('fecha_entrega_real')
                               ->selectRaw('AVG(DATEDIFF(fecha_entrega_real, fecha_despacho)) as promedio')
                               ->first()->promedio ?? 0;
        
        $stockBajo = Producto::where('stock', '<=', 10)->where('stock', '>', 0)->count();
        $stockAgotado = Producto::where('stock', 0)->count();
        
        $repartidoresActivos = Repartidor::has('envios')->count();
        $repartidoresLibres = Repartidor::whereDoesntHave('envios', function($query) {
            $query->whereNotIn('estado_envio', ['Entregado']);
        })->count();
        
        return view('logistica.dashboard', compact(
            'totalClientes', 'totalPedidos', 'totalProductos', 'enviosEnProceso',
            'ingresosHoy', 'ingresosMes', 'pedidosHoy', 'pedidosMes',
            'clientesNuevosHoy', 'clientesNuevosMes', 'entregasHoy', 'entregasMes',
            'promedioEntrega', 'stockBajo', 'stockAgotado', 'repartidoresActivos', 'repartidoresLibres'
        ));
    }

    public function envios()
    {
        $envios = Envio::with(['pedido.cliente', 'repartidor'])
                      ->orderBy('fecha_despacho', 'desc')
                      ->get();
        
        // Estadísticas adicionales para envíos
        $enviosHoy = Envio::whereDate('fecha_despacho', now()->toDateString())->count();
        $entregasHoy = Envio::whereDate('fecha_entrega_real', now()->toDateString())->count();
        $promedioEntregaDias = Envio::whereNotNull('fecha_entrega_real')
                                  ->selectRaw('AVG(DATEDIFF(fecha_entrega_real, fecha_despacho)) as promedio')
                                  ->first()->promedio ?? 0;
        $enviosRetrasados = Envio::where('estado_envio', '!=', 'Entregado')
                               ->where('fecha_entrega_estimada', '<', now()->toDateString())
                               ->count();
        
        $tiempoPromedioEntrega = round($promedioEntregaDias, 1);
        
        return view('logistica.envios', compact(
            'envios', 'enviosHoy', 'entregasHoy', 'tiempoPromedioEntrega', 'enviosRetrasados'
        ));
    }

    public function pedidos()
    {
        $pedidos = Pedido::with(['cliente', 'envio', 'productos'])
                         ->orderBy('fecha_pedido', 'desc')
                         ->get();
        
        // Estadísticas adicionales para pedidos
        $pedidosHoy = Pedido::whereDate('fecha_pedido', now()->toDateString())->count();
        $ingresosTotales = Pedido::where('estado_pago', 'Pagado')->sum('monto_total');
        $ingresosPendientes = Pedido::where('estado_pago', 'Pendiente')->sum('monto_total');
        $ticketPromedio = Pedido::avg('monto_total');
        $pedidosMasAltos = Pedido::orderBy('monto_total', 'desc')->take(5)->get();
        $ciudadMasPedidos = Pedido::selectRaw('ciudad_envio, COUNT(*) as total')
                                ->groupBy('ciudad_envio')
                                ->orderBy('total', 'desc')
                                ->first();
        
        return view('logistica.pedidos', compact(
            'pedidos', 'pedidosHoy', 'ingresosTotales', 'ingresosPendientes', 
            'ticketPromedio', 'pedidosMasAltos', 'ciudadMasPedidos'
        ));
    }

    public function clientes()
    {
        $clientes = Cliente::with('pedidos')->get();
        
        return view('logistica.clientes', compact('clientes'));
    }

    public function productos()
    {
        $productos = Producto::all();
        
        // Estadísticas adicionales para productos
        $valorTotalInventario = Producto::selectRaw('SUM(precio * stock) as total')->first()->total ?? 0;
        $productoMasVendido = Producto::withCount('pedidos')->orderBy('pedidos_count', 'desc')->first();
        $productoMasCaro = Producto::orderBy('precio', 'desc')->first();
        $productoMasBarato = Producto::orderBy('precio', 'asc')->first();
        $stockTotalUnidades = Producto::sum('stock');
        $categorias = Producto::select('descripcion')
                             ->groupBy('descripcion')
                             ->get()
                             ->count();
        $ingresosPorProducto = Producto::with('pedidos')->get()->map(function($producto) {
            return [
                'nombre' => $producto->nombre_producto,
                'ingresos' => $producto->pedidos->sum(function($pedido) {
                    return $pedido->pivot->cantidad * $pedido->pivot->precio_unitario;
                })
            ];
        })->sortByDesc('ingresos');
        
        return view('logistica.productos', compact(
            'productos', 'valorTotalInventario', 'productoMasVendido', 'productoMasCaro',
            'productoMasBarato', 'stockTotalUnidades', 'categorias', 'ingresosPorProducto'
        ));
    }

    public function repartidores()
    {
        $repartidores = Repartidor::with('envios')->get();
        
        // Estadísticas adicionales para repartidores
        $repartidorDelMes = Repartidor::withCount(['envios' => function($query) {
            $query->whereMonth('fecha_despacho', now()->month)
                  ->where('estado_envio', 'Entregado');
        }])->orderBy('envios_count', 'desc')->first();
        
        $tiempoPromedioEntrega = Envio::whereNotNull('fecha_entrega_real')
                                    ->whereNotNull('fecha_despacho')
                                    ->selectRaw('AVG(DATEDIFF(fecha_entrega_real, fecha_despacho)) as promedio')
                                    ->first()->promedio ?? 0;
        
        $entregasDelDia = Envio::whereDate('fecha_entrega_real', now()->toDateString())->count();
        
        $repartidorMasRapido = Repartidor::with(['envios' => function($query) {
            $query->whereNotNull('fecha_entrega_real')
                  ->whereNotNull('fecha_despacho');
        }])->get()->filter(function($repartidor) {
            return $repartidor->envios->count() > 0;
        })->map(function($repartidor) {
            $tiempoPromedio = $repartidor->envios->avg(function($envio) {
                return \Carbon\Carbon::parse($envio->fecha_entrega_real)
                     ->diffInDays(\Carbon\Carbon::parse($envio->fecha_despacho));
            });
            $repartidor->setAttribute('tiempo_promedio', $tiempoPromedio);
            return $repartidor;
        })->sortBy('tiempo_promedio')->first();
        
        $eficienciaEntregas = Envio::where('estado_envio', 'Entregado')->count() / 
                             (Envio::count() ?: 1) * 100;
        
        return view('logistica.repartidores', compact(
            'repartidores', 'repartidorDelMes', 'tiempoPromedioEntrega', 'entregasDelDia',
            'repartidorMasRapido', 'eficienciaEntregas'
        ));
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
