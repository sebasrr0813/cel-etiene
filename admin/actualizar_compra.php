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

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: compras.php");
    exit();
}

/* ==========================
   RECIBIR DATOS
========================== */

$id = (int)$_POST["id"];

$estado = trim($_POST["estado"]);
$transportadora = trim($_POST["transportadora"]);
$numero_guia = trim($_POST["numero_guia"]);
$fecha_estimada = $_POST["fecha_estimada"];
$fecha_envio = $_POST["fecha_envio"];
$fecha_entrega = $_POST["fecha_entrega"];
$observacion = trim($_POST["observacion"]);

/* ==========================
   FECHA DE ACTUALIZACIÓN
========================== */

$fecha_actualizacion = date("Y-m-d H:i:s");

/* ==========================
   ACTUALIZAR
========================== */

$sql = "UPDATE compras SET

estado=?,
transportadora=?,
numero_guia=?,
fecha_estimada=?,
fecha_envio=?,
fecha_entrega=?,
observacion=?,
fecha_actualizacion=?

WHERE id=?";

$stmt = mysqli_prepare($conexion,$sql);

mysqli_stmt_bind_param(

$stmt,

"ssssssssi",

$estado,
$transportadora,
$numero_guia,
$fecha_estimada,
$fecha_envio,
$fecha_entrega,
$observacion,
$fecha_actualizacion,
$id

);

if(mysqli_stmt_execute($stmt)){

    header("Location: compras.php?ok=1");

}else{

    header("Location: editar_compra.php?id=".$id."&error=1");

}

exit();

?>