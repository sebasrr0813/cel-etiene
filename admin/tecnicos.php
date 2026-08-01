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

    <a href="agregar_tecnico.php">

        <button type="button">

            ➕ Nuevo técnico

        </button>

    </a>

</div>

<table>

    <thead>

        <tr>

            <th>Foto</th>

            <th>Nombre</th>

            <th>Especialidad</th>

            <th>Estado</th>

            <th>Acciones</th>

        </tr>

    </thead>

    <tbody>

<?php

while($fila = mysqli_fetch_assoc($resultado)){

?>

<tr>

<td>

<?php

if(!empty($fila["foto"])){

?>

<img
src="../uploads/tecnicos/<?php echo htmlspecialchars($fila["foto"]); ?>"
width="60"
height="60"
style="border-radius:50%; object-fit:cover;">

<?php

}else{

?>

<img
src="../img/user.png"
width="60"
height="60"
style="border-radius:50%;">

<?php } ?>

</td>

<td>

<?php

echo htmlspecialchars($fila["nombre"]." ".$fila["apellido"]);

?>

</td>

<td>

<?php

echo htmlspecialchars($fila["especialidad"]);

?>

</td>

<td>

<?php

echo htmlspecialchars($fila["estado"]);

?>

</td>

<td>

<a href="ver_tecnico.php?id=<?php echo $fila["id"]; ?>">

<button type="button">

👁 Ver

</button>

</a>

<a href="editar_tecnico.php?id=<?php echo $fila["id"]; ?>">

<button type="button">

✏ Editar

</button>

</a>

<a
href="eliminar_tecnico.php?id=<?php echo $fila["id"]; ?>"
onclick="return confirm('¿Eliminar este técnico?');">

<button type="button">

🗑 Eliminar

</button>

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</main>

<?php include("includes/footer.php"); ?>