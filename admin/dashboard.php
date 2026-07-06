<?php

session_start();

if(
    !isset($_SESSION['usuario']) ||
    $_SESSION['rol'] != "administrador"
){

    header("Location: ../inicio.php");
    exit();

}

include("../db_conexion.php");

// Pendientes
$sql = "SELECT COUNT(*) AS total
        FROM agendamientos
        WHERE estado='Pendiente'";

$resultado = mysqli_query($conexion,$sql);
$pendientes = mysqli_fetch_assoc($resultado)['total'];


// Diagnóstico
$sql = "SELECT COUNT(*) AS total
        FROM agendamientos
        WHERE estado='Diagnóstico'";

$resultado = mysqli_query($conexion,$sql);
$diagnostico = mysqli_fetch_assoc($resultado)['total'];


// En reparación
$sql = "SELECT COUNT(*) AS total
        FROM agendamientos
        WHERE estado='En reparación'";

$resultado = mysqli_query($conexion,$sql);
$reparacion = mysqli_fetch_assoc($resultado)['total'];


// Listos
$sql = "SELECT COUNT(*) AS total
        FROM agendamientos
        WHERE estado='Listo'";

$resultado = mysqli_query($conexion,$sql);
$listos = mysqli_fetch_assoc($resultado)['total'];

include("includes/header.php");

include("includes/sidebar.php");

?>

<main class="content">

    <h2>

        Bienvenido,
        <?php echo $_SESSION['nombre']; ?>

    </h2>

    <p>

        Panel principal de administración de Cel-etiene.

    </p>

    <div class="cards">

    <div class="card">

        <h3>Pendientes</h3>

        <span>

        <?php echo $pendientes; ?>

        </span>

    </div>

    <div class="card">

        <h3>Diagnóstico</h3>

        <span>

        <?php echo $diagnostico; ?>

        </span>

    </div>

    <div class="card">

        <h3>En reparación</h3>

        <span>

        <?php echo $reparacion; ?>

        </span>

    </div>

    <div class="card">

        <h3>Listos</h3>

        <span>

        <?php echo $listos; ?>

        </span>

    </div>

</div>

</main>

<?php

include("includes/footer.php");

?>