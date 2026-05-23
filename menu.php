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
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Cel-etiene - Inicio</title>

  <link rel="stylesheet" href="menu.css" />
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

    <a href="logout.php" class="logout-btn">

        Cerrar sesión

    </a>

</header>

    <!-- MAIN -->
    <main class="main">

      <!-- NAVIGATION -->
    <nav class="nav-links">

  <!-- INICIO -->
  <a href="menu.php" class="nav-link active">
    Inicio
  </a>

  <!-- SERVICIOS -->
  <a href="servicio.php" class="nav-link">
    Servicios
  </a>

  <!-- SOBRE NOSOTROS -->
  <a href="sobrenosotros.php" class="nav-link">
    Sobre nosotros
  </a>

</nav>

      <!-- CONTENT -->
      <div class="content">

        <!-- IMAGE -->
        <section class="hero" aria-label="Imagen">

          <div class="hero-card">

            <img
              src="imagenes/menu.png"
              alt="Reparación de dispositivo"
            />

            <div class="overlay">

              <h2>
                Servicio técnico profesional
              </h2>

              <p>
                Reparación especializada de celulares,
                tablets y dispositivos electrónicos.
              </p>

            </div>

          </div>

        </section>

        <!-- ACTIONS -->
      <section class="actions" aria-label="Acciones">

  <!-- AGENDAR VISITA -->
  <a href="catalogo.php" class="action-btn">

    <span class="action-title">
  Catálogo premium
</span>

<span class="action-desc">
  Explora nuestros dispositivos y productos
</span>

  </a>

  <!-- SEGUIMIENTO -->
  <a href="seguimiento.php" class="action-btn">

    <span class="action-title">
      Seguimiento de producto
    </span>

    <span class="action-desc">
      Consulta el estado de reparación
    </span>

  </a>

  <!-- QUEJAS -->
  <a href="quejas.php" class="action-btn">

    <span class="action-title">
      Quejas y reclamos
    </span>

    <span class="action-desc">
      Atención personalizada y soporte
    </span>

  </a>

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

          <button class="icon-btn" aria-label="Facebook">

            <svg viewBox="0 0 24 24" fill="none">

              <path
                d="M14 8.5V7.2c0-.8.5-1.2 1.2-1.2H17V3h-2.3C12.6 3 11 4.6 11 6.8v1.7H9v3h2V21h3v-9.5h2.6l.4-3H14Z"
                fill="white"
              />

            </svg>

          </button>

          <button class="icon-btn" aria-label="Instagram">

            <svg viewBox="0 0 24 24" fill="none">

              <path
                d="M7.5 3h9A4.5 4.5 0 0 1 21 7.5v9A4.5 4.5 0 0 1 16.5 21h-9A4.5 4.5 0 0 1 3 16.5v-9A4.5 4.5 0 0 1 7.5 3Z"
                stroke="white"
                stroke-width="2"
              />

              <path
                d="M12 16a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"
                stroke="white"
                stroke-width="2"
              />

              <path
                d="M17.5 6.8h.01"
                stroke="white"
                stroke-width="3"
                stroke-linecap="round"
              />

            </svg>

          </button>

          <button class="icon-btn" aria-label="WhatsApp">

            <svg viewBox="0 0 24 24" fill="none">

              <path
                d="M12 21a9 9 0 1 0-7.8-4.5L3 21l4.7-1.2A9 9 0 0 0 12 21Z"
                stroke="white"
                stroke-width="2"
                stroke-linejoin="round"
              />

              <path
                d="M9.2 8.8c.2-.4.3-.4.6-.4h.5c.1 0 .3 0 .4.3l.7 1.7c.1.2.1.4 0 .6l-.3.4c-.1.1-.2.3 0 .6.2.3.9 1.5 2 2.1.3.2.5.2.7 0l.5-.3c.2-.1.4-.1.6 0l1.6.8c.2.1.3.2.3.4 0 .2 0 .8-.4 1.1-.4.4-1 .6-1.4.6-.4 0-1.8-.2-3.2-1.4-1.5-1.2-2.6-2.8-3-3.5-.3-.7-.3-1.3-.2-1.6.1-.3.4-.7.6-1Z"
                fill="white"
              />

            </svg>

          </button>

        </div>

      </div>

    </footer>

  </div>

</body>
</html>