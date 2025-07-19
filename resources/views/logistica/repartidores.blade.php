@extends('layouts.app')

@section('title', 'Repartidores - Adidas Logística')

@section('content')
<div class="page-title">
    <h2>Gestión de Repartidores</h2>
    <p>Control del equipo de delivery</p>
</div>

<div class="data-table">
    <div class="table-header">
        <h3><i class="fas fa-motorcycle"></i> Lista de Repartidores</h3>
    </div>
    
    @if($repartidores->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Información Personal</th>
                    <th>Vehículo</th>
                    <th>Envíos Totales</th>
                    <th>Envíos Activos</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($repartidores as $repartidor)
                <tr>
                    <td><strong>#{{ $repartidor->id_repartidor }}</strong></td>
                    <td>
                        <div>
                            <strong style="color: #ffffff;">{{ $repartidor->nombre_completo }}</strong><br>
                            @if($repartidor->telefono)
                                <small style="color: #999;">
                                    <i class="fas fa-phone"></i> {{ $repartidor->telefono }}
                                </small>
                            @endif
                        </div>
                    </td>
                    <td>
                        @if($repartidor->vehiculo_placa)
                            <div style="background: #333; padding: 0.5rem; border-radius: 5px; text-align: center;">
                                <i class="fas fa-motorcycle" style="color: #ff9800;"></i><br>
                                <strong>{{ $repartidor->vehiculo_placa }}</strong>
                            </div>
                        @else
                            <span style="color: #999;">Sin vehículo</span>
                        @endif
                    </td>
                    <td>
                        <div style="text-align: center;">
                            <span style="background: #2196f3; color: white; padding: 0.3rem 0.8rem; border-radius: 20px; font-weight: bold;">
                                {{ $repartidor->envios->count() }}
                            </span>
                        </div>
                    </td>
                    <td>
                        <div style="text-align: center;">
                            @php
                                $enviosActivos = $repartidor->envios->whereNotIn('estado_envio', ['Entregado'])->count();
                            @endphp
                            @if($enviosActivos > 0)
                                <span style="background: #ff9800; color: white; padding: 0.3rem 0.8rem; border-radius: 20px; font-weight: bold;">
                                    {{ $enviosActivos }}
                                </span>
                            @else
                                <span style="background: #4caf50; color: white; padding: 0.3rem 0.8rem; border-radius: 20px; font-weight: bold;">
                                    {{ $enviosActivos }}
                                </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        @php
                            $enviosActivos = $repartidor->envios->whereNotIn('estado_envio', ['Entregado'])->count();
                        @endphp
                        @if($enviosActivos > 0)
                            <span class="status-badge status-en-camino">Ocupado</span>
                        @else
                            <span class="status-badge status-entregado">Disponible</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="padding: 3rem; text-align: center;">
            <i class="fas fa-motorcycle" style="font-size: 4rem; color: #666; margin-bottom: 1rem;"></i>
            <h3 style="color: #999; margin-bottom: 0.5rem;">No hay repartidores registrados</h3>
            <p style="color: #666;">Los repartidores aparecerán aquí cuando se registren en el sistema.</p>
        </div>
    @endif
</div>

<!-- Estadísticas de repartidores -->
<div style="margin-top: 2rem;">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="color: #4caf50;">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="stat-number">
                {{ $repartidores->filter(function($r) { 
                    return $r->envios->whereNotIn('estado_envio', ['Entregado'])->count() === 0; 
                })->count() }}
            </div>
            <div class="stat-label">Disponibles</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #4caf50;">
                Listos para nuevos envíos
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #ff9800;">
                <i class="fas fa-shipping-fast"></i>
            </div>
            <div class="stat-number">
                {{ $repartidores->filter(function($r) { 
                    return $r->envios->whereNotIn('estado_envio', ['Entregado'])->count() > 0; 
                })->count() }}
            </div>
            <div class="stat-label">En Servicio</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #ff9800;">
                Con entregas pendientes
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #2196f3;">
                <i class="fas fa-calendar-day"></i>
            </div>
            <div class="stat-number">{{ $entregasDelDia }}</div>
            <div class="stat-label">Entregas Hoy</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                Completadas este día
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #9c27b0;">
                <i class="fas fa-stopwatch"></i>
            </div>
            <div class="stat-number">{{ number_format($tiempoPromedioEntrega, 1) }}</div>
            <div class="stat-label">Días Promedio</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                Tiempo de entrega
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #795548;">
                <i class="fas fa-percentage"></i>
            </div>
            <div class="stat-number">{{ number_format($eficienciaEntregas, 1) }}%</div>
            <div class="stat-label">Eficiencia Entregas</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                Tasa de éxito
            </div>
        </div>

        @if($repartidorDelMes)
        <div class="stat-card">
            <div class="stat-icon" style="color: #ff5722;">
                <i class="fas fa-crown"></i>
            </div>
            <div class="stat-number">{{ $repartidorDelMes->envios_count }}</div>
            <div class="stat-label">Repartidor del Mes</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                {{ Str::limit($repartidorDelMes->nombre_completo, 20) }}
            </div>
        </div>
        @endif

        @if($repartidorMasRapido)
        <div class="stat-card">
            <div class="stat-icon" style="color: #00bcd4;">
                <i class="fas fa-rocket"></i>
            </div>
            <div class="stat-number">{{ number_format($repartidorMasRapido->tiempo_promedio, 1) }}</div>
            <div class="stat-label">Más Rápido</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                {{ Str::limit($repartidorMasRapido->nombre_completo, 15) }}
            </div>
        </div>
        @endif

        <div class="stat-card">
            <div class="stat-icon" style="color: #607d8b;">
                <i class="fas fa-truck"></i>
            </div>
            <div class="stat-number">{{ $repartidores->sum(function($r) { return $r->envios->count(); }) }}</div>
            <div class="stat-label">Entregas Totales</div>
            <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cccccc;">
                Historial completo
            </div>
        </div>
    </div>
</div>

<!-- Estadísticas adicionales por repartidor -->
<div class="data-table" style="margin-top: 2rem;">
    <div class="table-header">
        <h3><i class="fas fa-chart-bar"></i> Estadísticas Detalladas por Repartidor</h3>
    </div>
    <div style="padding: 1rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 1rem;">
            @foreach($repartidores as $repartidor)
            @php
                $entregasCompletadas = $repartidor->envios->where('estado_envio', 'Entregado')->count();
                $entregasPendientes = $repartidor->envios->whereNotIn('estado_envio', ['Entregado'])->count();
                $eficienciaPersonal = $repartidor->envios->count() > 0 ? 
                    ($entregasCompletadas / $repartidor->envios->count()) * 100 : 0;
                $tiempoPromedioPersonal = $repartidor->envios
                    ->whereNotNull('fecha_entrega_real')
                    ->whereNotNull('fecha_despacho')
                    ->avg(function($envio) {
                        return \Carbon\Carbon::parse($envio->fecha_entrega_real)
                             ->diffInDays(\Carbon\Carbon::parse($envio->fecha_despacho));
                    });
            @endphp
            
            <div style="background: #2a2a2a; padding: 1.5rem; border-radius: 10px;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: #4caf50; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-user" style="color: white; font-size: 1.2rem;"></i>
                    </div>
                    <div>
                        <h4 style="color: #ffffff;">{{ $repartidor->nombre_completo }}</h4>
                        @if($repartidor->vehiculo_placa)
                            <small style="color: #ff9800;">
                                <i class="fas fa-motorcycle"></i> {{ $repartidor->vehiculo_placa }}
                            </small>
                        @endif
                    </div>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div style="text-align: center; background: #333; padding: 0.8rem; border-radius: 8px;">
                        <div style="font-size: 1.5rem; color: #4caf50; font-weight: bold;">{{ $entregasCompletadas }}</div>
                        <div style="font-size: 0.9rem; color: #cccccc;">Completadas</div>
                    </div>
                    <div style="text-align: center; background: #333; padding: 0.8rem; border-radius: 8px;">
                        <div style="font-size: 1.5rem; color: #ff9800; font-weight: bold;">{{ $entregasPendientes }}</div>
                        <div style="font-size: 0.9rem; color: #cccccc;">Pendientes</div>
                    </div>
                    <div style="text-align: center; background: #333; padding: 0.8rem; border-radius: 8px;">
                        <div style="font-size: 1.5rem; color: #2196f3; font-weight: bold;">{{ number_format($eficienciaPersonal, 1) }}%</div>
                        <div style="font-size: 0.9rem; color: #cccccc;">Eficiencia</div>
                    </div>
                    <div style="text-align: center; background: #333; padding: 0.8rem; border-radius: 8px;">
                        <div style="font-size: 1.5rem; color: #9c27b0; font-weight: bold;">
                            {{ $tiempoPromedioPersonal ? number_format($tiempoPromedioPersonal, 1) : '0' }}
                        </div>
                        <div style="font-size: 0.9rem; color: #cccccc;">Días Prom.</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Ranking de repartidores -->
@if($repartidores->count() > 0)
<div class="data-table" style="margin-top: 2rem;">
    <div class="table-header">
        <h3><i class="fas fa-trophy"></i> Ranking de Repartidores</h3>
    </div>
    <div style="padding: 2rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
            @php
                $repartidoresOrdenados = $repartidores->sortByDesc(function($repartidor) {
                    return $repartidor->envios->count();
                });
            @endphp
            
            @foreach($repartidoresOrdenados as $index => $repartidor)
                <div style="background: #2a2a2a; padding: 1.5rem; border-radius: 10px; text-align: center; position: relative;">
                    @if($index < 3)
                        <div style="position: absolute; top: -10px; right: -10px; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: white; background: #FFD700;">
                            {{ $index + 1 }}
                        </div>
                    @endif
                    
                    <div style="background: #333; width: 60px; height: 60px; border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-user" style="font-size: 1.5rem; color: #ffffff;"></i>
                    </div>
                    
                    <h4 style="color: #ffffff; margin-bottom: 0.5rem;">{{ $repartidor->nombre_completo }}</h4>
                    
                    @if($repartidor->vehiculo_placa)
                        <p style="color: #ff9800; margin-bottom: 1rem;">
                            <i class="fas fa-motorcycle"></i> {{ $repartidor->vehiculo_placa }}
                        </p>
                    @endif
                    
                    <div style="display: flex; justify-content: space-between; margin-top: 1rem;">
                        <span style="color: #999;">Entregas:</span>
                        <span style="color: #2196f3; font-weight: bold;">{{ $repartidor->envios->count() }}</span>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #999;">Completadas:</span>
                        <span style="color: #4caf50; font-weight: bold;">
                            {{ $repartidor->envios->where('estado_envio', 'Entregado')->count() }}
                        </span>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #999;">En curso:</span>
                        <span style="color: #ff9800; font-weight: bold;">
                            {{ $repartidor->envios->whereNotIn('estado_envio', ['Entregado'])->count() }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection
