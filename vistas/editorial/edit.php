<div class="d-flex justify-content-center">
    <div class="col-md-4 my-5">
        <form class="formulario" method="POST" action="?c=editorial&a=Saveedit">
            <legend style="color:#084594" class="text-center"></legend>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">ID Editorial</label>
                <input type="name" class="form-control" name="ID_Editorial" value="<?=$p->getPro_id()?>" readonly>
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">Nombre</label>
                <input type="name" class="form-control" name="Nombre_Editorial" value="<?=$p->getPro_nom()?>">
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">Pais</label>
                <input type="name" class="form-control" name="Pais" value="<?=$p->getPro_pais()?>">
            </div>
            <div class="d-flex justify-content-center">
                <div class="my-2">
                    <input type="submit" class="btn btn-success" ></input>
                </div>
        </form>
    </div>