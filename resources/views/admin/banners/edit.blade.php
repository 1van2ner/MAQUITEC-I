<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Banner - MAQUITEC I.S.A.C.</title>
    <style>
        :root { 
            --amarillo: #FFD700; 
            --amarillo-hover: #f3cc00;
            --negro: #121212; 
            --blanco: #ffffff; 
            --gris-claro: #f8f9fa;
            --gris-borde: #cbd5e1;
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

        /* Contenedor Principal */
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
            max-width: 800px;
            padding: 40px 48px;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            border-top: 5px solid var(--amarillo);
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
            margin-bottom: 20px; 
            border: 1px solid var(--gris-borde);
            transition: all 0.2s ease;
        }
        .btn-back:hover {
            background: #e2e8f0;
        }

        h1 { 
            margin: 0 0 6px 0; 
            color: var(--negro); 
            font-size: 1.8rem; 
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .subtitle {
            margin: 0 0 25px 0;
            color: var(--texto-muted);
            font-size: 0.9rem;
        }

        /* Formulario y Controles */
        .form-grid {
            display: grid;
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            font-weight: 700;
            font-size: 0.88rem;
            color: #334155;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--gris-borde);
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: inherit;
            color: var(--negro);
            background-color: #fafafa;
            transition: all 0.2s ease;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #eab308;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.3);
        }

        /* Vista previa de imagen */
        .image-preview-container {
            background: var(--gris-claro);
            border: 1px dashed var(--gris-borde);
            border-radius: 12px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 4px;
        }

        .image-preview-container img {
            max-height: 80px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid var(--gris-borde);
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        /* Checkbox estilo switch */
        .checkbox-label {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            font-weight: 600;
            user-select: none;
            color: #334155;
            font-size: 0.95rem;
        }

        .checkbox-label input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: #eab308;
            cursor: pointer;
        }

        /* Botones */
        .actions-group {
            display: flex;
            gap: 12px;
            margin-top: 10px;
            padding-top: 10px;
        }

        .btn { 
            padding: 12px 24px; 
            border-radius: 10px; 
            font-weight: 700; 
            text-decoration: none; 
            font-size: 0.9rem; 
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

        .btn-secondary {
            background: var(--gris-claro);
            color: #475569;
            border: 1px solid var(--gris-borde);
        }
        .btn-secondary:hover {
            background: #e2e8f0;
            color: var(--negro);
        }

        /* Errores */
        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            border: 1px solid #fecaca;
            font-size: 0.9rem;
        }

        .alert-danger ul {
            margin: 8px 0 0 0;
            padding-left: 20px;
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
            .actions-group { flex-direction: column; }
            .btn { width: 100%; }
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
            
            <a href="{{ route('admin.banners.index') }}" class="btn-back">&larr; Volver a Banners</a>
            
            <h1>Editar Banner</h1>
            <p class="subtitle">Modifica la información o imagen destacada para la portada principal.</p>

            @if ($errors->any())
                <div class="alert-danger">
                    <strong>Hubo algunos problemas con tu envío:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="form-grid">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Título:</label>
                    <textarea name="titulo" rows="2" required>{{ old('titulo', $banner->titulo) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Subtítulo:</label>
                    <textarea name="subtitulo" rows="3">{{ old('subtitulo', $banner->subtitulo) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Enlace (Opcional):</label>
                    <input type="text" name="enlace" value="{{ old('enlace', $banner->enlace) }}" placeholder="https://ejemplo.com/promocion">
                </div>

                <div class="form-group">
                    <label>Imagen Actual:</label>
                    <div class="image-preview-container">
                        <img src="{{ asset($banner->imagen) }}" alt="Banner actual">
                        <span style="font-size: 0.85rem; color: var(--texto-muted);">Imagen activa actualmente en la plataforma.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Cambiar Imagen (Opcional):</label>
                    <input type="file" name="imagen" accept=".jpg,.jpeg,.png,.webp,.gif,.bmp,image/*">
                </div>

                <div class="form-group" style="margin-top: 5px;">
                    <label class="checkbox-label">
                        <input type="checkbox" name="activo" value="1" {{ $banner->activo ? 'checked' : '' }}>
                        Activo (Visible en la web)
                    </label>
                </div>

                <div class="actions-group">
                    <button type="submit" class="btn btn-primary">Actualizar Banner</button>
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>

        </div>
    </div>

    <footer>
        © 2026 MAQUITEC I.S.A.C. — Todos los derechos reservados.
    </footer>

</body>
</html>