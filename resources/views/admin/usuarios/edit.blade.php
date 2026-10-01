<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - MAQUITEC I.S.A.C.</title>
    <style>
        :root { 
            --amarillo: #FFD700; 
            --amarillo-hover: #e6c200;
            --negro: #121212; 
            --blanco: #ffffff; 
            --gris-claro: #f8fafc;
            --gris-borde: #cbd5e1;
            --gris-input: #f1f5f9;
            --gris-readonly: #e2e8f0;
            --texto-muted: #64748b;
            --texto-dark: #1e293b;
            --rojo-error: #ef4444;
            --verde-exito: #10b981;
        }
        
        * { box-sizing: border-box; }
        
        body {
            margin: 0;
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, sans-serif;
            color: var(--negro);
            background: radial-gradient(circle at 50% 15%, #1f2023 0%, #0a0a0b 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            -webkit-font-smoothing: antialiased;
        }

        .header-wrapper {
            width: 100%;
        }

        .top-bar { 
            background: rgba(10, 10, 10, 0.95); 
            backdrop-filter: blur(10px);
            color: var(--blanco); 
            padding: 10px 8%; 
            display: flex; 
            flex-wrap: wrap; 
            justify-content: space-between; 
            gap: 12px; 
            font-size: 0.85rem; 
            border-bottom: 1px solid rgba(255,255,255,0.08); 
        }
        .top-bar span { display: inline-flex; align-items: center; gap: 8px; color: #cbd5e1; }
        
        nav { 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            padding: 14px 8%; 
            background: rgba(18, 18, 18, 0.98); 
            border-bottom: 3px solid var(--amarillo); 
            box-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }
        .logo { display: flex; align-items: center; gap: 14px; text-decoration: none; }
        .logo img { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; border: 2px solid var(--amarillo); }
        .logo-text strong { font-size: 1.05rem; color: var(--amarillo); letter-spacing: 0.05em; display: block; }
        .logo-text span { color: #94a3b8; font-size: 0.75rem; display: block; }

        .user-pill {
            background: rgba(255, 215, 0, 0.1);
            border: 1px solid rgba(255, 215, 0, 0.3);
            padding: 6px 16px;
            border-radius: 20px;
            color: var(--blanco);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }
        .user-pill span { color: var(--amarillo); font-weight: 700; }

        /* Contenedor y Tarjeta Principal */
        .admin-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 20px;
            flex: 1;
            width: 100%;
        }

        .admin-card {
            background: var(--blanco);
            width: 100%;
            max-width: 850px;
            padding: 44px 52px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
            border-top: 6px solid var(--amarillo);
            position: relative;
        }

        .card-header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .btn-back { 
            display: inline-flex; 
            align-items: center; 
            gap: 8px; 
            background: var(--gris-input); 
            color: var(--texto-dark); 
            padding: 9px 16px; 
            border-radius: 10px; 
            text-decoration: none; 
            font-weight: 600; 
            font-size: 0.85rem; 
            border: 1px solid var(--gris-borde);
            transition: all 0.2s ease;
        }
        .btn-back:hover {
            background: #e2e8f0;
            color: #000;
            transform: translateX(-3px);
        }

        .user-id-badge {
            font-size: 0.8rem;
            background: #f1f5f9;
            color: var(--texto-muted);
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 700;
            letter-spacing: 0.05em;
        }

        h1 { 
            margin: 0 0 6px 0; 
            color: var(--negro); 
            font-size: 1.8rem; 
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .subtitle {
            margin: 0 0 30px 0;
            color: var(--texto-muted);
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .subtitle strong {
            color: var(--texto-dark);
        }

        /* Alertas */
        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            font-size: 0.9rem;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        .alert-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        /* Grid del Formulario */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px 24px;
        }

        .form-group { 
            display: flex; 
            flex-direction: column; 
            gap: 8px; 
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        label { 
            font-size: 0.8rem; 
            font-weight: 700; 
            text-transform: uppercase; 
            color: #475569; 
            letter-spacing: 0.05em;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        label .badge-static {
            color: var(--texto-muted);
            font-weight: 600;
            text-transform: none;
            font-size: 0.72rem;
            background: #e2e8f0;
            padding: 2px 8px;
            border-radius: 4px;
        }

        label .optional {
            color: var(--texto-muted);
            font-weight: 400;
            text-transform: none;
            font-size: 0.75rem;
        }

        input, select { 
            padding: 12px 16px; 
            border: 1.5px solid var(--gris-borde); 
            border-radius: 10px; 
            font-size: 0.95rem; 
            outline: none; 
            background: var(--gris-input);
            color: var(--texto-dark);
            transition: all 0.2s ease;
            font-family: inherit;
        }

        input:focus, select:focus { 
            border-color: var(--negro); 
            background: var(--blanco);
            box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.06);
        }

        /* Estilos específicos para campos estáticos de solo lectura */
        input[readonly], select[disabled] {
            background: var(--gris-readonly);
            color: #64748b;
            border-color: #cbd5e1;
            cursor: not-allowed;
            user-select: none;
        }

        input[readonly]:focus {
            box-shadow: none;
            border-color: #cbd5e1;
        }

        .form-actions {
            grid-column: span 2;
            margin-top: 15px;
            display: flex;
            gap: 14px;
        }

        .btn-submit { 
            background: var(--negro); 
            color: var(--amarillo); 
            padding: 14px 28px; 
            border: 2px solid var(--negro); 
            border-radius: 10px; 
            font-weight: 800; 
            font-size: 0.95rem; 
            cursor: pointer; 
            flex: 1;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .btn-submit:hover { 
            background: var(--amarillo); 
            color: var(--negro); 
            border-color: var(--amarillo);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.3);
        }

        footer {
            background: rgba(10, 10, 10, 0.95);
            color: #64748b;
            text-align: center;
            padding: 20px;
            font-size: 0.8rem;
            border-top: 1px solid rgba(255,255,255,0.05);
            width: 100%;
        }

        @media (max-width: 768px) {
            .admin-card { padding: 30px 24px; }
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full-width, .form-actions { grid-column: span 1; }
            .form-actions { flex-direction: column; }
        }
    </style>
</head>
<body>

    <div class="header-wrapper">
        <div class="top-bar">
            <span>Av. San Agustín SMP, Lima, Perú</span>
            <span>📞 963 727 185 | 955 081 815</span>
            <span>✉ maquitec.servicios0601@gmail.com</span>
        </div>
        
        <nav>
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('img/logo_pagina_general/maquitec_2026_new.jpg') }}" alt="Logo Maquitec">
                <div class="logo-text">
                    <strong>MAQUITEC´I</strong>
                    <span>Soluciones industriales en movimiento</span>
                </div>
            </a>
            <div class="user-pill">
                Hola, <span>{{ Auth::user()->name }}</span>
            </div>
        </nav>
    </div>

    <div class="admin-container">
        <main class="admin-card">
            <div class="card-header-actions">
                <a href="{{ route('admin.usuarios.index') }}" class="btn-back">&larr; Volver a la lista</a>
                <span class="user-id-badge">ID USUARIO: #{{ $usuario->id }}</span>
            </div>
            
            <h1>Editar Usuario</h1>
            <p class="subtitle">Gestionando perfil de <strong>{{ $usuario->name }}</strong></p>

            @if(session('success'))
                <div class="alert alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    ⚠️ Ocurrió un problema con los datos ingresados. Por favor verifica los campos.
                </div>
            @endif

            <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <!-- Tipo de Documento (SÓLO LECTURA) -->
                    <div class="form-group">
                        <label>Tipo de Documento <span class="badge-static">No modificable</span></label>
                        <input type="text" value="{{ $usuario->tipo_documento ?? (strlen($usuario->numero_documento ?? $usuario->dni ?? $usuario->ruc) == 11 ? 'RUC' : 'DNI') }}" readonly tabindex="-1">
                    </div>

                    <!-- Número de DNI o RUC (SÓLO LECTURA) -->
                    <div class="form-group">
                        <label>N° Documento (DNI / RUC) <span class="badge-static">No modificable</span></label>
                        <input type="text" value="{{ $usuario->numero_documento ?? $usuario->dni ?? $usuario->ruc }}" readonly tabindex="-1">
                    </div>

                    <!-- Nombre completo / Razon Social (SÓLO LECTURA) -->
                    <div class="form-group">
                        <label>Nombre / Razón Social <span class="badge-static">No modificable</span></label>
                        <input type="text" value="{{ $usuario->name }}" readonly tabindex="-1">
                    </div>

                    <!-- Correo Electrónico (SÓLO LECTURA) -->
                    <div class="form-group">
                        <label>Correo electrónico <span class="badge-static">No modificable</span></label>
                        <input type="email" value="{{ $usuario->email }}" readonly tabindex="-1">
                    </div>

                    <!-- Rol del Usuario (EDITABLE) -->
                    <div class="form-group">
                        <label>Rol de Usuario</label>
                        <select name="rol" required>
                            <option value="Cliente" {{ old('rol', $usuario->rol) === 'Cliente' ? 'selected' : '' }}>Cliente</option>
                            <option value="Administrador" {{ old('rol', $usuario->rol) === 'Administrador' ? 'selected' : '' }}>Administrador</option>
                        </select>
                    </div>

                    <!-- Teléfono (EDITABLE) -->
                    <div class="form-group">
                        <label>Teléfono / Celular <span class="optional">(Opcional)</span></label>
                        <input type="text" name="telefono" value="{{ old('telefono', $usuario->telefono) }}" placeholder="Ej. +51 987 654 321">
                    </div>

                    <!-- Dirección (EDITABLE) -->
                    <div class="form-group full-width">
                        <label>Dirección <span class="optional">(Opcional)</span></label>
                        <input type="text" name="direccion" value="{{ old('direccion', $usuario->direccion) }}" placeholder="Ej. Av. San Agustín SMP, Lima">
                    </div>

                    <!-- Botón de Envío -->
                    <div class="form-actions">
                        <button type="submit" class="btn-submit">Guardar Cambios</button>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <footer>
        © 2026 MAQUITEC I.S.A.C. — Todos los derechos reservados.
    </footer>
</body>
</html>