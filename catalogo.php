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
        Catálogo | Cel-etiene
    </title>

    <link
        rel="stylesheet"
        href="catalogo.css"
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

                <a href="servicio.php">
                    Servicios
                </a>

                <a
                    href="catalogo.php"
                    class="active"
                >
                    Catálogo
                </a>

                <a href="sobrenosotros.php">
                    Sobre nosotros
                </a>

            </nav>

            <!-- TITLE -->
            <div class="section-title">

                <h2>
                    Catálogo
                </h2>

                <p>
                    Descubre los dispositivos
                    disponibles en Cel-etiene
                </p>

            </div>

            <!-- PRODUCTS -->
            <section class="products">

                <!-- PRODUCT 1 -->
                <div class="product-card">

                    <div class="badge">
                        -35%
                    </div>

                    <img
                        src="imagenes/iphone1.jpg"
                        alt="iPhone"
                    >

                    <h3>
                        iPhone 17 Pro Max
                    </h3>

                    <span class="brand">
                        APPLE
                    </span>

                    <div class="prices">

                        <span class="old-price">
                            $8.999.000
                        </span>

                        <span class="new-price">
                            $5.645.001
                        </span>

                    </div>

                    <button
                        class="buy-btn"
                        onclick="window.location='carrito.php'"
                    >
                        Agregar al carrito
                    </button>

                </div>

                <!-- PRODUCT 2 -->
                <div class="product-card">

                    <div class="badge">
                        -25%
                    </div>

                    <img
                        src="imagenes/iphone2.jpg"
                        alt="iPhone"
                    >

                    <h3>
                        iPhone 17 Azul
                    </h3>

                    <span class="brand">
                        APPLE
                    </span>

                    <div class="prices">

                        <span class="old-price">
                            $7.599.000
                        </span>

                        <span class="new-price">
                            $5.476.426
                        </span>

                    </div>

                    <button
                        class="buy-btn"
                        onclick="window.location='carrito.php'"
                    >
                        Agregar al carrito
                    </button>

                </div>

                <!-- PRODUCT 3 -->
                <div class="product-card">

                    <div class="badge">
                        -20%
                    </div>

                    <img
                        src="imagenes/iphone3.jpg"
                        alt="iPhone"
                    >

                    <h3>
                        iPhone 17 5G Lavanda
                    </h3>

                    <span class="brand">
                        APPLE
                    </span>

                    <div class="prices">

                        <span class="old-price">
                            $4.899.900
                        </span>

                        <span class="new-price">
                            $3.788.723
                        </span>

                    </div>

                    <button
                        class="buy-btn"
                        onclick="window.location='carrito.php'"
                    >
                        Agregar al carrito
                    </button>

                </div>

                <!-- PRODUCT 4 -->
                <div class="product-card">

                    <div class="badge">
                        -18%
                    </div>

                    <img
                        src="imagenes/iphone4.jpg"
                        alt="iPhone"
                    >

                    <h3>
                        iPhone 17 Naranja
                    </h3>

                    <span class="brand">
                        APPLE
                    </span>

                    <div class="prices">

                        <span class="old-price">
                            $4.899.900
                        </span>

                        <span class="new-price">
                            $3.889.603
                        </span>

                    </div>

                    <button
                        class="buy-btn"
                        onclick="window.location='carrito.php'"
                    >
                        Agregar al carrito
                    </button>

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