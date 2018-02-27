<form action="" method="post" class="">
    <div class="form-row">
        <div class="form-group col-12">
            <label>Introduce el número de folio</label>
        </div>
        <div class="form-group col-md-6">   
            <input type="text" name="lista" value="<?php if( isset($_POST['lista']) ){ echo $_POST['lista']; }elseif( isset($_GET['f']) ){ echo $_GET['f']; } ?>" class="form-control" placeholder="introduce el numero del folio">
            <input type="submit" class="btn bg-verde-menu text-white mt-2" value="consultar">
        </div>
    </div>
</form>