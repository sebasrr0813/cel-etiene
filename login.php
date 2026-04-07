<?php
/**
 * Lógica de inicio de sesión (Login) - Cel-etiene
 * Este archivo procesa los datos del formulario de inicio.html
 */

require_once 'db_conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['user'];
    $password = $_POST['pass'];

    // Consulta para buscar al usuario por correo o cédula
    $sql = "SELECT id, nombres, password, rol FROM usuarios WHERE correo = ? OR cedula = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user_data = $result->fetch_assoc();
        
        // Verificar la contraseña (usando password_verify para mayor seguridad)
        if (password_verify($password, $user_data['password'])) {
            // Guardar datos en la sesión
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_name'] = $user_data['nombres'];
            $_SESSION['user_role'] = $user_data['rol'];

            // Redirigir al menú principal
            header("Location: menu.html");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>
