<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #1a1a1a; --blanco: #ffffff; --gris: #f4f4f4; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; color: var(--negro); background: var(--gris); }
        img { display: block; max-width: 100%; }
        a { color: inherit; text-decoration: none; }
        .top-bar { background: linear-gradient(90deg, #111111, #222222); color: var(--blanco); padding: 10px 6%; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 12px; font-size: 0.9rem; }
        .top-bar span { display: inline-flex; align-items: center; gap: 8px; }
        .top-bar a { color: var(--amarillo); }
        nav { display: flex; align-items: center; justify-content: space-between; padding: 18px 6%; background: #111111; border-bottom: 4px solid var(--amarillo); position: sticky; top: 0; z-index: 20; }
        .logo { display: flex; align-items: center; gap: 16px; }
        .logo img { width: 84px; height: 84px; object-fit: contain; border-radius: 18px; box-shadow: 0 14px 30px rgba(0,0,0,0.3); }
        .logo-text strong { font-size: 1.25rem; color: var(--amarillo); letter-spacing: 0.06em; }
        .logo-text span { color: var(--blanco); font-size: 0.95rem; }
        .menu { display: flex; align-items: center; gap: 24px; flex-wrap: wrap; }
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
        .hero { display: grid; place-items: center; min-height: 420px; text-align: center; color: var(--blanco); background: linear-gradient(180deg, rgba(0,0,0,0.7), rgba(0,0,0,0.5)), url('img/img_maquitec3.jpg') center/cover no-repeat; }
        .hero h1 { margin: 0; font-size: clamp(2.4rem, 5vw, 3.8rem); letter-spacing: 0.08em; }
        .hero p { max-width: 720px; margin: 18px auto 0; font-size: 1rem; line-height: 1.8; color: rgba(255,255,255,0.9); }
        .content { padding: 70px 6%; max-width: 1180px; margin: 0 auto; }
        .intro { display: flex; flex-wrap: wrap; gap: 24px; margin-bottom: 40px; }
        .intro div { flex: 1; min-width: 280px; }
        .intro h2 { font-size: 2.3rem; margin: 0 0 18px; }
        .intro p { color: #444; line-height: 1.8; }
        .product-grid { display: grid; gap: 24px; grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .product-card { background: var(--blanco); border-radius: 22px; overflow: hidden; box-shadow: 0 18px 40px rgba(0,0,0,0.08); }
        .product-card a { display: block; }
        .product-card img { width: 100%; height: 220px; object-fit: cover; transition: transform 0.25s ease; }
        .product-card a:hover img { transform: scale(1.02); }
        .product-card-content { padding: 24px; }
        .product-card-content h3 { margin: 0 0 14px; font-size: 1.25rem; }
        .product-card-content p { margin: 0; color: #555; line-height: 1.7; }
        .note { margin-top: 18px; color: #333; max-width: 720px; }
        .cta { margin-top: 40px; display: flex; justify-content: center; }
        footer { background: var(--negro); color: #ddd; padding: 40px 6%; }
        .footer-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 30px; max-width: 1180px; margin: 0 auto; }
        .footer-grid h3 { color: var(--amarillo); }
        .footer-grid p, .footer-grid a { color: #ccc; line-height: 1.8; }
        .footer-bottom { margin-top: 24px; text-align: center; color: #777; }
        @media (max-width: 960px) { .product-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (max-width: 720px) { .product-grid { grid-template-columns: 1fr; } .hero { min-height: 360px; } }
    </style>
</head>
<body>
    <div class="top-bar">
        <span>Av. San Agustín SMP, Lima, Perú</span>
        <span>📞 963 727 185 | 955 081 815</span>
        <span>✉ ventas@maquitec.com</span>
    </div>
    <nav>
        <div class="logo">
            <img src="img/logo_maquitec.jpg" alt="Logo Maquitec">
            <div class="logo-text"><strong>MAQUITEC I.S.A.C.</strong><span>Soluciones industriales en movimiento</span></div>
        </div>
        <div class="menu">
            <a href="/">Inicio</a>
            <a href="/nosotros">Nosotros</a>
            <a href="/productos" class="active">Productos</a>
            <a href="/servicios">Servicios</a>
        </div>
    </nav>
    <section class="hero">
        <div>
            <h1>Productos industriales confiables</h1>
            <p>Encuentra repuestos y accesorios para tus equipos industriales de la mejor calidad.</p>
        </div>
    </section>
    <section class="content">
        <div class="intro">
            <div>
                <h2>Repuestos</h2>
                <p>En MAQUITEC ofrecemos una amplia gama de repuestos que cubren las necesidades de mantenimiento de tus equipos industriales.</p>
                <p class="note">Selecciona el producto que deseas cotizar. Cada imagen abre una interfaz separada para enviar tu consulta de manera directa y exclusiva.</p>
            </div>
        </div>
        <div class="product-grid">
            <article class="product-card">
                <a href="/productos/cotizar/montacargas" aria-label="Cotizar Montacargas y carretillas"><img src="img/img_maquitec1.jpg" alt="Montacargas y carretillas"></a>
                <div class="product-card-content"><h3>Montacargas y carretillas</h3><p>Soluciones resistentes para movilizar carga en bodegas, talleres y líneas de producción.</p></div>
            </article>
            <article class="product-card">
                <a href="/productos/cotizar/reposapies" aria-label="Cotizar Reposapiés y equipos de apoyo"><img src="img/img_maquitec2.jpg" alt="Reposapiés y equipos de apoyo"></a>
                <div class="product-card-content"><h3>Reposapiés y equipos de apoyo</h3><p>Productos que complementan la operación segura y eficiente del personal y la maquinaria.</p></div>
            </article>
            <article class="product-card">
                <a href="/productos/cotizar/componentes" aria-label="Cotizar Componentes y repuestos"><img src="img/img_maquitec3.jpg" alt="Componentes y repuestos"></a>
                <div class="product-card-content"><h3>Componentes y repuestos</h3><p>Disponemos de piezas clave para mantenimiento y reposición de equipos industriales.</p></div>
            </article>
            <article class="product-card">
                <a href="/productos/cotizar/accesorios" aria-label="Cotizar Accesorios especializados"><img src="img/img_maquitec4.jpg" alt="Accesorios especializados"></a>
                <div class="product-card-content"><h3>Accesorios especializados</h3><p>Herramientas y accesorios para soluciones a medida de cada cliente.</p></div>
            </article>
            <article class="product-card">
                <a href="/productos/cotizar/accesorios" aria-label="Cotizar Accesorios especializados"><img src="img/img_maquitec4.jpg" alt="Accesorios especializados"></a>
                <div class="product-card-content"><h3>Accesorios especializados</h3><p>Herramientas y accesorios para soluciones a medida de cada cliente.</p></div>
            </article>
            <article class="product-card">
                <a href="/productos/cotizar/accesorios" aria-label="Cotizar Accesorios especializados"><img src="img/img_maquitec4.jpg" alt="Accesorios especializados"></a>
                <div class="product-card-content"><h3>Accesorios especializados</h3><p>Herramientas y accesorios para soluciones a medida de cada cliente.</p></div>
            </article>
        </div>

        <div class="intro" style="margin-top: 60px;">
            <div>
                <h2>Accesorios</h2>
                <p>En MAQUITEC ofrecemos una amplia gama de accesorios especializados para complementar tus equipos industriales.</p>
                <p class="note">Selecciona el producto que deseas cotizar. Cada imagen abre una interfaz separada para enviar tu consulta de manera directa y exclusiva.</p>
            </div>
        </div>
        <div class="product-grid">
            <article class="product-card">
                <a href="/productos/cotizar/montacargas" aria-label="Cotizar Montacargas y carretillas"><img src="img/img_maquitec1.jpg" alt="Montacargas y carretillas"></a>
                <div class="product-card-content"><h3>Montacargas y carretillas</h3><p>Soluciones resistentes para movilizar carga en bodegas, talleres y líneas de producción.</p></div>
            </article>
            <article class="product-card">
                <a href="/productos/cotizar/reposapies" aria-label="Cotizar Reposapiés y equipos de apoyo"><img src="img/img_maquitec2.jpg" alt="Reposapiés y equipos de apoyo"></a>
                <div class="product-card-content"><h3>Reposapiés y equipos de apoyo</h3><p>Productos que complementan la operación segura y eficiente del personal y la maquinaria.</p></div>
            </article>
            <article class="product-card">
                <a href="/productos/cotizar/componentes" aria-label="Cotizar Componentes y repuestos"><img src="img/img_maquitec3.jpg" alt="Componentes y repuestos"></a>
                <div class="product-card-content"><h3>Componentes y repuestos</h3><p>Disponemos de piezas clave para mantenimiento y reposición de equipos industriales.</p></div>
            </article>
            <article class="product-card">
                <a href="/productos/cotizar/accesorios" aria-label="Cotizar Accesorios especializados"><img src="img/img_maquitec4.jpg" alt="Accesorios especializados"></a>
                <div class="product-card-content"><h3>Accesorios especializados</h3><p>Herramientas y accesorios para soluciones a medida de cada cliente.</p></div>
            </article>
            <article class="product-card">
                <a href="/productos/cotizar/accesorios" aria-label="Cotizar Accesorios especializados"><img src="img/img_maquitec4.jpg" alt="Accesorios especializados"></a>
                <div class="product-card-content"><h3>Accesorios especializados</h3><p>Herramientas y accesorios para soluciones a medida de cada cliente.</p></div>
            </article>
            <article class="product-card">
                <a href="/productos/cotizar/accesorios" aria-label="Cotizar Accesorios especializados"><img src="img/img_maquitec4.jpg" alt="Accesorios especializados"></a>
                <div class="product-card-content"><h3>Accesorios especializados</h3><p>Herramientas y accesorios para soluciones a medida de cada cliente.</p></div>
            </article>
        </div>

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
</body>
</html>