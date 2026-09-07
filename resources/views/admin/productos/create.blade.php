<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #111111; --gris-claro: #f4f4f4; --blanco: #ffffff; --azul-admin: #2563eb; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, sans-serif; background: var(--gris-claro); color: #27272a; display: flex; flex-direction: column; min-height: 100vh; }
        main { width: 100%; max-width: 700px; margin: 40px auto; padding: 35px; background: var(--blanco); border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.08); border-top: 6px solid var(--azul-admin); box-sizing: border-box; }
        h1 { margin-top: 0; color: var(--negro); font-size: 1.6rem; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; display: flex; flex-direction: column; gap: 6px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        label { font-size: 0.85rem; font-weight: 700; text-transform: uppercase; color: #71717a; }
        input, textarea, select { padding: 12px; border: 1px solid #d4d4d8; border-radius: 10px; font-size: 1rem; outline: none; font-family: inherit; background: #fff; }
        input:focus, textarea:focus, select:focus { border-color: var(--azul-admin); }
        textarea { resize: vertical; min-height: 100px; }
        .btn-submit { background: var(--negro); color: var(--amarillo); padding: 14px 24px; border: none; border-radius: 10px; font-weight: 700; font-size: 1rem; cursor: pointer; width: 100%; margin-top: 10px; }
        .btn-submit:hover { background: var(--amarillo); color: var(--negro); }
        .btn-back { display: inline-block; margin-bottom: 20px; color: var(--negro); font-weight: 700; text-decoration: none; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; }
    </style>
</head>
<body>
    @include('footer.top')

    <main>
        <a href="{{ route('admin.productos.index') }}" class="btn-back">&larr; Volver a la lista</a>
        <h1>Registrar Nuevo Producto / Maquinaria</h1>

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nombre del Equipo o Producto</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ej. Montacargas Industrial 3 Toneladas" required>
            </div>

            <!-- Selector de Categoría Añadido -->
            <div class="form-group">
                <label>Categoría del Equipo</label>
                <select name="categoria_id" required>
                    <option value="">Seleccione una categoría...</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ old('categoria_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Precio (S/)</label>
                    <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" placeholder="Ej. 4500.00" required>
                </div>
                <div class="form-group">
                    <label>Stock Disponible</label>
                    <input type="number" name="stock" value="{{ old('stock', 1) }}" placeholder="Ej. 5" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Código Interno</label>
                    <input type="text" name="codigo" value="{{ old('codigo') }}" placeholder="Ej. MT-001 (Opcional)">
                </div>
                <div class="form-group">
                    <label>Imagen del Producto</label>
                    <input type="file" name="imagen" accept="image/*" required>
                </div>
            </div>

            <div class="form-group">
                <label>Descripción detallada</label>
                <textarea name="descripcion" placeholder="Escribe las características principales del equipo..." required>{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label>Especificaciones técnicas (Opcional)</label>
                <textarea name="especificaciones" placeholder="Capacidad de carga, dimensiones, marca, modelo...">{{ old('especificaciones') }}</textarea>
            </div>

            <button type="submit" class="btn-submit">Guardar y Publicar Producto</button>
        </form>
    </main>

    @include('footer.bottom')
</body>
</html>