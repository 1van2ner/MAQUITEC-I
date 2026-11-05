<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --yellow:#FFD700; --black:#121212; --muted:#64748b; --white:#fff; }
        * { box-sizing:border-box; }
        body { min-height:100vh; margin:0; display:flex; flex-direction:column; font-family:"Segoe UI",system-ui,sans-serif; background:radial-gradient(circle at 50% 20%,#1e1e1e,#0a0a0a); }
        main { flex:1; display:grid; place-items:center; padding:40px 20px; }
        .card { width:min(100%,460px); padding:36px; border-radius:16px; border-top:5px solid var(--yellow); background:var(--white); box-shadow:0 25px 50px rgba(0,0,0,.45); }
        .icon { width:52px; height:52px; margin-bottom:16px; display:grid; place-items:center; border-radius:12px; background:#fff8cc; color:#7a6200; font-size:24px; }
        h1 { margin:0 0 8px; font-size:1.55rem; }
        p { margin:0 0 20px; color:var(--muted); line-height:1.55; }
        label { display:block; margin-bottom:7px; font-size:.85rem; font-weight:700; }
        input { width:100%; height:46px; padding:0 13px; border:1px solid #d4d4d8; border-radius:9px; font-size:.95rem; }
        input:focus { outline:none; border-color:#b79a00; box-shadow:0 0 0 3px rgba(255,215,0,.18); }
        button { width:100%; margin-top:14px; height:46px; border:0; border-radius:9px; background:var(--yellow); color:var(--black); font-weight:800; cursor:pointer; }
        button:hover { background:#f3cc00; }
        .notice { margin-bottom:16px; padding:12px 14px; border-radius:8px; background:#f0fdf4; border:1px solid #bbf7d0; color:#166534; font-size:.88rem; }
        .errors { margin-bottom:16px; color:#b91c1c; font-size:.88rem; }
        .links { margin-top:18px; text-align:center; font-size:.88rem; }
        .links a { color:var(--black); font-weight:700; text-decoration:none; }
        .links a:hover { text-decoration:underline; }
    </style>
</head>
<body>
    <main>
        <section class="card">
            <div class="icon" aria-hidden="true">&#9993;</div>
            <h1>Recuperar contraseña</h1>
            <p>Ingresa tu correo registrado. Te enviaremos un enlace único y seguro que vence en 60 minutos.</p>

            @if (session('status'))
                <div class="notice" role="status">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="errors" role="alert">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <label for="email">Correo electrónico</label>
                <input id="email" name="email" type="email" value="{{ $email }}" autocomplete="email" {{ Auth::check() ? 'readonly' : 'required' }} autofocus>
                <button type="submit">Enviar enlace de recuperación</button>
            </form>

            <div class="links"><a href="{{ route('login') }}">← Volver a iniciar sesión</a></div>
        </section>
    </main>
</body>
</html>
