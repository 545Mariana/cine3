<?php

// Obtener los datos del formulario
$sala = $_POST['sala'];
$tipoBoleto = $_POST['tipoBoleto'];
$cantidadBoletos = $_POST['cantidadBoletos'];
$asientosSeleccionados = $_POST['asiento']; // Esto es un array con los asientos seleccionados

// Definir los precios base
$precios = array(
    "Tradicional" => array("Adulto" =>  70  , "AdultoMayor" => 25, "Niños" => 100),
    "3D" => array("Adulto" => 140, "AdultoMayor" => 50, "Niños" => 120),
    "Vip" => array("Adulto" => 210, "AdultoMayor" => 100, "Niños" => 190)
);

// Calcular el precio total
$precioBase = $precios[$sala][$tipoBoleto];
$precioTotal = $precioBase * $cantidadBoletos;


// Mostrar el precio total
echo "El precio total es: $" . $precioTotal;


?>
