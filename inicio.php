<?php

$error = "";

if(isset($_GET['error'])){

    $error = $_GET['error'];

}

?>

<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Cel-etiene - Login
    </title>

    <link
        rel="stylesheet"
        href="inicio.css"
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

        </header>

        <!-- MAIN -->
        <main class="main">

            <div class="content">

             <!-- ===========================
     SOBRE NOSOTROS
============================ -->

<section class="about-section">

    <div class="about-content">

        <span class="about-tag">
            SOBRE NOSOTROS
        </span>

        <h2>
            Tecnología, innovación y confianza al servicio de tus dispositivos.
        </h2>

        <p>

            En <strong>CEL-ETIENE</strong> somos una empresa dedicada a brindar
            soluciones especializadas en mantenimiento, reparación y soporte
            técnico para teléfonos móviles, tablets y otros dispositivos
            electrónicos.

        </p>

        <p>

            Nuestro compromiso es ofrecer un servicio seguro, transparente y
            eficiente, utilizando herramientas tecnológicas modernas y personal
            altamente capacitado para garantizar la satisfacción de nuestros
            clientes.

        </p>

        <div class="about-grid">

            <div class="about-box">

                <h3>
                    Nuestra misión
                </h3>

                <p>

                    Proporcionar servicios técnicos de alta calidad mediante
                    procesos innovadores que garanticen la reparación,
                    mantenimiento y cuidado de los dispositivos electrónicos.

                </p>

            </div>

            <div class="about-box">

                <h3>
                    Nuestra visión
                </h3>

                <p>

                    Ser reconocidos como una empresa líder en soluciones
                    tecnológicas, destacándonos por nuestra innovación,
                    confiabilidad y excelencia en el servicio al cliente.

                </p>

            </div>

        </div>

        <div class="about-stats">

            <div class="stat">

                <h3>98%</h3>

                <span>
                    Clientes satisfechos
                </span>

            </div>

            <div class="stat">

                <h3>24/7</h3>

                <span>
                    Atención digital
                </span>

            </div>

            <div class="stat">

                <h3>100%</h3>

                <span>
                    Compromiso y calidad
                </span>

            </div>

        </div>

    </div>

</section>

                <!-- LOGIN -->
                <div class="login">

                    <h2 class="login-title">
                        Bienvenido de nuevo
                    </h2>

                    <form
                        action="login.php"
                        method="POST"
                        class="login-form"
                    >

                        <!-- USER -->
                        <input
                            type="text"
                            name="user"
                            placeholder="Correo"
                            required
                        >

                        <?php if($error == "user"): ?>

                            <div class="error-text">
                                El usuario no existe
                            </div>

                        <?php endif; ?>

                        <!-- PASSWORD -->
                        <input
                            type="password"
                            name="pass"
                            placeholder="Contraseña"
                            required
                        >

                        <?php if($error == "password"): ?>

                            <div class="error-text">
                                Contraseña inválida
                            </div>

                        <?php endif; ?>

                        <?php if($error == "bloqueado"): ?>

                            <div class="error-text">
                                Tu cuenta ha sido bloqueada. Contacta al administrador.
                            </div>

                        <?php endif; ?>

                        <!-- BUTTON -->
                        <button
                            type="submit"
                            class="login-btn"
                        >
                            Iniciar sesión
                        </button>

                        <!-- REGISTER -->
                        <p class="register-text">

                            ¿No tienes cuenta?

                            <a href="registro.php">
                                Regístrate aquí
                            </a>

                        </p>

                    </form>

                </div>

              

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

                <!-- SOCIAL -->
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