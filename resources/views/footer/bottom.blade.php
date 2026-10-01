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