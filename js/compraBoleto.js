
let unload = false;
let h = document.getElementById('rotated');
$("#side-out").height(h.getBoundingClientRect().height-55);

$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}

$("#total").html(calcTotal().total).digits();

$('#modalSuccess').on('hidden.bs.modal', function (e) {
    $(".modal-backdrop").remove();
  })

$('#formCompraBoletos').on('submit',function(e) {
    e.preventDefault();
    unload = true;
    let name = $('#nombre').val().split(' '); 
    let pnombre,apellidop,apellidom;
    $('<div class="modal-backdrop fade show"></div>').appendTo(document.body);
    switch (name.length) {
        case 1:
            pnombre = name[0];
            apellidop = '';
            apellidom = '';
            break;
        case 2:
            pnombre = name[0];
            apellidop = name[1];
            apellidom = '';
            break;
        case 3:
        default:
            pnombre = name[0];
            apellidop = name[name.length-2];
            apellidom =  name[name.length-1];
            break;
    }
    SW.pay({
        total: calcTotal().total,
        items:[
            {
                name: '¿QUIEN CARAJOS ES MI MUJER?',
                qty: $('#cantidad').val(),
                desc: 'Obra con causa.',
                unitPrice: calcTotal().precio
            }
        ],
        cust: {
            fname: pnombre, //Nombre del comprador
            mname: apellidop, //Apellido paterno del comprador
            lname: apellidom, //Apeliido materno del comprador
            email: $('#email').val(), //Email del comprador
            phone: '+52'+$('#telefono').val(), //Número telefónico del comprador
        }
    });
});

function enableBtn() {
    $('#enviar').prop('disabled', false);
}

function calcTotal() {
    const precio = 200.00;
    let val = precio;
    if($('#factura').prop('checked')) val= precio * 1.16;
    let data = {precio: val.toFixed(2), total:(val * $('#cantidad').val()).toFixed(2)};
    return  data;
}

$('#factura, #cantidad').on('change', function(){
    $("#total").html(calcTotal().total).digits();
});

var SW = new BwGateway({
    // Quitar o establecer a false cuando pase a produccion
    sandbox: true,
    // Nombre de usuario de Banwire
    user: 'pruebasbw',
    // user: 'markoptic',
    // Titulo de la entana
    title: "Obra con causa",
    // Referencia
    reference: 'Markoptic',
    // Concepto
    concept: 'Obra con causa',
    // Opcional: Moneda
    currency: 'MXN',
    // Opcional: Tipo de cambio definido por el comercio (En caso de seleccionar una moneda que requiera mostrar el tipo de cambio a MXN. Solo informativo). Ejemplo: 15.00
    // Total de la compra
    // total: "1000",
    // Opcional: Meses sin intereses
    // Arreglo con los items de compra
    // items: [    ],
    paymentOptions: 'visa,mastercard,amex', // visa,mastercard,amex,oxxo,speifast,all
    // Mostrar o no pagina de resumen de compra
    reviewOrder: false,
    showShipping: false,
    // URL donde se van a enviar todas las notificaciones por HTTP POST de manera asoncrónica
    notifyUrl:  'https://google.com',
    // Handler en caso de exito en el pago
    // successPage:'',
    onSuccess: function(data){
        // console.log(data);
        let formData = new FormData($('#formCompraBoletos')[0]);
        $.each(data, function(key, value){
            formData.append(key, value);
        });

        $.ajax({
            type: "POST",
            url: 'inc/ventaBoletos.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
                $('#modalSuccess').modal('show');
                $('#formCompraBoletos')[0].reset();
                $("#total").html(calcTotal().total).digits();
            },
            error: function(data) {
                console.log(data);
            },
            complete: function() {
            }
        });
        unload = false;
    },
    // Pago pendiente OXXO
    // pendingPage: 'http://yahoo.com',
    onPending: function(data){},
    // Pago challenge
    // challengePage: 'http://challenge.com',
    onChallenge: function(data){},
    // Handler en caso de error en el pago
    // errorPage: 'http://facebook.com',
    onError: function(data){},
    // Cuando cierra el popup sin completar el proceso
    onCancel: function(data){
        unload = false;
        $(".modal-backdrop").remove();
    }
});


window.addEventListener('beforeunload', (event) => {
    if (unload) event.returnValue = "gg";
  });