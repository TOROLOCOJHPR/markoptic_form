(() => {
    let i = 0;
    let lockslide = false;
    let tarjetero = document.getElementById('tarjetas');
    
    const tarjetas = document.querySelectorAll('.tarjeta');
    function hideDisplay (e) {
        if (e.propertyName !== 'opacity') return;
        this.style.zIndex = -1;
        this.style.display = 'none';
        if (this.nextElementSibling !== null && this.nextElementSibling.style.display === 'block')this.nextElementSibling.style.zIndex = 1;
        if (this.previousElementSibling !== null && this.previousElementSibling.style.display === 'block')this.previousElementSibling.style.zIndex = 1;
        if (this.nextElementSibling === null &&  this.previousElementSibling.style.display === 'none' )this.parentElement.children[0].style.zIndex = 1;
        if (this.previousElementSibling === null && this.nextElementSibling.style.display === 'none')this.parentElement.children[ this.parentElement.children.length - 1 ].style.zIndex = 1;
        setTimeout(function(){ lockslide = false; }, 200);
    }
    
    tarjetas.forEach(tarjeta => tarjeta.addEventListener('transitionend', hideDisplay));
    
    function nextTarjeta () {
        if (lockslide)return;
        lockslide = true;
        if (tarjetero.children[i].nextElementSibling !== null) {
            tarjetero.children[i].nextElementSibling.style.opacity = 1;
            tarjetero.children[i].nextElementSibling.style.display = 'block';
            tarjetero.children[i].style.opacity = 0;
            i++;
        } else {
            tarjetero.children[0].style.display = 'block';
            tarjetero.children[0].style.opacity = 1;
            tarjetero.children[i].style.opacity = 0;
            i = 0;
        }
    }
    
    function backTarjeta () {
        if (lockslide)return;
        lockslide = true;
        if (tarjetero.children[i].previousElementSibling !== null) {
            tarjetero.children[i].previousElementSibling.style.display = 'block';
            tarjetero.children[i].previousElementSibling.style.opacity = 1;
            tarjetero.children[i].style.opacity = 0;
            i--;
        } else {
            tarjetero.children[ tarjetero.children.length - 1 ].style.display = 'block';
            tarjetero.children[ tarjetero.children.length - 1 ].style.opacity = 1;
            tarjetero.children[i].style.opacity = 0;
            i = tarjetero.children.length - 1;
        }        
    }
    
    document.getElementById('btn-next').addEventListener('click',nextTarjeta);
    document.getElementById('btn-back').addEventListener('click',backTarjeta);
    
    if (tarjetas.length > 1) {
        setInterval(nextTarjeta, 5000);
        document.getElementById('controles-tarjetero').style.display = 'block'; 
    } 
})();
