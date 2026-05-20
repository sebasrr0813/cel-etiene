<?php

require_once 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["nombres"]) || empty($_POST["apellidos"]) || empty($_POST["cedula"]) || empty($_POST["correo"]) || empty($_POST["pass"])) {
        header("Location: registro.html?error=campos_vacios");
        exit();
    }

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $fecha_nacimiento = !empty($_POST['fecha']) ? $_POST['fecha'] : NULL;
    $password = $_POST['pass'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombres, apellidos, cedula, correo, password, fecha_nacimiento) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        error_log("Error al preparar la consulta: " . $conn->error);
        header("Location: registro.html?error=db_error");
        exit();
    }

    $stmt->bind_param("ssssss", $nombres, $apellidos, $cedula, $correo, $hashed_password, $fecha_nacimiento);

    if ($stmt->execute()) {
        header("Location: inicio.html?registro=exitoso");
        exit();
    } else {
        error_log("Error al ejecutar: " . $stmt->error);
        header("Location: registro.html?error=registro_fallido");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>