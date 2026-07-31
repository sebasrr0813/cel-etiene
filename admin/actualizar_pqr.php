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

require_once "../correo/mailer.php";

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

if(mysqli_stmt_execute($stmt)){

    // Obtener la información completa de la PQR
    $consulta = "SELECT * FROM quejas WHERE id=?";

    $stmtConsulta = mysqli_prepare($conexion,$consulta);

    mysqli_stmt_bind_param(
        $stmtConsulta,
        "i",
        $id
    );

    mysqli_stmt_execute($stmtConsulta);

    $resultado = mysqli_stmt_get_result($stmtConsulta);

    $datos = mysqli_fetch_assoc($resultado);

    $html = '

    <h2>Actualización de tu PQR</h2>

    <p>

    Hola <b>'.$datos["nombre"].'</b>,

    </p>

    <p>

    El estado de tu solicitud ha sido actualizado.

    </p>

    <hr>

    <b>Código PQR:</b>

    <h2 style="color:#2563eb;">

    '.$datos["codigo_pqr"].'

    </h2>

    <b>Nuevo estado:</b>

    '.$estado.'

    <br><br>

    <b>Observaciones del administrador:</b>

    '.($observacion != "" ? nl2br($observacion) : "Sin observaciones").'

    <br><br>

    Gracias por comunicarte con Cel-etiene.

    ';

    $resultadoCorreo = enviarCorreo(

        $datos["correo"],
        $datos["nombre"],
        "Actualización de tu PQR",
        $html

    );

    if($resultadoCorreo !== true){

        error_log($resultadoCorreo);

    }

}

header("Location: ver_queja.php?id=".$id);

exit();

?>