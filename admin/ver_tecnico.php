<?php

session_start();

if (
    !isset($_SESSION['usuario']) ||
    $_SESSION['rol'] != "administrador"
) {
    header("Location: ../inicio.php");
    exit();
}

include("../db_conexion.php");

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {

    header("Location: tecnicos.php");
    exit();

}

$id = (int)$_GET["id"];

$sql = "SELECT * FROM tecnicos WHERE id=?";

$stmt = mysqli_prepare($conexion,$sql);

mysqli_stmt_bind_param($stmt,"i",$id);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($resultado)==0){

    header("Location: tecnicos.php");
    exit();

}

$tecnico=mysqli_fetch_assoc($resultado);

include("includes/header.php");
include("includes/sidebar.php");

?>

<main class="content">

<h2>👨‍🔧 Perfil del técnico</h2>

<div class="card" style="padding:30px;">

<div style="display:flex;gap:30px;align-items:flex-start;">

<div>

<?php

if(!empty($tecnico["foto"])){

?>

<img

src="../uploads/tecnicos/<?php echo htmlspecialchars($tecnico["foto"]); ?>"

style="

width:180px;
height:180px;
border-radius:50%;
object-fit:cover;
border:4px solid #3b82f6;

">

<?php

}else{

?>

<div

style="

width:180px;
height:180px;
border-radius:50%;
background:#222;

display:flex;

justify-content:center;

align-items:center;

font-size:60px;

">

👨‍🔧

</div>

<?php } ?>

</div>

<div>

<h2>

<?php

echo htmlspecialchars(

$tecnico["nombre"]." ".$tecnico["apellido"]

);

?>

</h2>

<p>

<strong>Cargo:</strong>

<?php echo htmlspecialchars($tecnico["cargo"]); ?>

</p>

<p>

<strong>Especialidad:</strong>

<?php echo htmlspecialchars($tecnico["especialidad"]); ?>

</p>

<p>

<strong>Experiencia:</strong>

<?php echo htmlspecialchars($tecnico["experiencia"]); ?>

</p>

<p>

<strong>Estado:</strong>

<?php echo htmlspecialchars($tecnico["estado"]); ?>

</p>

<p>

<strong>Correo:</strong>

<?php echo htmlspecialchars($tecnico["correo"]); ?>

</p>

<p>

<strong>Teléfono:</strong>

<?php echo htmlspecialchars($tecnico["telefono"]); ?>

</p>

<p>

<strong>Cédula:</strong>

<?php echo htmlspecialchars($tecnico["cedula"]); ?>

</p>

</div>

</div>

<hr style="margin:30px 0;">

<h3>Descripción profesional</h3>

<p>

<?php

echo nl2br(htmlspecialchars($tecnico["descripcion"]));

?>

</p>

<br>

<a href="tecnicos.php">

<button>

← Volver

</button>

</a>

<a href="editar_tecnico.php?id=<?php echo $tecnico["id"]; ?>">

<button>

✏ Editar

</button>

</a>

</div>

</main>

<?php include("includes/footer.php"); ?>