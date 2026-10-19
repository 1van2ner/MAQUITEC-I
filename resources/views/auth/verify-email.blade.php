<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica tu correo - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #FFD700;
            --amarillo-hover: #f3cc00;
            --negro: #121212;
            --blanco: #ffffff;
            --texto-muted: #64748b;
        }

        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: var(--negro);
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, sans-serif;
            background: radial-gradient(circle at 50% 20%, #1e1e1e 0%, #0a0a0a 100%);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 10px 8%;
            color: #cbd5e1;
            background: rgba(10, 10, 10, 0.95);
            font-size: 0.85rem;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 8%;
            background: rgba(18, 18, 18, 0.98);
            border-bottom: 3px solid var(--amarillo);
        }

        .logo { display: flex; align-items: center; gap: 14px; text-decoration: none; }
        .logo img { width: 64px; height: 64px; border-radius: 50%; object-fit: cover; }
        .logo strong { display: block; color: var(--amarillo); }
        .logo span { color: #94a3b8; font-size: 0.75rem; }
        .back-home { color: var(--blanco); text-decoration: none; font-size: 0.9rem; }

        .auth-container {
            display: grid;
            flex: 1;
            place-items: center;
            padding: 40px 20px;
        }

        .auth-card {
            width: min(100%, 500px);
            padding: 40px;
            border-top: 4px solid var(--amarillo);
            border-radius: 16px;
            background: var(--blanco);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.45);
            text-align: center;
        }

        .mail-icon {
            display: grid;
            width: 56px;
            height: 56px;
            margin: 0 auto 18px;
            place-items: center;
            border-radius: 12px;
            background: #fff8cc;
            color: #8a6d00;
        }

        h1 { margin: 0 0 10px; font-size: 1.65rem; }
        .description { margin: 0 0 20px; color: var(--texto-muted); line-height: 1.6; }
        .email { display: block; margin: 0 0 22px; overflow-wrap: anywhere; font-weight: 700; }

        .notice {
            margin-bottom: 18px;
            padding: 12px 14px;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            background: #f0fdf4;
            color: #166534;
            font-size: 0.9rem;
        }

        .notice.error {
            border-color: #fecaca;
            background: #fef2f2;
            color: #991b1b;
        }

        .btn-submit {
            width: 100%;
            padding: 13px;
            border: 0;
            border-radius: 8px;
            background: var(--amarillo);
            color: var(--negro);
            font-size: 0.95rem;
            font-weight: 800;
            cursor: pointer;
        }

        .btn-submit:hover { background: var(--amarillo-hover); }
        .auth-footer-links { margin-top: 20px; color: var(--texto-muted); font-size: 0.9rem; }
        .auth-footer-links a { color: var(--negro); font-weight: 700; }

        footer {
            padding: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            background: rgba(10, 10, 10, 0.95);
            color: #64748b;
            text-align: center;
            font-size: 0.8rem;
        }

        @media (max-width: 520px) {
            .auth-card { padding: 30px 22px; }
            nav, .top-bar { padding-right: 5%; padding-left: 5%; }
        }
    </style>
</head>
<body>
    <div>
        <div class="top-bar">
            <span>Av. San Agustín SMP, Lima, Perú</span>
            <span>963 727 185 | 955 081 815</span>
            <span>maquitec.servicios0601@gmail.com</span>
        </div>
        <nav>
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('img/logo_pagina_general/maquitec_2026_new.jpg') }}" alt="Logo Maquitec">
                <span><strong>MAQUITEC´I</strong>Soluciones industriales en movimiento</span>
            </a>
            <a href="{{ url('/') }}" class="back-home">Volver al inicio</a>
        </nav>
    </div>

    <main class="auth-container">
        <section class="auth-card" aria-labelledby="verification-title">
            <div class="mail-icon" aria-hidden="true">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                    <path d="m3 7 9 6 9-6"></path>
                </svg>
            </div>
            <h1 id="verification-title">Verifica tu correo</h1>
            <p class="description">Enviamos un enlace de confirmación a la dirección indicada. Abre el mensaje y pulsa el enlace para activar tu cuenta.</p>

            @if ($email)
                <span class="email">{{ $email }}</span>
            @endif

            @if (session('status'))
                <div class="notice" role="status">{{ session('status') }}</div>
            @endif

            @if (session('verification_error'))
                <div class="notice error" role="alert">{{ session('verification_error') }}</div>
            @endif

            @if ($email)
                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-submit">Reenviar correo de verificación</button>
                </form>
            @endif

            <div class="auth-footer-links">
                ¿Ya verificaste tu correo? <a href="{{ route('login') }}">Inicia sesión</a>
            </div>
        </section>
    </main>

    <footer>© 2026 MAQUITEC I.S.A.C. — Todos los derechos reservados.</footer>
</body>
</html>