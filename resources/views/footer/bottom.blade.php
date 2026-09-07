<footer id="contacto">
    <div class="footer-grid">
        <div class="footer-col footer-contact">
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
                    <a href="mailto:ventas@maquitec.com">ventas@maquitec.com</a>
                </p>
            </address>
        </div>

        <div class="footer-col footer-links">
            <h3>Enlaces rápidos</h3>
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('/nosotros') }}">Nosotros</a></li>
                <li><a href="{{ url('/productos') }}">Productos</a></li>
                <li><a href="{{ url('/servicios') }}">Servicios</a></li>
            </ul>
        </div>

        <div class="footer-col footer-social">
            <h3>Síguenos</h3>
            <p>Contáctanos en nuestras redes sociales y obtén más información sobre nuestros productos y servicios.</p>
            <div class="social-links-text">
                <p><strong>IG:</strong> @maquitec'i s.a.c.</p>
                <p><strong>FB:</strong> @maquitec'i s.a.c.</p>
            </div>
        </div>
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
        padding: 60px 6% 20px 6%;
        border-top: 4px solid var(--amarillo, #FFD700);
        margin-top: auto;
    }
    .footer-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto 40px auto;
    }
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
    .footer-contact p, .footer-social p {
        margin: 0;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #9ca3af;
    }
    .footer-contact a, .footer-links a {
        color: #f3f4f6;
        text-decoration: none;
        transition: color 0.2s;
    }
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
    .social-links-text {
        margin-top: 10px;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .social-links-text p {
        color: #e5e7eb;
    }
    .footer-bottom {
        text-align: center;
        padding-top: 25px;
        border-top: 1px solid #27272a;
        font-size: 0.85rem;
        color: #6b7280;
        max-width: 1200px;
        margin: 0 auto;
    }
</style>