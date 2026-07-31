<?php

require_once "correo/mailer.php";

$html = "

<h1>Cel-etiene</h1>

<p>Si estás viendo este correo, PHPMailer funciona correctamente.</p>

<p><b>¡Felicidades!</b></p>

";

$resultado = enviarCorreo(

    "TU_CORREO_PERSONAL@gmail.com",
    "Tu Nombre",
    "Prueba de correo Cel-etiene",
    $html

);

if($resultado === true){

    echo "Correo enviado correctamente.";

}else{

    echo $resultado;

}