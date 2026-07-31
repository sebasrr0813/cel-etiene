<?php

session_start();

include("db_conexion.php");

require_once "correo/mailer.php";

if(!isset($_SESSION['usuario'])){

    header("Location: inicio.php");
    exit();

}

$mensaje = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario =
        $_SESSION['usuario'];

    $nombre =
        $_POST['nombre'];

    $correo =
        $_POST['correo'];

    $telefono =
        $_POST['telefono'];

    $tipo =
        $_POST['tipo'];

    $descripcion =
        $_POST['descripcion'];

    $codigo =
        "PQR-" . strtoupper(
            substr(md5(rand()),0,8)
        );

    /* INSERTAR EN MYSQL */

    $sql = "INSERT INTO quejas(

        usuario,
        nombre,
        correo,
        telefono,
        tipo,
        descripcion,
        codigo_pqr

    ) VALUES (

        '$usuario',
        '$nombre',
        '$correo',
        '$telefono',
        '$tipo',
        '$descripcion',
        '$codigo'

    )";

    if(mysqli_query($conexion, $sql)){

    $html = '

    <h2>PQR registrada correctamente</h2>

    <p>

    Hola <b>'.$nombre.'</b>,

    </p>

    <p>

    Hemos recibido tu solicitud y nuestro equipo la revisará lo antes posible.

    </p>

    <hr>

    <b>Código PQR:</b>

    <h2 style="color:#2563eb;">

    '.$codigo.'

    </h2>

    <b>Tipo:</b>

    '.$tipo.'

    <br><br>

    <b>Descripción:</b>

    '.$descripcion.'

    <br><br>

    <b>Estado:</b>

    Recibida

    <br><br>

    Conserva este código para consultar el estado de tu solicitud.

    ';

    $resultado = enviarCorreo(

        $correo,
        $nombre,
        "PQR registrada correctamente",
        $html

    );

    if($resultado !== true){

        error_log($resultado);

    }

    $mensaje = 'Tu solicitud fue enviada correctamente.';

}else{

    echo mysqli_error($conexion);

}

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

        Quejas y Reclamos | Cel-etiene

    </title>

    <link
        rel="stylesheet"
        href="quejas.css"
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

                <a href="seguimiento.php">

                    Seguimiento

                </a>

                <a
                    href="quejas.php"
                    class="active-nav"
                >

                    Quejas y reclamos

                </a>

            </nav>

            <!-- CONTENT -->

            <section class="complaint-wrapper">

                <!-- LEFT -->

                <div class="complaint-card">

                    <div class="section-tag">

                        SOPORTE Y ATENCIÓN

                    </div>

                    <h2>

                        Quejas y reclamos

                    </h2>

                    <p class="subtitle">

                        Nuestro equipo revisará tu caso
                        y responderá lo antes posible.

                    </p>

                    <?php if($mensaje != ""){ ?>

                        <div class="success-box">

                            <?php echo $mensaje; ?>

                            <div class="ticket">

                                Código:
                                <?php echo $codigo; ?>

                            </div>

                        </div>

                    <?php } ?>

                    <!-- FORM -->

                    <form
                        class="complaint-form"
                        method="POST"
                    >

                        <div class="input-grid">

                            <!-- NOMBRE -->

                            <div class="field">

                                <label>

                                    Nombre completo

                                </label>

                                <input
                                    type="text"
                                    name="nombre"
                                    placeholder="Ingresa tu nombre"
                                    required
                                >

                            </div>

                            <!-- CORREO -->

                            <div class="field">

                                <label>

                                    Correo electrónico

                                </label>

                                <input
                                    type="email"
                                    name="correo"
                                    placeholder="correo@ejemplo.com"
                                    required
                                >

                            </div>

                            <!-- TELÉFONO -->

                            <div class="field">

                                <label>

                                    Teléfono

                                </label>

                                <input
                                    type="text"
                                    name="telefono"
                                    placeholder="Número celular"
                                    required
                                >

                            </div>

                            <!-- TIPO -->

                            <div class="field">

                                <label>

                                    Tipo de solicitud

                                </label>

                                <select
                                    name="tipo"
                                    required
                                >

                                    <option value="">

                                        Selecciona una opción

                                    </option>

                                    <option>

                                        Queja

                                    </option>

                                    <option>

                                        Reclamo

                                    </option>

                                    <option>

                                        Garantía

                                    </option>

                                    <option>

                                        Soporte técnico

                                    </option>

                                </select>

                            </div>

                            <!-- DESCRIPCIÓN -->

                            <div class="field full">

                                <label>

                                    Describe tu solicitud

                                </label>

                                <textarea
                                    name="descripcion"
                                    placeholder="Escribe aquí tu caso..."
                                    required
                                ></textarea>

                            </div>

                        </div>

                        <!-- BUTTON -->

                        <button
                            class="send-btn"
                            type="submit"
                        >

                            Enviar solicitud

                        </button>

                    </form>

                </div>

                <!-- RIGHT -->

                <aside class="summary-card">

                    <div class="image-card">

                        <img
                            src="imagenes/quejas.jpg"
                            alt="Quejas"
                        >

                        <div class="image-overlay"></div>

                        <div class="image-text">

                            <h3>

                                Atención al usuario

                            </h3>

                            <p>

                                Nuestro equipo está listo
                                para ayudarte.

                            </p>

                        </div>

                    </div>

                    <!-- INFO -->

                    <div class="mini-status">

                        <div class="mini-box">

                            <span>

                                Tiempo promedio

                            </span>

                            <strong>

                                24 horas

                            </strong>

                        </div>

                        <div class="mini-box">

                            <span>

                                Estado soporte

                            </span>

                            <strong class="online">

                                En línea

                            </strong>

                        </div>

                    </div>

                </aside>

            </section>

        </main>

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

    </div>

</body>

</html>