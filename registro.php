<?php
/**
 * Lógica de registro de usuarios - Cel-etiene
 */

require_once 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar que todos los campos necesarios estén presentes
       if (empty($_POST["nombres"]) || empty($_POST["apellidos"]) || empty($_POST["cedula"]) || empty($_POST["correo"]) || empty($_POST["pass"])) {
        header("Location: Cel-etiene HTML - CSS/registro.html?error=campos_vacios"); // CAMBIO AQUÍ
        exit();
    }

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $fecha_nacimiento = !empty($_POST['fecha']) ? $_POST['fecha'] : NULL; // Puede ser opcional
    $password = $_POST['pass'];

    // Hashear la contraseña antes de guardarla
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta SQL para evitar inyección SQL
    $sql = "INSERT INTO usuarios (nombres, apellidos, cedula, correo, password, fecha_nacimiento) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        // Error en la preparación de la consulta
        error_log("Error al preparar la consulta de registro: " . $conn->error);
        header("Location: Cel-etiene HTML - CSS/registro.html?error=db_error");
        exit();
    }

    // 'ssssss' indica que todos los parámetros son strings
    $stmt->bind_param("ssssss", $nombres, $apellidos, $cedula, $correo, $hashed_password, $fecha_nacimiento);

    if ($stmt->execute()) {
        header("Location: Cel-etiene HTML - CSS/inicio.html?registro=exitoso"); // CAMBIO AQUÍ
        exit();
    } else {
        error_log("Error al ejecutar la consulta de registro: " . $stmt->error);
        header("Location: Cel-etiene HTML - CSS/registro.html?error=registro_fallido"); // CAMBIO AQUÍ
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>