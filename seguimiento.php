<?php

session_start();

include("db_conexion.php");

if(!isset($_SESSION['usuario'])){

    header("Location: inicio.php");
    exit();

}
/* VARIABLES */

$tipo = "CEL";
$numero = "";
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

    $tipo = $_POST["tipo_codigo"];

    $numero = strtoupper(trim($_POST["codigo"]));

    $codigo = $tipo . "-" . $numero;

    switch($tipo){

        case "CEL":

            $sql = "SELECT * FROM agendamientos
                    WHERE codigo_soporte='$codigo'";

        break;

        case "PQR":

            $sql = "SELECT * FROM quejas
                    WHERE codigo_pqr='$codigo'";

        break;

        case "ORD":

            $sql = "SELECT * FROM compras
                    WHERE codigo_compra='$codigo'";

        break;

    }

    $resultado = mysqli_query($conexion,$sql);

    if(mysqli_num_rows($resultado)>0){

        $fila = mysqli_fetch_assoc($resultado);

        if($tipo=="CEL"){

        $estado = $fila["estado"];
        $tecnico = $fila["tecnico"];
        $servicios = $fila["servicios"];
        $descripcion = $fila["descripcion"];
        $fecha = $fila["fecha_visita"];
        $hora = $fila["hora_visita"];

    }


    }else{

        $mensaje = "No se encontró el código ingresado.";

    }

}

/*==================================================
=            PANEL DERECHO                        =
==================================================*/

$panelTitulo1 = "Tiempo estimado";
$panelValor1  = "2 días";

$panelTitulo2 = "Prioridad";
$panelValor2  = "Alta";

if($tipo=="PQR" && isset($fila)){

    $panelTitulo1 = "Estado";

    $panelValor1 = $fila["estado"];

    if(!empty($fila["fecha_actualizacion"])){

        $panelTitulo2 = "Última actualización";

        $panelValor2 = date(
            "d/m/Y",
            strtotime($fila["fecha_actualizacion"])
        );

    }else{

        $panelTitulo2 = "Seguimiento";

        $panelValor2 = "En proceso";

    }

}

if($tipo=="ORD" && isset($fila)){

    $panelTitulo1 = "Estado";

    $panelValor1 = $fila["estado"];

    $panelTitulo2 = "Entrega estimada";

    if(empty($fila["fecha_estimada"])){

        $panelValor2 = "Pendiente";

    }else{

        $panelValor2 = date(
            "d/m/Y",
            strtotime($fila["fecha_estimada"])
        );

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

                SEGUIMIENTO

            </div>

            <h2>

                Consulta tu seguimiento

            </h2>

            <p class="subtitle">

                Ingresa el código para consultar el estado.

            </p>

            <form method="POST" class="search-form">

                <label>

                    Código de seguimiento

                </label>

                <div class="search-input">

                    <select
                        name="tipo_codigo"
                        class="codigo-select"
                    >

                        <option value="CEL" <?php echo ($tipo=="CEL")?"selected":""; ?>>CEL</option>
                        <option value="PQR" <?php echo ($tipo=="PQR")?"selected":""; ?>>PQR</option>
                        <option value="ORD" <?php echo ($tipo=="ORD")?"selected":""; ?>>ORD</option>

                    </select>

                    <input
                        type="text"
                        name="codigo"
                        placeholder="F5A28BEC"
                        value="<?php echo htmlspecialchars($numero); ?>"
                        required
                    >

                </div>

                <button
                    class="search-btn"
                    name="buscar"
                >

                    Buscar seguimiento

                </button>

            </form>

            <?php

            if($mensaje!=""){

                echo "<p class='error-msg'>$mensaje</p>";

            }

            switch($tipo){

                case "CEL":

                    include("includes/seguimiento_cel.php");

                break;

                case "PQR":

                    include("includes/seguimiento_pqr.php");

                break;

                case "ORD":

                    include("includes/seguimiento_ord.php");

                break;

                default:

                    include("includes/seguimiento_cel.php");

            }

            ?>
            

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

                                <?php echo $panelTitulo1; ?>

                            </span>

                            <strong
                            class="<?php echo ($tipo=="PQR") ? "status" : ""; ?>">

                                <?php echo $panelValor1; ?>

                            </strong>

                        </div>

                        <div class="mini-box">

                            <span>

                                <?php echo $panelTitulo2; ?>

                            </span>

                            <strong
                            class="<?php echo ($tipo=="CEL") ? "priority" : ""; ?>">

                                <?php echo $panelValor2; ?>

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