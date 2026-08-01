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

    header("Location: tecnicos.php");
    exit();

}

$id = (int)$_POST["id"];

$nombre = trim($_POST["nombre"]);
$apellido = trim($_POST["apellido"]);
$cedula = trim($_POST["cedula"]);
$telefono = trim($_POST["telefono"]);
$correo = trim($_POST["correo"]);
$cargo = trim($_POST["cargo"]);
$especialidad = trim($_POST["especialidad"]);
$experiencia = trim($_POST["experiencia"]);
$descripcion = trim($_POST["descripcion"]);
$estado = $_POST["estado"];


/*====================================
OBTENER FOTO ACTUAL
====================================*/

$sql = "SELECT foto FROM tecnicos WHERE id=?";

$stmt = mysqli_prepare($conexion,$sql);

mysqli_stmt_bind_param($stmt,"i",$id);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

$tecnico = mysqli_fetch_assoc($resultado);

$foto = $tecnico["foto"];


/*====================================
SUBIR NUEVA FOTO
====================================*/

if(

isset($_FILES["foto"]) &&

$_FILES["foto"]["error"]==0

){

    $nombreArchivo=time()."_".basename($_FILES["foto"]["name"]);

    $ruta="../uploads/tecnicos/".$nombreArchivo;

    if(move_uploaded_file($_FILES["foto"]["tmp_name"],$ruta)){

        if(!empty($foto)){

            $fotoAnterior="../uploads/tecnicos/".$foto;

            if(file_exists($fotoAnterior)){

                unlink($fotoAnterior);

            }

        }

        $foto=$nombreArchivo;

    }

}


/*====================================
ACTUALIZAR
====================================*/

$sql="UPDATE tecnicos SET

nombre=?,
apellido=?,
cedula=?,
telefono=?,
correo=?,
cargo=?,
especialidad=?,
experiencia=?,
descripcion=?,
foto=?,
estado=?

WHERE id=?";

$stmt=mysqli_prepare($conexion,$sql);

mysqli_stmt_bind_param(

$stmt,

"sssssssssssi",

$nombre,
$apellido,
$cedula,
$telefono,
$correo,
$cargo,
$especialidad,
$experiencia,
$descripcion,
$foto,
$estado,
$id

);

if(mysqli_stmt_execute($stmt)){

    header("Location: tecnicos.php?actualizado=1");

}else{

    header("Location: editar_tecnico.php?id=".$id."&error=1");

}

exit();

?>