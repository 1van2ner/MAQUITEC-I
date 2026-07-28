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

        .menu a:hover {
            color: var(--negro);
            transform: translateY(-2px);
            background: var(--amarillo);
            border-color: #e0b800;
            box-shadow: 0 14px 30px rgba(0,0,0,0.18);
        }
        .menu a:active {
            transform: translateY(0px) scale(0.98);
            box-shadow: 0 8px 18px rgba(0,0,0,0.14);
        }

        .menu .button-link,
        .btn,
        .cta a,
        .hero-cta a,
        .quote-form button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border-radius: 999px;
            background: rgba(255,215,0,0.14);
            color: var(--negro);
            text-decoration: none;
            font-weight: 700;
            border: 2px solid var(--amarillo);
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease, border-color 0.2s ease;
            box-shadow: 0 10px 22px rgba(0,0,0,0.12);
        }

        .menu .button-link:hover,
        .btn:hover,
        .cta a:hover,
        .hero-cta a:hover,
        .quote-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(0,0,0,0.18);
            background: var(--amarillo);
            border-color: #e0b800;
        }
        .menu .button-link:active,
        .btn:active,
        .cta a:active,
        .hero-cta a:active,
        .quote-form button:active {
            transform: translateY(0px) scale(0.98);
            box-shadow: 0 8px 18px rgba(0,0,0,0.14);
        }

        .hero-cta .btn-secondary {
            border: 1px solid var(--negro);
            background: var(--blanco);
            color: var(--negro);
        }

        .hero-cta .btn-secondary:hover {
            background: #f8f0b1;
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
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary {
            background: var(--negro);
            color: var(--amarillo);
        }

        .btn-secondary {
            background: var(--blanco);
            border: 1px solid var(--negro);
            color: var(--negro);
        }

        .hero-cta a:hover { transform: translateY(-2px); box-shadow: 0 18px 40px rgba(0,0,0,0.18); }

        @media (max-width: 900px) {
            nav { flex-wrap: wrap; gap: 12px; }
            .menu-toggle { display: inline-flex; }
            .menu {
                display: none;
                width: 100%;
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
                padding-top: 8px;
            }
            .menu.open { display: flex; }
            .menu a { width: 100%; min-width: 0; }
            .cards { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .footer-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 640px) {
            .top-bar { justify-content: center; text-align: center; }
            .logo { width: 100%; justify-content: space-between; }
            .cards { grid-template-columns: 1fr; }
            .hero { min-height: 460px; }
            .hero-inner { padding: 0 20px; }
            .seccion { padding: 60px 20px; }
        }

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

        .section-highlight {
            background: linear-gradient(135deg, rgba(255,215,0,0.14), rgba(255,255,255,0.8));
            padding: 80px 6%;
        }

        .section-highlight .seccion {
            text-align: center;
        }

        .section-highlight .highlight-grid {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            margin-top: 40px;
        }

        .brands-banner {
            position: relative;
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            margin-top: 40px;
            align-items: stretch;
        }

        .brand-card {
            position: relative;
            min-height: 240px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 22px 50px rgba(0,0,0,0.16);
            background-size: cover;
            background-position: center;
        }

        .brand-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0,0,0,0.12), rgba(0,0,0,0.55));
        }

        .brand-card .brand-text {
            position: absolute;
            inset: 0;
            display: grid;
            place-items: center;
            padding: 24px;
            text-align: center;
            color: var(--blanco);
            z-index: 1;
            font-size: clamp(1.6rem, 2vw, 2.3rem);
            letter-spacing: 0.08em;
            font-weight: 800;
        }

        /* Brands label: use same heading styling as other sections (no black pill) */
        .brands-label {
            margin: 36px auto 18px;
            max-width: 960px;
            text-align: center;
        }

        .brands-label h2,
        .brands-label h3 {
            margin: 0;
            font-size: clamp(1.6rem, 2vw, 2.2rem);
            letter-spacing: 0.06em;
            color: var(--negro);
            font-weight: 800;
        }

        .highlight-card-content {
            padding: 24px;
            display: grid;
            gap: 14px;
            flex: 1;
        }

        .highlight-card-content h3 {
            margin: 0;
            font-size: 1.4rem;
        }

        .highlight-card-content p {
            margin: 0;
            color: #ddd;
            line-height: 1.8;
        }

        .partner-slider {
            position: relative;
            margin: 48px auto 0; /* increased gap from brands above */
            max-width: 920px;
            width: calc(100% - 32px);
            min-width: 320px;
        }

        .partner-track {
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
            gap: 14px;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            padding: 0 8px 6px;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            /* hide native scrollbar but keep scroll functionality */
            -ms-overflow-style: none; /* IE 10+ */
            scrollbar-width: none; /* Firefox */
        }

        .partner-track::-webkit-scrollbar { display: none; }

        .partner-logo {
            flex: 0 0 200px;
            min-width: 200px;
            max-width: 200px;
            height: 100px;
            background: var(--blanco);
            border-radius: 14px;
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 26px rgba(0,0,0,0.08);
            scroll-snap-align: center;
        }

        .partner-logo img {
            max-height: 64px;
            width: auto;
            object-fit: contain;
        }

        .partner-arrow {
            position: absolute;
            top: 50%;
            width: 36px;
            height: 36px;
            border: 2px solid var(--negro);
            border-radius: 14px;
            background: var(--blanco);
            color: var(--negro);
            display: grid;
            place-items: center;
            cursor: pointer;
            transform: translateY(-50%);
            box-shadow: 0 14px 30px rgba(0,0,0,0.16);
            z-index: 3;
        }

        .partner-arrow:hover {
            background: #f4f4f4;
        }

        .partner-arrow-left {
            left: 4px;
        }

        .partner-arrow-right {
            right: 4px;
        }

        .partner-helper {
            margin-top: 12px;
            text-align: center;
            color: #555;
            font-size: 0.95rem;
            letter-spacing: 0.02em;
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

        .footer-bottom {
            margin-top: 40px;
            text-align: center;
            color: #777;
            font-size: 0.9rem;
        }

        @media (max-width: 1100px) {
            .cards, .section-highlight .highlight-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .partners { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        }

        @media (max-width: 760px) {
            .top-bar { text-align: center; }
            nav { flex-direction: column; align-items: flex-start; padding: 20px 6%; }
            .menu { width: 100%; justify-content: space-between; }
            .hero::before, .hero::after { display: none; }
            .hero { min-height: 420px; padding: 60px 6%; }
            .cards, .section-highlight .highlight-grid, .partners, .footer-grid { grid-template-columns: 1fr; }
            .footer-grid { text-align: center; }
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <span>Av. San Agustin, SMP, Lima, Perú</span>
        <span>📞 955 081 815 | 963   727 185</span>
        <span>✉ ventas@maquitec.com</span>
    </div>

    <nav>
        <div class="logo">
            <img src="img/logo_maquitec.jpg" alt="Logo Maquitec">
            <div class="logo-text">
                <strong>MAQUITEC I.S.A.C.</strong>
                <span>Soluciones industriales de movimiento</span>
            </div>
        </div>

        <button class="menu-toggle" type="button" aria-label="Abrir menú" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
        <div class="menu">
            <a href="/">Inicio</a>
            <a href="/nosotros">Nosotros</a>
            <a href="/productos">Productos</a>
            <a href="/servicios">Servicios</a>
        </div>
    </nav>

    <section class="hero" id="inicio">
        <div class="hero-inner">
            <h1>SOMOS LA SOLUCIÓN INMEDIATA</h1>
            <p>Equipos y soporte técnico para maquinaria pesada-logistica y soluciones industriales con respaldo de marcas líderes.</p>
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
            <article class="card">
                <img src="img/img_maquitec1.jpg" alt="Producto 1">
                <div class="card-content">
                    <strong>Equipo industrial 1</strong>
                    <p>Máquinas robustas diseñadas para alto desempeño en fábricas y almacenes.</p>
                </div>
            </article>
            <article class="card">
                <img src="img/img_maquitec2.jpg" alt="Producto 2">
                <div class="card-content">
                    <strong>Equipo industrial 2</strong>
                    <p>Componentes duraderos que aseguran operaciones seguras y sin interrupciones.</p>
                </div>
            </article>
            <article class="card">
                <img src="img/img_maquitec3.jpg" alt="Producto 3">
                <div class="card-content">
                    <strong>Equipo industrial 3</strong>
                    <p>Soluciones adaptables para diferentes procesos logísticos y de almacenaje.</p>
                </div>
            </article>
            <article class="card">
                <img src="img/img_maquitec4.jpg" alt="Producto 4">
                <div class="card-content">
                    <strong>Equipo industrial 4</strong>
                    <p>Diseño moderno y fácil mantenimiento para maximizar la productividad.</p>
                </div>
            </article>
        </div>
    </section>

    <section class="section-highlight" id="servicios">
        <div class="seccion">
            <h2>Servicios que brindamos</h2>
            <p class="lead">Brindamos servicios completos-complementarios para instalación, asesoría y mantenimiento general.</p>
        </div>

        <div class="brands-banner">
            <div class="brand-card" style="background-image: url('img/hangcha.jpg');"></div>
            <div class="brand-card" style="background-image: url('img/heli.jpg');"></div>
            <div class="brand-card" style="background-image: url('img/hyundai.jpg');"></div>
        </div>

        <div class="brands-label"><h2>Marcas con las que trabajamos</h2></div>

        <div class="partner-slider">
            <button type="button" class="partner-arrow partner-arrow-left" aria-label="Mover a la izquierda">‹</button>
            <div class="partner-track">
                <div class="partner-logo"><img src="img/hyster.jpg" alt="Hyster"></div>
                <div class="partner-logo"><img src="img/tcm.jpg" alt="TCM"></div>
                <div class="partner-logo"><img src="img/yale.jpg" alt="Yale"></div>
                <div class="partner-logo"><img src="img/crown.jpg" alt="Crown"></div>
                <div class="partner-logo"><img src="img/hyundai.jpg" alt="Hyundai"></div>
                <div class="partner-logo"><img src="img/hangcha.jpg" alt="Hangcha"></div>
                <div class="partner-logo"><img src="img/caterpillar.jpg" alt="Caterpillar"></div>
                <div class="partner-logo"><img src="img/komatsu.jpg" alt="Komatsu"></div>
                <div class="partner-logo"><img src="img/toyota.jpg" alt="Toyota"></div>
            </div>
            <button type="button" class="partner-arrow partner-arrow-right" aria-label="Mover a la derecha">›</button>
        </div>
        <div class="partner-helper">Desliza con las flechas o arrastra para ver más marcas</div>
    </section>

    <footer id="contacto">
        <div class="footer-grid">
            <div class="footer-contact">
                <h3>Contacto</h3>
                <address>
                    <p>Av. San Agustín SMP, Lima, Perú</p>
                    <p>Tel: <a href="tel:+51963727185">963 727 185</a> &nbsp;|&nbsp; <a href="tel:+51987654321">987 654 321</a></p>
                    <p>Email: <a href="mailto:info@maquitec.com">info@maquitec.com</a></p>
                </address>
            </div>

            <div class="footer-links">
                <h3>Enlaces rápidos</h3>
                <ul>
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/nosotros">Nosotros</a></li>
                    <li><a href="/productos">Productos</a></li>
                    <li><a href="/servicios">Servicios</a></li>
                </ul>
            </div>

            <div class="footer-social">
                <h3>Síguenos</h3>
                <p>Puedes contactarnos en nuestras redes sociales y obtener más información sobre nuestros productos y servicios.</p>
                <p>IG: @maquitec'i s.a.c.</p>
                <p>FB: @maquitec'i s.a.c.</p>
            </div>
        </div>

        <div class="footer-bottom">© 2026 MAQUITEC I.S.A.C. — Todas las marcas usadas pertenecen a sus respectivos propietarios.</div>
    </footer>

    <script>
        const partnerTrack = document.querySelector('.partner-track');
        const partnerLeft = document.querySelector('.partner-arrow-left');
        const partnerRight = document.querySelector('.partner-arrow-right');
        const menuToggle = document.querySelector('.menu-toggle');
        const menu = document.querySelector('.menu');

        if (menuToggle && menu) {
            menuToggle.addEventListener('click', function () {
                const isOpen = menu.classList.toggle('open');
                menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                menuToggle.setAttribute('aria-label', isOpen ? 'Cerrar menú' : 'Abrir menú');
            });
        }

        if (partnerTrack && partnerLeft && partnerRight) {
            const getScrollAmount = () => Math.max(220, Math.round(partnerTrack.clientWidth * 0.7));

            partnerLeft.addEventListener('click', () => {
                const amount = getScrollAmount();
                if (partnerTrack.scrollBy) {
                    partnerTrack.scrollBy({ left: -amount, behavior: 'smooth' });
                } else {
                    partnerTrack.scrollLeft -= amount;
                }
            });

            partnerRight.addEventListener('click', () => {
                const amount = getScrollAmount();
                if (partnerTrack.scrollBy) {
                    partnerTrack.scrollBy({ left: amount, behavior: 'smooth' });
                } else {
                    partnerTrack.scrollLeft += amount;
                }
            });
        }
    </script>
</body>
</html> 