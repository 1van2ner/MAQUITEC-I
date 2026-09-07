<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #111111; --gris-claro: #f4f4f4; --blanco: #ffffff; --azul-admin: #2563eb; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, sans-serif; background: var(--gris-claro); color: #27272a; display: flex; flex-direction: column; min-height: 100vh; }
        main { width: 100%; max-width: 600px; margin: 40px auto; padding: 35px; background: var(--blanco); border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.08); border-top: 6px solid var(--azul-admin); box-sizing: border-box; }
        h1 { margin-top: 0; color: var(--negro); font-size: 1.6rem; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; display: flex; flex-direction: column; gap: 6px; }
        label { font-size: 0.85rem; font-weight: 700; text-transform: uppercase; color: #71717a; }
        input, select { padding: 12px; border: 1px solid #d4d4d8; border-radius: 10px; font-size: 1rem; outline: none; }
        input:focus, select:focus { border-color: var(--azul-admin); }
        .btn-submit { background: var(--negro); color: var(--amarillo); padding: 12px 24px; border: none; border-radius: 10px; font-weight: 700; font-size: 1rem; cursor: pointer; width: 100%; margin-top: 10px; }
        .btn-submit:hover { background: var(--amarillo); color: var(--negro); }
        .btn-back { display: inline-block; margin-bottom: 20px; color: var(--negro); font-weight: 700; text-decoration: none; }
    </style>
</head>
<body>
    @include('footer.top')

    <main>
        <a href="{{ route('admin.usuarios.index') }}" class="btn-back">&larr; Volver a la lista</a>
        <h1>Editar Usuario: {{ $usuario->name }}</h1>

        <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nombre completo</label>
                <input type="text" name="name" value="{{ old('name', $usuario->name) }}" required>
            </div>

            <div class="form-group">
                <label>Correo electrónico</label>
                <input type="email" name="email" value="{{ old('email', $usuario->email) }}" required>
            </div>

            <div class="form-group">
                <label>Rol de Usuario</label>
                <select name="rol" required>
                    <option value="Cliente" {{ $usuario->rol === 'Cliente' ? 'selected' : '' }}>Cliente</option>
                    <option value="Administrador" {{ $usuario->rol === 'Administrador' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono', $usuario->telefono) }}">
            </div>

            <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion', $usuario->direccion) }}">
            </div>

            <button type="submit" class="btn-submit">Guardar Cambios</button>
        </form>
    </main>

    @include('footer.bottom')
</body>
</html>