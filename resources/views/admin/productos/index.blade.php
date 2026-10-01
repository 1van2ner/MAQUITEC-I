<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - MAQUITEC I.S.A.C.</title>
    <style>
        :root { 
            --amarillo: #FFD700; 
            --amarillo-hover: #f3cc00;
            --negro: #121212; 
            --blanco: #ffffff; 
            --gris-claro: #f8f9fa;
            --gris-borde: #e2e8f0;
            --texto-muted: #64748b;
            --azul-admin: #2563eb;
        }
        * { box-sizing: border-box; }
        
        body {
            margin: 0;
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, sans-serif;
            color: var(--negro);
            background: radial-gradient(circle at 50% 20%, #1e1e1e 0%, #0a0a0a 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Barra superior y Navegación sofisticada */
        .top-bar { 
            background: rgba(10, 10, 10, 0.95); 
            backdrop-filter: blur(10px);
            color: var(--blanco); 
            padding: 10px 8%; 
            display: flex; 
            flex-wrap: wrap; 
            justify-content: space-between; 
            gap: 12px; 
            font-size: 0.85rem; 
            border-bottom: 1px solid rgba(255,255,255,0.06); 
        }
        .top-bar span { display: inline-flex; align-items: center; gap: 8px; color: #cbd5e1; }
        
        nav { 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            padding: 14px 8%; 
            background: rgba(18, 18, 18, 0.98); 
            border-bottom: 3px solid var(--amarillo); 
            box-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }
        .logo { display: flex; align-items: center; gap: 14px; text-decoration: none; }
        .logo img { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; border: 2px solid var(--amarillo); }
        .logo-text strong { font-size: 1.05rem; color: var(--amarillo); letter-spacing: 0.05em; display: block; }
        .logo-text span { color: #94a3b8; font-size: 0.75rem; display: block; }

        .user-pill {
            background: rgba(255, 215, 0, 0.1);
            border: 1px solid rgba(255, 215, 0, 0.3);
            padding: 6px 16px;
            border-radius: 20px;
            color: var(--blanco);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .user-pill span { color: var(--amarillo); font-weight: 600; }

        /* Contenedor Principal */
        .main-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            flex: 1;
            width: 100%;
        }

        .admin-card {
            background: var(--blanco);
            width: 100%;
            max-width: 1200px;
            padding: 36px 44px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            border-top: 4px solid var(--amarillo);
            position: relative;
        }

        .header-flex { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 24px; 
            flex-wrap: wrap; 
            gap: 15px; 
        }

        .admin-card h1 { 
            margin: 0 0 6px 0; 
            color: var(--negro); 
            font-size: 1.7rem; 
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .admin-card p {
            margin: 0;
            color: var(--texto-muted);
            font-size: 0.9rem;
        }

        /* Botones sofisticados */
        .btn { 
            padding: 10px 16px; 
            border-radius: 10px; 
            font-weight: 700; 
            text-decoration: none; 
            font-size: 0.85rem; 
            display: inline-flex; 
            align-items: center; 
            justify-content: center;
            cursor: pointer; 
            border: none; 
            transition: all 0.2s ease;
        }
        
        .btn-new { 
            background: var(--negro); 
            color: var(--amarillo); 
            padding: 11px 20px; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .btn-new:hover { 
            background: var(--amarillo); 
            color: var(--negro); 
            transform: translateY(-1px);
        }

        .btn-edit { 
            background: var(--amarillo); 
            color: var(--negro); 
            margin-right: 5px; 
            padding: 8px 12px;
            box-shadow: 0 2px 6px rgba(255, 215, 0, 0.2);
        }
        .btn-edit:hover { 
            background: var(--amarillo-hover); 
            transform: translateY(-1px);
        }

        .btn-delete { 
            background: #ef4444; 
            color: #fff; 
            padding: 8px 12px;
        }
        .btn-delete:hover { background: #dc2626; }

        .btn-back { 
            display: inline-flex; 
            align-items: center; 
            gap: 8px; 
            background: var(--gris-claro); 
            color: var(--negro); 
            padding: 8px 14px; 
            border-radius: 8px; 
            text-decoration: none; 
            font-weight: 600; 
            font-size: 0.85rem; 
            margin-bottom: 24px; 
            border: 1px solid var(--gris-borde);
            transition: all 0.2s;
        }
        .btn-back:hover {
            background: #e2e8f0;
        }

        .alert-success { 
            background: #dcfce7; 
            color: #166534; 
            padding: 14px 18px; 
            border-radius: 10px; 
            margin-bottom: 24px; 
            font-weight: 600; 
            font-size: 0.9rem;
            border: 1px solid #bbf7d0;
        }

        /* Tabla estilizada */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px; 
            white-space: nowrap;
        }

        th, td { 
            padding: 14px 16px; 
            text-align: left; 
            border-bottom: 1px solid var(--gris-borde); 
            font-size: 0.9rem; 
            vertical-align: middle; 
        }

        th { 
            background: var(--gris-claro); 
            font-weight: 700; 
            color: #334155; 
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        tr {
            transition: background 0.15s ease;
        }
        tr:hover td {
            background: #fafafa;
        }

        .img-thumb { 
            width: 50px; 
            height: 50px; 
            object-fit: cover; 
            border-radius: 8px; 
            border: 1px solid var(--gris-borde); 
        }

        footer {
            background: rgba(10, 10, 10, 0.95);
            color: #64748b;
            text-align: center;
            padding: 18px;
            font-size: 0.8rem;
            border-top: 1px solid rgba(255,255,255,0.04);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-card { padding: 24px 16px; }
            .header-flex { flex-direction: column; align-items: flex-start; }
            .btn-new { width: 100%; text-align: center; }
        }
    </style>
</head>
<body>

    <div>
        <div class="top-bar">
            <span>Av. San Agustín SMP, Lima, Perú</span>
            <span>📞 963 727 185 | 955 081 815</span>
            <span>✉ ventas@maquitec.com</span>
        </div>
        
        <nav>
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('img/productos/maquitec_2026_new.jpg') }}" alt="Logo Maquitec">
                <div class="logo-text">
                    <strong>MAQUITEC I.S.A.C.</strong>
                    <span>Soluciones industriales en movimiento</span>
                </div>
            </a>
            <div class="user-pill">Hola, <span>{{ Auth::user()->name }}</span></div>
        </nav>
    </div>

    <div class="main-container">
        <div class="admin-card">
            <a href="{{ route('admin.dashboard') }}" class="btn-back">&larr; Volver al Panel</a>
            
            <div class="header-flex">
                <div>
                    <h1>Gestión de Maquinaria y Productos</h1>
                    <p>Agrega equipos nuevos o da de baja maquinaria existente en el catálogo web.</p>
                </div>
                <a href="{{ route('admin.productos.create') }}" class="btn btn-new">+ Añadir Nuevo Producto</a>
            </div>

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $prod)
                        <tr>
                            <td><img src="{{ asset($prod->imagen) }}" alt="{{ $prod->nombre }}" class="img-thumb"></td>
                            <td><code style="background: var(--gris-claro); padding: 4px 8px; border-radius: 6px; border: 1px solid var(--gris-borde);">{{ $prod->codigo }}</code></td>
                            <td><strong>{{ $prod->nombre }}</strong></td>
                            <td>
                                <span style="font-weight: 700; color: {{ $prod->stock > 0 ? '#166534' : '#991b1b' }}; background: {{ $prod->stock > 0 ? '#dcfce7' : '#fee2e2' }}; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; display: inline-block;">
                                    {{ $prod->stock }} unidades
                                </span>
                            </td>
                            <td>
                                <!-- Botón Editar (Amarillo corporativo) -->
                                <a href="{{ route('admin.productos.edit', $prod->id) }}" class="btn btn-edit">Editar</a>

                                <!-- Botón Eliminar -->
                                <form action="{{ route('admin.productos.destroy', $prod->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        © 2026 MAQUITEC I.S.A.C. — Todos los derechos reservados.
    </footer>
</body>
</html>