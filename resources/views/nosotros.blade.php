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

        /* HERO NOSOTROS - TARJETA DESTACADA AMARILLA */
        .hero-section {
            padding: 40px 5%;
            display: flex;
            justify-content: center;
        }

        .hero-card {
            background: #f7d547;
            width: 100%;
            max-width: 1280px;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(247, 213, 71, 0.25);
            border: 1px solid #e5c338;
            overflow: hidden;
            position: relative;
            color: #000000;
            padding: 60px 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }

        .hero-content {
            flex: 1;
            max-width: 650px;
        }

        .hero-content h1 {
            font-size: clamp(2.2rem, 3.8vw, 3.2rem);
            font-weight: 800;
            color: #000000;
            line-height: 1.1;
            margin: 0 0 16px 0;
            letter-spacing: -0.02em;
            text-transform: uppercase;
        }

        .hero-content p {
            font-size: 1.1rem;
            color: #27272a;
            line-height: 1.6;
            margin: 0;
            font-weight: 500;
        }

        .hero-image-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image-wrapper img {
            max-width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        /* SECCIONES GENERALES */
        .seccion {
            padding: 80px 5%;
            max-width: 1280px;
            margin: 0 auto;
        }

        .seccion-header {
            text-align: center;
            max-width: 750px;
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
            margin: 16px 0 0 0;
            color: var(--texto-muted);
            font-size: 1.05rem;
            line-height: 1.7;
        }

        /* GRID DE TARJETAS DE VALORES Y PILARES */
        .grid-pilares {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .tarjeta-pilar {
            background: #f7d547;
            border-radius: 16px;
            padding: 36px 30px;
            border: 1px solid #e5c338;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            gap: 12px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            color: #000000;
        }

        .tarjeta-pilar:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(247, 213, 71, 0.3);
        }

        .tarjeta-pilar h3 {
            margin: 0;
            font-size: 1.3rem;
            font-weight: 800;
            color: #000000;
            text-transform: uppercase;
            letter-spacing: -0.01em;
        }

        .tarjeta-pilar p {
            margin: 0;
            color: #27272a;
            line-height: 1.6;
            font-size: 0.98rem;
            font-weight: 500;
        }

        /* SECCIÓN MARCAS CON FONDO AMARILLO */
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

        .hero-card {
            animation: page-enter 750ms cubic-bezier(0.2, 0.7, 0.2, 1) both;
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

        @keyframes page-enter {
            from { opacity: 0; transform: translateY(22px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (prefers-reduced-motion: reduce) {
            .hero-card { animation: none; }
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .hero-card { flex-direction: column; text-align: center; padding: 40px 24px; }
            .hero-content { max-width: 100%; }
            .grid-pilares { grid-template-columns: 1fr; }
        }

        @media (max-width: 680px) {
            .brand-box { width: 120px; }
        }
    </style>
</head>
<body>

    @include('footer.top')

    <!-- HERO NOSOTROS -->
    <section class="hero-section">
        <div class="hero-card">
            <div class="hero-content">
                <h1>Trayectoria e Innovación en <span>Maquinaria Pesada</span></h1>
                <p>Contamos con especialistas con más de 15 años de experiencia en el ámbito industrial. MAQUITEC ofrece equipos, asesoría y soporte técnico para garantizar operaciones seguras y eficientes.</p>
            </div>
            <div class="hero-image-wrapper">
                <img src="{{ asset('img/logo_maquitec.jpg') }}" alt="Maquitec Empresa">
            </div>
        </div>
    </section>

    <!-- SOBRE LA EMPRESA Y PILARES -->
    <section class="seccion">
        <div class="seccion-header">
            <span class="badge-tag">Nuestra Identidad</span>
            <h2>Sobre nuestra empresa</h2>
            <p class="lead">
                MAQUITEC I.S.A.C. es una empresa peruana especializada en la comercialización, ensamblaje y mantenimiento de equipos industriales. Nuestro trabajo está enfocado en clientes que requieren transporte de carga, almacenamiento y manejo de materiales con los más altos estándares de seguridad y productividad.
            </p>
        </div>

        <div class="grid-pilares">
            <div class="tarjeta-pilar">
                <h3>Misión</h3>
                <p>Entregar soluciones industriales completas que faciliten la operación diaria de nuestros clientes, manteniendo altos estándares de calidad, seguridad y eficiencia tecnológica.</p>
            </div>

            <div class="tarjeta-pilar">
                <h3>Visión</h3>
                <p>Ser la opción número uno en soluciones de manejo de carga y mantenimiento industrial en el Perú, reconocidos por nuestra experiencia, velocidad de respuesta y confianza.</p>
            </div>

            <div class="tarjeta-pilar">
                <h3>Valores</h3>
                <p>Compromiso, transparencia, seguridad y calidad. Cada proyecto se atiende con máxima responsabilidad técnica y enfoque centrado en el cliente.</p>
            </div>

            <div class="tarjeta-pilar">
                <h3>Servicios Clave</h3>
                <p>Asesoría técnica especializada, suministro de equipos, mantenimiento preventivo y correctivo, instalación y gestión integral de repuestos.</p>
            </div>
        </div>
    </section>

    <!-- MARCAS Y SERVICIOS CON FONDO AMARILLO -->
    <section class="section-highlight" id="servicios">
        <div style="max-width: 1280px; margin: 0 auto;">
            <div class="seccion-header" style="margin-bottom: 30px;">
                <span class="badge-tag">Respaldo Global</span>
                <h2>Servicios y Marcas Autorizadas</h2>
                <p class="lead" style="color: #27272a;">Brindamos soporte completo, repuestos y mantenimiento especializado para las marcas líderes del mercado logístico.</p>
            </div>

            <div style="margin-bottom: 16px; text-align: center;">
                <h3 style="font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em; color: #1e293b; font-weight: 700;">MARCAS DE MONTACARGAS Y EQUIPOS LOGÍSTICOS:</h3>
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

    @include('footer.bottom')

    <script>
        const revealElements = document.querySelectorAll('.seccion-header, .tarjeta-pilar, .section-highlight .brand-box');
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