<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: inicio.php");
    exit();
}

?>

<!doctype html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Sobre nosotros | Cel-etiene
    </title>

    <link
        rel="stylesheet"
        href="sobrenosotros.css?v=1"
    >

</head>

<body>

    <!-- FONDO -->

    <div class="bg-glow bg-blue"></div>
    <div class="bg-glow bg-purple"></div>

    <!-- GRID -->

    <div class="grid-overlay"></div>

    <!-- HEADER -->

    <header class="topbar">

        <h1 class="logo">

            CEL-ETIENE

        </h1>

        <a
            href="logout.php"
            class="logout-btn"
        >
            Cerrar sesión
        </a>

    </header>

    <!-- NAV -->

    <nav class="nav">

        <a href="menu.php">
            Inicio
        </a>

        <a href="servicio.php">
            Servicio
        </a>

        <a href="catalogo.php">
            Catálogo
        </a>

        <a
            href="sobrenosotros.php"
            class="active"
        >
            Sobre nosotros
        </a>

    </nav>

    <!-- MAIN -->

    <main class="about-container">

        <!-- LEFT -->

        <section class="about-card glass">

            <span class="mini-tag">
                TECNOLOGÍA • INNOVACIÓN • CONFIANZA
            </span>

            <h2>

                Elevamos el soporte técnico
                a otro nivel.

            </h2>

            <p class="description">

                En Cel-etiene transformamos la experiencia
                de reparación y soporte técnico en un servicio
                moderno, rápido y seguro.

                Nuestro objetivo es conectar tecnología,
                innovación y atención personalizada para
                ofrecer soluciones premium en dispositivos
                móviles, tablets y equipos electrónicos.

            </p>

            <div class="stats">

                <div class="stat-box">

                    <h3>
                        +2K
                    </h3>

                    <span>
                        Equipos reparados
                    </span>

                </div>

                <div class="stat-box">

                    <h3>
                        24/7
                    </h3>

                    <span>
                        Soporte digital
                    </span>

                </div>

                <div class="stat-box">

                    <h3>
                        98%
                    </h3>

                    <span>
                        Clientes satisfechos
                    </span>

                </div>

            </div>

            <div class="info-panels">

                <div class="info-card">

                    <div class="icon neon-blue">

                        ⚡

                    </div>

                    <div>

                        <h4>
                            Diagnóstico inteligente
                        </h4>

                        <p>

                            Detectamos rápidamente
                            fallas de hardware y software.

                        </p>

                    </div>

                </div>

                <div class="info-card">

                    <div class="icon neon-purple">

                        🛡

                    </div>

                    <div>

                        <h4>
                            Seguridad y confianza
                        </h4>

                        <p>

                            Tus datos y dispositivos
                            están protegidos en todo momento.

                        </p>

                    </div>

                </div>

            </div>

            <a
                href="servicio.php"
                class="main-btn"
            >
                Solicitar soporte
            </a>

        </section>

        <!-- RIGHT -->

        <section class="visual-side">

            <div class="image-card">

    <img
        id="slider"
        src="imagenes/team1.jpg"
        alt="Equipo técnico"
    >

    <div class="image-overlay">

        <h2>

            Tecnología
            + Experiencia

        </h2>

        <p>

            Técnicos especializados listos
            para ayudarte.

        </p>

    </div>

</div>

        </section>

    </main>

    <!-- FOOTER -->

    <footer class="footer">

        <div class="footer-left">

            <div class="circle">

                C

            </div>

            <div>

                <p>
                    Todos los derechos reservados
                </p>

                <a href="#">
                    Política de privacidad
                </a>

            </div>

        </div>

        <div class="socials">

            <button>
                f
            </button>

            <button>
                ◎
            </button>

            <button>
                ◉
            </button>

        </div>

    </footer>

    <script>

const images = [

    "imagenes/nosotros.webp",
    "imagenes/nosotros2.webp",
    "imagenes/nosotros3.webp",
    "imagenes/nosotros4.webp",
    "imagenes/nosotros5.webp"

];

/* PRECARGAR */

images.forEach(src => {

    const img = new Image();

    img.src = src;

});

let index = 0;

const slider =
document.getElementById("slider");

setInterval(() => {

    slider.style.opacity = 0;

    setTimeout(() => {

        index++;

        if(index >= images.length){

            index = 0;

        }

        slider.src = images[index];

        slider.style.opacity = 1;

    }, 700);

}, 5000);

</script>