@extends('layouts.app')

@section('title', 'Pedidos - Adidas Logística')

@section('content')
<div class="page-title">
    <h2>Gestión de Pedidos</h2>
    <p>Control de todos los pedidos del sistema</p>
</div>

<div class="data-table">
    <div class="table-header">
        <h3><i class="fas fa-shopping-cart"></i> Lista de Pedidos</h3>
    </div>
    
    @if($pedidos->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Cliente</th>
                    <th>Fecha Pedido</th>
                    <th>Dirección</th>
                    <th>Monto Total</th>
                    <th>Estado Pago</th>
                    <th>Estado Envío</th>
                    <th>Productos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <td><strong>#{{ $pedido->id_pedido }}</strong></td>
                    <td>
                        @if($pedido->cliente)
                            <div>
                                <strong>{{ $pedido->cliente->nombre }}</strong><br>
                                <small style="color: #999;">{{ $pedido->cliente->email }}</small><br>
                                <small style="color: #999;">{{ $pedido->cliente->telefono }}</small>
                            </div>
                        @else
                            <span style="color: #999;">Cliente no encontrado</span>
                        @endif
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d/m/Y H:i') }}
                    </td>
                    <td>
                        <div>
                            <strong>{{ $pedido->direccion_envio }}</strong><br>
                            <small style="color: #999;">{{ $pedido->ciudad_envio }}</small>
                        </div>
                    </td>
                    <td>
                        <strong style="color: #4caf50;">S/. {{ number_format($pedido->monto_total, 2) }}</strong>
                    </td>
                    <td>
                        @php
                            $pagoClass = $pedido->estado_pago === 'Pagado' ? 'status-pagado' : 'status-pendiente';
                        @endphp
                        <span class="status-badge {{ $pagoClass }}">
                            {{ $pedido->estado_pago }}
                        </span>
                    </td>
                    <td>
                        @if($pedido->envio)
                            @php
                                $statusClass = match($pedido->envio->estado_envio) {
                                    'En almacen' => 'status-en-almacen',
                                    'En camino' => 'status-en-camino',
                                    'Entregado' => 'status-entregado',
                                    default => 'status-pendiente'
                                };
                            @endphp
                            <span class="status-badge {{ $statusClass }}">
                                {{ $pedido->envio->estado_envio }}
                            </span>
                        @else
                            <span class="status-badge status-pendiente">Sin envío</span>
                        @endif
                    </td>
                    <td>
                        @if($pedido->productos->count() > 0)
                            <div style="max-width: 200px;">
                                @foreach($pedido->productos as $producto)
                                    <div style="background: #333; padding: 0.3rem; margin: 0.2rem 0; border-radius: 5px; font-size: 0.9rem;">
                                        <strong>{{ $producto->nombre_producto }}</strong><br>
                                        <small>Cant: {{ $producto->pivot->cantidad }} | 
                                              Precio: S/. {{ number_format($producto->pivot->precio_unitario, 2) }}</small>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <span style="color: #999;">Sin productos</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="padding: 3rem; text-align: center;">
            <i class="fas fa-shopping-cart" style="font-size: 4rem; color: #666; margin-bottom: 1rem;"></i>
            <h3 style="color: #999; margin-bottom: 0.5rem;">No hay pedidos registrados</h3>
            <p style="color: #666;">Los pedidos aparecerán aquí cuando los clientes realicen compras.</p>
        </div>
    @endif
</div>

<!-- Resumen de estados -->
<div style="margin-top: 2rem;">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="color: #ff9800;">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-number">{{ $pedidos->where('estado_pago', 'Pendiente')->count() }}</div>
            <div class="stat-label">Pagos Pendientes</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #ff9800;">
                S/. {{ number_format($ingresosPendientes, 2) }} por cobrar
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #4caf50;">
                <i class="fas fa-credit-card"></i>
            </div>
            <div class="stat-number">{{ $pedidos->where('estado_pago', 'Pagado')->count() }}</div>
            <div class="stat-label">Pagos Completados</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #4caf50;">
                S/. {{ number_format($ingresosTotales, 2) }} confirmados
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #2196f3;">
                <i class="fas fa-calendar-day"></i>
            </div>
            <div class="stat-number">{{ $pedidosHoy }}</div>
            <div class="stat-label">Pedidos Hoy</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                Nuevos pedidos del día
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #9c27b0;">
                <i class="fas fa-calculator"></i>
            </div>
            <div class="stat-number">S/. {{ number_format($ticketPromedio, 2) }}</div>
            <div class="stat-label">Ticket Promedio</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                Valor medio por pedido
            </div>
        </div>

        @if($ciudadMasPedidos)
        <div class="stat-card">
            <div class="stat-icon" style="color: #00bcd4;">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="stat-number">{{ $ciudadMasPedidos->total }}</div>
            <div class="stat-label">{{ $ciudadMasPedidos->ciudad_envio }}</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                Ciudad con más pedidos
            </div>
        </div>
        @endif

        <div class="stat-card">
            <div class="stat-icon" style="color: #ff5722;">
                <i class="fas fa-trophy"></i>
            </div>
            <div class="stat-number">S/. {{ $pedidosMasAltos->first() ? number_format($pedidosMasAltos->first()->monto_total, 2) : '0.00' }}</div>
            <div class="stat-label">Pedido Más Alto</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                Valor máximo registrado
            </div>
        </div>
    </div>
</div>

<!-- Top 5 Pedidos Más Altos -->
@if($pedidosMasAltos->count() > 0)
<div class="data-table" style="margin-top: 2rem;">
    <div class="table-header">
        <h3><i class="fas fa-medal"></i> Top 5 Pedidos de Mayor Valor</h3>
    </div>
    <div style="padding: 1rem;">
        @foreach($pedidosMasAltos as $index => $pedido)
        <div style="background: #2a2a2a; padding: 1rem; margin: 0.5rem 0; border-radius: 8px; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 30px; height: 30px; border-radius: 50%; background: #FFD700; display: flex; align-items: center; justify-content: center; font-weight: bold; color: black;">
                    {{ $index + 1 }}
                </div>
                <div>
                    <strong>Pedido #{{ $pedido->id_pedido }}</strong><br>
                    <small style="color: #999;">
                        {{ $pedido->cliente ? $pedido->cliente->nombre : 'Cliente no encontrado' }} | 
                        {{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d/m/Y') }}
                    </small>
                </div>
            </div>
            <div style="text-align: right;">
                <strong style="color: #4caf50; font-size: 1.2rem;">S/. {{ number_format($pedido->monto_total, 2) }}</strong><br>
                <span class="status-badge {{ $pedido->estado_pago === 'Pagado' ? 'status-pagado' : 'status-pendiente' }}">
                    {{ $pedido->estado_pago }}
                </span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection
