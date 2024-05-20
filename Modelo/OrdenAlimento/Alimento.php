<?php
//echo "<br> Estoy en Alimentos";
include_once ("IAlimento.php");
class Alimento extends IAlimento{
    private $imagen;
    private $id;
    private $precio;
    private $nombre;

    public function __construct($id, $nombre, $precio, $imagen) {
        $this->precio = $precio;
        $this->nombre=$nombre;
        $this->imagen=$imagen;
        $this->id=$id;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function getId(){
        return $this->id;
    }
    public function getPrecio(){
        return $this->precio;
    }

    public function getNombre(){
        return $this->nombre;
    }
}