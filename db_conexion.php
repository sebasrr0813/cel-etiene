<?php

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "cel_etiene"
);

if(!$conexion){

    die(
        "Error de conexión: "
        . mysqli_connect_error()
    );

}

?>