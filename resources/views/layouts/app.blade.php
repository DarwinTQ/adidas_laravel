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
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 25%, #7f8c8d 50%, #95a5a6 75%, #bdc3c7 100%);
            background-size: 300% 300%;
            animation: gradientShift 12s ease infinite;
            color: #ffffff;
            min-height: 100vh;
            position: relative;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(0.5px);
            z-index: -1;
        }

        .header {
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.95) 0%, rgba(52, 73, 94, 0.9) 100%);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding: 1.5rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
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
            background: linear-gradient(45deg, #ecf0f1, #bdc3c7, #95a5a6);
            background-size: 200% 200%;
            animation: textGradient 6s ease infinite;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 2.5rem;
            font-weight: 900;
            letter-spacing: 3px;
            text-shadow: 0 0 20px rgba(255,255,255,0.3);
        }

        @keyframes textGradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .nav-menu {
            display: flex;
            gap: 1rem;
            list-style: none;
        }

        .nav-menu a {
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            font-weight: 600;
            backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.15);
        }

        .nav-menu a:hover, .nav-menu a.active {
            color: #ffffff;
            background: rgba(52, 73, 94, 0.8);
            border: 1px solid rgba(255,255,255,0.3);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 3rem 2rem;
            position: relative;
        }

        .page-title {
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
        }

        .page-title::before {
            content: '';
            position: absolute;
            top: -2rem;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(45deg, #34495e, #7f8c8d, #95a5a6);
            border-radius: 2px;
        }

        .page-title h2 {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, #ffffff 0%, rgba(255,255,255,0.8) 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(255,255,255,0.3);
            letter-spacing: 2px;
        }

        .page-title p {
            color: rgba(255,255,255,0.8);
            font-size: 1.3rem;
            font-weight: 300;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
            margin-bottom: 4rem;
            perspective: 1000px;
        }

        .stat-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(20px);
            padding: 2.5rem;
            border-radius: 25px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: rotate 4s linear infinite;
            z-index: -1;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .stat-card:hover {
            transform: translateY(-15px) rotateX(5deg) rotateY(5deg);
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            background: rgba(255,255,255,0.25);
        }

        .stat-icon {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            filter: drop-shadow(0 0 10px rgba(255,255,255,0.3));
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            color: #ffffff;
            margin-bottom: 0.8rem;
            text-shadow: 0 0 20px rgba(255,255,255,0.5);
        }

        .stat-label {
            color: rgba(255,255,255,0.9);
            font-size: 1.2rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .data-table {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(25px);
            border-radius: 25px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
            position: relative;
        }

        .data-table::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #34495e, #7f8c8d, #95a5a6, #bdc3c7);
            background-size: 300% 100%;
            animation: borderGlow 4s ease infinite;
        }

        @keyframes borderGlow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .table-header {
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(15px);
            padding: 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .table-header h3 {
            color: #ffffff;
            font-size: 1.8rem;
            font-weight: 700;
            text-shadow: 0 0 15px rgba(255,255,255,0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1.5rem;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        th {
            background: rgba(255,255,255,0.05);
            color: rgba(255,255,255,0.9);
            font-weight: 700;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            color: rgba(255,255,255,0.8);
            font-weight: 500;
        }

        tr {
            transition: all 0.3s ease;
        }

        tr:hover {
            background: rgba(255,255,255,0.1);
            transform: scale(1.02);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .status-badge {
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .status-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }

        .status-badge:hover::before {
            left: 100%;
        }

        .status-en-almacen {
            background: linear-gradient(135deg, #e67e22, #f39c12);
            color: white;
            box-shadow: 0 4px 15px rgba(230, 126, 34, 0.4);
        }

        .status-en-camino {
            background: linear-gradient(135deg, #3498db, #5dade2);
            color: white;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4);
        }

        .status-entregado {
            background: linear-gradient(135deg, #27ae60, #58d68d);
            color: white;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.4);
        }

        .status-pendiente {
            background: linear-gradient(135deg, #f39c12, #f7dc6f);
            color: white;
            box-shadow: 0 4px 15px rgba(243, 156, 18, 0.4);
        }

        .status-pagado {
            background: linear-gradient(135deg, #27ae60, #58d68d);
            color: white;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.4);
        }

        .btn {
            background: linear-gradient(135deg, #34495e, #2c3e50);
            color: #ffffff;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 8px 25px rgba(44, 62, 80, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #2c3e50, #1a252f);
            box-shadow: 0 12px 30px rgba(44, 62, 80, 0.4);
        }

        .btn-small {
            padding: 0.5rem 1.5rem;
            font-size: 0.9rem;
        }

        .alert {
            padding: 1.5rem 2rem;
            border-radius: 20px;
            margin-bottom: 2rem;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.2);
            position: relative;
            overflow: hidden;
        }

        .alert::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #27ae60, #58d68d);
        }

        .alert-success {
            background: rgba(39, 174, 96, 0.1);
            color: #ffffff;
            border-left: 4px solid #27ae60;
        }

        .footer {
            text-align: center;
            padding: 3rem 2rem;
            color: rgba(255,255,255,0.6);
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 4rem;
            backdrop-filter: blur(10px);
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
                <span style="color: rgba(255,255,255,0.8); font-weight: 600; font-size: 1.2rem; letter-spacing: 2px;">LOGÍSTICA</span>
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
