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
            --gris-claro: #f8f9fa;
            --gris-borde: #e2e8f0;
            --texto-muted: #64748b;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
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

        /* Contenedor Principal Ampliado */
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
            max-width: 1100px;
            padding: 40px 48px;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            border-top: 5px solid var(--amarillo);
        }

        .header-flex { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 28px; 
            flex-wrap: wrap; 
            gap: 15px; 
        }

        h1 { 
            margin: 0; 
            color: var(--negro); 
            font-size: 1.8rem; 
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .badge-control {
            background: rgba(255, 215, 0, 0.2);
            color: #854d0e;
            border: 1px solid rgba(255, 215, 0, 0.5);
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        /* SECCIÓN DE CONTADORES (KPIS) */
        .kpi-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 32px;
        }

        .kpi-box {
            background: var(--gris-claro);
            border: 1px solid var(--gris-borde);
            border-radius: 14px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.2s ease;
        }

        .kpi-box:hover {
            border-color: var(--amarillo);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .kpi-info-title {
            font-size: 0.75rem;
            color: var(--texto-muted);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .kpi-info-value {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--negro);
            margin-top: 2px;
        }

        .kpi-icon-box {
            width: 44px;
            height: 44px;
            background: var(--blanco);
            border: 1px solid var(--gris-borde);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--negro);
            box-shadow: 0 2px 5px rgba(0,0,0,0.04);
        }

        /* GRID DE MÓDULOS (2x2) */
        .modules-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .module-item {
            background: var(--gris-claro);
            border: 1px solid var(--gris-borde);
            border-radius: 16px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .module-item:hover {
            background: var(--blanco);
            border-color: var(--amarillo);
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.08);
            transform: translateY(-2px);
        }

        .module-top {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 12px;
        }

        .module-icon {
            width: 46px;
            height: 46px;
            background: rgba(255, 215, 0, 0.25);
            color: #854d0e;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .module-content h3 {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--negro);
        }

        .module-content p {
            font-size: 0.85rem;
            color: var(--texto-muted);
            line-height: 1.45;
            margin-top: 6px;
        }

        .module-link {
            font-size: 0.85rem;
            font-weight: 700;
            color: #d97706;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 14px;
        }

        /* BOTÓN DE REGRESO */
        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--gris-claro);
            color: var(--negro);
            padding: 10px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            border: 1px solid var(--gris-borde);
            transition: all 0.2s ease;
        }

        .btn-home:hover {
            background: #e2e8f0;
        }

        footer {
            background: rgba(10, 10, 10, 0.95);
            color: var(--texto-muted);
            text-align: center;
            padding: 18px;
            font-size: 0.8rem;
            border-top: 1px solid rgba(255,255,255,0.04);
            width: 100%;
        }

        @media (max-width: 768px) {
            .admin-card { padding: 25px 20px; }
            .kpi-row { grid-template-columns: repeat(2, 1fr); }
            .modules-grid { grid-template-columns: 1fr; }
            .header-flex { flex-direction: column; align-items: flex-start; }
            .top-bar { display: none; }
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
                Hola, <span>{{ Auth::user()->name ?? 'Ivan Koji Rojas Valencia' }}</span>
            </div>
        </nav>
    </div>

    <div class="admin-container">
        <div class="admin-card">
            
            <div class="header-flex">
                <div>
                    <h1>Panel de Administración</h1>
                    <p style="margin: 4px 0 0 0; color: var(--texto-muted); font-size: 0.9rem;">
                        Bienvenido de nuevo, <strong>{{ Auth::user()->name ?? 'Ivan Koji Rojas Valencia' }}</strong>.
                    </p>
                </div>
                <span class="badge-control">Zona de Control</span>
            </div>

            <!-- FILA DE CONTADORES (KPIS) -->
            <section class="kpi-row">
                <!-- Productos (Caja) -->
                <div class="kpi-box">
                    <div>
                        <div class="kpi-info-title">Productos</div>
                        <div class="kpi-info-value">{{ $totalProductos ?? 0 }}</div>
                    </div>
                    <div class="kpi-icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                </div>

                <!-- Categorías (Etiquetas) -->
                <div class="kpi-box">
                    <div>
                        <div class="kpi-info-title">Categorías</div>
                        <div class="kpi-info-value">{{ $totalCategorias ?? 0 }}</div>
                    </div>
                    <div class="kpi-icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 11h.01M7 15h.01M11 7h8M11 11h8M11 15h8M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/></svg>
                    </div>
                </div>

                <!-- Banners (Imagen) -->
                <div class="kpi-box">
                    <div>
                        <div class="kpi-info-title">Banners</div>
                        <div class="kpi-info-value">{{ $totalBanners ?? 0 }}</div>
                    </div>
                    <div class="kpi-icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                </div>

                <!-- Usuarios (Silueta Persona) -->
                <div class="kpi-box">
                    <div>
                        <div class="kpi-info-title">Usuarios</div>
                        <div class="kpi-info-value">{{ $totalUsuarios ?? 0 }}</div>
                    </div>
                    <div class="kpi-icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                </div>
            </section>

            <!-- MÓDULOS DE GESTIÓN -->
            <section class="modules-grid">
                
                <a href="{{ url('/admin/productos') }}" class="module-item">
                    <div class="module-top">
                        <div class="module-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                        <div class="module-content">
                            <h3>Gestión de Productos</h3>
                            <p>Agrega, edita o elimina maquinaria pesada, equipos industriales y repuestos del catálogo.</p>
                        </div>
                    </div>
                    <div class="module-link">Administrar productos &rarr;</div>
                </a>

                <a href="{{ url('/admin/categorias') }}" class="module-item">
                    <div class="module-top">
                        <div class="module-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 11h.01M7 15h.01M11 7h8M11 11h8M11 15h8M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/></svg>
                        </div>
                        <div class="module-content">
                            <h3>Gestión de Categorías</h3>
                            <p>Crea, edita o elimina las categorías para clasificar fácilmente los equipos y productos.</p>
                        </div>
                    </div>
                    <div class="module-link">Administrar categorías &rarr;</div>
                </a>

                <a href="{{ route('admin.banners.index') }}" class="module-item">
                    <div class="module-top">
                        <div class="module-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <div class="module-content">
                            <h3>Gestión de Banners</h3>
                            <p>Personaliza las imágenes promocionales, títulos y enlaces del carrusel de inicio.</p>
                        </div>
                    </div>
                    <div class="module-link">Administrar banners &rarr;</div>
                </a>

                <a href="{{ url('/admin/usuarios') }}" class="module-item">
                    <div class="module-top">
                        <div class="module-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div class="module-content">
                            <h3>Gestión de Usuarios</h3>
                            <p>Visualiza los usuarios registrados en el sistema y administra sus roles de acceso.</p>
                        </div>
                    </div>
                    <div class="module-link">Ver usuarios &rarr;</div>
                </a>

            </section>

            <div>
                <a href="{{ url('/') }}" class="btn-home">
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