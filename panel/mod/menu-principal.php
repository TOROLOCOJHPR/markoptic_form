<header id="menu" class="row mx-0 text-center p-1 p-md-2 fixed-top bg-white">
    
    <!-- regresar -->
    <div class="col-auto px-1 px-md-2 border-right" <?php if($requireBack == 0 )echo "style='display:none'" ?> >

        <a class="text-dark lead w-100 h-100 d-flex align-items-center" href="/panel/panel">
            <svg viewBox="0 0 492 492" class="mt-2" style="height:1.5rem">
		        <path d="M464.344,207.418l0.768,0.168H135.888l103.496-103.724c5.068-5.064,7.848-11.924,7.848-19.124    c0-7.2-2.78-14.012-7.848-19.088L223.28,49.538c-5.064-5.064-11.812-7.864-19.008-7.864c-7.2,0-13.952,2.78-19.016,7.844    L7.844,226.914C2.76,231.998-0.02,238.77,0,245.974c-0.02,7.244,2.76,14.02,7.844,19.096l177.412,177.412    c5.064,5.06,11.812,7.844,19.016,7.844c7.196,0,13.944-2.788,19.008-7.844l16.104-16.112c5.068-5.056,7.848-11.808,7.848-19.008    c0-7.196-2.78-13.592-7.848-18.652L134.72,284.406h329.992c14.828,0,27.288-12.78,27.288-27.6v-22.788    C492,219.198,479.172,207.418,464.344,207.418z"></path>
            </svg>
            <span class="d-none d-md-block ml-2">
                regresar
            </span>
        </a>
    
    </div><!-- regresar -->

    <!-- titulo -->
    <div class="col px-1 px-md-2">
        <span class="fs-1-5"><?php echo $title ?></span>
    </div><!-- titulo -->
    
    <!-- nombre usuario -->
    <div class="col-auto px-2 border-right border-left d-flex align-items-center">
        <p class="lead m-0"><?php echo $_SESSION[USUARIO]; ?></p>
    </div><!-- nombre usuario -->

    <!-- cerrar sesión -->
    <div class="col-auto px-1 px-md-2 ">

        <a class="text-dark lead w-100 h-100 d-flex align-items-center" href="/panel/inc/cerrarSesion">
            <span class="d-none d-md-inline-block">Cerrar Sesión</span>
            <svg style="height:1.5rem" class="ml-md-2" viewBox="0 0 512 512">
                <path fill="currentColor" d="M400 54.1c63 45 104 118.6 104 201.9 0 136.8-110.8 247.7-247.5 248C120 504.3 8.2 393 8 256.4 7.9 173.1 48.9 99.3 111.8 54.2c11.7-8.3 28-4.8 35 7.7L162.6 90c5.9 10.5 3.1 23.8-6.6 31-41.5 30.8-68 79.6-68 134.9-.1 92.3 74.5 168.1 168 168.1 91.6 0 168.6-74.2 168-169.1-.3-51.8-24.7-101.8-68.1-134-9.7-7.2-12.4-20.5-6.5-30.9l15.8-28.1c7-12.4 23.2-16.1 34.8-7.8zM296 264V24c0-13.3-10.7-24-24-24h-32c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24z"></path>
            </svg>
        </a>
   
    </div><!-- cerrar sesión -->

</header>