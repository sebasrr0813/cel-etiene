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

$id = $_GET['id'];

$sql = "SELECT * FROM agendamientos
        WHERE id='$id'";

$resultado = mysqli_query($conexion,$sql);

$fila = mysqli_fetch_assoc($resultado);

if(isset($_POST["guardar"])){

    $estado = $_POST["estado"];

    $tecnico = trim($_POST["tecnico"]);

    $comentario = trim($_POST["comentario"]);

    $sql = "UPDATE agendamientos

    SET

    estado='$estado',

    tecnico='$tecnico',

    comentario='$comentario'

    WHERE id='$id'";

    mysqli_query($conexion,$sql);

    header("Location: agendamientos.php");

    exit();

}

include("includes/header.php");

include("includes/sidebar.php");

?>

<main class="content">

<h2>

Editar servicio

</h2>

<form method="POST">

<div class="info-box">

<span>

Código

</span>

<strong>

<?php echo $fila["codigo_soporte"]; ?>

</strong>

</div>

<div class="info-box">

<span>

Cliente

</span>

<strong>

<?php echo $fila["nombre_cliente"]; ?>

</strong>

</div>

<div class="info-box">

<span>

Servicio

</span>

<strong>

<?php echo $fila["servicios"]; ?>

</strong>

</div>

<div class="info-box">

<span>

Descripción

</span>

<strong>

<?php echo $fila["descripcion"]; ?>

</strong>

</div>

<label>

Estado

</label>

<select
name="estado"
class="input-admin"
>

<option
<?php if($fila["estado"]=="Pendiente") echo "selected"; ?>
>

Pendiente

</option>

<option
<?php if($fila["estado"]=="Diagnóstico") echo "selected"; ?>
>

Diagnóstico

</option>

<option
<?php if($fila["estado"]=="En reparación") echo "selected"; ?>
>

En reparación

</option>

<option
<?php if($fila["estado"]=="Listo") echo "selected"; ?>
>

Listo

</option>

</select>

<label>

Técnico

</label>

<input

type="text"

name="tecnico"

class="input-admin"

value="<?php echo $fila["tecnico"]; ?>"

>

<label>

Comentario interno

</label>

<textarea

name="comentario"

class="input-admin"

rows="5"

placeholder="Escribe un comentario sobre el servicio..."

><?php echo $fila["comentario"]; ?></textarea>

<br><br>

<button
class="btn-editar"
name="guardar"
>

Guardar cambios

</button>

</form>

</main>

<?php

include("includes/footer.php");

?>