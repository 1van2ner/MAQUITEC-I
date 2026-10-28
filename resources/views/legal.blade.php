<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }} | MAQUITEC I.S.A.C.</title>
    <style>
        :root { --yellow:#f7d547; --dark:#111111; --ink:#1f2937; --muted:#6b7280; }
        * { box-sizing:border-box; }
        body { margin:0; font-family:"Segoe UI",system-ui,sans-serif; color:var(--ink); background:#f4f5f7; }
        main { max-width:960px; margin:48px auto; padding:44px; background:white; border-radius:14px; box-shadow:0 10px 30px rgba(0,0,0,.08); }
        h1 { margin-top:0; color:#111827; border-bottom:3px solid var(--yellow); padding-bottom:14px; }
        h2 { margin-top:32px; color:#1f2937; }
        p, li { line-height:1.75; }
        ul { padding-left:22px; }
        a { color:#8a7100; }
        .updated { color:var(--muted); font-size:.9rem; }
        @media(max-width:700px) { main { margin:20px 14px; padding:24px 20px; } }
    </style>
</head>
<body>
    @include('footer.top')
    <main>
        <p class="updated">Última actualización: 27 de octubre de 2026</p>
        <h1>{{ $pageTitle }}</h1>

        @if ($pageType === 'privacy')
            <p>MAQUITEC I.S.A.C. («MAQUITEC», «nosotros») trata los datos personales conforme a la Ley N.º 29733, su reglamento y demás normas aplicables en Perú. Esta política explica qué datos recopilamos, para qué los usamos y cómo puedes ejercer tus derechos.</p>
            <h2>Datos que recopilamos</h2>
            <ul><li>Datos de registro y contacto, como nombre, correo electrónico, teléfono y empresa.</li><li>Información enviada mediante formularios de cotización o atención.</li><li>Datos técnicos de navegación, como dirección IP abreviada, navegador y páginas visitadas.</li></ul>
            <h2>Finalidades</h2>
            <ul><li>Atender solicitudes, cotizaciones, compras y consultas.</li><li>Administrar cuentas y autenticación.</li><li>Enviar comunicaciones relacionadas con el servicio solicitado.</li><li>Mantener la seguridad, prevenir fraude y mejorar el sitio.</li></ul>
            <h2>Base y conservación</h2>
            <p>Tratamos los datos para ejecutar una solicitud, cumplir obligaciones legales o por consentimiento cuando corresponda. Los conservamos únicamente durante el plazo necesario y luego los eliminamos o anonimizamos.</p>
            <h2>Derechos del titular</h2>
            <p>Puedes solicitar acceso, rectificación, actualización, inclusión, oposición o supresión escribiendo a <a href="mailto:maquitec.servicios0601@gmail.com">maquitec.servicios0601@gmail.com</a>. Te responderemos dentro de los plazos legales aplicables.</p>
            <h2>Compartición y seguridad</h2>
            <p>No vendemos datos personales. Podemos compartirlos con proveedores que presten servicios al sitio bajo obligaciones de confidencialidad y protección. Aplicamos controles técnicos y organizativos razonables.</p>
        @elseif ($pageType === 'cookies')
            <p>Usamos cookies y tecnologías similares para hacer funcionar el sitio, recordar preferencias y, únicamente si lo autorizas, medir su uso. Puedes aceptar o rechazar las categorías opcionales desde el aviso de cookies.</p>
            <h2>Cookies necesarias</h2>
            <p>Permiten iniciar sesión, mantener la sesión, proteger formularios y recordar tu decisión sobre cookies. No pueden desactivarse mediante el sitio porque son esenciales para su funcionamiento.</p>
            <h2>Cookies de preferencias</h2>
            <p>Guardan opciones elegidas por el usuario. Actualmente se usa una preferencia de consentimiento que conserva la decisión durante 180 días.</p>
            <h2>Cookies de análisis y marketing</h2>
            <p>Solo se activarán si existe tu consentimiento y se implementan herramientas de medición o publicidad. Puedes retirar el consentimiento en cualquier momento eliminando las cookies desde tu navegador o mediante el aviso.</p>
            <h2>Administración</h2>
            <p>La mayoría de navegadores permite bloquear o eliminar cookies. Ten en cuenta que bloquear las cookies necesarias puede impedir que funciones como el inicio de sesión funcionen correctamente.</p>
        @elseif ($pageType === 'terms')
            <p>Estos términos regulan el acceso y uso de este sitio. Al utilizarlo, el usuario declara ser mayor de 18 años o contar con autorización legal. Si no estás de acuerdo, no debes utilizar el sitio ni enviar solicitudes.</p>
            <h2>Identificación y alcance</h2>
            <p>El sitio pertenece a MAQUITEC I.S.A.C., disponible para consultar productos, servicios, información comercial y enviar solicitudes de cotización. Los datos societarios, fiscales y jurídicos vigentes son los registrados ante las autoridades competentes.</p>
            <h2>Uso permitido</h2>
            <ul><li>Usar el sitio únicamente con fines legítimos y comerciales autorizados.</li><li>No intentar alterar, deshabilitar, sobrecargar, interferir, escalar privilegios ni realizar ingeniería inversa sobre los sistemas.</li><li>No publicar o enviar contenido ilícito, falso, ofensivo, malware o que infrinja derechos de terceros.</li><li>No recopilar datos de otros usuarios ni realizar automatización que afecte la disponibilidad del servicio.</li></ul>
            <h2>Cotizaciones, precios y disponibilidad</h2>
            <p>Las fotografías, descripciones, fichas técnicas y precios publicados son referenciales. La cotización formal, las características exactas, disponibilidad, impuestos, garantias, tiempos de entrega y condiciones de pago deben confirmarse por escrito. Ninguna solicitud equivale por sí sola a una compra aceptada.</p>
            <h2>Propiedad intelectual</h2>
            <p>Logotipos, diseños, textos, fotografías, software y marcas mostrados son propiedad de MAQUITEC o de sus titulares autorizados. No se concede licencia de uso sin autorización escrita. Las marcas de terceros pertenecen a sus respectivos propietarios.</p>
            <h2>Limitación de responsabilidad</h2>
            <p>MAQUITEC procura mantener información y servicios disponibles, pero no garantiza disponibilidad continua ni ausencia absoluta de errores. En la medida permitida por la ley, no será responsable por daños indirectos derivados del uso del sitio, de enlaces externos, interrupciones, pérdida de datos o decisiones tomadas con base en información referencial.</p>
            <h2>Enlaces y servicios externos</h2>
            <p>El sitio puede contener enlaces a redes sociales, mapas, mensajería o servicios de terceros. Cada servicio externo se rige por sus propios términos y políticas; MAQUITEC no controla ni responde por su disponibilidad o tratamiento de datos.</p>
            <h2>Suspensión y modificaciones</h2>
            <p>Podemos modificar el sitio, retirar contenido, limitar funciones o bloquear accesos abusivos sin previo aviso cuando sea necesario por seguridad, mantenimiento o cumplimiento legal. Estos términos pueden actualizarse publicando la versión vigente en esta página.</p>
            <h2>Ley aplicable y contacto</h2>
            <p>Estos términos se interpretan conforme a las leyes de la República del Perú. Para consultas o reclamos puede escribir a <a href="mailto:maquitec.servicios0601@gmail.com">maquitec.servicios0601@gmail.com</a>.</p>
        @else
            <p>MAQUITEC adopta medidas razonables para proteger la confidencialidad, integridad y disponibilidad de sus sistemas, cuentas y datos.</p>
            <h2>Controles</h2>
            <ul><li>Acceso autenticado y privilegio mínimo para funciones administrativas.</li><li>Contraseñas almacenadas mediante mecanismos criptográficos seguros.</li><li>Verificación de correo para cuentas habilitadas.</li><li>Protección contra abuso mediante validaciones, tokens CSRF y limitación de solicitudes.</li><li>Cabeceras HTTP que reducen el riesgo de ejecución de contenido malicioso y apropiación de clics.</li><li>Uso obligatorio de HTTPS en los entornos de producción.</li></ul>
            <h2>Reportar un incidente</h2>
            <p>Si descubres una vulnerabilidad, actividad sospechosa o posible filtración, informa a <a href="mailto:maquitec.servicios0601@gmail.com">maquitec.servicios0601@gmail.com</a>. Incluye una descripción técnica, la fecha, las URL afectadas y los pasos para reproducir el problema. No accedas a datos ajenos ni interrumpas el servicio.</p>
            <h2>Gestión responsable</h2>
            <p>MAQUITEC evaluará los reportes de buena fe, preservará la información recibida de forma confidencial y corregirá las incidencias confirmadas según su impacto y prioridad.</p>
        @endif
    </main>
    @include('footer.bottom')
</body>
</html>
