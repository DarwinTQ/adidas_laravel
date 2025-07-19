@extends('layouts.app')

@section('title', 'Envíos - Adidas Logística')

@section('content')
<div class="page-title">
    <h2>Gestión de Envíos</h2>
    <p>Control y seguimiento de todos los envíos</p>
</div>

<div class="data-table">
    <div class="table-header">
        <h3><i class="fas fa-truck"></i> Lista de Envíos</h3>
    </div>
    
    <!-- Buscador por ID -->
    <div class="search-container">
        <form method="GET" action="{{ route('logistica.envios') }}" class="search-box" id="search-form">
            <div style="position: relative;">
                <i class="fas fa-search search-icon"></i>
                <input type="number" 
                       name="search" 
                       class="search-input" 
                       placeholder="Buscar por ID de Envío..." 
                       value="{{ request('search') }}"
                       min="1">
            </div>
        </form>
        <button type="submit" form="search-form" class="search-btn">
            <i class="fas fa-search"></i> Buscar
        </button>
        @if(request('search'))
            <a href="{{ route('logistica.envios') }}" class="clear-btn">
                <i class="fas fa-times"></i> Limpiar
            </a>
        @endif
    </div>
    
    @if($envios->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID Envío</th>
                    <th>Cliente</th>
                    <th>Repartidor</th>
                    <th>Fecha Despacho</th>
                    <th>Fecha Estimada</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($envios as $envio)
                <tr>
                    <td><strong>#{{ $envio->id_envio }}</strong></td>
                    <td>
                        @if($envio->pedido && $envio->pedido->cliente)
                            <div>
                                <strong>{{ $envio->pedido->cliente->nombre }}</strong><br>
                                <small style="color: #666666;">{{ $envio->pedido->cliente->email }}</small>
                            </div>
                        @else
                            <span style="color: #666666;">N/A</span>
                        @endif
                    </td>
                    <td>
                        @if($envio->repartidor)
                            <div>
                                <strong>{{ $envio->repartidor->nombre_completo }}</strong><br>
                                <small style="color: #666666;">{{ $envio->repartidor->vehiculo_placa }}</small>
                            </div>
                        @else
                            <span style="color: #666666;">Sin asignar</span>
                        @endif
                    </td>
                    <td>
                        @if($envio->fecha_despacho)
                            {{ \Carbon\Carbon::parse($envio->fecha_despacho)->format('d/m/Y H:i') }}
                        @else
                            <span style="color: #999;">Pendiente</span>
                        @endif
                    </td>
                    <td>
                        @if($envio->fecha_entrega_estimada)
                            {{ \Carbon\Carbon::parse($envio->fecha_entrega_estimada)->format('d/m/Y') }}
                        @else
                            <span style="color: #999;">Sin fecha</span>
                        @endif
                    </td>
                    <td>
                        @php
                            $statusClass = match($envio->estado_envio) {
                                'En almacen' => 'status-en-almacen',
                                'En camino' => 'status-en-camino',
                                'Entregado' => 'status-entregado',
                                default => 'status-pendiente'
                            };
                        @endphp
                        <span class="status-badge {{ $statusClass }}">
                            {{ $envio->estado_envio }}
                        </span>
                    </td>
                    <td>
                        @if($envio->estado_envio !== 'Entregado')
                            <select onchange="actualizarEstado('{{ $envio->id_envio }}', this.value)" 
                                    style="background: #333; color: white; border: 1px solid #555; padding: 0.3rem; border-radius: 5px;">
                                <option value="">Cambiar estado...</option>
                                @if($envio->estado_envio !== 'En camino')
                                    <option value="En camino">En camino</option>
                                @endif
                                @if($envio->estado_envio !== 'Entregado')
                                    <option value="Entregado">Entregado</option>
                                @endif
                            </select>
                        @else
                            <span style="color: #4caf50;">
                                <i class="fas fa-check-circle"></i> Completado
                            </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="padding: 3rem; text-align: center;">
            <i class="fas fa-truck" style="font-size: 4rem; color: #999999; margin-bottom: 1rem;"></i>
            <h3 style="color: #666666; margin-bottom: 0.5rem;">No hay envíos registrados</h3>
            <p style="color: #999999;">Los envíos aparecerán aquí cuando se creen pedidos.</p>
        </div>
    @endif
</div>

<!-- Resumen de estados -->
<div style="margin-top: 2rem;">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="color: #ff6b35;">
                <i class="fas fa-warehouse"></i>
            </div>
            <div class="stat-number">{{ $envios->where('estado_envio', 'En almacen')->count() }}</div>
            <div class="stat-label">En Almacén</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                Listos para despacho
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #f7931e;">
                <i class="fas fa-shipping-fast"></i>
            </div>
            <div class="stat-number">{{ $envios->where('estado_envio', 'En camino')->count() }}</div>
            <div class="stat-label">En Camino</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                En ruta de entrega
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #4caf50;">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-number">{{ $envios->where('estado_envio', 'Entregado')->count() }}</div>
            <div class="stat-label">Entregados</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #4caf50;">
                {{ $entregasHoy }} entregados hoy
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #2196f3;">
                <i class="fas fa-calendar-plus"></i>
            </div>
            <div class="stat-number">{{ $enviosHoy }}</div>
            <div class="stat-label">Despachados Hoy</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                Nuevos envíos del día
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #9c27b0;">
                <i class="fas fa-stopwatch"></i>
            </div>
            <div class="stat-number">{{ $tiempoPromedioEntrega }}</div>
            <div class="stat-label">Días Promedio</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                Tiempo de entrega
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #f44336;">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="stat-number">{{ $enviosRetrasados }}</div>
            <div class="stat-label">Envíos Retrasados</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #f44336;">
                Pasaron fecha estimada
            </div>
        </div>
    </div>
</div>

<script>
function actualizarEstado(envioId, nuevoEstado) {
    if (!nuevoEstado) return;
    
    if (confirm(`¿Confirmas cambiar el estado del envío #${envioId} a "${nuevoEstado}"?`)) {
        // Crear formulario temporal para enviar PUT request
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/logistica/envios/${envioId}/estado`;
        
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'PUT';
        
        const tokenInput = document.createElement('input');
        tokenInput.type = 'hidden';
        tokenInput.name = '_token';
        tokenInput.value = '{{ csrf_token() }}';
        
        const estadoInput = document.createElement('input');
        estadoInput.type = 'hidden';
        estadoInput.name = 'estado_envio';
        estadoInput.value = nuevoEstado;
        
        form.appendChild(methodInput);
        form.appendChild(tokenInput);
        form.appendChild(estadoInput);
        
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
@endsection
