<?php

session_start();

include("db_conexion.php");

if(!isset($_SESSION['usuario'])){

    header("Location: inicio.php");
    exit();

}
/* VARIABLES */

$codigo = "";

$estado = "";

$progreso = 0;

$tecnico = "";

$descripcion = "";

$servicios = "";

$fecha = "";

$hora = "";

$mensaje = "";

if(isset($_POST["buscar"])){

    $codigo = "CEL-" . strtoupper(trim($_POST["codigo"]));

    $sql = "SELECT * FROM agendamientos
            WHERE codigo_soporte='$codigo'";

    $resultado = mysqli_query($conexion,$sql);

    if(mysqli_num_rows($resultado)>0){

        $fila = mysqli_fetch_assoc($resultado);

        $estado      = $fila["estado"];
        $tecnico     = $fila["tecnico"];
        $descripcion = $fila["descripcion"];
        $servicios   = $fila["servicios"];
        $fecha       = $fila["fecha_visita"];
        $hora        = $fila["hora_visita"];

    }else{

        $mensaje = "Código de soporte no encontrado.";

    }

}

switch($estado){

    case "Pendiente":
        $progreso = 10;
    break;

    case "Recibido":
        $progreso = 25;
    break;

    case "Diagnóstico":
        $progreso = 45;
    break;

    case "En reparación":
        $progreso = 70;
    break;

    case "Pruebas":
        $progreso = 90;
    break;

    case "Listo":
        $progreso = 100;
    break;

    default:
        $progreso = 0;

}

$paso1 = "";
$paso2 = "";
$paso3 = "";
$paso4 = "";
$paso5 = "";

$linea1 = "";
$linea2 = "";
$linea3 = "";
$linea4 = "";

switch($estado){

    case "Pendiente":

        $paso1 = "active";

    break;

    case "Recibido":

        $paso1 = "completed";
        $paso2 = "active";

        $linea1 = "active";

    break;

    case "Diagnóstico":

        $paso1 = "completed";
        $paso2 = "completed";
        $paso3 = "active";

        $linea1 = "active";
        $linea2 = "active";

    break;

    case "En reparación":

        $paso1 = "completed";
        $paso2 = "completed";
        $paso3 = "completed";
        $paso4 = "active";

        $linea1 = "active";
        $linea2 = "active";
        $linea3 = "active";

    break;

    case "Pruebas":

        $paso1 = "completed";
        $paso2 = "completed";
        $paso3 = "completed";
        $paso4 = "completed";
        $paso5 = "active";

        $linea1 = "active";
        $linea2 = "active";
        $linea3 = "active";
        $linea4 = "active";

    break;

    case "Listo":

        $paso1 = "completed";
        $paso2 = "completed";
        $paso3 = "completed";
        $paso4 = "completed";
        $paso5 = "completed";

        $linea1 = "active";
        $linea2 = "active";
        $linea3 = "active";
        $linea4 = "active";

    break;

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

                    <form method="POST" class="search-form">

                    <label>

                        Código de soporte

                    </label>

                    <div class="search-input">

                        <span>CEL-</span>

                        <input
                            type="text"
                            name="codigo"
                            maxlength="8"
                            placeholder="1DDA6507"
                            value="<?php echo str_replace("CEL-","",$codigo); ?>"
                            required
                        >

                    </div>

                    <button
                        type="submit"
                        name="buscar"
                        class="search-btn"
                    >

                        Buscar seguimiento

                    </button>

                </form>

                        <?php

                        if($mensaje != ""){

                            echo "<p class='error-msg'>$mensaje</p>";

                        }

                        ?>

                    <!-- INFO -->

                    <?php if($codigo != "" && $mensaje == ""){ ?>

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

                                <?php echo $servicios; ?>

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

                        <div class="info-box">

                            <span>

                                Descripción

                            </span>

                            <strong>

                                <?php echo $descripcion; ?>

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

                        <div class="step <?php echo $paso1; ?>">

                            <div class="circle"></div>

                            <div class="step-text">

                                Recepción del equipo

                            </div>

                        </div>

                        <div class="step-line <?php echo $linea1; ?>"></div>

                        <div class="step <?php echo $paso2; ?>">

                            <div class="circle"></div>

                            <div class="step-text">

                                Diagnóstico técnico

                            </div>

                        </div>

                        <div class="step-line <?php echo $linea2; ?>"></div>

                        <div class="step <?php echo $paso3; ?>">

                            <div class="circle"></div>

                            <div class="step-text">

                                Reparación en proceso

                            </div>

                        </div>

                        <div class="step-line <?php echo $linea3; ?>"></div>

                        <div class="step">

                            <div class="circle"></div>

                            <div class="step-text">

                                Pruebas finales

                            </div>

                        </div>

                        <div class="step-line <?php echo $linea4; ?>"></div>

                        <div class="step <?php echo $paso5; ?>">

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

                    <?php } ?>

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