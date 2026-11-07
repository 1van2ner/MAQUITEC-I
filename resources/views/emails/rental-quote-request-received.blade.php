<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva consulta de alquiler</title>
</head>
<body style="margin:0;padding:0;background:#f1f3f5;color:#202124;font-family:Arial,Helvetica,sans-serif;">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#f1f3f5;">
    <tr><td align="center" style="padding:28px 12px;">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:680px;background:#fff;border:1px solid #e5e7eb;border-top:5px solid #ffd700;border-radius:12px;overflow:hidden;">
            <tr><td style="padding:22px 28px;background:#151515;color:#fff;"><div style="font-size:20px;font-weight:700;color:#ffd700;">MAQUITEC I.S.A.C.</div><div style="padding-top:4px;font-size:12px;color:#d1d5db;">Nueva consulta de alquiler</div></td></tr>
            <tr><td style="padding:28px;">
                <h1 style="margin:0 0 8px;font-size:24px;color:#171717;">{{ $quote['alquiler_nombre'] }}</h1>
                <p style="margin:0 0 22px;font-size:14px;color:#64748b;">Un cliente envió una consulta desde la página de alquileres.</p>
                @if($rentalImagePath)
                    <img src="{{ $message->embed($rentalImagePath) }}" alt="{{ $quote['alquiler_nombre'] }}" width="240" style="display:block;width:100%;max-width:240px;margin-bottom:20px;border-radius:8px;">
                @endif
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:14px;line-height:21px;border:1px solid #e5e7eb;border-radius:10px;">
                    @if(!empty($quote['alquiler_marca']))<tr><td width="145" style="padding:7px 14px;color:#64748b;">Marca</td><td style="padding:7px 14px;font-weight:600;">{{ $quote['alquiler_marca'] }}</td></tr>@endif
                    @if(!empty($quote['alquiler_toneladas']))<tr><td style="padding:7px 14px;color:#64748b;">Capacidad</td><td style="padding:7px 14px;font-weight:600;">{{ rtrim(rtrim(number_format((float)$quote['alquiler_toneladas'],2,'.',''),'0'),'.') }} toneladas</td></tr>@endif
                    @if(!empty($quote['alquiler_combustible']))<tr><td style="padding:7px 14px;color:#64748b;">Combustible</td><td style="padding:7px 14px;font-weight:600;">{{ $quote['alquiler_combustible'] === 'ambos' ? 'Gasolina y gas' : ucfirst(str_replace('_',' ', $quote['alquiler_combustible'])) }}</td></tr>@endif
                    @if($quote['alquiler_altura_maxima'] !== null)<tr><td style="padding:7px 14px;color:#64748b;">Altura máxima</td><td style="padding:7px 14px;font-weight:600;">{{ number_format($quote['alquiler_altura_maxima']) }} mm</td></tr>@endif
                    @if($quote['alquiler_ancho_pasillo'] !== null)<tr><td style="padding:7px 14px;color:#64748b;">Ancho de pasillo</td><td style="padding:7px 14px;font-weight:600;">{{ number_format($quote['alquiler_ancho_pasillo']) }} mm</td></tr>@endif
                    @if(!empty($quote['alquiler_estado']))<tr><td style="padding:7px 14px;color:#64748b;">Estado</td><td style="padding:7px 14px;font-weight:600;">{{ str_replace('_',' ', ucfirst($quote['alquiler_estado'])) }}</td></tr>@endif
                </table>
                <h2 style="margin:26px 0 12px;font-size:16px;color:#171717;">Datos del cliente</h2>
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:14px;line-height:21px;">
                    <tr><td width="145" style="padding:5px 0;color:#64748b;">Nombre</td><td style="padding:5px 0;font-weight:600;">{{ $quote['nombre'] }}</td></tr>
                    <tr><td style="padding:5px 0;color:#64748b;">Empresa</td><td style="padding:5px 0;font-weight:600;">{{ $quote['empresa'] ?: 'No indicada' }}</td></tr>
                    <tr><td style="padding:5px 0;color:#64748b;">Correo</td><td style="padding:5px 0;"><a href="mailto:{{ $quote['email'] }}" style="color:#8a6d00;">{{ $quote['email'] }}</a></td></tr>
                    <tr><td style="padding:5px 0;color:#64748b;">Teléfono / WhatsApp</td><td style="padding:5px 0;">{{ $quote['telefono'] }}</td></tr>
                </table>
                <h2 style="margin:24px 0 10px;font-size:16px;color:#171717;">Consulta</h2>
                <div style="padding:15px 17px;border-left:4px solid #ffd700;border-radius:4px;background:#fffbeb;font-size:14px;line-height:22px;color:#374151;">{!! nl2br(e($quote['mensaje'])) !!}</div>
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin-top:22px;"><tr><td style="border-radius:7px;background:#ffd700;"><a href="mailto:{{ $quote['email'] }}" style="display:inline-block;padding:12px 18px;color:#171717;font-size:14px;font-weight:700;text-decoration:none;">Responder al cliente</a></td></tr></table>
            </td></tr>
            <tr><td style="padding:16px 28px;border-top:1px solid #e5e7eb;background:#fafafa;color:#64748b;font-size:11px;">Este mensaje se generó desde el formulario de alquileres de MAQUITEC I.S.A.C.</td></tr>
        </table>
    </td></tr>
</table>
</body>
</html>
