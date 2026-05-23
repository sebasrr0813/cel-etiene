<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location: inicio.php");
    exit();

}

include("db_conexion.php");

$usuario =
    $_SESSION['usuario'];

$producto =
    "iPhone 17 Pro Max";

$cantidad =
    1;

$precio =
    "$5.645.001";

$metodo_pago =
    $_SESSION['metodo_pago']
    ?? "No definido";

$direccion =
    $_SESSION['direccion']
    ?? "";

$barrio =
    $_SESSION['barrio']
    ?? "";

$persona =
    $_SESSION['persona_recibe']
    ?? "";

$telefono =
    $_SESSION['telefono_envio']
    ?? "";

$codigo_compra =
    "ORD-" .
    strtoupper(
        substr(md5(rand()),0,8)
    );

$sql = "
INSERT INTO compras(

    usuario,
    producto,
    cantidad,
    precio,
    metodo_pago,
    direccion,
    barrio,
    persona_recibe,
    telefono,
    codigo_compra

) VALUES(

    '$usuario',
    '$producto',
    '$cantidad',
    '$precio',
    '$metodo_pago',
    '$direccion',
    '$barrio',
    '$persona',
    '$telefono',
    '$codigo_compra'

)
";

mysqli_query($conexion,$sql);

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
        Compra confirmada | Cel-etiene
    </title>

    <link
        rel="stylesheet"
        href="compraok.css"
    >

</head>

<body>

    <!-- BG -->

    <div class="bg-glow blue"></div>
    <div class="bg-glow purple"></div>

    <div class="grid-overlay"></div>

    <!-- PAGE -->

    <div class="page">

        <!-- HEADER -->

        <header class="topbar">

            <h1 class="title">
                CEL-ETIENE
            </h1>

            <a
                href="logout.php"
                class="logout-btn"
            >
                Cerrar sesión
            </a>

        </header>

        <!-- MAIN -->

        <main class="confirmation-container">

            <!-- LEFT -->

            <section class="confirmation-card">

                <div class="success-icon">

                    ✓

                </div>

                <h2>

                    ¡Compra realizada!

                </h2>

                <p class="main-text">

                    Gracias por confiar en
                    <strong>CEL-ETIENE</strong>.

                </p>

                <p class="description">

                    Tu compra fue registrada correctamente
                    y nuestro equipo ya está preparando
                    el proceso de envío.

                </p>

                <div class="info-box">

                    <h3>

                        Información importante

                    </h3>

                    <p>

                        Uno de nuestros técnicos se estará
                        comunicando contigo previamente
                        para coordinar la entrega
                        de tu equipo.

                    </p>

                </div>

                <div class="support-code">

                    <span>

                        CÓDIGO DE COMPRA

                    </span>

                   <div class="code">

                    <?php

                    echo $codigo_compra;

                    ?>

                   </div>

                </div>

                <button
                    class="home-btn"
                    onclick="window.location.href='menu.php'"
                >

                    Volver al menú

                </button>

            </section>

            <!-- RIGHT -->

            <section class="image-section">

                <img
                    src="imagenes/entrega.jpg"
                    alt="Entrega confirmada"
                >

                <div class="overlay"></div>

                <div class="image-text">

                    <h2>

                        Entrega confirmada

                    </h2>

                    <p>

                        Tu pedido será procesado
                        y enviado de forma segura.

                    </p>

                </div>

            </section>

        </main>

    </div>

</body>

</html>