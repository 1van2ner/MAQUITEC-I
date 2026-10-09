<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Especializados - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #f7d547;
            --amarillo-hover: #e5c338;
            --amarillo-oscuro: #caaa2b;
            --negro: #000000;
            --negro-card: rgba(255, 255, 255, 0.03);
            --borde-card: rgba(255, 255, 255, 0.08);
            --texto-claro: #ffffff;
            --texto-muted: #a1a1aa;
            --whatsapp: #25d366;
            --whatsapp-hover: #20ba5a;
        }

        * { box-sizing: border-box; }

        /* FONDO ESTILO METAL CEPILLADO OSCURO */
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* BANNER HERO IMPONENTE */
        .hero {
            display: grid;
            place-items: center;
            min-height: 420px;
            padding: 60px 20px;
            text-align: center;
            color: var(--texto-claro);
            background: linear-gradient(180deg, rgba(18, 19, 22, 0.82), rgba(18, 19, 22, 0.96)), 
                        url("{{ asset('img/marcas/heli.jpg') }}") center/cover no-repeat;
            border-bottom: 2px solid var(--borde-card);
            position: relative;
        }

        .hero-badge {
            background: rgba(247, 213, 71, 0.12);
            color: var(--amarillo);
            padding: 6px 18px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            display: inline-block;
            margin-bottom: 16px;
            border: 1px solid rgba(247, 213, 71, 0.3);
        }

        .hero h1 { 
            margin: 0; 
            font-size: clamp(2.3rem, 4.8vw, 3.6rem); 
            font-weight: 900;
            letter-spacing: -0.02em; 
            color: var(--texto-claro);
            text-transform: uppercase;
            line-height: 1.1;
        }

        .hero h1 span {
            color: var(--amarillo);
        }

        .hero p { 
            max-width: 820px; 
            margin: 18px auto 0; 
            line-height: 1.7; 
            color: var(--texto-muted); 
            font-size: 1.12rem;
            font-weight: 500;
        }

        /* METRICAS DE IMPACTO EN HERO */
        .hero-metrics {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 35px;
            flex-wrap: wrap;
        }

        .metric-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px 24px;
            border-radius: 14px;
            backdrop-filter: blur(10px);
        }

        .metric-box strong {
            display: block;
            font-size: 1.5rem;
            color: var(--amarillo);
            font-weight: 900;
        }

        .metric-box span {
            font-size: 0.8rem;
            color: var(--texto-muted);
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.04em;
        }

        /* CONTENIDO PRINCIPAL */
        .content { 
            max-width: 1320px; 
            margin: 0 auto; 
            padding: 60px 4% 80px; 
            width: 100%;
        }

        .intro { 
            margin-bottom: 40px; 
            text-align: center; 
        }

        .intro h2 { 
            margin: 0; 
            font-size: 2.3rem; 
            font-weight: 900;
            color: var(--texto-claro);
            text-transform: uppercase;
        }

        .intro p { 
            max-width: 750px; 
            margin: 12px auto 0; 
            color: var(--texto-muted); 
            line-height: 1.7; 
            font-size: 1.08rem;
        }

        /* FILTROS / PESTAÑAS INTERACTIVAS */
        .tabs-container {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 45px;
            flex-wrap: wrap;
        }

        .tab-btn {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--texto-muted);
            padding: 12px 26px;
            border-radius: 30px;
            font-size: 0.92rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.25s ease;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .tab-btn:hover, .tab-btn.is-active {
            background: var(--amarillo);
            color: var(--negro);
            border-color: var(--amarillo);
            box-shadow: 0 6px 18px rgba(247, 213, 71, 0.25);
            transform: translateY(-2px);
        }

        /* GRILLA DE SERVICIOS */
        .service-grid { 
            display: grid; 
            grid-template-columns: repeat(2, 1fr); 
            gap: 32px; 
            align-items: start;
        }

        .service-card {
            position: relative;
            z-index: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 38px;
            background: var(--negro-card);
            border: 1px solid var(--borde-card);
            border-radius: 22px;
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(10px);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            z-index: 2;
            transform: translateY(-8px);
            border-color: var(--amarillo);
            box-shadow: 0 20px 40px rgba(247, 213, 71, 0.18);
        }

        .service-tag {
            background: rgba(247, 213, 71, 0.12);
            color: var(--amarillo);
            padding: 5px 14px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            display: inline-block;
            margin-bottom: 16px;
            border: 1px solid rgba(247, 213, 71, 0.25);
            width: fit-content;
        }

        .service-card h3 { 
            margin: 0 0 14px; 
            font-size: 1.45rem; 
            font-weight: 800;
            color: var(--texto-claro);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .service-card p { 
            margin: 0 0 24px; 
            color: var(--texto-muted); 
            line-height: 1.7; 
            font-size: 0.98rem;
        }

        /* GALERÍA DESPLEGABLE / INTERACTIVA */
        .service-gallery {
            max-height: 0;
            margin: 0;
            overflow: hidden;
            opacity: 0;
            pointer-events: none;
            transition: max-height 0.4s ease, margin 0.4s ease, opacity 0.3s ease;
        }

        .service-gallery-frame {
            position: relative;
            height: 200px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 14px;
            background: #090a0b;
            cursor: grab;
            touch-action: pan-y;
        }

        .service-gallery-frame.is-dragging { cursor: grabbing; }

        .service-gallery-slide {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.35s ease, transform 0.6s ease;
        }

        .service-gallery-slide.is-active { opacity: 1; transform: scale(1.02); }

        .service-gallery-controls {
            position: absolute;
            right: 10px;
            bottom: 10px;
            left: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .service-gallery-dots { display: flex; align-items: center; justify-content: center; gap: 7px; }
        .service-gallery-dot {
            width: 7px;
            height: 7px;
            padding: 0;
            border: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.65);
            cursor: pointer;
            transition: all 0.25s ease;
        }
        .service-gallery-dot.is-active { width: 18px; border-radius: 8px; background: var(--amarillo); }

        .service-card.is-gallery-open .service-gallery {
            max-height: 240px;
            margin: 0 0 24px;
            opacity: 1;
            pointer-events: auto;
        }

        /* BOTÓN WHATSAPP */
        .btn-whatsapp {
            display: inline-flex;
            width: 100%;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 15px 20px;
            background: var(--whatsapp);
            border-radius: 14px;
            color: var(--texto-claro);
            font-weight: 800;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            box-shadow: 0 6px 18px rgba(37, 211, 102, 0.25);
            transition: all 0.25s ease;
            text-decoration: none;
            margin-top: auto;
        }

        .btn-whatsapp:hover { 
            background: var(--whatsapp-hover); 
            transform: translateY(-2px); 
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.38);
        }

        .btn-whatsapp svg { 
            width: 20px; 
            height: 20px; 
            fill: currentColor; 
        }

        /* SECCIÓN HIGHLIGHT / GARANTÍAS OPERATIVAS */
        .highlight { 
            display: grid; 
            grid-template-columns: repeat(2, 1fr); 
            gap: 30px; 
            margin-top: 60px; 
        }

        .highlight-card { 
            padding: 34px; 
            background: rgba(247, 213, 71, 0.04); 
            border-left: 5px solid var(--amarillo); 
            border-radius: 18px; 
            border-top: 1px solid var(--borde-card);
            border-right: 1px solid var(--borde-card);
            border-bottom: 1px solid var(--borde-card);
            backdrop-filter: blur(10px);
            transition: transform 0.25s ease;
        }

        .highlight-card:hover {
            transform: translateY(-4px);
        }

        .highlight-card h3 { 
            margin: 0 0 12px; 
            color: var(--amarillo); 
            font-size: 1.25rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .highlight-card p { 
            margin: 0; 
            color: var(--texto-muted); 
            line-height: 1.7; 
            font-size: 0.98rem;
        }

        /* CALL TO ACTION */
        .cta { 
            display: flex; 
            flex-direction: column;
            align-items: center;
            justify-content: center; 
            margin-top: 70px; 
            text-align: center;
            background: rgba(255, 255, 255, 0.02);
            padding: 50px 30px;
            border-radius: 24px;
            border: 1px dashed rgba(255, 255, 255, 0.12);
        }

        .cta h3 {
            margin: 0 0 10px 0;
            font-size: 1.8rem;
            font-weight: 900;
            color: #ffffff;
            text-transform: uppercase;
        }

        .cta p {
            color: var(--texto-muted);
            margin: 0 0 26px 0;
            max-width: 600px;
            font-size: 1.05rem;
        }

        .btn-productos { 
            padding: 16px 38px; 
            background: var(--amarillo); 
            border: none; 
            border-radius: 14px; 
            color: var(--negro); 
            font-weight: 900; 
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            box-shadow: 0 8px 22px rgba(247, 213, 71, 0.25); 
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .btn-productos:hover { 
            background: var(--amarillo-hover); 
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(247, 213, 71, 0.4);
        }

        .scroll-reveal {
            opacity: 0;
            translate: 0 24px;
            transition: opacity 650ms ease var(--reveal-delay, 0ms), translate 650ms ease var(--reveal-delay, 0ms);
        }

        .scroll-reveal.is-visible {
            opacity: 1;
            translate: 0 0;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 900px) {
            .service-grid, .highlight { 
                grid-template-columns: 1fr; 
            }
            .content { 
                padding: 40px 20px 60px; 
            }
            .hero-metrics {
                gap: 16px;
            }
        }

        @media (hover: none) {
            .service-card:hover { transform: none; }
        }
    </style>
</head>
<body>

    @include('footer.top')

    <!-- BANNER HERO -->
    <section class="hero">
        <div>
            <span class="hero-badge">Soporte Técnico de Nivel Industrial</span>
            <h1>Servicios Especializados para <span>Maquinaria Pesada</span></h1>
            <p>Mantenimiento preventivo, diagnóstico avanzado, reparación de sistemas hidráulicos y soluciones integrales para garantizar la operatividad continua de su flota.</p>

            <div class="hero-metrics">
                <div class="metric-box">
                    <strong>+15 Años</strong>
                    <span>De Experiencia Técnica</span>
                </div>
                <div class="metric-box">
                    <strong>+500</strong>
                    <span>Intervenciones Exitosas</span>
                </div>
                <div class="metric-box">
                    <strong>100%</strong>
                    <span>Garantía de Servicio</span>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="intro">
            <h2>Especialidades Operativas</h2>
            <p>Atendemos requerimientos críticos en montacargas, grúas y maquinaria de logística pesada con respuesta rápida en taller o en sitio.</p>
        </div>

        <!-- PESTAÑAS DE FILTRADO INTERACTIVO -->
        <div class="tabs-container">
            <button class="tab-btn is-active" data-filter="all">Todos los Servicios</button>
            <button class="tab-btn" data-filter="core">Mantenimiento Core</button>
            <button class="tab-btn" data-filter="soporte">Soporte y Asesoría</button>
        </div>

        @php
            $serviceGalleryImages = [
                ['src' => asset('img/montacarga_reparcion.jpg'), 'alt' => 'Montacargas en proceso de reparación técnica'],
                ['src' => asset('img/montacarga_reparcion2.jpg'), 'alt' => 'Mantenimiento especializado de maquinaria'],
            ];
        @endphp

        <!-- GRILLA DE SERVICIOS -->
        <div class="service-grid">
            <article class="service-card" data-category="soporte">
                <div>
                    <span class="service-tag">Puesta en Marcha</span>
                    <h3>⚙️ Instalación de Equipos</h3>
                    <p>Colocación, calibración y configuración técnica en sitio de maquinaria pesada y logística para asegurar una integración limpia, segura y productiva.</p>
                </div>
                <div class="service-gallery" role="region" aria-label="Galería de instalación de equipos" data-service-gallery>
                    <div class="service-gallery-frame">
                        @foreach($serviceGalleryImages as $imageIndex =>$image)
                            <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="service-gallery-slide {{ $imageIndex === 0 ? 'is-active' : '' }}" aria-hidden="{{ $imageIndex === 0 ? 'false' : 'true' }}">
                        @endforeach
                        <div class="service-gallery-controls">
                            <div class="service-gallery-dots">
                                @foreach($serviceGalleryImages as $imageIndex =>$image)
                                    <button class="service-gallery-dot {{ $imageIndex === 0 ? 'is-active' : '' }}" type="button" data-gallery-dot="{{ $imageIndex }}" aria-label="Mostrar imagen {{ $imageIndex + 1 }}" aria-pressed="{{ $imageIndex === 0 ? 'true' : 'false' }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Instalación%20de%20Equipos" target="_blank" rel="noopener" class="btn-whatsapp">
                    <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Consultar por WhatsApp
                </a>
            </article>

            <article class="service-card" data-category="core">
                <div>
                    <span class="service-tag">Prevención de Fallas</span>
                    <h3>🛠️ Mantenimiento Preventivo</h3>
                    <p>Planes programados de inspección, cambio de fluidos (aceites, refrigerantes, líquidos de freno) y filtros para maximizar la vida útil y prevenir paradas imprevistas.</p>
                </div>
                <div class="service-gallery" role="region" aria-label="Galería de mantenimiento preventivo" data-service-gallery>
                    <div class="service-gallery-frame">
                        @foreach($serviceGalleryImages as $imageIndex =>$image)
                            <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="service-gallery-slide {{ $imageIndex === 0 ? 'is-active' : '' }}" aria-hidden="{{ $imageIndex === 0 ? 'false' : 'true' }}">
                        @endforeach
                        <div class="service-gallery-controls">
                            <div class="service-gallery-dots">
                                @foreach($serviceGalleryImages as $imageIndex =>$image)
                                    <button class="service-gallery-dot {{ $imageIndex === 0 ? 'is-active' : '' }}" type="button" data-gallery-dot="{{ $imageIndex }}" aria-label="Mostrar imagen {{ $imageIndex + 1 }}" aria-pressed="{{ $imageIndex === 0 ? 'true' : 'false' }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Mantenimiento%20Preventivo" target="_blank" rel="noopener" class="btn-whatsapp">
                    <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Consultar por WhatsApp
                </a>
            </article>

            <article class="service-card" data-category="core">
                <div>
                    <span class="service-tag">Respuesta Inmediata</span>
                    <h3>⚡ Reparación Rápida & Correctiva</h3>
                    <p>Atención de urgencia ante averías críticas. Diagnóstico especializado de motor, sistema hidráulico y transmisión para restaurar sus operaciones sin pérdidas de tiempo.</p>
                </div>
                <div class="service-gallery" role="region" aria-label="Galería de reparación rápida" data-service-gallery>
                    <div class="service-gallery-frame">
                        @foreach($serviceGalleryImages as $imageIndex =>$image)
                            <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="service-gallery-slide {{ $imageIndex === 0 ? 'is-active' : '' }}" aria-hidden="{{ $imageIndex === 0 ? 'false' : 'true' }}">
                        @endforeach
                        <div class="service-gallery-controls">
                            <div class="service-gallery-dots">
                                @foreach($serviceGalleryImages as $imageIndex =>$image)
                                    <button class="service-gallery-dot {{ $imageIndex === 0 ? 'is-active' : '' }}" type="button" data-gallery-dot="{{ $imageIndex }}" aria-label="Mostrar imagen {{ $imageIndex + 1 }}" aria-pressed="{{ $imageIndex === 0 ? 'true' : 'false' }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Reparación%20Rápida" target="_blank" rel="noopener" class="btn-whatsapp">
                    <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Consultar por WhatsApp
                </a>
            </article>

            <article class="service-card" data-category="soporte">
                <div>
                    <span class="service-tag">Optimización Operativa</span>
                    <h3>📋 Asesoría Técnica Especializada</h3>
                    <p>Evaluación integral del estado de su flota, recomendación de insumos correctos (fluidos, repuestos originales) y asesoramiento para reducir costos operativos.</p>
                </div>
                <div class="service-gallery" role="region" aria-label="Galería de asesoría técnica" data-service-gallery>
                    <div class="service-gallery-frame">
                        @foreach($serviceGalleryImages as $imageIndex =>$image)
                            <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="service-gallery-slide {{ $imageIndex === 0 ? 'is-active' : '' }}" aria-hidden="{{ $imageIndex === 0 ? 'false' : 'true' }}">
                        @endforeach
                        <div class="service-gallery-controls">
                            <div class="service-gallery-dots">
                                @foreach($serviceGalleryImages as $imageIndex =>$image)
                                    <button class="service-gallery-dot {{ $imageIndex === 0 ? 'is-active' : '' }}" type="button" data-gallery-dot="{{ $imageIndex }}" aria-label="Mostrar imagen {{ $imageIndex + 1 }}" aria-pressed="{{ $imageIndex === 0 ? 'true' : 'false' }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Asesoría%20Técnica" target="_blank" rel="noopener" class="btn-whatsapp">
                    <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Consultar por WhatsApp
                </a>
            </article>
        </div>

        <!-- HIGHLIGHTS / RESPALDO OPERATIVO -->
        <div class="highlight">
            <div class="highlight-card">
                <h3>Respaldo Multimarca</h3>
                <p>Mantenimiento y soporte técnico garantizado para las marcas líderes en logística: Toyota, Komatsu, Hyster, Caterpillar, Yale, TCM, Hyundai y más.</p>
            </div>
            <div class="highlight-card">
                <h3>Suministro de Repuestos & Fluidos</h3>
                <p>Complementamos el servicio técnico con venta directa de aceites de motor, líquidos de freno, filtros y componentes genuinos para su maquinaria.</p>
            </div>
        </div>

        <!-- CALL TO ACTION (CTA) -->
        <div class="cta">
            <h3>¿Buscas repuestos o fluidos específicos?</h3>
            <p>Explora nuestro catálogo completo de accesorios, lubricantes e insumos originales para equipos de carga pesada.</p>
            <a href="{{ url('/productos') }}" class="btn-productos">Ver catálogo de productos</a>
        </div>
    </section>

    @include('footer.bottom')

    <script>
        // FILTRADO DE SERVICIOS POR PESTAÑAS (TABS)
        const tabBtns = document.querySelectorAll('.tab-btn');
        const serviceCards = document.querySelectorAll('.service-card');

        const openServiceGallery = selectedCard => {
            serviceCards.forEach(card => {
                card.classList.toggle('is-gallery-open', card === selectedCard);
            });
        };

        const closeServiceGallery = card => {
            if (!card.matches(':hover') && !card.contains(document.activeElement)) {
                card.classList.remove('is-gallery-open');
            }
        };

        serviceCards.forEach(card => {
            card.addEventListener('pointerenter', event => {
                if (event.pointerType === 'mouse') openServiceGallery(card);
            });

            card.addEventListener('pointerleave', event => {
                if (event.pointerType === 'mouse') closeServiceGallery(card);
            });

            card.addEventListener('pointerdown', event => {
                if (event.pointerType === 'touch') openServiceGallery(card);
            });

            card.addEventListener('focusin', () => openServiceGallery(card));
            card.addEventListener('focusout', event => {
                if (!card.contains(event.relatedTarget)) closeServiceGallery(card);
            });
        });

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                tabBtns.forEach(b => b.classList.remove('is-active'));
                btn.classList.add('is-active');

                const filter = btn.getAttribute('data-filter');

                serviceCards.forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-category') === filter) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // GALERÍA DE IMÁGENES DENTRO DE LAS TARJETAS
        const serviceGalleries = document.querySelectorAll('[data-service-gallery]');
        const reduceGalleryMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        serviceGalleries.forEach(gallery => {
            const card = gallery.closest('.service-card');
            const slides = [...gallery.querySelectorAll('.service-gallery-slide')];
            const dots = [...gallery.querySelectorAll('[data-gallery-dot]')];
            let activeIndex = 0;
            let rotationTimer = null;

            const showSlide = index => {
                activeIndex = (index + slides.length) % slides.length;
                slides.forEach((slide, slideIndex) => {
                    const isActive = slideIndex === activeIndex;
                    slide.classList.toggle('is-active', isActive);
                    slide.setAttribute('aria-hidden', String(!isActive));
                    dots[slideIndex].classList.toggle('is-active', isActive);
                    dots[slideIndex].setAttribute('aria-pressed', String(isActive));
                });
            };

            const stopRotation = () => {
                clearInterval(rotationTimer);
                rotationTimer = null;
            };

            const startRotation = () => {
                if (reduceGalleryMotion || rotationTimer || slides.length < 2) return;
                rotationTimer = setInterval(() => showSlide(activeIndex + 1), 3500);
            };

            dots.forEach((dot, index) => dot.addEventListener('click', () => showSlide(index)));

            const frame = gallery.querySelector('.service-gallery-frame');
            let dragStart = null;

            frame.addEventListener('pointerdown', event => {
                if (!event.isPrimary || (event.pointerType === 'mouse' && event.button !== 0)) return;
                dragStart = { x: event.clientX, y: event.clientY, pointerId: event.pointerId };
                frame.setPointerCapture(event.pointerId);
                frame.classList.add('is-dragging');
            });

            frame.addEventListener('pointerup', event => {
                if (!dragStart || dragStart.pointerId !== event.pointerId) return;
                const deltaX = event.clientX - dragStart.x;
                const deltaY = event.clientY - dragStart.y;
                if (Math.abs(deltaX) >= 40 && Math.abs(deltaX) > Math.abs(deltaY)) {
                    showSlide(activeIndex + (deltaX < 0 ? 1 : -1));
                }
                dragStart = null;
                frame.classList.remove('is-dragging');
            });

            frame.addEventListener('pointercancel', () => {
                dragStart = null;
                frame.classList.remove('is-dragging');
            });

            card.addEventListener('pointerenter', event => {
                if (event.pointerType === 'mouse') startRotation();
            });
            card.addEventListener('pointerleave', stopRotation);
            card.addEventListener('focusin', startRotation);
            card.addEventListener('focusout', event => {
                if (!card.contains(event.relatedTarget)) stopRotation();
            });
        });

        // ANIMACIONES DE ENTRADA (SCROLL REVEAL)
        const revealElements = document.querySelectorAll('.intro, .service-card, .highlight-card, .cta');
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