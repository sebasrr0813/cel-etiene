<?php

session_start();

/* GUARDAR MÉTODO DE PAGO */

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $_SESSION['metodo_pago'] =
        $_POST['metodo_pago'];

    header("Location: envio.php");

    exit();

}

/* VALIDAR LOGIN */

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
        Pago | Cel-etiene
    </title>

    <link
        rel="stylesheet"
        href="pago.css"
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

            <div class="brand">

                <h1 class="title">
                    CEL-ETIENE
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

                <div class="step active">

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

            <section class="payment-wrapper">

                <!-- LEFT -->

                <div class="payment-card">

                    <div class="section-tag">

                        DATOS DE FACTURACIÓN

                    </div>

                    <h2>

                        Realiza tu compra
                        de forma segura

                    </h2>

                    <p class="subtitle">

                        Completa la información para continuar
                        con el proceso de pago y envío.

                    </p>

                    <!-- FORM -->

                    <form
                        class="payment-form"
                        method="POST"
                    >

                        <!-- INPUT OCULTO -->

                        <input
                            type="hidden"
                            name="metodo_pago"
                            id="metodo_pago"
                            required
                        >

                        <!-- METHODS -->

                        <div class="payment-methods">

                            <!-- TARJETA -->

                            <div class="method payment-option"
                                 data-method="Tarjeta">

                                <div class="method-icon">

                                    <img
                                        src="imagenes/tarjeta.png"
                                        alt="Tarjeta"
                                    >

                                </div>

                                <div class="method-info">

                                    <h4>
                                        Tarjeta crédito / débito
                                    </h4>

                                    <span>
                                        Visa, Mastercard, American Express
                                    </span>

                                </div>

                            </div>

                            <!-- NEQUI -->

                            <div class="method payment-option"
                                 data-method="Nequi">

                                <div class="method-icon">

                                    <img
                                        src="imagenes/nequi.webp"
                                        alt="Nequi"
                                    >

                                </div>

                                <div class="method-info">

                                    <h4>
                                        Nequi
                                    </h4>

                                    <span>
                                        Pago inmediato desde tu celular
                                    </span>

                                </div>

                            </div>

                            <!-- DAVIPLATA -->

                            <div class="method payment-option"
                                 data-method="Daviplata">

                                <div class="method-icon">

                                    <img
                                        src="imagenes/daviplata.png"
                                        alt="Daviplata"
                                    >

                                </div>

                                <div class="method-info">

                                    <h4>
                                        Daviplata
                                    </h4>

                                    <span>
                                        Transferencia rápida y segura
                                    </span>

                                </div>

                            </div>

                            <!-- PSE -->

                            <div class="method payment-option"
                                 data-method="PSE">

                                <div class="method-icon">

                                    <img
                                        src="imagenes/pse.jpg"
                                        alt="PSE"
                                    >

                                </div>

                                <div class="method-info">

                                    <h4>
                                        PSE
                                    </h4>

                                    <span>
                                        Débito desde cuenta bancaria
                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- FORMULARIOS DINÁMICOS -->

                        <div class="payment-forms">

                            <!-- TARJETA -->

                            <div class="payment-form-box"
                                 id="Tarjeta-form">

                                <div class="field full">

                                    <label>
                                        Número de tarjeta
                                    </label>

                                    <input
                                        type="text"
                                        placeholder="1234 5678 9012 3456"
                                    >

                                </div>

                                <div class="input-grid">

                                    <div class="field">

                                        <label>
                                            Fecha vencimiento
                                        </label>

                                        <input
                                            type="text"
                                            placeholder="MM/AA"
                                        >

                                    </div>

                                    <div class="field">

                                        <label>
                                            CVV
                                        </label>

                                        <input
                                            type="text"
                                            placeholder="123"
                                        >

                                    </div>

                                </div>

                            </div>

                            <!-- NEQUI -->

                            <div class="payment-form-box"
                                 id="Nequi-form">

                                <div class="field full">

                                    <label>
                                        Número Nequi
                                    </label>

                                    <input
                                        type="text"
                                        placeholder="300 123 4567"
                                    >

                                </div>

                            </div>

                            <!-- DAVIPLATA -->

                            <div class="payment-form-box"
                                 id="Daviplata-form">

                                <div class="field full">

                                    <label>
                                        Número Daviplata
                                    </label>

                                    <input
                                        type="text"
                                        placeholder="300 123 4567"
                                    >

                                </div>

                            </div>

                            <!-- PSE -->

                            <div class="payment-form-box"
                                 id="PSE-form">

                                <div class="field full">

                                    <label>
                                        Banco
                                    </label>

                                    <input
                                        type="text"
                                        placeholder="Nombre banco"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- DATOS PERSONALES -->

                        <div class="input-grid personal-data">

                            <div class="field">

                                <label>
                                    Nombres
                                </label>

                                <input
                                    type="text"
                                    placeholder="Ingresa tus nombres"
                                >

                            </div>

                            <div class="field">

                                <label>
                                    Apellidos
                                </label>

                                <input
                                    type="text"
                                    placeholder="Ingresa tus apellidos"
                                >

                            </div>

                            <div class="field">

                                <label>
                                    Cédula
                                </label>

                                <input
                                    type="text"
                                    placeholder="Número documento"
                                >

                            </div>

                            <div class="field">

                                <label>
                                    Correo electrónico
                                </label>

                                <input
                                    type="email"
                                    placeholder="correo@ejemplo.com"
                                >

                            </div>

                        </div>

                        <!-- BUTTON -->

                        <button
                            class="pay-btn"
                            type="submit"
                        >

                            Continuar al pago

                        </button>

                    </form>

                </div>

                <!-- RIGHT -->

                <aside class="summary-card">

                    <!-- SUMMARY -->

                    <div class="summary">

                        <h3>
                            Resumen
                        </h3>

                        <div class="summary-line">

                            <span>
                                Producto
                            </span>

                            <strong>
                                iPhone 17 Pro Max
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

                    </div>

                    <!-- BUTTONS -->

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

                </aside>

            </section>

        </main>

    </div>

    <!-- SCRIPT -->

    <script>

        const methods =
            document.querySelectorAll(".payment-option");

        const forms =
            document.querySelectorAll(".payment-form-box");

        const hiddenInput =
            document.getElementById("metodo_pago");

        methods.forEach(method => {

            method.addEventListener("click", () => {

                methods.forEach(item => {

                    item.classList.remove("selected-method");

                });

                forms.forEach(form => {

                    form.classList.remove("active-payment");

                });

                method.classList.add("selected-method");

                const selected =
                    method.dataset.method;

                hiddenInput.value =
                    selected;

                document
                    .getElementById(selected + "-form")
                    .classList.add("active-payment");

            });

        });

    </script>

</body>

</html>