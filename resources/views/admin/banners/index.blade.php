<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Banners - MAQUITEC I.S.A.C.</title>
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
            max-width: 1200px;
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
            min-width: 0;
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid var(--gris-borde);
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            text-align: left;
            table-layout: fixed;
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
            overflow-wrap: anywhere;
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

        .badge {
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            display: inline-block;
            letter-spacing: 0.05em;
        }
        .badge-active {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }
        .badge-inactive {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #fecaca;
        }

        .banner-thumb {
            width: 100px;
            height: 56px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--gris-borde);
            background: #f8fafc;
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
            .top-bar { display: none; }
            .admin-container { align-items: flex-start; padding: 20px 12px; }
            .admin-card { min-width: 0; padding: 25px 16px; border-radius: 18px; }
            .header-flex { flex-direction: column; align-items: flex-start; }
            h1 { font-size: 1.45rem; }
            .table-responsive { overflow: visible; border: 0; }
            table, tbody { display: block; width: 100%; }
            thead { display: none; }
            tbody tr {
                display: grid;
                grid-template-columns: minmax(90px, 0.8fr) minmax(0, 1.2fr);
                gap: 0 8px;
                margin-bottom: 12px;
                padding: 8px;
                border: 1px solid var(--gris-borde);
                border-radius: 12px;
                background: var(--blanco);
            }
            tbody td {
                display: block;
                min-width: 0;
                padding: 9px 8px;
                border: 0;
                font-size: 0.86rem;
                overflow-wrap: anywhere;
            }
            tbody td::before {
                content: attr(data-label);
                display: block;
                margin-bottom: 4px;
                color: var(--texto-muted);
                font-size: 0.66rem;
                font-weight: 800;
                text-transform: uppercase;
            }
            tbody td:nth-child(1) { grid-column: 1; grid-row: 1; }
            tbody td:nth-child(2) { grid-column: 2; grid-row: 1; }
            tbody td:nth-child(3) { grid-column: 1 / -1; grid-row: 2; }
            tbody td:nth-child(4) {
                display: grid;
                grid-column: 1 / -1;
                grid-row: 3;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 8px;
                text-align: left !important;
            }
            tbody td:nth-child(4)::before { grid-column: 1 / -1; }
            tbody td:nth-child(4) form { margin: 0; }
            tbody td:nth-child(4) .btn { width: 100%; padding: 8px 6px; font-size: 0.78rem; }
            .banner-thumb { width: 100%; max-width: 140px; height: auto; aspect-ratio: 16 / 9; }
            tbody tr.empty-row { display: block; }
            tbody tr.empty-row td { width: 100%; text-align: center !important; }
        }
    </style>
</head>
<body>

    <div class="header-wrapper">
        <div class="top-bar">
            <span>Av. San Agustín SMP, Lima, Perú</span>
            <span>📞 963 727 185 | 955 081 815</span>
            <span>✉ maquitec.servicios0601@gmail.com</span>
        </div>
        
        <nav>
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('img/logo_pagina_general/maquitec_2026_new.jpg') }}" alt="Logo Maquitec">
                <div class="logo-text">
                    <strong>MAQUITEC´I</strong>
                    <span>Soluciones industriales en movimiento</span>
                </div>
            </a>
            <div class="user-pill">
                Hola, <span>{{ Auth::user()->name }}</span>
            </div>
        </nav>
    </div>

    <div class="admin-container">
        <div class="admin-card">
            
            <a href="{{ route('admin.dashboard') }}" class="btn-back">&larr; Volver al Panel</a>
            
            <div class="header-flex">
                <div>
                    <h1>Gestión de Banners</h1>
                    <p style="margin: 4px 0 0 0; color: var(--texto-muted); font-size: 0.9rem;">Administra las imágenes y mensajes destacados del portal principal.</p>
                </div>
                <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">+ Nuevo Banner</a>
            </div>

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 20%;">Imagen</th>
                            <th style="width: 40%;">Título</th>
                            <th style="width: 15%;">Estado</th>
                            <th style="width: 25%; text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($banners as $banner)
                            <tr>
                                <td data-label="Imagen">
                                    <img src="{{ asset($banner->imagen) }}" alt="Banner" class="banner-thumb">
                                </td>
                                <td data-label="Título"><strong>{{ $banner->titulo }}</strong></td>
                                <td data-label="Estado">
                                    <span class="badge {{ $banner->activo ? 'badge-active' : 'badge-inactive' }}">
                                        {{ $banner->activo ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td data-label="Acciones" style="text-align: center;">
                                    <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-edit">Editar</a>
                                    <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este banner?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="empty-row">
                                <td colspan="4" style="text-align: center; color: var(--texto-muted); padding: 40px;">No hay banners registrados.</td>
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