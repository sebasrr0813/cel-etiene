<?php

ob_start();

session_start();

include("db_conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);

    $sql = "SELECT * FROM usuarios
    WHERE correo = ?";

    $stmt = mysqli_prepare(
        $conexion,
        $sql
    );

    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $user
    );

    mysqli_stmt_execute($stmt);

    $resultado =
    mysqli_stmt_get_result($stmt);

    // =========================
    // USER EXISTS
    // =========================

    if(mysqli_num_rows($resultado) > 0){

        $fila = mysqli_fetch_assoc(
            $resultado
        );

        // =========================
        // PASSWORD VALID
        // =========================

        if(
            password_verify(
                $pass,
                $fila['password']
            )
        ){

            $_SESSION['usuario'] =
            $fila['correo'];

            $_SESSION['rol'] =
            $fila['rol'];

            header("Location: menu.php");
            exit();

        }else{

            header(
            "Location: inicio.php?error=password"
            );

            exit();

        }

    }else{

        header(
        "Location: inicio.php?error=user"
        );

        exit();

    }

}

ob_end_flush();

?>