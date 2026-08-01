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

/* ===========================
   VALIDAR ID
=========================== */

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {

    header("Location: compras.php");
    exit();

}

$id = (int)$_GET["id"];

/* ===========================
   ELIMINAR
=========================== */

$sql = "DELETE FROM compras WHERE id = ?";

$stmt = mysqli_prepare($conexion, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {

    header("Location: compras.php?eliminado=1");

} else {

    header("Location: compras.php?error=1");

}

exit();

?>

