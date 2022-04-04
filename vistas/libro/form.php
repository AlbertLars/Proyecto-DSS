<div class="d-flex justify-content-center">
    <div class="col-md-4 formulario my-3">
        <form class="form-horizontal" method="POST" action="?c=libro&a=Guardar2">
            <fieldset>
                <legend style="color:#000" class="text-center"><?=$titulo?>Libros</legend>
                <!-- <div class="form-group">
                    <div class="col-lg-10">
                        <input class="form-control" name="ID" type="hidden" value="<?=$p->getPro_id()?>">
                    </div>
                </div> -->
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">ID Libro</label>
                    <input type="name" class="form-control" name="ID_Libro" value="<?=$this->modelo->generate_code();?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label style="color:#000000" class="col-lg-2 control-label mt-2" for="Nombres">Titulo</label>
                    <div class="col-lg-10">
                        <input pattern="^(([a-zA-Záéíóúñ0-9.-]+)[ ]?([a-zA-Záéíóúñ0-9.-]+)?)+$" required
                            class="form-control" name="Titulo" type="text" placeholder="Titulo" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="color:#000000" class="col-lg-2 control-label mt-2" for="Nombre">ISBN</label>
                    <div class="col-lg-10">
                        <input
                            pattern="^(?:ISBN(?:-1[03])?:? )?(?=[0-9X]{10}$|(?=(?:[0-9]+[- ]){3})[- 0-9X]{13}$|97[89][0-9]{10}$|(?=(?:[0-9]+[- ]){4})[- 0-9]{17}$)(?:97[89][- ]?)?[0-9]{1,5}[- ]?[0-9]+[- ]?[0-9]+[- ]?[0-9X]$"
                            required class="form-control" name="ISBN" type="text" placeholder="000-00-0000-0" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="color:#000000" class="col-lg-2 control-label mt-2" for="Nombre">Descripcion</label>
                    <div class="col-lg-10">
                        <input pattern="^(([a-zA-Záéíóúñ0-9.-]+)[ ]?([a-zA-Záéíóúñ0-9.-]+)?)+$" required
                            class="form-control" name="Descripcion" type="text" placeholder="Descripcion" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="color:#000000" class="col-lg-2 control-label mt-2" for="Nombre">Resumen</label>
                    <div class="col-lg-10">
                        <input pattern="^(([a-zA-Záéíóúñ0-9.-]+)[ ]?([a-zA-Záéíóúñ0-9.-]+)?)+$" required
                            class="form-control" name="Resumen" type="text" placeholder="Resumen" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="color:#000000" class="col-lg-2 control-label mt-2" for="Nombre">Ejemplares</label>
                    <div class="col-lg-10">
                        <input pattern="^(([a-zA-Záéíóúñ0-9.-]+)[ ]?([a-zA-Záéíóúñ0-9.-]+)?)+$" required
                            class="form-control" name="Ejemplares" type="text" placeholder="Ejemplares" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label style="color:#" class="col-lg-2 control-label mt-2" for="Nombre">Año</label>
                    <div class="col-lg-10">
                        <input pattern="^(([0-9.-]+)[ ]?([0-9.-]+)?([0-9.-]+)?([0-9.-]+)?)+$" required
                            class="form-control" name="Ano_edicion" type="text" placeholder="Ano_edicion" value="">
                    </div>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Categoria</label>
                    <div class="form-floating">
                        <select class="form-select" name="ID_Categoria" id="floatingSelect"
                            aria-label="Floating label select example">
                            <?php foreach($this->modelo->showcat() as $r):?>
                            <option value="<?=$r->ID_Categoria?>"><?=$r->Nombre_Categoria?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Editorial</label>
                    <div class="form-floating">
                        <select class="form-select" name="ID_Editorial" id="floatingSelect"
                            aria-label="Floating label select example">
                            <?php foreach($this->modelo->showedi() as $t):?>
                            <option value="<?=$t->ID_Editorial?>"><?=$t->Nombre_Editorial?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Autor</label>
                    <div class="form-floating">
                        <select class="form-select" name="ID_Autor" id="floatingSelect"
                            aria-label="Floating label select example">
                            <?php foreach($this->modelo->showaut() as $p):?>
                            <option value="<?=$p->ID_Autor?>"><?=$p->Nombres?> <?=$p->Apellidos?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="mt-5 mx-5 pb-2">
                    <button class="btn btn-danger" type="reset">Cancelar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-x" viewBox="0 0 16 16">
  <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
  <path d="M8 8.293 6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293Z"/>
</svg></button>
                    <button class="btn btn-success" type="submit">Enviar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"/>
  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
</svg></button>
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