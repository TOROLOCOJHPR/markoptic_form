<?php
    $title = "Solicita tu Donación";
    include 'mod/header.php';
?>

</head>
<body>
<?php include 'mod/menu.php';?>
    <!-- Titulo principal -->
    <section class="t-shadow-2-black text-white bg-cover-center bg-cover-cabecera">
        <h1 class="opacity-green p-5">¿Cómo te podemos ayudar?</h1>  
    </section>

    <div class="container-fluid p-0 text-center text-white" id="tarjetas">
        <div class="row mb-4 mx-0">
            <div class="col-sm-4 mx-auto mt-2 col-12 ">
                <a href="/formulario?dispositivo=brazo" class='tarjetas'>
                    <div class="card" >
                        <div class="c-img bg-primary">
                            <img class=" img-cover-center w-100 h-100" src="/img/form/dos-protesis.jpg" alt="Prótesis robótica">
                        </div>
                        <h4 class="text-center c-text bg-verde-menu d-flex c-align-middle mb-0">Prótesis</h4>
                    </div>
                </a>
            </div>
            <!-- dispositivo -->
            <div class="col-sm-4 mx-auto mt-2 col-12">
                <a href="/formulario?dispositivo=colchon" class='tarjetas'>
                    <div class="card">
                        <div class=" c-img bg-success">
                            <img class=" img-cover-center w-100 h-100" src="/img/form/proy-colchon.jpg" alt="Colchon antiescaras">
                        </div>
                        <h4 class="text-center c-text bg-verde-menu d-flex c-align-middle mb-0">Colchón</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>    
    <?php include 'mod/footer.php'; ?>
    </body>
</html>