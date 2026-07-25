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

$id = $_GET["id"];

$sql = "UPDATE usuarios
        SET estado='activo'
        WHERE id='$id'";

mysqli_query($conexion,$sql);

header("Location: clientes.php");
exit();

?>