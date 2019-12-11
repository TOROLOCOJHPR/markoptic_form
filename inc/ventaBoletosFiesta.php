<?php
// $carrito = json_decode($_POST['carrito']);
// echo($carrito[0]->name);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './mailer/Exception.php';
require_once './mailer/PHPMailer.php';
require_once './mailer/SMTP.php';
require_once './config.php';


http_response_code(500);

$nombre = filter_var( trim( $_POST['nombre'] ), FILTER_SANITIZE_STRING);
$email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
$telefono = filter_var( trim( $_POST['telefono'] ), FILTER_SANITIZE_STRING);
$status = $_POST['event'];
$factura = isset($_POST['factura']) ? true : false;
$referencia = $_POST['id'];
$totalPagado = $_POST['total'];
$hash = $_POST['hash'];
$carrito = json_decode($_POST['carrito']);
$ids = [];
$totalEntradas = 0;

$con = new mysqli(SERVER, USER, PASS, DB);
if ($con->connect_errno) {
    $response = ['status'=>'error','message' => 'Fallo de coneccion intenete mas tarde'];
} else {
    $con->set_charset("utf8");

    foreach ($carrito as $item) {
        $tipoBoleto = $item->tipo;
        $zonaBoleto = $item->zona;
        $costoBoleto = ($item->unitPrice * $item->qty);
        $cantidadBoleto = $item->qty;
        $totalEntradas +=  $item->qty;

        $query = "insert into venta_boletos_fiesta (nombre,email,telefono,tipo_boleto,zona_boleto,costo_boleto,total_pago,status_pago,cantidad_boletos,factura,id_transaction,hash) values ('{$nombre}','{$email}','{$telefono}','{$tipoBoleto}','{$zonaBoleto}','{$costoBoleto}','{$totalPagado}','{$status}','{$cantidadBoleto}','{$factura}','{$referencia}','{$hash}')";

        $res = $con->query($query);
        $ids[] .= $con->insert_id;
    }


    $email_fundacion =
    '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Se ha comprado un boleto para el evento de Fiesta Sinaloense</title>
    </head>
    <body>
        <p>Se han vendido boletos:</p>
        <h3>comprador: <strong>'.$nombre.'</strong></h3>
        <p>correo electronico: '.$email.'</p>
        <p>telefono: '.$telefono.'</p>
        <p># de entradas: '.$totalEntradas.'</p>
        <p>pago: '.$totalPagado.'</p>
        <p>Solicito factura?: '.($factura?'Si':'No').'</p>
    </body>
    </html>';
    $boletosImg = '';
    $boletoslink = '';
    foreach ($ids as $id) {
        $boletosImg .='<img src="https://www.fundacionmarkoptic.org.mx/boleto/verBoleto?folio='.$id.'&evento=fiesta" alt="" style="height:200px;width:auto;margin-bottom:25px"><br>';
        $boletoslink .='<li><code>https://www.fundacionmarkoptic.org.mx/boleto/verBoleto?folio='.$id.'&evento=fiesta</code></li>';
    }

    $email_interesado =
    '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Has comprado un boleto para una obra con causa</title>
    </head>
    <body>
        <center>
        <table style="width: 700px; border-spacing: 0px;">
            <tbody>
                <tr style="background-color: #A40000;">
                    <td style="width: 75%;">
                        <h2 style="color: #fff; margin: 20px; text-align: center;">Hola '.$nombre.'</h2>
                        <h4 style="color: #fff; margin: 20px; text-align: center;">Gracias por tu aportación a Fundación Markoptic. Los datos de tu compra están indicados a continuación. Que disfrutes el evento.</h4>
                    </td>
                    <td style="width: 25%; padding: 15px;"><img src="https://www.fundacionmarkoptic.org.mx/img/logo-white.png" style="max-height:70px;width:100%;" /></td>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="2">
                        <h1 style="color: #21192d;">Fiesta Sinaloense</h1>
                    </td>
                </tr>
                <tr>
                    <td style="background-color: #DE4D3D; text-align: center;padding:20px;" colspan="2">
                        <span style=" color: #ffffff; font-size: 18px;">Lugar y fecha:</span>
                        <h1 style="text-align: center; color: #ffffff;margin-bottom:25px;">
                        17 de octubre 2019<br>
                        Campestre La Herradura,<br>
                        Culiacán, Sinaloa.<br>
                        a partir de las: 6:00 p.m.
                        </h1>
                        <h5 style="text-align: center; color: #ffffff;margin-bottom:25px;">Boletos:</h5>'
                        .$boletosImg.
                        '<p style="text-align: center; color: #fff;margin:0 50px 25px;">Estos son tus boleto, puedes guardar las imagenes en tu celular o imprimirlas. Presenta los códigos en el punto de entrada del evento, junto con identificación oficial.</p>
                     </td>
                </tr>
                <tr>
                    <td style="background-color: #fff; text-align: center;padding:20px;" colspan="2">
                        <p style="text-align: center; color: #464050;">En caso de tener problemas para visualizar la imagen anterior, entrar al siguiente link para descargar tu boleto:</p>
                        <ul>'
                            .$boletoslink.
                        '</ul>
                    </td>
                </tr>
                <tr>
                    <td style="background-color: #A40000; padding: 15px;" colspan="2">
                        <p style="text-align: center; color: #fff; font-size: 14px;">Te recordamos que el costo de tu boleto es un donativo en apoyo a <a href="https://www.fundacionmarkoptic.org.mx/" target="_blank"><strong>Fundaci&oacute;n Markoptic</strong></a>.</p>
                    </td>
                </tr>
            </tbody>
        </table>
        </center>
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
        $mail->Subject = 'Confirmación de Orden "Fiesta Sinaloense"';
        $mail->Body = $email_interesado;
        $mail->send();

        $mail->ClearAllRecipients();
        $mail->addAddress('info@fundacionmarkoptic.org.mx');
        $mail->isHTML(true);
        $mail->Subject = 'Se ha comprado un nuevo boleto';
        $mail->Body = $email_fundacion;
        $mail->send();

        http_response_code(200);
        $response = ['status'=>'success', 'message' => 'Su inscripcion ha sido exitosa'];
    } else {
        $response = ['status'=>'error', 'message' => 'ERROR: ha ocurido un error guardando la informacion puede que el pago haya quedado registrado pero es neceario que reporte el fallo a promocion@gallbo.com','ids'=>$ids];
    }
}

echo json_encode($response);