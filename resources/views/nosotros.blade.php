<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #FFD700;
            --negro: #1a1a1a;
            --blanco: #ffffff;
            --gris: #f6f6f6;
        }

        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; color: var(--negro); background: var(--gris); }
        img { display: block; max-width: 100%; }
        a { color: inherit; text-decoration: none; }

        .top-bar {
            background: linear-gradient(90deg, #111111, #232323);
            color: var(--blanco);
            padding: 12px 6%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            font-size: 0.95rem;
        }
        .top-bar span { display: inline-flex; align-items: center; gap: 8px; }
        .top-bar a { color: var(--amarillo); }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 6%;
            background: #111111;
            border-bottom: 4px solid var(--amarillo);
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .logo { display: flex; align-items: center; gap: 16px; }
        .logo img { width: 84px; height: 84px; object-fit: contain; border-radius: 18px; box-shadow: 0 12px 28px rgba(0,0,0,0.22); }
        .logo-text strong { font-size: 1.25rem; color: var(--amarillo); letter-spacing: 0.06em; }
        .logo-text span { font-size: 0.95rem; color: var(--blanco); }

        .menu { display: flex; align-items: center; gap: 24px; flex-wrap: wrap; }
        .menu a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 110px;
            padding: 10px 18px;
            font-weight: 700;
            color: var(--blanco);
            background: rgba(255,215,0,0.22);
            border: 2px solid var(--amarillo);
            border-radius: 999px;
            text-decoration: none;
            transition: color 0.2s ease, transform 0.2s ease, background 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 10px 22px rgba(0,0,0,0.12);
        }
        .menu a:hover,
        .menu a.active {
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

        .hero {
            position: relative;
            display: grid;
            place-items: center;
            min-height: 420px;
            text-align: center;
            color: var(--blanco);
            background: linear-gradient(180deg, rgba(26,26,26,0.82), rgba(26,26,26,0.82)), url('img/logo_maquitec.jpg') center/cover no-repeat;
        }

        .hero h1 { margin: 0; font-size: clamp(2.4rem, 5vw, 3.8rem); letter-spacing: 0.08em; text-transform: uppercase; }
        .hero p { margin: 18px auto 0; max-width: 680px; color: rgba(255,255,255,0.88); font-size: 1rem; line-height: 1.8; }

        .content { padding: 70px 6%; max-width: 1160px; margin: 0 auto; background: var(--blanco); border-radius: 28px; box-shadow: 0 22px 45px rgba(0,0,0,0.08); }
        .content h2 { font-size: 2.3rem; margin-bottom: 18px; color: var(--negro); }
        .content p { color: #4a4a4a; line-height: 1.8; margin-bottom: 18px; }

        .grid { display: grid; gap: 24px; grid-template-columns: repeat(2, minmax(0, 1fr)); margin-top: 40px; }
        .card { background: #faf6d6; border-radius: 22px; padding: 28px; box-shadow: 0 22px 45px rgba(0,0,0,0.08); }
        .card h3 { margin-top: 0; font-size: 1.3rem; color: var(--negro); }
        .card p { margin: 0; color: #555; }

        .section-highlight { padding: 60px 6%; background: linear-gradient(180deg, rgba(255,215,0,0.16), rgba(255,215,0,0.04)); border-radius: 28px; }
        .section-highlight h2 { margin-bottom: 26px; color: var(--negro); }
        .brand-grid { display: grid; gap: 16px; grid-template-columns: repeat(4, minmax(0, 1fr)); }
        .brand-grid img { width: 100%; max-height: 80px; object-fit: contain; background: #fff9d6; border-radius: 16px; padding: 14px; }

        footer { background: var(--negro); color: #ccc; padding: 40px 6%; }
        .footer-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 30px; max-width: 1160px; margin: 0 auto; }
        .footer-grid h3 { color: var(--amarillo); margin-bottom: 14px; }
        .footer-grid p, .footer-grid a { color: #bbb; line-height: 1.8; font-size: 0.95rem; }
        .footer-bottom { margin-top: 30px; text-align: center; font-size: 0.9rem; color: #777; }

        @media (max-width: 900px) { .grid { grid-template-columns: 1fr; } }
        @media (max-width: 680px) { .top-bar, nav { padding-left: 16px; padding-right: 16px; } .menu { gap: 14px; } }
    </style>
</head>
<body>
    <div class="top-bar">
        <span>Av. San Agustin, SMP, Lima, Perú</span>
        <span>📞 963 727 185 | 955 081 815</span>
        <span>✉ ventas@maquitec.com</span>
    </div>

    <nav>
        <div class="logo">
            <img src="img/logo_maquitec.jpg" alt="Logo Maquitec">
            <div class="logo-text">
                <strong>MAQUITEC I.S.A.C.</strong>
                <span>Soluciones industriales en movimiento</span>
            </div>
        </div>
        <div class="menu">
            <a href="/">Inicio</a>
            <a href="/nosotros" class="active">Nosotros</a>
            <a href="/productos">Productos</a>
            <a href="/servicios">Servicios</a>
        </div>
    </nav>

    <section class="hero">
        <div>
            <h1>Nosotros</h1>
            <p>Contamos con especialistas con mas de 15 años de experiencia en el ámbito de la industria, MAQUITEC ofrece equipos, asesoría y soporte técnico para operaciones seguras y eficientes.</p>
        </div>
    </section>

    <section class="content">
        <h2>Sobre nuestra empresa</h2>
        <p>MAQUITEC I.S.A.C. es una empresa peruana especializada en la comercialización, ensamblaje y mantenimiento de equipos industriales. Nuestro trabajo está enfocado en clientes que requieren transporte de carga, almacenamiento y manejo de materiales con un enfoque en seguridad y productividad.</p>
        <p>Trabajamos con marcas reconocidas del sector y brindamos un servicio cercano para asesorar en proyectos de logística, construcción e industria pesada. Nuestra meta es ser aliados confiables para cada cliente, desde la selección del equipo hasta el servicio postventa.</p>

        <div class="grid">
            <div class="card">
                <h3>Misión</h3>
                <p>Entregar soluciones industriales completas que faciliten la operación diaria de nuestros clientes, manteniendo altos estándares de calidad y seguridad.</p>
            </div>
            <div class="card">
                <h3>Visión</h3>
                <p>Ser la opción número uno en soluciones de manejo de carga y mantenimiento industrial en el Perú, reconocidos por nuestra experiencia, velocidad de respuesta y confianza.</p>
            </div>
            <div class="card">
                <h3>Valores</h3>
                <p>Compromiso, transparencia, seguridad y calidad. Cada proyecto se atiende con responsabilidad y enfoque en el resultado.</p>
            </div>
            <div class="card">
                <h3>Servicios clave</h3>
                <p>Asesoría técnica, suministro de equipos, mantenimiento preventivo, instalación y gestión de repuestos para equipos industriales.</p>
            </div>
        </div>
    </section>

    <section class="section-highlight">
        <h1>Marcas con las que trabajamos</h1>
        <div class="brand-grid">
            <img src="img/hyster.jpg" alt="Hyster">
            <img src="img/tcm.jpg" alt="TCM">
            <img src="img/yale.jpg" alt="Yale">
            <img src="img/crown.jpg" alt="Crown">
            <img src="img/hyundai.jpg" alt="Hyundai">
            <img src="img/hangcha.jpg" alt="Hangcha">
            <img src="img/clark.jpg" alt="Clark">
        </div>
    </section>

    <footer>
        <div class="footer-grid">
            <div>
                <h3>Contacto</h3>
                <p>Av. San Agustín SMP, Lima, Perú</p>
                <p>Teléfono: 963 727 185 | 955 081 815  </p>
                <p>Email: ventas@maquitec.com</p>
            </div>
            <div>
                <h3>Enlaces</h3>
                <p><a href="/">Inicio</a></p>
                <p><a href="/nosotros">Nosotros</a></p>
                <p><a href="#servicios">Servicios</a></p>
            </div>
            <div>
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