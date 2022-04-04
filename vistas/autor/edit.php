<div class="d-flex justify-content-center">
    <div class="col-md-4 formulario my-3">
        <form class="form-horizontal" method="POST" action="?c=autor&a=Saveedit">
            <fieldset>
        <legend style="color:#084594" class="text-center"></legend>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">ID Autor</label>
                <input type="name" class="form-control" name="ID_Autor" value="<?=$p->getPro_id()?>" readonly>
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">Nombres</label>
                <input type="name" class="form-control" name="Nombres" value="<?=$p->getPro_nom()?>">
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">Apellidos</label>
                <input type="name" class="form-control" name="Apellidos" value="<?=$p->getPro_ape()?>">
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">Nacionalidad</label>
                <input type="name" class="form-control" name="Nacionalidad" value="<?=$p->getPro_nac()?>">
            </div>
            <div class="d-flex justify-content-center">
                <div class="my-2">
                    <input type="submit" class="btn btn-success" ></input>
                </div>
        </fieldset>
        </form>
        </div>
</div>

</div>
</div>
</div>
</div>
</div>
