<?php

function plantillaCorreo($titulo, $mensaje, $codigo = "", $boton = "")
{

return '

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

</head>

<body style="margin:0;padding:0;background:#f4f6f9;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">

<tr>

<td align="center">

<table width="650" cellpadding="0" cellspacing="0"
style="background:#ffffff;
border-radius:12px;
overflow:hidden;
box-shadow:0 10px 25px rgba(0,0,0,.15);">

<tr>

<td
style="
background:#0f172a;
color:white;
padding:30px;
text-align:center;">

<h1 style="margin:0;">
CEL-ETIENE
</h1>

<p style="margin-top:10px;color:#cbd5e1;">
Servicio técnico especializado
</p>

</td>

</tr>

<tr>

<td style="padding:35px;">

<h2 style="color:#1e3a8a;margin-top:0;">

'.$titulo.'

</h2>

<p
style="
font-size:16px;
line-height:28px;
color:#444;">

'.$mensaje.'

</p>';

if($codigo!=""){

$return='

<div
style="
margin:35px 0;
padding:20px;
background:#eef4ff;
border-left:6px solid #2563eb;
text-align:center;
border-radius:10px;">

<div
style="
font-size:14px;
color:#666;">

Código de seguimiento

</div>

<div
style="
font-size:30px;
font-weight:bold;
margin-top:10px;
color:#2563eb;">

'.$codigo.'

</div>

</div>';

}else{

$return="";

}

$html=$return;

$html.='

'.$boton.'

</td>

</tr>

<tr>

<td
style="
background:#0f172a;
padding:20px;
text-align:center;
color:#cbd5e1;
font-size:13px;">

© '.date("Y").' Cel-etiene

<br><br>

Gracias por confiar en nosotros.

</td>

</tr>

</table>

</td>

</tr>

</table>

</body>

</html>';

return $html;

}