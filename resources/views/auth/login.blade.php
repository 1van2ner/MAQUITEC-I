<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - MAQUITEC I.S.A.C.</title>
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
        .logo img { width: 50px; height: 50px; object-fit: contain; border-radius: 10px; }
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
        .auth-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            flex: 1;
        }

        .auth-card {
            background: var(--blanco);
            width: 100%;
            max-width: 480px; /* Ancho optimizado y compacto para login */
            padding: 40px 48px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            border-top: 4px solid var(--amarillo);
            position: relative;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-card h2 {
            margin: 0 0 6px;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--negro);
            letter-spacing: -0.02em;
        }

        .auth-card p.subtitle {
            margin: 0;
            color: var(--texto-muted);
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 0.83rem;
            color: #334155;
            letter-spacing: 0.01em;
        }

        .form-control {
            width: 100%;
            padding: 11px 14px;
            font-size: 0.92rem;
            border: 1.5px solid var(--gris-borde);
            border-radius: 10px;
            outline: none;
            transition: all 0.25s ease;
            background: var(--gris-claro);
            color: var(--negro);
        }

        .form-control:hover {
            border-color: #cbd5e1;
        }

        .form-control:focus {
            border-color: var(--negro);
            background: var(--blanco);
            box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.15);
        }

        /* Contenedor de Contraseña con Ojito */
        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-wrapper .form-control {
            padding-right: 44px;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            background: transparent;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--texto-muted);
            padding: 4px;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: var(--negro);
        }

        .btn-submit {
            width: 100%;
            padding: 13px;
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--negro);
            background: var(--amarillo);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.25);
            letter-spacing: 0.02em;
            margin-top: 5px;
        }

        .btn-submit:hover {
            background: var(--amarillo-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(255, 215, 0, 0.35);
        }

        .auth-footer-links {
            margin-top: 22px;
            text-align: center;
            font-size: 0.88rem;
            color: var(--texto-muted);
        }

        .auth-footer-links a {
            color: var(--negro);
            font-weight: 700;
            text-decoration: none;
            transition: color 0.2s;
        }

        .auth-footer-links a:hover {
            color: #d97706;
            text-decoration: underline;
        }

        footer {
            background: rgba(10, 10, 10, 0.95);
            color: #64748b;
            text-align: center;
            padding: 18px;
            font-size: 0.8rem;
            border-top: 1px solid rgba(255,255,255,0.04);
        }

        @media (max-width: 520px) {
            .auth-card { padding: 30px 20px; }
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
                <img src="{{ asset('img/logo_maquitec.jpg') }}" alt="Logo Maquitec">
                <div class="logo-text">
                    <strong>MAQUITEC I.S.A.C.</strong>
                    <span>Soluciones industriales en movimiento</span>
                </div>
            </a>
            <a href="{{ url('/') }}" class="back-home">← Volver al inicio</a>
        </nav>
    </div>

    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Iniciar Sesión</h2>
                <p class="subtitle">Accede a tu cuenta de MAQUITEC I.S.A.C.</p>
            </div>

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Correo electrónico *</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="correo@ejemplo.com" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña *</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('password', this)">
                            <!-- Ícono de Ojo Cerrado (por defecto) -->
                            <svg class="eye-closed" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Ingresar al Sistema</button>
            </form>

            <div class="auth-footer-links">
                ¿Aún no tienes una cuenta? <a href="{{ url('/register') }}">Regístrate aquí</a>
            </div>
        </div>
    </div>

    <footer>
        © 2026 MAQUITEC I.S.A.C. — Todos los derechos reservados.
    </footer>

    <script>
        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            const isPassword = input.type === 'password';
            
            input.type = isPassword ? 'text' : 'password';

            if (isPassword) {
                // Ojo Abierto
                btn.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>`;
            } else {
                // Ojo Cerrado
                btn.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>`;
            }
        }
    </script>
</body>
</html>