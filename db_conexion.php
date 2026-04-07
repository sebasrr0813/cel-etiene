<?php
/**
 * Archivo de conexión a la base de datos (MySQL/XAMPP)
 * Proyecto: Cel-etiene
 */

$host = "localhost";
$user = "root"; // Usuario por defecto en XAMPP
$pass = "";     // Contraseña por defecto en XAMPP
$db   = "cel_etiene";

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Configurar charset para tildes y ñ
$conn->set_charset("utf8");

// Función simple para ejecutar consultas
function ejecutarConsulta($sql) {
    global $conn;
    return $conn->query($sql);
}

// echo "Conexión exitosa"; // Solo para pruebas
?>
