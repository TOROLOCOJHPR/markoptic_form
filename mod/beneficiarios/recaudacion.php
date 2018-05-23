<?php 
    $recabado = $objBen->recabado($id);   
    $precioProtesis = $result['precio']; 
    //if($recabado == 0){ $por = 0; }else{ $por = (($recabado / $precioProtesis)*100); }
    $por = ($recabado == 0)? 0 : (($recabado / $precioProtesis)*100);
    //if($por > 100){ $por = 100; }
    $por = ($por > 100)? 100 : $por;
    $porciento = number_format($por,2);
    //porcentaje del circulo
    // $dashoffset =(628/100)*(100 - $porciento);
?>
    <!-- información del porcentaje recaudado -->
        <strong class="align-self-end pt-2">porcentaje de racaudación</strong>
        <div class="row mx-0 w-100 align-self-end">
            <div id="porciento" class="col-2 text-center d-flex align-items-center justify-content-center">0.00%</div>
            <div class=" col px-0 progress rounded-0 rounded-left" style="height:38px">
                <div id="progress" class="progress-bar progress-bar-striped" role="progressbar" style="width:0%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
            </div>    
            <div class="">
                <button class="btn bg-verde-menu text-white">Apadrinar</button>                            
            </div>
        </div>
    <script>
        porcentaje();
        function porcentaje(){
            http_request = (window.XMLHttpRequest)? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP'); 
            http_request.open('POST','/back/ajax.php', true);
            let data = new FormData();
            let progress = document.getElementById('progress');
            let porciento = document.getElementById('porciento');
            data.append('formulario', 'recaudacion');
            data.append('id', get('b'));
            http_request.overrideMimeType('text/plain');
            http_request.onreadystatechange = function(){
                if (http_request.readyState == 4) {//el servidor respondio
                    let bio = document.getElementById('bio');
                    if (http_request.status == 200) {//el cliente termino
                        // console.log(http_request.responseText);
                        let result = JSON.parse(http_request.responseText);
                        // bio.innerHTML = result.por;
                        progress.style.width = result.por + "%";
                        porciento.innerHTML = result.porciento + "%";
                    } else {//ocurrio un error en el cliente
                        alert('Hubo problemas con la petición.');
                    }
                }
            }
            http_request.send(data);
        }
            //funcion para obtener valores get por url
            function get(name) {
                name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
                return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
            }
        // });                
    </script>