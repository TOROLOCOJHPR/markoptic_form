<?php 
    $title = "Únete";
    include 'mod/header.php';
?>

</head>
<body>
<?php include 'mod/menu.php';?>
    
    <!-- Titulo principal -->
    <div class="t-shadow-2-black text-white bg-cover-center text-center bg-cover-cabecera">
        <h1 class="p-5 mb-0 opacity-green">Forma parte de nuestro equipo de trabajo</h1>
    </div>
    <!-- contenido -->

    <div class="container-fluid p-0">
        <div class="row mx-0">
            <a href='/residencias' class="col-12 col-md-6 bg-cover-center aliados-block" style="height:300px;background-image:url('/img/residencias.jpg');">
                <div class="capa-pink-50 capa-transparent c-align-middle">
                        <h3>Residencias</h3>
                </div>
            </a>
            <a href='/voluntariado' class="col-12 col-md-6 bg-cover-center aliados-block" style="height:300px;background-image:url('/img/voluntariado.jpg');">
                <div class="capa-blue-50 capa-transparent c-align-middle">
                    <h3>Voluntariado</h3>
                </div>
            </a>
            <a href='/bolsa-de-trabajo' class="col-12 col-md-6 bg-cover-center aliados-block" style="height:300px;background-image:url('/img/bolsa_trabajo.jpg');">
                <div class="capa-green-50 capa-transparent c-align-middle">
                    <h3>Bolsa de Trabajo</h3>
                </div>
            </a>
            <a href='/amigos' class="col-12 col-md-6 bg-cover-center aliados-block" style="height:300px;background-image:url('/img/amigos.jpg');">
                <div class="capa-purple-50 capa-transparent c-align-middle">
                    <h3>Amigos</h3>
                </div>
            </a>
        </div>
    </div>

    <?php  include 'mod/footer.php'; ?>
    </body>
</html>