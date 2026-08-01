<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != "administrador") {
    header("Location: ../inicio.php");
    exit();
}

include("../db_conexion.php");
include("includes/header.php");
include("includes/sidebar.php");

$sql = "SELECT * FROM tecnicos ORDER BY nombre ASC";
$resultado = mysqli_query($conexion, $sql);

?>

<main class="content">

<?php

if(isset($_GET["ok"])){

?>

<div class="mensaje-exito">

✅ Técnico registrado correctamente.

</div>

<?php

}

?>

<?php

if(isset($_GET["actualizado"])){

?>

<div class="mensaje-exito">

✅ Técnico actualizado correctamente.

</div>

<?php

}

?>

<?php

if(isset($_GET["eliminado"])){

?>

<div class="mensaje-exito">

✅ Técnico eliminado correctamente.

</div>

<?php } ?>

<?php

if(isset($_GET["error"])){

?>

<div class="mensaje-error">

❌ No fue posible eliminar el técnico.

</div>

<?php } ?>

<h2>👨‍🔧 Técnicos</h2>

<p>Administra el personal técnico de Cel-etiene.</p>

<div style="margin:20px 0;">

    <a href="agregar_tecnico.php" class="btn btn-primary">

         <i class="fa-solid fa-plus"></i>

         Nuevo técnico

    </a>

</div>

<div class="tecnicos-grid">

<?php

while($fila=mysqli_fetch_assoc($resultado)){

?>

    <div class="tecnico-card">

    <?php if(!empty($fila["foto"])){ ?>

        <img
        src="../uploads/tecnicos/<?php echo htmlspecialchars($fila["foto"]); ?>"
        class="avatar-grande">

    <?php } else { ?>

        <img
        src="../img/user.png"
        class="avatar-grande">

    <?php } ?>

    <h3>

        <?php
        echo htmlspecialchars(
        $fila["nombre"]." ".$fila["apellido"]);
        ?>

    </h3>

    <p class="cargo">

        <?php

        echo !empty($fila["cargo"])
            ? htmlspecialchars($fila["cargo"])
            : "Técnico";

        ?>

    </p>

    <p class="especialidad">

        <i class="fa-solid fa-microchip"></i>

        <?php

        echo !empty($fila["especialidad"])
        ? htmlspecialchars($fila["especialidad"])
        : "Sin especialidad";

        ?>

    </p>

    <div style="margin:18px 0;">

<?php

switch($fila["estado"]){

case "Disponible":

echo '<span class="badge badge-success">Disponible</span>';

break;

case "En servicio":

echo '<span class="badge badge-warning">En servicio</span>';

break;

default:

echo '<span class="badge badge-danger">'.$fila["estado"].'</span>';

}

?>

    </div>

    <div class="acciones-card">

        <a
        href="ver_tecnico.php?id=<?php echo $fila["id"]; ?>"
        class="btn btn-primary">

        <i class="fa-solid fa-eye"></i>

        </a>

        <a
        href="editar_tecnico.php?id=<?php echo $fila["id"]; ?>"
        class="btn btn-warning">

        <i class="fa-solid fa-pen"></i>

        </a>

        <a
        href="eliminar_tecnico.php?id=<?php echo $fila["id"]; ?>"
        class="btn btn-danger"
        onclick="return confirm('¿Eliminar este técnico?');">

        <i class="fa-solid fa-trash"></i>

        </a>

    </div>

</div>

<?php

}

?>

</div>

</main>

<?php include("includes/footer.php"); ?>