<?php

session_start();

if(
    !isset($_SESSION['usuario'])
){

    header(
        "Location: inicio.php"
    );

    exit();

}

/* GUARDAR SERVICIOS */

$_SESSION['servicios'] =
$_POST['servicio'] ?? [];

$descripcion = "";

if (!empty($_POST['detalle_general'])) {
    $descripcion = $_POST['detalle_general'];
}

if (!empty($_POST['detalle_software'])) {
    $descripcion = $_POST['detalle_software'];
}

if (!empty($_POST['detalle_hardware'])) {
    $descripcion = $_POST['detalle_hardware'];
}

if (!empty($_POST['descripcion'])) {
    $descripcion = $_POST['descripcion'];
}

$_SESSION['descripcion'] = $descripcion;

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
        Agenda | Cel-etiene
    </title>

    <link
        rel="stylesheet"
        href="agenda.css"
    >

</head>

<body>

    <div class="page">

        <!-- HEADER -->
        <header class="topbar">

            <div class="brand">

                <h1 class="title">
                    Cel-etiene
                </h1>

            </div>

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
            <section class="agenda-grid">

                <!-- LEFT -->
                <div class="card glass">

                    <h2>
                        Agenda tu visita
                    </h2>

                    <p>
                        Selecciona fecha y hora
                    </p>

                    <form
                        action="agendaok.php"
                        method="POST"
                        class="agenda-form"
                    >

                        <!-- FECHA -->
                        <label>
                            Fecha
                        </label>

                        <input
                            type="date"
                            name="fecha"
                            required
                        >

                        <!-- HORA -->
                        <label>
                            Hora
                        </label>

                        <select
                            name="hora"
                            required
                        >

                            <option value="">
                                Selecciona una hora
                            </option>

                            <option>
                                08:00 AM
                            </option>

                            <option>
                                09:00 AM
                            </option>

                            <option>
                                10:00 AM
                            </option>

                            <option>
                                11:00 AM
                            </option>

                            <option>
                                02:00 PM
                            </option>

                            <option>
                                03:00 PM
                            </option>

                            <option>
                                04:00 PM
                            </option>

                        </select>

                        <!-- NOMBRE -->
                        <label>
                            Nombre
                        </label>

                        <input
                            type="text"
                            name="nombre"
                            placeholder="Persona que recibe la visita"
                            required
                        >

                        <!-- DIRECCIÓN -->
                        <label>
                            Dirección
                        </label>

                        <input
                            type="text"
                            name="direccion"
                            placeholder="Ingresa tu dirección"
                            required
                        >

                        <!-- TELÉFONO -->
                        <label>
                            Teléfono
                        </label>

                        <input
                            type="text"
                            name="telefono"
                            placeholder="Número de contacto"
                            required
                        >

                        <!-- BOTÓN -->
                        <button
                            type="submit"
                            class="primary-btn"
                        >
                            Programar visita
                        </button>

                    </form>

                </div>

                <!-- RIGHT -->
                <div class="hero-card">

                    <img
                        src="imagenes/mapa.jpg"
                        alt="Mapa"
                    >

                    <div class="overlay">

                        <h2>
                            Soporte a domicilio
                        </h2>

                        <p>
                            Técnicos especializados
                            disponibles para atender
                            tu dispositivo rápidamente.
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