<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Categoría - MAQUITEC I.S.A.C.</title>
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
            max-width: 560px;
            padding: 40px 48px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            border-top: 4px solid var(--amarillo); /* Borde superior con amarillo corporativo */
            position: relative;
        }

        .admin-header {
            margin-bottom: 25px;
        }

        .admin-card h1 {
            margin: 0 0 6px;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--negro);
            letter-spacing: -0.02em;
        }

        .admin-card p.subtitle {
            margin: 0;
            color: var(--texto-muted);
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        label {
            font-size: 0.83rem;
            font-weight: 600;
            text-transform: uppercase;
            color: #334155;
            letter-spacing: 0.01em;
        }

        input, textarea {
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

        input:hover, textarea:hover {
            border-color: #cbd5e1;
        }

        input:focus, textarea:focus {
            border-color: var(--negro);
            background: var(--blanco);
            box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.15); /* Enfoque con resplandor amarillo */
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Botón con estilo corporativo principal */
        .btn-submit {
            background: var(--amarillo);
            color: var(--negro);
            padding: 13px 24px;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.25);
            letter-spacing: 0.02em;
        }

        .btn-submit:hover {
            background: var(--amarillo-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(255, 215, 0, 0.35);
        }

        .btn-back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 20px;
            color: var(--texto-muted);
            font-weight: 600;
            font-size: 0.88rem;
            text-decoration: none;
            transition: color 0.2s;
        }

        .btn-back-link:hover {
            color: var(--negro);
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            border: 1px solid #fecaca;
        }

        footer {
            background: rgba(10, 10, 10, 0.95);
            color: #64748b;
            text-align: center;
            padding: 18px;
            font-size: 0.8rem;
            border-top: 1px solid rgba(255,255,255,0.04);
        }

        @media (max-width: 600px) {
            .admin-card { padding: 30px 20px; }
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
            <a href="{{ route('admin.categorias.index') }}" class="btn-back-link">&larr; Volver a la lista de categorías</a>
            
            <div class="admin-header">
                <h1>Crear Nueva Categoría</h1>
                <p class="subtitle">Complete los campos para registrar una nueva categoría</p>
            </div>

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
                    <label>Nombre de la Categoría *</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ej. Apiladores Eléctricos" required>
                </div>

                <div class="form-group">
                    <label>Descripción (Opcional)</label>
                    <textarea name="descripcion" placeholder="Breve detalle de los equipos que pertenecen a esta categoría...">{{ old('descripcion') }}</textarea>
                </div>

                <button type="submit" class="btn-submit">Guardar Categoría</button>
            </form>
        </div>
    </div>

    <footer>
        © 2026 MAQUITEC I.S.A.C. — Todos los derechos reservados.
    </footer>
</body>
</html>