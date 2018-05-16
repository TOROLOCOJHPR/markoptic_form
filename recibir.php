<?php
//error_reporting(E_ALL);
//$file = file_put_contents('response.txt', json_encode($_POST));
//echo json_encode($_POST);
include 'back/objetos.php';
//$file = file_put_contents('response.txt',$_POST['reference'].",".$_POST['total'].",".$_POST['id']);
$objBen = new Beneficiario;
$idSolicitud = str_replace("f", "", $_POST['reference']);
$idSolicitud = intval($idSolicitud);
$objBen->insertTransaccion($_POST['total'],$idSolicitud,$_POST['id'],$_POST['auth_code'],$_POST['event'],$_POST['hash'],$_POST['status']);