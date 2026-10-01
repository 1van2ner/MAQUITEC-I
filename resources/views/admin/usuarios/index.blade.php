<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - MAQUITEC I.S.A.C.</title>
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
            border: 1px solid rgba(226, 232, 240, 0.9);
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
            padding: 8px 12px; 
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
        
        .btn-edit { 
            background: var(--amarillo); 
            color: var(--negro); 
            margin-right: 5px; 
            box-shadow: 0 2px 6px rgba(255, 215, 0, 0.2);
        }
        .btn-edit:hover { 
            background: var(--amarillo-hover); 
            transform: translateY(-1px);
        }

        .btn-delete { 
            background: #ef4444; 
            color: #fff; 
        }
        .btn-delete:hover { 
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
            overflow-x: visible;
            border-radius: 12px;
            border: 1px solid var(--gris-borde);
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            text-align: left;
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

        .badge { 
            padding: 6px 12px; 
            border-radius: 20px; 
            font-size: 0.75rem; 
            font-weight: 700; 
            text-transform: uppercase; 
            display: inline-block;
            letter-spacing: 0.05em;
        }
        .badge-admin { background: rgba(37, 99, 235, 0.1); color: var(--azul-admin); border: 1px solid rgba(37, 99, 235, 0.2); }
        .badge-cliente { background: rgba(255, 215, 0, 0.15); color: #b45309; border: 1px solid rgba(255, 215, 0, 0.3); }

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
                Hola, <span>{{ Auth::user()->name }}</span>
            </div>
        </nav>
    </div>

    <div class="admin-container">
        <div class="admin-card">
            
            <a href="{{ route('admin.dashboard') }}" class="btn-back">&larr; Volver al Panel</a>
            
            <div class="header-flex">
                <div>
                    <h1>Gestión de Usuarios</h1>
                    <p style="margin: 4px 0 0 0; color: var(--texto-muted); font-size: 0.9rem;">Panel de control para supervisar los registros, modificar datos y asignar roles.</p>
                </div>
            </div>

            <form method="GET" action="{{ route('admin.usuarios.index') }}" style="display: grid; grid-template-columns: 1.8fr 1fr 1fr auto auto; gap: 12px; margin: 20px 0 24px; align-items: end;">
                <div>
                    <label for="search" style="display: block; font-size: 0.75rem; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Buscar</label>
                    <input id="search" type="text" name="search" value="{{ request('search') }}" placeholder="Nombre, correo, rol o fecha" style="width: 100%; padding: 11px 12px; border: 2px solid var(--amarillo); border-radius: 10px; font-size: 0.92rem; box-shadow: inset 0 0 0 1px rgba(255, 215, 0, 0.1);">
                </div>

                <div>
                    <label for="rol" style="display: block; font-size: 0.75rem; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Rol</label>
                    <select id="rol" name="rol" style="width: 100%; padding: 11px 12px; border: 2px solid var(--amarillo); border-radius: 10px; font-size: 0.92rem; background: white;">
                        <option value="todos" {{ request('rol') === 'todos' || !request('rol') ? 'selected' : '' }}>Todos</option>
                        <option value="Administrador" {{ request('rol') === 'Administrador' ? 'selected' : '' }}>Administrador</option>
                        <option value="Cliente" {{ request('rol') === 'Cliente' ? 'selected' : '' }}>Cliente</option>
                    </select>
                </div>

                <div>
                    <label for="dia" style="display: block; font-size: 0.75rem; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Fecha</label>
                    <input id="dia" type="date" name="dia" value="{{ request('dia') }}" style="width: 100%; padding: 11px 12px; border: 2px solid var(--amarillo); border-radius: 10px; font-size: 0.92rem;">
                </div>

                <button type="submit" style="background: var(--amarillo); color: var(--negro); border: 2px solid var(--amarillo); border-radius: 10px; padding: 11px 16px; font-weight: 800; cursor: pointer; height: 45px; box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);">Buscar</button>

                @if(request()->has('search') || request()->has('rol') || request()->has('dia'))
                    <a href="{{ route('admin.usuarios.index') }}" style="display: inline-flex; align-items: center; justify-content: center; background: #e2e8f0; color: var(--negro); border-radius: 10px; padding: 11px 16px; font-weight: 700; text-decoration: none; height: 45px;">Limpiar</a>
                @endif
            </form>

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Fecha de registro</th>
                            <th>Teléfono</th>
                            <th style="text-align: right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usuarios as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><strong>{{ $user->name }}</strong></td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->rol === 'Administrador' ? 'badge-admin' : 'badge-cliente' }}">
                                    {{ $user->rol ?? 'Cliente' }}
                                </span>
                            </td>
                            <td>{{ $user->created_at ? $user->created_at->format('d/m/Y') : 'Sin fecha' }}</td>
                            <td>{{ $user->telefono ?? 'No registrado' }}</td>
                            <td style="text-align: right;">
                                <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="btn btn-edit">Editar</a>
                                <form action="{{ route('admin.usuarios.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="text-align: center; color: var(--texto-muted); padding: 40px;">No hay usuarios registrados.</td>
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