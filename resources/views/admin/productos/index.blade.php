<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #111111; --gris-claro: #f4f4f4; --blanco: #ffffff; --azul-admin: #2563eb; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, sans-serif; background: var(--gris-claro); color: #27272a; display: flex; flex-direction: column; min-height: 100vh; }
        main { width: 100%; max-width: 1200px; margin: 40px auto; padding: 30px; background: var(--blanco); border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.08); border-top: 6px solid var(--azul-admin); box-sizing: border-box; }
        .header-flex { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 15px; }
        h1 { margin: 0; color: var(--negro); font-size: 1.8rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px 14px; text-align: left; border-bottom: 1px solid #e4e4e7; font-size: 0.9rem; vertical-align: middle; }
        th { background: #fafafa; font-weight: 700; color: var(--negro); }
        .img-thumb { width: 50px; height: 50px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd; }
        .btn { padding: 8px 14px; border-radius: 8px; font-weight: 700; text-decoration: none; font-size: 0.85rem; display: inline-block; cursor: pointer; border: none; }
        .btn-new { background: var(--negro); color: var(--amarillo); padding: 10px 18px; border-radius: 10px; }
        .btn-new:hover { background: var(--amarillo); color: var(--negro); }
        .btn-edit { background: #3b82f6; color: #fff; margin-right: 5px; }
        .btn-edit:hover { background: #1d4ed8; }
        .btn-delete { background: #ef4444; color: #fff; }
        .btn-delete:hover { background: #dc2626; }
        .btn-back { display: inline-flex; align-items: center; gap: 8px; background: #e4e4e7; color: var(--negro); padding: 8px 14px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.85rem; margin-bottom: 20px; }
        .alert-success { background: #dcfce7; color: #166534; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-weight: 600; }
    </style>
</head>
<body>
    @include('footer.top')

    <main>
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

        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $prod)
                <tr>
                    <td><img src="{{ asset($prod->imagen) }}" alt="{{ $prod->nombre }}" class="img-thumb"></td>
                    <td><code>{{ $prod->codigo }}</code></td>
                    <td><strong>{{ $prod->nombre }}</strong></td>
                    <td>S/ {{ number_format($prod->precio, 2) }}</td>
                    <td>
                        <span style="font-weight: bold; color: {{ $prod->stock > 0 ? '#166534' : '#991b1b' }};">
                            {{ $prod->stock }} unidades
                        </span>
                    </td>
                    <td>
                        <!-- Botón Editar -->
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
    </main>

    @include('footer.bottom')
</body>
</html>