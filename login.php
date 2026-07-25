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

                        // Verificar si el usuario está bloqueado
                if($fila['estado'] == "bloqueado"){

                    header("Location: inicio.php?error=bloqueado");

                    exit();

                }

                    $_SESSION['id'] = $fila['id'];

                    $_SESSION['usuario'] = $fila['correo'];

                    $_SESSION['nombre'] = $fila['nombres'];

                    $_SESSION['apellido'] = $fila['apellidos'];

                    $_SESSION['rol'] = $fila['rol'];

            if($fila['rol'] == "administrador"){

                    header("Location: admin/dashboard.php");

                }else{

                    header("Location: menu.php");

                }

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