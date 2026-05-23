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
        Carrito | Cel-etiene
    </title>

    <link
        rel="stylesheet"
        href="carrito.css"
    >

</head>

<body>

    <div class="page">

        <!-- HEADER -->
        <header class="topbar">

            <div class="brand">

                <h1 class="title">
                    CEL-ETIENE
                </h1>

            </div>

          <div class="header-actions">

    <!-- CARRITO -->

    <div
        class="cart-icon"
        onclick="window.location='carrito.php'"
    >

        🛒

        <span
            class="cart-count"
            id="cart-count"
        >
            0
        </span>

    </div>

    <!-- LOGOUT -->

    <a
        href="logout.php"
        class="logout-btn"
    >
        Cerrar sesión
    </a>

</div>
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

            <!-- STEP BAR -->
            <section class="steps">

                <div class="step active">

                    <div class="step-icon">
                        🛒
                    </div>

                    <span>
                        Carrito
                    </span>

                </div>

                <div class="line"></div>

                <div class="step">

                    <div class="step-icon">
                        👤
                    </div>

                    <span>
                        Datos
                    </span>

                </div>

                <div class="line"></div>

                <div class="step">

                    <div class="step-icon">
                        📦
                    </div>

                    <span>
                        Entrega
                    </span>

                </div>

            </section>

            <!-- CONTENT -->
            <section class="cart-wrapper">

                <!-- PRODUCT -->
                <div class="cart-card">

                    <div class="product-image">

                        <img
                            src="imagenes/iphone1.jpg"
                            alt="iPhone"
                        >

                    </div>

                    <div class="product-info">

                        <span class="badge">
                            -35%
                        </span>

                        <h2>
                            iPhone 17 Pro Max 256Gb Plata
                        </h2>

                        <p class="brand-name">
                            APPLE
                        </p>

                        <div class="prices">

                            <span class="old-price">
                                $8.999.000
                            </span>

                            <span class="new-price">
                                $5.645.001
                            </span>

                        </div>

                        <!-- QUANTITY -->
                        <div class="quantity">

                            <button>
                                -
                            </button>

                            <span>
                                1
                            </span>

                            <button>
                                +
                            </button>

                        </div>

                    </div>

                </div>

                <!-- SUMMARY -->
                <div class="summary-card">

                    <h3>
                        Resumen de compra
                    </h3>

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

                        <strong>
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

                    <!-- COUPON -->
                    <div class="coupon-box">

                        <input
                            type="text"
                            placeholder="Cupón de descuento"
                        >

                        <button>
                            Aplicar
                        </button>

                    </div>

                    <!-- BUTTONS -->
                <button 
                 class="pay-btn"
                 onclick="window.location.href='pago.php'"
              >

                Ir a pagar

                </button>

                <button
                    class="continue-btn"
                    onclick="window.location='catalogo.php'"
              >
                    Seguir comprando
                </button>

                    <button
                        class="empty-btn"
                    >
                        Vaciar carrito
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