<?php

session_start();

if(
    !isset($_SESSION["usuario"]) ||
    $_SESSION["rol"] != "administrador"
){
    header("Location: ../inicio.php");
    exit();
}

include("../db_conexion.php");

$id = $_POST["id"];

$estado = $_POST["estado"];

$observacion = $_POST["observacion_admin"];

// Actualizar la PQR

$sql = "UPDATE quejas
SET
estado=?,
observacion_admin=?,
fecha_actualizacion=NOW()
WHERE id=?";

$stmt = mysqli_prepare($conexion,$sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssi",
    $estado,
    $observacion,
    $id
);

mysqli_stmt_execute($stmt);

// Volver al detalle

header("Location: ver_queja.php?id=".$id);

exit();

?>