<?php

session_start();

if(!isset($_SESSION["cantidad"])){

    $_SESSION["cantidad"] = 1;

}

if(isset($_POST["accion"])){

    if($_POST["accion"] == "sumar"){

        $_SESSION["cantidad"]++;

    }

    if($_POST["accion"] == "restar"){

        if($_SESSION["cantidad"] > 1){

            $_SESSION["cantidad"]--;

        }

    }

}

if(isset($_POST["vaciar"])){

    $_SESSION["cantidad"] = 1;

    unset($_SESSION["descuento"]);

}

if(!isset($_SESSION['usuario'])){

    header("Location: inicio.php");
    exit();

}

$precio = 5645001;

$subtotal = $precio * $_SESSION["cantidad"];

$total = $subtotal;

/*cupon de descuento*/

$descuento = 0;

if(isset($_POST["cupon"])){

    $codigo = strtoupper(trim($_POST["cupon"]));

    if($codigo == "CEL10"){

        $descuento = 10;

    }elseif($codigo == "CEL20"){

        $descuento = 20;

    }elseif($codigo == "CEL50"){

        $descuento = 50;

    }

    $_SESSION["descuento"] = $descuento;

}

if(isset($_SESSION["descuento"])){

    $descuento = $_SESSION["descuento"];

}

$total = $subtotal - ($subtotal * $descuento / 100);

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

                           <strong>

                                <?php echo "$" . number_format($precio,0,",","."); ?>

                            </strong>

                        </div>

                        <!-- QUANTITY -->
                        <div class="quantity">

                            <form method="POST">

                                <button
                                    type="submit"
                                    name="accion"
                                    value="restar"
                                >
                                    -
                                </button>

                            </form>

                            <span>

                                <?php echo $_SESSION["cantidad"]; ?>

                            </span>

                            <form method="POST">

                                <button
                                    type="submit"
                                    name="accion"
                                    value="sumar"
                                >
                                    +
                                </button>

                            </form>

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

                        <?php echo "$" . number_format($subtotal,0,",","."); ?>

                        </strong>

                    </div>

                    <?php if($descuento > 0){ ?>

                        <div class="summary-line">

                            <span>

                                Descuento (<?php echo $descuento; ?>%)

                            </span>

                            <strong>

                                -$<?php echo number_format($subtotal * $descuento / 100,0,",","."); ?>

                            </strong>

                        </div>

                        <?php } ?>

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

                        <?php echo "$" . number_format($total,0,",","."); ?>

                        </strong>

                    </div>

                    <!-- COUPON -->
                   <form method="POST" class="coupon-box">

                        <input
                            type="text"
                            name="cupon"
                            placeholder="Cupón de descuento"
                        >

                        <button type="submit">

                            Aplicar

                        </button>

                    </form>

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

                    <form method="POST">

                    <button
                        type="submit"
                        name="vaciar"
                        class="empty-btn"
                    >

                        Vaciar carrito

                    </button>

                </form>

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