<?php
/**
 * Lógica de registro de usuario - Cel-etiene
 * Este archivo procesa los datos del formulario de registro.html
 */

require_once 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $fecha_nacimiento = $_POST['fecha'];
    $password = $_POST['pass']; // El usuario debe ingresar una contraseña

    // Encriptar la contraseña por seguridad (Práctica profesional)
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta para evitar Inyección SQL
    $sql = "INSERT INTO usuarios (nombres, apellidos, cedula, correo, password, fecha_nacimiento) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nombres, $apellidos, $cedula, $correo, $password_hashed, $fecha_nacimiento);

    if ($stmt->execute()) {
        echo "Registro exitoso. Ahora puedes iniciar sesión.";
        header("Location: inicio.html");
        exit();
    } else {
        echo "Error al registrar: " . $stmt->error;
    }
}
?>
