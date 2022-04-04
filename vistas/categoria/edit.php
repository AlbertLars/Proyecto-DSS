<div class="d-flex justify-content-center">
    <div class="col-md-4 my-5">
        <form class="formulario" method="POST" action="?c=categoria&a=Saveedit">
            <legend style="color:#084594" class="text-center"></legend>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">ID Familia</label>
                <input type="name" class="form-control" name="ID_Categoria" value="<?=$p->getPro_id()?>" readonly>
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">Familia</label>
                <input type="name" class="form-control" name="Nombre_Categoria" value="<?=$p->getPro_nom()?>">
            </div>
            <div class="d-flex justify-content-center">
                <div class="my-2">
                    <input type="submit" class="btn btn-success" ></input>
                </div>
        </form>
    </div>