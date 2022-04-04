<?php
    $ID_Libro=$_GET["id"];
?>
<div class="d-flex justify-content-center">
    <div class="col-md-4 my-5">
        <form class="formulario" method="POST" action="?c=libro&a=Saveedit">
            <legend style="color:#084594" class="text-center"></legend>
            <?php 
            foreach($this->modelo->showLibro() as $row)
            if($row->ID_Libro==$ID_Libro)
            {
                {
            ?>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">ID Libro</label>
                <input type="name" class="form-control" name="ID_Libro" value="<?=$p->getPro_id()?>" readonly>
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">Titulo</label>
                <input type="name" class="form-control" name="Titulo" value="<?=$p->getPro_title()?>">
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">ISBN</label>
                <input type="name" class="form-control" name="ISBN" value="<?=$p->getPro_isbn()?>">
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                <input type="name" class="form-control" name="Descripcion" value="<?=$p->getPro_des()?>">
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">Resumen</label>
                <input type="name" class="form-control" name="Resumen" value="<?=$p->getPro_res()?>">
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">Ejemplares</label>
                <input type="name" class="form-control" name="Ejemplares" value="<?=$p->getPro_ejem()?>">
            </div>
            <div class="mb-3" style="color:#084594">
                <label for="exampleInputPassword1" class="form-label">Año</label>
                <input type="name" class="form-control" name="Ano_edicion" value="<?=$p->getPro_anio()?>">
            </div>
            <div class="form-floating">
                <label for="exampleInputPassword1" class="form-label">Categorias</label>
                <select class="form-select" name="ID_Categoria" id="floatingSelect"
                    aria-label="Floating label select example">
                    <?php
							foreach($this->modelo->showcat() as $r)
							{
							?>


                    <?php if($row->ID_Categoria==$r->ID_Categoria)
							{
								?>
                    <option selected value="<?=$row->ID_Categoria?>"><?=$r->Nombre_Categoria?></option>
                    <?php
							} 
							else
							{
								?>
                    <option value="<?=$r->ID_Categoria?>"><?=$r->Nombre_Categoria?></option>
                    <?php
							}
							?>
                    <?php
						}
                        ?>
                </select>
            </div>
            <div class="form-floating">
                <label for="exampleInputPassword1" class="form-label">editorial</label>
                <select class="form-select" name="ID_Editorial" id="floatingSelect"
                    aria-label="Floating label select example">
                    <?php
							foreach($this->modelo->showedi() as $r)
							{
							?>


                    <?php if($row->ID_Editorial==$r->ID_Editorial)
							{
								?>
                    <option selected value="<?=$row->ID_Editorial?>"><?=$r->Nombre_Editorial?></option>
                    <?php
							} 
							else
							{
								?>
                    <option value="<?=$r->ID_Editorial?>"><?=$r->Nombre_Editorial?></option>
                    <?php
							}
							?>
                    <?php
						}
                        ?>
                </select>
            </div>
            <div class="form-floating">
                <label for="exampleInputPassword1" class="form-label">Autor</label>
                <select class="form-select" name="ID_Autor" id="floatingSelect"
                    aria-label="Floating label select example">
                    <?php
							foreach($this->modelo->showaut() as $r)
							{
							?>


                    <?php if($row->ID_Autor==$r->ID_Autor)
							{
								?>
                    <option selected value="<?=$row->ID_Autor?>"><?=$r->Nombres?> <?=$r->Apellidos?></option>
                    <?php
							} 
							else
							{
								?>
                    <option value="<?=$r->ID_Autor?>"><?=$r->Nombres?> <?=$r->Apellidos?></option>
                    <?php
							}
							?>
                    <?php
						}
                        ?>
                </select>
            </div>

            <div class="d-flex justify-content-center" >
                <div class="my-2">
                    <input type="submit"class="btn btn-success" ></input>
                </div>
            </div>
            <?php }}?>
        </form>
    </div>
</div>