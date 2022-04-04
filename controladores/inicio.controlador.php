<?php

require_once "modelos/categoria.php";
require_once "modelos/editorial.php";
require_once "modelos/autor.php";
require_once "modelos/libro.php";

class InicioControlador{
    private $modelo;

    public function __CONSTRUCT(){
       $this->modelo=new Categoria();
       $this->modelo=new Editorial();
       $this->modelo=new Autor();
       $this->modelo=new Libro();
    }

    public function Inicio(){
        //$bd = BasedeDatos::Conectar();
        require_once "Inicio.php";

    }
    
}