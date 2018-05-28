<!-- Titulo principal -->
<div class="t-shadow-2-black text-white bg-cover-center bg-cover-cabecera text-center">
    <div class="w-100 h-100 c-align-middle opacity-green">
        <cms:if titulo = "" >
            <h1><cms:show vari /></h1>
        <cms:else/>
            <h1><cms:show titulo /></h1>
        </cms:if>        
    </div>
</div>