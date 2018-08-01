<?php
    include 'config.php';
    include 'objetos/conexion.php';
    $objCon = new Conexion();
    $con = $objCon->conectar();
    $sql = "SELECT foto1,foto2,foto3,fotoHistoria,idSolicitud FROM imgsolicitud";
    $result = $con->query($sql);
    while($row = $result->fetch_array()){
        $ruta = "../img/uploads/".$row['idSolicitud']."/";
        if ( !file_exists( $ruta ) ) {
            $dirmake = mkdir($ruta, 0777);
            for($i=1; $i < 5; $i++){
                if($i == 4){
                    $foto = "fotoHistoria";
                }else{
                    $foto = "foto".$i;
                }
                if($row[$foto] != ""){
                    $rutaCopy = "../img/uploads/".$row[$foto];
                    $rutaDest = $ruta.$row[$foto];
                    copy($rutaCopy,$rutaDest);
                }
            }
        }else{
            for($i=1; $i < 5; $i++){
                if($i == 4){
                    $foto = "fotoHistoria";
                }else{
                    $foto = "foto".$i;
                }
                if($row[$foto] != ""){
                    $rutaCopy = "../img/uploads/".$row[$foto];
                    $rutaDest = $ruta.$row[$foto];
                    copy($rutaCopy,$rutaDest);
                }
            }
        }
        echo "foto1:".$row['foto1']."foto2:".$row['foto2']."foto3:".$row['foto3']."fotoHistoria:".$row['fotoHistoria']."id:".$row['idSolicitud']."<br>";
    }
?>
img beneficiario