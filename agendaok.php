<?php

session_start();

include("db_conexion.php");

require_once "correo/mailer.php";

/* SERVICIOS */

$servicios =
implode(
    ", ",
    $_SESSION['servicios']
);

/* DESCRIPCIÓN */

$descripcion =
$_SESSION['descripcion'];

/* DATOS AGENDA */

$fecha =
$_POST['fecha'];

$hora =
$_POST['hora'];

$nombre =
$_POST['nombre'];

$direccion =
$_POST['direccion'];

$telefono =
$_POST['telefono'];

/* USUARIO */

$usuario =
$_SESSION['usuario'];

/* CÓDIGO RANDOM */

$codigo =
"CEL-" .
strtoupper(
    substr(
        md5(
            uniqid()
        ),
        0,
        8
    )
);

/* INSERT MYSQL */

$sql = "

INSERT INTO agendamientos(

    usuario,
    servicios,
    descripcion,
    fecha_visita,
    hora_visita,
    nombre_cliente,
    direccion,
    telefono,
    codigo_soporte,
    estado,
    tecnico

)

VALUES(

    '$usuario',
    '$servicios',
    '$descripcion',
    '$fecha',
    '$hora',
    '$nombre',
    '$direccion',
    '$telefono',
    '$codigo' ,
    'Pendiente',
    NULL
)

";

mysqli_query(
    $conexion,
    $sql
);

$html = '

<h2>Solicitud de soporte registrada</h2>

<p>

Hola <b>'.$nombre.'</b>,

</p>

<p>

Tu solicitud fue registrada correctamente.

</p>

<hr>

<b>Código de seguimiento:</b>

<h2 style="color:#2563eb;">
'.$codigo.'
</h2>

<b>Servicios:</b>

'.$servicios.'

<br><br>

<b>Descripción:</b>

'.$descripcion.'

<br><br>

<b>Fecha:</b>

'.$fecha.'

<br>

<b>Hora:</b>

'.$hora.'

<br><br>

<b>Estado inicial:</b>

Pendiente

<br><br>

Guarda este código para consultar el estado de tu reparación.

';

$resultado = enviarCorreo(

    $usuario,
    $nombre,
    "Solicitud de soporte registrada",
    $html

);

if($resultado !== true){

    error_log($resultado);

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
        Visita programada | Cel-etiene
    </title>

    <link
        rel="stylesheet"
        href="agendaok.css?v=1"
    >

</head>

<body>

    <div class="page">

        <!-- HEADER -->

        <header class="topbar">

            <h1 class="title">
                Cel-etiene
            </h1>

            <a
                href="logout.php"
                class="logout-btn"
            >
                Cerrar sesión
            </a>

        </header>

        <!-- MAIN -->

        <main class="main">

            <!-- NAV -->

            <nav class="nav">

                <a href="menu.php">
                    Inicio
                </a>

                <a
                    href="servicio.php"
                    class="active"
                >
                    Servicio
                </a>

                <a href="catalogo.php">
                    Catálogo
                </a>

                <a href="#">
                    Sobre nosotros
                </a>

            </nav>

            <!-- CONTENT -->

            <section class="confirm-container">

                <!-- TEXTO -->

                <div class="confirm-card glass">

                    <div class="success-icon">

                        ✓

                    </div>

                    <h2>
                        ¡Visita programada!
                    </h2>

                    <p>

                        Uno de nuestros técnicos será asignado
                        para recoger su equipo en la dirección
                        registrada por usted.

                    </p>

                    <p>

                        A su correo registrado llegará un código
                        de soporte con nombre y ficha que representa
                        a nuestro técnico.

                    </p>

                    <div class="alert-box">

    <div class="alert-title">

        Código de soporte

    </div>

    <div class="support-code">

        <?php echo $codigo; ?>

    </div>

    <p class="alert-text">

        Entrega este código al técnico
        para validar tu servicio.

    </p>

    </div>

                    <div class="buttons">

                        <a
                            href="menu.php"
                            class="primary-btn"
                        >
                            Volver al menú
                        </a>

                    </div>

                </div>

                <!-- IMAGEN -->

                <div class="hero-card">

                    <img
                        src="imagenes/tecnico.jpg"
                        alt="Técnico"
                    >

                    <div class="overlay">

                        <h2>
                            Soporte confirmado
                        </h2>

                        <p>
                            Tu solicitud ha sido registrada
                            correctamente.
                        </p>

                    </div>

                </div>

            </section>

        </main>

        <!-- FOOTER -->

        <footer class="footer">

            <div class="footer-inner">

                <div class="copyright">

                    <div class="circle">
                        C
                    </div>

                    <div class="links">

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