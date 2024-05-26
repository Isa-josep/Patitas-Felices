<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Patitas Felices - Cuidamos de tus mejores amigos</title>
    <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>

    <header>
        <div class="container">
            <h1>Patitas Felices</h1>
            <nav>
                <ul>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#nosotros">Nosotros</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                    <li><a href="agregar_mascota.php">Agregar Mascota</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="hero">
        <div class="container">
            <h2>Cuidamos de tus mejores amigos</h2>
            <p>En Patitas Felices, ofrecemos servicios veterinarios de calidad, atención personalizada y productos para el bienestar de tus mascotas.</p>
            <form action="agendar_cita.php" method="post">
                <button type="submit" class="cta-button">Agenda una cita</button>
            </form>
        </div>
    </section>

    <section id="servicios">
        <div class="container">
            <h2>Nuestros Servicios</h2>
            <div class="service-cards">
                <div class="card">
                    <h3>Consulta Veterinaria</h3>
                    <p>Revisiones generales, vacunas, desparasitación y diagnóstico.</p>
                </div>
                <div class="card">
                    <h3>Cirugía</h3>
                    <p>Procedimientos quirúrgicos con tecnología de vanguardia.</p>
                </div>
                <div class="card">
                    <h3>Estética Canina</h3>
                    <p>Baños, cortes de pelo, limpieza dental y cuidado de la piel.</p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
