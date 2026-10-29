<style>
    .admin-action-spinner {
        display: inline-block;
        width: 1em;
        height: 1em;
        margin-right: 8px;
        border: 2px solid currentColor;
        border-right-color: transparent;
        border-radius: 50%;
        vertical-align: -0.12em;
        animation: adminActionSpin 0.65s linear infinite;
    }
    button.is-loading, a.is-loading {
        cursor: wait !important;
        opacity: 0.78;
        pointer-events: none;
    }
    .admin-page-loading {
        position: fixed;
        inset: 0;
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(10, 10, 10, 0.42);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.18s ease, visibility 0.18s ease;
    }
    .admin-page-loading.is-visible { opacity: 1; visibility: visible; }
    .admin-page-loading-box {
        min-width: 210px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        padding: 18px 22px;
        border-radius: 12px;
        background: #ffffff;
        box-shadow: 0 18px 50px rgba(0, 0, 0, 0.28);
        color: #121212;
        font-family: "Inter", "Segoe UI", system-ui, sans-serif;
        font-size: 0.95rem;
        font-weight: 700;
    }
    .admin-page-loading-box .admin-action-spinner {
        width: 22px;
        height: 22px;
        margin: 0;
        border-width: 3px;
        color: #f2c800;
    }
    @keyframes adminActionSpin { to { transform: rotate(360deg); } }
    @media (prefers-reduced-motion: reduce) {
        .admin-action-spinner { animation-duration: 1.5s; }
    }
</style>

<div class="admin-page-loading" id="adminPageLoading" aria-live="polite" aria-label="Procesando">
    <div class="admin-page-loading-box"><span class="admin-action-spinner"></span><span id="adminPageLoadingText">Procesando...</span></div>
</div>

<script>
(() => {
    const overlay = document.getElementById('adminPageLoading');
    const overlayText = document.getElementById('adminPageLoadingText');
    let actionSubmitted = false;

    function showOverlay(text) {
        if (!overlay) return;
        overlayText.textContent = text || 'Procesando...';
        overlay.classList.add('is-visible');
    }

    function singularModule(path) {
        if (path.includes('/productos')) return 'producto';
        if (path.includes('/categorias')) return 'categoría';
        if (path.includes('/banners')) return 'banner';
        if (path.includes('/usuarios')) return 'usuario';
        return 'registro';
    }

    function moduleName(path) {
        if (path.includes('/productos')) return 'productos';
        if (path.includes('/categorias')) return 'categorías';
        if (path.includes('/banners')) return 'banners';
        if (path.includes('/usuarios')) return 'usuarios';
        return 'panel de control';
    }

    function getNavigationAction(link, url) {
        const path = url.pathname.toLowerCase();
        const name = moduleName(path);
        const moduleLabel = name.charAt(0).toUpperCase() + name.slice(1);

        if (/\/admin(?:\/dashboard)?\/?$/.test(path) || path === '/admin') {
            return ['Ingresando al panel de control...', 'Ingresando al panel de control'];
        }
        if (/\/crear$/.test(path) || /\/create$/.test(path) || /\/nuevo$/.test(path)) {
            return [`Abriendo creación de ${singularModule(path)}...`, `Nuevo ${singularModule(path)}`];
        }
        if (/\/edit$/.test(path)) {
            return [`Abriendo edición de ${singularModule(path)}...`, `Editar ${singularModule(path)}`];
        }
        if (path.includes('/productos')) {
            return [`Ingresando al módulo de productos...`, moduleLabel];
        }
        if (path.includes('/categorias')) {
            return [`Ingresando al módulo de categorías...`, moduleLabel];
        }
        if (path.includes('/banners')) {
            return [`Ingresando al módulo de banners...`, moduleLabel];
        }
        if (path.includes('/usuarios')) {
            return [`Ingresando al módulo de usuarios...`, moduleLabel];
        }
        return ['Abriendo sección...', 'Abriendo'];
    }

    function getFormAction(form, submitter) {
        const method = (form.querySelector('input[name="_method"]')?.value || form.method || 'post').toLowerCase().trim();
        const actionPath = new URL(form.action, window.location.href).pathname.toLowerCase();
        const entity = singularModule(actionPath);
        const buttonText = (submitter?.textContent || '').trim().toLowerCase();

        if (method === 'delete') {
            return [`Eliminando ${entity}...`, 'Eliminando...'];
        }
        if (method === 'put' || method === 'patch') {
            return [`Guardando cambios de ${entity}...`, 'Actualizando...'];
        }
        if (buttonText.includes('publicar')) return [`Publicando ${entity}...`, 'Publicando...'];
        if (buttonText.includes('crear') || buttonText.includes('nuevo') || buttonText.includes('guardar')) {
            return [`Guardando nuevo ${entity}...`, 'Guardando...'];
        }
        return ['Procesando acción...', 'Procesando...'];
    }

    function setButtonLoading(element, text) {
        if (!element || element.dataset.adminLoading === 'true') return;
        element.dataset.adminLoading = 'true';
        element.classList.add('is-loading');
        element.setAttribute('aria-busy', 'true');

        if (element.matches('button, input[type="submit"]')) {
            if (!element.dataset.originalHtml && element.tagName === 'BUTTON') {
                element.dataset.originalHtml = element.innerHTML;
            }
            if (element.tagName === 'BUTTON') {
                element.innerHTML = `<span class="admin-action-spinner"></span>${text}`;
            }
        } else if (element.tagName === 'A') {
            if (!element.dataset.originalHtml) element.dataset.originalHtml = element.innerHTML;
            element.innerHTML = `<span class="admin-action-spinner"></span>${text}`;
        }

        if ('disabled' in element) element.disabled = true;
    }

    document.querySelectorAll('form').forEach((form) => {
        form.addEventListener('submit', function () {
            if (actionSubmitted || !form.checkValidity()) return;

            actionSubmitted = true;
            const submitter = form.querySelector('[type="submit"], button:not([type="button"]), input[type="submit"]');
            const [overlayTextValue, buttonText] = getFormAction(form, submitter);

            setButtonLoading(submitter, buttonText);
            showOverlay(overlayTextValue);
        });
    });

    document.addEventListener('click', function (event) {
        const link = event.target.closest('a[href]');
        if (!link || event.defaultPrevented || link.target === '_blank') return;
        if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey || event.button !== 0) return;

        const url = new URL(link.href, window.location.href);
        if (url.origin !== window.location.origin || !url.pathname.startsWith('/admin')) return;
        if (url.hash && url.pathname === window.location.pathname) return;

        const [overlayTextValue, buttonText] = getNavigationAction(link, url);
        setButtonLoading(link, buttonText);
        showOverlay(overlayTextValue);
    });

    window.addEventListener('pageshow', function () {
        actionSubmitted = false;
        if (overlay) overlay.classList.remove('is-visible');
        document.querySelectorAll('.is-loading').forEach((element) => {
            element.classList.remove('is-loading');
            element.removeAttribute('aria-busy');
            element.removeAttribute('data-admin-loading');
            if ('disabled' in element) element.disabled = false;
            if (element.tagName === 'BUTTON' && element.dataset.originalHtml) element.innerHTML = element.dataset.originalHtml;
            if (element.tagName === 'A' && element.dataset.originalHtml) element.innerHTML = element.dataset.originalHtml;
        });
    });
})();
</script>
