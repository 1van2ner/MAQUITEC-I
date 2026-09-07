<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #FFD700;
            --amarillo-hover: #e0b800;
            --negro: #111111;
            --blanco: #ffffff;
            --gris: #f4f4f4;
            --whatsapp: #25d366;
            --whatsapp-hover: #20ba5a;
        }

        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, sans-serif; color: var(--negro); background: var(--gris); }
        img { display: block; max-width: 100%; }
        a { color: inherit; text-decoration: none; }

        .hero {
            display: grid;
            place-items: center;
            min-height: 420px;
            padding: 40px 20px;
            text-align: center;
            color: var(--blanco);
            background: linear-gradient(180deg, rgba(0,0,0,0.75), rgba(0,0,0,0.6)), url('{{ asset('img/heli.jpg') }}') center/cover no-repeat;
        }
        .hero h1 { margin: 0; font-size: clamp(2.4rem, 5vw, 3.8rem); letter-spacing: 0.08em; }
        .hero p { max-width: 720px; margin: 18px auto 0; line-height: 1.8; color: rgba(255,255,255,0.9); }

        .content { max-width: 1180px; margin: 0 auto; padding: 70px 6%; }
        .intro { margin-bottom: 45px; text-align: center; }
        .intro h2 { margin: 0; font-size: 2.4rem; }
        .intro p { max-width: 700px; margin: 10px auto 0; color: #555; line-height: 1.8; }

        .service-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 30px; }
        .service-card {
            display: flex;
            min-height: 280px;
            flex-direction: column;
            justify-content: space-between;
            padding: 32px;
            background: var(--blanco);
            border: 1px solid #e4e4e7;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        }
        .service-card h3 { margin: 0 0 12px; font-size: 1.35rem; }
        .service-card p { margin: 0 0 24px; color: #52525b; line-height: 1.75; }

        .btn-whatsapp {
            display: inline-flex;
            width: 100%;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 20px;
            background: var(--whatsapp);
            border-radius: 10px;
            color: var(--blanco);
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(37,211,102,0.25);
            transition: background 0.2s ease, transform 0.2s ease;
        }
        .btn-whatsapp:hover { background: var(--whatsapp-hover); transform: translateY(-2px); }
        .btn-whatsapp svg { width: 20px; height: 20px; fill: currentColor; }

        .highlight { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 24px; margin-top: 50px; }
        .highlight div { padding: 32px; background: var(--negro); border-top: 4px solid var(--amarillo); border-radius: 18px; color: var(--blanco); }
        .highlight h3 { margin: 0 0 12px; color: var(--amarillo); }
        .highlight p { margin: 0; color: rgba(255,255,255,0.85); line-height: 1.7; }

        .cta { display: flex; justify-content: center; margin-top: 50px; }
        .btn-productos { padding: 14px 32px; background: var(--amarillo); border: 2px solid var(--amarillo); border-radius: 999px; color: var(--negro); font-weight: 700; box-shadow: 0 10px 22px rgba(0,0,0,0.1); }
        .btn-productos:hover { background: var(--amarillo-hover); border-color: var(--amarillo-hover); }

        @media (max-width: 760px) {
            .service-grid, .highlight { grid-template-columns: 1fr; }
            .content { padding: 55px 20px; }
        }
    </style>
</head>
<body>
    @include('footer.top')

    <section class="hero">
        <div>
            <h1>Servicios especializados adecuados a tus necesidades</h1>
            <p>Asesoría, instalación y mantenimiento de equipos pesados y de logística para asegurar operaciones seguras, productivas y confiables.</p>
        </div>
    </section>

    <section class="content">
        <div class="intro">
            <h2>Qué hacemos</h2>
            <p>Ofrecemos servicios completos en manejo de carga, grúas, montacargas y equipos industriales con respaldo técnico garantizado.</p>
        </div>

        <div class="service-grid">
            <article class="service-card">
                <div><h3>⚙️ Instalación de equipos</h3><p>Colocamos y configuramos su maquinaria con soporte técnico en sitio para que entre en operación rápidamente de manera segura.</p></div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Instalación%20de%20Equipos" target="_blank" rel="noopener" class="btn-whatsapp"><span aria-hidden="true">◉</span> Consultar por WhatsApp</a>
            </article>
            <article class="service-card">
                <div><h3>🛠️ Mantenimiento preventivo</h3><p>Planes periódicos orientados a reducir fallas imprevistas, alargar la vida útil de sus equipos y optimizar la productividad.</p></div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Mantenimiento%20Preventivo" target="_blank" rel="noopener" class="btn-whatsapp"><span aria-hidden="true">◉</span> Consultar por WhatsApp</a>
            </article>
            <article class="service-card">
                <div><h3>🛠️ Reparación rápida</h3><p>Atención de urgencia y diagnóstico especializado para minimizar los tiempos de inactividad de su flota y restaurar operaciones.</p></div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Reparación%20Rápida" target="_blank" rel="noopener" class="btn-whatsapp"><span aria-hidden="true">◉</span> Consultar por WhatsApp</a>
            </article>
            <article class="service-card">
                <div><h3>📋 Asesoría técnica</h3><p>Evaluamos su operación actual y recomendamos las mejores tecnologías y equipos para optimizar sus flujos logísticos y de carga.</p></div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Asesoría%20Técnica" target="_blank" rel="noopener" class="btn-whatsapp"><span aria-hidden="true">◉</span> Consultar por WhatsApp</a>
            </article>
        </div>

        <div class="highlight">
            <div><h3>Marcas & confianza</h3><p>Trabajamos con proveedores internacionales reconocidos y garantizamos respaldo técnico en cada proyecto industrial.</p></div>
            <div><h3>Atención profesional</h3><p>Equipo especializado con sólida experiencia en proyectos industriales, mineros, portuarios y de transporte logístico.</p></div>
        </div>

        <div class="cta"><a href="{{ url('/productos') }}" class="btn-productos">Ver catálogo de productos</a></div>
    </section>

    @include('footer.bottom')
</body>
</html>
