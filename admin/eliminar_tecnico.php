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

/*==========================
OBTENER FOTO
==========================*/

$sql = "SELECT foto FROM tecnicos WHERE id=?";

$stmt = mysqli_prepare($conexion,$sql);

mysqli_stmt_bind_param($stmt,"i",$id);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($resultado)==0){

    header("Location: tecnicos.php");
    exit();

}

$tecnico = mysqli_fetch_assoc($resultado);

/*==========================
ELIMINAR FOTO
==========================*/

if(!empty($tecnico["foto"])){

    $ruta = "../uploads/tecnicos/".$tecnico["foto"];

    if(file_exists($ruta)){

        unlink($ruta);

    }

}

/*==========================
ELIMINAR REGISTRO
==========================*/

$sql = "DELETE FROM tecnicos WHERE id=?";

$stmt = mysqli_prepare($conexion,$sql);

mysqli_stmt_bind_param($stmt,"i",$id);

if(mysqli_stmt_execute($stmt)){

    header("Location: tecnicos.php?eliminado=1");

}else{

    header("Location: tecnicos.php?error=1");

}

exit();

?>