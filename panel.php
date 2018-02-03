<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">    
    <link rel="stylesheet" href="/css/style-fundacion.css">    
    <link rel="stylesheet" href="/css/universal.css">    
    <title>Panel Beneficiarios</title>
</head>
<body>
    <h1 class="text-center">Panel de Beneficiarios</h1>
    <div class="row mx-0">
        <div class="col-12 col-md-6 text-center print">
            <h3>Generar Reporte de Solicitudes</h3>
            <button class="btn bg-verde-menu text-white p-2 m-2" id="reporte">Crear Reporte</button>
        </div>
        <div class="col-12 col-md-6 text-center print">
            <h3>Editor de beneficiarios</h3>
            <a href="editorBeneficiarios" class="btn bg-verde-menu text-white p-2 m-2" id="reporte">Editar</a>
        </div>
    </div>
    <div id="beforeresultado"></div>
    <div id="resultado"></div>
    <script src="/js/jquery-3.1.1.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function (){  
            $('#reporte').click(function(){
           
            $.ajax({
            url: "",
            beforeSend: function() {
            location.href = "/back/generaExcel.php";
            },
            success: function (html) {

            }
        });  
            });         
        });
    </script>
    
</body>
</html>