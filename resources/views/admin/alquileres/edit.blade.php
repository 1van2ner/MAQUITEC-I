<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipo de Alquiler - MAQUITEC I.S.A.C.</title>
    <style>
        :root{--amarillo:#FFD700;--amarillo-hover:#f3cc00;--negro:#121212;--blanco:#fff;--gris-claro:#f8f9fa;--gris-borde:#e2e8f0;--texto-muted:#64748b}
        *{box-sizing:border-box}body{margin:0;font-family:"Inter","Segoe UI",system-ui,sans-serif;color:var(--negro);background:radial-gradient(circle at 50% 20%,#1e1e1e 0%,#0a0a0a 100%);min-height:100vh;display:flex;flex-direction:column}.admin-container{display:flex;justify-content:center;padding:40px 20px;flex:1}.admin-card{background:var(--blanco);width:100%;max-width:850px;padding:40px 48px;border-radius:20px;box-shadow:0 25px 50px -12px rgba(0,0,0,.6);border-top:4px solid var(--amarillo)}.admin-header{margin-bottom:25px;border-bottom:2px solid #f1f5f9;padding-bottom:20px}.admin-card h1{margin:0 0 6px;font-size:1.8rem}.subtitle{margin:0;color:var(--texto-muted)}.btn-back-link{display:inline-flex;margin-bottom:16px;color:var(--texto-muted);font-weight:600;text-decoration:none}
        .form-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}.form-group{display:flex;flex-direction:column;gap:6px}.form-group.full-width{grid-column:span 2}.form-group label{font-size:.83rem;font-weight:700;text-transform:uppercase;color:#334155}.form-group input,.form-group select,.form-group textarea{width:100%;padding:12px 14px;border:1.5px solid var(--gris-borde);border-radius:10px;font-size:.95rem;outline:none;font-family:inherit;background:var(--gris-claro);color:var(--negro)}textarea{resize:vertical;min-height:110px}.form-group input:focus,.form-group select:focus,.form-group textarea:focus{border-color:var(--negro);background:#fff;box-shadow:0 0 0 4px rgba(255,215,0,.15)}
        .current{display:grid;grid-template-columns:repeat(auto-fill,minmax(120px,1fr));gap:12px}.current label{position:relative;text-transform:none!important;background:#fff;border:1px solid var(--gris-borde);border-radius:10px;padding:7px}.current img{width:100%;aspect-ratio:4/3;object-fit:cover;border-radius:6px}.current input{position:absolute;left:12px;top:12px;width:auto}.delete-hint{display:block;font-size:.72rem;color:#991b1b;margin-top:5px;text-align:center}.option-box{display:grid!important;grid-template-columns:repeat(2,minmax(0,1fr));align-items:center;gap:12px;background:var(--gris-claro);padding:16px 20px;border-radius:12px;border:1.5px solid var(--gris-borde)}.option-box label{display:flex!important;flex-direction:row!important;align-items:center;justify-content:flex-start;gap:8px;text-transform:none!important;cursor:pointer;font-size:.88rem!important}.option-box input[type="checkbox"]{width:18px!important;height:18px!important;min-width:18px;padding:0!important;border-radius:4px!important;box-shadow:none!important;cursor:pointer}.errors{background:#fee2e2;color:#991b1b;padding:14px 18px;border-radius:10px;margin-bottom:24px;font-weight:600;border:1px solid #fecaca}.form-actions{display:flex;justify-content:flex-end;gap:14px;margin-top:36px;padding-top:24px;border-top:2px solid #f1f5f9}.btn-cancelar{background:#f1f5f9;color:var(--negro);padding:12px 24px;border-radius:10px;font-weight:700;text-decoration:none}.btn-submit{background:var(--amarillo);color:var(--negro);padding:12px 28px;border:none;border-radius:10px;font-weight:800;cursor:pointer}
        @media(max-width:768px){.admin-container{padding:20px 12px}.admin-card{padding:30px 20px;border-radius:18px}.form-grid{grid-template-columns:1fr}.form-group.full-width,.option-box.full-width{grid-column:span 1!important}.option-box{grid-template-columns:1fr!important}.form-actions{flex-direction:column}.btn-cancelar,.btn-submit{width:100%;text-align:center}}
    </style>
</head>
<body>
    <div>@include('footer.top')</div>
    <div class="admin-container">
        <div class="admin-card">
            <a href="{{ route('admin.alquileres.index') }}" class="btn-back-link">&larr; Volver al listado</a>
            <div class="admin-header"><h1>Editar Equipo de Alquiler</h1><p class="subtitle">Actualice los datos técnicos, imágenes y condiciones de publicación.</p></div>
            @if($errors->any())<div class="errors">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>@endif
            <form method="POST" action="{{ route('admin.alquileres.update',$alquiler) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-grid">
                    <div class="form-group"><label for="nombre">Nombre del equipo *</label><input id="nombre" name="nombre" value="{{ old('nombre',$alquiler->nombre) }}" required></div>
                    <div class="form-group"><label for="marca">Marca</label><input id="marca" name="marca" value="{{ old('marca',$alquiler->marca) }}"></div>
                    <div class="form-group"><label for="toneladas">Capacidad en toneladas</label><input id="toneladas" type="number" step="0.01" min="0" name="toneladas" value="{{ old('toneladas',$alquiler->toneladas) }}"></div>
                    <div class="form-group"><label for="combustible">Combustible *</label><select id="combustible" name="combustible" required><option value="gasolina" @selected(old('combustible',$alquiler->combustible)==='gasolina')>Gasolina</option><option value="gas" @selected(old('combustible',$alquiler->combustible)==='gas')>Gas</option><option value="ambos" @selected(old('combustible',$alquiler->combustible)==='ambos')>Gasolina y gas</option><option value="electrico" @selected(old('combustible',$alquiler->combustible)==='electrico')>Eléctrico</option></select></div>
                    <div class="form-group"><label for="altura_maxima">Altura máxima (mm)</label><input id="altura_maxima" type="number" step="1" min="0" name="altura_maxima" value="{{ old('altura_maxima',$alquiler->altura_maxima) }}"></div>
                    <div class="form-group"><label for="ancho_pasillo">Ancho de pasillo (mm)</label><input id="ancho_pasillo" type="number" step="1" min="0" name="ancho_pasillo" value="{{ old('ancho_pasillo',$alquiler->ancho_pasillo) }}"></div>
                    <div class="form-group"><label for="estado">Estado del equipo *</label><select id="estado" name="estado" required><option value="disponible" @selected(old('estado',$alquiler->estado)==='disponible')>Disponible</option><option value="mantenimiento" @selected(old('estado',$alquiler->estado)==='mantenimiento')>En mantenimiento</option><option value="en_servicio" @selected(old('estado',$alquiler->estado)==='en_servicio')>En servicio</option></select></div>
                    <div class="form-group"><label for="imagenes">Agregar imágenes</label><input id="imagenes" type="file" name="imagenes[]" accept="image/jpeg,image/png,image/webp" multiple><small style="color:var(--texto-muted)">Máximo 4 imágenes en total.</small></div>
                    <div class="form-group full-width"><label>Imágenes actuales</label><div class="current">@foreach($alquiler->gallery_images as $image)<label title="Marcar para eliminar"><input type="checkbox" name="eliminar_imagenes[]" value="{{ $image }}"><img src="{{ asset($image) }}" alt=""><span class="delete-hint">Eliminar imagen</span></label>@endforeach</div></div>
                    <div class="form-group full-width"><label for="descripcion">Descripción breve</label><textarea id="descripcion" name="descripcion" rows="4">{{ old('descripcion',$alquiler->descripcion) }}</textarea></div>
                    <div class="form-group full-width"><label for="especificaciones">Especificaciones adicionales</label><textarea id="especificaciones" name="especificaciones" rows="4">{{ old('especificaciones',$alquiler->especificaciones) }}</textarea></div>
                    <div class="option-box full-width"><label><input type="checkbox" name="activo" value="1" {{ old('activo',$alquiler->activo) ? 'checked' : '' }}> <span>Publicar equipo</span></label><label><input type="checkbox" name="destacado" value="1" {{ old('destacado',$alquiler->destacado) ? 'checked' : '' }}> <span>Destacado</span></label></div>
                </div>
                <div class="form-actions"><a class="btn-cancelar" href="{{ route('admin.alquileres.index') }}">Cancelar</a><button class="btn-submit" type="submit">Actualizar equipo</button></div>
            </form>
        </div>
    </div>
    @include('footer.bottom')
</body>
</html>
