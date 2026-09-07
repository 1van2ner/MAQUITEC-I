<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #FFD700;
            --negro: #1a1a1a;
            --gris: #f4f4f4;
            --blanco: #ffffff;
            --trans-black: rgba(0, 0, 0, 0.55);
        }

        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; color: var(--negro); background: var(--gris); }
        img { display: block; max-width: 100%; }
        a { color: inherit; text-decoration: none; }

        .top-bar {
            background: linear-gradient(90deg, #111111, #2a2a2a);
            color: var(--blanco);
            padding: 10px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            font-size: 0.9rem;
            letter-spacing: 0.02em;
        }

        .top-bar span {
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .top-bar a {
            color: var(--amarillo);
            text-decoration: none;
            border-bottom: 1px solid transparent;
        }

        .top-bar a:hover {
            border-bottom-color: rgba(255,215,0,0.85);
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 6%;
            background: #111111;
            border-bottom: 4px solid var(--amarillo);
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .logo img {
            width: 88px;
            height: 88px;
            object-fit: contain;
            border-radius: 18px;
            box-shadow: 0 14px 30px rgba(0,0,0,0.3);
        }

        .logo-text {
            display: grid;
            gap: 4px;
            line-height: 1.1;
        }

        .logo-text strong {
            font-size: 1.3rem;
            letter-spacing: 0.08em;
            color: var(--amarillo);
        }

        .logo-text span {
            color: var(--blanco);
            font-size: 0.95rem;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 4px;
            border: 0;
            background: transparent;
            cursor: pointer;
            padding: 6px;
        }

        .menu-toggle span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--blanco);
            border-radius: 999px;
        }

        .menu a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 110px;
            padding: 10px 18px;
            font-weight: 700;
            color: var(--blanco);
            background: rgba(255,215,0,0.14);
            border: 2px solid var(--amarillo);
            border-radius: 999px;
            text-decoration: none;
            transition: color 0.2s ease, transform 0.2s ease, background 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 10px 22px rgba(0,0,0,0.12);
        }

        .menu a:hover,
        .menu a.active {
            color: var(--negro);
            transform: translateY(-2px);
            background: var(--amarillo);
            border-color: #e0b800;
            box-shadow: 0 14px 30px rgba(0,0,0,0.18);
        }

        .hero {
            display: grid;
            place-items: center;
            min-height: 520px;
            overflow: hidden;
            background: linear-gradient(135deg, #d09a00, #f1c40f 40%, #f7d414);
            color: var(--negro);
        }

        .hero-inner {
            max-width: 1040px;
            padding: 0 6%;
            text-align: center;
        }

        .hero h1 {
            margin: 0;
            font-size: clamp(2.8rem, 5vw, 4.5rem);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            line-height: 1.05;
            color: var(--negro);
        }

        .hero p {
            margin: 24px auto 0;
            max-width: 760px;
            font-size: 1.05rem;
            color: rgba(0,0,0,0.75);
        }

        .hero-cta {
            margin-top: 32px;
            display: inline-flex;
            gap: 16px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .hero-cta a {
            padding: 14px 28px;
            border-radius: 999px;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary {
            background: var(--negro);
            color: var(--amarillo);
            border: 2px solid var(--negro);
        }

        .btn-secondary {
            background: var(--blanco);
            border: 2px solid var(--negro);
            color: var(--negro);
        }

        .hero-cta a:hover { transform: translateY(-2px); box-shadow: 0 18px 40px rgba(0,0,0,0.18); }

        .seccion {
            padding: 80px 6%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .seccion h2 {
            margin: 0;
            font-size: 2.4rem;
            letter-spacing: 0.05em;
            color: var(--negro);
        }

        .seccion p.lead {
            margin: 18px auto 0;
            max-width: 760px;
            color: #444;
            font-size: 1.05rem;
            line-height: 1.8;
        }

        .cards {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            margin-top: 40px;
        }

        .card {
            background: var(--blanco);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 18px 45px rgba(26,26,26,0.08);
            display: flex;
            flex-direction: column;
        }

        .card img {
            width: 100%;
            height: 230px;
            object-fit: cover;
        }

        .card-content {
            padding: 24px;
            flex: 1;
            display: grid;
            gap: 12px;
        }

        .card-content strong { font-size: 1.05rem; }
        .card-content p { margin: 0; color: #555; line-height: 1.7; font-size: 0.98rem; }

        /* Estilos de la nueva sección de categorías */
        .seccion-categorias {
            padding: 80px 6%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .seccion-categorias h2 {
            font-size: 2.4rem;
            margin: 10px 0;
            color: var(--negro);
            letter-spacing: 0.02em;
        }

        .grid-categorias {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 24px;
            margin-top: 40px;
            text-align: left;
        }

        .tarjeta-categoria {
            background: var(--blanco);
            border-radius: 20px;
            padding: 30px 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: 1px solid rgba(0,0,0,0.03);
        }

        .tarjeta-categoria:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
            border-color: var(--amarillo);
        }

        .icono-wrapper {
            width: 64px;
            height: 64px;
            background: rgba(255,215,0,0.15);
            border-radius: 50%;
            display: grid;
            place-items: center;
            margin-bottom: 20px;
            color: #b89700;
        }

        .icono-wrapper svg {
            width: 28px;
            height: 28px;
        }

        .tarjeta-categoria h3 {
            font-size: 1.05rem;
            font-weight: 800;
            margin: 0 0 8px 0;
            color: var(--negro);
            letter-spacing: 0.03em;
        }

        .tarjeta-categoria p {
            font-size: 0.88rem;
            color: #666;
            margin: 0 0 20px 0;
            line-height: 1.5;
            flex-grow: 1;
        }

        .badge-productos {
            background: var(--gris);
            color: #444;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 999px;
            display: inline-block;
            transition: background 0.2s ease;
        }

        .tarjeta-categoria:hover .badge-productos {
            background: var(--amarillo);
            color: var(--negro);
        }

        .section-highlight {
            background: linear-gradient(135deg, rgba(255,215,0,0.14), rgba(255,255,255,0.8));
            padding: 80px 6%;
        }

        .section-highlight .seccion {
            text-align: center;
        }

        /* Estilo tipo grilla limpia para marcas */
        .brands-label {
            margin: 36px auto 24px;
            text-align: left;
            max-width: 1200px;
        }

        .brands-label h3 {
            margin: 0;
            font-size: 1.2rem;
            letter-spacing: 0.08em;
            color: #555;
            text-transform: uppercase;
            font-weight: 700;
        }

        .brands-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 16px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .brand-box {
            background: var(--blanco);
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            height: 85px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .brand-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            border-color: var(--amarillo);
        }

        .brand-box img {
            max-height: 50px;
            max-width: 100%;
            object-fit: contain;
            filter: grayscale(20%);
            transition: filter 0.2s ease;
        }

        .brand-box:hover img {
            filter: grayscale(0%);
        }

        footer {
            background: var(--negro);
            color: #ddd;
            padding: 60px 6%;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-grid h3 {
            color: var(--amarillo);
            margin-bottom: 14px;
        }

        .footer-grid p,
        .footer-grid a {
            color: #ccc;
            font-size: 0.98rem;
            line-height: 1.8;
        }

        @media (max-width: 1024px) {
            .grid-categorias { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 900px) {
            nav { flex-wrap: wrap; gap: 12px; }
            .menu-toggle { display: inline-flex; }
            .cards { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .footer-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 640px) {
            .cards { grid-template-columns: 1fr; }
            .grid-categorias { grid-template-columns: 1fr; }
            .brands-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
    </style>
</head>
<body>
    @include('footer.top')

    <section class="hero" id="inicio">
        <div class="hero-inner">
            <h1>SOMOS LA SOLUCIÓN INMEDIATA</h1>
            <p>Equipos y soporte técnico para maquinaria pesada, logística y soluciones industriales con respaldo de marcas líderes.</p>
            <div class="hero-cta">
                <a href="/productos" class="btn-primary">Conoce nuestros productos</a>
                <a href="/servicios" class="btn-secondary">Conoce nuestros servicios</a>
                <a href="/nosotros" class="btn-secondary">Conoce más sobre nosotros</a>
            </div>
        </div>
    </section>

    <section class="seccion" id="productos">
        <h2>Nuestros productos destacados</h2>
        <p class="lead">Tenemos una selección de equipamiento de calidad, ideal para empresas que necesitan fiabilidad, eficiencia y seguridad en cada operación.</p>

        <div class="cards">
            @forelse($productosDestacados as $producto)
                <article class="card">
                    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
                    <div class="card-content">
                        <strong>{{ $producto->nombre }}</strong>
                        <p>{{ Str::limit($producto->descripcion, 80) }}</p>
                        <div style="margin-top: auto; font-weight: 700; color: #b89700;">
                            S/ {{ number_format($producto->precio, 2) }}
                        </div>
                    </div>
                </article>
            @empty
                <div style="grid-column: span 4; text-align: center; padding: 40px; color: #666; background: var(--blanco); border-radius: 20px;">
                    <p>Pronto agregaremos productos destacados a esta sección.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- NUEVA SECCIÓN DE CATEGORÍAS -->
    <section class="seccion-categorias">
        <span style="background: rgba(255,215,0,0.2); color: #857200; padding: 4px 14px; border-radius: 999px; font-size: 0.8rem; font-weight: 700;">¿QUÉ BUSCAS?</span>
        <h2>Nuestras Categorías</h2>
        <p style="color: #666; font-size: 1.05rem; margin-top: 10px;">Soluciones tecnológicas y equipos industriales para tu empresa</p>

        <div class="grid-categorias">
            @foreach($categorias as $categoria)
                <a href="{{ route('categorias.show', $categoria->id) }}" class="tarjeta-categoria">
                    <div class="icono-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3>{{ strtoupper($categoria->nombre) }}</h3>
                    <p>{{ $categoria->descripcion ?? 'Equipos y componentes especializados.' }}</p>
                    <span class="badge-productos">{{ $categoria->productos_count ?? 0 }} productos</span>
                </a>
            @endforeach
        </div>
    </section>

    <section class="section-highlight" id="servicios">
        <div class="seccion" style="padding-top: 0; padding-bottom: 40px;">
            <h2>Servicios y Marcas Autorizadas</h2>
            <p class="lead">Brindamos soporte completo, repuestos y mantenimiento especializado para las mejores marcas del mercado logístico.</p>
        </div>

        <div class="brands-label">
            <h3>Marcas de Montacargas y Equipos Logísticos:</h3>
        </div>

        <!-- Grilla de marcas -->
        <div class="brands-grid">
            <div class="brand-box"><img src="img/toyota.jpg" alt="Toyota"></div>
            <div class="brand-box"><img src="img/komatsu.jpg" alt="Komatsu"></div>
            <div class="brand-box"><img src="img/hyster.jpg" alt="Hyster"></div>
            <div class="brand-box"><img src="img/caterpillar.jpg" alt="Caterpillar"></div>
            <div class="brand-box"><img src="img/yale.jpg" alt="Yale"></div>
            <div class="brand-box"><img src="img/tcm.jpg" alt="TCM"></div>
            <div class="brand-box"><img src="img/hyundai.jpg" alt="Hyundai"></div>
            <div class="brand-box"><img src="img/hangcha.jpg" alt="Hangcha"></div>
            <div class="brand-box"><img src="img/heli.jpg" alt="Heli"></div>
            <div class="brand-box"><img src="img/crown.jpg" alt="Crown"></div>
        </div>
    </section>

    @include('footer.bottom')
</body>
</html>