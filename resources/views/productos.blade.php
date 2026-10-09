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

        .top-nav-bar {
            background: rgba(18, 19, 22, 0.85);
            padding: 16px 4%;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
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

        /* --- CONTENEDOR EQUILIBRADO Y MENOS PEGADO A LOS EXTREMOS --- */
        .catalog-container {
            max-width: 1520px; /* Ancho máximo controlado para evitar proporciones desmedidas */
            margin: 30px auto;
            padding: 0 3%; /* Espaciado lateral armonioso */
            display: grid;
            grid-template-columns: 320px 1fr; /* Columna limpia para el sidebar */
            gap: 32px;
            width: 100%;
            align-items: start;
        }

        /* --- SIDEBAR FLOTANTE Y ESTÉTICO (ACOMPAÑA EL SCROLL) --- */
        .sidebar {
            background: var(--amarillo);
            border-radius: 20px;
            padding: 28px 22px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
            border: 2px solid #e5c338;
            color: var(--negro);
            width: 100%;

            /* EFECTO FLOTANTE AL HACER SCROLL */
            position: sticky;
            top: 24px;
            z-index: 10;
            height: fit-content;
        }

        .sidebar h3 {
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--negro);
            margin: 0 0 20px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 2px solid rgba(0, 0, 0, 0.15);
            padding-bottom: 14px;
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

        .category-item {
            position: relative;
        }

        .category-item a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 13px 16px;
            border-radius: 12px;
            color: #111827;
            text-decoration: none;
            font-size: 0.98rem;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .category-item a:hover {
            background: rgba(0, 0, 0, 0.09);
            color: var(--negro);
            transform: translateX(3px);
        }

        .category-item a.active {
            background: var(--negro);
            color: var(--amarillo);
            font-weight: 800;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
        }

        .category-count {
            background: rgba(0, 0, 0, 0.12);
            padding: 4px 10px;
            border-radius: 16px;
            font-size: 0.85rem;
            color: #111827;
            font-weight: 800;
        }

        .category-item a.active .category-count {
            background: var(--amarillo);
            color: var(--negro);
        }

        .subcategory-toggle-icon {
            font-size: 0.75rem;
            margin-left: 6px;
            transition: transform 0.3s ease;
            display: inline-block;
        }

        .subcategory-list {
            list-style: none;
            padding: 6px 0 6px 14px;
            margin: 4px 0 0 0;
            display: none;
            border-left: 2px solid rgba(0, 0, 0, 0.2);
            flex-direction: column;
            gap: 6px;
            animation: subcatSlideDown 0.25s ease forwards;
        }

        .category-item:hover > .subcategory-list,
        .category-item.has-active-child > .subcategory-list,
        .category-item.is-expanded > .subcategory-list {
            display: flex;
        }

        .category-item:hover .subcategory-toggle-icon,
        .category-item.has-active-child .subcategory-toggle-icon,
        .category-item.is-expanded .subcategory-toggle-icon {
            transform: rotate(180deg);
        }

        .subcategory-item a {
            padding: 9px 12px;
            font-size: 0.9rem;
            background: rgba(0, 0, 0, 0.04);
            border-radius: 8px;
        }

        .subcategory-item a:hover {
            background: rgba(0, 0, 0, 0.12);
        }

        .subcategory-item a.active {
            background: var(--negro);
            color: var(--amarillo);
        }

        @keyframes subcatSlideDown {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .catalog-content {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .catalog-header-bar {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 16px 22px;
            border-radius: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(8px);
        }

        .catalog-header-bar span {
            font-size: 1rem;
            color: var(--texto-muted);
            font-weight: 500;
        }

        .catalog-header-bar strong {
            color: var(--amarillo);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 26px;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.09);
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
            box-shadow: 0 16px 32px rgba(247, 213, 71, 0.18);
        }

        .product-image-container {
            width: 100%;
            height: 280px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 14px;
        }

        .product-image-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image-container img {
            transform: scale(1.06);
        }

        .product-info {
            padding: 18px 20px 12px 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex-grow: 1;
        }

        .product-category-tag {
            font-size: 0.75rem;
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
            padding: 0 20px 20px 20px;
        }

        .btn-cotizar {
            display: block;
            width: 100%;
            text-align: center;
            background: var(--amarillo);
            color: var(--negro);
            padding: 13px;
            border-radius: 10px;
            font-weight: 800;
            text-decoration: none;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            transition: all 0.2s ease;
            box-shadow: 0 5px 14px rgba(247, 213, 71, 0.2);
        }

        .btn-cotizar:hover {
            background: var(--amarillo-hover);
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(247, 213, 71, 0.35);
        }

        /* --- ESTILOS DE PAGINACIÓN DISCRETOS Y ORDENADOS --- */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 36px;
            margin-bottom: 20px;
            width: 100%;
        }

        .pagination-wrapper nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .pagination-wrapper ul.pagination {
            display: flex !important;
            flex-direction: row !important;
            list-style: none !important;
            padding: 0 !important;
            margin: 0 !important;
            gap: 6px !important;
            align-items: center !important;
        }

        .pagination-wrapper .page-item {
            margin: 0 !important;
        }

        .pagination-wrapper .page-link {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-width: 40px !important;
            height: 40px !important;
            padding: 0 12px !important;
            background: #18191c !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            border-radius: 8px !important;
            color: #ffffff !important;
            text-decoration: none !important;
            font-weight: 700 !important;
            font-size: 0.9rem !important;
            transition: all 0.2s ease !important;
        }

        .pagination-wrapper svg {
            width: 14px !important;
            height: 14px !important;
            fill: currentColor !important;
            max-width: 14px !important;
            max-height: 14px !important;
        }

        .pagination-wrapper .page-link:hover {
            background: var(--amarillo) !important;
            color: #000000 !important;
            border-color: var(--amarillo) !important;
        }

        .pagination-wrapper .page-item.active .page-link {
            background: var(--amarillo) !important;
            color: #000000 !important;
            border-color: var(--amarillo) !important;
            font-weight: 800 !important;
        }

        .pagination-wrapper .page-item.disabled .page-link {
            background: rgba(255, 255, 255, 0.02) !important;
            color: rgba(255, 255, 255, 0.25) !important;
            border-color: rgba(255, 255, 255, 0.05) !important;
            cursor: not-allowed !important;
        }

        @media (max-width: 1200px) {
            .products-grid { grid-template-columns: repeat(2, 1fr); }
            .catalog-container { grid-template-columns: 290px 1fr; }
        }

        @media (max-width: 900px) {
            .catalog-container { grid-template-columns: 1fr; }
            .sidebar { position: static; }
        }

        @media (max-width: 600px) {
            .products-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; }
            .catalog-container { gap: 16px; margin: 16px auto; padding: 0 3%; }
            .sidebar { padding: 18px 14px; border-radius: 12px; }
            .product-image-container { height: 150px; padding: 6px; }
        }
    </style>
</head>
<body>

    @include('footer.top')

    <div class="top-nav-bar">
        <a href="{{ url('/') }}">Inicio</a> &gt; <span>Productos y Equipos</span>
    </div>

    <div class="catalog-container">
        <!-- BARRA LATERAL DE CATEGORÍAS FLOTANTE CON SCROLL -->
        <aside class="sidebar">
            <h3>🗂️ Categorías</h3>
            <ul class="category-list">
                <li class="category-item">
                    <a href="{{ route('productos.index') }}" class="{{ !request('categoria') ? 'active' : '' }}">
                        <span>Todos los productos</span>
                        <span class="category-count">{{ $totalProductos ?? (isset($productos) ? $productos->total() : 0) }}</span>
                    </a>
                </li>

                @if(isset($categorias))
                    @foreach($categorias as $cat)
                        @php
                            $isChildActive = optional($cat->children)->pluck('id')->contains(request('categoria'));
                            $isParentActive = request('categoria') == $cat->id;
                            $hasChildren = isset($cat->children) && $cat->children->count() > 0;
                            $sumChildren = $hasChildren ? $cat->children->sum('productos_count') : 0;
                        @endphp

                        <li class="category-item {{ $isChildActive ? 'has-active-child' : '' }} {{ $isParentActive ? 'is-expanded' : '' }}">
                            <a href="{{ route('productos.index', ['categoria' => $cat->id]) }}" class="{{ $isParentActive ? 'active' : '' }}">
                                <span>
                                    {{ $cat->nombre }}
                                    @if($hasChildren)
                                        <span class="subcategory-toggle-icon">▼</span>
                                    @endif
                                </span>
                                <span class="category-count">{{ $cat->productos_count + $sumChildren }}</span>
                            </a>

                            @if($hasChildren)
                                <ul class="subcategory-list">
                                    @foreach($cat->children as $subcategoria)
                                        <li class="subcategory-item">
                                            <a href="{{ route('productos.index', ['categoria' => $subcategoria->id]) }}" class="{{ request('categoria') == $subcategoria->id ? 'active' : '' }}">
                                                <span>{{ $subcategoria->nombre }}</span>
                                                <span class="category-count">{{ $subcategoria->productos_count }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </aside>

        <!-- CONTENIDO PRINCIPAL DE PRODUCTOS -->
        <main class="catalog-content">
            <div class="catalog-header-bar">
                <span>
                    @if(isset($categoriaActual) && $categoriaActual)
                        Mostrando productos de: <strong>{{ $categoriaActual->nombre }}</strong>
                    @else
                        Mostrando todos los productos
                    @endif
                    ({{ $productos->total() ?? count($productos) }} encontrados)
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

            <!-- CONTROLES DE PAGINACIÓN -->
            <div class="pagination-wrapper">
                {{ $productos->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </main>
    </div>

    @include('footer.bottom')

</body>
</html>