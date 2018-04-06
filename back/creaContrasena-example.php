<?php 
    $opciones = [
        'cost' => ,
        'salt' => '',
    ];
    $hash = password_hash($pass,PASSWORD_BCRYPT,$opciones);
?>