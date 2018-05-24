<?php
    session_start();
    include 'conexion.php';
    $_SESSION['usuario'] = $_POST['user'];
    //verifica si los campos no vienen vacíos
    if(empty($_POST['user']) or empty($_POST['pass'])){
        //arroja excepción campos vacios y redirige a página de login
        $_SESSION['e'] = "Datos incompletos, Introduce todos los campos";
        header('Location: /login');
        ////echo "no cargada";
    }else{
        ////echo "cargada";
        $user = $_POST['user']; $pass = $_POST['pass'];
        //busca usuario en la base de datos
        $sql = "SELECT user,pass,roles.nombre FROM usuarios INNER JOIN roles ON roles.id = usuarios.rol WHERE user= '".$_POST['user']."'";
        $objCon = new conexion;
        $con = $objCon->conectar();
        $result = $con->query($sql);
        //verifica si existe el usuario
        if($result->num_rows > 0){
            //usuario existente
            ////echo "<br>se encontro el usuario";
            //verifica que la contraseña coincida con la contraseña almacenada en la base de datos
            $result = $result->fetch_assoc();
            if(password_verify($pass, $result['pass'])) {
                ////echo "<br>coinciden";
                //variable con la cual se verifica si el usuario inicio sesión
                $_SESSION[''] = 1;
                //nivel de acceso en panel
                $_SESSION[''] = $result['nombre'];
                header("Location: /panel");
            } else{
                //arroja excepción contraseña no coincide 
                ////echo "<br>no coinciden";
                //variable con la cual se verifica si el usuario inicio sesión
                $_SESSION[''] = "";
                $_SESSION['e'] = "Contraseña incorrecta, Verifica he inténtalo de nuevo";
                header("Location: /login");
            }
        }else{
            //usuario no existe
            ////echo "<br>no se encontro el usuario";
            //arroja excepción de usuario inexistente y redirige a página login
            $_SESSION['e'] = "usuario no encontrado";
            header('Location: /login');
        }
    }