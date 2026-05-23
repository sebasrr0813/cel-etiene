<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location: inicio.php");
    exit();

}

/* DATOS DEMO */

$codigo = "CEL-809D7E8D";

$estado = "En reparación";

$progreso = 65;

$equipo = "iPhone 17 Pro Max";

$tecnico = "Carlos Ramírez";

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

        Seguimiento | Cel-etiene

    </title>

    <link
        rel="stylesheet"
        href="seguimiento.css"
    >

</head>

<body>

    <!-- BG -->

    <div class="bg-glow blue"></div>
    <div class="bg-glow purple"></div>

    <div class="grid-overlay"></div>

    <div class="page">

        <!-- HEADER -->

        <header class="topbar">

            <h1 class="title">

                CEL-ETIENE

            </h1>

            <button
                class="logout-btn"
                onclick="window.location.href='logout.php'"
            >

                Cerrar sesión

            </button>

        </header>

        <!-- MAIN -->

        <main class="main">

            <!-- NAV -->

            <nav class="nav">

                <a href="menu.php">

                    Inicio

                </a>

                <a href="servicio.php">

                    Servicios

                </a>

                <a
                    href="seguimiento.php"
                    class="active-nav"
                >

                    Seguimiento

                </a>

                <a href="sobrenosotros.php">

                    Sobre nosotros

                </a>

            </nav>

            <!-- CONTENT -->

            <section class="tracking-wrapper">

                <!-- LEFT -->

                <div class="tracking-card">

                    <div class="section-tag">

                        SEGUIMIENTO TÉCNICO

                    </div>

                    <h2>

                        Estado de tu reparación

                    </h2>

                    <p class="subtitle">

                        Consulta el estado actual
                        del mantenimiento de tu equipo.

                    </p>

                    <!-- INFO -->

                    <div class="info-grid">

                        <div class="info-box">

                            <span>

                                Código soporte

                            </span>

                            <strong>

                                <?php echo $codigo; ?>

                            </strong>

                        </div>

                        <div class="info-box">

                            <span>

                                Equipo

                            </span>

                            <strong>

                                <?php echo $equipo; ?>

                            </strong>

                        </div>

                        <div class="info-box">

                            <span>

                                Técnico asignado

                            </span>

                            <strong>

                                <?php echo $tecnico; ?>

                            </strong>

                        </div>

                        <div class="info-box">

                            <span>

                                Estado actual

                            </span>

                            <strong class="status">

                                <?php echo $estado; ?>

                            </strong>

                        </div>

                    </div>

                    <!-- PROGRESS -->

                    <div class="progress-section">

                        <div class="progress-header">

                            <span>

                                Progreso reparación

                            </span>

                            <strong>

                                <?php echo $progreso; ?>%

                            </strong>

                        </div>

                        <div class="progress-bar">

                            <div
                                class="progress-fill"
                                style="width: <?php echo $progreso; ?>%;"
                            ></div>

                        </div>

                    </div>

                    <!-- STEPS -->

                    <div class="repair-steps">

                        <div class="step completed">

                            <div class="circle"></div>

                            <div class="step-text">

                                Recepción del equipo

                            </div>

                        </div>

                        <div class="step-line active"></div>

                        <div class="step completed">

                            <div class="circle"></div>

                            <div class="step-text">

                                Diagnóstico técnico

                            </div>

                        </div>

                        <div class="step-line active"></div>

                        <div class="step active">

                            <div class="circle"></div>

                            <div class="step-text">

                                Reparación en proceso

                            </div>

                        </div>

                        <div class="step-line"></div>

                        <div class="step">

                            <div class="circle"></div>

                            <div class="step-text">

                                Pruebas finales

                            </div>

                        </div>

                        <div class="step-line"></div>

                        <div class="step">

                            <div class="circle"></div>

                            <div class="step-text">

                                Equipo listo

                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->

                    <button
                        class="back-btn"
                        onclick="window.location.href='menu.php'"
                    >

                        Volver al menú

                    </button>

                </div>

                <!-- RIGHT -->

                <aside class="summary-card">

                    <div class="image-card">

                        <img
                            src="imagenes/seguimiento.png"
                            alt="Seguimiento"
                        >

                        <div class="image-overlay"></div>

                        <div class="image-text">

                            <h3>

                                Seguimiento...

                            </h3>

                            <p>

                                Información en tiempo real
                                sobre tu reparación.

                            </p>

                        </div>

                    </div>

                    <!-- STATUS -->

                    <div class="mini-status">

                        <div class="mini-box">

                            <span>

                                Tiempo estimado

                            </span>

                            <strong>

                                2 días

                            </strong>

                        </div>

                        <div class="mini-box">

                            <span>

                                Prioridad

                            </span>

                            <strong class="priority">

                                Alta

                            </strong>

                        </div>

                    </div>

                </aside>

            </section>

        </main>

    </div>


    <!-- FOOTER -->

<footer class="footer">

    <div class="footer-inner">

        <div class="copyright">

            <div class="circle-logo">

                C

            </div>

            <div class="footer-links">

                <div>

                    Todos los derechos reservados

                </div>

                <a href="#">

                    Política de privacidad

                </a>

            </div>

        </div>

        <div class="social">

            <button class="icon-btn">

                f

            </button>

            <button class="icon-btn">

                ◎

            </button>

            <button class="icon-btn">

                ◉

            </button>

        </div>

    </div>

</footer>

</body>

</html>