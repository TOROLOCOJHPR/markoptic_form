<?php
    
    
    //variables del beneficiario
    $edadError = 0; $edadErrorTut = 0; $tutObligatorio = 0; $enombre = 0; $eapellido = 0;
    $esexo = 0; $edate = 0; $epais = 0; $eestado = 0; $eciudad = 0; $ecalle = 0; $ecolonia = 0;
    $ecp = 0; $etel = 0; $eemail = 0;
    
    //variables del tutor
    $etutNombre = 0; $etutApellido = 0; $esexoTutor = 0; $etutVive = 0; $eparentesco = 0; $etutDate = 0; 
    $etutTel = 0; $etutEmail = 0;
    
    // variables adicionales 
    $edispositivo = 0; $econdicion = 0; $emedio = 0; $emedioOtro = 0; $eporque = 0; $efoto1 = 0; 
    $efoto2 = 0; $efoto3 = 0; $eterminos = 0;

    $e = 0;
    $objBen = new Beneficiario;

    if($metodo == "POST"){

    //validar datos del beneficiario
        //validar edad del beneficiario
        if( $_POST['nombre'] == ""){$e = 1; $enombre = 1;}
        if( $_POST['apellido'] == ""){$e = 1; $eapellido = 1; }
        if( $_POST['sexo'] == ""){$e = 1; $esexo = 1; }
        if( $_POST['date'] == ""){$e = 1; $edate = 1; }
        if( $_POST['pais'] == ""){$e = 1; $epais = 1; }
        if( $_POST['estado'] == ""){$e = 1; $eestado = 1; }
        if( $_POST['ciudad'] == ""){$e = 1; $eciudad = 1; }
        if( $_POST['calle'] == ""){$e = 1; $ecalle = 1; }
        if( $_POST['colonia'] == ""){$e = 1; $ecolonia = 1; }
        if( $_POST['cp'] == ""){$e = 1; $ecp = 1; }
        if( $_POST['tel'] == ""){$e = 1; $etel = 1; }
        if( $_POST['email'] == ""){$e = 1; $eemail = 1; }
        if( $_POST['date'] != ""){
            $fecha = $_POST['date'];
            echo "<br>edad ".$edad = $objBen->generaEdadBeneficiario($fecha);
            if ($edad < 6 or $edad > 100){ //beneficiario menor de 6 años y mayor de 100
                $edadError = 1; $e = 1;
                echo "<br> edad menor a 6";
            }elseif($edad >= 6 and $edad < 18){ //beneficiario menor de edad
                $tutObligatorio = 1;
                echo "<br> menor de edad";
            }/*else{ //sin errores en la edad del beneficiario
                $edadError = 0; $tutObligatorio = 0 ;
                echo "sin error";
            }*/
        }else{
            $edadError = 1; $e = 1; $tutObligatorio = 1;
        }
        echo "<br>edad error".$edadError;
        echo "<br> tutor obligatorio ".$tutObligatorio;

    //validar datos del tutor 

        //validar edad del tutor
        if(isset( $_POST['independiente'] )){
            if( $_POST['independiente'] != 0 ){ //si los datos del tutor estan visibles
                if( $_POST['tutNombre'] == ""){$e = 1; $etutNombre = 1;}
                if( $_POST['tutApellido'] == ""){$e = 1; $etutApellido = 1;}
                if( $_POST['sexoTutor'] == ""){$e = 1; $esexoTutor = 1;}
                if( !isset($_POST['tutVive'])){$e = 1; $etutVive = 1;}
                if( $_POST['parentesco'] == ""){$e = 1; $eparentesco = 1;}
                if( $_POST['tutDate'] == ""){$e = 1; $etutDate = 1;}
                if( $_POST['tutTel'] == ""){$e = 1; $etutTel = 1;}
                if( $_POST['tutEmail'] == ""){$e = 1; $etutEmail = 1;}
                if(isset($_POST['tutDate'])){
                    $fechaTut = $_POST['tutDate'];
                    $edadTut = $objBen->generaEdadBeneficiario($fechaTut);
                    if($edadTut < 18 ){
                        $edadErrorTut = 1; $e = 1;
                    }else{
                        $edadErrorTut = 0;
                    }
                }else{
                    $edadErrorTut = 1; $e = 1;
                }
            }else{
                $edadErrorTut = 0;
            }
        }

    //validar datos adicionales 

        if( $_POST['solicitud'] == ""){$e = 1; $edispositivo = 1;}
        if( !isset($_POST['condicion'])){$e = 1; $econdicion = 1;}
        if( $_POST['enterado'] == ""){$e = 1; $emedio = 1;}
        if( isset($_POST['enteradoOtro']) ){
            if($_POST['enteradoOtro'] == ""){$e = 1; $emedioOtro = 1;}
        }
        if( $_POST['breveDescripcion'] == ""){$e = 1; $eporque = 1;}
        if( $_FILES['foto1'] == ""){$e = 1; $efoto1 = 1;}
        if( $_FILES['foto2'] == ""){$e = 1; $efoto2 = 1;}
        if( $_FILES['foto3'] == ""){$e = 1; $efoto3 = 1;}
        if( !isset($_POST['terminos'])){$e = 1; $eterminos = 1;}
        /*
        for($i = 1; $i< 4; $i++){
            $getFile ="foto".$i;
            if($_FILES[$getFile]['name'] != ""){
                $tmp = explode(".", $_FILES[$getFile]['name']);
                $imageFileType = end($tmp);
                echo $imageFileType;
                if($imageFileType != "jpg" or "png"){
                    echo "foto".$foto{$i} = 1;
                }
            }
        }*/
    }
    echo "<br> edad error tutor". $edadErrorTut;
?>            