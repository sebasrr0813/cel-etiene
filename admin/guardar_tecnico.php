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

/* ==========================
   RECIBIR DATOS
========================== */

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

/* ==========================
   FOTO
========================== */

$foto = "";

/* ==========================
   FOTO
========================== */

$foto = "";

if (
    isset($_FILES["foto"]) &&
    $_FILES["foto"]["error"] == 0
) {

    $nombreArchivo = time() . "_" . basename($_FILES["foto"]["name"]);

    $rutaDestino = "../uploads/tecnicos/" . $nombreArchivo;

 echo "<h3>Información de la prueba</h3>";

echo "Ruta destino: " . $rutaDestino . "<br><br>";

echo "¿Existe la carpeta?: ";

var_dump(is_dir("../uploads/tecnicos"));

echo "<br><br>";

if (move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaDestino)) {

    echo "<span style='color:green'>La imagen se copió correctamente.</span>";

    $foto = $nombreArchivo;

} else {

    echo "<span style='color:red'>No se pudo copiar la imagen.</span>";

}

}

/* ==========================
   INSERTAR
========================== */

$sql = "INSERT INTO tecnicos(

nombre,
apellido,
cedula,
telefono,
correo,
cargo,
especialidad,
experiencia,
descripcion,
foto,
estado

)

VALUES(

?,?,?,?,?,?,?,?,?,?,?

)";

$stmt = mysqli_prepare($conexion,$sql);

mysqli_stmt_bind_param(

$stmt,

"sssssssssss",

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
$estado

);

if(mysqli_stmt_execute($stmt)){

    header("Location: tecnicos.php?ok=1");

}else{

    echo "Error al guardar el técnico.";

}

exit();

?>