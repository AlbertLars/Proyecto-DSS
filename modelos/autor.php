<?php

class Autor{

    private $pdo;
    private $r;
    private $ID_Autor;
    private $Nombres;
    private $Apellidos;
    private $Nacionalidad;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getPro_id(): ?string{
        return $this->ID_Autor;

    }

    public function setPro_id(string $id){
        $this->ID_Autor=$id;
    }

    public function getPro_nom(): ?string{
        return $this->Nombres;

    }

    public function setPro_nom(string $nom){
        $this->Nombres=$nom;
    }

    public function getPro_ape(): ?string{
        return $this->Apellidos;

    }

    public function setPro_ape(string $ape){
        $this->Apellidos=$ape;
    }

    public function getPro_nac(): ?string{
        return $this->Nacionalidad;

    }

    public function setPro_nac(string $pais){
        $this->Nacionalidad=$pais;
    }

    public function Insertar(Autor $p){
        try{
          $consulta="INSERT INTO autor(ID_Autor,Nombres,Apellidos,Nacionalidad) VALUES (?,?,?,?);";
          $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getPro_id(),
                    $p->getPro_nom(),
                    $p->getPro_ape(),
                    $p->getPro_nac()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
   
    public function Listaraut(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM autor;");
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
            $complement="A";
            $complement.=$key;
            $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM autor WHERE ID_Autor ='$complement'");
            $consulta ->execute(array($complement));
            $rows=$consulta->fetchColumn();
        } while ($rows > 0);
        return $complement;            
    }

    public function have($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM autor WHERE ID_Autor=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new autor();
            $p->setPro_id($r->ID_Autor);
            $p->setPro_nom($r->Nombres);
            $p->setPro_ape($r->Apellidos);
            $p->setPro_nac($r->Nacionalidad);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Update(autor $p){
        try{
        $consulta = "UPDATE autor SET 
           Nombres=?,
           Apellidos=?,
           Nacionalidad=?
           WHERE ID_Autor=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_nom(),
                        $p->getPro_ape(),
                        $p->getPro_nac(),
                        $p->getPro_id()
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta="DELETE FROM autor WHERE ID_Autor=?;";
            $this->pdo->prepare($consulta)
                 ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
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
}


    /* public function Obtener($id){
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