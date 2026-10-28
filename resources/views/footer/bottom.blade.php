<footer id="contacto">
    <div class="footer-grid">
        <section class="footer-col footer-brand" aria-label="Acerca de Maquitec">
            <div class="footer-brand-heading">
                <img src="{{ asset('img/logo_pagina_general/maquitec_2026_new.jpg') }}" alt="Logo de Maquitec">
                <div>
                    <strong>MAQUITEC´I</strong>
                    <span>Soluciones industriales en movimiento</span>
                </div>
            </div>
            <p class="footer-description">Empresa peruana especializada en comercialización, ensamblaje y mantenimiento de equipos industriales, con más de 15 años de experiencia en el sector.</p>
            <div class="footer-facts">
                <span>Más de 15 años de experiencia</span>
                <span>Montacargas y apiladores</span>
                <span>Lima, Perú</span>
            </div>
        </section>

        <section class="footer-col footer-contact">
            <h3>Contacto</h3>
            <address>
                <p>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    Av. San Agustín SMP, Lima, Perú
                </p>
                <p>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    <a href="tel:+51963727185">963 727 185</a> &nbsp;|&nbsp; <a href="tel:+51955081815">955 081 815</a>
                </p>
                <p>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    <a href="mailto:maquitec.servicios0601@gmail.com">maquitec.servicios0601@gmail.com</a>
                </p>
            </address>
        </section>

        <div class="footer-col footer-links">
            <h3>Enlaces rápidos</h3>
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('/nosotros') }}">Nosotros</a></li>
                <li><a href="{{ url('/productos') }}">Productos</a></li>
                <li><a href="{{ url('/servicios') }}">Servicios</a></li>
                <li><a href="{{ route('terms') }}">Términos</a></li>
                <li><a href="{{ route('privacy.policy') }}">Privacidad</a></li>
                <li><a href="{{ route('cookies.policy') }}">Cookies</a></li>
                <li><a href="{{ route('security.policy') }}">Seguridad</a></li>
                <li><a href="{{ url('/aviso-de-seguridad') }}">Reporte de vulnerabilidades</a></li>
                <li><button type="button" class="cookie-settings-link" data-open-cookie-settings>Configurar cookies</button></li>
                <li><a href="{{ route('privacy.policy') }}">Privacidad</a></li>
                <li><a href="{{ route('cookies.policy') }}">Cookies</a></li>
                <li><a href="{{ route('security.policy') }}">Seguridad</a></li>
            </ul>
        </div>

        <section class="footer-col footer-social">
            <h3>Servicios y redes</h3>
            <p class="footer-services">Asesoría técnica, suministro de equipos, mantenimiento preventivo y correctivo, instalación y gestión de repuestos.</p>
            <div class="social-links-text" aria-label="Redes sociales">
                <p><strong>Instagram</strong><span>@maquitec'i s.a.c.</span></p>
                <p><strong>Facebook</strong><span>@maquitec'i s.a.c.</span></p>
            </div>
        </section>
    </div>

    <div class="footer-bottom">
        &copy; {{ date('Y') }} MAQUITEC I.S.A.C. &mdash; Todos los derechos reservados.
    </div>
</footer>

<style>
    /* Estilos profesionales para el Footer */
    footer#contacto {
        background: #111111;
        color: #d1d5db;
        padding: 48px 6% 20px;
        border-top: 4px solid var(--amarillo, #FFD700);
        margin-top: auto;
    }
    .footer-grid {
        display: grid;
        grid-template-columns: minmax(240px, 1.25fr) repeat(3, minmax(150px, 0.8fr));
        gap: 32px;
        max-width: 1200px;
        margin: 0 auto 40px auto;
    }
    .footer-brand-heading { display: flex; align-items: center; gap: 14px; margin-bottom: 18px; }
    .footer-brand-heading img { width: 76px; height: 76px; flex: 0 0 76px; object-fit: cover; border: 1px solid rgba(255, 215, 0, 0.6); border-radius: 50%; }
    .footer-brand-heading strong { display: block; color: var(--amarillo, #FFD700); font-size: 1.2rem; }
    .footer-brand-heading span { display: block; margin-top: 4px; color: #d1d5db; font-size: 0.82rem; line-height: 1.4; }
    .footer-description, .footer-services { margin: 0; color: #aeb3bc; font-size: 0.9rem; line-height: 1.6; }
    .footer-facts { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 16px; }
    .footer-facts span { padding: 7px 9px; border: 1px solid #343434; border-radius: 6px; background: #181818; color: #cbd5e1; font-size: 0.74rem; line-height: 1.3; }
    .footer-col h3 {
        color: var(--amarillo, #FFD700);
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 8px;
    }
    .footer-col h3::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 35px;
        height: 2px;
        background: var(--amarillo, #FFD700);
    }
    .footer-contact address {
        font-style: normal;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .footer-contact p { margin: 0; }
    .footer-contact p, .footer-social p {
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #9ca3af;
    }
    .footer-contact svg { flex: 0 0 16px; }
    .footer-contact a, .footer-links a {
        color: #f3f4f6;
        text-decoration: none;
        transition: color 0.2s;
    }
    .footer-contact a { overflow-wrap: anywhere; }
    .footer-contact a:hover, .footer-links a:hover {
        color: var(--amarillo, #FFD700);
    }
    .footer-links ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .footer-links li a {
        display: inline-block;
        transition: transform 0.2s;
    }
    .footer-links li a:hover {
        transform: translateX(4px);
    }
    .cookie-settings-link { border:0; padding:0; background:transparent; color:#f3f4f6; cursor:pointer; font:inherit; text-align:left; }
    .cookie-settings-link:hover { color:var(--amarillo,#FFD700); }
    .social-links-text { display: flex; flex-direction: column; gap: 8px; margin-top: 16px; }
    .social-links-text p { justify-content: space-between; gap: 12px; margin: 0; color: #e5e7eb; font-size: 0.82rem; }
    .social-links-text strong { color: var(--amarillo, #FFD700); font-size: 0.76rem; }
    .footer-bottom {
        text-align: center;
        padding-top: 25px;
        border-top: 1px solid #27272a;
        font-size: 0.85rem;
        color: #6b7280;
        max-width: 1200px;
        margin: 0 auto;
    }
    @media (max-width: 980px) {
        .footer-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 30px 24px; }
    }
    @media (max-width: 600px) {
        footer#contacto { padding: 36px 20px 18px; }
        .footer-grid { grid-template-columns: minmax(0, 1fr); gap: 28px; margin-bottom: 30px; }
        .footer-brand-heading img { width: 68px; height: 68px; flex-basis: 68px; }
        .footer-col h3 { margin-bottom: 14px; }
        .footer-contact p { align-items: flex-start; font-size: 0.82rem; }
        .footer-contact svg { margin-top: 2px; }
        .footer-social p.footer-services { display: block; }
        .footer-bottom { padding-top: 18px; line-height: 1.5; }
    }
</style>

<div id="cookie-consent" class="cookie-consent" role="dialog" aria-modal="false" aria-labelledby="cookie-title" hidden>
    <div class="cookie-consent__content">
        <h2 id="cookie-title">Tu privacidad importa</h2>
        <p>Usamos cookies necesarias para el funcionamiento del sitio. Las cookies opcionales solo se activarán si das tu consentimiento.</p>
        <div class="cookie-consent__actions">
            <button type="button" id="cookie-accept">Aceptar todas</button>
            <button type="button" id="cookie-reject">Solo necesarias</button>
            <button type="button" id="cookie-settings">Configurar</button>
        </div>
        <a href="{{ route('cookies.policy') }}">Leer la política de cookies</a>
    </div>
</div>

<div id="cookie-preferences" class="cookie-preferences" role="dialog" aria-modal="true" aria-labelledby="cookie-preferences-title" hidden>
    <div class="cookie-preferences__panel">
        <h2 id="cookie-preferences-title">Preferencias de cookies</h2>
        <label><strong>Necesarias</strong><span>Siempre activas</span><input type="checkbox" checked disabled></label>
        <label><strong>Analíticas</strong><span>Nos ayudan a mejorar el sitio</span><input type="checkbox" id="cookie-analytics"></label>
        <label><strong>Marketing</strong><span>Personalización de anuncios</span><input type="checkbox" id="cookie-marketing"></label>
        <div class="cookie-consent__actions">
            <button type="button" id="cookie-save">Guardar preferencias</button>
            <button type="button" id="cookie-close-settings">Cerrar</button>
        </div>
    </div>
</div>

<style>
    [hidden] { display:none !important; }
    .cookie-consent { position:fixed; z-index:9999; left:0; right:0; bottom:0; padding:18px 4%; background:#111; border-top:3px solid var(--amarillo,#f7d547); box-shadow:0 -12px 30px rgba(0,0,0,.28); }
    .cookie-consent__content { max-width:1200px; margin:auto; display:grid; grid-template-columns:minmax(180px,.7fr) minmax(280px,1.4fr) auto auto; align-items:center; gap:14px 18px; }
    .cookie-consent h2 { margin:0; color:#f7d547; font-size:1.1rem; }
    .cookie-consent p { margin:0; color:#d1d5db; font-size:.88rem; line-height:1.45; }
    .cookie-consent__content > a { grid-column:2; color:#f7d547; font-size:.82rem; }
    .cookie-consent__actions { display:flex; flex-wrap:wrap; gap:8px; }
    .cookie-consent button { border:1px solid #f7d547; border-radius:7px; padding:10px 12px; cursor:pointer; font-weight:700; }
    #cookie-accept, #cookie-save { background:#f7d547; color:#111; }
    #cookie-reject, #cookie-settings, #cookie-close-settings { background:#111; color:#fff; }
    .cookie-preferences { position:fixed; z-index:10000; inset:0; display:grid; place-items:center; background:rgba(0,0,0,.72); padding:20px; }
    .cookie-preferences__panel { width:min(520px,100%); background:#fff; color:#1f2937; border-radius:12px; padding:24px; box-shadow:0 20px 60px rgba(0,0,0,.35); }
    .cookie-preferences__panel h2 { margin-top:0; }
    .cookie-preferences__panel label { display:grid; grid-template-columns:1fr auto; gap:5px 15px; padding:14px 0; border-top:1px solid #e5e7eb; }
    .cookie-preferences__panel label span { grid-row:2; color:#6b7280; font-size:.85rem; }
    .cookie-preferences__panel label input { grid-column:2; grid-row:1 / span 2; align-self:center; }
    @media(max-width:850px) { .cookie-consent__content { grid-template-columns:1fr; } .cookie-consent__content > a { grid-column:1; } }
</style>

<script>
(() => {
    const KEY = 'maquitec_cookie_consent';
    const banner = document.getElementById('cookie-consent');
    const preferences = document.getElementById('cookie-preferences');
    if (!banner || !preferences) return;

    const readConsent = () => {
        try { return JSON.parse(localStorage.getItem(KEY)); } catch (_) { return null; }
    };
    const saveConsent = (analytics = false, marketing = false) => {
        const value = { necessary:true, analytics:Boolean(analytics), marketing:Boolean(marketing), date:new Date().toISOString() };
        localStorage.setItem(KEY, JSON.stringify(value));
        const secure = location.protocol === 'https:' ? '; Secure' : '';
        document.cookie = `maquitec_cookie_consent=${encodeURIComponent(JSON.stringify(value))}; Max-Age=15552000; Path=/; SameSite=Lax${secure}`;
        banner.hidden = true;
        preferences.hidden = true;
    };

    const consent = readConsent();
    if (!consent) banner.hidden = false;

    document.querySelectorAll('[data-open-cookie-settings]').forEach((button) => {
        button.addEventListener('click', () => { preferences.hidden = false; });
    });

    document.getElementById('cookie-accept')?.addEventListener('click', () => saveConsent(true, true));
    document.getElementById('cookie-reject')?.addEventListener('click', () => saveConsent(false, false));
    document.getElementById('cookie-settings')?.addEventListener('click', () => { preferences.hidden = false; });
    document.getElementById('cookie-close-settings')?.addEventListener('click', () => { preferences.hidden = true; });
    document.getElementById('cookie-save')?.addEventListener('click', () => {
        saveConsent(document.getElementById('cookie-analytics')?.checked, document.getElementById('cookie-marketing')?.checked);
    });
})();
</script>