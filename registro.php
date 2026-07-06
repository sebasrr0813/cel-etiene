<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("db_conexion.php");

$mensaje = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $fecha = $_POST['fecha'];
    $contrasena = $_POST['contrasena'];

    // ENCRIPTAR PASSWORD
    $hash = password_hash(
        $contrasena,
        PASSWORD_DEFAULT
    );

    // VALIDAR EMAIL
    $verificar = mysqli_query(

        $conexion,

        "SELECT * FROM usuarios
        WHERE correo='$correo'"

    );

    if(mysqli_num_rows($verificar) > 0){

        $mensaje =
        "El correo ya existe";

    }else{

        $sql = "INSERT INTO usuarios(

            nombres,
            apellidos,
            cedula,
            correo,
            password,
            fecha_nacimiento,
            rol

        )

        VALUES(

            '$nombres',
            '$apellidos',
            '$cedula',
            '$correo',
            '$hash',
            '$fecha',
            'cliente'

        )";

        if(mysqli_query($conexion, $sql)){

            header("Location: registro_exitoso.php");
            exit();

        }else{

            echo mysqli_error($conexion);

        }
    }
}

?>

<!doctype html>
<html lang="es">

<head>

  <meta charset="utf-8" />

  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  />

  <title>
    Cel-etiene - Registro
  </title>

  <link rel="stylesheet" href="registro.css" />

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

      <button
        class="back-btn"
        onclick="window.location='inicio.php'"
      >
        Volver
      </button>

    </header>

    <!-- MAIN -->
    <main class="main">

      <div class="content">

        <!-- FORM -->
        <section class="register-card">

          <h2 class="register-title">
            Registro de usuario
          </h2>

          <form method="POST">

            <!-- NOMBRES -->
            <div class="field">

              <label class="label">
                Nombres
              </label>

              <input
                type="text"
                name="nombres"
                required
                placeholder="Ingresa tus nombres"
              />

            </div>

            <!-- APELLIDOS -->
            <div class="field">

              <label class="label">
                Apellidos
              </label>

              <input
                type="text"
                name="apellidos"
                required
                placeholder="Ingresa tus apellidos"
              />

            </div>

            <!-- CEDULA -->
            <div class="field">

              <label class="label">
                Cédula
              </label>

              <input
                type="text"
                name="cedula"
                required
                placeholder="Número de identificación"
              />

            </div>

            <!-- EMAIL -->
            <div class="field">

              <label class="label">
                Correo electrónico
              </label>

              <input
                type="email"
                name="correo"
                required
                placeholder="ejemplo@gmail.com"
              />

            </div>

            <!-- FECHA -->
            <div class="field">

              <label class="label">
                Fecha de nacimiento
              </label>

              <input
                type="date"
                name="fecha"
                required
              />

            </div>

            <!-- PASSWORD -->
            <div class="field">

              <label class="label">
                Contraseña
              </label>

              <input
                type="password"
                name="contrasena"
                required
                placeholder="Crea una contraseña"
              />

            </div>

            <!-- BUTTONS -->
            <div class="buttons">

              <button
                  type="submit"
                  class="btn primary"
              >
                  Registrarme
              </button>

              <button
                type="button"
                class="btn secondary"
                onclick="window.location.href='inicio.php'"
              >
                Cancelar
              </button>

            </div>

          </form>

        </section>

        <!-- IMAGE -->
        <section class="hero">

          <div class="hero-card">

            <img
              src="imagenes/registro.png"
              alt="Servicio técnico"
            />

            <div class="overlay">

              <h2>
                Únete a Cel-etiene
              </h2>

              <p>
                Gestiona reparaciones, seguimientos
                y soporte técnico fácilmente.
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

      </div>

    </footer>

  </div>

</body>
</html>