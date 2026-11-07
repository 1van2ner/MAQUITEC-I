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
            --texto-muted: #c2c3ca;
        }

        * { box-sizing: border-box; }
        html, body { overflow-x: clip; }

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
            border-top: 2px solid rgba(247, 213, 71, 0.45);
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
            background: var(--amarillo);
            border: 1px solid var(--amarillo-hover);
            border-radius: 20px;
            padding: 32px 26px;
            backdrop-filter: blur(10px);
            color: #111111;
            transition:
                transform 520ms cubic-bezier(0.22, 1, 0.36, 1),
                border-color 420ms ease,
                box-shadow 520ms cubic-bezier(0.22, 1, 0.36, 1),
                background 420ms ease;
        }

        .card-servicio:hover {
            border-color: #ffffff;
            transform: translateY(-4px) scale(1.012);
            background: #ffe45c;
            box-shadow: 0 18px 36px rgba(247, 213, 71, 0.28);
        }

        @media (prefers-reduced-motion: reduce) {
            .card-servicio {
                transition: border-color 180ms ease, box-shadow 180ms ease;
            }

            .card-servicio:hover {
                transform: none;
            }
        }

        .card-servicio .servicio-num {
            font-size: 0.85rem;
            font-weight: 900;
            color: var(--amarillo);
            background: #171717;
            padding: 4px 12px;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 16px;
            border: 1px solid #171717;
        }

        .card-servicio h3 {
            margin: 0 0 12px 0;
            font-size: 1.25rem;
            color: #111111;
            font-weight: 800;
        }

        .card-servicio p {
            margin: 0;
            color: #302a16;
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
            background: linear-gradient(145deg, rgba(247, 213, 71, 0.055), #18191c 72%);
            border: 1px solid rgba(247, 213, 71, 0.2);
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
            border: 1px solid rgba(247, 213, 71, 0.24);
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

        /* REDISEÑO CORPORATIVO */
        .hero-section {
            padding: 0;
            min-height: 620px;
            background: #0b0c0e;
            overflow: hidden;
        }

        .hero-card {
            max-width: none;
            min-height: 620px;
            border: 0;
            border-radius: 0;
            box-shadow: none;
            background: linear-gradient(90deg, rgba(5, 6, 7, 0.96) 0%, rgba(5, 6, 7, 0.82) 46%, rgba(5, 6, 7, 0.18) 100%);
            padding: 64px max(5%, calc((100% - 1320px) / 2));
            align-items: center;
        }

        .hero-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(ellipse at 72% 48%, rgba(255, 220, 0, 0.2) 0%, rgba(255, 220, 0, 0.08) 28%, transparent 58%),
                linear-gradient(90deg, rgba(5, 6, 7, 0.96) 0%, rgba(5, 6, 7, 0.72) 48%, rgba(5, 6, 7, 0.12) 100%),
                url("{{ asset('img/img_maquitec1.jpg') }}");
            background-size: cover;
            background-position: center 58%;
            z-index: 0;
        }

        .hero-content,
        .hero-image-wrapper { position: relative; z-index: 1; }
        .hero-content { max-width: 760px; flex: 0 1 760px; }
        .hero-content h1 { max-width: 760px; color: #fff; font-size: clamp(2.65rem, 5vw, 4.6rem); }
        .hero-content h1 span { color: var(--amarillo); }
        .hero-content p { max-width: 680px; color: #e2e8f0; font-size: 1.1rem; }
        .hero-badge { border-radius: 999px; }
        .hero-card {
            justify-content: space-between;
        }
        .hero-image-wrapper {
            flex: 0 0 340px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: clamp(0px, 2vw, 32px);
        }
        .hero-image-wrapper img {
            width: 340px;
            height: 340px;
            object-fit: cover;
            border-radius: 50%;
            border: 1px solid rgba(247, 213, 71, .72);
            box-shadow: 0 20px 55px rgba(0, 0, 0, .48), 0 0 0 8px rgba(0, 0, 0, .18);
        }
        .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 30px; }
        .hero-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 0 22px;
            border-radius: 8px;
            background: var(--amarillo);
            color: #111;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .03em;
            border: 2px solid var(--amarillo);
        }
        .hero-cta.secondary { background: transparent; color: var(--amarillo); border-color: rgba(247,213,71,.58); }
        .hero-cta:hover { transform: translateY(-2px); }
        .hero-stats { border-top-color: rgba(255,255,255,.18); }
        .stat-item h4 { color: var(--amarillo); font-size: 1.15rem; text-transform: uppercase; }
        .stat-item p { color: #d1d5db; }

        .seccion { padding: 88px 5%; }
        .seccion-header { max-width: 820px; margin-bottom: 42px; }
        .seccion-header.align-left { text-align: left; margin: 0; }
        .services-core-section {
            padding-top: 56px;
            background: radial-gradient(ellipse at 50% 28%, rgba(247, 213, 71, 0.1), transparent 70%);
        }

        .story-grid {
            position: relative;
            isolation: isolate;
            max-width: 1120px;
            margin: 0 auto;
            padding: clamp(28px, 5vw, 58px);
            overflow: hidden;
            border: 1px solid rgba(247,213,71,.34);
            border-radius: 22px;
            background: #101114;
            box-shadow: 0 22px 55px rgba(0,0,0,.35);
        }
        .story-image {
            position: absolute;
            z-index: -2;
            inset: 0;
            min-height: 0;
            height: auto;
            border: 0;
            border-radius: 0;
            box-shadow: none;
            background: radial-gradient(ellipse at 50% 45%, #28231a 0%, #111216 60%, #090a0d 100%);
        }
        .story-image .micro-slats {
            position: absolute;
            inset: 0;
            display: block;
            width: 100%;
            height: 100%;
        }
        .story-grid::before {
            position: absolute;
            z-index: -1;
            inset: 0;
            background: linear-gradient(110deg, rgba(8,9,12,.58), rgba(8,9,12,.78));
            content: "";
            pointer-events: none;
        }
        .story-copy {
            position: relative;
            z-index: 1;
        }
        .story-copy h2 { margin: 0; font-size: 2.45rem; line-height: 1.08; text-transform: uppercase; }
        .story-copy .lead { margin-top: 18px; }

        .identity-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 32px;
        }
        .identity-card {
            min-height: 210px;
            padding: 26px;
            border-radius: 0;
            background: linear-gradient(145deg, rgba(247,213,71,.045), transparent 72%);
            border: 0;
            border-top: 2px solid rgba(247,213,71,.62);
        }
        .identity-card .icon-box { color: var(--amarillo); font-size: 1.5rem; margin-bottom: 14px; }
        .identity-card h3 { margin: 0 0 10px; font-size: 1.15rem; text-transform: uppercase; }
        .identity-card p { margin: 0; color: var(--texto-muted); line-height: 1.65; }

        .process-section {
            background: linear-gradient(110deg, rgba(247,213,71,.035), rgba(255,255,255,.025) 48%, rgba(247,213,71,.035));
            border-block: 1px solid rgba(247,213,71,.18);
        }
        .process-grid {
            max-width: 1320px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
        }
        .process-step { position: relative; padding: 30px 28px 28px; border-left: 1px solid rgba(247,213,71,.36); }
        .process-step:first-child { border-left: 0; }
        .process-number { display: block; color: var(--amarillo); font-size: 2rem; font-weight: 900; margin-bottom: 16px; }
        .process-step h3 { margin: 0 0 9px; font-size: 1.05rem; text-transform: uppercase; }
        .process-step p { margin: 0; color: var(--texto-muted); line-height: 1.55; }

        .services-intro-grid {
            max-width: 1320px;
            margin: 0 auto 34px;
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 30px;
        }
        .services-intro-grid .seccion-header { margin: 0; }
        .text-link { color: var(--amarillo); font-weight: 900; border-bottom: 1px solid var(--amarillo); white-space: nowrap; }
        .card-servicio { min-height: 260px; }

        .gallery-strip {
            max-width: 1320px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.2fr .8fr .8fr;
            grid-auto-rows: 230px;
            gap: 16px;
        }
        .gallery-strip figure { margin: 0; overflow: hidden; border-radius: 14px; border: 1px solid rgba(255,255,255,.08); }
        .gallery-strip figure:first-child { grid-row: span 2; }
        .gallery-strip img { width: 100%; height: 100%; object-fit: cover; transition: transform .35s ease; }
        .gallery-strip figure:hover img { transform: scale(1.03); }

        .forklift-process {
            max-width: 1320px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.08fr .92fr;
            gap: 18px;
        }
        .work-gallery-section {
            width: 100%;
            max-width: none;
            padding-inline: 24px;
            background: linear-gradient(180deg, transparent 0%, rgba(247,213,71,.025) 100%);
        }
        .work-gallery-section .forklift-process {
            width: 100%;
            max-width: 1680px;
            grid-template-columns: minmax(0, 1.35fr) minmax(360px, 1fr);
            align-items: stretch;
        }
        .work-gallery-section .process-gallery-panel {
            height: clamp(620px, 42vw, 760px);
        }
        .process-gallery-panel {
            position: relative;
            min-height: 620px;
            overflow: hidden;
            border-radius: 16px;
            background: #18191c;
            border: 1px solid rgba(247,213,71,.24);
        }
        .process-gallery-panel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .process-gallery-panel.arrival {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 4px;
            background: #090a0b;
        }
        .process-gallery-panel.arrival img {
            height: 100%;
            object-position: center top;
        }
        .process-status {
            position: absolute;
            left: 18px;
            bottom: 18px;
            z-index: 2;
            max-width: calc(100% - 36px);
            padding: 13px 16px;
            border-radius: 8px;
            background: rgba(12,13,15,.92);
            border-left: 4px solid var(--amarillo);
            box-shadow: 0 12px 30px rgba(0,0,0,.28);
        }
        .process-status strong {
            display: block;
            margin-bottom: 3px;
            color: var(--amarillo);
            font-size: .78rem;
            letter-spacing: .09em;
            text-transform: uppercase;
        }
        .process-status span { font-size: .95rem; font-weight: 700; }

        .section-highlight {
            background: linear-gradient(135deg, #f7d547 0%, #e6c43a 100%);
            padding: 72px 5%;
        }
        .section-highlight .seccion-header { margin-bottom: 30px; }
        .final-cta {
            margin: 0 auto;
            max-width: 1320px;
            padding: 64px 5%;
        }
        .final-cta-inner {
            border-radius: 18px;
            padding: 48px;
            text-align: center;
            background: linear-gradient(135deg, rgba(247,213,71,.16), rgba(247,213,71,.03));
            border: 1px solid rgba(247,213,71,.28);
        }
        .final-cta h2 { margin: 0 0 14px; font-size: clamp(2rem, 4vw, 3rem); text-transform: uppercase; }
        .final-cta p { margin: 0 auto 24px; max-width: 680px; color: var(--texto-muted); line-height: 1.65; }

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
            .hero-section {
                padding: 20px 12px 28px;
            }
            .hero-card {
                gap: 20px;
                padding: 24px 16px;
                border-radius: 16px;
            }
            .hero-badge {
                max-width: 100%;
                margin-bottom: 14px;
                padding: 8px 12px;
                font-size: 0.68rem;
                line-height: 1.25;
                letter-spacing: 0.04em;
            }
            .hero-content h1 {
                font-size: clamp(1.55rem, 7vw, 2rem);
                line-height: 1.12;
                margin-bottom: 14px;
            }
            .hero-content p {
                margin-bottom: 18px;
                font-size: 0.92rem;
                line-height: 1.55;
            }
            .hero-stats {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 8px;
                padding-top: 16px;
            }
            .stat-item h4 {
                font-size: 1.25rem;
            }
            .stat-item p {
                font-size: 0.62rem;
                line-height: 1.25;
            }
            .hero-image-wrapper {
                width: 100%;
                margin-top: 2px;
            }
            .hero-image-wrapper img {
                width: 150px;
                height: 150px;
                border-width: 4px;
            }
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

        @media (max-width: 900px) {
            .hero-section,
            .hero-card { min-height: 560px; }
            .hero-card { padding: 48px 24px; }
            .hero-card::after { background-position: 62% center; }
            .hero-image-wrapper {
                flex-basis: 220px;
                width: 220px;
                margin: 18px 0 0;
            }
            .hero-image-wrapper img {
                width: 220px;
                height: 220px;
            }
            .story-grid { max-width: 760px; }
            .identity-grid { grid-template-columns: 1fr; }
            .identity-card { min-height: 0; }
            .process-grid { grid-template-columns: repeat(2, 1fr); }
            .process-step:nth-child(3) { border-left: 0; border-top: 1px solid rgba(247,213,71,.36); }
            .process-step:nth-child(4) { border-top: 1px solid rgba(247,213,71,.36); }
            .gallery-strip { grid-template-columns: 1fr 1fr; grid-auto-rows: 220px; }
            .gallery-strip figure:first-child { grid-row: auto; grid-column: 1 / -1; }
            .forklift-process { grid-template-columns: 1fr; }
            .process-gallery-panel { min-height: 520px; }
            .process-gallery-panel.arrival img { height: 520px; }
            .work-gallery-section .process-gallery-panel { height: 520px; }
        }

        @media (max-width: 600px) {
            .hero-section,
            .hero-card { min-height: 0; }
            .hero-section { padding: 16px 12px 24px; }
            .hero-card {
                display: grid;
                grid-template-columns: minmax(0, 1fr);
                row-gap: 14px;
                padding: 28px 18px;
                border-radius: 16px;
                background: linear-gradient(180deg, rgba(5, 6, 7, 0.72), rgba(5, 6, 7, 0.94));
            }
            .hero-content { display: contents; }
            .hero-badge,
            .hero-content h1,
            .hero-actions,
            .hero-stats {
                grid-column: 1 / -1;
            }
            .hero-badge { grid-row: 1; justify-self: start; }
            .hero-content h1 { grid-row: 2; min-width: 0; }
            .hero-image-wrapper {
                display: flex;
                flex: 0 0 auto;
                grid-column: 1;
                grid-row: 3;
                width: 100%;
                margin: 0;
            }
            .hero-image-wrapper img {
                width: clamp(150px, 42vw, 190px);
                height: clamp(150px, 42vw, 190px);
                border-width: 2px;
                box-shadow: 0 16px 36px rgba(0, 0, 0, .42);
            }
            .hero-content > p {
                grid-column: 1 / -1;
                grid-row: 4;
                min-width: 0;
                overflow-wrap: anywhere;
            }
            .hero-actions { grid-row: 5; }
            .hero-stats { grid-row: 6; }
            .hero-card::after {
                background-image:
                    radial-gradient(ellipse at 70% 48%, rgba(255, 220, 0, .2), rgba(255, 220, 0, .07) 34%, transparent 65%),
                    linear-gradient(90deg, rgba(5,6,7,.92), rgba(5,6,7,.45)),
                    url("{{ asset('img/img_maquitec1.jpg') }}");
                background-position: 58% center;
                opacity: 0.72;
            }
            .hero-content h1 { font-size: clamp(1.8rem, 8vw, 2.25rem); line-height: 1.12; }
            .hero-content p { margin-bottom: 20px; font-size: .95rem; line-height: 1.6; }
            .hero-actions { gap: 10px; margin-bottom: 22px; }
            .hero-cta { flex: 1 1 100%; min-height: 46px; padding: 0 15px; font-size: .82rem; }
            .hero-stats {
                grid-template-columns: 1fr;
                gap: 0;
                padding-top: 8px;
            }
            .stat-item {
                display: flex;
                align-items: baseline;
                justify-content: space-between;
                gap: 12px;
                padding: 10px 0;
                border-bottom: 1px solid rgba(255,255,255,.12);
                text-align: left;
            }
            .stat-item h4 { font-size: .82rem; }
            .stat-item p { max-width: 58%; font-size: .76rem; line-height: 1.35; text-align: right; }
            .seccion { padding: 64px 16px; }
            .services-core-section { padding-top: 40px; }
            .seccion h2 { font-size: clamp(1.55rem, 7vw, 2rem); line-height: 1.15; }
            .seccion-header { margin-bottom: 30px; }
            .story-grid { padding: 26px 18px; border-radius: 16px; }
            .story-copy h2 { font-size: clamp(1.55rem, 7vw, 1.8rem); }
            .identity-grid { gap: 8px; margin-top: 24px; }
            .identity-card { padding: 18px 4px; }
            .grid-servicios-core { gap: 16px; margin-top: 28px; }
            .card-servicio { min-height: 0; padding: 24px 20px; }
            .process-grid { grid-template-columns: 1fr; }
            .process-step,
            .process-step:nth-child(3),
            .process-step:nth-child(4) { border-left: 0; border-top: 1px solid rgba(247,213,71,.36); }
            .process-step:first-child { border-top: 0; }
            .process-step { padding: 24px 10px; }
            .gallery-strip { grid-template-columns: 1fr; grid-auto-rows: 260px; }
            .gallery-strip figure:first-child { grid-column: auto; }
            .work-gallery-section { padding-inline: 16px; }
            .work-gallery-section .seccion-header { padding-inline: 4px; }
            .forklift-process { gap: 14px; }
            .work-gallery-section .forklift-process { grid-template-columns: minmax(0, 1fr); }
            .process-gallery-panel,
            .process-gallery-panel.arrival { min-height: 360px; height: 360px; border-radius: 12px; }
            .process-gallery-panel.arrival {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                grid-template-rows: 1.2fr 1fr;
                gap: 4px;
            }
            .process-gallery-panel.arrival img { min-width: 0; min-height: 0; height: 100%; }
            .process-gallery-panel.arrival img:first-of-type { grid-column: 1 / -1; }
            .work-gallery-section .process-gallery-panel { height: 360px; }
            .process-status { left: 12px; bottom: 12px; max-width: calc(100% - 24px); }
            .process-status span { font-size: .82rem; }
            .section-highlight { padding: 64px 16px; }
            .brands-grid { gap: 10px; }
            .brand-box { width: min(125px, calc(50% - 5px)); }
            .maps-section { padding: 40px 16px; }
            .maps-header { gap: 16px; padding: 20px 16px; }
            .maps-link { width: 100%; }
            .maps-container { height: clamp(280px, 90vw, 340px); }
            .final-cta { padding: 40px 16px; }
            .final-cta-inner { padding: 30px 18px; border-radius: 14px; }
            .final-cta h2 { font-size: clamp(1.6rem, 7vw, 2.2rem); line-height: 1.15; }
        }

    </style>
</head>
<body>

    @include('footer.top')

    <!-- HERO NOSOTROS -->
    <section class="hero-section">
        <div class="hero-card">
            <div class="hero-content">
                <span class="hero-badge">Montacargas y maquinaria industrial</span>
                <h1>Tu equipo vuelve <span>a trabajar.</span></h1>
                <p>Revisamos la falla, encontramos la causa y dejamos claro qué necesita tu maquinaria antes de comenzar la reparación.</p>
                <div class="hero-actions">
                    <a class="hero-cta" href="{{ url('/servicios') }}">Ver servicios</a>
                    <a class="hero-cta secondary" href="#ubicacion">Visitar taller</a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <h4>Mantenimiento</h4>
                        <p>Preventivo y correctivo</p>
                    </div>
                    <div class="stat-item">
                        <h4>Soporte</h4>
                        <p>Para varias marcas</p>
                    </div>
                    <div class="stat-item">
                        <h4>Atención</h4>
                        <p>En taller o en tu operación</p>
                    </div>
                </div>
            </div>
            <div class="hero-image-wrapper">
                <img src="{{ asset('img/logo_pagina_general/logo_maqui_circulo.jpg') }}" alt="MAQUITEC - Montacargas y apiladores">
            </div>
        </div>
    </section>

    <!-- SOBRE LA EMPRESA Y PILARES -->
    <section class="seccion">
        <div class="story-grid">
            <div class="story-image">
                <canvas class="micro-slats" aria-hidden="true"></canvas>
            </div>
            <div class="story-copy">
                <span class="badge-tag">Nuestra identidad</span>
                <h2>Ingeniería aplicada al servicio logístico</h2>
                <p class="lead">
                    MAQUITEC nace para resolver problemas reales de equipos que sostienen operaciones. Trabajamos diagnóstico, mantenimiento, reparación, repuestos y fluidos industriales con una idea sencilla: explicar bien el problema y hacer bien el trabajo.
                </p>

                <div class="identity-grid">
                    <div class="identity-card">
                        <div class="icon-box">M</div>
                        <h3>Misión</h3>
                        <p>Devolver la maquinaria a operación con trabajo técnico responsable, piezas adecuadas y comunicación clara con el cliente.</p>
                    </div>
                    <div class="identity-card">
                        <div class="icon-box">V</div>
                        <h3>Visión</h3>
                        <p>Crecer como taller de referencia en Lima, con procesos confiables y una relación de largo plazo con cada operación.</p>
                    </div>
                    <div class="identity-card">
                        <div class="icon-box">+</div>
                        <h3>Valores</h3>
                        <p>Decir lo necesario, cuidar al equipo y a las personas, y no entregar una máquina hasta confirmar su estado.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CORE DE SERVICIOS TÉCNICOS (PRIMER PLANO) -->
    <section class="seccion process-section">
        <div class="seccion-header">
            <span class="badge-tag">Cómo trabajamos</span>
            <h2>Un proceso claro, desde la falla hasta la entrega</h2>
        </div>
        <div class="process-grid">
            <div class="process-step">
                <span class="process-number">01</span>
                <h3>Revisión inicial</h3>
                <p>Escuchamos el problema y recopilamos datos del equipo, sus síntomas y el uso operativo.</p>
            </div>
            <div class="process-step">
                <span class="process-number">02</span>
                <h3>Diagnóstico técnico</h3>
                <p>Inspeccionamos el sistema mecánico, eléctrico o hidráulico para identificar la causa.</p>
            </div>
            <div class="process-step">
                <span class="process-number">03</span>
                <h3>Reparación y repuestos</h3>
                <p>Ejecutamos el servicio acordado y usamos componentes adecuados para la aplicación.</p>
            </div>
            <div class="process-step">
                <span class="process-number">04</span>
                <h3>Prueba y entrega</h3>
                <p>Verificamos el funcionamiento antes de entregar el equipo y sus recomendaciones.</p>
            </div>
        </div>
    </section>

    <section class="seccion services-core-section">
        <div class="seccion-header">
            <span class="badge-tag">Servicios Principales</span>
            <h2>Especialidades de Mantenimiento y Reparación</h2>
            <p class="lead">Intervenimos los sistemas que hacen posible la operación diaria de la maquinaria.</p>
        </div>

        <div class="grid-servicios-core">
            <div class="card-servicio">
                <span class="servicio-num">01 / MANTENIMIENTO</span>
                <h3>Mantenimiento Preventivo y Correctivo</h3>
                <p>Revisión periódica, detección de desgaste y reparación de fallas en equipos eléctricos, diésel y GLP.</p>
            </div>
            <div class="card-servicio">
                <span class="servicio-num">02 / HIDRÁULICA</span>
                <h3>Reparación de Sistemas Hidráulicos</h3>
                <p>Atención de bombas, cilindros, mandos, mangueras y fugas que afectan la elevación o el movimiento.</p>
            </div>
            <div class="card-servicio">
                <span class="servicio-num">03 / MOTOR</span>
                <h3>Diagnóstico y Reconstrucción de Motores</h3>
                <p>Inspección mecánica y reparación de motores según la falla, el modelo y las necesidades del equipo.</p>
            </div>
        </div>
    </section>

    <section class="seccion work-gallery-section" style="padding-top: 0;">
        <div class="seccion-header">
            <span class="badge-tag">Trabajo en campo</span>
            <h2>Conocemos la operación desde cerca</h2>
            <p class="lead">Hay máquinas que pueden venir al taller. Otras necesitan que vayamos donde están. Ambos casos los atendemos desde la operación real.</p>
        </div>
        <div class="forklift-process">
            <div class="process-gallery-panel arrival">
                <img src="{{ asset('img/proceso_montacargas/montacargas_inicio.jpg') }}" alt="Montacargas al llegar al taller, vista lateral">
                <img src="{{ asset('img/proceso_montacargas/montacargas_inicio_2.jpg') }}" alt="Estado inicial del montacargas durante la revisión">
                <img src="{{ asset('img/proceso_montacargas/montacargas_inicio_3.jpg') }}" alt="Montacargas en proceso de reparación">
                <div class="process-status">
                    <strong>Antes</strong>
                    <span>Así llegó el equipo a taller</span>
                </div>
            </div>
            <div class="process-gallery-panel">
                <img src="{{ asset('img/proceso_montacargas/montacargas_final.jpg') }}" alt="Montacargas Hyundai luego de la reparación">
                <div class="process-status">
                    <strong>Después</strong>
                    <span>Equipo preparado para volver a operación</span>
                </div>
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
                <div class="icon">🔩</div>
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

    <!-- CTA FINAL -->
    <section class="final-cta">
        <div class="final-cta-inner">
            <span class="badge-tag">Conversemos</span>
            <h2>¿Tu equipo necesita una revisión técnica?</h2>
            <p>Cuéntanos qué modelo tienes, qué está ocurriendo y cuándo apareció la falla. Así podremos indicarte el siguiente paso.</p>
            <a class="hero-cta" href="{{ url('/servicios') }}">Consultar por mi equipo</a>
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
                <a class="maps-link" href="https://www.google.com/maps?q=-11.97648588056262,-77.09879588161199" target="_blank" rel="noopener noreferrer">
                    Abrir en Google Maps <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
            <div class="maps-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d243.93565657886091!2d-77.09912613985315!3d-11.976542734818327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1smaquitec'i%20sac!5e0!3m2!1ses-419!2spe!4v1793945057393!5m2!1ses-419!2spe"
                    title="Mapa de ubicación de MAQUITEC"
                    loading="lazy"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    @include('footer.bottom')

    <script>
        (() => {
            const canvas = document.querySelector('.story-image .micro-slats');
            const storyPanel = canvas?.closest('.story-grid');
            if (!canvas || !storyPanel) return;

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

            storyPanel.addEventListener('pointermove', (event) => {
                if (event.pointerType === 'touch') return;

                const bounds = storyPanel.getBoundingClientRect();
                pointer.x = event.clientX - bounds.left;
                pointer.y = event.clientY - bounds.top;
                pointer.active = true;

                if (reducedMotion) draw(performance.now());
                else startAnimation();
            });

            storyPanel.addEventListener('pointerleave', () => {
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