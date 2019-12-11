let boletos = [];
$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}
$("#total").html(getTotal(boletos)).digits();

$('#modalSuccess').on('hidden.bs.modal', function (e) {
    $(".modal-backdrop").remove();
});


$('#formCompraBoletos').on('submit',function(e) {
    e.preventDefault();
    if( !boletos.length ) return alert('Debes agregar boletos al carrito de compras.');

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
        total: getTotal(boletos),
        items:boletos,
        cust: {
            fname: pnombre, //Nombre del comprador
            mname: apellidop, //Apellido paterno del comprador
            lname: apellidom, //Apeliido materno del comprador
            email: $('#email').val(), //Email del comprador
            phone: '+52'+$('#telefono').val(), //Número telefónico del comprador
        }
    });
});

const precioGeneral = 300.00;
const precioVIP = 500.00;
const precioNiño = 100.00;

$('#factura').on('change', function(){
    updateCarrito(boletos);
});

var SW = new BwGateway({
    // Quitar o establecer a false cuando pase a produccion
    sandbox: true,
    // Nombre de usuario de Banwire
    user: 'pruebasbw',
    // Titulo de la entana
    title: "Fiesta Sinaloense",
    // Referencia
    reference: 'Markoptic',
    // Concepto
    concept: 'Fiesta Sinaloense',
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
        formData.append('carrito', JSON.stringify(boletos));
        $.ajax({
            type: "POST",
            url: 'inc/ventaBoletosFiesta.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
                $('#modalSuccess').modal('show');
                $('#formCompraBoletos')[0].reset();
                vaciarCarrito();
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
    onPending: function(data){
        alert('ha ocurrido un pedding');
        console.log(data);
    },
    // Pago challenge
    // challengePage: 'http://challenge.com',
    onChallenge: function(data){
        alert('ha ocurrido un challenge');
        console.log(data);
    },
    // Handler en caso de error en el pago
    // errorPage: 'http://facebook.com',
    onError: function(data){
        alert('ha ocurrido un error');
        console.log(data);
    },
    // Cuando cierra el popup sin completar el proceso
    onCancel: function(data){
        unload = false;
        $(".modal-backdrop").remove();
    }
});

$('.boletoForm').on('change', function(e) {
    let db = true;
    let a = $(e.currentTarget).closest('.form-row').find(':input').not(':input[type=button]').get();
    Object.keys(a).forEach(function (item) {
       db = ( $(a[item]).val() )?false:true; // key
    });
    $('#agregarBoleto').prop('disabled',db);
});

$('#agregarBoleto').on('click', function(e) {
    if(validarCantidadBoletos(boletos) > 15 || $('#cantidad').val() > 15 || $('#cantidad').val() <= 0)
        return alert('Solo puedes adquirir un maximo de 15 boletos por compra.');

    let precio =  $('#factura').is(':checked')? ( getPrecio( $('#tipo').val(), $('#zona').val() ) * 1.16) : getPrecio( $('#tipo').val(), $('#zona').val() );
    boleto = {
        name: $('#tipo').val()+' - '+ $('#zona').val(),
        qty: $('#cantidad').val(),
        desc: 'Boleto para '+$('#tipo').val()+' en zona '+$('#zona').val()+'.',
        unitPrice: Math.ceil(precio),
        tipo: $('#tipo').val(),
        zona: $('#zona').val(),
        iva: $('#factura').is(':checked')?true:false,
    }
    boletos.push(boleto);
    updateCarrito(boletos);

    let a = $(e.currentTarget).closest('.form-row').find(':input').not(':input[type=button]').get();
    Object.keys(a).forEach(function (item) {
       $(a[item]).val(function() {
           return this.defaultValue;
        });
    });
    $('#agregarBoleto').prop('disabled',true);
});

$('#vaciarCarrito').on('click', function(e) {
    vaciarCarrito();
});

function updateCarrito(boletos) {
    $('#carrito').empty();
    boletos.forEach(function(i) {
        i.unitPrice = Math.ceil($('#factura').is(':checked')? (getPrecio(i.tipo,i.zona) * 1.16) : getPrecio(i.tipo,i.zona));
        i.iva = $('#factura').is(':checked')?true:false;

        let item = `<li class="list-group-item d-flex justify-content-between align-items-center py-2" style="background-color: transparent;">${i.qty} x ${i.name} <span>$${i.unitPrice * i.qty}</span></li>`;
        $('#carrito').append(item);

    });
    $("#total").html(getTotal(boletos)).digits();
}

function validarCantidadBoletos(boletos) {
    let total = 0;
    if( boletos.length )
        boletos.forEach(function(i) {
            total += parseInt(i.qty);
        });
    return total+parseInt($('#cantidad').val());
}

function getPrecio(tipo, zona) {
    if(tipo == 'niño')return precioNiño;
    switch (zona) {
        case 'general':
            return precioGeneral;
        break;
        case 'VIP':
            return precioVIP;
        break;
    }
}
function getTotal(boletos) {
    if( !boletos.length ) return 0;
    let total = 0;
    boletos.forEach(function(i) {
        total += (getPrecio(i.tipo,i.zona)*parseInt(i.qty));
    });
    return Math.ceil($('#factura').is(':checked')? total * 1.16 : total);
}
function vaciarCarrito() {
    boletos = [];
    updateCarrito(boletos);
}

window.addEventListener('beforeunload', (event) => {
    if (unload) event.returnValue = "gg";
});