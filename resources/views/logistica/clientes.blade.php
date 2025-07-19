@extends('layouts.app')

@section('title', 'Clientes - Adidas Logística')

@section('content')
<div class="page-title">
    <h2>Gestión de Clientes</h2>
    <p>Información de todos los clientes registrados</p>
</div>

<div class="data-table">
    <div class="table-header">
        <h3><i class="fas fa-users"></i> Lista de Clientes</h3>
    </div>
    
    @if($clientes->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Información Personal</th>
                    <th>Fecha Registro</th>
                    <th>Total Pedidos</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td><strong>#{{ $cliente->id_cliente }}</strong></td>
                    <td>
                        <div>
                            <strong style="color: #ffffff;">{{ $cliente->nombre }}</strong><br>
                            <small style="color: #999;">
                                <i class="fas fa-envelope"></i> {{ $cliente->email }}
                            </small><br>
                            @if($cliente->telefono)
                                <small style="color: #999;">
                                    <i class="fas fa-phone"></i> {{ $cliente->telefono }}
                                </small>
                            @endif
                        </div>
                    </td>
                    <td>
                        @if($cliente->fecha_registro)
                            {{ \Carbon\Carbon::parse($cliente->fecha_registro)->format('d/m/Y') }}
                        @else
                            <span style="color: #999;">N/A</span>
                        @endif
                    </td>
                    <td>
                        <div style="text-align: center;">
                            <span style="background: #4caf50; color: white; padding: 0.3rem 0.8rem; border-radius: 20px; font-weight: bold;">
                                {{ $cliente->pedidos->count() }}
                            </span>
                        </div>
                    </td>
                    <td>
                        @if($cliente->pedidos->count() > 0)
                            <span class="status-badge status-pagado">Activo</span>
                        @else
                            <span class="status-badge status-pendiente">Nuevo</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-small" onclick="verDetalle('{{ $cliente->id_cliente }}')">
                            <i class="fas fa-eye"></i> Ver Detalle
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="padding: 3rem; text-align: center;">
            <i class="fas fa-users" style="font-size: 4rem; color: #666; margin-bottom: 1rem;"></i>
            <h3 style="color: #999; margin-bottom: 0.5rem;">No hay clientes registrados</h3>
            <p style="color: #666;">Los clientes aparecerán aquí cuando se registren en el sistema.</p>
        </div>
    @endif
</div>

<!-- Modal para detalle del cliente -->
<div id="clienteModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 1000;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #f5f5f5; padding: 2rem; border-radius: 15px; max-width: 600px; width: 90%; max-height: 80%; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h3 style="color: #000000;">Detalle del Cliente</h3>
            <button onclick="cerrarModal()" style="background: none; border: none; color: #000000; font-size: 1.5rem; cursor: pointer;">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div id="clienteDetalle"></div>
    </div>
</div>

<!-- Estadísticas de clientes -->
<div style="margin-top: 2rem;">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="color: #4caf50;">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="stat-number">{{ $clientes->filter(function($c) { return $c->pedidos->count() > 0; })->count() }}</div>
            <div class="stat-label">Clientes Activos</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #ff9800;">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="stat-number">{{ $clientes->filter(function($c) { return $c->pedidos->count() === 0; })->count() }}</div>
            <div class="stat-label">Clientes Nuevos</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #2196f3;">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="stat-number">{{ $clientes->sum(function($cliente) { return $cliente->pedidos->count(); }) }}</div>
            <div class="stat-label">Total Pedidos</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #9c27b0;">
                <i class="fas fa-calendar"></i>
            </div>
            <div class="stat-number">{{ $clientes->where('fecha_registro', '>=', now()->subDays(30))->count() }}</div>
            <div class="stat-label">Registros (30 días)</div>
        </div>
    </div>
</div>

<script>
function verDetalle(clienteId) {
    // Mostrar información básica del cliente
    document.getElementById('clienteDetalle').innerHTML = `
        <div style="background: #e5e5e5; padding: 1.5rem; border-radius: 10px; margin-bottom: 1rem;">
            <h4 style="color: #000000; margin-bottom: 1rem;">Información del Cliente #${clienteId}</h4>
            <p style="color: #333333;">Para ver más detalles, consulte directamente en la base de datos.</p>
        </div>
    `;
    
    document.getElementById('clienteModal').style.display = 'block';
}

function cerrarModal() {
    document.getElementById('clienteModal').style.display = 'none';
}

// Cerrar modal al hacer clic fuera
document.getElementById('clienteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        cerrarModal();
    }
});
</script>
@endsection
