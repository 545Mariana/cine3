<?php
//echo "<br> Estoy en Alimentos";
abstract class IAlimento{
    private $imagen;
    private $id;
    private $precio;
    private $nombre;

    abstract public function getImagen();
    abstract public function getId();
    abstract public function getPrecio();
    abstract public function getNombre();
}