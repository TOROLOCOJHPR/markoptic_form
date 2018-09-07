<?php
    $root = $_SERVER['DOCUMENT_ROOT'];// tomar la ruta hacía el directorio raíz
    require ($root.'/panel/inc/comprueba.php');//comprueba si el usuario se encuentra autentificado
    require ($root.'/panel/inc/excepciones-usuario.php');// verifica excepciones de datos de usuarios
   
    $title = "Usuarios";// titulo de header y de menú
    $requireBack = 1;// 1 requiere botón de regreso en menú 0 no requiere botón de regreso en el menú
?>
    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2018.2.620/styles/kendo.bootstrap.min.css" />
    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2018.2.620/styles/kendo.common.min.css">
<?php
    include ($root.'/panel/mod/header.php');//incluir cabeceras html
    include ($root.'/panel/mod/menu-principal.php');//incluir menú 
?>
    <style>
        .k-widget{border:none}
        .k-icon, .k-tool-icon {position: initial;}
    </style>
    
    <body class="text-dark">

        <div class="px-4 pb-5 my-3 row mx-0 justify-content-center">
        

        <?php
            //mostrar opción solo a usuarios administradores 
            if($_SESSION[ROL] == 2 or $_SESSION[ROL] == 3 ){ ?> 
            
                <!-- crea usuario -->
                <div class="col-md-5">
                    <div class="card card-default mb-3">
                        <div class="card-header bg-markoptic"><h6 class="text-white m-0">Crea Usuario</h6></div>
                        <div class="card-body">
                
                            <form id="crea-form" method="post"> 
                
                                <!-- usuario -->
                                <div class="form-group">

                                    <!-- etiqueta -->
                                    <label for="usuarioCrea"><strong>Usuario:</strong></label>
                                    <!-- campo -->
                                    <input
                                        id="usuarioCrea"
                                        type="text"
                                        name="usuarioCrea"
                                        placeholder="Introduce un usuario"
                                        required
                                        class="form-control"
                                    />

                                </div><!-- usuario -->

                                <!-- contraseña -->
                                <div class="form-group">

                                    <!-- etiqueta -->
                                    <label for="passCrea"><strong>Contraseña:</strong></label>
                                    <!-- campo -->
                                    <input
                                        id="passCrea"
                                        type="password"
                                        name="passCrea"
                                        required
                                        placeholder="Introduce una contraseña"
                                        class="form-control"
                                    />
                                
                                </div><!-- contraseña -->

                                <!-- roles de usuario -->
                                <div class="form-group">

                                    <!-- etiqueta -->
                                    <label for="rolCrea"><strong>Rol:</strong></label>
                                    <!-- select box -->
                                    <select name="rolCrea" id="rolCrea" class="form-control" required>
                                        <option value="" class="text-muted">Selecciona un rol</option>
                                        <?php
                                            //crear opciones para select box        
                                            foreach ($roles as $row){
                                                //mostrar opcion superadministrador solo a usuarios superadministradores
                                                if($row['id'] == 3){
                                                    if($_SESSION[ROL] == 3){
                                                        echo '<option value="'.$row['id'].'" >'.$row['nombre'].'</option>';
                                                    }
                                                }else{
                                                    echo '<option value="'.$row['id'].'" >'.$row['nombre'].'</option>';
                                                }
                                            }//foreach
                                        ?>
                                    </select>

                                </div><!-- roles de usuario -->
                            
                                <input type="hidden" name="envio" value="crea">

                                <!-- submit -->
                                <div class="text-right">
                                    <input
                                        id="crea-submit"
                                        type="submit"
                                        value="Agregar"
                                        class="btn btn-success bg-markoptic"
                                    />
                                </div>
                    
                            </form><!-- crea usuario -->
                        
                            <!-- mensaje success -->
                            <div id="crea-alert" class="alert alert-dismissible alert-success fade show" style="display:none" role="alert">
                                <span id="crea-message"></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        </div><!-- card body -->
            
                    </div><!-- card default-->
                </div>

        <?php 
            }//mostrar opción solo a usuarios administradores 
        ?>


        <!-- actualiza usuario -->
            <div class="col-md-5">
                <div class="card card-default">
                    <div class="card-header bg-secondary"><h6 class="text-white m-0">Editar usuario</h6></div>
                    <div class="card-body">

                        <form id="actualiza-form">

                            <?php 
                                //mostrar sección para administradores(actualiza rol, y usuarios)
                                if($_SESSION[ROL] == 2 or $_SESSION[ROL] == 3 ){ ?>

                                    <!-- usuario administrador -->
                                    <fieldset id="actualiza-fieldset-rol" disabled >
                                        <div class="form-row mx-0">

                                            <!-- usuarios -->
                                            <div class="form-group col-md-6">
                                                <!-- etiqueta -->
                                                <label for="actualiza-id"><strong>Usuario:</strong></label>
                                                <!-- select box -->
                                                <select id="actualiza-id" name="actualizaId" class="form-control" required>
                                                    <option value="" class="text-muted">Selecciona un usuario</option>
                                                    <?php
                                                        // crear opciones para el select box
                                                        foreach($usuarios as $row){
                                                            //mostrar usuarios super administrador solo a usuarios superadministradores
                                                            if($row['rol'] == 3){
                                                                if($_SESSION[ROL] == 3){
                                                                    echo '<option value="'.$row['id'].'" >'.$row['user'].'</option>';
                                                                }
                                                            }else{
                                                                echo '<option value="'.$row['id'].'" >'.$row['user'].'</option>';
                                                            }
                                                        }//foreach
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- roles de usuario -->
                                            <div class="form-group col-md-6">
                                                <!-- etiqueta -->
                                                <label for="actualiza-rol"><strong>Rol:</strong></label>
                                                <!-- select box -->
                                                <select name="actualizaRol" id="actualiza-rol" class="form-control" required>
                                                    <option value="" class="text-muted">Selecciona un rol</option>
                                                    <?php 
                                                        //crear opciones para select box
                                                        foreach ( $roles as $row){
                                                            //mostrar rol superadministrador solo a usuarios superadministradores
                                                            if($row['id'] == 3){
                                                                if($_SESSION[ROL] == 3){
                                                                    echo '<option value="'.$row['id'].'" >'.$row['nombre'].'</option>';
                                                                }
                                                            }else{
                                                                echo '<option value="'.$row['id'].'" >'.$row['nombre'].'</option>';
                                                            }
                                                        }//foreach
                                                    ?>
                                                </select><!-- roles de usuario -->
                                    
                                            </div><!-- form-group -->
                                
                                        </div><!-- row -->
                            
                                    </fieldset>
                            
                            <?php
                                }//mostrar sección para administradores(actualiza rol, y usuarios)  
                            ?>

                            
                            <?php 
                                //mostrar sección para usuarios estandar
                                if($_SESSION[ROL] == 1 or $_SESSION[ROL] == 4){ ?>
                            
                                    <!-- usuario estandar -->
                            
                                    <fieldset>
                                        <p><strong>Usuario: </strong><?php echo $_SESSION[USUARIO] ?></p>
                                
                                        <input
                                            type="hidden"
                                            name="actualizaId"
                                            <?php echo 'value="'.$_SESSION[ID].'""' ?>
                                        />
                                
                                        <input
                                            type="hidden"
                                            name="actualizaRol"
                                            <?php echo 'value="'.$_SESSION[ROL].'""' ?>
                                        />
                                    </fieldset>
                            <?php 
                                }//mostar sección para usuarios estandar
                            ?>
                            
                            <!-- contraseña -->
                            <fieldset id="actualiza-fieldset" class="form-row mx-0" disabled>
                                    
                                <!-- Contraseña -->
                                <div class="form-group col-12">
                                    <label><strong>Contraseña</strong></label>
                                    <input
                                        type="password"
                                        name="actualizaContraseña"
                                        value=""
                                        placeholder="Introduce contraseña"
                                        class="form-control"
                                        required
                                    />
                                </div>

                                <!-- confirma contraseña -->
                                <div class="form-group col-12">
                                    <label><strong>Confirma Contraseña</strong></label>
                                    <input
                                        type="password"
                                        name="actualizaConfirma"
                                        value=""
                                        placeholder="confirma Contraseña"
                                        class="form-control"
                                        required
                                    />
                                </div>

                                <input type="hidden" name="envio" value="actualiza"/>

                            </fieldset><!-- contraseña -->
                    
                            <!-- submit -->
                            <div class="text-right">
                                
                                <?php
                                    //mostrar botón eliminar usuario a usuarios superadministradores 
                                    if ($_SESSION[ROL] == 3){ ?>

                                        <!-- eliminar -->
                                        <input
                                            id="actualiza-elimina"
                                            type="button"
                                            class="btn btn-secondary"
                                            value ="eliminar"
                                            disabled
                                        />
                                <?php
                                    }//mostrar botón eliminar usuario a usuarios superadministradores
                                ?>                    
                                
                                <!-- actualizar -->
                                <input
                                    id="actualiza-submit"
                                    type="submit"
                                    class="btn btn-success bg-markoptic d-none"
                                    value ="actualizar"
                                />
                                    
                                <!-- actualizar -->
                                <input
                                    id="actualiza-edita"
                                    type="button"
                                    class="btn btn-success bg-markoptic"
                                    value ="editar"
                                />
                            </div><!-- submit -->
                        
                        </form>
                        
                        <!-- mensaje success -->
                        <div id="actualiza-alert" class="alert alert-dismissible alert-success fade show" style="display:none" role="alert">
                            <span id="actualiza-message"></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div><!-- message success -->
                    
                    </div><!-- card body -->

                </div><!-- card default-->
            </div><!-- col-md-5 -->
        
        </div><!-- row -->

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="http://kendo.cdn.telerik.com/2018.2.620/js/kendo.all.min.js"></script>
        <script src="/panel/js/editor-usuarios.js"></script>
    </body>
</html>