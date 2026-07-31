<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/config.php';

function enviarCorreo($destinatario, $nombre, $asunto, $html)
{
    global $config;

    $mail = new PHPMailer(true);

    try {

        // Configuración SMTP
        $mail->isSMTP();
        $mail->Host       = $config['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $config['username'];
        $mail->Password   = $config['password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $config['port'];

        // Codificación
        $mail->CharSet = 'UTF-8';

        // Remitente
        $mail->setFrom(
            $config['from_email'],
            $config['from_name']
        );

        // Destinatario
        $mail->addAddress($destinatario, $nombre);

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = $html;

        $mail->send();

        return true;

    } catch (Exception $e) {

        return $mail->ErrorInfo;

    }

}