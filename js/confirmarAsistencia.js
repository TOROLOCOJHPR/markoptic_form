

$('#formConfirmarAsistencia').on('submit',function(e) {
    e.preventDefault();
    let formData = new FormData($('#formConfirmarAsistencia')[0]);
    $('#formConfirmarAsistencia').find('input[type=submit]').prop('disabled', true);
    $.ajax({
        type: "POST",
        url: 'inc/registrarAsistencia.php',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(data) {
            $('#formConfirmarAsistencia').find('input').prop('disabled', true);
            alert('Su confirmación fue registrada con éxito.');
        },
        error: function(data) {
            alert('Ha ocurrido un error al registrar tu asistencia, por favor recargue la pagina y vuelva  aintentarlo.');
            $('#formConfirmarAsistencia').find('input[type=submit]').prop('disabled', false);
        },
        complete: function() {
        }
    });
});

