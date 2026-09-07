<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #FFD700;
            --negro: #111111;
            --gris-oscuro: #18181b;
            --gris-claro: #f4f4f4;
            --blanco: #ffffff;
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

        /* Contenedor Principal tipo Tarjeta Moderna */
        main { 
            width: 100%;
            max-width: 540px; 
            margin: 50px auto; 
            padding: 40px; 
            background: var(--blanco); 
            border-radius: 20px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.08); 
            box-sizing: border-box;
            border-top: 6px solid var(--amarillo);
        }

        /* Cabecera del perfil con Avatar */
        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }

        .profile-avatar {
            width: 75px;
            height: 75px;
            background: var(--negro);
            color: var(--amarillo);
            font-size: 2rem;
            font-weight: 800;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            border: 3px solid var(--amarillo);
            flex-shrink: 0;
        }

        .profile-title-area h1 { 
            margin: 0 0 5px 0; 
            font-size: 1.6rem;
            color: var(--negro);
        }

        .profile-role-badge {
            display: inline-block;
            background: rgba(255, 215, 0, 0.2);
            color: #b45309;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Detalles de la información del usuario */
        .profile-info-grid {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 35px;
        }

        .info-card {
            background: #fafafa;
            border: 1px solid #e4e4e7;
            padding: 16px 20px;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #71717a;
            font-weight: 600;
        }

        .info-value {
            font-size: 1.05rem;
            color: var(--negro);
            font-weight: 600;
            word-break: break-word;
        }

        /* Botón de retorno estilizado */
        .profile-actions {
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
        <!-- Cabecera con Avatar Dinámico (Inicial del usuario) -->
        <div class="profile-header">
            <div class="profile-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="profile-title-area">
                <h1>Mi Perfil</h1>
                <span class="profile-role-badge">{{ Auth::user()->rol ?? 'Cliente' }}</span>
            </div>
        </div>

        <!-- Tarjetas de Datos -->
        <div class="profile-info-grid">
            <div class="info-card">
                <span class="info-label">Nombre completo</span>
                <span class="info-value">{{ Auth::user()->name }}</span>
            </div>

            <div class="info-card">
                <span class="info-label">Correo electrónico</span>
                <span class="info-value">{{ Auth::user()->email }}</span>
            </div>

            @if(isset(Auth::user()->telefono) && Auth::user()->telefono)
            <div class="info-card">
                <span class="info-label">Teléfono</span>
                <span class="info-value">{{ Auth::user()->telefono }}</span>
            </div>
            @endif

            @if(isset(Auth::user()->direccion) && Auth::user()->direccion)
            <div class="info-card">
                <span class="info-label">Dirección</span>
                <span class="info-value">{{ Auth::user()->direccion }}</span>
            </div>
            @endif
        </div>

        <!-- Botón de Regreso -->
        <div class="profile-actions">
            <a href="{{ url('/') }}" class="btn-back">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Volver al inicio
            </a>
        </div>
    </main>

    @include('footer.bottom')
</body>
</html>