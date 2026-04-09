<?php
/**
 * Lógica de inicio de sesión (Login) - Cel-etiene
 */

require_once 'db_conexion.php';
session_start(); // Iniciar la sesión al principio del script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar que los campos no estén vacíos
   if (empty($_POST["user"]) || empty($_POST["pass"])) {
        header("Location: Cel-etiene HTML - CSS/inicio.html?error=campos_vacios"); // CAMBIO AQUÍ
        exit();
    }
    $usuario_input = $_POST['user']; // Puede ser correo o cédula
    $password_input = $_POST['pass'];

    // Consulta para buscar al usuario por correo o cédula
    $sql = "SELECT id, nombres, password, rol FROM usuarios WHERE correo = ? OR cedula = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        error_log("Error al preparar la consulta de login: " . $conn->error);
        header("Location: Cel-etiene HTML - CSS/inicio.html?error=db_error");
        exit();
    }

    $stmt->bind_param("ss", $usuario_input, $usuario_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user_data = $result->fetch_assoc();
        
        // Verificar la contraseña hasheada
  if (password_verify($password_input, $user_data["password"])) {
            $_SESSION["user_id"] = $user_data["id"];
            $_SESSION["user_name"] = $user_data["nombres"];
            $_SESSION["user_role"] = $user_data["rol"];

            header("Location: Cel-etiene HTML - CSS/menu.html"); // CAMBIO AQUÍ
            exit();
        } else {
            header("Location: Cel-etiene HTML - CSS/inicio.html?error=contrasena_incorrecta"); // CAMBIO AQUÍ
            exit();
        }
    } else {
        header("Location: Cel-etiene HTML - CSS/inicio.html?error=usuario_no_encontrado"); // CAMBIO AQUÍ
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>