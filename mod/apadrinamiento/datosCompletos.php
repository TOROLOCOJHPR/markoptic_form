<?php 
    $id = $_GET['b'];
    $cont = 0;
    //obtener datos del beneficiario 
    $objBen = new beneficiario;
    $result = $objBen->buscaDatosApadrinado($id);
    $edad = $objBen->generaEdadBeneficiario($result['fecNacimiento']);  
    //calcular el porcentaje de recaudación del beneficiario
    // $baseDatosDinero = $result['recabado'];
    $baseDatosDinero = $objBen->recabado($id);
    //echo $baseDatosDinero;
    $precioProtesis = $result['precio'];
    if($baseDatosDinero == 0){ $por = 0; }else{ $por = (($baseDatosDinero / $precioProtesis)*100); }
    if($por > 100){ $por = 100; }
    //echo $por;
    $porciento = number_format($por,2);
    $dashoffset =(628/100)*(100 - $porciento);
?>
<!-- información del beneficiario -->
<div class="row mx-0">
    <div class="col-12 col-sm-6 col-md-3 ">
    <h3 class="text-capitalize text-center mt-2"><?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></h3>
        <img class="img-fluid" src="/imagenes/uploads/<?php echo $result['foto1']; ?>" alt="imagen del beneficiario">
    </div>
    <div class="col-12 col-sm-6 col-md-4 pt-4 c-align-horizontal ">
        <div class="mt-4">
            <strong>Edad: </strong><span><?php echo $edad; ?>&nbsp;años<span>
            <br>
            <strong>Vive en: </strong><span><?php echo $result['ciudad']."&nbsp;".$result['estado']."&nbsp;".$result['pais']; ?></span>
            <br>
            <strong>Solicita: </strong><span><?php echo $result['dispositivo']; ?></span>
            <br>
            <strong>¿Por qué solicita? </strong>
            <br>
            <span class="text-first-uppercase"><?php echo ucfirst($result['porque']); ?></span>
            <h5 class="mt-5"><cms:show textomotivador />Te invitamos a apoyar a: </h5><h5><?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></h5>
            <div class="row mx-0">
                <button class="btn bg-verde-menu text-white ml-auto" data-toggle="modal" data-target="#exampleModalCenter" >Apadrinar</button>
            </div>
        </div>    
    </div>
    <!-- información del porcentaje recaudado -->
    <div class="col-12 col-md-5 mt-4 c-align-middle flex-column order-2 order-md-3 ">
        <div id='contCirculo' class="">
            <h5 class="text-center mt-4">Porcentaje de Recaudación</h5>
            <svg id="contPorcentaje" height='300' width='300' class="">
                <circle id='circulo<?php echo $cont ?>' cx='50%' cy='50%' r='100' stroke-dasharray='628' stroke-dashoffset='<?php echo $dashoffset; ?>'></circle>
                <text id='porciento' x='34%' font-size='2.5rem' y='52%' fill='black'><?php echo $porciento; ?>%</text>
            </svg>
            <h6 class="text-center">Precio dispositivo: <?php echo $precioProtesis; ?> MXN</h6>
            <h6 class="text-center">Total Recabado: <?php echo $baseDatosDinero; ?> MXN</h6>
        </div><!--contCirculo-->
    </div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div id="ben" ben="<?php echo $id; ?>"></div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <h4>Monto a donar</h4>
            <span class="mb-2">Monto mínimo de donación 50.00 mxn</span><br>
            <button class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="50">50.00 mxn</button>
            <button class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="100">100.00 mxn</button>
            <button class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="200">200.00 mxn</button>
            <button class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="500">500.00 mxn</button>
            <input type="text" placeholder="Introduce el monto a donar" id="donacion" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="prePagar();">Donar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="https://sw.banwire.com/checkout.js"></script>
<script src="/js/motorPago.js"></script>
<script>
    
function prePagar(){
    var donacion = $('#donacion').val();
    if ( donacion >= 50 ){
        pagar(donacion);
    }else{
        alert('Introduce un monto minimo de 50 mxn');
    }
}
function pagar(donacion) {
    // Podemos pagar con los valores por defecto
    //SW.pay();
    // O podemos modificar los valores antes de efectuar el pago
    //var donacion = $('#donacion').val();
    var folio = $('#ben').attr('ben');
    var email = $('#email').val();
    console.log('total de la donación' + donacion);
    SW.pay({
        total: donacion,
        concept: "Donación",
        cust: {
            fname: "", //Nombre del comprador
            mname: "", //Apellido paterno del comprador
            lname: "", //Apeliido materno del comprador
            email: email, //Email del comprador
            phone: "", //Número telefónico del comprador
            addr: "", //Dirección del comprador (calle y número)
            city: "", //Ciudad del comprador
            state: "", //Estado del comprador (2 dígitos de acuerdo al formato ISO)
            country: "", //País del comprador (3 dígitos de acuerdo al formato ISO)
            zip: "" //Código de postal del comprador
        },
        items: [
            {
                name: "Donación",
                //qty: 1,
                desc: "Donación",
                unitPrice: donacion
            }
        ],
        reference: folio,
    });
    
}   
    //funcion donar
    function donar(){
        //$('.lightbox-proyectos').addClass('c-align-middle');
        //var d =$(this).attr('d');        
        //$('#dt').html(d).show();
        console.log('donar');
        $('.lightbox').show();
    }
    function close(){
        //$(this).removeClass('c-align-middle');
        console.log('close');
        $('.lightbox').hidde();
    }
    //función ajax
    function ajax(ajaxParametros,resultado){
        $.ajax({
	        data:ajaxParametros,
         	url:'/back/ajax.php',
            type:'post',
        	beforeSend: function () {
                console.log('enviado');
	            //$("#beforeresultado").html("<div class='beforeSend'><label>Cargando, espere por favor...</label></div>");
            },
            success:  function (response) {	
                console.log('recibido');					
	    	    $("#beforeresultado").html("");
	    	    $('#'+ resultado).html(response);
            }
        });
    }
    </script>