<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Libro de reclamaciones</title></head>
<body style="margin:0;padding:24px;background:#f4f5f7;font-family:Arial,sans-serif;color:#1f2937">
    <div style="max-width:680px;margin:auto;background:#fff;border-radius:12px;border-top:5px solid #FFD700;overflow:hidden">
        <div style="padding:24px;border-bottom:1px solid #e5e7eb">
            <h1 style="margin:0;font-size:22px">Nuevo {{ $claim['claim_type'] }}</h1>
            <p style="margin:8px 0 0;color:#6b7280">Código de registro: <strong>{{ $claim['code'] }}</strong></p>
        </div>
        <div style="padding:24px">
            <h2 style="font-size:16px">Datos del consumidor</h2>
            <p><strong>Nombre:</strong> {{ $claim['name'] }}</p>
            <p><strong>Documento:</strong> {{ $claim['document_type'] }} {{ $claim['document_number'] }}</p>
            <p><strong>Correo:</strong> {{ $claim['email'] }}</p>
            <p><strong>Teléfono:</strong> {{ $claim['phone'] }}</p>
            @if(!empty($claim['address']))<p><strong>Dirección:</strong> {{ $claim['address'] }}</p>@endif

            <h2 style="font-size:16px;margin-top:24px">Datos de la atención</h2>
            <p><strong>Tipo:</strong> {{ $claim['claim_type'] }}</p>
            @if(!empty($claim['product']))<p><strong>Producto o servicio:</strong> {{ $claim['product'] }}</p>@endif
            @if(!empty($claim['order_number']))<p><strong>Pedido o comprobante:</strong> {{ $claim['order_number'] }}</p>@endif
            @if(!empty($claim['purchase_date']))<p><strong>Fecha de compra o atención:</strong> {{ $claim['purchase_date'] }}</p>@endif
            <p><strong>Detalle:</strong></p>
            <div style="white-space:pre-wrap;padding:14px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px">{{ $claim['detail'] }}</div>
            @if(!empty($claim['customer_request']))
                <p><strong>Pedido del consumidor:</strong></p>
                <div style="white-space:pre-wrap;padding:14px;background:#fffbeb;border:1px solid #fde68a;border-radius:8px">{{ $claim['customer_request'] }}</div>
            @endif
            <p style="margin-top:24px;color:#6b7280;font-size:13px">Recibido el {{ $claim['received_at'] }}.</p>
        </div>
    </div>
</body>
</html>
