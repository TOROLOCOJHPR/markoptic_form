(function($) {
    window.fnames = new Array();
    window.ftypes = new Array();
    fnames[0]='EMAIL';
    ftypes[0]='email';
    fnames[1]='FNAME';
    ftypes[1]='text';
    fnames[2]='LNAME';
    ftypes[2]='text';
    fnames[3]='MMERGE3';
    ftypes[3]='text';
    /*
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
    });
}(jQuery));
var $mcj = jQuery.noConflict(true);

//enviar mail de formulario contacto
$('#contacto-form').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:'/inc/contacto.php',
        type:'post',
        data: $("#contacto-form").serialize(),
        beforeSend: function () {
            $('#contacto-form input, #contacto-form textarea').prop('readonly', true);
            $('#contacto-form :input[type="submit"], #contacto-form :input[type="reset"]').prop('disabled', true);
        },
        success:  function (data) {
            alert(data);
            $('#contacto-form input, #contacto-form textarea').prop('readonly', false);
            $('#contacto-form :input[type="submit"], #contacto-form :input[type="reset"]').prop('disabled',false);
            $('#contacto-form')[0].reset();
        },
        error: function (error) {
            
        }
    });         
});