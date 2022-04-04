<?php

class Editorial{

    private $pdo;
    private $r;
    private $ID_Editorial;
    private $Nombre_Editorial;
    private $Pais;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getPro_id(): ?string{
        return $this->ID_Categoria;

    }

    public function setPro_id(string $id){
        $this->ID_Categoria=$id;
    }

    public function getPro_nom(): ?string{
        return $this->Nombre_Editorial;

    }

    public function setPro_nom(string $nom){
        $this->Nombre_Editorial=$nom;
    }

    public function getPro_pais(): ?string{
        return $this->Pais;

    }

    public function setPro_pais(string $pais){
        $this->Pais=$pais;
    }

    public function Insertar(Editorial $p){
        try{
          $consulta="INSERT INTO editorial(ID_Editorial,Nombre_Editorial,Pais) VALUES (?,?,?);";
          $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getPro_id(),
                    $p->getPro_nom(),
                    $p->getPro_pais()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
   
    public function Listaredi(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM editorial;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function generate_code($lenght=3)
    {
        $key = "";
        $pattern = "1234567890";
        $max = strlen($pattern)-1;
        do {
            for($i = 0; $i < $lenght; $i++){
                $key .= substr($pattern, mt_rand(0,$max), 1);
            }
            $complement="E";
            $complement.=$key;
            $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM editorial WHERE ID_Editorial ='$complement'");
            $consulta ->execute(array($complement));
            $rows=$consulta->fetchColumn();
        } while ($rows > 0);
        return $complement;            
    }

    public function have($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM editorial WHERE ID_Editorial=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new editorial();
            $p->setPro_id($r->ID_Editorial);
            $p->setPro_nom($r->Nombre_Editorial);
            $p->setPro_pais($r->Pais);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Update(editorial $p){
        try{
        $consulta = "UPDATE editorial SET 
           Nombre_Editorial=?,
           Pais=?
           WHERE ID_Editorial=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_nom(),
                        $p->getPro_pais(),
                        $p->getPro_id()
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
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
}

/*  



    public function Eliminar($id){
        try{
            $consulta="DELETE FROM categoria WHERE ID_Categoria=?;";
            $this->pdo->prepare($consulta)
                 ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM redes WHERE ID=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Producto();
            $p->setPro_id($r->ID);
            $p->setPro_nom($r->Nombre);
            $p->setPro_marca($r->Marca);
            $p->setPro_pre($r->Precio);
            $p->setPro_can($r->Cantidad);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Producto $p){
        try{
          $consulta="UPDATE redes SET 
          Nombre=?,
          Marca=?,
          Precio=?,
          Cantidad=? 
          WHERE ID=?; 
          ";
          $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getPro_nom(),
                    $p->getPro_marca(),
                    $p->getPro_pre(),
                    $p->getPro_can(),
                    $p->getPro_id()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    } */