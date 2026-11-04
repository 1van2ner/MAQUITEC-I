<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restablecer contraseña - MAQUITEC I.S.A.C.</title>
</head>
<body style="margin:0;padding:0;background:#f4f4f2;font-family:Arial,Helvetica,sans-serif;color:#1f2937;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#f4f4f2;">
        <tr>
            <td align="center" style="padding:32px 12px;">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="width:100%;max-width:600px;background:#ffffff;border-radius:14px;overflow:hidden;border:1px solid #e5e7eb;">
                    <tr>
                        <td style="background:#121212;padding:22px 32px;text-align:center;border-bottom:5px solid #FFD700;">
                            <img src="{{ asset('img/logo_pagina_general/maquitec_2026_new.jpg') }}" alt="MAQUITEC I.S.A.C." style="width:220px;max-width:70%;height:auto;display:block;margin:0 auto;border-radius:6px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:34px 38px;">
                            <p style="margin:0 0 16px;font-size:18px;font-weight:700;color:#121212;">Hola, {{ $nombre }}</p>
                            <p style="margin:0 0 18px;font-size:15px;line-height:1.65;color:#4b5563;">
                                Recibimos una solicitud para restablecer la contraseña asociada a tu cuenta de MAQUITEC I.S.A.C.
                            </p>
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin:26px auto;">
                                <tr>
                                    <td style="border-radius:8px;background:#FFD700;">
                                        <a href="{{ $url }}" style="display:inline-block;padding:14px 24px;font-size:15px;font-weight:800;text-decoration:none;color:#121212;border-radius:8px;">
                                            Restablecer contraseña
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            <p style="margin:0 0 12px;font-size:14px;line-height:1.6;color:#4b5563;">
                                Este enlace es válido por 60 minutos y solo puede utilizarse una vez.
                            </p>
                            <p style="margin:18px 0 6px;font-size:13px;line-height:1.55;color:#6b7280;">
                                Si el botón no funciona, copia y pega este enlace en tu navegador:
                            </p>
                            <p style="margin:0 0 18px;font-size:12px;line-height:1.5;word-break:break-all;">
                                <a href="{{ $url }}" style="color:#854d0e;">{{ $url }}</a>
                            </p>
                            <p style="margin:0;font-size:14px;line-height:1.55;color:#4b5563;">
                                Si no solicitaste este cambio, puedes ignorar este correo. Tu contraseña actual seguirá siendo segura.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#121212;padding:18px 32px;text-align:center;color:#d1d5db;font-size:12px;line-height:1.5;">
                            <strong style="color:#FFD700;">MAQUITEC I.S.A.C.</strong><br>
                            Soluciones industriales en movimiento
                        </td>
                    </tr>
                </table>
                <p style="margin:16px 0 0;font-size:11px;color:#9ca3af;">Este mensaje fue enviado a {{ $correo }}</p>
            </td>
        </tr>
    </table>
</body>
</html>
