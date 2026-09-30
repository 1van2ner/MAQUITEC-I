<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos y Equipos - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #f7d547;
            --amarillo-hover: #e5c338;
            --amarillo-oscuro: #caaa2b;
            --negro: #000000;
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* BARRA SUPERIOR DE NAVEGACIÓN DE RUTA */
        .top-nav-bar {
            background: rgba(18, 19, 22, 0.85);
            padding: 18px 6%;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 1rem;
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

        /* ESTRUCTURA PRINCIPAL DEL CATÁLOGO */
        .catalog-container {
            max-width: 1440px;
            margin: 50px auto;
            padding: 0 4%;
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 40px;
            width: 100%;
        }

        /* SIDEBAR / CATEGORÍAS EN TARJETA AMARILLA */
        .sidebar {
            background: var(--amarillo);
            border-radius: 20px;
            padding: 32px 28px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            border: 1px solid #e5c338;
            height: fit-content;
            color: var(--negro);
        }

        .sidebar h3 {
            font-size: 1.15rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--negro);
            margin: 0 0 20px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 2px solid rgba(0, 0, 0, 0.15);
            padding-bottom: 16px;
            font-weight: 800;
        }

        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .category-item a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 18px;
            border-radius: 12px;
            color: #1f2937;
            text-decoration: none;
            font-size: 1.02rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .category-item a:hover {
            background: rgba(0, 0, 0, 0.08);
            color: var(--negro);
        }

        .category-item a.active {
            background: var(--negro);
            color: var(--amarillo);
            font-weight: 700;
        }

        .category-count {
            background: rgba(0, 0, 0, 0.1);
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 0.88rem;
            color: #27272a;
            font-weight: 700;
        }

        .category-item a.active .category-count {
            background: var(--amarillo);
            color: var(--negro);
        }

        /* CONTENIDO PRINCIPAL Y GRILLA */
        .catalog-content {
            display: flex;
            flex-direction: column;
            gap: 32px;
        }

        .catalog-header-bar {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 22px 30px;
            border-radius: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(8px);
        }

        .catalog-header-bar span {
            font-size: 1.08rem;
            color: var(--texto-muted);
            font-weight: 500;
        }

        .catalog-header-bar strong {
            color: var(--amarillo);
        }

        /* GRILLA DE PRODUCTOS - EKSKAKTO A 3 COLUMNAS */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        /* TARJETA DE PRODUCTO */
        .product-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
            backdrop-filter: blur(10px);
        }

        .product-card:hover {
            transform: translateY(-6px);
            border-color: var(--amarillo);
            box-shadow: 0 16px 36px rgba(247, 213, 71, 0.18);
        }

        .product-image-container {
            width: 100%;
            height: 240px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 20px;
        }

        .product-image-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image-container img {
            transform: scale(1.06);
        }

        .product-info {
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex-grow: 1;
        }

        .product-category-tag {
            font-size: 0.78rem;
            text-transform: uppercase;
            font-weight: 800;
            color: var(--amarillo);
            letter-spacing: 0.08em;
        }

        .product-title {
            margin: 0;
            font-size: 1.15rem;
            color: var(--texto-claro);
            font-weight: 700;
            line-height: 1.35;
        }

        .product-action {
            padding: 0 24px 24px 24px;
        }

        .btn-cotizar {
            display: block;
            width: 100%;
            text-align: center;
            background: var(--amarillo);
            color: var(--negro);
            padding: 14px;
            border-radius: 12px;
            font-weight: 800;
            text-decoration: none;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            transition: all 0.2s ease;
            box-shadow: 0 6px 16px rgba(247, 213, 71, 0.2);
        }

        .btn-cotizar:hover {
            background: var(--amarillo-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(247, 213, 71, 0.35);
        }

        .catalog-container {
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
            .catalog-container { animation: none; }
        }

        .no-products {
            grid-column: 1 / -1;
            background: rgba(255, 255, 255, 0.02);
            padding: 80px 20px;
            text-align: center;
            border-radius: 20px;
            border: 1px dashed rgba(255, 255, 255, 0.15);
            color: var(--texto-muted);
            font-size: 1.15rem;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 1200px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 900px) {
            .catalog-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    @include('footer.top')

    <div class="top-nav-bar">
        <a href="{{ url('/') }}">Inicio</a> &gt; <span>Productos y Equipos</span>
    </div>

    <div class="catalog-container">
        <!-- BARRA LATERAL (SIDEBAR DE CATEGORÍAS) -->
        <aside class="sidebar">
            <h3>🗂️ Categorías</h3>
            <ul class="category-list">
                <li class="category-item">
                    <a href="{{ route('productos.index') }}" class="{{ !request('categoria') ? 'active' : '' }}">
                        <span>Todos los productos</span>
                        <span class="category-count">{{ $totalProductos }}</span>
                    </a>
                </li>
                @foreach($categorias as $cat)
                    <li class="category-item">
                        <a href="{{ route('productos.index', ['categoria' => $cat->id]) }}" class="{{ request('categoria') == $cat->id ? 'active' : '' }}">
                            <span>{{ $cat->nombre }}</span>
                            <span class="category-count">{{ $cat->productos_count }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>

        <!-- CONTENIDO PRINCIPAL (GRILLA DE PRODUCTOS) -->
        <main class="catalog-content">
            <div class="catalog-header-bar">
                <span>
                    @if($categoriaActual)
                        Mostrando productos de: <strong>{{ $categoriaActual->nombre }}</strong>
                    @else
                        Mostrando todos los productos
                    @endif
                    ({{ $productos->count() }} encontrados)
                </span>
            </div>

            <div class="products-grid">
                @forelse($productos as $producto)
                    <div class="product-card">
                        <div class="product-image-container">
                            @if(!empty($producto->imagen) && file_exists(public_path($producto->imagen)))
                                <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
                            @else
                                <img src="{{ asset('img/img_maquitec1.jpg') }}" alt="Maquitec Producto">
                            @endif
                        </div>
                        <div class="product-info">
                            <span class="product-category-tag">{{ $producto->categoria->nombre ?? 'Maquinaria' }}</span>
                            <h4 class="product-title">{{ $producto->nombre }}</h4>
                        </div>
                        <div class="product-action">
                            <a href="{{ url('/productos/cotizar/' . ($producto->slug ?? 'montacargas')) }}" class="btn-cotizar">Cotizar Producto</a>
                        </div>
                    </div>
                @empty
                    <div class="no-products">
                        <p>No hay productos registrados en esta categoría actualmente.</p>
                    </div>
                @endforelse
            </div>
        </main>
    </div>

    @include('footer.bottom')

    <script>
        const revealElements = document.querySelectorAll('.sidebar, .catalog-header-bar, .product-card');
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