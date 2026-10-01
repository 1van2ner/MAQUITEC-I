<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizar {{ $productTitle }} - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #f7d547;
            --amarillo-hover: #e5c338;
            --negro: #000000;
            --negro-card: rgba(255, 255, 255, 0.03);
            --borde-card: rgba(255, 255, 255, 0.08);
            --texto-claro: #ffffff;
            --texto-muted: #a1a1aa;
        }

        * { box-sizing: border-box; }

        /* FONDO ESTILO METAL CEPILLADO OSCURO */
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* NAVEGACIÓN SUPERIOR / BREADCRUMB */
        .top-nav-bar {
            background: rgba(18, 19, 22, 0.85);
            padding: 18px 6%;
            border-bottom: 1px solid var(--borde-card);
            font-size: 0.95rem;
            color: var(--texto-muted);
            backdrop-filter: blur(10px);
        }
        .top-nav-bar a {
            color: var(--amarillo);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }
        .top-nav-bar a:hover {
            color: var(--amarillo-hover);
            text-decoration: underline;
        }
        .top-nav-bar span {
            color: var(--texto-claro);
            font-weight: 500;
        }

        /* BANNER CABECERA DE COTIZACIÓN */
        .quote-hero {
            text-align: center;
            padding: 50px 20px 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .quote-hero h1 {
            margin: 0 0 12px 0;
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 800;
            color: var(--texto-claro);
            letter-spacing: -0.02em;
        }

        .quote-hero h1 span {
            color: var(--amarillo);
        }

        .quote-hero p {
            margin: 0;
            color: var(--texto-muted);
            font-size: 1.05rem;
            line-height: 1.6;
        }

        /* CONTENEDOR PRINCIPAL */
        .content-container {
            padding: 30px 4% 80px;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .message-alert {
            margin-bottom: 30px;
            padding: 18px 22px;
            border-radius: 14px;
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            border: 1px solid rgba(34, 197, 94, 0.3);
            font-weight: 600;
            text-align: center;
        }

        .message-alert-error {
            background: rgba(239, 68, 68, 0.14);
            color: #fca5a5;
            border-color: rgba(239, 68, 68, 0.35);
            text-align: left;
        }

        .message-alert-error ul { margin: 8px 0 0; padding-left: 22px; }

        /* GRILLA DOS COLUMNAS */
        .quote-grid {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 40px;
            align-items: start;
        }

        /* TARJETA RESUMEN DE PRODUCTO */
        .product-summary-card {
            background: var(--negro-card);
            border-radius: 20px;
            border: 1px solid var(--borde-card);
            padding: 32px;
            backdrop-filter: blur(10px);
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.4);
        }

        .product-image-box {
            width: 100%;
            height: 280px;
            background: #ffffff;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 24px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .product-image-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .product-summary-card .tag {
            font-size: 0.8rem;
            text-transform: uppercase;
            font-weight: 800;
            color: var(--amarillo);
            letter-spacing: 0.08em;
            margin-bottom: 8px;
            display: block;
        }

        .product-summary-card h3 {
            margin: 0 0 14px 0;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--texto-claro);
            line-height: 1.3;
        }

        .product-summary-card p {
            margin: 0;
            color: var(--texto-muted);
            line-height: 1.7;
            font-size: 0.98rem;
        }

        /* FORMULARIO DE COTIZACIÓN */
        .quote-form-card {
            background: var(--negro-card);
            border-radius: 20px;
            border: 1px solid var(--borde-card);
            padding: 36px;
            backdrop-filter: blur(10px);
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.4);
        }

        .quote-form-card h2 {
            margin: 0 0 20px 0;
            font-size: 1.4rem;
            color: var(--texto-claro);
            border-bottom: 1px solid var(--borde-card);
            padding-bottom: 12px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .quote-form-card label {
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--texto-muted);
        }

        .quote-form-card input, 
        .quote-form-card textarea {
            width: 100%;
            padding: 14px 16px;
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid var(--borde-card);
            border-radius: 12px;
            color: var(--texto-claro);
            font-size: 0.98rem;
            font-family: inherit;
            outline: none;
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .quote-form-card input:focus, 
        .quote-form-card textarea:focus {
            border-color: var(--amarillo);
            box-shadow: 0 0 0 3px rgba(247, 213, 71, 0.15);
        }

        .quote-form-card textarea {
            min-height: 140px;
            resize: vertical;
        }

        .btn-send-quote {
            width: 100%;
            background: var(--amarillo);
            color: var(--negro);
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 8px 20px rgba(247, 213, 71, 0.2);
            margin-top: 10px;
        }

        .btn-send-quote:hover {
            background: var(--amarillo-hover);
            transform: translateY(-2px);
            box-shadow: 0 12px 26px rgba(247, 213, 71, 0.35);
        }

        .btn-send-quote:active {
            transform: translateY(0);
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 900px) {
            .quote-grid {
                grid-template-columns: 1fr;
            }
            .form-row {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }
    </style>
</head>
<body>

    @include('footer.top')

    <div class="top-nav-bar">
        <a href="{{ url('/') }}">Inicio</a> &gt; 
        <a href="{{ route('productos.index') }}">Productos</a> &gt; 
        <span>Cotizar</span>
    </div>

    <section class="quote-hero">
        <h1>Cotizar <span>{{ $productTitle }}</span></h1>
        <p>Completa tus datos a continuación y nos pondremos en contacto contigo a la brevedad con una propuesta personalizada.</p>
    </section>

    <section class="content-container">
        @if(session('message'))
            <div class="message-alert">
                {{ session('message') }}
            </div>
        @endif

        @if($errors->any())
            <div class="message-alert message-alert-error" role="alert">
                <strong>No pudimos enviar tu solicitud:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="quote-grid">
            <!-- COLUMNA IZQUIERDA: RESUMEN DE PRODUCTO -->
            <div class="product-summary-card">
                <div class="product-image-box">
                    <img src="{{ asset($productImage) }}" alt="{{ $productTitle }}">
                </div>
                <span class="tag">Equipo Seleccionado</span>
                <h3>{{ $productTitle }}</h3>
                <p>{{ $productDescription }}</p>
            </div>

            <!-- COLUMNA DERECHA: FORMULARIO -->
            <div class="quote-form-card">
                <h2>Datos de Contacto</h2>
                
                <form method="POST" action="{{ url('/productos/cotizar') }}">
                    @csrf
                    <input type="hidden" name="product" value="{{ old('product', $slug) }}">

                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nombre completo *</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Ej. Juan Pérez" required>
                        </div>
                        <div class="form-group">
                            <label for="company">Empresa *</label>
                            <input id="company" name="company" type="text" value="{{ old('company') }}" placeholder="Nombre de tu empresa" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Correo electrónico *</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="correo@empresa.com" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono / WhatsApp *</label>
                            <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" placeholder="+51 9XX XXX XXX" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message">Detalle de la consulta *</label>
                        <textarea id="message" name="message" placeholder="Cuéntanos qué requerimientos específicos o tiempo de alquiler/compra necesitas..." required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn-send-quote">Enviar Solicitud de Cotización</button>
                </form>
            </div>
        </div>
    </section>

    @include('footer.bottom')

</body>
</html>