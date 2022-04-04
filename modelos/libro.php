<?php

class Libro{

    private $pdo;
    private $r;
    private $ID_Libro;
    private $Titulo;
    private $ISBN;
    private $Descripcion;
    private $Resumen;
    private $Ejemplares;
    private $Ano_edicion;
    private $ID_Categoria;
    private $ID_Editorial;
    private $ID_Autor;
    private $Nombre_Categoria;
    private $Nombre_Editorial;
    private $Nombres;
    private $Apellidos;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getPro_id(): ?string{
        return $this->ID_Libro;
    }

    public function setPro_id(string $id){
        $this->ID_Libro=$id;
    }

    public function getPro_idca(): ?string{
        return $this->ID_Categoria;

    }

    public function setPro_idca(string $idca){
        $this->ID_Categoria=$idca;
    }
    
    public function getPro_idedi(): ?string{
        return $this->ID_Editorial;
    }

    public function setPro_idedi(string $idedi){
        $this->ID_Editorial=$idedi;
    }
    
    public function getPro_idaut(): ?string{
        return $this->ID_Autor;
    }

    public function setPro_idaut(string $idaut){
        $this->ID_Autor=$idaut;
    }
    
     public function getPro_nomca(): ?string{
        return $this->Nombre_Categoria;

    }

    public function setPro_nomca(string $ca){
        $this->Nombre_Categoria=$ca;
    }
    
    public function getPro_nomedi(): ?string{
        return $this->Nombre_Editorial;
    }

    public function setPro_nomedi(string $edi){
        $this->Nombre_Editorial=$edi;
    }
    
    public function getPro_nomaut(): ?string{
        return $this->Nombres;
    }

    public function setPro_nomaut(string $nomaut){
        $this->Nombres=$nomaut;
    }

    public function getPro_apaut(): ?string{
        return $this->Apellidos;
    }

    public function setPro_apaut(string $apaut){
        $this->Apellidos=$apaut;
    }
    
    public function getPro_title(): ?string{
        return $this->Titulo;

    }

    public function setPro_title(string $title){
        $this->Titulo=$title;
    }

    public function getPro_isbn(): ?string{
        return $this->ISBN;

    }

    public function setPro_isbn(string $isbn){
        $this->ISBN=$isbn;
    }

    public function getPro_des(): ?string{
        return $this->Descripcion;

    }

    public function setPro_des(string $des){
        $this->Descripcion=$des;
    }

    public function getPro_res(): ?string{
        return $this->Resumen;

    }

    public function setPro_res(string $res){
        $this->Resumen=$res;
    }

    public function getPro_ejem(): ?string{
        return $this->Ejemplares;

    }

    public function setPro_ejem(string $ejem){
        $this->Ejemplares=$ejem;
    }

    public function getPro_anio(): ?string{
        return $this->Ano_edicion;

    }

    public function setPro_anio(string $anio){
        $this->Ano_edicion=$anio;
    }

    public function Insertar(Libro $p) {
        try{
            $consulta= "INSERT INTO libro (ID_Libro, Titulo, ISBN, Descripcion, Resumen, Ejemplares, Ano_edicion, ID_Categoria, ID_Editorial, ID_Autor) VALUES (?,?,?,?,?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getPro_id(),
                    $p->getPro_title(),
                    $p->getPro_isbn(),
                    $p->getPro_des(),
                    $p->getPro_res(),
                    $p->getPro_ejem(),
                    $p->getPro_anio(),
                    $p->getPro_idca(),
                    $p->getPro_idedi(),
                    $p->getPro_idaut()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
   
    public function Listarbook(){
        try{
            $consulta=$this->pdo->prepare("SELECT libro.ID_Libro,libro.Titulo,libro.ISBN,libro.Descripcion,libro.Resumen,libro.Ejemplares,libro.Ano_edicion,categoria.Nombre_Categoria,editorial.Nombre_Editorial,autor.Nombres,autor.Apellidos FROM libro,categoria,editorial,autor WHERE libro.ID_Autor = autor.ID_Autor AND libro.ID_Categoria = categoria.ID_Categoria AND libro.ID_Editorial = editorial.ID_Editorial;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showLibro(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM libro;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function showcat(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM categoria;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function showaut(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM autor;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showedi(){
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
            $complement="L";
            $complement.=$key;
            $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM libro WHERE ID_Libro ='$complement'");
            $consulta ->execute(array($complement));
            $rows=$consulta->fetchColumn();
        } while ($rows > 0);
        return $complement;            
    }

    public function have($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM libro WHERE ID_Libro=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new libro();
            $p->setPro_id($r->ID_Libro);
            $p->setPro_title($r->Titulo);
            $p->setPro_isbn($r->ISBN);
            $p->setPro_des($r->Descripcion);
            $p->setPro_res($r->Resumen);
            $p->setPro_ejem($r->Ejemplares);
            $p->setPro_anio($r->Ano_edicion);
            $p->setPro_idca($r->ID_Categoria);
            $p->setPro_idedi($r->ID_Editorial);
            $p->setPro_idaut($r->ID_Autor);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Update(libro $p){
        try{
        $consulta = "UPDATE libro SET 
           Titulo=?,
           ISBN=?,
           Descripcion=?,
           Resumen=?,
           Ejemplares=?,
           Ano_edicion=?,
           ID_Categoria=?,
           ID_Editorial=?,
           ID_Autor=?
           WHERE ID_Libro=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_title(),
                        $p->getPro_isbn(),
                        $p->getPro_des(),
                        $p->getPro_res(),
                        $p->getPro_ejem(),
                        $p->getPro_anio(),
                        $p->getPro_idca(),
                        $p->getPro_idedi(),
                        $p->getPro_idaut(),
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