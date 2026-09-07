<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $categoria->nombre }} - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #1a1a1a; --gris: #f4f4f4; --blanco: #ffffff; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, sans-serif; color: var(--negro); background: var(--gris); }
        .contenido { max-width: 1180px; margin: 0 auto; padding: 70px 6%; }
        .encabezado { margin-bottom: 36px; }
        h1 { margin: 0 0 12px; font-size: clamp(2rem, 5vw, 3.4rem); }
        .descripcion { max-width: 760px; color: #555; line-height: 1.8; }
        .productos { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 24px; }
        .producto { overflow: hidden; background: var(--blanco); border-radius: 16px; box-shadow: 0 16px 36px rgba(0,0,0,0.08); }
        .producto img { width: 100%; height: 210px; object-fit: cover; }
        .producto-contenido { padding: 22px; }
        .producto h2 { margin: 0 0 10px; font-size: 1.2rem; }
        .producto p { margin: 0 0 12px; color: #555; line-height: 1.6; }
        .precio { color: #857200; font-weight: 700; }
        .volver { display: inline-block; margin-top: 34px; color: var(--negro); font-weight: 700; }
        @media (max-width: 800px) { .productos { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (max-width: 560px) { .productos { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    @include('footer.top')

    <main class="contenido">
        <header class="encabezado">
            <h1>{{ $categoria->nombre }}</h1>
            <p class="descripcion">{{ $categoria->descripcion ?? 'Equipos y componentes especializados.' }}</p>
        </header>

        @if($categoria->productos->isEmpty())
            <p>No hay productos registrados en esta categoría.</p>
        @else
            <div class="productos">
                @foreach($categoria->productos as $producto)
                    <article class="producto">
                        @if($producto->imagen)
                            <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
                        @endif
                        <div class="producto-contenido">
                            <h2>{{ $producto->nombre }}</h2>
                            <p>{{ $producto->descripcion ?? 'Producto industrial especializado.' }}</p>
                            @if($producto->precio !== null)
                                <span class="precio">S/ {{ number_format($producto->precio, 2) }}</span>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        <a class="volver" href="{{ url('/') }}">&larr; Volver al inicio</a>
    </main>

    @include('footer.bottom')
</body>
</html>
