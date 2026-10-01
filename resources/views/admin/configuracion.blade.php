@extends('layouts.admin')

@section('content')
<div style="padding: 40px 6%; max-width: 980px; margin: 0 auto;">
    <div style="background: #fff; border: 1px solid #e4e4e7; border-radius: 16px; box-shadow: 0 8px 25px rgba(0,0,0,0.04); padding: 30px;">
        <h2 style="margin-top: 0; margin-bottom: 20px; font-size: 2rem; color: #111;">Configuración del Sitio</h2>

        <form action="{{ url('/admin/configuracion') }}" method="POST">
            @csrf

            <div style="display: grid; gap: 20px;">
                <div>
                    <label style="display:block; font-weight: 700; margin-bottom: 8px;">Nombre de la empresa</label>
                    <input type="text" value="MAQUITEC I.S.A.C." style="width: 100%; padding: 12px 14px; border: 1px solid #d4d4d8; border-radius: 10px;">
                </div>

                <div>
                    <label style="display:block; font-weight: 700; margin-bottom: 8px;">Correo de contacto</label>
                    <input type="email" value="maquitec.servicios0601@gmail.com" style="width: 100%; padding: 12px 14px; border: 1px solid #d4d4d8; border-radius: 10px;">
                </div>

                <div>
                    <label style="display:block; font-weight: 700; margin-bottom: 8px;">Teléfono</label>
                    <input type="text" value="+51 987 654 321" style="width: 100%; padding: 12px 14px; border: 1px solid #d4d4d8; border-radius: 10px;">
                </div>

                <div>
                    <label style="display:block; font-weight: 700; margin-bottom: 8px;">Horario de atención</label>
                    <input type="text" value="Lun - Sab: 8:00 a.m. - 6:00 p.m." style="width: 100%; padding: 12px 14px; border: 1px solid #d4d4d8; border-radius: 10px;">
                </div>

                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <button type="submit" style="background: #22c55e; color: white; border: none; border-radius: 10px; padding: 12px 20px; font-weight: 700; cursor: pointer;">
                        Guardar cambios
                    </button>
                    <a href="{{ route('admin.dashboard') }}" style="background: #6b7280; color: white; border-radius: 10px; padding: 12px 20px; text-decoration: none; font-weight: 700;">
                        Volver
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
