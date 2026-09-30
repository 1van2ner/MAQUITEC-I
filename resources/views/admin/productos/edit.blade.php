<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - MAQUITEC I.S.A.C.</title>
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
        .logo img { width: 70px; height: 70px; object-fit: cover; border-radius: 50%; }
        .logo-text strong { font-size: 1.05rem; color: var(--amarillo); letter-spacing: 0.05em; display: block; }
        .logo-text span { color: #94a3b8; font-size: 0.75rem; display: block; }

        .back-home {
            color: var(--blanco);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
        }
        .back-home:hover { color: var(--amarillo); }

        /* Contenedor Principal */
        .admin-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            flex: 1;
        }

        .admin-card {
            background: var(--blanco);
            width: 100%;
            max-width: 850px;
            padding: 40px 48px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            border-top: 4px solid var(--amarillo);
            position: relative;
        }

        .admin-header {
            margin-bottom: 25px;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 20px;
        }

        .btn-back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 16px;
            color: var(--texto-muted);
            font-weight: 600;
            font-size: 0.88rem;
            text-decoration: none;
            transition: color 0.2s;
        }

        .btn-back-link svg {
            width: 18px;
            height: 18px;
        }

        .btn-back-link:hover {
            color: var(--negro);
        }

        .admin-card h1 {
            margin: 0 0 6px;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--negro);
            letter-spacing: -0.02em;
        }

        .admin-card p.subtitle {
            margin: 0;
            color: var(--texto-muted);
            font-size: 0.95rem;
        }

        /* Estructura del Formulario */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        label {
            font-size: 0.83rem;
            font-weight: 600;
            text-transform: uppercase;
            color: #334155;
            letter-spacing: 0.01em;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid var(--gris-borde);
            border-radius: 10px;
            font-size: 0.95rem;
            outline: none;
            font-family: inherit;
            background: var(--gris-claro);
            color: var(--negro);
            transition: all 0.25s ease;
        }

        input:hover, textarea:hover, select:hover {
            border-color: #cbd5e1;
        }

        input:focus, textarea:focus, select:focus {
            border-color: var(--negro);
            background: var(--blanco);
            box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.15);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper select {
            appearance: none;
            cursor: pointer;
            padding-right: 40px;
        }

        .select-arrow {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            color: var(--texto-muted);
            pointer-events: none;
        }

        .input-prefix {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-prefix span {
            position: absolute;
            left: 14px;
            font-weight: 600;
            color: var(--texto-muted);
            font-size: 0.92rem;
        }

        .input-prefix input {
            padding-left: 42px !important;
        }

        /* Switch de Producto Destacado */
        .destacado-toggle-box {
            display: flex;
            align-items: center;
            gap: 16px;
            background: var(--gris-claro);
            padding: 16px 20px;
            border-radius: 12px;
            border: 1.5px solid var(--gris-borde);
        }

        .toggle-switch-container {
            position: relative;
            display: inline-block;
            width: 52px;
            height: 28px;
            flex-shrink: 0;
        }

        .toggle-switch-container input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #cbd5e1;
            transition: .3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 34px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
        }

        .toggle-switch-container input:checked + .toggle-slider {
            background-color: var(--negro);
        }

        .toggle-switch-container input:checked + .toggle-slider:before {
            transform: translateX(24px);
        }

        .destacado-label-text {
            display: flex;
            flex-direction: column;
            cursor: pointer;
        }

        .destacado-title {
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--negro);
            cursor: pointer;
        }

        .destacado-desc {
            margin: 2px 0 0 0;
            font-size: 0.82rem;
            color: var(--texto-muted);
        }

        /* Sección de Imagen */
        .image-upload-container {
            display: flex;
            align-items: center;
            gap: 20px;
            background: var(--gris-claro);
            padding: 16px;
            border-radius: 12px;
            border: 1.5px dashed var(--gris-borde);
        }

        .current-image-preview {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .current-image-preview img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid var(--gris-borde);
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .current-image-preview span, .file-name-display {
            font-size: 0.75rem;
            color: var(--texto-muted);
        }

        .file-input-wrapper {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-custom-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: var(--blanco);
            border: 1.5px solid var(--gris-borde);
            color: var(--negro);
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
            width: fit-content;
        }

        .file-custom-btn:hover {
            background: #f1f5f9;
            border-color: var(--texto-muted);
        }

        /* Botones de Acción */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 14px;
            margin-top: 36px;
            padding-top: 24px;
            border-top: 2px solid #f1f5f9;
        }

        .btn-cancelar {
            background: #f1f5f9;
            color: var(--negro);
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.2s ease;
            display: inline-flex;
            align-items: center;
        }

        .btn-cancelar:hover {
            background: #e2e8f0;
        }

        .btn-submit {
            background: var(--amarillo);
            color: var(--negro);
            padding: 12px 28px;
            border: none;
            border-radius: 10px;
            font-weight: 800;
            font-size: 0.95rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.25);
            letter-spacing: 0.02em;
        }

        .btn-submit:hover {
            background: var(--amarillo-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(255, 215, 0, 0.35);
        }

        footer {
            background: rgba(10, 10, 10, 0.95);
            color: #64748b;
            text-align: center;
            padding: 18px;
            font-size: 0.8rem;
            border-top: 1px solid rgba(255,255,255,0.04);
        }

        @media (max-width: 768px) {
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full-width { grid-column: span 1; }
            .admin-card { padding: 30px 20px; }
            .image-upload-container { flex-direction: column; align-items: flex-start; }
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
            <a href="{{ url('/') }}" class="back-home">← Volver al inicio</a>
        </nav>
    </div>

    <div class="admin-container">
        <div class="admin-card">
            
            <a href="{{ route('admin.productos.index') }}" class="btn-back-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver al Listado
            </a>

            <div class="admin-header">
                <h1>Editar Producto</h1>
                <p class="subtitle">Modifica los datos del equipo o maquinaria seleccionada en el inventario.</p>
            </div>

            <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    
                    <!-- Nombre del Producto -->
                    <div class="form-group full-width">
                        <label for="nombre">Nombre del Producto *</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required placeholder="Ej. Montacargas Industrial de 5T">
                    </div>

                    <!-- Categoría -->
                    <div class="form-group">
                        <label for="categoria_id">Categoría *</label>
                        <div class="select-wrapper">
                            <select id="categoria_id" name="categoria_id" required>
                                <option value="">Seleccione una categoría...</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ (old('categoria_id', $producto->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <svg class="select-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>

                    <!-- Código Opcional -->
                    <div class="form-group">
                        <label for="codigo">Código (Opcional)</label>
                        <input type="text" id="codigo" name="codigo" value="{{ old('codigo', $producto->codigo) }}" placeholder="Ej. MAQ-4853">
                    </div>

                    <!-- Stock -->
                    <div class="form-group">
                        <label for="stock">Stock Disponible *</label>
                        <input type="number" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required placeholder="1">
                    </div>

                    <!-- Descripción -->
                    <div class="form-group full-width">
                        <label for="descripcion">Descripción *</label>
                        <textarea id="descripcion" name="descripcion" rows="4" placeholder="Detalles generales del equipo..." required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>

                    <!-- Especificaciones -->
                    <div class="form-group full-width">
                        <label for="especificaciones">Especificaciones Técnicas (Opcional)</label>
                        <textarea id="especificaciones" name="especificaciones" rows="4" placeholder="Capacidad de carga, altura de elevación, motor...">{{ old('especificaciones', $producto->especificaciones) }}</textarea>
                    </div>

                    <!-- Interruptor de Producto Destacado -->
                    <div class="form-group full-width">
                        <div class="destacado-toggle-box">
                            <label class="toggle-switch-container">
                                <input type="checkbox" id="destacado" name="destacado" value="1" {{ old('destacado', $producto->destacado ?? 0) ? 'checked' : '' }}>
                                <span class="toggle-slider"></span>
                            </label>
                            <div class="destacado-label-text">
                                <label for="destacado" class="destacado-title">Marcar como Producto Destacado</label>
                                <p class="destacado-desc">Aparecerá en la sección de destacados de la página principal (Inicio).</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Imagen -->
                    <div class="form-group full-width">
                        <label>Imagen del Producto</label>
                        <div class="image-upload-container">
                            @if($producto->imagen)
                                <div class="current-image-preview">
                                    <img src="{{ str_starts_with($producto->imagen, 'http') ? $producto->imagen : asset(ltrim(str_replace('public/', '', str_replace('storage/', '', $producto->imagen)), '/')) }}" alt="Imagen actual">
                                    <span>Imagen actual</span>
                                </div>
                            @else
                                <div class="current-image-preview placeholder">
                                    <span>Sin imagen</span>
                                </div>
                            @endif

                            <div class="file-input-wrapper">
                                <label for="imagen" class="file-custom-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    Cambiar imagen de archivo
                                </label>
                                <input type="file" id="imagen" name="imagen" accept="image/*">
                                <span class="file-name-display">Ningún archivo seleccionado</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Botones de Acción -->
                <div class="form-actions">
                    <a href="{{ route('admin.productos.index') }}" class="btn-cancelar">Cancelar</a>
                    <button type="submit" class="btn-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Actualizar Producto
                    </button>
                </div>
            </form>

        </div>
    </div>

    <footer>
        © 2026 MAQUITEC I.S.A.C. — Todos los derechos reservados.
    </footer>

    <script>
        document.getElementById('imagen').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Ningún archivo seleccionado';
            document.querySelector('.file-name-display').textContent = fileName;
        });
    </script>
</body>
</html>