<?php
require_once './config.php';
http_response_code(500);
$tabla = ($_GET['evento'] == 'fiesta')? 'venta_boletos_fiesta': 'venta_boletos';
$con = new mysqli(SERVER, USER, PASS, DB);
if ($con->connect_errno) {
    $response = ['status'=>'error','message' => 'Fallo de coneccion intenete mas tarde'];
} else {
    $con->set_charset("utf8");
    $query = "update {$tabla} set pases_usados = {$_POST['used']} where id= {$_GET['folio']};";
    $con->query($query);
}
if($con->affected_rows >= 1) {
    http_response_code(200);
}
echo json_encode([$_POST,$_GET['folio']]);