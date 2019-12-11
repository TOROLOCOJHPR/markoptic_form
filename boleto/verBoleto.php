<?php
// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);
require_once '../inc/config.php';
require_once '../inc/phpqrcode/qrlib.php';

$con = new mysqli(SERVER,USER,PASS,DB);
$con->set_charset("utf8");
$tabla = ($_GET['evento'] == 'fiesta')? 'venta_boletos_fiesta': 'venta_boletos';
$boletoBase = ($_GET['evento'] == 'fiesta')? 'boleto_base_fiesta.png': 'boleto_base.png';
$res = $con->query("select * from {$tabla} where id = {$_GET['folio']}")->fetch_assoc();
if (is_null($res)) {
    header("Location: https://fundacionmarkoptic.org.mx");
    die();
}
$path ='../img/boletos/';
$filName = 'tempQR.png';
$absolutePath = $path.$filName;
$font_path = '../inc/roboto.ttf';
$urlQR = ($_GET['evento'] == 'fiesta')? '/boleto/validar/?folio='.$_GET['folio'].'&evento=fiesta':'/boleto/validar/?folio='.$_GET['folio'];
QRcode::png($_SERVER['HTTP_HOST'].$urlQR,$absolutePath,'L', 12, 1);

$src = imagecreatefrompng($absolutePath);
$dest = imagecreatefrompng($path.$boletoBase);
$color = imagecolorallocate($dest, 70, 64, 80);
$nombre= mb_strimwidth($res['nombre'], 0, 28, "...");
$folio=str_pad($res['id'], 3, '0', STR_PAD_LEFT);
$tipo=mb_strimwidth($res['tipo_boleto'], 0, 2).' - '.mb_strimwidth($res['zona_boleto'], 0, 3, ".");
if( !array_key_exists("evento", $_GET) ) $hora= $res['hora_funcion'];
$pases= str_pad($res['cantidad_boletos'], 3, '0', STR_PAD_LEFT);

imagecopymerge($dest, $src, 415, 15, 0, 0, 372, 372, 100); //have to play with these numbers for it to work for you, etc.
imagettftext($dest, 16, 0, 20, 350, $color, $font_path, $nombre);
imagettftext($dest, 16, 0, 70, 375, imagecolorallocate($dest, 255, 12, 0), $font_path, $folio);
imagettftext($dest, 16, 0, 195, 375, $color, $font_path, $pases);
imagettftext($dest, 16, 0, 280, 375, $color, $font_path, $tipo);
if( !array_key_exists("evento", $_GET) ) imagettftext($dest, 13, 0, 295, 375, $color, $font_path, $hora);

header('Content-Type: image/png');

imagepng($dest);

imagedestroy($dest);
imagedestroy($src);

