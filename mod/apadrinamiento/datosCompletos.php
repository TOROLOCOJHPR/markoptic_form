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
    $precioProtesis = $result['precio'];
    $por = (($baseDatosDinero / $precioProtesis)*100);
    if($por > 100){ $por = 100; }
    $porciento = number_format($por,2);
    $dashoffset =(628/100)*(100 - $porciento);
?>
<!-- información del beneficiario -->
<div class="row mx-0">
    <div class="col-12 col-sm-6 col-md-3 print">
    <h3 class="text-capitalize text-center mt-4"><?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></h3>
        <img class="img-fluid" src="/imagenes/uploads/<?php echo $result['foto1']; ?>" alt="imagen del beneficiario">
    </div>
    <div class="col-12 col-sm-6 col-md-4 pt-4 c-align-horizontal print">
        <div class="">
            <strong>Edad: </strong><span><?php echo $edad; ?>&nbsp;años<span>
            <br>
            <strong>Vive en: </strong><span><?php echo $result['ciudad']."&nbsp;".$result['estado']."&nbsp;".$result['pais']; ?></span>
            <br>
            <strong>Solicita: </strong><span><?php echo $result['dispositivo']; ?></span>
            <br>
            <strong>¿Por qué solicita? </strong>
            <br>
            <span class="text-first-uppercase"><?php echo ucfirst($result['porque']); ?></span>
            <h5 class="mt-5">Te invitamos a que apoyes a <?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></h5>
            <div class="row mx-0">
                <button class="btn bg-verde-menu text-white ml-auto" data-toggle="modal" data-target="#exampleModalCenter" >Apadrinar</button>
            </div>
        </div>    
    </div>
    <!-- información del porcentaje recaudado -->
    <div class="col-12 col-md-5 c-align-middle flex-column order-2 order-md-3 print">
        <div id='contCirculo' class="print">
            <h5 class="text-center mt-4">Porcentaje de Recaudación</h5>
            <svg height='300' width='300' class="print">
                <circle id='circulo<?php echo $cont ?>' cx='50%' cy='50%' r='100' stroke-dasharray='628' stroke-dashoffset='<?php echo $dashoffset; ?>'></circle>
                <text id='porciento' x='34%' font-size='2.5rem' y='52%' fill='black'><?php echo $porciento; ?>%</text>
            </svg>
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
            <label>Monto a donar</label>
            <input type="text" placeholder="Introduce el monto a donar" id="donacion" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="pagar();">Donar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="https://sw.banwire.com/checkout.js"></script>
<script>
    var SW = new BwGateway({
        // Quitar o establecer a false cuando pase a produccion
        sandbox: true,
        // Nombre de usuario de Banwire
        user: 'pruebasbw',
        // Titulo de la entana
        title: "Fundación Markoptic",
        // Referencia
        //reference: 'testref01',
        // Concepto
        //concept: 'pago de prueba',
        // Opcional: Moneda
        currency: 'MXN',
        // Opcional: Tipo de cambio definido por el comercio (En caso de seleccionar una moneda que requiera mostrar el tipo de cambio a MXN. Solo informativo). Ejemplo: 15.00
        exchangeRate: '',
        // Total de la compra
        //total: "100.00",
        // Opcional: Meses sin intereses
        //months: [3,6,9,12],
        // Arreglo con los items de compra
        /*items: [
            {
                name: "Articulo uno",
                qty: 1,
                desc: "Articulo de prueba numero uno",
                unitPrice: 10
            },
            {
                name: "Articulo dos",
                qty: 2,
                desc: "Articulo numero dos de prueba",
                unitPrice: 40
            },
            {
                name: "Otro articulo con nombre mas largo",
                qty: 2,
                desc: "Articulo numero tres de prueba con una descripcion larga",
                unitPrice: 40
            }
        ],*/
        /*cust: {
            fname: "Ricardo", //Nombre del comprador
            mname: "Gamba", //Apellido paterno del comprador
            lname: "Lavin", //Apeliido materno del comprador
            email: "prueba@banwire.com", //Email del comprador
            phone: "55555555", //Número telefónico del comprador
            addr: "Direccion 440", //Dirección del comprador (calle y número)
            city: "Mexico", //Ciudad del comprador
            state: "DF", //Estado del comprador (2 dígitos de acuerdo al formato ISO)
            country: "MEX", //País del comprador (3 dígitos de acuerdo al formato ISO)
            zip: "14145" //Código de postal del comprador
        },*/
        /*ship: {
            addr: "Direccion 440", //Dirección de envío
            city: "Mexico", //Ciudad de envío
            state: "DF", //Estado de envío (2 dígitos de acuerdo al formato ISO)
            country: "MEX", //País de envío (3 dígitos de acuerdo al formato ISO)
            zip: "14145" //Código de postal del envío
        },*/
        // Opciones de pago, por defecto es "all". Puede incluir varias opciones separadas por comas
        paymentOptions: 'all', // visa,mastercard,amex,oxxo,speifast,all
        // Mostrar o no pagina de resumen de compra
        reviewOrder: true,
        // Mostrar o no mostrar los campos de envio
        showShipping: true,
        // Solamente para pagos recurrentes o suscripciones
        /*recurring: {
            // Cada cuanto se ejecutará el pago "month","year" o un entero representando numero de días
            interval: "month",
            // Opcional: Limitar el número de pagos (si no se pone entonces no tendrá limite)
            limit: 10, 
            // Opcional: Fecha del primer cargo (en caso de no especificar se ejecutará de inmediato)
            start: "2014-01-01", // Formaro YYYY-MM-DD
            // Opcional: En caso de que los pagos subsecuentes (después del primero)
            // tengan un monto distinto al inicial
            total: "50.00"
        },*/
        // URL donde se van a enviar todas las notificaciones por HTTP POST de manera asoncrónica
        //notifyUrl: "https://www.mipagina.com/recibir.php",
        notifyUrl: "www.markoptic.test/sistemaApadrinamiento.php",
        // Handler en caso de exito en el pago
        //successPage: 'www.markoptic.test/sistemaApadrinamiento.php',
        onSuccess: function(data){
            var r = 'resultado';
            var f = 'motorPago';
            var t = $('#donacion').val();
            var fol = $('#ben').attr('ben');
            var parametros={
                "formulario":f,
                "total":t,
                "folio":fol
            };
            ajax(parametros,r);
            alert("¡Gracias por tu pago!")
        },
        // Pago pendiente OXXO
        pendingPage: 'http://yahoo.com',
        onPending: function(data){
            alert("El pago está pendiente por ser efectuado");
        },
        // Pago challenge
        challengePage: 'http://challenge.com',
        onChallenge: function(data){
            alert("Pago enviado a validaciones de seguridad");
        },
        // Handler en caso de error en el pago
        errorPage: 'http://facebook.com',
        onError: function(data){
            alert("Error en el pago");
        },
        // Cuando cierra el popup sin completar el proceso
        onCancel: function(data){
            console.log("Se cancelo el proceso");
        }
    });

function pagar() {
    // Podemos pagar con los valores por defecto
    //SW.pay();
    // O podemos modificar los valores antes de efectuar el pago
    var donacion = $('#donacion').val();
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