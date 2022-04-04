<div class="row mx-5 mt-5">
    <div class="col ml-5">
        <div class="container-xxl"></div>
        <h3 class="text-center" style="color:#000">Editoriales</h3>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-flat" href="?c=editorial&a=FormCrear">Insertar
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
</svg>
                <i class="fa fa-lg fa-plus"></i></a>
        </div>
    </div>
</div>
<div class="row mx-5 mt-5">
    <div class="col ml-5">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Pais</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->modelo->Listaredi() as $r):?>
                <tr>
                    <td><?=$r->ID_Editorial?></td>
                    <td><?=$r->Nombre_Editorial?></td>
                    <td><?=$r->Pais?></td>
                    <td>
                        <a class="btn btn-light btn-flat" href="?c=editorial&a=edit&id=<?=$r->ID_Editorial?>">Editar
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg>
                            <i class="fa fa-lg fa-refresh"></i></a>
                    </td>
                </tr>
                <?php endforeach;?>
                <tr>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>