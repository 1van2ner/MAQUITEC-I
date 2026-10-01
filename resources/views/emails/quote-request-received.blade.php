<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nueva solicitud de cotización</title>
</head>
<body style="margin:0; padding:0; background-color:#f1f3f5; color:#202124; font-family:Arial,Helvetica,sans-serif;">
	<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#f1f3f5;">
		<tr>
			<td align="center" style="padding:28px 12px;">
				<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:680px; background-color:#ffffff; border:1px solid #e5e7eb; border-top:5px solid #ffd700; border-radius:12px; overflow:hidden;">
					<tr>
						<td style="padding:22px 28px; background-color:#151515; color:#ffffff;">
							<div style="font-size:20px; line-height:26px; font-weight:700; color:#ffd700;">MAQUITEC I.S.A.C.</div>
							<div style="padding-top:4px; font-size:12px; line-height:18px; color:#d1d5db;">Nueva solicitud de cotización</div>
						</td>
					</tr>
					<tr>
						<td style="padding:28px;">
							<h1 style="margin:0 0 8px; font-size:24px; line-height:30px; color:#171717;">Solicitud para {{ $quote['product_name'] }}</h1>
							<p style="margin:0 0 22px; font-size:14px; line-height:21px; color:#64748b;">Un cliente envió una consulta desde el sitio web.</p>

							<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #e5e7eb; border-radius:10px;">
								<tr>
									@if($productImagePath)
										<td width="42%" valign="top" style="padding:14px;">
											<img src="{{ $message->embed($productImagePath) }}" alt="{{ $quote['product_name'] }}" width="240" style="display:block; width:100%; max-width:240px; height:auto; border:0; border-radius:8px; background-color:#f8fafc;">
										</td>
									@endif
									<td valign="top" style="padding:18px;">
										<div style="margin-bottom:7px; font-size:11px; line-height:16px; font-weight:700; letter-spacing:1px; color:#a16207;">PRODUCTO COTIZADO</div>
										<div style="font-size:18px; line-height:24px; font-weight:700; color:#171717;">{{ $quote['product_name'] }}</div>
										@if(!empty($quote['category_name']))
											<div style="padding-top:7px; font-size:13px; line-height:19px; color:#64748b;">{{ $quote['category_name'] }}</div>
										@endif
										@if(!empty($quote['product_description']))
											<div style="padding-top:10px; font-size:13px; line-height:20px; color:#4b5563;">{{ $quote['product_description'] }}</div>
										@endif
									</td>
								</tr>
							</table>

							<h2 style="margin:26px 0 12px; font-size:16px; line-height:22px; color:#171717;">Datos del cliente</h2>
							<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:14px; line-height:21px;">
								<tr><td width="145" style="padding:5px 0; color:#64748b;">Nombre</td><td style="padding:5px 0; font-weight:600; color:#202124;">{{ $quote['name'] }}</td></tr>
								<tr><td style="padding:5px 0; color:#64748b;">Empresa</td><td style="padding:5px 0; font-weight:600; color:#202124;">{{ $quote['company'] }}</td></tr>
								<tr><td style="padding:5px 0; color:#64748b;">Correo</td><td style="padding:5px 0;"><a href="mailto:{{ $quote['email'] }}" style="color:#8a6d00;">{{ $quote['email'] }}</a></td></tr>
								<tr><td style="padding:5px 0; color:#64748b;">Teléfono / WhatsApp</td><td style="padding:5px 0; color:#202124;">{{ $quote['phone'] }}</td></tr>
							</table>

							<h2 style="margin:24px 0 10px; font-size:16px; line-height:22px; color:#171717;">Consulta</h2>
							<div style="padding:15px 17px; border-left:4px solid #ffd700; border-radius:4px; background-color:#fffbeb; font-size:14px; line-height:22px; color:#374151;">{!! nl2br(e($quote['message'])) !!}</div>

							<table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin-top:22px;">
								<tr>
									<td align="center" style="border-radius:7px; background-color:#ffd700;">
										<a href="mailto:{{ $quote['email'] }}" style="display:inline-block; padding:12px 18px; color:#171717; font-size:14px; line-height:18px; font-weight:700; text-decoration:none;">Responder al cliente</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="padding:16px 28px; border-top:1px solid #e5e7eb; background-color:#fafafa; color:#64748b; font-size:11px; line-height:17px;">
							Este mensaje se generó desde el formulario de cotización de MAQUITEC I.S.A.C.
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>