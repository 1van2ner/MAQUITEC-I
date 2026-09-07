<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #111111; --gris-claro: #f4f4f4; --blanco: #ffffff; --azul-admin: #2563eb; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, sans-serif; background: var(--gris-claro); color: #27272a; display: flex; flex-direction: column; min-height: 100vh; }
        main { width: 100%; max-width: 900px; margin: 40px auto; padding: 35px; background: var(--blanco); border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.08); border-top: 6px solid var(--azul-admin); box-sizing: border-box; }
        .header-flex { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px; }
        h1 { margin: 0; color: var(--negro); font-size: 1.6rem; }
        .btn { padding: 10px 18px; border-radius: 8px; font-weight: 700; text-decoration: none; font-size: 0.9rem; display: inline-block; cursor: pointer; border: none; }
        .btn-primary { background: var(--azul-admin); color: #fff; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-danger { background: #dc2626; color: #fff; padding: 6px 12px; font-size: 0.8rem; }
        .btn-danger:hover { background: #b91c1c; }
        .btn-edit { background: #e4e4e7; color: var(--negro); padding: 6px 12px; font-size: 0.8rem; margin-right: 5px; }
        .btn-edit:hover { background: #d4d4d8; }
        .btn-back { display: inline-flex; align-items: center; gap: 8px; background: #e4e4e7; color: var(--negro); padding: 8px 14px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.85rem; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 14px 16px; text-align: left; border-bottom: 1px solid #f0f0f0; font-size: 0.95rem; }
        th { background: #fafafa; font-weight: 700; color: #52525b; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.05em; }
        .alert-success { background: #d1fae5; color: #065f46; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-weight: 600; font-size: 0.9rem; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-weight: 600; font-size: 0.9rem; }
    </style>
</head>
<body>
    @include('footer.top')

    <main>
        <a href="{{ route('admin.dashboard') }}" class="btn-back">&larr; Volver al Panel</a>
        
        <div class="header-flex">
            <h1>Gestión de Categorías</h1>
            <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">+ Nueva Categoría</a>
        </div>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de la Categoría</th>
                    <th>Descripción</th>
                    <th style="text-align: right;">Acciones</th>
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
                        <td colspan="4" style="text-align: center; color: #71717a; padding: 30px;">No hay categorías registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>

    @include('footer.bottom')
</body>
</html>