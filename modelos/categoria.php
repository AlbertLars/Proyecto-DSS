<?php

class Categoria{

    private $pdo;
    private $r;
    private $ID_Categoria;
    private $Nombre_Categoria;

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
        return $this->Nombre_Categoria;

    }

    public function setPro_nom(string $nom){
        $this->Nombre_Categoria=$nom;
    }

    public function Insertar(Categoria $p){
        try{
          $consulta="INSERT INTO categoria(ID_Categoria,Nombre_Categoria) VALUES (?,?);";
          $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getPro_id(),
                    $p->getPro_nom()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM redes WHERE ID=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Categoria();
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

    public function Actualizar(Categoria $p){
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
    }
   
    public function Listarca(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM categoria;");
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
            $complement="C";
            $complement.=$key;
            $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM categoria WHERE ID_Categoria ='$complement'");
            $consulta ->execute(array($complement));
            $rows=$consulta->fetchColumn();
        } while ($rows > 0);
        return $complement;            
    }

    public function have($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM categoria WHERE ID_Categoria=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new categoria();
            $p->setPro_id($r->ID_Categoria);
            $p->setPro_nom($r->Nombre_Categoria);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Update(categoria $p){
        try{
        $consulta = "UPDATE categoria SET 
           Nombre_Categoria=?
           WHERE ID_Categoria=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_nom(),
                        $p->getPro_id()
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta="DELETE FROM categoria WHERE ID_Categoria=?;";
            $this->pdo->prepare($consulta)
                 ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}