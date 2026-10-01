<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Especializados - MAQUITEC I.S.A.C.</title>
    <style>
        :root {
            --amarillo: #f7d547;
            --amarillo-hover: #e5c338;
            --negro: #000000;
            --negro-card: rgba(255, 255, 255, 0.03);
            --borde-card: rgba(255, 255, 255, 0.08);
            --texto-claro: #ffffff;
            --texto-muted: #a1a1aa;
            --whatsapp: #25d366;
            --whatsapp-hover: #20ba5a;
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

        /* BANNER HERO */
        .hero {
            display: grid;
            place-items: center;
            min-height: 380px;
            padding: 50px 20px;
            text-align: center;
            color: var(--texto-claro);
            background: linear-gradient(180deg, rgba(18, 19, 22, 0.85), rgba(18, 19, 22, 0.95)), 
                        url("{{ asset('img/marcas/heli.jpg') }}") center/cover no-repeat;
            border-bottom: 1px solid var(--borde-card);
        }

        .hero h1 { 
            margin: 0; 
            font-size: clamp(2.2rem, 4.5vw, 3.4rem); 
            font-weight: 800;
            letter-spacing: -0.02em; 
            color: var(--texto-claro);
        }

        .hero h1 span {
            color: var(--amarillo);
        }

        .hero p { 
            max-width: 760px; 
            margin: 18px auto 0; 
            line-height: 1.7; 
            color: var(--texto-muted); 
            font-size: 1.1rem;
        }

        /* CONTENIDO PRINCIPAL */
        .content { 
            max-width: 1240px; 
            margin: 0 auto; 
            padding: 60px 4% 80px; 
            width: 100%;
        }

        .intro { 
            margin-bottom: 50px; 
            text-align: center; 
        }

        .intro h2 { 
            margin: 0; 
            font-size: 2.2rem; 
            font-weight: 800;
            color: var(--texto-claro);
        }

        .intro p { 
            max-width: 700px; 
            margin: 12px auto 0; 
            color: var(--texto-muted); 
            line-height: 1.7; 
            font-size: 1.05rem;
        }

        /* GRILLA DE SERVICIOS */
        .service-grid { 
            display: grid; 
            grid-template-columns: repeat(2, 1fr); 
            gap: 30px; 
            align-items: start;
        }

        .service-card {
            position: relative;
            z-index: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 36px;
            background: var(--negro-card);
            border: 1px solid var(--borde-card);
            border-radius: 20px;
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(10px);
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .service-gallery {
            max-height: 0;
            margin: 0;
            overflow: hidden;
            opacity: 0;
            pointer-events: none;
            transition: max-height 0.35s ease, margin 0.35s ease, opacity 0.25s ease;
        }

        .service-gallery-frame {
            position: relative;
            height: 190px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            background: #090a0b;
            cursor: grab;
            touch-action: pan-y;
        }

        .service-gallery-frame.is-dragging { cursor: grabbing; }

        .service-gallery-slide {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.35s ease, transform 0.6s ease;
        }

        .service-gallery-slide.is-active { opacity: 1; transform: scale(1.02); }

        .service-gallery-controls {
            position: absolute;
            right: 10px;
            bottom: 10px;
            left: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .service-gallery-dots { display: flex; align-items: center; justify-content: center; gap: 7px; }
        .service-gallery-dot {
            width: 7px;
            height: 7px;
            padding: 0;
            border: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.65);
            cursor: pointer;
        }
        .service-gallery-dot.is-active { width: 18px; border-radius: 8px; background: var(--amarillo); }

        @media (hover: hover) and (pointer: fine) {
            .service-card:hover,
            .service-card:focus-within {
                z-index: 2;
                transform: translateY(-6px) scale(1.025);
                border-color: var(--amarillo);
                box-shadow: 0 20px 40px rgba(247, 213, 71, 0.16);
            }

            .service-card:hover .service-gallery,
            .service-card:focus-within .service-gallery {
                max-height: 230px;
                margin: 0 0 24px;
                opacity: 1;
                pointer-events: auto;
            }
        }

        .service-card:hover {
            border-color: var(--amarillo);
            box-shadow: 0 20px 40px rgba(247, 213, 71, 0.12);
        }

        .service-card h3 { 
            margin: 0 0 14px; 
            font-size: 1.4rem; 
            font-weight: 700;
            color: var(--texto-claro);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .service-card p { 
            margin: 0 0 28px; 
            color: var(--texto-muted); 
            line-height: 1.7; 
            font-size: 0.98rem;
        }

        /* BOTÓN WHATSAPP */
        .btn-whatsapp {
            display: inline-flex;
            width: 100%;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 20px;
            background: var(--whatsapp);
            border-radius: 12px;
            color: var(--texto-claro);
            font-weight: 700;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            box-shadow: 0 6px 18px rgba(37, 211, 102, 0.25);
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .btn-whatsapp:hover { 
            background: var(--whatsapp-hover); 
            transform: translateY(-2px); 
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.35);
        }

        .btn-whatsapp svg { 
            width: 20px; 
            height: 20px; 
            fill: currentColor; 
        }

        /* SECCIÓN HIGHLIGHT / TARJETAS DESTACADAS */
        .highlight { 
            display: grid; 
            grid-template-columns: repeat(2, 1fr); 
            gap: 30px; 
            margin-top: 60px; 
        }

        .highlight-card { 
            padding: 32px; 
            background: rgba(247, 213, 71, 0.05); 
            border-left: 5px solid var(--amarillo); 
            border-radius: 16px; 
            border-top: 1px solid var(--borde-card);
            border-right: 1px solid var(--borde-card);
            border-bottom: 1px solid var(--borde-card);
            backdrop-filter: blur(10px);
        }

        .highlight-card h3 { 
            margin: 0 0 12px; 
            color: var(--amarillo); 
            font-size: 1.25rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .highlight-card p { 
            margin: 0; 
            color: var(--texto-muted); 
            line-height: 1.7; 
            font-size: 0.98rem;
        }

        /* LLAMADO A LA ACCIÓN (CTA) */
        .cta { 
            display: flex; 
            justify-content: center; 
            margin-top: 60px; 
        }

        .btn-productos { 
            padding: 16px 36px; 
            background: var(--amarillo); 
            border: none; 
            border-radius: 12px; 
            color: var(--negro); 
            font-weight: 800; 
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            box-shadow: 0 8px 20px rgba(247, 213, 71, 0.2); 
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .btn-productos:hover { 
            background: var(--amarillo-hover); 
            transform: translateY(-2px);
            box-shadow: 0 12px 26px rgba(247, 213, 71, 0.35);
        }

        .hero {
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
            .hero { animation: none; }
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 850px) {
            .service-grid, .highlight { 
                grid-template-columns: 1fr; 
            }
            .content { 
                padding: 40px 20px 60px; 
            }
        }

        @media (hover: none) {
            .service-gallery {
                max-height: 230px;
                margin: 0 0 22px;
                opacity: 1;
                pointer-events: auto;
            }

            .service-card:hover { transform: none; }
        }

        @media (prefers-reduced-motion: reduce) {
            .service-gallery,
            .service-gallery-slide { transition: none; }
        }
    </style>
</head>
<body>

    @include('footer.top')

    <section class="hero">
        <div>
            <h1>Servicios Especializados Adecuados a tus <span>Necesidades</span></h1>
            <p>Asesoría, instalación y mantenimiento de equipos pesados y de logística para asegurar operaciones seguras, productivas y confiables.</p>
        </div>
    </section>

    <section class="content">
        <div class="intro">
            <h2>Qué hacemos</h2>
            <p>Ofrecemos servicios completos en manejo de carga, grúas, montacargas y equipos industriales con respaldo técnico garantizado.</p>
        </div>

        @php
            $serviceGalleryImages = [
                ['src' => asset('img/montacarga_reparcion.jpg'), 'alt' => 'Montacargas en reparación con el capó abierto'],
                ['src' => asset('img/montacarga_reparcion2.jpg'), 'alt' => 'Montacargas en reparación'],
            ];
        @endphp

        <div class="service-grid">
            <article class="service-card">
                <div>
                    <h3>⚙️ Instalación de equipos</h3>
                    <p>Colocamos y configuramos su maquinaria con soporte técnico en sitio para que entre en operación rápidamente de manera segura.</p>
                </div>
                <div class="service-gallery" role="region" aria-label="Galería de instalación de equipos" data-service-gallery>
                    <div class="service-gallery-frame">
                        @foreach($serviceGalleryImages as $imageIndex => $image)
                            <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="service-gallery-slide {{ $imageIndex === 0 ? 'is-active' : '' }}" aria-hidden="{{ $imageIndex === 0 ? 'false' : 'true' }}">
                        @endforeach
                        <div class="service-gallery-controls">
                            <div class="service-gallery-dots">
                                @foreach($serviceGalleryImages as $imageIndex => $image)
                                    <button class="service-gallery-dot {{ $imageIndex === 0 ? 'is-active' : '' }}" type="button" data-gallery-dot="{{ $imageIndex }}" aria-label="Mostrar imagen {{ $imageIndex + 1 }}" aria-pressed="{{ $imageIndex === 0 ? 'true' : 'false' }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Instalación%20de%20Equipos" target="_blank" rel="noopener" class="btn-whatsapp">
                    <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Consultar por WhatsApp
                </a>
            </article>

            <article class="service-card">
                <div>
                    <h3>🛠️ Mantenimiento preventivo</h3>
                    <p>Planes periódicos orientados a reducir fallas imprevistas, alargar la vida útil de sus equipos y optimizar la productividad.</p>
                </div>
                <div class="service-gallery" role="region" aria-label="Galería de mantenimiento preventivo" data-service-gallery>
                    <div class="service-gallery-frame">
                        @foreach($serviceGalleryImages as $imageIndex => $image)
                            <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="service-gallery-slide {{ $imageIndex === 0 ? 'is-active' : '' }}" aria-hidden="{{ $imageIndex === 0 ? 'false' : 'true' }}">
                        @endforeach
                        <div class="service-gallery-controls">
                            <div class="service-gallery-dots">
                                @foreach($serviceGalleryImages as $imageIndex => $image)
                                    <button class="service-gallery-dot {{ $imageIndex === 0 ? 'is-active' : '' }}" type="button" data-gallery-dot="{{ $imageIndex }}" aria-label="Mostrar imagen {{ $imageIndex + 1 }}" aria-pressed="{{ $imageIndex === 0 ? 'true' : 'false' }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Mantenimiento%20Preventivo" target="_blank" rel="noopener" class="btn-whatsapp">
                    <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Consultar por WhatsApp
                </a>
            </article>

            <article class="service-card">
                <div>
                    <h3>🛠️ Reparación rápida</h3>
                    <p>Atención de urgencia y diagnóstico especializado para minimizar los tiempos de inactividad de su flota y restaurar operaciones.</p>
                </div>
                <div class="service-gallery" role="region" aria-label="Galería de reparación rápida" data-service-gallery>
                    <div class="service-gallery-frame">
                        @foreach($serviceGalleryImages as $imageIndex => $image)
                            <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="service-gallery-slide {{ $imageIndex === 0 ? 'is-active' : '' }}" aria-hidden="{{ $imageIndex === 0 ? 'false' : 'true' }}">
                        @endforeach
                        <div class="service-gallery-controls">
                            <div class="service-gallery-dots">
                                @foreach($serviceGalleryImages as $imageIndex => $image)
                                    <button class="service-gallery-dot {{ $imageIndex === 0 ? 'is-active' : '' }}" type="button" data-gallery-dot="{{ $imageIndex }}" aria-label="Mostrar imagen {{ $imageIndex + 1 }}" aria-pressed="{{ $imageIndex === 0 ? 'true' : 'false' }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Reparación%20Rápida" target="_blank" rel="noopener" class="btn-whatsapp">
                    <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Consultar por WhatsApp
                </a>
            </article>

            <article class="service-card">
                <div>
                    <h3>📋 Asesoría técnica</h3>
                    <p>Evaluamos su operación actual y recomendamos las mejores tecnologías y equipos para optimizar sus flujos logísticos y de carga.</p>
                </div>
                <div class="service-gallery" role="region" aria-label="Galería de asesoría técnica" data-service-gallery>
                    <div class="service-gallery-frame">
                        @foreach($serviceGalleryImages as $imageIndex => $image)
                            <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="service-gallery-slide {{ $imageIndex === 0 ? 'is-active' : '' }}" aria-hidden="{{ $imageIndex === 0 ? 'false' : 'true' }}">
                        @endforeach
                        <div class="service-gallery-controls">
                            <div class="service-gallery-dots">
                                @foreach($serviceGalleryImages as $imageIndex => $image)
                                    <button class="service-gallery-dot {{ $imageIndex === 0 ? 'is-active' : '' }}" type="button" data-gallery-dot="{{ $imageIndex }}" aria-label="Mostrar imagen {{ $imageIndex + 1 }}" aria-pressed="{{ $imageIndex === 0 ? 'true' : 'false' }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a href="https://wa.me/51995000355?text=Hola%20MAQUITEC,%20deseo%20consultar%20sobre%20el%20servicio%20de%20Asesoría%20Técnica" target="_blank" rel="noopener" class="btn-whatsapp">
                    <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Consultar por WhatsApp
                </a>
            </article>
        </div>

        <div class="highlight">
            <div class="highlight-card">
                <h3>Marcas & Confianza</h3>
                <p>Trabajamos con proveedores internacionales reconocidos y garantizamos respaldo técnico en cada proyecto industrial.</p>
            </div>
            <div class="highlight-card">
                <h3>Atención Profesional</h3>
                <p>Equipo especializado con sólida experiencia en proyectos industriales, mineros, portuarios y de transporte logístico.</p>
            </div>
        </div>

        <div class="cta">
            <a href="{{ url('/productos') }}" class="btn-productos">Ver catálogo de productos</a>
        </div>
    </section>

    @include('footer.bottom')

    <script>
        const serviceGalleries = document.querySelectorAll('[data-service-gallery]');
        const reduceGalleryMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        serviceGalleries.forEach(gallery => {
            const card = gallery.closest('.service-card');
            const slides = [...gallery.querySelectorAll('.service-gallery-slide')];
            const dots = [...gallery.querySelectorAll('[data-gallery-dot]')];
            let activeIndex = 0;
            let rotationTimer = null;

            const showSlide = index => {
                activeIndex = (index + slides.length) % slides.length;
                slides.forEach((slide, slideIndex) => {
                    const isActive = slideIndex === activeIndex;
                    slide.classList.toggle('is-active', isActive);
                    slide.setAttribute('aria-hidden', String(!isActive));
                    dots[slideIndex].classList.toggle('is-active', isActive);
                    dots[slideIndex].setAttribute('aria-pressed', String(isActive));
                });
            };

            const stopRotation = () => {
                clearInterval(rotationTimer);
                rotationTimer = null;
            };

            const startRotation = () => {
                if (reduceGalleryMotion || rotationTimer || slides.length < 2) return;
                rotationTimer = setInterval(() => showSlide(activeIndex + 1), 3500);
            };

            dots.forEach((dot, index) => dot.addEventListener('click', () => showSlide(index)));

            const frame = gallery.querySelector('.service-gallery-frame');
            let dragStart = null;

            frame.addEventListener('pointerdown', event => {
                if (!event.isPrimary || (event.pointerType === 'mouse' && event.button !== 0)) return;
                dragStart = { x: event.clientX, y: event.clientY, pointerId: event.pointerId };
                frame.setPointerCapture(event.pointerId);
                frame.classList.add('is-dragging');
            });

            frame.addEventListener('pointerup', event => {
                if (!dragStart || dragStart.pointerId !== event.pointerId) return;
                const deltaX = event.clientX - dragStart.x;
                const deltaY = event.clientY - dragStart.y;
                if (Math.abs(deltaX) >= 40 && Math.abs(deltaX) > Math.abs(deltaY)) {
                    showSlide(activeIndex + (deltaX < 0 ? 1 : -1));
                }
                dragStart = null;
                frame.classList.remove('is-dragging');
            });

            frame.addEventListener('pointercancel', () => {
                dragStart = null;
                frame.classList.remove('is-dragging');
            });

            card.addEventListener('pointerenter', event => {
                if (event.pointerType === 'mouse') startRotation();
            });
            card.addEventListener('pointerleave', stopRotation);
            card.addEventListener('focusin', startRotation);
            card.addEventListener('focusout', event => {
                if (!card.contains(event.relatedTarget)) stopRotation();
            });
        });

        const revealElements = document.querySelectorAll('.intro, .service-card, .highlight-card, .cta');
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