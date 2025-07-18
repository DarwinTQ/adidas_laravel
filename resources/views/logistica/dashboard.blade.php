@extends('layouts.app')

@section('title', 'Dashboard - Adidas Logística')

@section('content')
<div class="page-title">
    <h2>Dashboard Logístico</h2>
    <p>Panel de control principal del sistema Adidas</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-number">{{ $totalClientes }}</div>
        <div class="stat-label">Clientes Registrados</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="stat-number">{{ $totalPedidos }}</div>
        <div class="stat-label">Pedidos Totales</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-box"></i>
        </div>
        <div class="stat-number">{{ $totalProductos }}</div>
        <div class="stat-label">Productos Disponibles</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-truck"></i>
        </div>
        <div class="stat-number">{{ $enviosEnProceso }}</div>
        <div class="stat-label">Envíos en Proceso</div>
    </div>
</div>

<div class="data-table">
    <div class="table-header">
        <h3><i class="fas fa-chart-line"></i> Resumen del Sistema</h3>
    </div>
    <div style="padding: 2rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <div style="background: #2a2a2a; padding: 1.5rem; border-radius: 10px;">
                <h4 style="color: #ffffff; margin-bottom: 1rem;">
                    <i class="fas fa-shipping-fast"></i> Estado de Envíos
                </h4>
                <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    <div style="display: flex; justify-content: space-between;">
                        <span>En Almacén:</span>
                        <span class="status-badge status-en-almacen">
                            {{ App\Models\Envio::where('estado_envio', 'En almacen')->count() }}
                        </span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>En Camino:</span>
                        <span class="status-badge status-en-camino">
                            {{ App\Models\Envio::where('estado_envio', 'En camino')->count() }}
                        </span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>Entregados:</span>
                        <span class="status-badge status-entregado">
                            {{ App\Models\Envio::where('estado_envio', 'Entregado')->count() }}
                        </span>
                    </div>
                </div>
            </div>

            <div style="background: #2a2a2a; padding: 1.5rem; border-radius: 10px;">
                <h4 style="color: #ffffff; margin-bottom: 1rem;">
                    <i class="fas fa-credit-card"></i> Estado de Pagos
                </h4>
                <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    <div style="display: flex; justify-content: space-between;">
                        <span>Pendientes:</span>
                        <span class="status-badge status-pendiente">
                            {{ App\Models\Pedido::where('estado_pago', 'Pendiente')->count() }}
                        </span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>Pagados:</span>
                        <span class="status-badge status-pagado">
                            {{ App\Models\Pedido::where('estado_pago', 'Pagado')->count() }}
                        </span>
                    </div>
                </div>
            </div>

            <div style="background: #2a2a2a; padding: 1.5rem; border-radius: 10px;">
                <h4 style="color: #ffffff; margin-bottom: 1rem;">
                    <i class="fas fa-motorcycle"></i> Repartidores
                </h4>
                <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    <div style="display: flex; justify-content: space-between;">
                        <span>Total Activos:</span>
                        <span style="color: #4caf50; font-weight: bold;">
                            {{ App\Models\Repartidor::count() }}
                        </span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>Con Envíos:</span>
                        <span style="color: #f7931e; font-weight: bold;">
                            {{ App\Models\Repartidor::has('envios')->count() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 2rem; text-align: center;">
            <a href="{{ route('logistica.envios') }}" class="btn" style="margin: 0.5rem;">
                <i class="fas fa-truck"></i> Ver Todos los Envíos
            </a>
            <a href="{{ route('logistica.pedidos') }}" class="btn" style="margin: 0.5rem;">
                <i class="fas fa-shopping-cart"></i> Ver Todos los Pedidos
            </a>
            <a href="{{ route('logistica.clientes') }}" class="btn" style="margin: 0.5rem;">
                <i class="fas fa-users"></i> Gestionar Clientes
            </a>
        </div>
    </div>
</div>
@endsection
