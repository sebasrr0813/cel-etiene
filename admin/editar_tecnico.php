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

<h2>✏ Editar técnico</h2>

<form
action="actualizar_tecnico.php"
method="POST"
enctype="multipart/form-data">

<input
type="hidden"
name="id"
value="<?php echo $tecnico["id"]; ?>">

<div class="card">

<h3>Información personal</h3>

<label>Nombre</label>

<input
type="text"
name="nombre"
required
value="<?php echo htmlspecialchars($tecnico["nombre"]); ?>">

<br><br>

<label>Apellido</label>

<input
type="text"
name="apellido"
required
value="<?php echo htmlspecialchars($tecnico["apellido"]); ?>">

<br><br>

<label>Cédula</label>

<input
type="text"
name="cedula"
value="<?php echo htmlspecialchars($tecnico["cedula"]); ?>">

<br><br>

<label>Teléfono</label>

<input
type="text"
name="telefono"
value="<?php echo htmlspecialchars($tecnico["telefono"]); ?>">

<br><br>

<label>Correo</label>

<input
type="email"
name="correo"
value="<?php echo htmlspecialchars($tecnico["correo"]); ?>">

</div>

<br>

<div class="card">

<h3>Información profesional</h3>

<label>Cargo</label>

<input
type="text"
name="cargo"
value="<?php echo htmlspecialchars($tecnico["cargo"]); ?>">

<br><br>

<label>Especialidad</label>

<input
type="text"
name="especialidad"
value="<?php echo htmlspecialchars($tecnico["especialidad"]); ?>">

<br><br>

<label>Experiencia</label>

<input
type="text"
name="experiencia"
value="<?php echo htmlspecialchars($tecnico["experiencia"]); ?>">

<br><br>

<label>Descripción</label>

<textarea
name="descripcion"
rows="5"><?php echo htmlspecialchars($tecnico["descripcion"]); ?></textarea>

</div>

<br>

<div class="card">

<h3>Fotografía</h3>

<?php

if(!empty($tecnico["foto"])){

?>

<img

src="../uploads/tecnicos/<?php echo htmlspecialchars($tecnico["foto"]); ?>"

style="

width:120px;
height:120px;
object-fit:cover;
border-radius:50%;
margin-bottom:15px;

">

<?php

}

?>

<input
type="file"
name="foto"
accept=".jpg,.jpeg,.png,.webp">

<p>

Si no seleccionas una nueva imagen,
se conservará la actual.

</p>

</div>

<br>

<div class="card">

<h3>Estado</h3>

<select name="estado">

<?php

$estados=[

"Disponible",
"En servicio",
"Vacaciones",
"Inactivo"

];

foreach($estados as $estado){

?>

<option

value="<?php echo $estado; ?>"

<?php

if($estado==$tecnico["estado"])
echo "selected";

?>

>

<?php echo $estado; ?>

</option>

<?php } ?>

</select>

</div>

<br>

<button type="submit">

💾 Guardar cambios

</button>

<a href="tecnicos.php">

<button type="button">

Cancelar

</button>

</a>

</form>

</main>

<?php include("includes/footer.php"); ?>