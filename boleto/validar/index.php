<?php
// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);
require_once '../../inc/config.php';
if (isset($_GET['folio'])) {
    $tabla = ($_GET['evento'] == 'fiesta')? 'venta_boletos_fiesta': 'venta_boletos';
    $con = new mysqli(SERVER,USER,PASS,DB);
    $con->set_charset("utf8");
    $res = $con->query("select * from {$tabla} where id = {$_GET['folio']}")->fetch_assoc();
}
$validez = 'No es valido';
$nombre = $folio = $hora = $pases = $usados = '';
if (!is_null($res)) {
    $validez = 'Es valido';
    $nombre = $res['nombre'];
    $folio = $res['id'];
    $hora = $res['hora_funcion'];
    $pases = $res['cantidad_boletos'];
    $usados = $res['pases_usados'];
    $urlForm =  ($_GET['evento'] == 'fiesta')?'/inc/registrarPase.php?folio='.$res['id'].'&evento=fiesta':'/inc/registrarPase.php?folio='.$res['id'];
    $zona = ($_GET['evento'] == 'fiesta')? $res['zona_boleto']: '';
    $tipo = ($_GET['evento'] == 'fiesta')? $res['tipo_boleto']: '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validacion de boletos</title>
</head>
<body>
    <h2>El boleto: <?php echo $validez?></h2>
    <h3>Informacion del Boleto</h3>
    <ul>
        <li>Nombre: <?php echo $nombre?></li>
        <li>Folio: <?php echo $folio?></li>
        <li>Pases: <?php echo $pases?></li>
        <li>Pases usados: <?php echo $usados?></li>
        <?php if($_GET['evento'] == 'fiesta') : ?>
        <li>tipo: <?php echo $tipo?></li>
        <li>zona: <?php echo $zona?></li>
        <?php else : ?>
        <li>Hora de la funcion: <?php echo $hora?></li>
        <?php endif; ?>
    </ul>
    <form id='formPasesUsados' data-url='<?php echo $urlForm?>'>
        <label for="used">Pases usados</label><br>
        <input type="button" value="-" class='addBtn' style="height:35px;width:35px">
        <input type="number" value='1' min='0' max="<?php echo $pases?$pases:''?>" step='1' style="height:28px;width:50px" id='used' name='used'>
        <input type="button" value="+" class='addBtn' style="height:35px;width:35px"><br>
        <input type="submit" value='registrar' style="height:35px;width:70px">
    </form>

    <script>
        [...document.getElementsByClassName("addBtn")].forEach(item => {
            item.addEventListener('click', event => {
                if(event.currentTarget.value == '+') {
                    if(document.getElementById('used').value < document.getElementById('used').max )document.getElementById('used').value++;
                } else {
                    if(document.getElementById('used').value > document.getElementById('used').min)document.getElementById('used').value--;
                }
            });
        });

        document.getElementById('formPasesUsados').addEventListener('submit',event=>{
            event.preventDefault();
            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                // Process our return data
                if (xhr.status == 200) {
                    location.reload();
                } else {
                    alert('ha ocurrido un error, recarga la pagina e intenta de nuevo.');
                }
            };

            xhr.open('POST', event.currentTarget.dataset.url);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(encodeURI('used=' + document.getElementById('used').value));
            
        });
    </script>
    
</body>
</html>