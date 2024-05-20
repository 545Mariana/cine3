<?php
include_once ("Menu.php");
include_once ("Alimento.php");
class MenuAlimentos implements Menu{
    public $alimentos=array();

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
        $sql=$conexion->query("select * from alimento;");
        $i=0;
        while($datos=$sql->fetch_object())
        {
            $id=$datos->IDAlimento;
            $nombre=$datos->NombreAlimento;
            $precio=$datos->PrecioAlimento;
            $imagen=$datos->ImagenAlimento;
            $alimento=new Alimento($id, $nombre, $precio, $imagen);            
            array_push($this->alimentos, $alimento);
        }
        return $this;
    }
    public function mostrar(){
        echo '<div>';
        foreach($this->alimentos as $alimento)
        {
            echo '<div class="galeria">';
                echo '<div class="foto">';
                    echo '<img src="'.$alimento->getImagen().'" alt="">';
                echo '</div>';
                echo '<div class="pie">';
                    echo "<p>" . $alimento->getNombre() . "</p>";
                    echo "<p>Precio: $" . $alimento->getPrecio() . "</p>";
                echo '</div>';
                echo '<div class="btnProducto">';
                    echo '<form method="post">';
                        echo '<input type="hidden" name="id" value="' . $alimento->getId() . '" >';
                        echo '<input type="hidden" name="tipo" value="alimento" >';
                        echo '<input type="submit" name="OrdenAlimento" value="Añadir el carrito" class="color-button2">';
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
            values ('$nombre', '$id', 'Alimento', '$precio', '$imagen');");
    }
}