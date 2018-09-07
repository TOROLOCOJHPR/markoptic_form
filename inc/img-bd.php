<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root.'/inc/objetos/conexion.php';

    try{
        $con = new Conexion;
        $con = $con->conectar();
        $sql = 'SELECT idSolicitud,fotoHistoria FROM imgsolicitud';
        $result = $con->query($sql);
        while($row = $result->fetch_array()){
            if($row['fotoHistoria'] != ""){
                $sql = 'INSERT INTO imghistoria(idSolicitud,fotoHistoria) VALUES('.$row['idSolicitud'].',"'.$row['fotoHistoria'].'")';
                if($con->query($sql) ){
                    echo "imagen insertada<br>";
                }
            }
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }finally{
        $con->close();
    }
?>