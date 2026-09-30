<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAQUITEC I.S.A.C. | Maquinaria Pesada y Logística Industrial</title>
    <style>
        :root {
            --amarillo: #f7d547;
            --amarillo-hover: #e5c338;
            --amarillo-oscuro: #caaa2b;
            --texto-claro: #ffffff;
            --texto-muted: #a1a1aa;
        }

        * { box-sizing: border-box; }
        
        /* FONDO CON TEXTURA TIPO METAL CEPILLADO OSCURO */
        body { 
            margin: 0; 
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, sans-serif; 
            color: var(--texto-claro); 
            background-color: #121316;
            background-image: 
                linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(0deg, rgba(0, 0, 0, 0.4) 1px, transparent 1px),
                repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0, 0, 0, 0.25) 2px, rgba(0, 0, 0, 0.25) 4px);
            background-size: 100% 100%, 100% 100%, 100% 6px;
            -webkit-font-smoothing: antialiased; 
        }

        img { display: block; max-width: 100%; }
        a { color: inherit; text-decoration: none; }

        /* =========================================================
           BANNER HERO IMPACTANTE Y DE GRAN TAMAÑO (FULL WIDTH)
           ========================================================= */
        .hero-banner-section {
            width: 100%;
            position: relative;
            overflow: hidden;
            background: #0d0e10;
        }

        .hero-slider {
            position: relative;
            width: 100%;
            height: 80vh;
            min-height: 520px;
            max-height: 720px;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.6s ease-in-out, visibility 0.6s ease-in-out;
            display: flex;
            align-items: center;
        }

        .hero-slide.active {
            opacity: 1;
            visibility: visible;
        }

        .hero-bg-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: 1;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg, 
                rgba(0, 0, 0, 0.88) 0%, 
                rgba(0, 0, 0, 0.65) 45%, 
                rgba(0, 0, 0, 0.15) 100%
            );
            z-index: 2;
        }

        .hero-container {
            position: relative;
            z-index: 3;
            max-width: 1280px;
            width: 100%;
            margin: 0 auto;
            padding: 0 6%;
        }

        .hero-content {
            max-width: 650px;
        }

        .hero-slide.active .hero-content {
            animation: hero-enter 800ms cubic-bezier(0.2, 0.7, 0.2, 1) both;
        }

        @keyframes hero-enter {
            from { opacity: 0; transform: translateY(22px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-content h1 {
            font-size: clamp(2.4rem, 4.5vw, 4.2rem);
            font-weight: 900;
            color: #ffffff;
            line-height: 1.05;
            margin: 0 0 18px 0;
            letter-spacing: -0.02em;
            text-transform: uppercase;
            text-shadow: 0 4px 12px rgba(0,0,0,0.5);
        }

        .hero-content h1 span {
            color: var(--amarillo);
            display: block;
        }

        .hero-content p {
            font-size: clamp(1rem, 1.5vw, 1.25rem);
            color: #e2e8f0;
            line-height: 1.5;
            margin: 0 0 32px 0;
            font-weight: 500;
            text-shadow: 0 2px 8px rgba(0,0,0,0.6);
        }

        .btn-hero {
            background: var(--amarillo);
            color: #000000;
            padding: 16px 36px;
            border-radius: 8px;
            font-weight: 800;
            text-decoration: none;
            font-size: 1.05rem;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 6px 20px rgba(247, 213, 71, 0.35);
            transition: all 0.25s ease;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        
        .btn-hero:hover {
            background: var(--amarillo-hover);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(247, 213, 71, 0.5);
        }

        .slider-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: rgba(0, 0, 0, 0.4);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            backdrop-filter: blur(4px);
            transition: all 0.2s ease;
        }

        .slider-nav-btn:hover {
            background: var(--amarillo);
            color: #000000;
            border-color: var(--amarillo);
        }

        .slider-nav-btn.prev { left: 24px; }
        .slider-nav-btn.next { right: 24px; }

        .slider-controls {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 10;
            background: rgba(0, 0, 0, 0.4);
            padding: 8px 16px;
            border-radius: 20px;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot.active {
            background: var(--amarillo);
            width: 28px;
            border-radius: 5px;
        }

        /* SECCIONES GENERALES */
        .seccion {
            padding: 80px 5%;
            max-width: 1280px;
            margin: 0 auto;
        }

        .seccion-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 50px auto;
        }

        .badge-tag {
            background: rgba(247, 213, 71, 0.1);
            color: #f7d547;
            padding: 6px 14px;
            border-radius: 99px;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            display: inline-block;
            margin-bottom: 12px;
            border: 1px solid rgba(247, 213, 71, 0.25);
        }

        .seccion h2 {
            margin: 0;
            font-size: 2.2rem;
            letter-spacing: -0.02em;
            color: var(--texto-claro);
            font-weight: 800;
        }

        .seccion p.lead {
            margin: 14px 0 0 0;
            color: var(--texto-muted);
            font-size: 1.05rem;
            line-height: 1.6;
        }

        .scroll-reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 650ms ease var(--reveal-delay, 0ms), transform 650ms ease var(--reveal-delay, 0ms);
        }

        .scroll-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .hero-slide.active .hero-content { animation: none; }
        }

        /* PRODUCTOS DESTACADOS */
        .cards {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .card {
            background: #f7d547;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #e5c338;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            color: #000000;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(247, 213, 71, 0.3);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: #ffffff;
        }

        .card-content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .card-content strong { 
            font-size: 1rem; 
            color: #000000; 
            font-weight: 700;
        }

        .card-content p { 
            margin: 0; 
            color: #27272a; 
            line-height: 1.5; 
            font-size: 0.9rem; 
            flex-grow: 1;
        }

        /* CATEGORÍAS */
        .grid-categorias {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 24px;
        }

        .tarjeta-categoria {
            background: #f7d547;
            border-radius: 16px;
            padding: 30px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: all 0.2s ease;
            border: 1px solid #e5c338;
            color: #000000;
        }

        .tarjeta-categoria:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(247, 213, 71, 0.3);
        }

        .icono-wrapper {
            width: 56px;
            height: 56px;
            background: #000000;
            border-radius: 12px;
            display: grid;
            place-items: center;
            margin-bottom: 18px;
            color: #f7d547;
        }

        .icono-wrapper svg { width: 26px; height: 26px; }

        .tarjeta-categoria h3 {
            font-size: 1rem;
            font-weight: 700;
            margin: 0 0 8px 0;
            color: #000000;
        }

        .tarjeta-categoria p {
            font-size: 0.85rem;
            color: #27272a;
            margin: 0 0 20px 0;
            line-height: 1.5;
            flex-grow: 1;
        }

        .badge-productos {
            background: #000000;
            color: #f7d547;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 6px;
            transition: background 0.2s ease;
        }

        .tarjeta-categoria:hover .badge-productos {
            background: #27272a;
        }

        /* =========================================================
           NUEVA BARRA DE BENEFICIOS Y VENTAJAS (ENTRE SECCIONES)
           ========================================================= */
        .features-bar-section {
            background: #ffffff;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid #e2e8f0;
            padding: 24px 2%;
        }

        .features-container {
            max-width: 1380px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 12px 20px;
            border-right: 1px solid #e2e8f0;
        }

        .feature-item:last-child {
            border-right: none;
        }

        .feature-icon-box {
            width: 52px;
            height: 52px;
            background: #fef08a; /* Fondo suave amarillo */
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #854d0e;
        }

        .feature-icon-box svg {
            width: 26px;
            height: 26px;
        }

        .feature-text h4 {
            margin: 0 0 3px 0;
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.2;
        }

        .feature-text p {
            margin: 0;
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.3;
        }

        /* SECCIÓN MARCAS Y SERVICIOS CON FONDO AMARILLO */
        .section-highlight {
            background: #f7d547; 
            color: #000000; 
            border-top: 1px solid #e5c338;
            border-bottom: 1px solid #e5c338;
            padding: 80px 5%;
        }

        .section-highlight .badge-tag {
            background: rgba(0, 0, 0, 0.08);
            color: #000000;
            border-color: rgba(0, 0, 0, 0.2);
        }

        .section-highlight h2 {
            color: #000000;
        }

        .section-highlight p.lead {
            color: #27272a;
        }

        .brands-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 16px;
            max-width: 1280px;
            margin: 0 auto;
        }

        .brand-box {
            background: #ffffff; 
            border: 1px solid #e5c338;
            border-radius: 10px;
            height: 80px;
            width: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            transition: all 0.2s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .brand-box:hover {
            transform: translateY(-2px);
            border-color: #000000;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .brand-box img {
            max-height: 42px;
            max-width: 100%;
            object-fit: contain;
            transition: transform 0.2s ease;
        }

        .brand-box:hover img {
            transform: scale(1.05);
        }

        /* BARRA DE MÉTODOS DE PAGO Y FACTURACIÓN */
        .payment-bar-section {
            background: #17191d;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            border-bottom: 1px solid rgba(0, 0, 0, 0.8);
            padding: 28px 5%;
        }

        .payment-container {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .payment-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .payment-info-icon {
            width: 48px;
            height: 48px;
            background: rgba(247, 213, 71, 0.1);
            border: 1px solid rgba(247, 213, 71, 0.3);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--amarillo);
            flex-shrink: 0;
        }

        .payment-info-text strong {
            display: block;
            font-size: 0.95rem;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .payment-info-text span {
            font-size: 0.85rem;
            color: var(--texto-muted);
        }

        .payment-methods {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .payment-card-badge {
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            padding: 6px 14px;
            height: 54px;
            min-width: 85px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.4);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .payment-card-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(247, 213, 71, 0.3);
        }

        .payment-card-badge img {
            max-height: 38px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .cards, .grid-categorias { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .features-container { grid-template-columns: repeat(2, 1fr); }
            .feature-item { border-right: none; border-bottom: 1px solid #e2e8f0; }
            .feature-item:nth-child(3), .feature-item:nth-child(4) { border-bottom: none; }
            .hero-slider { height: 60vh; min-height: 450px; }
        }

        @media (max-width: 768px) {
            .cards, .grid-categorias { grid-template-columns: 1fr; }
            .features-container { grid-template-columns: 1fr; }
            .feature-item { border-bottom: 1px solid #e2e8f0; }
            .feature-item:last-child { border-bottom: none; }
            .hero-slider { height: 50vh; min-height: 400px; }
            .slider-nav-btn { width: 40px; height: 40px; }
            .slider-nav-btn.prev { left: 10px; }
            .slider-nav-btn.next { right: 10px; }
            .brand-box { width: 120px; }
            .payment-container {
                flex-direction: column;
                text-align: center;
                justify-content: center;
            }
            .payment-info {
                flex-direction: column;
                text-align: center;
            }
            .payment-methods {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    @include('footer.top')

    <!-- SECCIÓN DE BANNER HERO DINÁMICO IMPRESIONANTE -->
    <section class="hero-banner-section" id="inicio">
        <div class="hero-slider">
            @forelse($banners as $index => $banner)
                <div class="hero-slide {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset($banner->imagen) }}" alt="{{ $banner->titulo }}" class="hero-bg-img">
                    <div class="hero-overlay"></div>
                    
                    <div class="hero-container">
                        <div class="hero-content">
                            <h1>{!! nl2br(e($banner->titulo)) !!}</h1>
                            @if($banner->subtitulo)
                                <p>{{ $banner->subtitulo }}</p>
                            @endif
                            @if($banner->enlace)
                                <a href="{{ $banner->enlace }}" class="btn-hero">Conocer más &rarr;</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="hero-slide active">
                    <img src="{{ asset('img/logo_maquitec.jpg') }}" alt="Maquitec Banner" class="hero-bg-img">
                    <div class="hero-overlay"></div>
                    
                    <div class="hero-container">
                        <div class="hero-content">
                            <h1>POTENCIA Y PROTECCIÓN <span>EN MAQUINARIA Y LOGÍSTICA</span></h1>
                            <p>Equipos de alto rendimiento, repuestos originales y soporte técnico especializado para garantizar la operatividad de su empresa.</p>
                            <a href="/productos" class="btn-hero">Ver catálogo completo &rarr;</a>
                        </div>
                    </div>
                </div>
            @endforelse

            <!-- Controles de Navegación Lateral -->
            @if(isset($banners) && $banners->count() > 1)
                <button class="slider-nav-btn prev" onclick="moveSlide(-1)">&larr;</button>
                <button class="slider-nav-btn next" onclick="moveSlide(1)">&rarr;</button>

                <!-- Puntos de Navegación -->
                <div class="slider-controls">
                    @foreach($banners as $index => $banner)
                        <span class="dot {{ $index === 0 ? 'active' : '' }}" onclick="currentSlide({{ $index }})"></span>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- PRODUCTOS DESTACADOS -->
    <section class="seccion" id="productos">
        <div class="seccion-header">
            <span class="badge-tag">Catálogo Selecto</span>
            <h2>Nuestros productos destacados</h2>
            <p class="lead">Equipamiento robusto y de alto rendimiento diseñado para resistir las exigencias del sector industrial y pesado.</p>
        </div>

        <div class="cards">
            @forelse($productosDestacados as $producto)
                <article class="card">
                    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
                    <div class="card-content">
                        <strong>{{ $producto->nombre }}</strong>
                        <p>{{ Str::limit($producto->descripcion, 75) }}</p>
                    </div>
                </article>
            @empty
                <div style="grid-column: span 4; text-align: center; padding: 40px; color: var(--texto-muted); background: rgba(0,0,0,0.5); border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                    <p>Pronto agregaremos productos destacados a esta sección.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- SECCIÓN DE CATEGORÍAS -->
    <section class="seccion" style="padding-top: 0;">
        <div class="seccion-header">
            <span class="badge-tag">Especialidades</span>
            <h2>Nuestras Categorías</h2>
            <p class="lead">Encuentra los componentes, refacciones y maquinarias exactas para tu flota.</p>
        </div>

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

    <!-- =========================================================
         BARRA DE BENEFICIOS Y VENTAJAS AGREGADA AQUÍ
         ========================================================= -->
    <section class="features-bar-section">
        <div class="features-container">
            <!-- Delivery -->
            <div class="feature-item">
                <div class="feature-icon-box">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                </div>
                <div class="feature-text">
                    <h4>Delivery a todo el Perú</h4>
                    <p>Lima 24h · Provincias 48–72h</p>
                </div>
            </div>

            <!-- Garantía -->
            <div class="feature-item">
                <div class="feature-icon-box">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <div class="feature-text">
                    <h4>Garantía Oficial</h4>
                    <p>Todos los productos certificados</p>
                </div>
            </div>

            <!-- Soporte Técnico -->
            <div class="feature-item">
                <div class="feature-icon-box">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div class="feature-text">
                    <h4>Soporte Técnico 24/7</h4>
                    <p>Asesoría especializada gratis</p>
                </div>
            </div>

            <!-- Medios de Pago -->
            <div class="feature-item">
                <div class="feature-icon-box">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="feature-text">
                    <h4>Yape · Plin · Tarjeta</h4>
                    <p>6 métodos de pago disponibles</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN MARCAS Y SERVICIOS CON FONDO AMARILLO -->
    <section class="section-highlight" id="servicios">
        <div style="max-width: 1280px; margin: 0 auto;">
            <div class="seccion-header" style="margin-bottom: 30px;">
                <span class="badge-tag">Respaldo Global</span>
                <h2>Servicios y Marcas Autorizadas</h2>
                <p class="lead">Brindamos soporte completo, repuestos y mantenimiento especializado para las marcas líderes del mercado logístico.</p>
            </div>

            <div style="margin-bottom: 16px; text-align: center;">
                <h3 style="font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em; color: #1e293b; font-weight: 700;">Marcas de Montacargas y Equipos Logísticos:</h3>
            </div>

            <div class="brands-grid">
                <div class="brand-box"><img src="{{ asset('img/marcas/toyota.jpg') }}" alt="Toyota"></div>
                <div class="brand-box"><img src="{{ asset('img/marcas/komatsu.jpg') }}" alt="Komatsu"></div>
                <div class="brand-box"><img src="{{ asset('img/marcas/hyster.jpg') }}" alt="Hyster"></div>
                <div class="brand-box"><img src="{{ asset('img/marcas/caterpillar.jpg') }}" alt="Caterpillar"></div>
                <div class="brand-box"><img src="{{ asset('img/marcas/yale.jpg') }}" alt="Yale"></div>
                <div class="brand-box"><img src="{{ asset('img/marcas/tcm.jpg') }}" alt="TCM"></div>
                <div class="brand-box"><img src="{{ asset('img/marcas/hyundai.jpg') }}" alt="Hyundai"></div>
                <div class="brand-box"><img src="{{ asset('img/marcas/hangcha.jpg') }}" alt="Hangcha"></div>
                <div class="brand-box"><img src="{{ asset('img/marcas/heli.jpg') }}" alt="Heli"></div>
                <div class="brand-box"><img src="{{ asset('img/marcas/crown.jpg') }}" alt="Crown"></div>
            </div>
        </div>
    </section>

    <!-- BARRA DE MEDIOS DE PAGO Y FACTURACIÓN -->
    <section class="payment-bar-section">
        <div class="payment-container">
            <div class="payment-info">
                <div class="payment-info-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="payment-info-text">
                    <strong>MEDIOS DE PAGO Y FACTURACIÓN</strong>
                    <span>Aceptamos transferencias corporativas y tarjetas de crédito/débito en Soles y Dólares.</span>
                </div>
            </div>

            <div class="payment-methods">
                <div class="payment-card-badge" title="Visa">
                    <img src="{{ asset('img/metodos_pago/visa.jpg') }}" alt="Visa">
                </div>
                <div class="payment-card-badge" title="Yape">
                    <img src="{{ asset('img/metodos_pago/yape.jpg') }}" alt="Yape">
                </div>
                <div class="payment-card-badge" title="Plin">
                    <img src="{{ asset('img/metodos_pago/plin.jpg') }}" alt="Plin">
                </div>
                <div class="payment-card-badge" title="Transferencia Bancaria">
                    <img src="{{ asset('img/metodos_pago/transferencia-bancaria.jpg') }}" alt="Transferencia Bancaria">
                </div>
            </div>
        </div>
    </section>

    @include('footer.bottom')

    <!-- Script para el carrusel de banners -->
    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.dot');

        function showSlide(index) {
            if (slides.length === 0) return;
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            slideIndex = (index + slides.length) % slides.length;
            slides[slideIndex].classList.add('active');
            if(dots.length > 0) dots[slideIndex].classList.add('active');
        }

        function currentSlide(index) {
            showSlide(index);
        }

        function moveSlide(step) {
            showSlide(slideIndex + step);
        }

        if (slides.length > 1) {
            setInterval(() => {
                showSlide(slideIndex + 1);
            }, 6000);
        }

        const revealElements = document.querySelectorAll(
            '.seccion-header, .card, .tarjeta-categoria, .feature-item, .section-highlight .brand-box, .payment-info, .payment-card-badge'
        );
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if ('IntersectionObserver' in window && !prefersReducedMotion) {
            revealElements.forEach((element) => {
                const siblingIndex = Array.prototype.indexOf.call(element.parentElement.children, element);
                element.style.setProperty('--reveal-delay', `${Math.min(siblingIndex, 5) * 80}ms`);
                element.classList.add('scroll-reveal');
            });

            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

            revealElements.forEach((element) => revealObserver.observe(element));
        }
    </script>
</body>
</html>