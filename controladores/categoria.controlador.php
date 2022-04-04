<?php

require_once "modelos/categoria.php";
class CategoriaControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Categoria;
    }
    public function Indice(){
        require_once "vistas/inicio/principal.php";
    }

    public function Ver(){
        require_once "vistas/encabezado.php";
        require_once "vistas/categoria/index.php";
        // require_once "vistas/Categorias2/index.php";
        // require_once "vistas/Categorias3/index.php";
    }

    public function FormCrear2(){
        $titulo="Registrar";
        $p=new Categoria();
        // if(isset($_GET['id'])){
        //     $p=$this->modelo->Obtener($_GET['id']);
        //     $titulo="Modificar";
        // }
        require_once "vistas/encabezado.php";
        require_once "vistas/categoria/form.php";
    }

    public function Guardar2(){
        $p=new Categoria();
        $p->setPro_id($_POST['ID_Categoria']);
        $p->setPro_nom($_POST['Nombre_Categoria']);
        // $p->setPro_marca($_POST['Marca']);
        // $p->setPro_pre($_POST['Precio']);
        // $p->setPro_can($_POST['Cantidad']);
        $this->modelo->Insertar($p);

        header("location: ?c=categoria&a=Ver");

    }


    public function Borrar(){
        $this->modelo->Eliminar($_GET['id']);
        header("location: ".SERVERURL."categoria/Ver");
    }
  
    public function Inicio(){
        //$bd = BasedeDatos::Conectar();
        require_once "vistas/encabezado.php";
        require_once "vistas/categoria/index.php";
    }

    public function edit(){
        $titulo = "Ingresar";
        $p=new Categoria();
        if(isset($_GET['id'])){
            $p=$this->modelo->have($_GET['id']);
            $titulo="Actualizar";
        }
        
        require_once "vistas/encabezado.php";
        require_once "vistas/categoria/edit.php";
    }

    public function have($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM categoria WHERE ID_Categoria=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new Categoria();
            $p->setPro_id($r->ID_Categoria);
            $p->setPro_nom($r->Nombre_Categoria);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Saveedit(){
        $p=new Categoria();
        $p->setPro_id(($_POST['ID_Categoria']));
        $p->setPro_nom($_POST['Nombre_Categoria']);

        $this->modelo->Update($p);

        header("location:?c=categoria&a=ver");
    }

    

}