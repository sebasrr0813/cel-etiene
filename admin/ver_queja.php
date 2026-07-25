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

        <form action="actualizar_pqr.php" method="POST">

        <input
        type="hidden"
        name="id"
        value="<?php echo $fila["id"]; ?>">

        <div class="info-box">

        <span>

        Estado actual

        </span>

        <select
        name="estado"
        class="input-admin">

        <option
        value="Recibida"
        <?php if($fila["estado"]=="Recibida") echo "selected"; ?>>
        Recibida
        </option>

        <option
        value="En revisión"
        <?php if($fila["estado"]=="En revisión") echo "selected"; ?>>
        En revisión
        </option>

        <option
        value="En proceso"
        <?php if($fila["estado"]=="En proceso") echo "selected"; ?>>
        En proceso
        </option>

        <option
        value="Resuelta"
        <?php if($fila["estado"]=="Resuelta") echo "selected"; ?>>
        Resuelta
        </option>

        <option
        value="Cerrada"
        <?php if($fila["estado"]=="Cerrada") echo "selected"; ?>>
        Cerrada
        </option>

        </select>

        </div>

        <div class="info-box">

        <span>

        Observaciones del administrador

        </span>

        <textarea

        name="observacion_admin"

        class="input-admin"

        rows="6"

        placeholder="Escribe aquí las observaciones..."><?php echo $fila["observacion_admin"]; ?></textarea>

        </div>

        <button
        type="submit"
        class="btn-editar">

        Guardar cambios

        </button>

        </form>

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