<?php

session_start();

if(
    !isset($_SESSION['usuario']) ||
    $_SESSION['rol']!="administrador"
){
    header("Location: ../inicio.php");
    exit();
}

include("../db_conexion.php");

include("includes/header.php");
include("includes/sidebar.php");

$sql = "SELECT
            compras.*,
            usuarios.nombres,
            usuarios.apellidos
        FROM compras
        LEFT JOIN usuarios
            ON compras.usuario = usuarios.correo
        ORDER BY compras.fecha_compra DESC";

$resultado=mysqli_query($conexion,$sql);

?>

<main class="content">

<?php

if(isset($_GET["ok"])){

?>

<div class="mensaje-exito">

Compra actualizada correctamente.

</div>

<?php } ?>

<?php

if(isset($_GET["eliminado"])){

?>

<div class="mensaje-exito">

✅ Compra eliminada correctamente.

</div>

<?php

}

?>

<?php

if(isset($_GET["error"])){

?>

<div class="mensaje-error">

❌ No fue posible eliminar la compra.

</div>

<?php

}

?>

<h2>Compras registradas</h2>

<form method="GET" class="buscador">

    <input
        type="text"
        name="buscar"
        placeholder="Buscar por código, cliente o producto..."
        value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>"
    >

    <button type="submit">
        🔍 Buscar
    </button>

    <a href="compras.php">
        <button type="button">
            Limpiar
        </button>
    </a>

</form>

<table class="tabla-agendamientos">

<thead>

<tr>

<th>Código</th>
<th>Cliente</th>
<th>Producto</th>
<th>Total</th>
<th>Estado</th>
<th>Fecha</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php while($fila=mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $fila["codigo_compra"]; ?></td>

<td>

<?php

if (!empty($fila["nombres"])) {

    echo htmlspecialchars($fila["nombres"] . " " . $fila["apellidos"]);

} else {

    echo "<span style='color:#999;'>Cliente no registrado</span>";

}

?>

</td>

<td><?php echo $fila["producto"]; ?></td>


<td>

<?php echo htmlspecialchars($fila["precio"]); ?>

</td>

<td>

<?php

$estado=$fila["estado"];

switch($estado){

    case "Pedido recibido":

        echo "<span class='estado estado-pendiente'>🟡 $estado</span>";
        break;

    case "Pago confirmado":

        echo "<span class='estado estado-activo'>🔵 $estado</span>";
        break;

    case "Preparando pedido":

        echo "<span class='estado estado-activo'>🟣 $estado</span>";
        break;

    case "Enviado":

        echo "<span class='estado estado-activo'>🟠 $estado</span>";
        break;

    case "Entregado":

        echo "<span class='estado estado-activo'>🟢 $estado</span>";
        break;

    case "Cancelado":

        echo "<span class='estado estado-bloqueado'>🔴 $estado</span>";
        break;

    default:

        echo "<span class='estado'>$estado</span>";

}

?>

</td>

<td>

<?php echo $fila["fecha_compra"]; ?>

</td>

<td>

<a href="ver_compra.php?id=<?php echo $fila["id"]; ?>">

<button>Ver</button>

</a>

<a href="editar_compra.php?id=<?php echo $fila["id"]; ?>">

<button>Editar</button>

</a>

<a
href="eliminar_compra.php?id=<?php echo $fila["id"]; ?>"

onclick="return confirm('¿Está seguro de eliminar esta compra?');">

<button type="button">

🗑 Eliminar

</button>

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</main>

<?php

include("includes/footer.php");

?>