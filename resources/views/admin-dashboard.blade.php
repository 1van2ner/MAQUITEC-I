<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - MAQUITEC I.S.A.C.</title>
    <style>
        :root { 
            --amarillo: #FFD700; 
            --amarillo-hover: #f3cc00;
            --negro: #121212; 
            --blanco: #ffffff; 
            --gris-claro: #fcfcfc;
            --gris-borde: #eaeaea;
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

        /* Contenedor Superior (Barra y Nav) */
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
        .logo img { width: 70px; height: 70px; object-fit: cover; border-radius: 50%; }
        .logo-text strong { font-size: 1.05rem; color: var(--amarillo); letter-spacing: 0.05em; display: block; }
        .logo-text span { color: #94a3b8; font-size: 0.75rem; display: block; }

        .user-pill {
            background: rgba(255, 215, 0, 0.1);
            border: 1px solid rgba(255, 215, 0, 0.3);
            padding: 6px 14px;
            border-radius: 20px;
            color: var(--blanco);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .user-pill span { color: var(--amarillo); font-weight: 600; }

        /* Contenedor Principal del Panel */
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
            max-width: 950px;
            padding: 40px 48px;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            border-top: 5px solid var(--amarillo);
        }

        /* Encabezado del Panel */
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid var(--gris-borde);
            padding-bottom: 24px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .admin-header h1 {
            margin: 0 0 6px;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--negro);
            letter-spacing: -0.02em;
        }

        .admin-header p {
            margin: 0;
            color: var(--texto-muted);
            font-size: 0.92rem;
        }

        .badge-control {
            background: rgba(255, 215, 0, 0.15);
            color: #856404;
            border: 1px solid rgba(255, 215, 0, 0.4);
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        /* Grid de Módulos (Tarjetas Interactivas) */
        .modules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            margin-bottom: 35px;
        }

        .module-card {
            background: var(--gris-claro);
            border: 1.5px solid var(--gris-borde);
            border-radius: 16px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.25s ease;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .module-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--amarillo);
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .module-card:hover {
            border-color: var(--amarillo);
            transform: translateY(-4px);
            box-shadow: 0 12px 25px -8px rgba(255, 215, 0, 0.2);
            background: var(--blanco);
        }

        .module-card:hover::before {
            opacity: 1;
        }

        .module-content h3 {
            margin: 0 0 8px;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--negro);
        }

        .module-content p {
            margin: 0 0 20px;
            font-size: 0.85rem;
            color: var(--texto-muted);
            line-height: 1.4;
        }

        .module-action {
            font-size: 0.85rem;
            font-weight: 700;
            color: #b38f00;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: gap 0.2s ease;
        }

        .module-card:hover .module-action {
            gap: 10px;
            color: var(--negro);
        }

        /* Botón inferior */
        .admin-footer-actions {
            display: flex;
            justify-content: flex-start;
            border-top: 1px solid var(--gris-borde);
            padding-top: 24px;
        }

        .btn-back {
            background: var(--negro);
            color: var(--amarillo);
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .btn-back:hover {
            background: #222;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.25);
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
            .admin-header { flex-direction: column; align-items: flex-start; }
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
                Hola, <span>Ivan Koji Rojas Valencia</span>
            </div>
        </nav>
    </div>

    <div class="admin-container">
        <div class="admin-card">
            
            <div class="admin-header">
                <div>
                    <h1>Panel de Administración</h1>
                    <p>Bienvenido de nuevo, <strong>Ivan Koji Rojas Valencia</strong>.</p>
                </div>
                <div class="badge-control">Zona de Control</div>
            </div>

            <!-- Módulos de Administración -->
            <div class="modules-grid">
                
                <!-- Gestión de Productos -->
                <a href="{{ url('/admin/productos') }}" class="module-card">
                    <div class="module-content">
                        <h3>Gestión de Productos</h3>
                        <p>Agrega, edita o elimina maquinaria, equipos industriales y repuestos del catálogo web.</p>
                    </div>
                    <div class="module-action">
                        Administrar productos &rarr;
                    </div>
                </a>

                <!-- Gestión de Categorías -->
                <a href="{{ url('/admin/categorias') }}" class="module-card">
                    <div class="module-content">
                        <h3>Gestión de Categorías</h3>
                        <p>Crea, edita o elimina las categorías para clasificar adecuadamente los equipos y productos.</p>
                    </div>
                    <div class="module-action">
                        Administrar categorías &rarr;
                    </div>
                </a>

                <!-- Gestión de Banners (NUEVO) -->
                <a href="{{ route('admin.banners.index') }}" class="module-card">
                    <div class="module-content">
                        <h3>Gestión de Banners</h3>
                        <p>Personaliza las imágenes principales, títulos y enlaces del carrusel de bienvenida en la página web.</p>
                    </div>
                    <div class="module-action">
                        Administrar banners &rarr;
                    </div>
                </a>

                <!-- Gestión de Usuarios -->
                <a href="{{ url('/admin/usuarios') }}" class="module-card">
                    <div class="module-content">
                        <h3>Gestión de Usuarios</h3>
                        <p>Visualiza los usuarios registrados en el sistema y administra sus roles de acceso.</p>
                    </div>
                    <div class="module-action">
                        Ver usuarios &rarr;
                    </div>
                </a>

            </div>

            <div class="admin-footer-actions">
                <a href="{{ url('/') }}" class="btn-back">
                    &larr; Volver al inicio
                </a>
            </div>

        </div>
    </div>

    <footer>
        © 2026 MAQUITEC I.S.A.C. — Todos los derechos reservados.
    </footer>

</body>
</html>