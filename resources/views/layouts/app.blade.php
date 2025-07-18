<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Adidas Logística')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            color: #ffffff;
            min-height: 100vh;
        }

        .header {
            background: linear-gradient(90deg, #000000 0%, #333333 100%);
            padding: 1rem 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo h1 {
            background: linear-gradient(45deg, #ffffff, #cccccc);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 2rem;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-menu a {
            color: #ffffff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-menu a:hover, .nav-menu a.active {
            background: linear-gradient(45deg, #ffffff, #cccccc);
            color: #000000;
            transform: translateY(-2px);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-title h2 {
            font-size: 3rem;
            background: linear-gradient(45deg, #ffffff, #cccccc);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .page-title p {
            color: #cccccc;
            font-size: 1.2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
            border: 1px solid #333;
        }

        .stat-card:hover {
            transform: translateY(-10px);
        }

        .stat-icon {
            font-size: 3rem;
            color: #ffffff;
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #cccccc;
            font-size: 1.1rem;
        }

        .data-table {
            background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid #333;
        }

        .table-header {
            background: linear-gradient(90deg, #333333 0%, #444444 100%);
            padding: 1.5rem;
            border-bottom: 1px solid #444;
        }

        .table-header h3 {
            color: #ffffff;
            font-size: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #333;
        }

        th {
            background: #2a2a2a;
            color: #ffffff;
            font-weight: 600;
        }

        td {
            color: #cccccc;
        }

        tr:hover {
            background: #2a2a2a;
        }

        .status-badge {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .status-en-almacen {
            background: #ff6b35;
            color: white;
        }

        .status-en-camino {
            background: #f7931e;
            color: white;
        }

        .status-entregado {
            background: #4caf50;
            color: white;
        }

        .status-pendiente {
            background: #ff9800;
            color: white;
        }

        .status-pagado {
            background: #4caf50;
            color: white;
        }

        .btn {
            background: linear-gradient(45deg, #ffffff, #cccccc);
            color: #000000;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.3);
        }

        .btn-small {
            padding: 0.3rem 0.8rem;
            font-size: 0.9rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: #4caf50;
            color: white;
        }

        .footer {
            text-align: center;
            padding: 2rem;
            color: #666;
            border-top: 1px solid #333;
            margin-top: 3rem;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .container {
                padding: 1rem;
            }

            .page-title h2 {
                font-size: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <h1>ADIDAS</h1>
                <span style="color: #cccccc;">LOGÍSTICA</span>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="{{ route('logistica.dashboard') }}" class="{{ request()->routeIs('logistica.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a></li>
                    <li><a href="{{ route('logistica.envios') }}" class="{{ request()->routeIs('logistica.envios') ? 'active' : '' }}">
                        <i class="fas fa-truck"></i> Envíos
                    </a></li>
                    <li><a href="{{ route('logistica.pedidos') }}" class="{{ request()->routeIs('logistica.pedidos') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart"></i> Pedidos
                    </a></li>
                    <li><a href="{{ route('logistica.clientes') }}" class="{{ request()->routeIs('logistica.clientes') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Clientes
                    </a></li>
                    <li><a href="{{ route('logistica.productos') }}" class="{{ request()->routeIs('logistica.productos') ? 'active' : '' }}">
                        <i class="fas fa-box"></i> Productos
                    </a></li>
                    <li><a href="{{ route('logistica.repartidores') }}" class="{{ request()->routeIs('logistica.repartidores') ? 'active' : '' }}">
                        <i class="fas fa-motorcycle"></i> Repartidores
                    </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        <p>&copy; 2025 Adidas Logística. Sistema de gestión logística.</p>
    </footer>

    <script>
        // Función para actualizar estado de envío
        function actualizarEstado(envioId, nuevoEstado) {
            if (confirm('¿Estás seguro de que quieres cambiar el estado?')) {
                fetch(`/logistica/envios/${envioId}/estado`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        estado_envio: nuevoEstado
                    })
                })
                .then(response => response.json())
                .then(data => {
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al actualizar el estado');
                });
            }
        }
    </script>
</body>
</html>
