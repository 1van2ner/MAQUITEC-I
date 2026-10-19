<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #f7d547;
            --amarillo-hover: #e5c338;
            --amarillo-oscuro: #caaa2b;
            --negro: #000000;
            --fondo-card: rgba(255, 255, 255, 0.03);
            --borde-card: rgba(255, 255, 255, 0.08);
            --texto-claro: #ffffff;
            --texto-muted: #a1a1aa;
        }

        * { box-sizing: border-box; }

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

        /* HERO SECTION */
        .hero-section {
            padding: 50px 5% 30px 5%;
            display: flex;
            justify-content: center;
        }

        .hero-card {
            background: var(--amarillo);
            width: 100%;
            max-width: 1320px;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(247, 213, 71, 0.18), 0 10px 30px rgba(0, 0, 0, 0.5);
            border: 2px solid #e5c338;
            overflow: hidden;
            position: relative;
            color: #000000;
            padding: 60px 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
        }

        .hero-content {
            flex: 1.2;
        }

        .hero-badge {
            background: #000000;
            color: var(--amarillo);
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            display: inline-block;
            margin-bottom: 20px;
        }

        .hero-content h1 {
            font-size: clamp(2.2rem, 3.8vw, 3.2rem);
            font-weight: 900;
            color: #000000;
            line-height: 1.1;
            margin: 0 0 18px 0;
            letter-spacing: -0.02em;
            text-transform: uppercase;
        }

        .hero-content p {
            font-size: 1.12rem;
            color: #1f2937;
            line-height: 1.65;
            margin: 0 0 30px 0;
            font-weight: 600;
        }

        /* METRICAS Y ESTADISTICAS EN HERO */
        .hero-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            border-top: 2px solid rgba(0,0,0,0.15);
            padding-top: 24px;
        }

        .stat-item h4 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 900;
            color: #000000;
        }

        .stat-item p {
            margin: 2px 0 0 0;
            font-size: 0.85rem;
            font-weight: 700;
            color: #374151;
            text-transform: uppercase;
            line-height: 1.3;
        }

        .hero-image-wrapper {
            flex: 0.8;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .hero-image-wrapper img {
            width: 280px;
            height: 280px;
            object-fit: cover;
            border-radius: 50%;
            border: 6px solid #000000;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        /* SECCIONES GENERALES */
        .seccion {
            padding: 80px 5%;
            max-width: 1320px;
            margin: 0 auto;
        }

        .seccion-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 55px auto;
        }

        .badge-tag {
            background: rgba(247, 213, 71, 0.12);
            color: #f7d547;
            padding: 6px 16px;
            border-radius: 99px;
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            display: inline-block;
            margin-bottom: 14px;
            border: 1px solid rgba(247, 213, 71, 0.3);
        }

        .seccion h2 {
            margin: 0;
            font-size: 2.3rem;
            letter-spacing: -0.02em;
            color: var(--texto-claro);
            font-weight: 900;
            text-transform: uppercase;
        }

        .seccion p.lead {
            margin: 16px 0 0 0;
            color: var(--texto-muted);
            font-size: 1.08rem;
            line-height: 1.7;
        }

        /* GRID DE PILARES OPERATIVOS */
        .grid-pilares {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .tarjeta-pilar {
            background: var(--amarillo);
            border-radius: 20px;
            padding: 38px 32px;
            border: 2px solid #e5c338;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            gap: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: #000000;
        }

        .tarjeta-pilar:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 36px rgba(247, 213, 71, 0.25);
            border-color: #ffffff;
        }

        .tarjeta-pilar .icon-box {
            font-size: 2rem;
            margin-bottom: 4px;
        }

        .tarjeta-pilar h3 {
            margin: 0;
            font-size: 1.35rem;
            font-weight: 900;
            color: #000000;
            text-transform: uppercase;
        }

        .tarjeta-pilar p {
            margin: 0;
            color: #1f2937;
            line-height: 1.6;
            font-size: 1rem;
            font-weight: 600;
        }

        /* CORE DE SERVICIOS TÉCNICOS (PRIMER PLANO) */
        .grid-servicios-core {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 40px;
        }

        .card-servicio {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 32px 26px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .card-servicio:hover {
            border-color: var(--amarillo);
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(247, 213, 71, 0.15);
        }

        .card-servicio .servicio-num {
            font-size: 0.85rem;
            font-weight: 900;
            color: var(--amarillo);
            background: rgba(247, 213, 71, 0.1);
            padding: 4px 12px;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 16px;
            border: 1px solid rgba(247, 213, 71, 0.2);
        }

        .card-servicio h3 {
            margin: 0 0 12px 0;
            font-size: 1.25rem;
            color: #ffffff;
            font-weight: 800;
        }

        .card-servicio p {
            margin: 0;
            color: var(--texto-muted);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* SUMINISTROS Y FLUIDOS (SEGUNDO PLANO) */
        .seccion-insumos {
            background: rgba(255, 255, 255, 0.02);
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 80px 5%;
        }

        .grid-insumos {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            max-width: 1320px;
            margin: 40px auto 0 auto;
        }

        .card-insumo {
            background: #18191c;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            transition: all 0.25s ease;
        }

        .card-insumo:hover {
            border-color: var(--amarillo);
            transform: translateY(-4px);
        }

        .card-insumo .icon {
            font-size: 2.2rem;
            margin-bottom: 12px;
        }

        .card-insumo h4 {
            margin: 0 0 8px 0;
            color: #ffffff;
            font-size: 1.05rem;
            font-weight: 700;
        }

        .card-insumo p {
            margin: 0;
            color: var(--texto-muted);
            font-size: 0.88rem;
            line-height: 1.4;
        }

        /* SECCIÓN MARCAS AUTORIZADAS */
        .section-highlight {
            background: var(--amarillo); 
            color: #000000; 
            border-top: 2px solid #e5c338;
            border-bottom: 2px solid #e5c338;
            padding: 80px 5%;
        }

        .section-highlight .badge-tag {
            background: #000000;
            color: var(--amarillo);
            border: none;
        }

        .section-highlight h2 {
            color: #000000;
        }

        .brands-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 16px;
            max-width: 1320px;
            margin: 0 auto;
        }

        .brand-box {
            background: #ffffff; 
            border: 2px solid #e5c338;
            border-radius: 14px;
            height: 85px;
            width: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 14px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
        }

        .brand-box:hover {
            transform: translateY(-4px);
            border-color: #000000;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.25);
        }

        .brand-box img {
            max-height: 46px;
            max-width: 100%;
            object-fit: contain;
        }

        /* UBICACION Y MAPA */
        .maps-section {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 64px 5%;
        }

        .maps-card {
            overflow: hidden;
            background: rgba(26, 29, 36, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
        }

        .maps-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 24px 28px;
            border-bottom: 1px solid rgba(247, 213, 71, 0.25);
        }

        .maps-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 8px;
            color: var(--texto-claro);
            font-size: 1.4rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .maps-title svg {
            width: 25px;
            height: 25px;
            color: var(--amarillo);
            flex-shrink: 0;
        }

        .maps-address {
            margin: 0;
            color: var(--texto-muted);
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .maps-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-shrink: 0;
            padding: 11px 16px;
            border-radius: 6px;
            background: var(--amarillo);
            color: #121316;
            font-size: 0.88rem;
            font-weight: 800;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .maps-link:hover {
            background: var(--amarillo-hover);
            transform: translateY(-2px);
        }

        .maps-container {
            width: 100%;
            height: clamp(300px, 42vw, 480px);
            background: #202328;
        }

        .maps-container iframe {
            display: block;
            width: 100%;
            height: 100%;
            border: 0;
        }

        /* SCROLL REVEAL ANIMATIONS */
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
        @media (max-width: 1100px) {
            .grid-servicios-core, .grid-insumos { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 900px) {
            .hero-card { flex-direction: column; text-align: center; padding: 40px 24px; }
            .hero-stats { grid-template-columns: 1fr; gap: 16px; }
            .grid-pilares { grid-template-columns: 1fr; }
        }

        @media (max-width: 600px) {
            .grid-servicios-core, .grid-insumos { grid-template-columns: 1fr; }
            .brand-box { width: 125px; height: 70px; }
            .maps-section { padding: 44px 3%; }
            .maps-header {
                align-items: flex-start;
                flex-direction: column;
                padding: 22px 18px;
            }
            .maps-title { font-size: 1.2rem; }
            .maps-container { height: 340px; }
        }
    </style>
</head>
<body>

    @include('footer.top')

    <!-- HERO NOSOTROS -->
    <section class="hero-section">
        <div class="hero-card">
            <div class="hero-content">
                <span class="hero-badge">Especialistas en Soporte Logístico e Industrial</span>
                <h1>Potencia, Disponibilidad y <span>Ingeniería de Mantenimiento</span></h1>
                <p>Respaldados por tecnicos con más de 15 años de experiencia técnica en el sector. En MAQUITEC I.S.A.C. garantizamos la operatividad continua de su flota de montacargas y maquinaria pesada mediante soluciones de mantenimiento de alto rendimiento y suministro integral de repuestos.</p>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <h4>+15 Años</h4>
                        <p>De Especialización Técnica</p>
                    </div>
                    <div class="stat-item">
                        <h4>+500</h4>
                        <p>Equipos Diagnosticados y Reparados</p>
                    </div>
                    <div class="stat-item">
                        <h4>100%</h4>
                        <p>Fiabilidad en Operaciones</p>
                    </div>
                </div>
            </div>
            <div class="hero-image-wrapper">
                <img src="{{ asset('img/logo_pagina_general/maquitec_2026_new.jpg') }}" alt="MAQUITEC I.S.A.C. Maquinaria">
            </div>
        </div>
    </section>

    <!-- SOBRE LA EMPRESA Y PILARES -->
    <section class="seccion">
        <div class="seccion-header">
            <span class="badge-tag">Nuestra Identidad</span>
            <h2>Ingeniería Aplicada al Servicio Logístico</h2>
            <p class="lead">
                MAQUITEC I.S.A.C. es una organización peruana líder en el diagnóstico, mantenimiento correctivo, preventivo y reparación integral de equipos de manipulación de carga. Complementamos nuestra propuesta técnica con el suministro confiable de componentes y fluidos automotrices de grado industrial.
            </p>
        </div>

        <div class="grid-pilares">
            <div class="tarjeta-pilar">
                <div class="icon-box">⚙️</div>
                <h3>Misión</h3>
                <p>Garantizar el máximo tiempo de actividad operacional de nuestros clientes mediante servicios técnicos de precisión, diagnóstico especializado y suministro oportuno de repuestos de alta calidad.</p>
            </div>

            <div class="tarjeta-pilar">
                <div class="icon-box">🚀</div>
                <h3>Visión</h3>
                <p>Consolidarnos como la empresa referente a nivel nacional en ingeniería de mantenimiento de equipos logísticos, reconocida por nuestra velocidad de respuesta, excelencia técnica y ética profesional.</p>
            </div>

            <div class="tarjeta-pilar">
                <div class="icon-box">🛡️</div>
                <h3>Valores</h3>
                <p>Rigor técnico, transparencia comercial, respuesta inmediata y compromiso con la seguridad operacional en cada taller e intervención en campo.</p>
            </div>

            <div class="tarjeta-pilar">
                <div class="icon-box">🔧</div>
                <h3>Capacidad Operativa</h3>
                <p>Infraestructura equipada para revisiones mayores, pruebas de presión hidráulica, rectificación de componentes y soporte técnico preventivo multimarca.</p>
            </div>
        </div>
    </section>

    <!-- CORE DE SERVICIOS TÉCNICOS (PRIMER PLANO) -->
    <section class="seccion" style="padding-top: 0;">
        <div class="seccion-header">
            <span class="badge-tag">Servicios Principales</span>
            <h2>Especialidades de Mantenimiento y Reparación</h2>
            <p class="lead">Atendemos las exigencias del sector industrial con procedimientos bajo estándares del fabricante.</p>
        </div>

        <div class="grid-servicios-core">
            <div class="card-servicio">
                <span class="servicio-num">SERVICIO CORE 01</span>
                <h3>Mantenimiento Preventivo y Correctivo</h3>
                <p>Programas estructurados para reducir fallas no planificadas en montacargas eléctricos, diésel y a gas GLP.</p>
            </div>
            <div class="card-servicio">
                <span class="servicio-num">SERVICIO CORE 02</span>
                <h3>Reparación de Sistemas Hidráulicos</h3>
                <p>Overhaul completo de bombas, mangueras de alta presión, mandos finales y cilindros de elevación.</p>
            </div>
            <div class="card-servicio">
                <span class="servicio-num">SERVICIO CORE 03</span>
                <h3>Diagnóstico y Reconstrucción de Motores</h3>
                <p>Evaluación computarizada y reparación integral de motores diésel y de combustión pesada.</p>
            </div>
        </div>
    </section>

    <!-- SUMINISTROS Y FLUIDOS (SEGUNDO PLANO) -->
    <section class="seccion-insumos">
        <div class="seccion-header">
            <span class="badge-tag">Suministros y Fluidos</span>
            <h2>Repuestos, Accesorios y Aceites Especializados</h2>
            <p class="lead">Disponemos de un amplio catálogo de insumos de alto rendimiento para garantizar el buen funcionamiento mecánico de su flota.</p>
        </div>

        <div class="grid-insumos">
            <div class="card-insumo">
                <div class="icon">🛢️</div>
                <h4>Aceites y Gasolinas</h4>
                <p>Lubricantes multigrado para motores diésel de trabajo pesado y gasolina.</p>
            </div>
            <div class="card-insumo">
                <div class="icon">🧪</div>
                <h4>Líquidos de Freno y Refrigerantes</h4>
                <p>Fluidos sintéticos DOT3 / DOT4 y refrigerantes de alto punto de ebullición.</p>
            </div>
            <div class="card-insumo">
                <div class="icon">🧩</div>
                <h4>Filtros Industriales</h4>
                <p>Sistemas de filtración de aire, aceite, combustible e hidráulicos.</p>
            </div>
            <div class="card-insumo">
                <div class="icon">🧈</div>
                <h4>Grasas Multiuso</h4>
                <p>Grasas complejas de litio para chasis, rodamientos y cadenas de elevación.</p>
            </div>
        </div>
    </section>

    <!-- MARCAS Y RESPALDO TÉCNICO -->
    <section class="section-highlight" id="servicios">
        <div style="max-width: 1320px; margin: 0 auto;">
            <div class="seccion-header" style="margin-bottom: 35px;">
                <span class="badge-tag">Respaldo Multimarca</span>
                <h2>Marcas Atendidas en Servicio y Repuestos</h2>
                <p class="lead" style="color: #1f2937;">Contamos con experiencia técnica comprobada en las principales marcas del mercado mundial.</p>
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

    <!-- UBICACION Y MAPA -->
    <section class="maps-section" id="ubicacion" aria-labelledby="maps-title">
        <div class="maps-card">
            <div class="maps-header">
                <div>
                    <h2 class="maps-title" id="maps-title">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z" />
                        </svg>
                        Nuestra ubicación
                    </h2>
                    <p class="maps-address">Encuéntranos en Lima, Perú. Visítanos en nuestras oficinas y talleres para atender tus consultas.</p>
                </div>
                <a class="maps-link" href="https://www.google.com/maps?q=-12.046374,-77.042793" target="_blank" rel="noopener noreferrer">
                    Abrir en Google Maps <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
            <div class="maps-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.954625895318!2d-77.042793!3d-12.046374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDAyJzQ3LjAiUyA3N8KwMDInMzQuMSJX!5e0!3m2!1ses!2spe!4v1600000000000!5m2!1ses!2spe"
                    title="Mapa de ubicación de MAQUITEC en Lima"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    @include('footer.bottom')

    <script>
        const revealElements = document.querySelectorAll('.seccion-header, .tarjeta-pilar, .card-servicio, .card-insumo, .section-highlight .brand-box');
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