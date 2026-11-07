<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Alquileres - MAQUITEC I.S.A.C.</title>
    <style>
        :root{--amarillo:#FFD700;--amarillo-hover:#f3cc00;--negro:#121212;--blanco:#fff;--gris-claro:#f8f9fa;--gris-borde:#e2e8f0;--texto-muted:#64748b}
        *{box-sizing:border-box}body{margin:0;font-family:"Inter","Segoe UI",system-ui,sans-serif;color:var(--negro);background:radial-gradient(circle at 50% 20%,#1e1e1e 0%,#0a0a0a 100%);min-height:100vh;display:flex;flex-direction:column}
        .admin-container{display:flex;justify-content:center;padding:40px 20px;flex:1;width:100%}.admin-card{background:var(--blanco);width:100%;max-width:1200px;padding:36px 44px;border-radius:20px;box-shadow:0 25px 50px -12px rgba(0,0,0,.6);border-top:4px solid var(--amarillo)}
        .header-flex{display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;flex-wrap:wrap;gap:15px}.admin-card h1{margin:0 0 6px;font-size:1.7rem;font-weight:800}.admin-card p{margin:0;color:var(--texto-muted);font-size:.9rem}
        .btn{padding:10px 16px;border-radius:10px;font-weight:700;text-decoration:none;font-size:.85rem;display:inline-flex;align-items:center;justify-content:center;cursor:pointer;border:none;transition:.2s ease}.btn-new{background:var(--negro);color:var(--amarillo);padding:11px 20px}.btn-new:hover{background:var(--amarillo);color:var(--negro)}.btn-edit{background:var(--amarillo);color:var(--negro);padding:8px 12px}.btn-delete{background:#ef4444;color:#fff;padding:8px 12px}.btn-back{display:inline-flex;align-items:center;gap:8px;background:var(--gris-claro);color:var(--negro);padding:8px 14px;border-radius:8px;text-decoration:none;font-weight:600;font-size:.85rem;margin-bottom:24px;border:1px solid var(--gris-borde)}
        .alert-success{background:#dcfce7;color:#166534;padding:14px 18px;border-radius:10px;margin-bottom:24px;font-weight:600;font-size:.9rem;border:1px solid #bbf7d0}.filters{display:flex;flex-wrap:wrap;align-items:end;gap:12px;margin-bottom:18px}.filter-field{display:flex;flex-direction:column;gap:6px}.filter-field.search{flex:1 1 260px}.filter-field select,.filter-field input{padding:10px 12px;border:1px solid var(--gris-borde);border-radius:8px;font:inherit}.filter-field label{font-size:.78rem;font-weight:700;color:#334155}.btn-clear{background:var(--gris-claro);color:var(--negro)}
        .table-responsive{width:100%;overflow-x:auto;border-radius:12px;border:1px solid var(--gris-borde)}table{width:100%;border-collapse:collapse;text-align:left;table-layout:fixed}th,td{padding:14px 16px;font-size:.88rem;vertical-align:middle;border-bottom:1px solid var(--gris-borde);overflow-wrap:anywhere}th{background:var(--gris-claro);font-weight:700;color:#334155;text-transform:uppercase;font-size:.75rem;letter-spacing:.05em}tr:last-child td{border-bottom:none}tr{transition:.15s}tr:hover td{background:#fafafa}
        .img-thumb{width:62px;height:62px;object-fit:cover;border-radius:10px;border:1px solid var(--gris-borde)}.equipment-name{display:block;font-weight:800}.muted{display:block;color:var(--texto-muted);font-size:.78rem;margin-top:4px}.badge{padding:5px 10px;border-radius:999px;font-size:.72rem;font-weight:800;text-transform:uppercase;display:inline-block}.available{background:#dcfce7;color:#166534}.maintenance{background:#fee2e2;color:#991b1b}.service{background:#dbeafe;color:#1d4ed8}.active{background:#dcfce7;color:#166534}.inactive{background:#fee2e2;color:#991b1b}.featured{color:#9a6700;font-weight:800}.empty{text-align:center!important;color:var(--texto-muted);padding:40px!important}.pagination{margin-top:22px}
        footer{background:rgba(10,10,10,.95);color:#64748b;text-align:center;padding:18px;font-size:.8rem;border-top:1px solid rgba(255,255,255,.04)}
        @media(max-width:768px){.admin-container{align-items:flex-start;padding:20px 12px}.admin-card{min-width:0;padding:24px 16px;border-radius:18px}.header-flex{flex-direction:column;align-items:flex-start}.btn-new{width:100%}.admin-card h1{font-size:1.4rem}.table-responsive{overflow:visible;border:0}table,tbody{display:block;width:100%}thead{display:none}tbody tr{display:grid;grid-template-columns:76px minmax(0,1fr);gap:0 8px;margin-bottom:12px;padding:8px;border:1px solid var(--gris-borde);border-radius:12px;background:#fff}tbody td{display:block;min-width:0;padding:9px 8px;border:0;font-size:.84rem}tbody td::before{content:attr(data-label);display:block;margin-bottom:4px;color:var(--texto-muted);font-size:.66rem;font-weight:800;text-transform:uppercase}tbody td:nth-child(1){grid-column:1;grid-row:1}tbody td:nth-child(2){grid-column:2;grid-row:1}tbody td:nth-child(3){grid-column:1/-1;grid-row:2}tbody td:nth-child(4){grid-column:1/-1;grid-row:3}tbody td:nth-child(5){grid-column:1/-1;grid-row:4}tbody td:nth-child(6){display:grid;grid-column:1/-1;grid-row:5;grid-template-columns:repeat(2,minmax(0,1fr));gap:8px}tbody td:nth-child(6)::before{grid-column:1/-1}tbody td:nth-child(6) form{margin:0}tbody td:nth-child(6) .btn{width:100%}.img-thumb{width:64px;height:64px}.filters{align-items:stretch}.filter-field{width:100%}}
    </style>
</head>
<body>
    <div>@include('footer.top')</div>
    <div class="admin-container">
        <div class="admin-card">
            <a href="{{ route('admin.dashboard') }}" class="btn-back">&larr; Volver al Panel</a>
            <div class="header-flex">
                <div><h1>Gestión de Alquileres</h1><p>Administre equipos, disponibilidad, publicaciones y consultas.</p></div>
                <a href="{{ route('admin.alquileres.create') }}" class="btn btn-new">+ Nuevo Equipo</a>
            </div>
            @if(session('success'))<div class="alert-success">{{ session('success') }}</div>@endif
            <form method="GET" action="{{ route('admin.alquileres.index') }}" class="filters">
                <div class="filter-field search"><label for="buscar-alquiler">Buscar equipo</label><input id="buscar-alquiler" type="search" name="buscar" value="{{ request('buscar') }}" placeholder="Nombre o marca"></div>
                <div class="filter-field"><label for="estado-alquiler">Estado</label><select id="estado-alquiler" name="estado"><option value="">Todos los estados</option><option value="disponible" @selected(request('estado')==='disponible')>Disponible</option><option value="mantenimiento" @selected(request('estado')==='mantenimiento')>En mantenimiento</option><option value="en_servicio" @selected(request('estado')==='en_servicio')>En servicio</option></select></div>
                <div class="filter-field"><label for="publicacion-alquiler">Publicación</label><select id="publicacion-alquiler" name="activo"><option value="">Todos</option><option value="1" @selected(request('activo')==='1')>Activos</option><option value="0" @selected(request('activo')==='0')>Inactivos</option></select></div>
                <button type="submit" class="btn btn-new">Buscar</button>
                @if(request()->hasAny(['buscar','estado','activo']))<a href="{{ route('admin.alquileres.index') }}" class="btn btn-clear">Limpiar</a>@endif
            </form>
            <div class="table-responsive">
                <table>
                    <thead><tr><th>Imagen</th><th>Equipo</th><th>Capacidad</th><th>Estado</th><th>Publicación</th><th>Acciones</th></tr></thead>
                    <tbody>
                    @forelse($alquileres as $alquiler)
                        <tr>
                            <td data-label="Imagen"><img class="img-thumb" src="{{ asset($alquiler->imagen ?: 'img/img_maquitec1.jpg') }}" alt="{{ $alquiler->nombre }}"></td>
                            <td data-label="Equipo"><strong class="equipment-name">{{ $alquiler->nombre }}</strong><span class="muted">{{ $alquiler->marca ?: 'Sin marca' }}</span>@if($alquiler->destacado)<span class="muted featured">Destacado</span>@endif</td>
                            <td data-label="Capacidad"><strong>{{ $alquiler->toneladas ? rtrim(rtrim(number_format((float)$alquiler->toneladas,2,'.',''),'0'),'.').' toneladas' : 'Consultar' }}</strong><span class="muted">{{ $alquiler->combustible === 'ambos' ? 'Gasolina y gas' : ucfirst(str_replace('_',' ', $alquiler->combustible)) }}</span>@if($alquiler->altura_maxima !== null)<span class="muted">Altura máxima: {{ number_format($alquiler->altura_maxima) }} mm</span>@endif @if($alquiler->ancho_pasillo !== null)<span class="muted">Ancho de pasillo: {{ number_format($alquiler->ancho_pasillo) }} mm</span>@endif</td>
                            <td data-label="Estado"><span class="badge {{ $alquiler->estado === 'disponible' ? 'available' : ($alquiler->estado === 'mantenimiento' ? 'maintenance' : 'service') }}">{{ str_replace('_',' ', $alquiler->estado) }}</span></td>
                            <td data-label="Publicación"><span class="badge {{ $alquiler->activo ? 'active' : 'inactive' }}">{{ $alquiler->activo ? 'Activo' : 'Inactivo' }}</span><span class="muted">{{ $alquiler->consultas_count }} consulta{{ $alquiler->consultas_count === 1 ? '' : 's' }}</span></td>
                            <td data-label="Acciones"><a class="btn btn-edit" href="{{ route('admin.alquileres.edit',$alquiler) }}">Editar</a><form action="{{ route('admin.alquileres.destroy',$alquiler) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar este equipo y sus consultas?')">@csrf @method('DELETE')<button class="btn btn-delete" type="submit">Eliminar</button></form></td>
                        </tr>
                    @empty
                        <tr><td class="empty" colspan="6">No hay equipos de alquiler registrados con los filtros seleccionados.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="pagination">{{ $alquileres->withQueryString()->links() }}</div>
        </div>
    </div>
    @include('footer.bottom')
</body>
</html>
