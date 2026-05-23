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
        Servicios | Cel-etiene
    </title>

    <link rel="stylesheet" href="servicio.css">

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
                    Servicios
                </a>

                <a href="catalogo.php">
                    Catálogo
                </a>

                <a href="sobrenosotros.php">
                    Sobre nosotros
                </a>

            </nav>

            <!-- CONTENT -->
            <div class="content">

                <!-- LEFT -->
                <section class="service-card">

                    <div class="card-header">

                        <h2>
                            Tipo de mantenimiento
                        </h2>

                        <p>
                            Selecciona el soporte requerido
                        </p>

                    </div>

                    <form
                        id="serviceForm"
                        action="agenda.php"
                        method="POST"
                        class="service-form"
                    >

                        <label class="option">

                            <input
                                type="checkbox"
                                name="servicio[]"
                                value="General"
                            >

                            <span>
                                General
                            </span>

                        </label>

                        <label class="option">

                            <input
                                type="checkbox"
                                name="servicio[]"
                                value="Software"
                            >

                            <span>
                                Software
                            </span>

                        </label>

                        <label class="option">

                            <input
                                type="checkbox"
                                name="servicio[]"
                                value="Hardware"
                            >

                            <span>
                                Hardware
                            </span>

                        </label>

                        <label class="option">

                            <input
                                type="checkbox"
                                name="servicio[]"
                                value="Cambio de pantalla"
                            >

                            <span>
                                Cambio de pantalla
                            </span>

                        </label>

                        <label class="option">

                            <input
                                type="checkbox"
                                name="servicio[]"
                                value="Cambio de batería"
                            >

                            <span>
                                Cambio de batería
                            </span>

                        </label>

                        <label class="option">

                            <input
                                type="checkbox"
                                name="servicio[]"
                                value="Daños de red"
                            >

                            <span>
                                Daños de red
                            </span>

                        </label>

                        <!-- OTROS -->

<label class="option">

    <input
        type="checkbox"
        id="otrosCheck"
    >

    <span>
        Otros
    </span>

</label>

<!-- DESCRIPCIÓN -->

<div
    class="otros-box"
    id="otrosBox"
>

    <textarea

        name="descripcion"

        placeholder="Describe el daño o problema del dispositivo..."

    ></textarea>

</div>

<!--ERROR SI NO SELECCIONA ITEMS-->

<div
    id="serviceError"
    class="service-error"
>
    Debes seleccionar al menos un servicio.
</div>

                        <button
                          type="submit"
                          class="primary-btn"
                        >
                          Programar visita
                        </button>

                    </form>

                </section>

                <!-- RIGHT -->
                <section class="hero">

                    <div class="hero-card">

                        <img
                            src="imagenes/servicio.png"
                            alt="Servicio técnico"
                        >

                        <div class="hero-overlay">

                            <h2>
                                Soporte técnico premium
                            </h2>

                            <p>
                                Diagnóstico, reparación y
                                mantenimiento especializado
                                para tus dispositivos.
                            </p>

                        </div>

                    </div>

                </section>

            </div>

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

   <script>

document.addEventListener(
    "DOMContentLoaded",
    function(){

        const otrosCheck =
        document.getElementById(
            "otrosCheck"
        );

        const otrosBox =
        document.getElementById(
            "otrosBox"
        );

        const form =
        document.getElementById(
            "serviceForm"
        );

        const error =
        document.getElementById(
            "serviceError"
        );

        /* MOSTRAR OTROS */

        otrosCheck.addEventListener(
            "change",
            function(){

                if(this.checked){

                    otrosBox.style.display =
                    "block";

                }else{

                    otrosBox.style.display =
                    "none";

                }

            }
        );

        /* VALIDAR SERVICIOS */

        form.addEventListener(
            "submit",
            function(e){

                const servicios =
                document.querySelectorAll(
                    'input[name="servicio[]"]:checked'
                );

                if(
                    servicios.length === 0
                ){

                    e.preventDefault();

                    error.style.display =
                    "block";

                }else{

                    error.style.display =
                    "none";

                }

            }
        );

    }
);

</script>
</body>

</html>