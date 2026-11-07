<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $alquiler->nombre }} - Consulta de alquiler</title>
    <style>
        :root{--yellow:#f7d547;--yellow-hover:#e5c338;--ink:#121316;--card:rgba(255,255,255,.03);--border:rgba(255,255,255,.09);--white:#fff;--muted:#a1a1aa}*{box-sizing:border-box}body{margin:0;font-family:Inter,"Segoe UI",system-ui,sans-serif;color:var(--white);background-color:#121316;background-image:linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(0deg,rgba(0,0,0,.4) 1px,transparent 1px),repeating-linear-gradient(0deg,transparent,transparent 2px,rgba(0,0,0,.25) 2px,rgba(0,0,0,.25) 4px);background-size:100% 100%,100% 100%,100% 6px;min-height:100vh}.back-button-wrap{width:min(1200px,92%);margin:28px auto 0}.back-button{display:inline-flex;align-items:center;gap:8px;padding:10px 16px;border:1px solid var(--border);border-radius:10px;background:rgba(255,255,255,.06);color:var(--white);text-decoration:none;font-weight:800;transition:.2s}.back-button:hover{background:var(--yellow);border-color:var(--yellow);color:#111;transform:translateX(-3px)}.quote-hero{text-align:center;padding:42px 20px 10px}.quote-hero h1{margin:0;font-size:clamp(1.8rem,4vw,2.8rem);text-transform:uppercase}.quote-hero h1 span{color:var(--yellow)}.quote-hero p{color:var(--muted)}
        .quote-loading{position:fixed;inset:0;z-index:10050;display:flex;align-items:center;justify-content:center;background:rgba(10,10,10,.58);backdrop-filter:blur(3px);opacity:0;visibility:hidden;pointer-events:none;transition:.18s}.quote-loading.is-visible{opacity:1;visibility:visible;pointer-events:auto}.quote-loading-box{display:flex;align-items:center;gap:12px;padding:16px 20px;border-radius:12px;background:#fff;color:#111;font-weight:800;box-shadow:0 16px 40px rgba(0,0,0,.35)}.loading-spinner{width:22px;height:22px;border:3px solid #d1d5db;border-top-color:var(--yellow);border-radius:50%;animation:quoteSpin .7s linear infinite}.submit.is-loading{opacity:.78;cursor:wait!important;pointer-events:none}@keyframes quoteSpin{to{transform:rotate(360deg)}}
        .wrap{width:min(1200px,92%);margin:28px auto 70px;display:grid;grid-template-columns:1.08fr .92fr;gap:24px}.panel{background:var(--card);border-radius:16px;border:1px solid var(--border);box-shadow:0 14px 36px rgba(0,0,0,.22);overflow:hidden;backdrop-filter:blur(10px)}.gallery{height:430px;background:#f7f7f7;border-bottom:1px solid var(--border)}.gallery img{width:100%;height:100%;object-fit:cover}.gallery-shell{background:#f7f7f7}.gallery-thumbs{display:grid;grid-template-columns:repeat(4,1fr);gap:7px;padding:9px;background:#151619}.gallery-thumb{height:72px;padding:0;border:1px solid transparent;border-radius:7px;background:#fff;overflow:hidden;cursor:pointer}.gallery-thumb.active{border-color:var(--yellow)}.gallery-thumb img{width:100%;height:100%;object-fit:cover}.details{padding:26px}.brand{color:var(--yellow);text-transform:uppercase;font-size:.78rem;font-weight:900;letter-spacing:.08em}.details h1{margin:7px 0 14px;font-size:2rem}.spec-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:18px}.spec{padding:12px;background:rgba(255,255,255,.055);border:1px solid rgba(255,255,255,.055);border-radius:10px;font-size:.78rem;color:var(--muted)}.spec strong{display:block;color:white;margin-top:4px}.description{line-height:1.65;color:#c1c7d1}.availability{display:inline-flex;align-items:center;gap:7px;margin-bottom:12px;padding:8px 11px;border-radius:999px;background:rgba(34,197,94,.12);color:#86efac;font-size:.78rem;font-weight:900}.availability::before{content:"";width:8px;height:8px;border-radius:50%;background:#22c55e}.whatsapp-button{display:flex;align-items:center;justify-content:center;gap:8px;margin-top:12px;padding:13px;border-radius:10px;background:#25d366;color:white;text-decoration:none;font-weight:900}.form{padding:28px;position:sticky;top:24px;align-self:start}.form h2{margin:0 0 6px}.form>p{margin:0 0 20px;color:var(--muted);font-size:.88rem}.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}.field{display:flex;flex-direction:column;gap:7px}.field.full{grid-column:1/-1}.field label{font-size:.82rem;font-weight:800}.field input,.field textarea{width:100%;border:1px solid rgba(255,255,255,.12);border-radius:9px;padding:12px;font:inherit;background:rgba(255,255,255,.06);color:white}.field textarea{min-height:115px;resize:vertical}.field input:focus,.field textarea:focus{outline:none;border-color:var(--yellow);box-shadow:0 0 0 3px rgba(247,213,71,.16)}.submit{width:100%;margin-top:16px;border:none;border-radius:10px;padding:14px;background:var(--yellow);color:#111;font-weight:900;cursor:pointer;text-transform:uppercase}.submit:hover{background:var(--yellow-hover)}.alert{grid-column:1/-1;margin-bottom:14px;padding:12px;border-radius:9px;background:rgba(34,197,94,.16);color:#86efac}.errors{grid-column:1/-1;padding:12px;border-radius:9px;background:rgba(239,68,68,.14);color:#fca5a5}@media(max-width:900px){.wrap{width:92%;grid-template-columns:1fr}.gallery{height:360px}.form{position:static}}@media(max-width:600px){.wrap{margin-top:24px}.gallery{height:260px}.gallery-thumb{height:58px}.details{padding:20px}.details h1{font-size:1.55rem}.spec-grid,.form-grid{grid-template-columns:1fr}.field.full{grid-column:auto}.form{padding:20px}.quote-hero{padding-top:34px}}
    </style>
</head>
<body>
    @include('footer.top')
    <div class="back-button-wrap">
        <a class="back-button" href="{{ route('alquileres.index') }}" aria-label="Volver al listado de alquileres">&larr; Volver a Alquileres</a>
    </div>
    <header class="quote-hero">
        <h1>Consulta de <span>Alquiler</span></h1>
        <p>Solicita disponibilidad, tarifas y condiciones para este equipo.</p>
    </header>
    <main class="wrap">
        <section class="panel">
            <div class="gallery-shell">
                <div class="gallery">
                    <img id="rentalMainImage" src="{{ asset($alquiler->imagen ?: 'img/img_maquitec1.jpg') }}" alt="{{ $alquiler->nombre }}">
                </div>
                @if(count($alquiler->gallery_images) > 1)
                    <div class="gallery-thumbs" aria-label="Galería de imágenes">
                        @foreach($alquiler->gallery_images as $index => $image)
                            <button class="gallery-thumb {{ $index === 0 ? 'active' : '' }}" type="button" data-image="{{ asset($image) }}" aria-label="Ver imagen {{ $index + 1 }}">
                                <img src="{{ asset($image) }}" alt="{{ $alquiler->nombre }} - vista {{ $index + 1 }}">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="details">
                <span class="brand">{{ $alquiler->marca ?: 'MAQUITEC' }}</span>
                <h1>{{ $alquiler->nombre }}</h1>
                <div class="spec-grid">
                    <div class="spec">Capacidad<strong>{{ $alquiler->toneladas ? rtrim(rtrim(number_format((float)$alquiler->toneladas,2,'.',''),'0'),'.').' toneladas' : 'Consultar' }}</strong></div>
                    <div class="spec">Combustible<strong>{{ $alquiler->combustible === 'ambos' ? 'Gasolina y gas' : ucfirst(str_replace('_',' ', $alquiler->combustible)) }}</strong></div>
                    @if($alquiler->altura_maxima !== null)<div class="spec">Altura máxima<strong>{{ number_format($alquiler->altura_maxima) }} mm</strong></div>@endif
                    @if($alquiler->ancho_pasillo !== null)<div class="spec">Ancho de pasillo<strong>{{ number_format($alquiler->ancho_pasillo) }} mm</strong></div>@endif
                    <div class="spec">Estado<strong>{{ str_replace('_',' ', ucfirst($alquiler->estado)) }}</strong></div>
                </div>
                <span class="availability">{{ $alquiler->estado === 'disponible' ? 'Disponible para cotización' : 'Consulta disponibilidad actual' }}</span>
                <p class="description">{{ $alquiler->descripcion ?: 'Consulta disponibilidad, tarifas y condiciones de alquiler para este equipo.' }}</p>
                @if($alquiler->especificaciones)<p class="description"><strong>Especificaciones:</strong><br>{{ $alquiler->especificaciones }}</p>@endif
                <a class="whatsapp-button" data-rental-whatsapp data-rental-name="{{ $alquiler->nombre }}" href="https://wa.me/51995000355?text={{ urlencode('Hola MAQUITEC, quiero consultar el alquiler del equipo '.$alquiler->nombre) }}" target="_blank" rel="noopener">Consultar por WhatsApp</a>
            </div>
        </section>
        <section class="panel form">
            <h2>Solicitar información</h2>
            <p>Déjanos tus datos y te contactaremos para confirmar disponibilidad y cotización.</p>
            <form class="quote-send-form" method="POST" action="{{ route('alquileres.consultar',$alquiler->slug) }}">
                @csrf
                @if(session('message'))<div class="alert">{{ session('message') }}</div>@endif
                @if($errors->any())<div class="errors">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>@endif
                <div class="form-grid">
                    <div class="field"><label for="nombre">Nombre completo *</label><input id="nombre" name="nombre" value="{{ old('nombre') }}" required></div>
                    <div class="field"><label for="empresa">Empresa</label><input id="empresa" name="empresa" value="{{ old('empresa') }}"></div>
                    <div class="field"><label for="email">Correo electrónico *</label><input id="email" type="email" name="email" value="{{ old('email') }}" required></div>
                    <div class="field"><label for="telefono">Teléfono / WhatsApp *</label><input id="telefono" name="telefono" value="{{ old('telefono') }}" required></div>
                    <div class="field full"><label for="mensaje">Detalle de la consulta *</label><textarea id="mensaje" name="mensaje" required>{{ old('mensaje','Necesito información sobre disponibilidad y tarifa de alquiler.') }}</textarea></div>
                </div>
                <button class="submit" type="submit" data-loading-text="Enviando cotización...">Enviar consulta</button>
            </form>
        </section>
    </main>
    @include('footer.bottom')
    <div class="quote-loading" id="quoteLoading" aria-live="polite" aria-label="Enviando cotización">
        <div class="quote-loading-box"><span class="loading-spinner"></span><span>Enviando cotización...</span></div>
    </div>
    <script>
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

        const rentalMainImage = document.getElementById('rentalMainImage');
        document.querySelectorAll('.gallery-thumb').forEach((thumb) => {
            thumb.addEventListener('click', () => {
                document.querySelectorAll('.gallery-thumb').forEach((item) => item.classList.remove('active'));
                thumb.classList.add('active');
                if (rentalMainImage) rentalMainImage.src = thumb.dataset.image;
            });
        });

        document.querySelectorAll('.quote-send-form').forEach((form) => {
            form.addEventListener('submit', () => {
                const button = form.querySelector('[type="submit"]');
                const loading = document.getElementById('quoteLoading');
                if (button) {
                    button.disabled = true;
                    button.classList.add('is-loading');
                    button.textContent = button.dataset.loadingText || 'Enviando...';
                }
                if (loading) loading.classList.add('is-visible');
            });
        });
    </script>
</body>
</html>
