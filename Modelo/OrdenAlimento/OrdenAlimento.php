<?php
include_once ("Alimento.php");
include_once ("Combo.php");
class OrdenAlimento{
    private $numProductos;
    private $precioTotal;
    private $alimentos=array();
    private $combos=array();
    private $productos=array();

    public function __construct() {
        $this->numProductos = 0;
        $this->precioTotal = 0.00;
    }

    public function cargarCarrito(){
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
        $sql=$conexion->query("select * from carrito;");

        $i=0;
        while($datos=$sql->fetch_object())
        {
            if($datos->TipoProducto=="Combo")
            {
                $id=$datos->IDCarrito;
                $nombre=$datos->NombreProducto;
                $precio=$datos->PrecioProducto;
                $imagen=$datos->ImagenProducto;
                $combo=new Combo($id, $nombre, $precio, $imagen);            
                array_push($this->combos, $combo);
            }
            else if($datos->TipoProducto=="Alimento"){
                $id=$datos->IDCarrito;
                $nombre=$datos->NombreProducto;
                $precio=$datos->PrecioProducto;
                $imagen=$datos->ImagenProducto;
                $alimento=new Alimento($id, $nombre, $precio, $imagen);            
                array_push($this->alimentos, $alimento);
            }
        }
        return $this;
    }

    public function mostrar(){
        $productos=array();
        $productos=array_merge($this->alimentos, $this->combos);
        $this->productos=$productos;
                
        foreach($this->productos as $alimento)
        {
                echo '<tr>';
                
                    echo '<td>';
                            echo '<img src="'.$alimento->getImagen().'" alt="" height="50px">';
                    echo '</td>';
                    echo '<td>'.$alimento->getNombre().'</td>';
                    echo '<td>$'.$alimento->getPrecio().'</td>';
                    echo '<td>
                            <form method="post">
                                <input type="hidden" name="id" value="' . $alimento->getId() . '" >
                                <input type="submit" name="EliminarCarrito" value="Eliminar del carrito" class="button-eliminar">
                            </form>
                        </td>';
                echo '</tr>';
            $this->precioTotal+=$alimento->getPrecio();
            $this->numProductos++;
        }
        return $this;
    }
    public function eliminarCarrito($id){
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
        $sql=$conexion->query("delete from carrito where IDCarrito='$id';");
    }

    public function getNumProductos(){
        return $this->numProductos;
    }
    public function getPrecioTotal(){
        return $this->precioTotal;
    }
    public function getAlimentos(){
        return $this->alimentos;
    }
    public function getCombos(){
        return $this->combos;
    }
    public function getProductos(){
        return $this->productos;
    }
}