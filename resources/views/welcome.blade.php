<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Maquitec I.S.A.C.</title>
    <style>
        :root { --amarillo: #FFD700; --negro: #1a1a1a; }
        body { margin: 0; font-family: 'Segoe UI', sans-serif; background-color: #f4f4f4; }

        nav { background: var(--negro); color: white; padding: 25px 8%; display: flex; align-items: center; border-bottom: 5px solid var(--amarillo); }
        .logo-circular { width: 120px; height: 120px; border-radius: 120%; background: #ddd; margin-right: 20px; border: 2px solid var(--amarillo); overflow: hidden; }

        .banner-principal { width: 100%; height: 450px; border-bottom: 10px solid var(--amarillo); }
        .banner-principal img { width: 100%; height: 100%; object-fit: cover; display: block; }

        .slider-wrapper { max-width: 1200px; margin: 60px auto; }
        .slider-container { width: 100%; height: 550px; overflow: hidden; position: relative; border: 10px solid var(--negro); background: repeating-linear-gradient(45deg, var(--amarillo), var(--amarillo) 20px, var(--negro) 20px, var(--negro) 40px); padding: 10px; }
        .slider { width: 300%; height: 100%; display: flex; animation: slide 15s infinite; }
        .slide { width: 100%; height: 100%; }
        .slide img { width: 100%; height: 100%; object-fit: cover; display: block; }
        
        @keyframes slide {
            0% { transform: translateX(0%); } 33% { transform: translateX(-33.33%); } 66% { transform: translateX(-66.66%); } 100% { transform: translateX(0%); }
        }

        /* Sección Marcas */
        .marcas-section { max-width: 1000px; margin: 60px auto; padding: 40px; background: white; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .grid-marcas { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-top: 30px; }
        .marca-item { height: 100px; border: 2px solid #ddd; display: flex; align-items: center; justify-content: center; background: #f9f9f9; }

        .titulo-seccion { text-align: center; font-size: 3em; font-weight: 800; color: var(--negro); margin: 40px 0; text-transform: uppercase; letter-spacing: 2px; }
        .container { max-width: 1000px; margin: 0 auto; padding: 20px; }
        .grid-info { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-top: 40px; }
        .card { background: white; padding: 30px; border-left: 5px solid var(--amarillo); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .valores-section { background: var(--negro); color: white; padding: 50px 20px; margin-top: 50px; }
        footer { background: var(--amarillo); color: var(--negro); text-align: center; padding: 20px; font-weight: bold; width: 100%; box-sizing: border-box; }
    </style>
</head>
<body>

    <nav>
        <div class="logo-circular"><img src="{{ asset('img/logo_maquitec.jpg') }}" alt="Logo" style="width:100%; height:100%; object-fit:cover;"></div>
        <div style="font-size: 1.5em; font-weight: bold;">MAQUITEC I.S.A.C.</div>
        <div style="margin-left: auto;">INICIO | SERVICIOS | CONTACTO</div>
    </nav>

    <div class="banner-principal">
        <img src="{{ asset('img/img_maquitec4.jpg') }}" alt="Banner">
    </div>

    <div class="container">
        <h2 style="text-align: center; font-size: 2.5em;">Nuestra Identidad</h2>
        <div class="grid-info">
            <div class="card"><h2>MISIÓN</h2><p>"Garantizar la máxima confiabilidad en cada uno de nuestros servicios, respaldados por un equipo técnico altamente calificado, herramientas de vanguardia y una gestión eficiente de repuestos, ofreciendo siempre la mejor propuesta de valor en el mercado."</p></div>
            <div class="card"><h2>VISIÓN</h2><p>"Consolidarnos como una empresa líder en el sector, destacando por el compromiso y talento de nuestros colaboradores, la mejora continua de nuestros procesos operativos y un firme compromiso con la sostenibilidad ambiental."</p></div>
        </div>
    </div>


    <div class="titulo-seccion">SERVICIOS EMPLEADOS</div>

    <div class="slider-wrapper">
        <div class="slider-container">
            <div class="slider">
                <div class="slide"><img src="{{ asset('img/img_maquitec1.jpg') }}" alt="1"></div>
                <div class="slide"><img src="{{ asset('img/img_maquitec2.jpg') }}" alt="2"></div>
                <div class="slide"><img src="{{ asset('img/img_maquitec3.jpg') }}" alt="3"></div>
            </div>
        </div>
    </div>

    <!-- Nueva sección solicitada -->
    <div class="marcas-section">
        <h2>TRABAJAMOS CON LAS MEJORES MARCAS</h2>
        <p>Maquitec I.S.A.C. somos una empresa multimarca, atendemos equipos: montacarga de combustión, equipos de construcción, minería y equipos logísticos eléctricos con baterías de plomo ácido y baterías de litio.</p>
        <div class="grid-marcas">
            <div class="marca-item">Marca 1</div>
            <div class="marca-item">Marca 2</div>
            <div class="marca-item">Marca 3</div>
            <div class="marca-item">Marca 4</div>
            <div class="marca-item">Marca 5</div>
            <div class="marca-item">Marca 6</div>
            <div class="marca-item">Marca 7</div>
            <div class="marca-item">Marca 8</div>
            <div class="marca-item">Marca 9</div>
            <div class="marca-item">Marca 10</div>
            <div class="marca-item">Marca 11</div>
            <div class="marca-item">Marca 12</div>
        </div>
    </div>


    <div class="valores-section">
        <h2 style="text-align: center; color: var(--amarillo);">NUESTROS VALORES</h2>
    </div>

    <footer>¡CUENTA CON NOSOTROS! - © 2026 MAQUITEC I.S.A.C.</footer>

</body>
</html>