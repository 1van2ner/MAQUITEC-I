<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro de Reclamaciones | MAQUITEC I.S.A.C.</title>
    <style>
        :root { --yellow:#FFD700; --yellow-dark:#9a7b00; --dark:#111111; --ink:#1f2937; --muted:#64748b; --border:#e2e8f0; --soft:#f8fafc; }
        * { box-sizing:border-box; }
        body { margin:0; font-family:"Segoe UI",system-ui,sans-serif; color:var(--ink); background:#f4f5f7; }
        main { max-width:980px; margin:48px auto; padding:38px; background:white; border-radius:16px; box-shadow:0 12px 32px rgba(0,0,0,.08); border-top:5px solid var(--yellow); }
        .breadcrumb { margin-bottom:18px; font-size:.86rem; color:var(--muted); } .breadcrumb a { color:var(--yellow-dark); text-decoration:none; }
        h1 { margin:0 0 8px; color:var(--dark); font-size:2rem; } .intro { margin:0 0 28px; color:var(--muted); line-height:1.65; }
        .claim-header { padding:28px 30px; margin:-38px -38px 28px; border-radius:16px 16px 0 0; background:linear-gradient(135deg,#171717,#292929); border-bottom:4px solid var(--yellow); color:white; }
        .claim-title-row { display:flex; align-items:center; gap:16px; }
        .claim-book-icon { width:58px; height:58px; flex:0 0 58px; display:block; overflow:hidden; border-radius:14px; background:white; border:2px solid var(--yellow); box-shadow:0 8px 20px rgba(255,215,0,.18); }
        .claim-book-icon img { width:100%; height:100%; object-fit:cover; display:block; }
        a.claim-book-button { display:block; border-radius:14px; text-decoration:none; }
        .claim-header h1 { color:white; } .claim-header .intro { color:#d7d7d7; margin-bottom:0; }
        .claim-header .breadcrumb { color:#aaa; } .claim-header .breadcrumb a { color:var(--yellow); }
        .claim-steps { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; margin-bottom:24px; }
        .claim-step { display:flex; align-items:center; gap:10px; padding:12px; border:1px solid var(--border); border-radius:10px; background:var(--soft); font-size:.82rem; font-weight:800; color:#475569; }
        .claim-step span { width:28px; height:28px; flex:0 0 28px; display:grid; place-items:center; border-radius:50%; background:var(--yellow); color:#111; }
        .notice { display:flex; gap:12px; padding:14px 16px; margin-bottom:24px; border-radius:10px; background:#fffbeb; border:1px solid #fde68a; color:#715c00; line-height:1.55; }
        .notice strong { color:#5c4900; }
        .alert { padding:14px 16px; border-radius:10px; margin-bottom:22px; font-weight:600; }
        .alert-success { background:#ecfdf5; color:#166534; border:1px solid #bbf7d0; } .alert-error { background:#fef2f2; color:#991b1b; border:1px solid #fecaca; }
        .alert ul { margin:8px 0 0; padding-left:20px; font-weight:500; }
        fieldset { margin:0 0 22px; padding:22px; border:1px solid var(--border); border-radius:12px; } legend { padding:0 8px; color:var(--dark); font-weight:800; }
        .grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:18px; } .full { grid-column:1/-1; }
        main label { display:block; margin-bottom:7px; font-size:.82rem; font-weight:800; text-transform:uppercase; letter-spacing:.035em; color:#475569; }
        main input,main select,main textarea { width:100%; border:1.5px solid var(--border); border-radius:9px; padding:12px 13px; font:inherit; color:var(--ink); background:white; outline:none; transition:.2s; }
        main textarea { min-height:120px; resize:vertical; } main input:focus,main select:focus,main textarea:focus { border-color:var(--yellow-dark); box-shadow:0 0 0 4px rgba(255,215,0,.15); }
        .choices { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:12px; } .choice { position:relative; }
        .choice input { position:absolute; opacity:0; pointer-events:none; } .choice label { margin:0; height:100%; padding:16px; border:1.5px solid var(--border); border-radius:10px; text-transform:none; letter-spacing:0; cursor:pointer; transition:.2s; }
        .choice label span { display:block; margin-top:3px; color:var(--muted); font-size:.78rem; font-weight:500; text-transform:none; }
        .choice input:checked + label { border-color:var(--yellow); background:#fffbeb; box-shadow:0 0 0 3px rgba(255,215,0,.12); color:#5c4900; }
        .consent { display:flex; align-items:flex-start; gap:10px; margin:12px 0 22px; line-height:1.55; color:#475569; } .consent input { width:18px; height:18px; margin:3px 0 0; flex:0 0 18px; }
        #complaint-submit { width:100%; border:0; border-radius:10px; padding:15px 20px; background:var(--dark); color:var(--yellow); font-weight:900; font-size:.95rem; text-transform:uppercase; letter-spacing:.04em; cursor:pointer; transition:.2s; }
        #complaint-submit:not(:disabled):hover { background:var(--yellow); color:var(--dark); transform:translateY(-1px); }
        #complaint-submit:disabled { background:#d1d5db; color:#6b7280; border:1px solid #b9c0ca; cursor:not-allowed; opacity:1; transform:none; }
        .submit-spinner { display:inline-block; width:18px; height:18px; margin-right:9px; border:3px solid currentColor; border-right-color:transparent; border-radius:50%; vertical-align:-4px; animation:claimSpin .65s linear infinite; }
        @keyframes claimSpin { to { transform:rotate(360deg); } }
        @media (prefers-reduced-motion: reduce) { .submit-spinner { animation-duration:1.5s; } }
        @media(max-width:700px) { main { margin:20px 12px; padding:24px 16px; } .claim-header { margin:-24px -16px 24px; padding:24px 16px 20px; border-radius:16px 16px 0 0; } .claim-title-row { gap:12px; } .claim-book-icon { width:48px; height:48px; flex-basis:48px; border-radius:12px; } .claim-steps { grid-template-columns:1fr; } .grid,.choices { grid-template-columns:1fr; } .full { grid-column:auto; } h1 { font-size:1.55rem; } fieldset { padding:16px 12px; } }
    </style>
</head>
<body>
    @include('footer.top')
    <main>
        <header class="claim-header">
            <div class="breadcrumb"><a href="{{ url('/') }}">Inicio</a> / Libro de Reclamaciones</div>
            <div class="claim-title-row">
                <a href="{{ route('complaints.index') }}" class="claim-book-button" aria-label="Abrir Libro de Reclamaciones"><div class="claim-book-icon"><img src="{{ asset('img/metodos_pago/libro_reclamaciones.jpg') }}" alt="Libro de Reclamaciones"></div></a>
                <div><h1>Libro de Reclamaciones</h1><p class="intro">Registra tu reclamo o queja y envíalo directamente al correo de atención de MAQUITEC.</p></div>
            </div>
        </header>

        <div class="claim-steps" aria-label="Pasos del formulario">
            <div class="claim-step"><span>1</span> Identifica tus datos</div>
            <div class="claim-step"><span>2</span> Selecciona el tipo</div>
            <div class="claim-step"><span>3</span> Describe lo ocurrido</div>
        </div>

        <div class="notice">
            <strong>Recuerda:</strong>
            <span>Los <b>reclamos</b> se relacionan con disconformidades sobre productos o servicios; las <b>quejas</b> se refieren al trato recibido o al funcionamiento interno.</span>
        </div>

        @if(session('message'))<div class="alert alert-success" role="status">✓ {{ session('message') }}</div>@endif
        @if($errors->any())
            <div class="alert alert-error" role="alert"><strong>No pudimos registrar tu solicitud.</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <form method="POST" action="{{ route('complaints.store') }}">
            @csrf
            <fieldset>
                <legend>1. Identificación del consumidor</legend>
                <div class="grid">
                    <div><label for="name">Nombre completo *</label><input id="name" name="name" value="{{ old('name') }}" maxlength="255" required></div>
                    <div><label for="document_type">Tipo de documento *</label><select id="document_type" name="document_type" required><option value="">Selecciona</option><option value="DNI" @selected(old('document_type')==='DNI')>DNI</option><option value="CE" @selected(old('document_type')==='CE')>Carné de extranjería</option><option value="RUC" @selected(old('document_type')==='RUC')>RUC</option><option value="Pasaporte" @selected(old('document_type')==='Pasaporte')>Pasaporte</option></select></div>
                    <div><label for="document_number">Número de documento *</label><input id="document_number" name="document_number" value="{{ old('document_number') }}" maxlength="20" required></div>
                    <div><label for="email">Correo electrónico *</label><input id="email" name="email" type="email" value="{{ old('email') }}" maxlength="255" required></div>
                    <div><label for="phone">Teléfono / celular *</label><input id="phone" name="phone" type="tel" value="{{ old('phone') }}" maxlength="50" required></div>
                    <div><label for="address">Dirección</label><input id="address" name="address" value="{{ old('address') }}" maxlength="255"></div>
                </div>
            </fieldset>

            <fieldset>
                <legend>2. Tipo de incidencia</legend>
                <div class="choices">
                    <div class="choice"><input type="radio" id="claim_reclamo" name="claim_type" value="Reclamo" @checked(old('claim_type','Reclamo')==='Reclamo') required><label for="claim_reclamo">Reclamo<span>Disconformidad relacionada con el producto o servicio.</span></label></div>
                    <div class="choice"><input type="radio" id="claim_queja" name="claim_type" value="Queja" @checked(old('claim_type')==='Queja') required><label for="claim_queja">Queja<span>Disconformidad sobre la atención o el servicio brindado.</span></label></div>
                </div>
            </fieldset>

            <fieldset>
                <legend>3. Detalle de la atención</legend>
                <div class="grid">
                    <div><label for="product">Producto o servicio</label><input id="product" name="product" value="{{ old('product') }}" maxlength="255" placeholder="Ej. Montacargas, mantenimiento, cotización"></div>
                    <div><label for="order_number">Pedido, comprobante o código</label><input id="order_number" name="order_number" value="{{ old('order_number') }}" maxlength="100"></div>
                    <div><label for="purchase_date">Fecha de compra o atención</label><input id="purchase_date" name="purchase_date" type="date" value="{{ old('purchase_date') }}"></div>
                    <div class="full"><label for="detail">Descripción de los hechos *</label><textarea id="detail" name="detail" maxlength="5000" required>{{ old('detail') }}</textarea></div>
                    <div class="full"><label for="customer_request">Pedido concreto del consumidor</label><textarea id="customer_request" name="customer_request" maxlength="3000" placeholder="Indica qué solución esperas por parte de MAQUITEC">{{ old('customer_request') }}</textarea></div>
                </div>
            </fieldset>

            <label class="consent"><input type="checkbox" id="complaint-consent" name="consent" value="1" required {{ old('consent') ? 'checked' : '' }}><span>Declaro que la información proporcionada es verdadera y autorizo el uso de mis datos para gestionar esta reclamación. *</span></label>
            <button type="submit" id="complaint-submit" disabled>Enviar reclamación</button>
        </form>
    </main>

    <script>
        const consentCheckbox = document.getElementById('complaint-consent');
        const complaintSubmit = document.getElementById('complaint-submit');

        function updateComplaintSubmit() {
            complaintSubmit.disabled = !consentCheckbox.checked;
        }

        consentCheckbox.addEventListener('change', updateComplaintSubmit);
        updateComplaintSubmit();

        const complaintForm = complaintSubmit.closest('form');
        complaintForm.addEventListener('submit', function () {
            if (!complaintForm.checkValidity()) return;
            complaintSubmit.disabled = true;
            complaintSubmit.innerHTML = '<span class="submit-spinner" aria-hidden="true"></span>Enviando reclamo...';
            complaintSubmit.setAttribute('aria-busy', 'true');
        });
    </script>
    @include('footer.bottom')
</body>
</html>
