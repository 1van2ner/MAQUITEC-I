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
            height: 88vh;
            min-height: 620px;
            max-height: 820px;
        }

        .hero-slider.is-draggable {
            cursor: grab;
            touch-action: pan-y;
            user-select: none;
        }

        .hero-slider.is-draggable.is-dragging { cursor: grabbing; }
        .hero-slider.is-draggable .hero-bg-img,
        .hero-slider.is-draggable .hero-overlay { pointer-events: none; }

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
            max-width: 760px;
        }

        .hero-slide.active .hero-content {
            animation: hero-enter 800ms cubic-bezier(0.2, 0.7, 0.2, 1) both;
        }

        @keyframes hero-enter {
            from { opacity: 0; transform: translateY(22px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-content h1 {
            font-size: clamp(3rem, 5vw, 5rem);
            font-weight: 900;
            color: #ffffff;
            line-height: 1.05;
            margin: 0 0 22px 0;
            letter-spacing: -0.02em;
            text-transform: uppercase;
            text-shadow: 0 4px 12px rgba(0,0,0,0.5);
        }

        .hero-content h1 span {
            color: var(--amarillo);
            display: block;
        }

        .hero-content p {
            font-size: clamp(1.05rem, 1.65vw, 1.35rem);
            color: #e2e8f0;
            line-height: 1.5;
            margin: 0 0 36px 0;
            font-weight: 500;
            text-shadow: 0 2px 8px rgba(0,0,0,0.6);
        }

        .btn-hero {
            background: var(--amarillo);
            color: #000000;
            padding: 18px 40px;
            border-radius: 8px;
            font-weight: 800;
            text-decoration: none;
            font-size: 1.12rem;
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

        .seccion-destacados {
            max-width: 1680px;
            width: 100%;
            padding: 80px 2.5%;
        }

        .seccion-categorias {
            max-width: 1680px;
            width: 100%;
            margin: 60px auto;
            padding: 0 2.5%;
            text-align: center;
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

        .seccion h2, .seccion-destacados h2, .seccion-categorias h2 {
            margin: 0;
            font-size: 2.2rem;
            letter-spacing: -0.02em;
            color: var(--texto-claro);
            font-weight: 800;
        }

        .seccion p.lead, .seccion-destacados p.lead, .seccion-categorias p.lead {
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

        /* --- SECCIÓN PRODUCTOS DESTACADOS INTERACTIVOS --- */
        .cards {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(4, 1fr);
            max-width: 1600px;
            margin: 0 auto;
            padding: 0 2%;
        }

        .card-link {
            display: block;
            height: 100%;
            color: inherit;
            text-decoration: none;
        }

        .card {
            height: 100%;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), border-color 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .card-link:hover .card, .card-link:focus-visible .card {
            transform: translateY(-8px);
            border-color: var(--amarillo);
            box-shadow: 0 16px 36px rgba(247, 213, 71, 0.2);
        }

        .card img {
            width: 100%;
            height: 240px;
            object-fit: contain;
            background: #ffffff;
            padding: 16px;
            transition: transform 0.35s ease;
        }

        .card-link:hover img, .card-link:focus-visible img {
            transform: scale(1.06);
        }

        .card-content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .card-content strong {
            font-size: 1.1rem;
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .card-content p {
            margin: 0 0 14px;
            color: var(--texto-muted);
            line-height: 1.5;
            font-size: 0.88rem;
            flex-grow: 1;
        }

        .card-quote-action {
            margin-top: auto;
            background: var(--amarillo);
            color: #000;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            font-weight: 800;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        /* --- SECCIÓN NUESTRAS CATEGORÍAS (MÁS AMPLIAS Y ELEGANTES) --- */
        .grid-categorias {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 28px;
            margin-top: 40px;
        }

        .tarjeta-categoria {
            background: var(--amarillo);
            border-radius: 22px;
            padding: 32px 24px;
            min-height: 230px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            text-align: center;
            text-decoration: none;
            color: var(--negro);
            border: 2px solid #e5c338;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.35);
        }

        .tarjeta-categoria:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(247, 213, 71, 0.28), 0 12px 28px rgba(0, 0, 0, 0.45);
            border-color: #ffffff;
        }

        .tarjeta-categoria .icono-wrapper {
            width: 52px;
            height: 52px;
            background: var(--negro);
            color: var(--amarillo);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }

        .tarjeta-categoria .icono-wrapper svg { width: 26px; height: 26px; }

        .tarjeta-categoria h3 {
            font-size: 1.12rem;
            font-weight: 800;
            margin: 8px 0;
            letter-spacing: 0.04em;
            color: var(--negro);
            line-height: 1.3;
        }

        .tarjeta-categoria p {
            font-size: 0.9rem;
            color: #27272a;
            margin: 0 0 14px;
            line-height: 1.4;
            font-weight: 500;
        }

        .tarjeta-categoria .badge-productos {
            background: var(--negro);
            color: var(--amarillo);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 800;
            letter-spacing: 0.02em;
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

        .static-banner-section {
            width: 100%;
            background: #121316;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .static-banner {
            width: 100%;
            aspect-ratio: 1557 / 672;
            height: auto;
            overflow: hidden;
        }

        .static-banner img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: contain;
            object-position: center;
        }

        .managed-banner-section .hero-slider {
            aspect-ratio: 16 / 9;
            height: auto;
            min-height: 0;
            max-height: none;
            max-width: 900px;
            margin: 0 auto;
        }

        .circular-banner-carousel {
            width: min(1200px, 96vw);
            height: clamp(420px, 54vw, 680px);
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            perspective: 1500px;
            touch-action: pan-y;
            cursor: grab;
            user-select: none;
        }

        .circular-banner-carousel.is-dragging {
            cursor: grabbing;
        }

        .circular-banner-stage {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transform-style: preserve-3d;
        }

        .circular-banner-card {
            position: absolute;
            width: clamp(360px, 58vw, 680px);
            aspect-ratio: 16 / 9;
            overflow: hidden;
            border-radius: 12px;
            background: #17191d;
            border: 1px solid rgba(247, 213, 71, 0.18);
            box-shadow:
                0 18px 36px rgba(0, 0, 0, 0.38),
                0 0 0 8px rgba(255, 255, 255, 0.025);
            transform-origin: center center;
            transition: transform 700ms cubic-bezier(0.22, 1, 0.36, 1), opacity 700ms ease, filter 700ms ease;
            will-change: transform, opacity;
        }

        .circular-banner-card img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            pointer-events: none;
        }

        .circular-banner-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 45%, rgba(0, 0, 0, 0.48));
            pointer-events: none;
        }

        .circular-banner-card.is-active {
            filter: none;
            z-index: 10;
            border-color: rgba(247, 213, 71, 0.82);
            box-shadow:
                0 28px 54px rgba(0, 0, 0, 0.58),
                0 0 0 8px rgba(247, 213, 71, 0.09),
                0 0 30px rgba(247, 213, 71, 0.12);
        }

        .circular-banner-card.is-active::before {
            content: "";
            position: absolute;
            top: 10px;
            left: 10px;
            width: 58px;
            height: 3px;
            z-index: 7;
            border-radius: 999px;
            background: var(--amarillo);
            box-shadow: 0 0 12px rgba(247, 213, 71, 0.8);
        }

        .circular-banner-card:not(.is-active) {
            filter: brightness(0.68) saturate(0.82);
        }

        .circular-banner-caption {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 14px;
            z-index: 2;
            color: #ffffff;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.75);
            pointer-events: none;
        }

        .circular-banner-caption strong {
            display: block;
            font-size: clamp(0.85rem, 2vw, 1.15rem);
            line-height: 1.15;
            text-transform: uppercase;
        }

        .circular-banner-caption span {
            display: block;
            margin-top: 5px;
            font-size: 0.76rem;
            opacity: 0.86;
        }

        .circular-banner-dots {
            position: absolute;
            left: 50%;
            bottom: 16px;
            z-index: 20;
            display: flex;
            gap: 7px;
            transform: translateX(-50%);
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(0, 0, 0, 0.62);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.28);
        }

        .circular-banner-dots .dot {
            position: static;
            background: rgba(255, 255, 255, 0.48);
            cursor: pointer;
        }

        .circular-banner-dots .dot.active {
            width: 28px;
            background: var(--amarillo);
            box-shadow: 0 0 10px rgba(247, 213, 71, 0.6);
        }

        .managed-banner-section {
            width: 100%;
            padding: 34px 3%;
            position: relative;
            overflow: hidden;
            isolation: isolate;
            background:
                linear-gradient(135deg, rgba(247, 213, 71, 0.06), transparent 22%, transparent 78%, rgba(247, 213, 71, 0.05)),
                radial-gradient(circle at 50% 45%, rgba(247, 213, 71, 0.13), transparent 34%),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.018) 0 1px, transparent 1px 54px),
                repeating-linear-gradient(0deg, rgba(255, 255, 255, 0.012) 0 1px, transparent 1px 54px),
                #0b0c0f;
            border-top: 1px solid rgba(247, 213, 71, 0.12);
            border-bottom: 1px solid rgba(247, 213, 71, 0.12);
        }

        .managed-banner-section::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background:
                radial-gradient(ellipse at 50% 100%, rgba(247, 213, 71, 0.22), transparent 38%);
            pointer-events: none;
        }

        .managed-banner-section::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 18px;
            width: min(820px, 78%);
            height: 34px;
            transform: translateX(-50%);
            border-radius: 50%;
            background: rgba(247, 213, 71, 0.08);
            filter: blur(18px);
            pointer-events: none;
        }

        .managed-banner-section .hero-bg-img {
            object-fit: cover;
            object-position: center;
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

        /* RESPONSIVE */
        @media (max-width: 1280px) {
            .cards, .grid-categorias { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 1024px) {
            .features-container { grid-template-columns: repeat(2, 1fr); }
            .feature-item { border-right: none; border-bottom: 1px solid #e2e8f0; }
            .feature-item:nth-child(3), .feature-item:nth-child(4) { border-bottom: none; }
            .hero-slider { height: 72vh; min-height: 520px; max-height: 760px; }
        }

        @media (max-width: 768px) {
            .seccion { padding-left: 3%; padding-right: 3%; }
            .static-banner {
                height: clamp(280px, 72vw, 360px);
                aspect-ratio: auto;
            }
            .static-banner img {
                object-fit: cover;
                object-position: center;
            }
            .cards, .grid-categorias { gap: 12px; }
            .card img { height: 140px; object-fit: contain; }
            .card-content { padding: 12px; gap: 8px; }
            .card-content strong { font-size: 0.76rem; }
            .card-content p { font-size: 0.78rem; overflow-wrap: anywhere; }
            .tarjeta-categoria { padding: 16px 10px; border-radius: 12px; }
            .icono-wrapper { width: 44px; height: 44px; margin-bottom: 12px; }
            .icono-wrapper svg { width: 22px; height: 22px; }
            .tarjeta-categoria h3 { font-size: 0.82rem; }
            .tarjeta-categoria p { font-size: 0.76rem; margin-bottom: 12px; overflow-wrap: anywhere; }
            .badge-productos { padding: 6px 8px; font-size: 0.68rem; }
            .features-container { grid-template-columns: 1fr; }
            .feature-item { border-bottom: 1px solid #e2e8f0; }
            .feature-item:last-child { border-bottom: none; }
            .hero-slider { height: 58vh; min-height: 460px; max-height: 620px; }
            .brand-box { width: 120px; }
            .circular-banner-carousel {
                width: 100%;
                height: 300px;
            }
            .circular-banner-card {
                width: min(82vw, 520px);
            }
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
            .maps-section { padding: 44px 3%; }
            .maps-header {
                align-items: flex-start;
                flex-direction: column;
                padding: 22px 18px;
            }
            .maps-title { font-size: 1.2rem; }
            .maps-container { height: 340px; }
        }

        @media (max-width: 640px) {
            .cards, .grid-categorias {
                grid-template-columns: 1fr;
                gap: 16px;
            }
        }
    </style>
</head>
<body>

    @include('footer.top')

    <section class="static-banner-section" aria-label="Banner principal de servicios especializados">
        <div class="static-banner">
            <img src="{{ asset('img/logo_pagina_general/fondo_servicios_2.jpg') }}" alt="Servicios especializados para maquinaria pesada">
        </div>
    </section>

    <!-- PRODUCTOS DESTACADOS -->
    <section class="seccion seccion-destacados" id="productos">
        <div class="seccion-header">
            <span class="badge-tag">Catálogo Selecto</span>
            <h2>Nuestros productos destacados</h2>
            <p class="lead">Equipamiento robusto y de alto rendimiento diseñado para resistir las exigencias del sector industrial y pesado.</p>
        </div>

        <div class="cards">
            @forelse($productosDestacados as $producto)
                <a href="{{ url('/productos/cotizar/' . ($producto->slug ?? 'montacargas')) }}" class="card-link">
                    <article class="card">
                        <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
                        <div class="card-content">
                            <strong>{{ $producto->nombre }}</strong>
                            <p>{{ Str::limit($producto->descripcion, 75) }}</p>
                            <div class="card-quote-action">Cotizar Producto</div>
                        </div>
                    </article>
                </a>
            @empty
                <div style="grid-column: span 4; text-align: center; padding: 40px; color: var(--texto-muted); background: rgba(0,0,0,0.5); border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                    <p>Pronto agregaremos productos destacados a esta sección.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- SECCIÓN DE CATEGORÍAS -->
    <section class="seccion seccion-categorias">
        <div class="seccion-header">
            <span class="badge-tag">Especialidades</span>
            <h2>Nuestras Categorías</h2>
            <p class="lead">Encuentra los componentes, refacciones y maquinarias exactas para tu flota.</p>
        </div>

        <div class="grid-categorias">
            @foreach($categorias as $categoria)
                <a href="{{ route('productos.index', ['categoria' => $categoria->id]) }}" class="tarjeta-categoria">
                    <div class="icono-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3>{{ strtoupper($categoria->nombre) }}</h3>
                    <p>{{ $categoria->descripcion ?? 'Equipos y componentes especializados.' }}</p>
                    <span class="badge-productos">{{ $categoria->productos_count + $categoria->children->sum('productos_count') }} productos</span>
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
                <h2>Marcas Autorizadas</h2>
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

    @if(isset($banners) && $banners->isNotEmpty())
        <section class="managed-banner-section hero-banner-section" aria-label="Banners destacados">
            <div class="circular-banner-carousel {{ $banners->count() > 1 ? 'is-draggable' : '' }}" tabindex="0">
                <div class="circular-banner-stage">
                @foreach($banners as $index => $banner)
                    <article class="circular-banner-card {{ $index === 0 ? 'is-active' : '' }}" data-index="{{ $index }}">
                        @if($banner->enlace)
                            <a href="{{ $banner->enlace }}" aria-label="{{ $banner->titulo }}" style="position:absolute; inset:0; z-index:5;"></a>
                        @endif
                        <img src="{{ asset($banner->imagen) }}" alt="{{ $banner->titulo }}" draggable="false">
                        @if($banner->titulo || $banner->subtitulo)
                            <div class="circular-banner-caption">
                                @if($banner->titulo)
                                    <strong>{!! nl2br(e($banner->titulo)) !!}</strong>
                                @endif
                                @if($banner->subtitulo)
                                    <span>{{ $banner->subtitulo }}</span>
                                @endif
                            </div>
                        @endif
                    </article>
                @endforeach
                </div>

                @if($banners->count() > 1)
                    <div class="circular-banner-dots" aria-label="Controles del carrusel circular">
                        @foreach($banners as $index => $banner)
                            <span class="dot {{ $index === 0 ? 'active' : '' }}" role="button" tabindex="0" aria-label="Mostrar banner {{ $index + 1 }}" data-slide="{{ $index }}"></span>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

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
        document.querySelectorAll('.circular-banner-carousel').forEach((carousel) => {
            const cards = Array.from(carousel.querySelectorAll('.circular-banner-card'));
            const dots = Array.from(carousel.querySelectorAll('.dot'));
            if (!cards.length) return;

            let currentIndex = 0;
            let timer = null;
            let dragStart = null;
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            const wrapOffset = (index) => {
                let offset = index - currentIndex;
                const half = cards.length / 2;
                if (offset > half) offset -= cards.length;
                if (offset < -half) offset += cards.length;
                return offset;
            };

            const render = () => {
                cards.forEach((card, index) => {
                    const offset = wrapOffset(index);
                    const absoluteOffset = Math.abs(offset);
                    const cardWidth = card.offsetWidth || 680;
                    const x = offset * cardWidth * 0.62;
                    const y = absoluteOffset * 10;
                    const z = -absoluteOffset * 220;
                    const rotateY = offset * -24;
                    const scale = Math.max(0.58, 1 - absoluteOffset * 0.16);
                    const opacity = absoluteOffset > 2 ? 0.15 : 1 - absoluteOffset * 0.16;

                    card.style.transform = `translate3d(${x}px, ${y}px, ${z}px) rotateY(${rotateY}deg) scale(${scale})`;
                    card.style.opacity = opacity;
                    card.style.zIndex = String(100 - absoluteOffset * 10);
                    card.classList.toggle('is-active', index === currentIndex);
                });
                dots.forEach((dot, index) => dot.classList.toggle('active', index === currentIndex));
            };

            const showSlide = (index) => {
                currentIndex = (index + cards.length) % cards.length;
                render();
            };

            const startTimer = () => {
                clearInterval(timer);
                if (cards.length > 1 && !prefersReducedMotion && !document.hidden) {
                    timer = setInterval(() => showSlide(currentIndex + 1), 6000);
                }
            };

            cards.forEach((card, index) => {
                card.addEventListener('click', () => {
                    if (index !== currentIndex) {
                        showSlide(index);
                        startTimer();
                    }
                });
            });

            dots.forEach((dot, index) => {
                const activate = () => {
                    showSlide(index);
                    startTimer();
                };
                dot.addEventListener('click', activate);
                dot.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        activate();
                    }
                });
            });

            carousel.addEventListener('pointerdown', (event) => {
                if (event.pointerType === 'mouse' && event.button !== 0) return;
                dragStart = event.clientX;
                carousel.classList.add('is-dragging');
                clearInterval(timer);
            });
            carousel.addEventListener('pointerup', (event) => {
                if (dragStart === null) return;
                const distance = event.clientX - dragStart;
                if (Math.abs(distance) > 50) showSlide(currentIndex + (distance < 0 ? 1 : -1));
                dragStart = null;
                carousel.classList.remove('is-dragging');
                startTimer();
            });
            carousel.addEventListener('pointercancel', () => {
                dragStart = null;
                carousel.classList.remove('is-dragging');
            });
            carousel.addEventListener('keydown', (event) => {
                if (event.key === 'ArrowLeft') showSlide(currentIndex - 1);
                if (event.key === 'ArrowRight') showSlide(currentIndex + 1);
                if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') startTimer();
            });
            carousel.addEventListener('mouseenter', () => clearInterval(timer));
            carousel.addEventListener('mouseleave', startTimer);
            document.addEventListener('visibilitychange', startTimer);
            window.addEventListener('resize', render);

            render();
            startTimer();
        });

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