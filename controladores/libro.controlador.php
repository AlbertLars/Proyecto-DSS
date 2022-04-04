<?php

require_once "modelos/libro.php";
class LibroControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Libro;
    }
    public function Indice(){
        require_once "vistas/inicio/principal.php";
    }

    public function Ver(){
        require_once "vistas/encabezado.php";
        require_once "vistas/libro/index.php";
        // require_once "vistas/productos2/index.php";
        // require_once "vistas/productos3/index.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        $p=new Libro();
        // if(isset($_GET['id'])){
        //     $p=$this->modelo->Obtener($_GET['id']);
        //     $titulo="Modificar";
        // }
        require_once "vistas/encabezado.php";
        require_once "vistas/libro/form.php";
    }

    public function Guardar2(){
        $p=new Libro();
        $p->setPro_id($_POST['ID_Libro']);
        $p->setPro_title($_POST['Titulo']);
        $p->setPro_isbn($_POST['ISBN']);
        $p->setPro_des($_POST['Descripcion']);
        $p->setPro_res($_POST['Resumen']);
        $p->setPro_ejem($_POST['Ejemplares']);
        $p->setPro_anio($_POST['Ano_edicion']);
        $p->setPro_idca($_POST['ID_Categoria']);
        $p->setPro_idedi($_POST['ID_Editorial']);
        $p->setPro_idaut($_POST['ID_Autor']);
        $this->modelo->Insertar($p);

        header("location:?c=libro&a=Ver");
    }


    public function Borrar(){
        $this->modelo->Eliminar($_GET['id']);
        header("location: ".SERVERURL."producto/Ver");
    }
  
    public function Inicio(){
        //$bd = BasedeDatos::Conectar();
        require_once "vistas/encabezado.php";
        require_once "vistas/libro/index.php";
    }

    public function edit(){
        $titulo = "Ingresar";
        $p=new Libro();
        if(isset($_GET['id'])){
            $p=$this->modelo->have($_GET['id']);
            $titulo="Actualizar";
        }
        
        require_once "vistas/encabezado.php";
        require_once "vistas/libro/edit.php";
    }

    public function have($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Libro WHERE ID_Libro=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new producto();
            $p->setPro_id($r->ID_Libro);
            $p->setPro_nom($r->Nombres);
            $p->setPro_ape($r->Apellidos);
            $p->setPro_nac($r->Nacionalidad);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Saveedit(){
        $p=new Libro();
        $p->setPro_id($_POST['ID_Libro']);
        $p->setPro_title($_POST['Titulo']);
        $p->setPro_isbn($_POST['ISBN']);
        $p->setPro_des($_POST['Descripcion']);
        $p->setPro_res($_POST['Resumen']);
        $p->setPro_ejem($_POST['Ejemplares']);
        $p->setPro_anio($_POST['Ano_edicion']);
        $p->setPro_idca($_POST['ID_Categoria']);
        $p->setPro_idedi($_POST['ID_Editorial']);
        $p->setPro_idaut($_POST['ID_Autor']);

        $this->modelo->Update($p);

        header("location:?c=libro&a=Ver");
    }

    

}