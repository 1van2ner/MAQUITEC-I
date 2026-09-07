@include('footer.top')

<div class="edit-product-wrapper">
    <div class="edit-container">
        
        <!-- Encabezado con Botón de Retorno -->
        <div class="edit-header">
            <a href="{{ route('admin.productos.index') }}" class="btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver al Listado
            </a>
            <div class="header-titles">
                <h1>Editar Producto</h1>
                <p>Modifica los datos del equipo o maquinaria seleccionada en el inventario.</p>
            </div>
        </div>

        <!-- Formulario Principal -->
        <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data" class="product-form">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <!-- Nombre del Producto -->
                <div class="form-group full-width">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required placeholder="Ej. Montacargas Industrial de 5T">
                </div>

                <!-- Categoría -->
                <div class="form-group">
                    <label for="categoria_id">Categoría</label>
                    <div class="select-wrapper">
                        <select id="categoria_id" name="categoria_id" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ (old('categoria_id', $producto->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <svg class="select-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>

                <!-- Código Opcional -->
                <div class="form-group">
                    <label for="codigo">Código (Opcional)</label>
                    <input type="text" id="codigo" name="codigo" value="{{ old('codigo', $producto->codigo) }}" placeholder="Ej. MAQ-4853">
                </div>

                <!-- Precio -->
                <div class="form-group">
                    <label for="precio">Precio (S/)</label>
                    <div class="input-prefix">
                        <span>S/</span>
                        <input type="number" step="0.01" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required placeholder="0.00">
                    </div>
                </div>

                <!-- Stock -->
                <div class="form-group">
                    <label for="stock">Stock Disponible</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required placeholder="1">
                </div>

                <!-- Descripción -->
                <div class="form-group full-width">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="4" placeholder="Detalles generales del equipo...">{{ old('descripcion', $producto->descripcion) }}</textarea>
                </div>

                <!-- Especificaciones -->
                <div class="form-group full-width">
                    <label for="especificaciones">Especificaciones Técnicas (Opcional)</label>
                    <textarea id="especificaciones" name="especificaciones" rows="4" placeholder="Capacidad de carga, altura de elevación, motor...">{{ old('especificaciones', $producto->especificaciones) }}</textarea>
                </div>

                <!-- NUEVO: Checkbox / Interruptor de Producto Destacado -->
                <div class="form-group full-width">
                    <div class="destacado-toggle-box">
                        <label class="toggle-switch-container">
                            <input type="checkbox" id="destacado" name="destacado" value="1" {{ old('destacado', $producto->destacado ?? 0) ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                        <div class="destacado-label-text">
                            <label for="destacado" class="destacado-title">Marcar como Producto Destacado</label>
                            <p class="destacado-desc">Aparecerá en la sección de destacados de la página principal (Inicio).</p>
                        </div>
                    </div>
                </div>

                <!-- Sección de Imagen (Mantiene tu lógica funcional exacta) -->
                <div class="form-group full-width image-section">
                    <label>Imagen del Producto</label>
                    <div class="image-upload-container">
                        @if($producto->imagen)
                            <div class="current-image-preview">
                                <img src="{{ str_starts_with($producto->imagen, 'http') ? $producto->imagen : asset(ltrim(str_replace('public/', '', str_replace('storage/', '', $producto->imagen)), '/')) }}" alt="Imagen actual del producto">
                                <span>Imagen actual</span>
                            </div>
                        @else
                            <div class="current-image-preview placeholder">
                                <span>Sin imagen</span>
                            </div>
                        @endif

                        <div class="file-input-wrapper">
                            <label for="imagen" class="file-custom-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Cambiar imagen de archivo
                            </label>
                            <input type="file" id="imagen" name="imagen" accept="image/*">
                            <span class="file-name-display">Ningún archivo seleccionado</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="form-actions">
                <a href="{{ route('admin.productos.index') }}" class="btn-cancelar">Cancelar</a>
                <button type="submit" class="btn-submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Actualizar Producto
                </button>
            </div>
        </form>

    </div>
</div>

<style>
    :root {
        --primary-dark: #111111;
        --accent-yellow: #FFD700;
        --accent-yellow-hover: #e6c200;
        --bg-color: #f8fafc;
        --card-bg: #ffffff;
        --text-main: #1e293b;
        --text-muted: #64748b;
        --border-color: #cbd5e1;
    }

    .edit-product-wrapper {
        background-color: var(--bg-color);
        padding: 40px 20px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .edit-container {
        background: var(--card-bg);
        width: 100%;
        max-width: 850px;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06);
        padding: 40px;
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .edit-header {
        margin-bottom: 32px;
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 24px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--text-muted);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 16px;
        transition: color 0.2s ease;
    }

    .btn-back svg {
        width: 18px;
        height: 18px;
    }

    .btn-back:hover {
        color: var(--primary-dark);
    }

    .header-titles h1 {
        margin: 0;
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--primary-dark);
        letter-spacing: -0.02em;
    }

    .header-titles p {
        margin: 6px 0 0 0;
        color: var(--text-muted);
        font-size: 0.95rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 24px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group.full-width {
        grid-column: span 2;
    }

    .form-group label {
        font-weight: 700;
        font-size: 0.9rem;
        color: var(--text-main);
    }

    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid var(--border-color);
        border-radius: 12px;
        font-size: 0.95rem;
        color: var(--text-main);
        background-color: #fff;
        transition: all 0.2s ease;
        outline: none;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: var(--primary-dark);
        box-shadow: 0 0 0 3px rgba(17, 17, 17, 0.08);
    }

    .select-wrapper {
        position: relative;
    }

    .select-wrapper select {
        appearance: none;
        cursor: pointer;
        padding-right: 40px;
    }

    .select-arrow {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        color: var(--text-muted);
        pointer-events: none;
    }

    .input-prefix {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-prefix span {
        position: absolute;
        left: 16px;
        font-weight: 600;
        color: var(--text-muted);
    }

    .input-prefix input {
        padding-left: 48px !important;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    /* Estilos para el Switch de Destacado */
    .destacado-toggle-box {
        display: flex;
        align-items: center;
        gap: 16px;
        background: #f8fafc;
        padding: 16px 20px;
        border-radius: 14px;
        border: 1.5px solid var(--border-color);
    }

    .toggle-switch-container {
        position: relative;
        display: inline-block;
        width: 52px;
        height: 28px;
        flex-shrink: 0;
    }

    .toggle-switch-container input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: #cbd5e1;
        transition: .3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 34px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0,0,0,0.15);
    }

    .toggle-switch-container input:checked + .toggle-slider {
        background-color: var(--primary-dark);
    }

    .toggle-switch-container input:checked + .toggle-slider:before {
        transform: translateX(24px);
    }

    .destacado-label-text {
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }

    .destacado-title {
        font-weight: 700;
        font-size: 0.95rem;
        color: var(--text-main);
        cursor: pointer;
    }

    .destacado-desc {
        margin: 2px 0 0 0;
        font-size: 0.82rem;
        color: var(--text-muted);
    }

    /* Estilo para la zona de imagen */
    .image-upload-container {
        display: flex;
        align-items: center;
        gap: 20px;
        background: #f8fafc;
        padding: 16px;
        border-radius: 14px;
        border: 1.5px dashed var(--border-color);
    }

    .current-image-preview {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
    }

    .current-image-preview img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid var(--border-color);
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .current-image-preview span, .file-name-display {
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    .file-input-wrapper {
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 6px;
        flex: 1;
    }

    .file-input-wrapper input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .file-custom-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #fff;
        border: 1.5px solid var(--border-color);
        color: var(--text-main);
        padding: 10px 18px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.2s ease;
        width: fit-content;
    }

    .file-custom-btn:hover {
        background: #f1f5f9;
        border-color: var(--text-muted);
    }

    /* Botones finales */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 14px;
        margin-top: 36px;
        padding-top: 24px;
        border-top: 2px solid #f1f5f9;
    }

    .btn-cancelar {
        background: #f1f5f9;
        color: var(--text-main);
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: background 0.2s ease;
    }

    .btn-cancelar:hover {
        background: #e2e8f0;
    }

    .btn-submit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--accent-yellow);
        color: var(--primary-dark);
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 800;
        border: none;
        cursor: pointer;
        transition: transform 0.15s ease, background 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 4px 14px rgba(255, 215, 0, 0.3);
    }

    .btn-submit:hover {
        background: var(--accent-yellow-hover);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(255, 215, 0, 0.4);
    }

    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        .form-group.full-width {
            grid-column: span 1;
        }
        .edit-container {
            padding: 20px;
        }
        .image-upload-container {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<script>
    document.getElementById('imagen').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Ningún archivo seleccionado';
        document.querySelector('.file-name-display').textContent = fileName;
    });
</script>

@include('footer.bottom')