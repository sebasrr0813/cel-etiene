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

// Evitar que un administrador se bloquee a sí mismo
if(isset($_SESSION["id"]) && $_SESSION["id"] == $id){

    echo "<script>
            alert('No puedes bloquear tu propia cuenta.');
            window.location='clientes.php';
          </script>";

    exit();

}

$sql = "UPDATE usuarios
        SET estado='bloqueado'
        WHERE id='$id'";

mysqli_query($conexion,$sql);

header("Location: clientes.php");
exit();

?>