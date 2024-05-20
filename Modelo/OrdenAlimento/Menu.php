<?php
//echo "<br> Estoy en Menu";
interface Menu{
    public function leer();
    public function mostrar();
    public function agregar($producto);
}
