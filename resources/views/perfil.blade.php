<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #FFD700;
            --amarillo-hover: #f3cc00;
            --negro: #111111;
            --gris-oscuro: #18181b;
            --gris-claro: #f4f4f4;
            --blanco: #ffffff;
            --rojo-error: #ef4444;
            --verde-exito: #22c55e;
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
            max-width: 580px; 
            margin: 40px auto; 
            padding: 40px; 
            background: var(--blanco); 
            border-radius: 20px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.08); 
            box-sizing: border-box;
            border-top: 6px solid var(--amarillo);
        }

        /* Alertas de Laravel */
        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 0.88rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .alert-success {
            background-color: #dcfce7;
            color: #15803d;
            border: 1px solid #bbf7d0;
        }
        .alert-danger {
            background-color: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fecaca;
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
            margin-bottom: 30px;
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

        /* Sección para el cambio de contraseña */
        .password-section {
            background: #fdfdfd;
            border: 1px dashed #d4d4d8;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .password-toggle-btn {
            background: none;
            border: none;
            color: var(--negro);
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 0;
        }

        .password-toggle-btn:hover {
            color: #d97706;
        }

        .form-password {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #3f3f46;
        }

        .form-group input {
            padding: 10px 14px;
            border: 1px solid #d4d4d8;
            border-radius: 8px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s ease;
        }

        .form-group input:focus {
            border-color: var(--negro);
        }

        .error-text {
            color: var(--rojo-error);
            font-size: 0.78rem;
            font-weight: 600;
        }

        .btn-update-password {
            background: var(--negro);
            color: var(--amarillo);
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 5px;
        }

        .btn-update-password:hover {
            background: var(--amarillo);
            color: var(--negro);
        }

        /* Botón de retorno */
        .profile-actions {
            display: flex;
            justify-content: flex-start;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #e4e4e7;
            color: var(--negro);
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.88rem;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: var(--negro);
            color: var(--amarillo);
        }
    </style>
</head>
<body>
    @include('footer.top')

    <main>
        <!-- Notificaciones de estado de Laravel -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                Por favor, corrige los errores en el formulario para continuar.
            </div>
        @endif

        <!-- Cabecera con Avatar Dinámico -->
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

        <!-- Módulo Segura de Cambio de Contraseña -->
        <div class="password-section">
            <button type="button" class="password-toggle-btn" onclick="togglePasswordForm()">
                <span>🔒 Cambiar Contraseña</span>
                <span id="toggle-icon">▼</span>
            </button>

            <form action="{{ route('password.update.custom') }}" method="POST" id="password-form" class="form-password" style="display: {{ $errors->any() ? 'flex' : 'none' }};">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="current_password">Contraseña Actual</label>
                    <input type="password" name="current_password" id="current_password" required placeholder="Ingresa tu contraseña actual">
                    @error('current_password')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Nueva Contraseña</label>
                    <input type="password" name="password" id="password" required placeholder="Mínimo 8 caracteres">
                    @error('password')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Repite la nueva contraseña">
                </div>

                <button type="submit" class="btn-update-password">
                    Actualizar Contraseña
                </button>
            </form>
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

    <script>
        function togglePasswordForm() {
            const form = document.getElementById('password-form');
            const icon = document.getElementById('toggle-icon');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'flex';
                icon.textContent = '▲';
            } else {
                form.style.display = 'none';
                icon.textContent = '▼';
            }
        }
    </script>
</body>
</html>