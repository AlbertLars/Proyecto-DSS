<?php

require_once "modelos/editorial.php";
class EditorialControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Editorial;
    }
    public function Indice(){
        require_once "vistas/inicio/principal.php";
    }

    public function Ver(){
        require_once "vistas/encabezado.php";
        require_once "vistas/editorial/index.php";
        // require_once "vistas/productos2/index.php";
        // require_once "vistas/productos3/index.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        $p=new Editorial();
        // if(isset($_GET['id'])){
        //     $p=$this->modelo->Obtener($_GET['id']);
        //     $titulo="Modificar";
        // }
        require_once "vistas/encabezado.php";
        require_once "vistas/editorial/form.php";
    }

    public function Guardar2(){
        $p=new Editorial();
        $p->setPro_id($_POST['ID_Editorial']);
        $p->setPro_nom($_POST['Nombre_Editorial']);
        $p->setPro_pais($_POST['Pais']);
        // $p->setPro_pre($_POST['Precio']);
        // $p->setPro_can($_POST['Cantidad']);
        $this->modelo->Insertar($p);

        header("location:?c=editorial&a=Ver");

    }


    public function Borrar(){
        $this->modelo->Eliminar($_GET['id']);
        header("location: ".SERVERURL."producto/Ver");
    }
  
    public function Inicio(){
        //$bd = BasedeDatos::Conectar();
        require_once "vistas/encabezado.php";
        require_once "vistas/editorial/index.php";
    }

    public function edit(){
        $titulo = "Ingresar";
        $p=new editorial();
        if(isset($_GET['id'])){
            $p=$this->modelo->have($_GET['id']);
            $titulo="Actualizar";
        }
        
        require_once "vistas/encabezado.php";
        require_once "vistas/editorial/edit.php";
    }

    public function have($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM editorial WHERE ID_Editorial=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new producto();
            $p->setPro_id($r->ID_Editorial);
            $p->setPro_nom($r->Nombre_Editorial);
            $p->setPro_pais($r->Pais);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Saveedit(){
        $p=new Editorial();
        $p->setPro_id(($_POST['ID_Editorial']));
        $p->setPro_nom($_POST['Nombre_Editorial']);
        $p->setPro_pais($_POST['Pais']);

        $this->modelo->Update($p);

        header("location:?c=editorial&a=Ver");
    }

    

}