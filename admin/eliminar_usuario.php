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

// No permitir eliminar tu propia cuenta
if(isset($_SESSION["id"]) && $_SESSION["id"] == $id){

    echo "<script>
        alert('No puedes eliminar tu propia cuenta.');
        window.location='clientes.php';
    </script>";

    exit();

}

$sql = "DELETE FROM usuarios WHERE id=?";

$stmt = mysqli_prepare($conexion,$sql);

mysqli_stmt_bind_param($stmt,"i",$id);

mysqli_stmt_execute($stmt);

header("Location: clientes.php");
exit();

?>