<?php 
    $opciones = [
        'cost' => 0, //se cambia el interget
        'salt' => ''
    ];
    $hash = password_hash($pass,PASSWORD_BCRYPT,$opciones);
