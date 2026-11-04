<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva contraseña - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --yellow:#FFD700; --black:#121212; --muted:#64748b; --white:#fff; }
        * { box-sizing:border-box; }
        body { min-height:100vh; margin:0; display:flex; align-items:center; justify-content:center; padding:40px 20px; font-family:"Segoe UI",system-ui,sans-serif; background:radial-gradient(circle at 50% 20%,#1e1e1e,#0a0a0a); }
        .card { width:min(100%,460px); padding:36px; border-radius:16px; border-top:5px solid var(--yellow); background:var(--white); box-shadow:0 25px 50px rgba(0,0,0,.45); }
        h1 { margin:0 0 8px; font-size:1.55rem; }
        p { margin:0 0 20px; color:var(--muted); line-height:1.55; }
        .field { margin-bottom:14px; }
        label { display:block; margin-bottom:7px; font-size:.85rem; font-weight:700; }
        input { width:100%; height:46px; padding:0 13px; border:1px solid #d4d4d8; border-radius:9px; font-size:.95rem; }
        input:focus { outline:none; border-color:#b79a00; box-shadow:0 0 0 3px rgba(255,215,0,.18); }
        .password-wrapper { position:relative; display:flex; align-items:center; }
        .password-wrapper input { padding-right:48px; }
        .toggle-password { position:absolute; right:10px; width:36px !important; height:36px !important; min-width:36px; padding:0; border-radius:7px; display:flex; align-items:center; justify-content:center; background:transparent; color:#64748b; }
        .toggle-password:hover { background:#fef9c3; color:#121212; }
        button { width:100%; height:46px; border:0; border-radius:9px; background:var(--yellow); color:var(--black); font-weight:800; cursor:pointer; }
        button:hover { background:#f3cc00; }
        .errors { margin-bottom:16px; padding:12px 14px; border-radius:8px; background:#fef2f2; border:1px solid #fecaca; color:#991b1b; font-size:.88rem; }
    </style>
</head>
<body>
    <section class="card">
        <h1>Crear nueva contraseña</h1>
        <p>Este enlace ya fue autenticado por correo. Elige una contraseña nueva de al menos 8 caracteres.</p>

        @if ($errors->any())
            <div class="errors" role="alert">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="field">
                <label for="email">Correo electrónico</label>
                <input id="email" name="email" type="email" value="{{ $email }}" autocomplete="email" required>
            </div>
            <div class="field">
                <label for="password">Nueva contraseña</label>
                <div class="password-wrapper">
                    <input id="password" name="password" type="password" autocomplete="new-password" minlength="8" required>
                    <button type="button" class="toggle-password" onclick="togglePassword('password', this)" aria-label="Mostrar contraseña" aria-pressed="false">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                    </button>
                </div>
            </div>
            <div class="field">
                <label for="password_confirmation">Confirmar contraseña</label>
                <div class="password-wrapper">
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" minlength="8" required>
                    <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation', this)" aria-label="Mostrar contraseña" aria-pressed="false">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                    </button>
                </div>
            </div>
            <button type="submit">Restablecer contraseña</button>
        </form>
    </section>
    <script>
        function togglePassword(fieldId, button) {
            const input = document.getElementById(fieldId);
            const showPassword = input.type === 'password';
            input.type = showPassword ? 'text' : 'password';
            button.setAttribute('aria-pressed', showPassword ? 'true' : 'false');
            button.setAttribute('aria-label', showPassword ? 'Ocultar contraseña' : 'Mostrar contraseña');

            button.innerHTML = showPassword
                ? '<svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>'
                : '<svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
        }
    </script>
</body>
</html>
