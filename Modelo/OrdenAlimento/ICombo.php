<?php
abstract class ICombo{
    private $imagen;
    private $id;
    private $nombre;
    private $alimentos=array();
    private $precio;
    abstract public function verCombo();
    abstract public function getPrecio();
    abstract public function getImagen();
    abstract public function getId();
    abstract public function getNombre();
    abstract public function getAlimentos();
}