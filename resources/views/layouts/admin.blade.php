<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Administración - MAQUITEC I.S.A.C.' }}</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #111111; --gris-claro: #f4f4f4; --blanco: #ffffff; --azul-admin: #2563eb; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, sans-serif; background: var(--gris-claro); color: #27272a; min-height: 100vh; display: flex; flex-direction: column; }
        .admin-layout-main { flex: 1; width: 100%; }
        .admin-layout-main h1, .admin-layout-main h2, .admin-layout-main h3 { color: var(--negro); }
        .admin-layout-main input:focus, .admin-layout-main textarea:focus, .admin-layout-main select:focus { border-color: var(--azul-admin) !important; outline: none; box-shadow: 0 0 0 3px rgba(37, 99, 235, .12); }
        @media (max-width: 700px) { .admin-layout-main { overflow-x: hidden; } }
    </style>
</head>
<body>
    @include('footer.top')

    <main class="admin-layout-main">
        @yield('content')
    </main>

    @include('footer.bottom')
</body>
</html>