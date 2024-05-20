<?php
require_once ('..\Modelo\OrdenAlimento\GestorOrdenAlimentos.php');
class CAlimentos{
    public GestorOrdenAlimentos $gestor;
    public function __construct() {
        $this->gestor = new GestorOrdenAlimentos();
    }
    public function botonCombos(){
        $this->gestor->mostrarCombos();
    }
    public function botonAlimentos(){
        $this->gestor = new GestorOrdenAlimentos();
        $this->gestor->mostrarAlimentos();
    }
    public function botonCarrito(){
        $this->gestor=$this->gestor->mostrarCarrito();
        //var_dump($this->gestor->carrito->getProductos());
        return $this;
    }
    public function botonEliminar($id){
        $this->gestor->eliminarCarrito($id);
        $this->gestor->mostrarCarrito();
    }
    public function botonAnadir($tipo, $producto){
        if($tipo=="combo")
        {
            $this->gestor=$this->gestor->anadirCombo($producto);
            $this->gestor=$this->gestor->mostrarCarrito();
            return $this;
        }
        if($tipo=="alimento")
        {
            $this->gestor=$this->gestor->anadirAlimento($producto);
            $this->gestor->mostrarCarrito();
            return $this;
        }
        
    }
}