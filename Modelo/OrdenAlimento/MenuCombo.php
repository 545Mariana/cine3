<?php
session_start();
include_once ("Menu.php");
include_once ("Combo.php");
//echo "<br>Estoy en menu combos";
class MenuCombos implements Menu{
    private $combos=array();

    public function leer(){
        $host = "localhost";
        $usuario = "root";
        $contrasena = "2000Jonhy#22";
        $base_de_datos = "cine";

        $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);
        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error en la conexión a la base de datos: " . $conexion->connect_error);
        }else{
            echo"<brTodo salio chingon";
        }
        $conexion->set_charset("utf8");
        $sql=$conexion->query("select * from combo;");
        $i=0;
        while($datos=$sql->fetch_object())
        {
            $id=$datos->IDCombo;
            $nombre=$datos->NombreCombo;
            $precio=$datos->PrecioCombo;
            $imagen=$datos->ImagenCombo;
            $combo=new Combo($id, $nombre, $precio, $imagen);            
            array_push($this->combos, $combo);
        }
        return $this;
    }
    public function mostrar(){
        echo '<div>';
        foreach($this->combos as $combo)
        {
            echo '<div class="galeria">';
                echo '<div class="foto">';
                    echo '<img src="'.$combo->getImagen().'" alt="">';
                echo '</div>';
                echo '<div class="pie">';
                    echo "<p>" . $combo->getNombre() . "</p>";
                    echo "<p>Precio: $" . $combo->getPrecio() . "</p>";
                echo '</div>';
                echo '<div class="btnProducto">';
                    echo '<form method="post">';
                        echo '<input type="hidden" name="id" value="' . $combo->getId() . '" >';
                        echo '<input type="hidden" name="tipo" value="combo" >';
                        echo '<input type="submit" name="OrdenAlimento" value="Añadir al carrito" class="color-button2">';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        
    }
    public function agregar($producto){
        $nombre=$producto->getNombre();
        $id=$producto->getId();
        $precio=$producto->getPrecio();
        $imagen=$producto->getImagen();

        $host = "localhost";
        $usuario = "root";
        $contrasena = "2000Jonhy#22";
        $base_de_datos = "cine";

        $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);
        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error en la conexión a la base de datos: " . $conexion->connect_error);
        }else{
            echo"<brTodo salio chingon";
        }
        $conexion->set_charset("utf8");
        $sql=$conexion->query("insert into carrito(NombreProducto, IDProducto, TipoProducto, PrecioProducto, ImagenProducto) 
            values ('$nombre', '$id', 'Combo', '$precio', '$imagen');");
    }
}