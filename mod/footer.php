    <!--footer-->   
    <?php
    $link = "$_SERVER[REQUEST_URI]";
    if($link !== '/'){
        echo
        "<a href='/'>".
        "<div class='d-block d-lg-none btn-verde p-1 f-opacity-75' style='bottom:80px;border-left:none;'>".
            "<i class='fa fa-home fa-2x text-white' aria-hidden='true'></i>".
        "</div>".
        "</a>";
    }
    ?>
    <a id='up' class='btn-verde f-opacity-75 p-1 text-white' style='bottom:80px;border-right:none;'><i class="fa fa-2x fa-arrow-circle-up" aria-hidden="true"></i></a>
    <hr class="w-100 m-0" style="background-color:#057938;height:5px;border:none;">
        <div class="container-fluid ">
            <div class="row">
                <footer class="bg-gris-footer text-white w-100">
                    <address class="w-100 mt-3">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-9">
                                <div class="row no-gutters enlacesFoo">
                                    <div class="col-6 col-sm">
                                        <p>QUIERO AYUDAR</p>    
                                        <ul class="">
                                            <li><a href="/donar">Donar</a></li>
                                            <li><a href="/apadrina">Apadrina</a></li>
                                            <li><a href="/unete">Únete</a></li>
                                            <li><a href="/aliados">Amigos</a></li>
                                            <!-- <li><a href="/aliados?al=asesores">Asesores</a></li> -->
                                        </ul>
                                    </div>
                                    <div class="col-6 col-sm ">
                                        <p>FUNDACIÓN</p>    
                                        <ul class="">                                            
                                            <li><a href="/fundacion#historia">Historia</a></li>
                                            <li><a href="/fundacion#mision">Misión y Visión</a></li>
                                            <li><a href="/fundacion#objetivos">Objetivos</a></li>
                                            <li><a href="/fundacion#valores">Valores</a></li>
                                            <li><a href="/fundacion#directorio">Nosotros</a></li>
                                            <li><a href="/fundacion#transparencia">Transparencia</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-6 col-sm">
                                        <p>NOTICIAS</p>
                                        <ul class="">
                                            <li><a href="/noticias">Nuestras Noticias</a></li>
                                            <li><a href="/video?f=11">Testimonios</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-6 col-sm">
                                        <p>CONTACTO</p>
                                        <ul class="">
                                            <li><a href="/solicitud">Solicitar donación</a></li>
                                            <li><a class="pointer" data-toggle="modal" data-target=".bd-example-modal-lg">Contacto</a></li>                                      
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 p-0">
                                <p>SUSCRIBETE A NUESTRO BOLETÍN</p>
                                <!-- Begin MailChimp Signup Form -->
                                <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                                <style type="text/css">
                                	#mc_embed_signup{background:none; clear:left;}
                                </style>
                                <div id="mc_embed_signup">
                                    <form action="https://fundacionmarkoptic.us16.list-manage.com/subscribe/post?u=5da492ad040c5451de3927303&amp;id=aa16cd9481" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate p-0" target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll">
                                
                                            <div class="form-group col-12 p-0 m-0 pr-5">
                                	            <input type="email" value="" name="EMAIL" class="required email form-control" id="mce-EMAIL" placeholder="Correo Electrónico">
                                            </div>
                                	    <div id="mce-responses" class="clear m-0 px-0">
                                		    <div class="response m-0 pt-1" id="mce-error-response" style="display:none"></div>
                                		    <div class="response text-white text-center mb-1 mt-1 mx-0 pt-1" id="mce-success-response" style="display:none"></div>
                                	    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5da492ad040c5451de3927303_aa16cd9481" tabindex="-1" value=""></div>
                                        <div class="clear"><input type="submit" value="Suscribir" name="subscribe" id="mc-embedded-subscribe" class="btn bg-verde-menu text-white p-2 mx-0"></div>
                                        </div>
                                    </form>
                                </div>
                                <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text'; /*
                                 * Translated default messages for the $ validation plugin.
                                 * Locale: ES
                                 */
                                $.extend($.validator.messages, {
                                  required: "Este campo es obligatorio.",
                                  remote: "Por favor, rellena este campo.",
                                  email: "Por favor, escribe una dirección de correo válida",
                                  url: "Por favor, escribe una URL válida.",
                                  date: "Por favor, escribe una fecha válida.",
                                  dateISO: "Por favor, escribe una fecha (ISO) válida.",
                                  number: "Por favor, escribe un número entero válido.",
                                  digits: "Por favor, escribe sólo dígitos.",
                                  creditcard: "Por favor, escribe un número de tarjeta válido.",
                                  equalTo: "Por favor, escribe el mismo valor de nuevo.",
                                  accept: "Por favor, escribe un valor con una extensión aceptada.",
                                  maxlength: $.validator.format("Por favor, no escribas más de {0} caracteres."),
                                  minlength: $.validator.format("Por favor, no escribas menos de {0} caracteres."),
                                  rangelength: $.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
                                  range: $.validator.format("Por favor, escribe un valor entre {0} y {1}."),
                                  max: $.validator.format("Por favor, escribe un valor menor o igual a {0}."),
                                  min: $.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
                                });}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                                <!--End mc_embed_signup-->
                            </div>
                        </div>   
                    </address>
                    <!-- redes sociales -->
                    <div class="w-100 text-center mb-1">
                        
                        <span class="fa-stack fa-lg">
                            <a class=" text-white" target="blank" href="https://www.facebook.com/fundacionmarkoptic/">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse"style="color:#2a9f5b;"></i>
                            </a>
                        </span>
                      
                        
                        <span class="fa-stack fa-lg">
                            <a class=" text-white" target="blank" href="https://twitter.com/FMarkopticAC">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x fa-inverse"style="color:#2a9f5b;"></i>
                            </a>
                        </span>
                        
                        
                        <span class="fa-stack fa-lg">
                            <a class=" text-white" target="blank" href="https://www.youtube.com/channel/UCIh2HeU_uwMwDYnEw_IMvLQ?view_as=subscriber">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-youtube-play fa-stack-1x fa-inverse"style="color:#2a9f5b;"></i>
                            </a>
                        </span>
                        
                        
                        <span class="fa-stack fa-lg">
                            <a class=" text-white" target="blank" href="https://www.linkedin.com/in/fundaci%C3%B3n-markoptic-4b8041153/">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-linkedin fa-stack-1x fa-inverse"style="color:#2a9f5b;"></i>
                            </a>
                        </span>
                        
                    </div> 

                    <!-- modal para contacto -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content p-text-black text-center">
                            <div class="bg-verde-menu p-4 mb-4 text-white">
                                <h3>Contacto</h3>
                            </div>
                            <form id="contacto-form" method="post">
                            <div class="form-row px-3">
                                <div class="form-group col-12">
                                    <input class="form-control" type="text" name="nombreContacto" id="" placeholder="Nombre Completo" required>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input class="form-control" type="email" name="emailContacto" id="" placeholder="Correo Electrónico" required>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input class="form-control" type="text" name="telefonoContacto" id="" placeholder="Teléfono (Opcional)">
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <textarea class="form-control" name="comentarioContacto" placeholder="Déjanos tu comentario" rows="7" required></textarea>
                            </div>
                            <div class="row mx-0">
                                <input type="submit" value="enviar" class="bg-verde-menu btn p-2 px-3 ml-auto mr-3 text-white">
                            </div>
                            </form>
                            <div id="contact-result"></div>
                            <hr class="w-100"></hr>
                            <adress>
                                <p class="text-dark text-center px-5">
                                    <span><i class="fa fa-map-marker" aria-hidden="true"></i> Blvd. Enrique Sánchez Alonso #2249-2, Col. Parque Alameda, Culiacán, Sin., México. C.P. 80030</span>
                                    <br>
                                    <span><i class="fa fa-phone" aria-hidden="true"></i> (667) 715-2166 / 715-1714 / 146 66 50/51/52/53/54 / LADA SIN COSTO: 01 800 509 1985</span>
                                    <br>
                                    <span><i class="fa fa-envelope" aria-hidden="true"></i> info@fundacionmarkoptic.org.mx</span>
                                </p>
                            </adress>
                            </div>
                        </div>
                    </div>

                </footer>
            </div>
        </div>
    <!--/footer--> 
    <!--cdn  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    /cdn-->
    <!--local-->

    <!--/local-->
    <script src="/js/jquery-3.1.1.js"></script>
    <script src="/js/js-footer-link-scroll.js"></script>
    <script src="/js/js-position-top.js"></script>
    <script src="https://use.fontawesome.com/8077e15131.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/lightbox/src/js/lightbox.js"></script>
    <script>
    $(document).ready(function(){
        //enviar mail de formulario contacto
        $('#contacto-form').submit(function(){
            var f = "contactForm";
            var r = "contact-result";
            var id= $(this).val();
            var nombreContact = $('input[name$="nombreContacto"]').val();
            var emailContact = $('input[name$="emailContacto"]').val();
            var telefonoContact = $('input[name$="telefonoContacto"]').val();
            var comentarioContact = $('form textarea').val();
            var parametros ={
                "formulario": f,
                "id" : id,
                "nombreContacto": nombreContact,
                "emailContacto": emailContact,
                "telefonoContacto": telefonoContact,
                "comentarioContacto": comentarioContact
	        }
            ajax(parametros,r);
            $('#contacto-form')[0].reset();
            return false;
        });
    });
    //función ajax
    function ajax(ajaxParametros,resultado){
        $.ajax({
	        data:ajaxParametros,
         	url:'/back/ajax.php',
            type:'post',
        	beforeSend: function () {
	            //$("#beforeresultado").html("<div class='beforeSend'><label>Cargando, espere por favor...</label></div>");
            },
            success:  function (response) {						
	    	    $("#beforeresultado").html("");
	    	    $('#'+ resultado).html(response);
            }
        });
    }
    </script>
