<?php

require_once "modelos/autor.php";
class AutorControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Autor;
    }
    public function Indice(){
        require_once "vistas/inicio/principal.php";
    }

    public function Ver(){
        require_once "vistas/encabezado.php";
        require_once "vistas/autor/index.php";
        // require_once "vistas/productos2/index.php";
        // require_once "vistas/productos3/index.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        $p=new Autor();
        // if(isset($_GET['id'])){
        //     $p=$this->modelo->Obtener($_GET['id']);
        //     $titulo="Modificar";
        // }
        require_once "vistas/encabezado.php";
        require_once "vistas/autor/form.php";
    }

    public function Guardar2(){
        $p=new Autor();
        $p->setPro_id($_POST['ID_Autor']);
        $p->setPro_nom($_POST['Nombres']);
        $p->setPro_ape($_POST['Apellidos']);
        $p->setPro_nac($_POST['Nacionalidad']);
        // $p->setPro_can($_POST['Cantidad']);
        $this->modelo->Insertar($p);

        header("location:?c=autor&a=Ver");
    }


    public function Borrar(){
        $this->modelo->Eliminar($_GET['id']);
        header("location: ".SERVERURL."producto/Ver");
    }
  
    public function Inicio(){
        //$bd = BasedeDatos::Conectar();
        require_once "vistas/encabezado.php";
        require_once "vistas/autor/index.php";
    }

    public function edit(){
        $titulo = "Ingresar";
        $p=new autor();
        if(isset($_GET['id'])){
            $p=$this->modelo->have($_GET['id']);
            $titulo="Actualizar";
        }
        
        require_once "vistas/encabezado.php";
        require_once "vistas/autor/edit.php";
    }

    public function have($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM autor WHERE ID_Autor=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new producto();
            $p->setPro_id($r->ID_Autor);
            $p->setPro_nom($r->Nombres);
            $p->setPro_ape($r->Apellidos);
            $p->setPro_nac($r->Nacionalidad);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Saveedit(){
        $p=new Autor();
        $p->setPro_id($_POST['ID_Autor']);
        $p->setPro_nom($_POST['Nombres']);
        $p->setPro_ape($_POST['Apellidos']);
        $p->setPro_nac($_POST['Nacionalidad']);

        $this->modelo->Update($p);

        header("location:?c=autor&a=Ver");
    }

    

}