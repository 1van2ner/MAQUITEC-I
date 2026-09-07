<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Categoría - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #111111; --gris-claro: #f4f4f4; --blanco: #ffffff; --azul-admin: #2563eb; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, sans-serif; background: var(--gris-claro); color: #27272a; display: flex; flex-direction: column; min-height: 100vh; }
        main { width: 100%; max-width: 600px; margin: 40px auto; padding: 35px; background: var(--blanco); border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.08); border-top: 6px solid var(--azul-admin); box-sizing: border-box; }
        h1 { margin-top: 0; color: var(--negro); font-size: 1.6rem; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; display: flex; flex-direction: column; gap: 6px; }
        label { font-size: 0.85rem; font-weight: 700; text-transform: uppercase; color: #71717a; }
        input, textarea { padding: 12px; border: 1px solid #d4d4d8; border-radius: 10px; font-size: 1rem; outline: none; font-family: inherit; }
        input:focus, textarea:focus { border-color: var(--azul-admin); }
        textarea { resize: vertical; min-height: 90px; }
        .btn-submit { background: var(--negro); color: var(--amarillo); padding: 14px 24px; border: none; border-radius: 10px; font-weight: 700; font-size: 1rem; cursor: pointer; width: 100%; margin-top: 10px; }
        .btn-submit:hover { background: var(--amarillo); color: var(--negro); }
        .btn-back { display: inline-block; margin-bottom: 20px; color: var(--negro); font-weight: 700; text-decoration: none; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; }
    </style>
</head>
<body>
    @include('footer.top')

    <main>
        <a href="{{ route('admin.categorias.index') }}" class="btn-back">&larr; Volver a la lista</a>
        <h1>Crear Nueva Categoría</h1>

        @if ($errors->any())
            <div class="alert-error">
                <ul style="margin: 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categorias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nombre de la Categoría</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ej. Apiladores Eléctricos" required>
            </div>

            <div class="form-group">
                <label>Descripción (Opcional)</label>
                <textarea name="descripcion" placeholder="Breve detalle de los equipos que pertenecen a esta categoría...">{{ old('descripcion') }}</textarea>
            </div>

            <button type="submit" class="btn-submit">Guardar Categoría</button>
        </form>
    </main>

    @include('footer.bottom')
</body>
</html>