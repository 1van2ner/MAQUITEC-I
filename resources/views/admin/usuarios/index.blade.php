<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #111111; --gris-claro: #f4f4f4; --blanco: #ffffff; --azul-admin: #2563eb; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, sans-serif; background: var(--gris-claro); color: #27272a; display: flex; flex-direction: column; min-height: 100vh; }
        main { width: 100%; max-width: 1200px; margin: 40px auto; padding: 30px; background: var(--blanco); border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.08); border-top: 6px solid var(--azul-admin); box-sizing: border-box; }
        h1 { margin-top: 0; color: var(--negro); font-size: 1.8rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 14px 16px; text-align: left; border-bottom: 1px solid #e4e4e7; font-size: 0.95rem; }
        th { background: #fafafa; font-weight: 700; color: var(--negro); }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; }
        .badge-admin { background: rgba(37, 99, 235, 0.1); color: var(--azul-admin); }
        .badge-cliente { background: rgba(255, 215, 0, 0.2); color: #b45309; }
        .btn { padding: 8px 14px; border-radius: 8px; font-weight: 700; text-decoration: none; font-size: 0.85rem; display: inline-block; cursor: pointer; border: none; }
        .btn-edit { background: #eab308; color: #111; margin-right: 6px; }
        .btn-delete { background: #ef4444; color: #fff; }
        .btn-back { display: inline-flex; align-items: center; gap: 8px; background: var(--negro); color: var(--amarillo); padding: 10px 20px; border-radius: 10px; text-decoration: none; font-weight: 700; margin-bottom: 20px; }
        .alert-success { background: #dcfce7; color: #166534; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-weight: 600; }
    </style>
</head>
<body>
    @include('footer.top')

    <main>
        <a href="{{ route('admin.dashboard') }}" class="btn-back">&larr; Volver al Panel</a>
        <h1>Gestión de Usuarios</h1>
        <p>Panel de control para supervisar los registros, modificar datos y asignar roles.</p>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><strong>{{ $user->name }}</strong></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge {{ $user->rol === 'Administrador' ? 'badge-admin' : 'badge-cliente' }}">
                            {{ $user->rol ?? 'Cliente' }}
                        </span>
                    </td>
                    <td>{{ $user->telefono ?? 'No registrado' }}</td>
                    <td>
                        <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="btn btn-edit">Editar</a>
                        <form action="{{ route('admin.usuarios.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    @include('footer.bottom')
</body>
</html>