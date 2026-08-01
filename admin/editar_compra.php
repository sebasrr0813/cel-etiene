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
    header("Location: compras.php");
    exit();
}

$id = (int) $_GET["id"];

$sql = "SELECT * FROM compras WHERE id=?";

$stmt = mysqli_prepare($conexion,$sql);

mysqli_stmt_bind_param($stmt,"i",$id);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($resultado)==0){

    header("Location: compras.php");
    exit();

}

$compra=mysqli_fetch_assoc($resultado);

include("includes/header.php");
include("includes/sidebar.php");

?>

<main class="content">

<h2>Editar compra</h2>

<form action="actualizar_compra.php" method="POST">

<input
type="hidden"
name="id"
value="<?php echo $compra["id"]; ?>">

<div class="card">

<h3>Información de la compra</h3>

<p>

<strong>Código:</strong>

<?php echo htmlspecialchars($compra["codigo_compra"]); ?>

</p>

<p>

<strong>Producto:</strong>

<?php echo htmlspecialchars($compra["producto"]); ?>

</p>

<p>

<strong>Cliente:</strong>

<?php echo htmlspecialchars($compra["usuario"]); ?>

</p>

</div>

<div class="card">

<h3>Seguimiento</h3>

<label>Estado</label>

<select name="estado">

<?php

$estados=[

"Pedido recibido",
"Pago confirmado",
"Preparando pedido",
"Enviado",
"Entregado",
"Cancelado"

];

foreach($estados as $estado){

?>

<option
value="<?php echo $estado; ?>"
<?php
if($compra["estado"]==$estado)
echo "selected";
?>

>

<?php echo $estado; ?>

</option>

<?php } ?>

</select>

<br><br>

<label>Transportadora</label>

<input
type="text"
name="transportadora"
value="<?php echo htmlspecialchars($compra["transportadora"]); ?>">

<br><br>

<label>Número de guía</label>

<input
type="text"
name="numero_guia"
value="<?php echo htmlspecialchars($compra["numero_guia"]); ?>">

<br><br>

<label>Fecha estimada</label>

<input
type="date"
name="fecha_estimada"
value="<?php echo $compra["fecha_estimada"]; ?>">

<br><br>

<label>Fecha envío</label>

<input
type="date"
name="fecha_envio"
value="<?php echo $compra["fecha_envio"]; ?>">

<br><br>

<label>Fecha entrega</label>

<input
type="date"
name="fecha_entrega"
value="<?php echo $compra["fecha_entrega"]; ?>">

<br><br>

<label>Observación</label>

<textarea
name="observacion"
rows="5"><?php echo htmlspecialchars($compra["observacion"]); ?></textarea>

<br><br>

<button type="submit">

Guardar cambios

</button>

<a href="compras.php">

<button type="button">

Cancelar

</button>

</a>

</div>

</form>

</main>

<?php include("includes/footer.php"); ?>