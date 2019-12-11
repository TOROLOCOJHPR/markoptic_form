<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './mailer/Exception.php';
require_once './mailer/PHPMailer.php';
require_once './mailer/SMTP.php';
require_once './config.php';


http_response_code(500);

$nombre = filter_var( trim( $_POST['nombre'] ), FILTER_SANITIZE_STRING);
$email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
$evento = filter_var( trim( $_POST['evento'] ), FILTER_SANITIZE_STRING);

$con = new mysqli(SERVER, USER, PASS, DB);
if ($con->connect_errno) {
    $response = ['status'=>'error','message' => 'Fallo de coneccion intenete mas tarde'];
} else {
    $con->set_charset("utf8");
    $query = "insert into confimaciones_asistencia (nombre,email,evento) values ('{$nombre}','{$email}','{$evento}')";
    $res = $con->query($query);

    $email_fundacion =
    '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Se ha confirmado la asistencia de una persona para el evento de donacion</title>
    </head>
    <body>
        <p>Estos son los datos de la persona:</p>
        <h3>comprador: <strong>'.$nombre.'</strong></h3>
        <p>correo electronico: '.$email.'</p>
        <p>evento: '.$evento.'</p>
    </body>
    </html>';

    $email_interesado =
    '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Has confirmado tu asistencia</title>
    </head>
    <body style="font-family:sans-serif;font-size: 14px;">
        <table style="width:600px;border-spacing:0px;margin:0 auto;">
            <tbody>
                <tr>
                    <td colspan="2" style="padding: 0 20px;">
                        <p style="border-bottom:solid 1px #675398; color:#3A2971; padding: 10px; line-height: 1.5; font-weight: 600;font-family:sans-serif;">
                            Hola '.$nombre.'<br>Gracias por confirmar tu asistencia a nuestro evento de donación.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle; padding-left:40px;">
                        <h1 style="color: #3B286F; margin:0 0 5px;font-family:sans-serif;">SAVE THE DATE</h1>
                        <h3 style="font-weight:300; color: #6249A8;font-family:sans-serif; margin:0 0 5px">EVENTO DE DONACIÓN Y<br>5TO ANIVERSARIO</h3>
                    </td>
                    <td style="vertical-align:middle; text-align:center; padding:50px 20px;">
                        <img src="https://www.fundacionmarkoptic.org.mx/img/logo-aniv.png" alt="Fundacion Markoptic" style="width: 200px; height: 136px;">
                    </td>
                </tr>
                <tr style="background-color: #3A2971; color:#fff;">
                    <td width="50%" style="padding:15px;">
                        <p style="font-family:sans-serif;">
                            CLUB DE EMPRESARIOS BOSQUES,<br>
                            CIUDAD DE MÉXICO.
                        </p>
                     </td>
                    <td width="50%" style="text-align:right; padding: 15px;">
                        <p style="font-family:sans-serif;">
                            27 DE NOVIEMBRE 2019<br>
                            HORARIO: 19:00 -22:00 HRS.
                        </p>
                    </td>
                    <tr style="height:20px; background-color:#675398;"><td colspan="2"></td></tr>
                    <tr style="height:10px; background-color:#7F6EA8;"><td colspan="2"></td></tr>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';


    

    if( $res ) {
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'dallas179.arvixeshared.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'info@fundacionmarkoptic.org.mx';                     // SMTP username
        $mail->Password   = 'markoptic2249';                               // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;
        $mail->setFrom('info@fundacionmarkoptic.org.mx', 'Markoptic por la inclusion');
        $mail->Sender='info@fundacionmarkoptic.org.mx';
        $mail->CharSet = 'UTF-8';


        $mail->addAddress($email, $nombre);
        $mail->isHTML(true);
        $mail->Subject = 'Confirmación de asistencia evento Markoptic';
        $mail->Body = $email_interesado;
        $mail->send();

        $mail->ClearAllRecipients();
        $mail->addAddress('info@fundacionmarkoptic.org.mx');
        $mail->isHTML(true);
        $mail->Subject = 'Se ha confirmado un asistente al evento de donacion';
        $mail->Body = $email_fundacion;
        $mail->send();

        http_response_code(200);
        $response = ['status'=>'success', 'message' => 'Su inscripcion ha sido exitosa'];
    } else {
        $response = ['status'=>'error', 'message' => 'ERROR: ha ocurido un error guardando la informacion puede que el pago haya quedado registrado pero es neceario que reporte el fallo a promocion@gallbo.com'];
    }
}

echo json_encode($response);