<?php
    $metodo = $_SERVER['REQUEST_METHOD'];
    $objBen = new Beneficiario;

    if($metodo == "POST"){
        if(isset($_POST['form']) ){
            $form = $_POST['form'];
            if($form == "restaurar"){
                if($_POST['restore'] == 0){
                    header('Location: /editorUsuarios');
                }else{
                    $id = $_POST['restaurarId'];
                    $pass = $_POST['restaurarPass'];
                    $rol = $_POST['restaurarRol'];
                    include 'back/creaContraseña.php';
                    $e = $objBen->restauraUsuario($id,$hash,$rol);
                    if($e == 0){ header('Location: /editorUsuarios?m=1');}
                    else{$message = "Usuario no restaurado intenta nuevamente"; $restaurar = 1;}
                    $m = 1;
                }
            }elseif($form == "crea"){
                $user = $_POST['creaUsuario'];
                $pass = $_POST['creaPass'];
                $rol = $_POST['creaRol'];
                include 'back/creaContraseña.php';
                $e = $objBen->creaUsuario($user,$hash,$rol);
                if($e[0]['m'] == 0){ header('Location: /editorUsuarios?m=1');}
                elseif($e[0]['m'] == 1){$message = "El usuario ya existe";}
                elseif($e[0]['m'] == 2){$message = "El usuario fue eliminado anteriormente ¿desea restaurarlo?"; $restaurar = 1;}
                elseif($e[0]['m'] == 3){$message = "El usuario no pudo ser creado intenta nuevamente";}
                $m = 1;
            }elseif($form == "cambia"){
                if( $_POST['cambiaPass'] != $_POST['cambiaRepPass']){
                    $message = "Las contraseñas no coinciden";
                    $m = 1;
                }else{
                    $id = $_POST['cambiaId'];
                    $pass = $_POST['cambiaPass'];
                    include 'back/creaContraseña.php';
                    $e = $objBen->actualizaContraseña($id,$hash);
                    $message = ($e == 0)? header('Location: /editorUsuarios?m=1') : "La contraseña no pudo ser actualizada intenta nuevamente";
                    $m = 1;
                }
            }elseif($form == "elimina"){
                $id = $_POST['eliminaId'];             
                $e = $objBen->eliminaUsuario($id);
                $message = ($e == 0)? header('Location: /editorUsuarios?m=1') : "Usuario no eliminado intenta nuevamente";
                $m = 1;
            }
        }
    }
?>