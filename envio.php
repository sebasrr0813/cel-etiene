<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location: inicio.php");
    exit();

}

/* GUARDAR DATOS DEL ENVÍO */

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $_SESSION['direccion'] =
        $_POST['direccion'];

    $_SESSION['apartamento'] =
        $_POST['apartamento'];

    $_SESSION['barrio'] =
        $_POST['barrio'];

    $_SESSION['persona_recibe'] =
        $_POST['persona'];

    $_SESSION['telefono_envio'] =
        $_POST['telefono'];

    header("Location: compraok.php");

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

        Envío | Cel-etiene

    </title>

    <link
        rel="stylesheet"
        href="envio.css"
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

                    Servicio

                </a>

                <a href="catalogo.php">

                    Catálogo

                </a>

                <a href="sobrenosotros.php">

                    Sobre nosotros

                </a>

            </nav>

            <!-- STEPS -->

            <section class="steps">

                <div class="step done">

                    <div class="step-icon">

                        🛒

                    </div>

                    <span>

                        Carrito

                    </span>

                </div>

                <div class="line"></div>

                <div class="step done">

                    <div class="step-icon">

                        👤

                    </div>

                    <span>

                        Datos

                    </span>

                </div>

                <div class="line"></div>

                <div class="step active">

                    <div class="step-icon">

                        🚚

                    </div>

                    <span>

                        Entrega

                    </span>

                </div>

            </section>

            <!-- CONTENT -->

            <section class="delivery-wrapper">

                <!-- LEFT -->

                <div class="delivery-card">

                    <div class="section-tag">

                        DIRECCIÓN DE ENTREGA

                    </div>

                    <h2>

                        Configura
                        tu envío

                    </h2>

                    <p class="subtitle">

                        Completa la información para realizar
                        la entrega de tu producto correctamente.

                    </p>

                    <!-- FORM -->

                    <form
                        class="delivery-form"
                        method="POST"
                    >

                        <div class="input-grid">

                            <!-- DIRECCIÓN -->

                            <div class="field full">

                                <label>

                                    Dirección de envío

                                </label>

                                <input
                                    type="text"
                                    name="direccion"
                                    placeholder="Ingresa dirección completa"
                                    required
                                >

                            </div>

                            <!-- CASA -->

                            <div class="field">

                                <label>

                                    Casa / Apartamento

                                </label>

                                <input
                                    type="text"
                                    name="apartamento"
                                    placeholder="Torre, apto o casa"
                                >

                            </div>

                            <!-- BARRIO -->

                            <div class="field">

                                <label>

                                    Barrio

                                </label>

                                <input
                                    type="text"
                                    name="barrio"
                                    placeholder="Barrio o localidad"
                                    required
                                >

                            </div>

                            <!-- PERSONA -->

                            <div class="field">

                                <label>

                                    Persona quien recibe

                                </label>

                                <input
                                    type="text"
                                    name="persona"
                                    placeholder="Nombre completo"
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

                        </div>

                        <!-- BOTÓN -->

                        <button
                            class="pay-btn"
                            type="submit"
                        >

                            Confirmar compra

                        </button>

                    </form>

                </div>

                <!-- RIGHT -->

                <aside class="summary-card">

                    <!-- IMAGE -->

                    <div class="delivery-image">

                        <img
                            src="imagenes/entrega.jpg"
                            alt="Entrega"
                        >

                        <div class="image-overlay"></div>

                        <div class="image-text">

                            <h3>

                                Entrega premium

                            </h3>

                            <p>

                                Envíos rápidos y seguros
                                a cualquier destino.

                            </p>

                        </div>

                    </div>

                    <!-- TOTALS -->

                    <div class="summary">

                        <div class="summary-line">

                            <span>

                                Subtotal

                            </span>

                            <strong>

                                $5.645.001

                            </strong>

                        </div>

                        <div class="summary-line">

                            <span>

                                Envío

                            </span>

                            <strong class="free">

                                Gratis

                            </strong>

                        </div>

                        <div class="summary-line total">

                            <span>

                                Total

                            </span>

                            <strong>

                                $5.645.001

                            </strong>

                        </div>

                    </div>

                    <!-- BUTTONS -->

                    <button
                        class="secondary-btn"
                        onclick="window.location.href='catalogo.php'"
                    >

                        Seguir comprando

                    </button>

                    <button
                        class="danger-btn"
                    >

                        Vaciar carrito

                    </button>

                </aside>

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