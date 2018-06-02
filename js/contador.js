/*--solicitudes--*/
a = $("#contador").attr("valor"); 
var cont=1;
  for (i = 1; i <= a; i ++) {          
        setTimeout (function () {
               $ ('#contador').html(cont);
               cont = cont + 1; 
         }, i * 2);            
   } 
/*--/solicitudes--*/