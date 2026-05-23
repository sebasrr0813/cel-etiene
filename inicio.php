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

                <!-- IMAGE -->
                <section class="hero">

                    <div class="hero-card">

                        <img
                            src="imagenes/inicio.png"
                            alt="Servicio técnico"
                        >

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