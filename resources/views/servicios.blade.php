<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #1a1a1a; --blanco: #ffffff; --gris: #f4f4f4; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; color: var(--negro); background: var(--gris); }
        img { display: block; max-width: 100%; }
        a { color: inherit; text-decoration: none; }
        .top-bar { background: linear-gradient(90deg, #111111, #222222); color: var(--blanco); padding: 10px 6%; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 12px; font-size: 0.9rem; }
        .top-bar a { color: var(--amarillo); }
        nav { display: flex; align-items: center; justify-content: space-between; padding: 18px 6%; background: #111111; border-bottom: 4px solid var(--amarillo); position: sticky; top: 0; z-index: 20; }
        .logo { display: flex; align-items: center; gap: 16px; }
        .logo img { width: 84px; height: 84px; object-fit: contain; border-radius: 18px; box-shadow: 0 14px 30px rgba(0,0,0,0.3); }
        .logo-text strong { font-size: 1.25rem; color: var(--amarillo); letter-spacing: 0.06em; }
        .logo-text span { color: var(--blanco); font-size: 0.95rem; }
        .menu { display: flex; align-items: center; gap: 24px; flex-wrap: wrap; }
        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 4px;
            border: 0;
            background: transparent;
            cursor: pointer;
            padding: 6px;
        }
        .menu-toggle span { display: block; width: 24px; height: 2px; background: var(--blanco); border-radius: 999px; }
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
        .menu a.active, .menu a:hover {
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
        .btn,
        .cta a,
        .menu .button-link,
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
        .btn:hover,
        .cta a:hover,
        .menu .button-link:hover,
        .quote-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(0,0,0,0.18);
            background: var(--amarillo);
            border-color: #e0b800;
        }
        .btn:active,
        .cta a:active,
        .menu .button-link:active,
        .quote-form button:active {
            transform: translateY(0px) scale(0.98);
            box-shadow: 0 8px 18px rgba(0,0,0,0.14);
        }
        .hero { display: grid; place-items: center; min-height: 420px; text-align: center; color: var(--blanco); background: linear-gradient(180deg, rgba(0,0,0,0.7), rgba(0,0,0,0.5)), url('img/heli.jpg') center/cover no-repeat; }
        .hero h1 { margin: 0; font-size: clamp(2.4rem, 5vw, 3.8rem); letter-spacing: 0.08em; }
        .hero p { max-width: 720px; margin: 18px auto 0; font-size: 1rem; line-height: 1.8; color: rgba(255,255,255,0.9); }
        .content { padding: 70px 6%; max-width: 1180px; margin: 0 auto; }
        .intro { display: grid; gap: 24px; margin-bottom: 40px; }
        .intro h2 { font-size: 2.3rem; margin: 0; }
        .intro p { color: #444; line-height: 1.8; }
        .service-grid { display: grid; gap: 24px; grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .service-card { background: var(--blanco); border-radius: 22px; padding: 28px; box-shadow: 0 18px 40px rgba(0,0,0,0.08); }
        .service-card h3 { margin: 0 0 16px; font-size: 1.3rem; }
        .service-card p { margin: 0; color: #555; line-height: 1.75; }
        .highlight { margin-top: 40px; display: flex; gap: 24px; flex-wrap: wrap; align-items: center; justify-content: space-between; }
        .highlight div { flex: 1 1 320px; background: #111111; color: var(--blanco); border-radius: 22px; padding: 28px; }
        .highlight h3 { margin-top: 0; }
        .highlight p { color: rgba(255,255,255,0.88); }
        .cta { margin-top: 40px; display: flex; justify-content: center; }
        footer { background: var(--negro); color: #ddd; padding: 40px 6%; }
        .footer-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 30px; max-width: 1180px; margin: 0 auto; }
        .footer-grid h3 { color: var(--amarillo); }
        .footer-grid p, .footer-grid a { color: #ccc; line-height: 1.8; }
        .footer-bottom { margin-top: 24px; text-align: center; color: #777; }
        @media (max-width: 960px) {
            nav { flex-wrap: wrap; gap: 12px; }
            .menu-toggle { display: inline-flex; }
            .menu { display: none; width: 100%; flex-direction: column; align-items: stretch; gap: 10px; padding-top: 8px; }
            .menu.open { display: flex; }
            .menu a { width: 100%; min-width: 0; }
            .service-grid { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 680px) { .top-bar, nav { padding-left: 16px; padding-right: 16px; } .hero { min-height: 380px; } }
    </style>
</head>
<body>
    <div class="top-bar">
        <span>Av. San Agustín SMP, Lima, Perú</span>
        <span>📞 963 727 185 | 955 081 815</span>
        <span>✉ info@maquitec.com</span>
    </div>
    <nav>
        <div class="logo">
            <img src="img/logo_maquitec.jpg" alt="Logo Maquitec">
            <div class="logo-text"><strong>MAQUITEC I.S.A.C.</strong><span>Soluciones industriales en movimiento</span></div>
        </div>
        <button class="menu-toggle" type="button" aria-label="Abrir menú" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
        <div class="menu">
            <a href="/">Inicio</a>
            <a href="/nosotros">Nosotros</a>
            <a href="/productos">Productos</a>
            <a href="/servicios" class="active">Servicios</a>
        </div>
    </nav>
    <section class="hero">
        <div>
            <h1>Servicios especializados adecuados a tus necesidades</h1>
            <p>Asesoría, instalación y mantenimiento de equipos pesados y de logística para asegurar operaciones seguras, productivas y confiables.</p>
        </div>
    </section>
    <section class="content">
        <div class="intro"><h2>Qué hacemos</h2><p>Ofrecemos servicios completos en manejo de carga, grúas, montacargas y equipos industriales:</p></div>
        <div class="service-grid">
            <article class="service-card"><h3>Instalación de equipos</h3><p>Colocamos y configuramos su maquinaria con soporte técnico en sitio para que entre en operación rápidamente.</p></article>
            <article class="service-card"><h3>Mantenimiento preventivo</h3><p>Planes periódicos para reducir fallas, alargar la vida útil de sus equipos y mejorar la productividad.</p></article>
            <article class="service-card"><h3>Reparación rápida</h3><p>Atención urgente para minimizar tiempos de inactividad y restaurar operaciones industriales.</p></article>
            <article class="service-card"><h3>Asesoría técnica</h3><p>Evaluamos su operación y recomendamos equipos y mejoras que optimizan flujos logísticos.</p></article>
        </div>
        <div class="highlight">
            <div><h3>Marcas & confianza</h3><p>Trabajamos con proveedores internacionales reconocidos y garantizamos respaldo técnico en cada proyecto.</p></div>
            <div><h3>Atención profesional</h3><p>Equipo especializado con experiencia en proyectos industriales, mineros y logísticos.</p></div>
        </div>
        <div class="cta"><a href="/productos">Ver productos</a></div>
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
        const toggle = document.querySelector('.menu-toggle');
        const menu = document.querySelector('.menu');

        if (toggle && menu) {
            toggle.addEventListener('click', function () {
                const isOpen = menu.classList.toggle('open');
                toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                toggle.setAttribute('aria-label', isOpen ? 'Cerrar menú' : 'Abrir menú');
            });
        }
    </script>
</body>
</html>