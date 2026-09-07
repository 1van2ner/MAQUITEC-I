<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #FFD700;
            --negro: #111111;
            --gris-oscuro: #18181b;
            --gris-claro: #f4f4f4;
            --blanco: #ffffff;
            --azul-admin: #2563eb;
        }

        body { 
            margin: 0; 
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; 
            color: #27272a; 
            background: var(--gris-claro); 
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Contenedor Principal del Dashboard */
        main { 
            width: 100%;
            max-width: 1100px; 
            margin: 40px auto; 
            padding: 40px; 
            background: var(--blanco); 
            border-radius: 20px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.08); 
            box-sizing: border-box;
            border-top: 6px solid var(--azul-admin);
        }

        /* Cabecera del Panel */
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 35px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }

        .admin-title-area h1 { 
            margin: 0 0 6px 0; 
            font-size: 1.8rem;
            color: var(--negro);
        }

        .admin-title-area p {
            margin: 0;
            color: #71717a;
            font-size: 0.95rem;
        }

        .admin-badge {
            background: rgba(37, 99, 235, 0.1);
            color: var(--azul-admin);
            font-size: 0.85rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Tarjetas de Estadísticas / Accesos Rápidos */
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 35px;
        }

        .admin-card {
            background: #fafafa;
            border: 1px solid #e4e4e7;
            padding: 24px;
            border-radius: 14px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .admin-card:hover {
            transform: translateY(-3px);
            border-color: var(--azul-admin);
        }

        .admin-card h3 {
            margin: 0;
            font-size: 1.1rem;
            color: var(--negro);
        }

        .admin-card p {
            margin: 0;
            color: #71717a;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .card-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 8px;
            color: var(--azul-admin);
            font-weight: 700;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .card-link:hover {
            text-decoration: underline;
        }

        /* Acciones Inferiores / Botón de Retorno */
        .admin-actions {
            display: flex;
            justify-content: flex-start;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--negro);
            color: var(--amarillo);
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .btn-back:hover {
            background: var(--amarillo);
            color: var(--negro);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    @include('footer.top')

    <main>
        <!-- Cabecera del Panel -->
        <div class="admin-header">
            <div class="admin-title-area">
                <h1>Panel de Administración</h1>
                <p>Bienvenido de nuevo, <strong>{{ Auth::user()->name }}</strong>.</p>
            </div>
            <span class="admin-badge">Zona de Control</span>
        </div>

        <!-- Tarjetas de Gestión -->
        <div class="admin-grid">
            <div class="admin-card">
                <h3>Gestión de Productos</h3>
                <p>Agrega, edita o elimina maquinaria, equipos industriales y repuestos del catálogo web.</p>
                <a href="{{ route('admin.productos.index') }}" class="card-link">Administrar productos &rarr;</a>
            </div>

            <!-- Tarjeta Nueva de Gestión de Categorías -->
            <div class="admin-card">
                <h3>Gestión de Categorías</h3>
                <p>Crea, edita o elimina las categorías para clasificar adecuadamente los equipos y productos.</p>
                <a href="{{ route('admin.categorias.index') }}" class="card-link">Administrar categorías &rarr;</a>
            </div>

            <div class="admin-card">
                <h3>Gestión de Usuarios</h3>
                <p>Visualiza los usuarios registrados en el sistema y administra sus roles de acceso.</p>
                <a href="{{ route('admin.usuarios.index') }}" class="card-link">Ver usuarios &rarr;</a>
            </div>

            <div class="admin-card">
                <h3>Configuración del Sitio</h3>
                <p>Actualiza datos de contacto, horarios de atención y mensajes institucionales de MAQUITEC.</p>
                <a href="#" class="card-link">Configurar &rarr;</a>
            </div>
        </div>

        <!-- Botón de Retorno -->
        <div class="admin-actions">
            <a href="{{ url('/') }}" class="btn-back">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Volver al inicio
            </a>
        </div>
    </main>

    @include('footer.bottom')
</body>
</html>