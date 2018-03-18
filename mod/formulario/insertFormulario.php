<?php
//$fechaError = "";
            //$d=$_POST['formDispositivo'];
            $fecha = date("-d-m-Y-H-i-s");
            $objBen = new Beneficiario();    
            $objBen->setNombre( trim ( mb_strtolower( $_POST['nombre']) ) );
            $objBen->setApellidos( trim ( mb_strtolower( $_POST['apellido']) ) );
            $objBen->setSexo($_POST['sexo']);
            $objBen->setNacimiento($_POST['date']);
            $objBen->setCiudad($_POST['ciudad']);
            $objBen->setCalle( trim( mb_strtolower($_POST['calle']) ) );
            $objBen->setColonia( trim( mb_strtolower($_POST['colonia']) ) );
            $objBen->setCp( trim($_POST['cp']) );
            $objBen->setTelefono( trim($_POST['tel']) );
            $objBen->setEmail( trim($_POST['email']) );
            //comprobar si el beneficiario cuenta con un tutor
            $objBen->setIndependiente($_POST['independiente']);
            if( $_POST['independiente'] == 1 ){
                $objBen->setNombreTutor( trim ( mb_strtolower( $_POST['tutNombre']) ) );
                $objBen->setApellidoTutor( trim ( mb_strtolower( $_POST['tutApellido']) ) );
                $objBen->setSexoTutor($_POST['sexoTutor']);
                $objBen->setViveBen($_POST['tutVive']);
                $objBen->setParentesco($_POST['parentesco']);
                $objBen->setNacimientoTutor($_POST['tutDate']);
                $objBen->setTelTutor( trim($_POST['tutTel']) );
                $objBen->setEmailTutor( trim($_POST['tutEmail']) );
            }
            $objBen->setDispositivo($_POST['solicitud']);
            //if($d == 'brazo'){
                $objBen->setCondicion($_POST['condicion']);
                //echo $objBen->getCondicion();
            //}
            $objBen->setIdMedioDifusion($_POST['enterado']);
            if(isset($_POST['enteradoOtro'])){
                $objBen->setDescMedioDif( trim( mb_strtolower($_POST['enteradoOtro']) ) );
            }        
            $objBen->setDescObtencion( trim ( mb_strtolower( $_POST['breveDescripcion']) ) ); 
            //$objBen->setFoto1($_FILES['foto1']['name']);
            //$objBen->setFoto2($_FILES['foto2']['name']);
            //$objBen->setFoto3($_FILES['foto3']['name']);
            $foto1 = "";
            $foto2 = "";
            $foto3 = "";
            for($i=1; $i<=3; $i++){
                $getFile="foto".$i;
                $func ="setFoto".$i;
                $tmp = explode(".", $_FILES[$getFile]['name']);
                $imageFileType = end($tmp);
                $add= $getFile.$fecha.".".$imageFileType;
                //$file_name = $_FILES[$getFile]['name'];
                ${"foto".$i} = $add;
                echo ${"foto".$i};
                $objBen->$func($add);
            }

            //$objBen->mostrar();
        
            if( $objBen->inserta() ){
                for($i=1; $i<=3; $i++){
                    $getFile="foto".$i;
                    move_uploaded_file ($_FILES[$getFile]['tmp_name'],"imagenes/uploads/".${"foto".$i} );
                }
                header('Location: ../gracias?solicitud=exito');
            }
?>