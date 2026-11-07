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
            min-height: 360px;
            padding: 60px 20px;
            text-align: center;
            color: var(--texto-claro);
            background: radial-gradient(ellipse at 50% 45%, #28231a 0%, #111216 60%, #090a0d 100%);
            border-bottom: 2px solid var(--borde-card);
            position: relative;
            overflow: hidden;
        }

        .micro-slats {
            position: absolute;
            inset: 0;
            z-index: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(10, 10, 12, 0.18) 0%, rgba(10, 10, 12, 0.58) 78%, rgba(10, 10, 12, 0.72) 100%);
            z-index: 1;
            pointer-events: none;
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
            color: rgba(255, 255, 255, 0.92); 
            font-size: 1.12rem;
            font-weight: 500;
        }

        /* CONTENIDO PRINCIPAL */
        .content { 
            max-width: 1440px; 
            margin: 0 auto; 
            padding: 70px 3% 90px; 
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
            gap: 26px; 
            align-items: stretch;
        }

        .service-card {
            position: relative;
            z-index: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 34px;
            background:
                linear-gradient(145deg, rgba(255,255,255,0.055), rgba(255,255,255,0.018)),
                var(--negro-card);
            border: 1px solid var(--borde-card);
            border-radius: 22px;
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.35);
            overflow: hidden;
            backdrop-filter: blur(10px);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 34px;
            width: 72px;
            height: 3px;
            background: var(--amarillo);
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
            font-size: clamp(1.55rem, 2vw, 1.85rem);
            font-weight: 800;
            color: var(--texto-claro);
            display: flex;
            align-items: center;
            gap: 12px;
            line-height: 1.25;
            letter-spacing: -0.02em;
        }

        .service-card p { 
            margin: 0 0 24px; 
            color: var(--texto-muted); 
            line-height: 1.7; 
            font-size: 1.05rem;
        }

        .service-details {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 8px;
            margin: 4px 0 22px;
        }

        .service-details span {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #dedede;
            text-align: center;
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .service-photo-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            margin: 4px 0 22px;
        }

        .service-photo-grid figure {
            min-width: 0;
            height: 260px;
            margin: 0;
            overflow: hidden;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(0, 0, 0, 0.35);
            position: relative;
        }

        .service-photo-grid img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.45s ease, filter 0.45s ease;
        }

        .service-photo-grid figure::after {
            content: "";
            position: absolute;
            inset: 48% 0 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.78));
            pointer-events: none;
        }

        .service-photo-grid figcaption {
            position: absolute;
            z-index: 2;
            left: 12px;
            right: 12px;
            bottom: 10px;
            color: #fff;
            font-size: 0.76rem;
            font-weight: 900;
            letter-spacing: 0.055em;
            text-transform: uppercase;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.85);
        }

        .service-photo-grid .portrait img {
            object-position: center 42%;
        }

        .service-card:hover .service-photo-grid img {
            transform: scale(1.025);
            filter: brightness(1.08);
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
        }

        @media (max-width: 620px) {
            .service-card {
                padding: 28px 22px;
            }

            .service-card::before {
                left: 22px;
            }

            .service-card h3 {
                font-size: 1.45rem;
            }

            .service-card p {
                font-size: 1rem;
            }

            .service-photo-grid {
                grid-template-columns: 1fr;
            }

            .service-photo-grid figure {
                height: 230px;
            }

            .service-details {
                grid-template-columns: 1fr;
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
        <canvas class="micro-slats" aria-hidden="true"></canvas>
        <div class="hero-content">
            <span class="hero-badge">Soporte Técnico de Nivel Industrial</span>
            <h1>Servicios Especializados para <span>Maquinaria Pesada</span></h1>
            <p>Mantenimiento preventivo, diagnóstico avanzado, reparación de sistemas hidráulicos y soluciones integrales para garantizar la operatividad continua de su flota.</p>

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

        <!-- GRILLA DE SERVICIOS -->
        <div class="service-grid">
            <article class="service-card" data-category="soporte">
                <div>
                    <span class="service-tag">Puesta en Marcha</span>
                    <h3>Instalación de accesorios de equipos</h3>
                    <p>Colocación, calibración y configuración técnica de accesorios para maquinaria pesada y logística para asegurar una integración limpia, segura y productiva.</p>
                </div>
                <div class="service-photo-grid" aria-label="Modelos de montacargas">
                    <figure>
                        <img src="{{ asset('img/servicios/montacarga_modelo_2.jpg') }}" alt="Instalación de faros" loading="lazy">
                        <figcaption>Instalación de faros</figcaption>
                    </figure>
                    <figure>
                        <img src="{{ asset('img/servicios/montacarga_modelo_3.jpg') }}" alt="Instalación de panel de control" loading="lazy">
                        <figcaption>Instalación de panel de control</figcaption>
                    </figure>
                </div>  
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Instalación%20de%20accesorios%20de%20equipos" target="_blank" rel="noopener" class="btn-whatsapp" data-service-interaction data-service-name="Instalación de accesorios de equipos">
                    <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Consultar por WhatsApp
                </a>
            </article>

            <article class="service-card" data-category="core">
                <div>
                    <span class="service-tag">Prevención de Fallas</span>
                    <h3>Mantenimiento y diagnóstico</h3>
                    <p>Planes programados de inspección, cambio de fluidos (aceites, refrigerantes, líquidos de freno) y filtros para maximizar la vida útil y prevenir paradas imprevistas.</p>
                </div>
                <div class="service-photo-grid" aria-label="Ejemplos de mantenimiento preventivo">
                    <figure>
                        <img src="{{ asset('img/servicios/revision.jpg') }}" alt="Revisión técnica de mantenimiento preventivo" loading="lazy">
                        <figcaption>Inspeccion del cableado</figcaption>
                    </figure>
                    <figure>
                        <img src="{{ asset('img/servicios/cigüeñal.jpg') }}" alt="Inspección de cigüeñal" loading="lazy">
                        <figcaption>Inspección de cigüeñal</figcaption>
                    </figure>
                </div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Mantenimiento%20y%20diagn%C3%B3stico" target="_blank" rel="noopener" class="btn-whatsapp" data-service-interaction data-service-name="Mantenimiento y diagnóstico">
                    <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Consultar por WhatsApp
                </a>
            </article>

            <article class="service-card" data-category="core">
                <div>
                    <span class="service-tag">Respuesta Inmediata</span>
                    <h3>Reparación y overhaul</h3>
                    <p>Atención de urgencia ante averías críticas. Diagnóstico especializado de motor, sistema hidráulico y transmisión para restaurar sus operaciones sin pérdidas de tiempo.</p>
                </div>
                <div class="service-photo-grid" aria-label="Ejemplos de reparación y diagnóstico">
                    <figure>
                        <img src="{{ asset('img/servicios/partes_motor.jpg') }}" alt="Partes internas de motor" loading="lazy">
                        <figcaption>Componentes del motor</figcaption>
                    </figure>
                    <figure class="portrait">
                        <img src="{{ asset('img/servicios/partes_motor_2.jpg') }}" alt="Componentes de motor durante diagnóstico" loading="lazy">
                        <figcaption>Diagnóstico de motor</figcaption>
                    </figure>
                </div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Reparaci%C3%B3n%20y%20overhaul" target="_blank" rel="noopener" class="btn-whatsapp" data-service-interaction data-service-name="Reparación y overhaul">
                    <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Consultar por WhatsApp
                </a>
            </article>

            <article class="service-card" data-category="soporte">
                <div>
                    <span class="service-tag">Optimización Operativa</span>
                    <h3>Asesoría Técnica Especializada</h3>
                    <p>Evaluación integral del estado de su flota, recomendación de insumos correctos (fluidos, repuestos originales) y asesoramiento para reducir costos operativos.</p>
                </div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Asesoría%20Técnica" target="_blank" rel="noopener" class="btn-whatsapp" data-service-interaction data-service-name="Asesoría Técnica Especializada">
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
        (() => {
            const canvas = document.querySelector('.hero .micro-slats');
            const hero = canvas?.closest('.hero');
            if (!canvas || !hero) return;

            const context = canvas.getContext('2d');
            if (!context) return;

            const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            let width = 0;
            let height = 0;
            let animationFrame = 0;
            let isVisible = false;
            let isPageVisible = !document.hidden;
            const pointer = { x: 0, y: 0, active: false };

            function resize() {
                const bounds = canvas.getBoundingClientRect();
                const scale = Math.min(window.devicePixelRatio || 1, 2);
                width = bounds.width;
                height = bounds.height;
                canvas.width = Math.round(width * scale);
                canvas.height = Math.round(height * scale);
                context.setTransform(scale, 0, 0, scale, 0, 0);
            }

            function draw(time = 0) {
                context.clearRect(0, 0, width, height);

                const background = context.createLinearGradient(0, 0, width, height);
                background.addColorStop(0, '#17151a');
                background.addColorStop(0.52, '#211e19');
                background.addColorStop(1, '#090a0d');
                context.fillStyle = background;
                context.fillRect(0, 0, width, height);

                const slatWidth = 9;
                const slatHeight = 19;
                const gapX = 5;
                const gapY = 9;
                const stepX = slatWidth + gapX;
                const stepY = slatHeight + gapY;
                const phase = reducedMotion ? 0 : time * 0.001;

                for (let row = -1; row < Math.ceil(height / stepY) + 1; row++) {
                    for (let column = -1; column < Math.ceil(width / stepX) + 1; column++) {
                        const wave = Math.sin(column * 0.22 + row * 0.3 - phase) * 0.5
                            + Math.cos(column * 0.09 + row * 0.18 + phase * 0.65) * 0.5;
                        const baseX = column * stepX;
                        const baseY = row * stepY + wave * 6;
                        const distance = pointer.active ? Math.hypot(baseX - pointer.x, baseY - pointer.y) : Infinity;
                        const influence = Math.max(0, 1 - distance / 140);
                        const x = baseX + (pointer.x - baseX) * influence * 0.12;
                        const y = baseY + (pointer.y - baseY) * influence * 0.12;
                        const alpha = Math.min(0.9, 0.14 + (wave + 1) * 0.17 + influence * 0.42);

                        context.beginPath();
                        context.roundRect(x, y, slatWidth, slatHeight, 5);
                        context.fillStyle = influence > 0.25
                            ? `rgba(255, 244, 190, ${alpha})`
                            : `rgba(247, 213, 71, ${alpha})`;
                        context.fill();
                    }
                }

                const glow = context.createRadialGradient(width * 0.5, height * 0.45, 0, width * 0.5, height * 0.45, width * 0.62);
                glow.addColorStop(0, 'rgba(247, 213, 71, 0.13)');
                glow.addColorStop(0.65, 'rgba(247, 213, 71, 0.035)');
                glow.addColorStop(1, 'rgba(0, 0, 0, 0.42)');
                context.fillStyle = glow;
                context.fillRect(0, 0, width, height);

                if (pointer.active) {
                    const pointerGlow = context.createRadialGradient(pointer.x, pointer.y, 0, pointer.x, pointer.y, 140);
                    pointerGlow.addColorStop(0, 'rgba(255, 244, 190, 0.22)');
                    pointerGlow.addColorStop(1, 'rgba(247, 213, 71, 0)');
                    context.fillStyle = pointerGlow;
                    context.fillRect(0, 0, width, height);
                }

                if (!reducedMotion && isVisible && isPageVisible) {
                    animationFrame = requestAnimationFrame(draw);
                }
            }

            function startAnimation() {
                if (!reducedMotion && isVisible && isPageVisible && !animationFrame) {
                    animationFrame = requestAnimationFrame((time) => {
                        animationFrame = 0;
                        draw(time);
                    });
                }
            }

            function stopAnimation() {
                if (animationFrame) cancelAnimationFrame(animationFrame);
                animationFrame = 0;
            }

            resize();
            draw();

            hero.addEventListener('pointermove', (event) => {
                if (event.pointerType === 'touch') return;

                const bounds = hero.getBoundingClientRect();
                pointer.x = event.clientX - bounds.left;
                pointer.y = event.clientY - bounds.top;
                pointer.active = true;

                if (reducedMotion) draw(performance.now());
                else startAnimation();
            });

            hero.addEventListener('pointerleave', () => {
                pointer.active = false;
                if (reducedMotion) draw(performance.now());
                else startAnimation();
            });

            const resizeObserver = new ResizeObserver(() => {
                resize();
                draw();
            });
            resizeObserver.observe(canvas);

            if ('IntersectionObserver' in window) {
                const visibilityObserver = new IntersectionObserver(([entry]) => {
                    isVisible = entry.isIntersecting;
                    if (isVisible) startAnimation();
                    else stopAnimation();
                });
                visibilityObserver.observe(canvas);
            } else {
                isVisible = true;
                startAnimation();
            }

            document.addEventListener('visibilitychange', () => {
                isPageVisible = !document.hidden;
                if (isPageVisible) startAnimation();
                else stopAnimation();
            });
        })();

        document.querySelectorAll('[data-service-interaction]').forEach((link) => {
            link.addEventListener('click', () => {
                fetch('{{ route("interacciones.registrar") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        tipo: 'servicio',
                        item: link.dataset.serviceName,
                        canal: 'whatsapp'
                    }),
                    keepalive: true
                }).catch(() => {});
            });
        });

        // FILTRADO DE SERVICIOS POR PESTAÑAS (TABS)
        const tabBtns = document.querySelectorAll('.tab-btn');
        const serviceCards = document.querySelectorAll('.service-card');

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