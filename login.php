<?php
require_once 'db_conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["user"]) || empty($_POST["pass"])) {
        header("Location: inicio.html?error=campos_vacios");
        exit();
    }

    $usuario_input = $_POST['user'];
    $password_input = $_POST['pass'];

    $sql = "SELECT id, nombres, password, rol FROM usuarios WHERE correo = ? OR cedula = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        error_log("Error al preparar la consulta de login: " . $conn->error);
        header("Location: inicio.html?error=db_error");
        exit();
    }

    $stmt->bind_param("ss", $usuario_input, $usuario_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user_data = $result->fetch_assoc();
        
        if (password_verify($password_input, $user_data["password"])) {
            $_SESSION["user_id"] = $user_data["id"];
            $_SESSION["user_name"] = $user_data["nombres"];
            $_SESSION["user_role"] = $user_data["rol"];

            header("Location: menu.php");
            exit();
        } else {
            header("Location: inicio.html?error=contrasena_incorrecta");
            exit();
        }
    } else {
        header("Location: inicio.html?error=usuario_no_encontrado");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>