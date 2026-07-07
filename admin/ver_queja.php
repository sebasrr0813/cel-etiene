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

include("includes/header.php");
include("includes/sidebar.php");

$id = $_GET["id"];

$sql = "SELECT * FROM quejas
        WHERE id='$id'";

$resultado = mysqli_query($conexion,$sql);

$fila = mysqli_fetch_assoc($resultado);

?>

<main class="content">

<h2>Detalle de la PQR</h2>

<div class="info-box">

    <span>Código PQR</span>

    <strong>

        <?php echo $fila["codigo_pqr"]; ?>

    </strong>

</div>

<div class="info-box">

    <span>Cliente</span>

    <strong>

        <?php echo $fila["nombre"]; ?>

    </strong>

</div>

<div class="info-box">

    <span>Correo</span>

    <strong>

        <?php echo $fila["correo"]; ?>

    </strong>

</div>

<div class="info-box">

    <span>Teléfono</span>

    <strong>

        <?php echo $fila["telefono"]; ?>

    </strong>

</div>

<div class="info-box">

    <span>Tipo</span>

    <strong>

        <?php echo $fila["tipo"]; ?>

    </strong>

</div>

<div class="info-box">

    <span>Descripción</span>

    <strong>

        <?php echo $fila["descripcion"]; ?>

    </strong>

</div>

<br>

<a
href="quejas.php"
class="btn-editar"
>

Volver

</a>

</main>

<?php

include("includes/footer.php");

?>