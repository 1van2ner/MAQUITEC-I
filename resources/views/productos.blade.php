<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos y Equipos - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #FFD700;
            --negro: #111111;
            --gris-oscuro: #18181b;
            --gris-claro: #f4f4f4;
            --blanco: #ffffff;
            --azul-admin: #2563eb;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: var(--gris-claro);
            color: #27272a;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Contenedor de navegación superior interna */
        .top-nav-bar {
            background: var(--blanco);
            padding: 12px 40px;
            border-bottom: 1px solid #e4e4e7;
            font-size: 0.9rem;
            color: #71717a;
        }
        .top-nav-bar a {
            color: var(--negro);
            text-decoration: none;
            font-weight: 600;
        }
        .top-nav-bar a:hover {
            text-decoration: underline;
        }

        /* Estructura Principal a 2 Columnas */
        .catalog-container {
            max-width: 1300px;
            margin: 30px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 30px;
            width: 100%;
            box-sizing: border-box;
        }

        @media (max-width: 900px) {
            .catalog-container {
                grid-template-columns: 1fr;
            }
        }

        /* Sidebar Izquierdo */
        .sidebar {
            background: var(--blanco);
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            height: fit-content;
            border: 1px solid #e4e4e7;
        }

        .sidebar h3 {
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--negro);
            margin-top: 0;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }

        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .category-item a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 14px;
            border-radius: 8px;
            color: #3f3f46;
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .category-item a:hover, .category-item a.active {
            background: rgba(255, 215, 0, 0.15);
            color: var(--negro);
            font-weight: 700;
        }

        .category-count {
            background: #f4f4f5;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            color: #71717a;
        }

        .category-item a.active .category-count {
            background: var(--amarillo);
            color: var(--negro);
        }

        /* Contenido Principal / Grilla de Productos */
        .catalog-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .catalog-header-bar {
            background: var(--blanco);
            padding: 16px 24px;
            border-radius: 12px;
            border: 1px solid #e4e4e7;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .catalog-header-bar span {
            font-size: 0.95rem;
            color: #71717a;
            font-weight: 600;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        /* Tarjeta de Producto Individual */
        .product-card {
            background: var(--blanco);
            border-radius: 14px;
            border: 1px solid #e4e4e7;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            border-color: #d4d4d8;
        }

        .product-image-container {
            width: 100%;
            height: 200px;
            background: #fafafa;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-bottom: 1px solid #f0f0f0;
        }

        .product-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info {
            padding: 18px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex-grow: 1;
        }

        .product-category-tag {
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 700;
            color: #71717a;
            letter-spacing: 0.05em;
        }

        .product-title {
            margin: 0;
            font-size: 1.05rem;
            color: var(--negro);
            font-weight: 700;
        }

        .product-price {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--negro);
            margin-top: 4px;
        }

        .product-action {
            padding: 0 18px 18px 18px;
        }

        .btn-cotizar {
            display: block;
            width: 100%;
            text-align: center;
            background: var(--amarillo);
            color: var(--negro);
            padding: 10px;
            border-radius: 8px;
            font-weight: 700;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.2s;
            box-sizing: border-box;
        }

        .btn-cotizar:hover {
            background: #e6c200;
        }

        .no-products {
            grid-column: 1 / -1;
            background: var(--blanco);
            padding: 50px;
            text-align: center;
            border-radius: 12px;
            border: 1px solid #e4e4e7;
            color: #71717a;
            font-size: 1.05rem;
        }
    </style>
</head>
<body>
    @include('footer.top')

    <div class="top-nav-bar">
        <a href="{{ url('/') }}">Inicio</a> &gt; <span>Productos</span>
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
                            <div class="product-price">S/ {{ number_format($producto->precio, 2) }}</div>
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
</body>
</html>