<style>
    /* Definición de variables globales para todo el layout */
    :root {
        --amarillo: #FFD700;
        --negro: #111111;
        --blanco: #ffffff;
        --gris-claro: #f4f4f4;
    }

    /* Barra Superior (Top Bar) */
    .top-bar {
        background: #09090b;
        color: #a1a1aa;
        padding: 8px 6%;
        font-size: 0.85rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        border-bottom: 1px solid #27272a;
    }
    .top-bar span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* Estructura general de la barra de navegación */
    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 6%;
        background: var(--negro);
        border-bottom: 4px solid var(--amarillo);
        position: sticky;
        top: 0;
        z-index: 20;
        gap: 20px;
    }
    .logo { display: flex; align-items: center; gap: 16px; text-decoration: none; }
    .logo img { width: 60px; height: 60px; object-fit: contain; border-radius: 12px; box-shadow: 0 8px 16px rgba(0,0,0,0.3); }
    .logo-text strong { font-size: 1.1rem; color: var(--amarillo); letter-spacing: 0.06em; display: block; }
    .logo-text span { color: var(--blanco); font-size: 0.8rem; display: block; }

    /* Menú central */
    .menu {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-right: auto; 
        margin-left: 20px;
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
    .menu-toggle span { display: block; width: 24px; height: 2px; background: var(--blanco); border-radius: 999px; }
    
    .menu a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 16px;
        font-weight: 600;
        color: var(--blanco);
        background: transparent;
        border-radius: 999px;
        text-decoration: none;
        transition: all 0.2s ease;
        font-size: 0.95rem;
    }
    .menu a.active, .menu a:hover {
        color: var(--negro);
        background: var(--amarillo);
    }

    /* Autenticación a la derecha */
    .nav-auth {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .btn-login {
        background: var(--negro);
        color: var(--amarillo) !important;
        border: 2px solid var(--amarillo);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        font-weight: 700;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.2s ease;
        font-size: 0.9rem;
    }
    .btn-login:hover {
        background: var(--amarillo);
        color: var(--negro) !important;
    }
    .btn-register {
        background: var(--amarillo);
        color: var(--negro) !important;
        border: 2px solid var(--amarillo);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        font-weight: 700;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.2s ease;
        font-size: 0.9rem;
    }
    .btn-register:hover {
        background: #e5c100;
        border-color: #e5c100;
    }

    /* Dropdown de usuario autenticado */
    .user-dropdown-container { position: relative; display: inline-block; }
    .user-menu-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 6px 14px;
        background: #1a1a1a;
        border: 2px solid #333;
        border-radius: 30px;
        color: var(--blanco);
        cursor: pointer;
        transition: border-color 0.2s ease;
    }
    .user-menu-btn:hover, .user-dropdown-container.active .user-menu-btn { border-color: var(--amarillo); }
    .user-avatar-icon {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--amarillo);
        color: var(--negro);
        font-weight: 800;
        font-size: 0.9rem;
    }
    .user-greeting { color: var(--blanco); font-size: 0.9rem; }
    .user-greeting strong { color: var(--amarillo); }
    .dropdown-chevron { transition: transform 0.2s ease; color: var(--blanco); }
    .user-dropdown-container.active .dropdown-chevron { transform: rotate(180deg); }
    
    .user-dropdown-menu {
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        z-index: 100;
        display: none;
        flex-direction: column;
        width: 240px;
        padding: 8px;
        background: #18181b;
        border: 1px solid #27272a;
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.5);
    }
    .user-dropdown-container.active .user-dropdown-menu { display: flex; animation: fadeInDropdown 0.2s ease; }
    @keyframes fadeInDropdown { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }
    .dropdown-header { display: flex; flex-direction: column; padding: 10px 12px; }
    .dropdown-user-name { overflow: hidden; color: var(--blanco); font-weight: 700; text-overflow: ellipsis; white-space: nowrap; }
    .dropdown-user-role { margin-top: 2px; color: var(--amarillo); font-size: 0.75rem; letter-spacing: 0.05em; text-transform: uppercase; }
    .dropdown-divider { height: 1px; margin: 4px 0; background: #27272a; }
    .dropdown-item {
        display: flex;
        align-items: center;
        width: 100%;
        gap: 10px;
        padding: 10px 12px;
        border: 0;
        border-radius: 8px;
        background: transparent;
        color: #d1d5db;
        font-size: 0.9rem;
        font-weight: 500;
        text-align: left;
        text-decoration: none;
        cursor: pointer;
    }
    .dropdown-item:hover { background: #27272a; color: var(--blanco); }
    .admin-item { color: #60a5fa; }
    .admin-item:hover { background: rgba(96,165,250,0.1); color: #93c5fd; }
    .logout-item { color: #f87171; }
    .logout-item:hover { background: rgba(248,113,113,0.1); color: #fca5a5; }
    .dropdown-logout-form { margin: 0; }

    /* Responsive */
    @media (max-width: 1024px) {
        .top-bar { justify-content: center; font-size: 0.8rem; text-align: center; }
        nav { flex-wrap: wrap; }
        .menu-toggle { display: inline-flex; }
        .menu {
            display: none;
            width: 100%;
            flex-direction: column;
            align-items: stretch;
            margin-left: 0;
            margin-right: 0;
            gap: 8px;
            padding-top: 10px;
        }
        .menu.open { display: flex; }
        .menu a { width: 100%; justify-content: flex-start; border-radius: 8px; }
        .nav-auth {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }
        .user-dropdown-container { width: 100%; }
        .user-menu-btn { width: 100%; justify-content: center; }
        .user-dropdown-menu { left: 0; right: 0; width: 100%; }
        .btn-login, .btn-register { width: 100%; justify-content: center; box-sizing: border-box; }
    }
</style>

<div class="top-bar">
    <span>📍 Av. San Agustín SMP, Lima, Perú</span>
    <span>📞 963 727 185 | 955 081 815</span>
    <span>✉ ventas@maquitec.com</span>
</div>

<nav>
    <a href="{{ url('/') }}" class="logo">
        <img src="{{ asset('img/logo_maquitec.jpg') }}" alt="Logo Maquitec">
        <div class="logo-text">
            <strong>MAQUITEC I.S.A.C.</strong>
            <span>Soluciones industriales en movimiento</span>
        </div>
    </a>

    <button class="menu-toggle" type="button" aria-label="Abrir menú" aria-expanded="false">
        <span></span><span></span><span></span>
    </button>

    <div class="menu">
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a>
        <a href="{{ url('/nosotros') }}" class="{{ request()->is('nosotros') ? 'active' : '' }}">Nosotros</a>
        <a href="{{ url('/productos') }}" class="{{ request()->is('productos') || request()->is('productos/*') ? 'active' : '' }}">Productos</a>
        <a href="{{ url('/servicios') }}" class="{{ request()->is('servicios') ? 'active' : '' }}">Servicios</a>
    </div>

    <!-- Sección de Autenticación Condicional -->
    <div class="nav-auth">
        @auth
            <div class="user-dropdown-container">
                <button type="button" class="user-menu-btn" id="userMenuToggle" aria-expanded="false" aria-controls="userDropdownMenu">
                    <span class="user-avatar-icon">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    <span class="user-greeting">Hola, <strong>{{ Auth::user()->name }}</strong></span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="dropdown-chevron" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>

                <div class="user-dropdown-menu" id="userDropdownMenu">
                    <div class="dropdown-header">
                        <span class="dropdown-user-name">{{ Auth::user()->name }}</span>
                        <span class="dropdown-user-role">{{ Auth::user()->rol ?? 'Cliente' }}</span>
                    </div>

                    <div class="dropdown-divider"></div>

                    <a href="{{ url('/perfil') }}" class="dropdown-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        Ver perfil
                    </a>

                    @if(Auth::user()->rol === 'Administrador' || Auth::user()->email === 'ventas@maquitec.com')
                        <a href="{{ url('/admin/dashboard') }}" class="dropdown-item admin-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            Panel de administración
                        </a>
                    @endif

                    <div class="dropdown-divider"></div>

                    <form action="{{ route('logout') }}" method="POST" class="dropdown-logout-form">
                        @csrf
                        <button type="submit" class="dropdown-item logout-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn-login {{ request()->is('login') ? 'active' : '' }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                Ingresar
            </a>
            <a href="{{ route('register') }}" class="btn-register {{ request()->is('register') ? 'active' : '' }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                Registrarse
            </a>
        @endauth
    </div>
</nav>

<script>
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.menu');

    if (menuToggle && menu) {
        menuToggle.addEventListener('click', function () {
            const isOpen = menu.classList.toggle('open');
            menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            menuToggle.setAttribute('aria-label', isOpen ? 'Cerrar menú' : 'Abrir menú');
        });
    }

    const userDropdownContainer = document.querySelector('.user-dropdown-container');
    const userMenuToggle = document.getElementById('userMenuToggle');

    if (userMenuToggle && userDropdownContainer) {
        userMenuToggle.addEventListener('click', function (event) {
            event.stopPropagation();
            const isOpen = userDropdownContainer.classList.toggle('active');
            userMenuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        document.addEventListener('click', function (event) {
            if (!userDropdownContainer.contains(event.target)) {
                userDropdownContainer.classList.remove('active');
                userMenuToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }
</script>