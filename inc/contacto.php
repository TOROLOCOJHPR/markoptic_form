<?php
$to = "info@fundacionmarkoptic.org.mx";
//$to = "jparra@markoptic.mx";
$subject = "Markoptic página Web Correo de información";
$message = "<p><strong>correo: </strong>".$_POST['email']."</p><p><strong>Nombre: </strong>".$_POST['nombre']."</p><p><strong>Teléfono: </strong>".$_POST['telefono']."</p><p><strong>Comentario: </strong>".$_POST['comentario'].'</p>';
$headers = "From: Página Web Markoptic";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$result = mail($to, utf8_decode($subject), utf8_decode($message), utf8_decode($headers));
if(!$result) {   
    echo 'Ocurrio un error al enviar el mensaje';
} else {
    echo 'Tu mensaje se a enviado con exito';
}