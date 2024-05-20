<?php

require_once "/Modelo/Boleto/GestorBoleto.php"; // Reemplaza "path_to_your_files.php" con la ruta correcta a tus archivos

// Controlador
class OrdenarBoletoController {
    public function __construct() {}

    public function procesarOrden($usuario, $cantidadBoletos, $pelicula) {
        // Crear instancias de las clases esclavas
        $authSlave = new AutenticacionSlave();
        $branchSlave = new SucursalSlave();
        $billboardSlave = new CarteleraSlave();

        // Crear instancia de OrdenarBoletoMaster
        $ordenarBoletoMaster = new OrdenarBoletoMaster([
            'auth' => $authSlave,
            'branch' => $branchSlave,
            'billboard' => $billboardSlave
        ]);

        // Llamar al método ordenarBoleto
        $resultado = $ordenarBoletoMaster->ordenarBoleto($usuario, $cantidadBoletos, $pelicula);

        // Devolver el resultado
        return $resultado;
    }
}

// Uso del controlador
$ordenarBoletoController = new OrdenarBoletoController();
$resultado = $ordenarBoletoController->procesarOrden("usuario123", 2, "Avengers: Endgame");
echo $resultado;

?>
