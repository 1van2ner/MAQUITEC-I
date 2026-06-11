<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizar Producto - MAQUITEC I.S.A.C.</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #1a1a1a; --blanco: #ffffff; --gris: #f4f4f4; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; color: var(--negro); background: var(--gris); }
        img { display: block; max-width: 100%; }
        a { color: inherit; text-decoration: none; }
        .top-bar { background: linear-gradient(90deg, #111111, #222222); color: var(--blanco); padding: 10px 6%; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 12px; font-size: 0.9rem; }
        .logo { display: flex; align-items: center; gap: 16px; }
        .logo img { width: 88px; height: 88px; object-fit: contain; border-radius: 18px; box-shadow: 0 14px 30px rgba(0,0,0,0.3); }
        nav { display: flex; align-items: center; justify-content: space-between; padding: 18px 6%; background: #111111; border-bottom: 4px solid var(--amarillo); position: sticky; top: 0; z-index: 20; }
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
        .quote-form button,
        .cta a {
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
        .quote-form button:hover,
        .cta a:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(0,0,0,0.18);
            background: var(--amarillo);
            border-color: #e0b800;
        }
        .menu .button-link:active,
        .btn:active,
        .quote-form button:active,
        .cta a:active {
            transform: translateY(0px) scale(0.98);
            box-shadow: 0 8px 18px rgba(0,0,0,0.14);
        }
        .hero { display: grid; place-items: center; min-height: 320px; text-align: center; color: var(--blanco); background: linear-gradient(180deg, rgba(0,0,0,0.7), rgba(0,0,0,0.5)), url('img/img_maquitec1.jpg') center/cover no-repeat; }
        .hero h1 { margin: 0; font-size: clamp(2.2rem, 5vw, 3.4rem); letter-spacing: 0.08em; }
        .hero p { max-width: 760px; margin: 16px auto 0; font-size: 1rem; line-height: 1.8; color: rgba(255,255,255,0.92); }
        .content { padding: 70px 6%; max-width: 1080px; margin: 0 auto; }
        .content h2 { margin: 0 0 18px; font-size: 2.2rem; }
        .content p { color: #444; line-height: 1.8; }
        .highlight { display: grid; gap: 18px; grid-template-columns: 1.2fr 0.8fr; margin-top: 36px; }
        .product-summary { padding: 30px; background: var(--blanco); border-radius: 24px; box-shadow: 0 18px 40px rgba(0,0,0,0.08); }
        .product-summary img { width: 100%; border-radius: 20px; margin-bottom: 20px; box-shadow: 0 16px 32px rgba(0,0,0,0.12); }
        .product-summary h3 { margin: 0 0 14px; font-size: 1.5rem; }
        .product-summary p { margin: 0; color: #555; }
        .quote-form { padding: 30px; background: var(--blanco); border-radius: 24px; box-shadow: 0 18px 40px rgba(0,0,0,0.08); }
        .quote-form label { display: block; margin-bottom: 10px; font-weight: 700; }
        .quote-form input, .quote-form textarea { width: 100%; padding: 14px 16px; margin-bottom: 18px; border: 1px solid #d4d4d4; border-radius: 14px; font-size: 1rem; }
        .quote-form textarea { min-height: 160px; resize: vertical; }
        .quote-form button { padding: 14px 28px; border: 2px solid var(--amarillo); border-radius: 999px; background: rgba(255,215,0,0.14); color: var(--negro); font-weight: 700; cursor: pointer; transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease, border-color 0.2s ease; box-shadow: 0 10px 22px rgba(0,0,0,0.12); }
        .message { margin-bottom: 24px; padding: 18px 22px; border-radius: 18px; background: #f0f5e7; color: #333; border: 1px solid rgba(34,96,0,0.18); }
        footer { background: var(--negro); color: #ddd; padding: 40px 6%; }
        .footer-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 30px; max-width: 1080px; margin: 0 auto; }
        .footer-grid h3 { color: var(--amarillo); margin-bottom: 12px; }
        .footer-grid p, .footer-grid a { color: #ccc; line-height: 1.8; }
        .footer-bottom { margin-top: 24px; text-align: center; color: #777; }
        @media (max-width: 900px) { .highlight { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="top-bar">
        <span>Av. Javier Prado Este 8325, Ate, Lima, Perú</span>
        <span>📞 974 390 945 | 997 591 068</span>
        <span>✉ ventas@maquitec.com</span>
    </div>
    <nav>
        <div class="logo">
            <img src="{{ asset('img/logo_maquitec.jpg') }}" alt="Logo Maquitec">
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
            <h1>Cotizar {{ $productTitle }}</h1>
            <p>Envía tu consulta directamente sobre este producto. Esta interfaz está dedicada exclusivamente a la selección de productos desde la página de productos.</p>
        </div>
    </section>
    <section class="content">
        @if(session('message'))
            <div class="message">{{ session('message') }}</div>
        @endif
        <div class="highlight">
            <div class="product-summary">
                <img src="{{ asset($productImage) }}" alt="{{ $productTitle }}">
                <h3>Producto seleccionado</h3>
                <p><strong>{{ $productTitle }}</strong></p>
                <p>{{ $productDescription }}</p>
            </div>
            <div class="quote-form">
                <form method="post" action="/productos/cotizar">    
                    @csrf
                    <input type="hidden" name="product" value="{{ $slug }}">
                    <label for="name">Nombre</label>
                    <input id="name" name="name" type="text" placeholder="Nombre del usuario" required>
                    <label for="company">Empresa</label>
                    <input id="company" name="company" type="text" placeholder="Nombre de la empresa" required>
                    <label for="email">Correo electrónico</label>
                    <input id="email" name="email" type="email" placeholder="correo@empresa.com" required>
                    <label for="phone">Teléfono</label>
                    <input id="phone" name="phone" type="tel" placeholder="+51 9XX XXX XXX" required>
                    <label for="message">Consulta</label>
                    <textarea id="message" name="message" placeholder="Cuéntanos qué necesitas y responderemos con la mejor oferta." required></textarea>
                    <button type="submit">Enviar consulta</button>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-grid">
            <div><h3>MAQUITEC I.S.A.C.</h3><p>Av. Javier Prado Este 8325, Ate, Lima, Perú</p></div>
            <div><h3>Enlaces</h3><p><a href="/">Inicio</a></p><p><a href="/nosotros">Nosotros</a></p><p><a href="/productos">Productos</a></p></div>
            <div><h3>Contacto</h3><p>Teléfono: 974 390 945</p><p>Email: ventas@maquitec.com</p></div>
        </div>
        <div class="footer-bottom">© 2026 MAQUITEC I.S.A.C.</div>
    </footer>
</body>
</html>
