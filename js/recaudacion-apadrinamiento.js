$(document).ready(()=>{
    let progressBar = $('#progress').data('porcentaje');
    console.log(progressBar);
    $('#progress').css("width",progressBar+"%");
});//document ready