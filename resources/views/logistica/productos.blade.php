@extends('layouts.app')

@section('title', 'Productos - Adidas Logística')

@section('content')
<div class="page-title">
    <h2>Catálogo de Productos</h2>
    <p>Gestión del inventario Adidas</p>
</div>

<div class="data-table">
    <div class="table-header">
        <h3><i class="fas fa-box"></i> Lista de Productos</h3>
    </div>
    
    @if($productos->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Ventas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td><strong>#{{ $producto->id_producto }}</strong></td>
                    <td>
                        <div>
                            <strong style="color: #ffffff;">{{ $producto->nombre_producto }}</strong><br>
                            @if($producto->descripcion)
                                <small style="color: #999;">{{ Str::limit($producto->descripcion, 100) }}</small>
                            @endif
                        </div>
                    </td>
                    <td>
                        <strong style="color: #4caf50;">S/. {{ number_format($producto->precio, 2) }}</strong>
                    </td>
                    <td>
                        @if($producto->stock > 10)
                            <span style="color: #4caf50; font-weight: bold;">{{ $producto->stock }} unidades</span>
                        @elseif($producto->stock > 0)
                            <span style="color: #ff9800; font-weight: bold;">{{ $producto->stock }} unidades</span>
                        @else
                            <span style="color: #f44336; font-weight: bold;">Sin stock</span>
                        @endif
                    </td>
                    <td>
                        @if($producto->stock > 10)
                            <span class="status-badge status-entregado">Disponible</span>
                        @elseif($producto->stock > 0)
                            <span class="status-badge status-en-camino">Poco Stock</span>
                        @else
                            <span class="status-badge status-en-almacen">Agotado</span>
                        @endif
                    </td>
                    <td>
                        <div style="text-align: center;">
                            <span style="background: #2196f3; color: white; padding: 0.3rem 0.8rem; border-radius: 20px; font-weight: bold;">
                                {{ $producto->pedidos->count() }}
                            </span>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="padding: 3rem; text-align: center;">
            <i class="fas fa-box" style="font-size: 4rem; color: #666; margin-bottom: 1rem;"></i>
            <h3 style="color: #999; margin-bottom: 0.5rem;">No hay productos registrados</h3>
            <p style="color: #666;">Los productos aparecerán aquí cuando se agreguen al catálogo.</p>
        </div>
    @endif
</div>

<!-- Estadísticas de productos -->
<div style="margin-top: 2rem;">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="color: #4caf50;">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-number">{{ $productos->where('stock', '>', 10)->count() }}</div>
            <div class="stat-label">Con Stock Alto</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #ff9800;">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stat-number">{{ $productos->whereBetween('stock', [1, 10])->count() }}</div>
            <div class="stat-label">Stock Bajo</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #f44336;">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stat-number">{{ $productos->where('stock', 0)->count() }}</div>
            <div class="stat-label">Agotados</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="color: #2196f3;">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-number">S/. {{ number_format($productos->avg('precio'), 2) }}</div>
            <div class="stat-label">Precio Promedio</div>
        </div>
    </div>
</div>

<!-- Productos más vendidos -->
@if($productos->count() > 0)
<div class="data-table" style="margin-top: 2rem;">
    <div class="table-header">
        <h3><i class="fas fa-trophy"></i> Productos Más Vendidos</h3>
    </div>
    <div style="padding: 2rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
            @php
                $productosOrdenados = $productos->sortByDesc(function($producto) {
                    return $producto->pedidos->count();
                })->take(6);
            @endphp
            
            @foreach($productosOrdenados as $producto)
                <div style="background: #2a2a2a; padding: 1.5rem; border-radius: 10px; text-align: center;">
                    <div style="background: #333; width: 60px; height: 60px; border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-tshirt" style="font-size: 1.5rem; color: #ffffff;"></i>
                    </div>
                    <h4 style="color: #ffffff; margin-bottom: 0.5rem;">{{ Str::limit($producto->nombre_producto, 30) }}</h4>
                    <p style="color: #4caf50; font-weight: bold; margin-bottom: 0.5rem;">S/. {{ number_format($producto->precio, 2) }}</p>
                    <div style="display: flex; justify-content: space-between; margin-top: 1rem;">
                        <span style="color: #999;">Ventas:</span>
                        <span style="color: #2196f3; font-weight: bold;">{{ $producto->pedidos->count() }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #999;">Stock:</span>
                        @if($producto->stock > 10)
                            <span style="color: #4caf50; font-weight: bold;">{{ $producto->stock }}</span>
                        @elseif($producto->stock > 0)
                            <span style="color: #ff9800; font-weight: bold;">{{ $producto->stock }}</span>
                        @else
                            <span style="color: #f44336; font-weight: bold;">{{ $producto->stock }}</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection
