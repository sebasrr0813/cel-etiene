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

$id = $_POST["id_usuario"];
$rol = $_POST["rol"];

if($_SESSION["id"] == $id){

    die("No puedes cambiar tu propio rol.");

}

$sql = "UPDATE usuarios
        SET rol=?
        WHERE id=?";

$stmt = mysqli_prepare($conexion,$sql);

mysqli_stmt_bind_param($stmt,"si",$rol,$id);

mysqli_stmt_execute($stmt);

header("Location: clientes.php");

exit();

?>

