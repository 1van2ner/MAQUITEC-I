<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías - MAQUITEC I.S.A.C.</title>
    <style>
        :root { 
            --amarillo: #FFD700; 
            --amarillo-hover: #f3cc00;
            --negro: #121212; 
            --blanco: #ffffff; 
            --gris-claro: #f8f9fa;
            --gris-borde: #e2e8f0;
            --texto-muted: #64748b;
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

        .header-wrapper {
            width: 100%;
        }

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
        .logo img { width: 70px; height: 70px; object-fit: cover; border-radius: 50%; }
        .logo-text strong { font-size: 1.05rem; color: var(--amarillo); letter-spacing: 0.05em; display: block; }
        .logo-text span { color: #94a3b8; font-size: 0.75rem; display: block; }

        .user-pill {
            background: rgba(255, 215, 0, 0.1);
            border: 1px solid rgba(255, 215, 0, 0.3);
            padding: 6px 14px;
            border-radius: 20px;
            color: var(--blanco);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .user-pill span { color: var(--amarillo); font-weight: 600; }

        /* Contenedor Principal Ampliado */
        .admin-container {
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
            max-width: 1200px; /* Ampliado para que ocupe más espacio visual */
            padding: 40px 48px;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            border-top: 5px solid var(--amarillo);
        }

        .header-flex { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 25px; 
            flex-wrap: wrap; 
            gap: 15px; 
        }

        h1 { 
            margin: 0; 
            color: var(--negro); 
            font-size: 1.8rem; 
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .btn { 
            padding: 10px 18px; 
            border-radius: 10px; 
            font-weight: 700; 
            text-decoration: none; 
            font-size: 0.85rem; 
            display: inline-flex; 
            align-items: center; 
            justify-content: center;
            gap: 6px; 
            cursor: pointer; 
            border: none; 
            transition: all 0.2s ease;
        }

        .btn-primary { 
            background: var(--amarillo); 
            color: var(--negro); 
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.25);
        }
        .btn-primary:hover { 
            background: var(--amarillo-hover); 
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(255, 215, 0, 0.35);
        }

        .btn-edit { 
            background: var(--amarillo); 
            color: var(--negro); 
            padding: 8px 12px;
            margin-right: 5px; 
            box-shadow: 0 2px 6px rgba(255, 215, 0, 0.2);
        }
        .btn-edit:hover { 
            background: var(--amarillo-hover); 
            transform: translateY(-1px);
        }

        .btn-danger { 
            background: #ef4444; 
            color: #fff; 
            padding: 8px 12px;
        }
        .btn-danger:hover { 
            background: #dc2626; 
        }

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
            transition: all 0.2s ease;
        }
        .btn-back:hover {
            background: #e2e8f0;
        }

        .table-responsive {
            width: 100%;
            overflow-x: visible; /* Evita que aparezca barra de desplazamiento */
            border-radius: 12px;
            border: 1px solid var(--gris-borde);
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            text-align: left;
            /* Eliminado white-space: nowrap para que el texto baje de línea y no estire la tabla */
        }

        th, td { 
            padding: 14px 18px; 
            font-size: 0.92rem; 
            vertical-align: middle;
        }

        th { 
            background: var(--gris-claro); 
            font-weight: 700; 
            color: #334155; 
            text-transform: uppercase; 
            font-size: 0.78rem; 
            letter-spacing: 0.05em; 
            border-bottom: 2px solid var(--gris-borde);
        }

        td {
            border-bottom: 1px solid var(--gris-borde);
            color: #334155;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr {
            transition: background 0.15s ease;
        }
        tr:hover td {
            background: #fafafa;
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

        .alert-error { 
            background: #fee2e2; 
            color: #991b1b; 
            padding: 14px 18px; 
            border-radius: 10px; 
            margin-bottom: 24px; 
            font-weight: 600; 
            font-size: 0.9rem; 
            border: 1px solid #fecaca;
        }

        footer {
            background: rgba(10, 10, 10, 0.95);
            color: #64748b;
            text-align: center;
            padding: 18px;
            font-size: 0.8rem;
            border-top: 1px solid rgba(255,255,255,0.04);
            width: 100%;
        }

        @media (max-width: 768px) {
            .admin-card { padding: 25px 20px; }
            .header-flex { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>

    <div class="header-wrapper">
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
            <div class="user-pill">
                Zona de Control
            </div>
        </nav>
    </div>

    <div class="admin-container">
        <div class="admin-card">
            
            <a href="{{ route('admin.dashboard') }}" class="btn-back">&larr; Volver al Panel</a>
            
            <div class="header-flex">
                <div>
                    <h1>Gestión de Categorías</h1>
                    <p style="margin: 4px 0 0 0; color: var(--texto-muted); font-size: 0.9rem;">Organiza las clasificaciones del inventario de Maquitec.</p>
                </div>
                <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">+ Nueva Categoría</a>
            </div>

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 8%;">ID</th>
                            <th style="width: 25%;">Nombre de la Categoría</th>
                            <th style="width: 45%;">Descripción</th>
                            <th style="width: 22%; text-align: right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categorias as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td><strong>{{ $cat->nombre }}</strong></td>
                                <td>{{ $cat->descripcion ?? 'Sin descripción' }}</td>
                                <td style="text-align: right;">
                                    <a href="{{ route('admin.categorias.edit', $cat->id) }}" class="btn btn-edit">Editar</a>
                                    <form action="{{ route('admin.categorias.destroy', $cat->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center; color: var(--texto-muted); padding: 40px;">No hay categorías registradas.</td>
                            </tr>
                        @endforelse
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