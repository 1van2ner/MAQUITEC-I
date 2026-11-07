<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler de Equipos - MAQUITEC I.S.A.C.</title>
    <style>
        :root{--yellow:#f7d547;--yellow-hover:#e5c338;--ink:#121316;--card:rgba(255,255,255,.03);--border:rgba(255,255,255,.09);--white:#fff;--muted:#a1a1aa}
        *{box-sizing:border-box}body{margin:0;font-family:Inter,"Segoe UI",system-ui,sans-serif;color:var(--white);background-color:#121316;background-image:linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(0deg,rgba(0,0,0,.4) 1px,transparent 1px),repeating-linear-gradient(0deg,transparent,transparent 2px,rgba(0,0,0,.25) 2px,rgba(0,0,0,.25) 4px);background-size:100% 100%,100% 100%,100% 6px;min-height:100vh}
        .top-nav-bar{background:rgba(18,19,22,.85);padding:16px 4%;border-bottom:1px solid var(--border);font-size:.95rem;color:var(--muted);backdrop-filter:blur(10px)}.top-nav-bar a{color:var(--yellow);text-decoration:none;font-weight:700}.top-nav-bar span{color:white}
        .hero{min-height:360px;padding:60px 20px;display:grid;place-items:center;text-align:center;position:relative;overflow:hidden;border-bottom:2px solid var(--border);background:radial-gradient(ellipse at 50% 45%,#28231a 0%,#111216 60%,#090a0d 100%)}
        .hero-slats{position:absolute;inset:0;z-index:0;width:100%;height:100%;pointer-events:none}
        .hero-content{position:relative;z-index:2;width:100%}.hero:after{content:"";position:absolute;inset:0;z-index:1;pointer-events:none;background:radial-gradient(circle at center,rgba(10,10,12,.18) 0%,rgba(10,10,12,.58) 78%,rgba(10,10,12,.72) 100%)}.hero-badge{display:inline-block;margin-bottom:14px;padding:7px 16px;border:1px solid rgba(247,213,71,.32);border-radius:999px;background:rgba(247,213,71,.09);color:var(--yellow);font-size:.78rem;font-weight:900;letter-spacing:.08em;text-transform:uppercase}.hero h1{margin:0;font-size:clamp(2.5rem,5vw,4rem);line-height:1;text-transform:uppercase;letter-spacing:-.03em}.hero h1 span{color:var(--yellow)}.hero p{max-width:760px;margin:18px auto 0;color:#d1d5db;line-height:1.7;font-size:1.08rem}
        .container{width:min(1520px,94%);margin:34px auto 80px}.grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.card{overflow:hidden;border-radius:16px;background:var(--card);border:1px solid var(--border);display:flex;flex-direction:column;transition:.25s ease;backdrop-filter:blur(10px)}.card:hover{transform:translateY(-6px);border-color:var(--yellow);box-shadow:0 16px 32px rgba(247,213,71,.13)}.media{height:280px;background:#f7f7f7;position:relative;overflow:hidden;border-bottom:1px solid rgba(255,255,255,.06)}.media img{width:100%;height:100%;object-fit:cover;transition:.35s}.card:hover .media img{transform:scale(1.04)}.status{position:absolute;top:14px;left:14px;border-radius:999px;padding:7px 11px;font-size:.68rem;font-weight:900;text-transform:uppercase;letter-spacing:.04em;background:#dcfce7;color:#166534;box-shadow:0 5px 14px rgba(0,0,0,.24)}.status.mantenimiento{background:#fee2e2;color:#991b1b}.status.en-servicio{background:#dbeafe;color:#1d4ed8}.featured{position:absolute;right:14px;top:14px;width:38px;height:38px;border-radius:50%;display:grid;place-items:center;background:var(--yellow);color:#111;font-weight:900;box-shadow:0 5px 14px rgba(0,0,0,.25)}
        .content{padding:20px 20px 12px;display:flex;flex-direction:column;flex:1}.brand{color:var(--yellow);font-size:.75rem;text-transform:uppercase;font-weight:900;letter-spacing:.09em}.card h2{margin:7px 0 14px;font-size:1.16rem;line-height:1.35}.specs{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:8px;margin-bottom:14px}.spec{background:rgba(255,255,255,.055);border:1px solid rgba(255,255,255,.055);border-radius:10px;padding:10px;font-size:.72rem;color:var(--muted)}.spec strong{color:white;display:block;margin-top:3px;font-size:.84rem}.description{color:#c1c7d1;font-size:.88rem;line-height:1.55;min-height:54px}.button{display:block;text-align:center;margin-top:auto;padding:13px;border-radius:10px;background:var(--yellow);color:#111;text-decoration:none;font-weight:900;font-size:.88rem;text-transform:uppercase;letter-spacing:.03em;box-shadow:0 5px 14px rgba(247,213,71,.16);transition:.2s}.button:hover{background:var(--yellow-hover);transform:translateY(-2px)}
        .card-actions{display:grid;grid-template-columns:1fr 48px;gap:9px;margin-top:auto}.button{display:block;text-align:center;padding:13px;border-radius:10px;background:var(--yellow);color:#111;text-decoration:none;font-weight:900;font-size:.88rem;text-transform:uppercase;letter-spacing:.03em;box-shadow:0 5px 14px rgba(247,213,71,.16);transition:.2s}.button:hover{background:var(--yellow-hover);transform:translateY(-2px)}.whatsapp-card{width:48px;border-radius:10px;background:#25d366;color:white!important;text-decoration:none;display:grid;place-items:center;font-size:1.1rem;font-weight:900}.empty{grid-column:1/-1;text-align:center;padding:70px 20px;background:var(--card);border:1px solid var(--border);border-radius:16px;color:var(--muted)}.empty h2{color:white}.pagination{margin-top:34px;display:flex;justify-content:center}
        @media(max-width:900px){.grid{grid-template-columns:repeat(2,minmax(0,1fr))}}@media(max-width:600px){.hero{padding:60px 6%}.container{width:92%;margin-top:24px}.grid{grid-template-columns:1fr}.media{height:240px}.specs{grid-template-columns:repeat(2,minmax(0,1fr))}}
    </style>
</head>
<body>
    @include('footer.top')
    <section class="hero">
        <canvas class="hero-slats" aria-hidden="true"></canvas>
        <div class="hero-content">
            <span class="hero-badge">Flota disponible</span>
            <h1>Alquiler de <span>Equipos</span></h1>
            <p>Equipos industriales preparados para cubrir tus operaciones con soporte técnico y atención personalizada.</p>
        </div>
    </section>
    <main class="container">
        <div class="grid">
            @forelse($alquileres as $alquiler)
                <article class="card">
                    <div class="media">
                        <img src="{{ asset($alquiler->imagen ?: 'img/img_maquitec1.jpg') }}" alt="{{ $alquiler->nombre }}">
                        <span class="status {{ $alquiler->estado }}">{{ str_replace('_',' ',ucfirst($alquiler->estado)) }}</span>
                        @if($alquiler->destacado)<span class="featured" title="Destacado">★</span>@endif
                    </div>
                    <div class="content">
                        <span class="brand">{{ $alquiler->marca ?: 'MAQUITEC' }}</span>
                        <h2>{{ $alquiler->nombre }}</h2>
                        <div class="specs">
                            <div class="spec">Capacidad<strong>{{ $alquiler->toneladas ? rtrim(rtrim(number_format((float)$alquiler->toneladas,2,'.',''),'0'),'.').' toneladas' : 'Consultar' }}</strong></div>
                            <div class="spec">Combustible<strong>{{ $alquiler->combustible === 'ambos' ? 'Gasolina y gas' : ucfirst(str_replace('_',' ', $alquiler->combustible)) }}</strong></div>
                            @if($alquiler->altura_maxima !== null)<div class="spec">Altura máxima<strong>{{ number_format($alquiler->altura_maxima) }} mm</strong></div>@endif
                            @if($alquiler->ancho_pasillo !== null)<div class="spec">Ancho de pasillo<strong>{{ number_format($alquiler->ancho_pasillo) }} mm</strong></div>@endif
                        </div>
                        <p class="description">{{ \Illuminate\Support\Str::limit($alquiler->descripcion, 120) ?: 'Solicita información sobre disponibilidad y condiciones de alquiler.' }}</p>
                        <div class="card-actions">
                            <a class="button" href="{{ route('alquileres.show',$alquiler->slug) }}">Solicitar cotización</a>
                            <a class="whatsapp-card" data-rental-whatsapp data-rental-name="{{ $alquiler->nombre }}" href="https://wa.me/51995000355?text={{ urlencode('Hola MAQUITEC, quiero consultar disponibilidad del equipo '.$alquiler->nombre) }}" target="_blank" rel="noopener" aria-label="Consultar por WhatsApp">WA</a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty"><h2>Próximamente</h2><p>No hay equipos de alquiler publicados en este momento.</p></div>
            @endforelse
        </div>
        <div class="pagination">{{ $alquileres->links() }}</div>
    </main>
    @include('footer.bottom')
    <script>
        (() => {
            const canvas = document.querySelector('.hero .hero-slats');
            const hero = canvas?.closest('.hero');
            if (!canvas || !hero) return;

            const context = canvas.getContext('2d');
            if (!context) return;

            const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            let width = 0;
            let height = 0;
            let animationFrame = 0;
            let isVisible = false;
            let isPageVisible = !document.hidden;
            const pointer = { x: 0, y: 0, active: false };

            function resize() {
                const bounds = canvas.getBoundingClientRect();
                const scale = Math.min(window.devicePixelRatio || 1, 2);
                width = bounds.width;
                height = bounds.height;
                canvas.width = Math.round(width * scale);
                canvas.height = Math.round(height * scale);
                context.setTransform(scale, 0, 0, scale, 0, 0);
            }

            function draw(time = 0) {
                context.clearRect(0, 0, width, height);

                const background = context.createLinearGradient(0, 0, width, height);
                background.addColorStop(0, '#17151a');
                background.addColorStop(0.52, '#211e19');
                background.addColorStop(1, '#090a0d');
                context.fillStyle = background;
                context.fillRect(0, 0, width, height);

                const slatWidth = 9;
                const slatHeight = 19;
                const stepX = slatWidth + 5;
                const stepY = slatHeight + 9;
                const phase = reducedMotion ? 0 : time * 0.001;

                for (let row = -1; row < Math.ceil(height / stepY) + 1; row++) {
                    for (let column = -1; column < Math.ceil(width / stepX) + 1; column++) {
                        const wave = Math.sin(column * 0.22 + row * 0.3 - phase) * 0.5
                            + Math.cos(column * 0.09 + row * 0.18 + phase * 0.65) * 0.5;
                        const baseX = column * stepX;
                        const baseY = row * stepY + wave * 6;
                        const distance = pointer.active ? Math.hypot(baseX - pointer.x, baseY - pointer.y) : Infinity;
                        const influence = Math.max(0, 1 - distance / 140);
                        const x = baseX + (pointer.x - baseX) * influence * 0.12;
                        const y = baseY + (pointer.y - baseY) * influence * 0.12;
                        const alpha = Math.min(0.9, 0.14 + (wave + 1) * 0.17 + influence * 0.42);

                        context.beginPath();
                        context.roundRect(x, y, slatWidth, slatHeight, 5);
                        context.fillStyle = influence > 0.25
                            ? `rgba(255, 244, 190, ${alpha})`
                            : `rgba(247, 213, 71, ${alpha})`;
                        context.fill();
                    }
                }

                const glow = context.createRadialGradient(width * 0.5, height * 0.45, 0, width * 0.5, height * 0.45, width * 0.62);
                glow.addColorStop(0, 'rgba(247, 213, 71, 0.13)');
                glow.addColorStop(0.65, 'rgba(247, 213, 71, 0.035)');
                glow.addColorStop(1, 'rgba(0, 0, 0, 0.42)');
                context.fillStyle = glow;
                context.fillRect(0, 0, width, height);

                if (pointer.active) {
                    const pointerGlow = context.createRadialGradient(pointer.x, pointer.y, 0, pointer.x, pointer.y, 140);
                    pointerGlow.addColorStop(0, 'rgba(255, 244, 190, 0.22)');
                    pointerGlow.addColorStop(1, 'rgba(247, 213, 71, 0)');
                    context.fillStyle = pointerGlow;
                    context.fillRect(0, 0, width, height);
                }

                if (!reducedMotion && isVisible && isPageVisible) {
                    animationFrame = requestAnimationFrame(draw);
                }
            }

            function startAnimation() {
                if (!reducedMotion && isVisible && isPageVisible && !animationFrame) {
                    animationFrame = requestAnimationFrame((time) => {
                        animationFrame = 0;
                        draw(time);
                    });
                }
            }

            function stopAnimation() {
                if (animationFrame) cancelAnimationFrame(animationFrame);
                animationFrame = 0;
            }

            resize();
            draw();

            hero.addEventListener('pointermove', (event) => {
                if (event.pointerType === 'touch') return;

                const bounds = hero.getBoundingClientRect();
                pointer.x = event.clientX - bounds.left;
                pointer.y = event.clientY - bounds.top;
                pointer.active = true;

                if (reducedMotion) draw(performance.now());
                else startAnimation();
            });

            hero.addEventListener('pointerleave', () => {
                pointer.active = false;
                if (reducedMotion) draw(performance.now());
                else startAnimation();
            });

            const resizeObserver = new ResizeObserver(() => {
                resize();
                draw();
            });
            resizeObserver.observe(canvas);

            if ('IntersectionObserver' in window) {
                const visibilityObserver = new IntersectionObserver(([entry]) => {
                    isVisible = entry.isIntersecting;
                    if (isVisible) startAnimation();
                    else stopAnimation();
                });
                visibilityObserver.observe(canvas);
            } else {
                isVisible = true;
                startAnimation();
            }

            document.addEventListener('visibilitychange', () => {
                isPageVisible = !document.hidden;
                if (isPageVisible) startAnimation();
                else stopAnimation();
            });
        })();

        document.querySelectorAll('[data-rental-whatsapp]').forEach((link) => {
            link.addEventListener('click', () => {
                fetch('{{ route("interacciones.registrar") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        tipo: 'alquiler',
                        item: link.dataset.rentalName,
                        canal: 'whatsapp'
                    }),
                    keepalive: true
                }).catch(() => {});
            });
        });
    </script>
</body>
</html>
