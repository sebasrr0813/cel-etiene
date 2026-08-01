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

$sql = "SELECT
            c.*,
            u.nombres,
            u.apellidos,
            u.correo
        FROM compras c
        LEFT JOIN usuarios u
            ON c.usuario = u.correo
        WHERE c.id = ?";

$stmt = mysqli_prepare($conexion, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) == 0) {
    header("Location: compras.php");
    exit();
}

$compra = mysqli_fetch_assoc($resultado);

include("includes/header.php");
include("includes/sidebar.php");

function e($texto)
{
    return htmlspecialchars($texto ?? '', ENT_QUOTES, 'UTF-8');
}

?>

<main class="content">

<h2>Detalle de la compra</h2>

<div class="card">

<h3>Información general</h3>

<p><strong>Código:</strong>
<?= e($compra["codigo_compra"]); ?>
</p>

<p><strong>Estado:</strong>
<?= e($compra["estado"]); ?>
</p>

<p><strong>Fecha compra:</strong>
<?= e($compra["fecha_compra"]); ?>
</p>

</div>

<div class="card">

<h3>Cliente</h3>

<p>

<strong>Nombre:</strong>

<?php

if(!empty($compra["nombres"])){

    echo e($compra["nombres"]." ".$compra["apellidos"]);

}else{

    echo "Cliente no registrado";

}

?>

</p>

<p>

<strong>Correo:</strong>

<?= e($compra["usuario"]); ?>

</p>

<p>

<strong>Teléfono:</strong>

<?= e($compra["telefono"]); ?>

</p>

</div>

<div class="card">

    <h3>📦 Producto</h3>

    <p>
        <strong>Producto:</strong>
        <?= e($compra["producto"]); ?>
    </p>

    <p>
        <strong>Cantidad:</strong>
        <?= e($compra["cantidad"]); ?>
    </p>

    <p>
        <strong>Precio:</strong>
        <?= e($compra["precio"]); ?>
    </p>

    <p>
        <strong>Método de pago:</strong>
        <?= e($compra["metodo_pago"]); ?>
    </p>

</div>

<div class="card">

    <h3>🚚 Envío</h3>

    <p>
        <strong>Dirección:</strong>
        <?= e($compra["direccion"]); ?>
    </p>

    <p>
        <strong>Barrio:</strong>
        <?= e($compra["barrio"]); ?>
    </p>

    <p>
        <strong>Persona que recibe:</strong>
        <?= e($compra["persona_recibe"]); ?>
    </p>

    <p>
        <strong>Transportadora:</strong>

        <?php
        echo !empty($compra["transportadora"])
            ? e($compra["transportadora"])
            : "Sin asignar";
        ?>

    </p>

    <p>
        <strong>Número de guía:</strong>

        <?php
        echo !empty($compra["numero_guia"])
            ? e($compra["numero_guia"])
            : "Sin asignar";
        ?>

    </p>

</div>

<div class="card">

    <h3>📅 Fechas</h3>

    <p>
        <strong>Compra:</strong>
        <?= e($compra["fecha_compra"]); ?>
    </p>

    <p>
        <strong>Fecha estimada:</strong>

        <?php
        echo !empty($compra["fecha_estimada"])
            ? e($compra["fecha_estimada"])
            : "--";
        ?>

    </p>

    <p>
        <strong>Fecha de envío:</strong>

        <?php
        echo !empty($compra["fecha_envio"])
            ? e($compra["fecha_envio"])
            : "--";
        ?>

    </p>

    <p>
        <strong>Fecha de entrega:</strong>

        <?php
        echo !empty($compra["fecha_entrega"])
            ? e($compra["fecha_entrega"])
            : "--";
        ?>

    </p>

</div>

<div class="card">

    <h3>📝 Observaciones</h3>

    <p>

        <?php

        echo !empty($compra["observacion"])
            ? nl2br(e($compra["observacion"]))
            : "No hay observaciones registradas.";

        ?>

    </p>

</div>

<div style="margin-top:20px; display:flex; gap:10px;">

    <a href="compras.php">
        <button type="button">
            ← Volver
        </button>
    </a>

    <a href="editar_compra.php?id=<?= $compra["id"]; ?>">
        <button type="button">
            ✏ Editar
        </button>
    </a>

</div>

</main>

<?php include("includes/footer.php"); ?>

