<?php

// Clase Maestra
class OrdenarBoletoMaster {
    private $authSlave;
    private $branchSlave;
    private $billboardSlave;

    public function __construct($authSlave, $branchSlave, $billboardSlave) {
        $this->authSlave = $authSlave;
        $this->branchSlave = $branchSlave;
        $this->billboardSlave = $billboardSlave;
    }

    public function ordenarBoleto($correo, $contrasenia, $cantidadBoletos, $pelicula) {
        // Primero, autenticamos al usuario
        if ($this->authSlave->autenticar($correo, $contrasenia)) {
            // Obtenemos la información de la sucursal y la cartelera
            $sucursalInfo = $this->branchSlave->obtenerInfoSucursal();
            $carteleraInfo = $this->billboardSlave->obtenerInfoCartelera($pelicula);
            // Procesamos el pedido de boletos con la información obtenida
            if ($sucursalInfo && $carteleraInfo) {
                // Lógica para ordenar boletos
                return "¡Boletos ordenados para $correo para la película $pelicula!";
            } else {
                return "Lo siento, no se pudo procesar el pedido.";
            }
        } else {
            return "Usuario no autenticado.";
        }
    }
}

// Uso
$authSlave = new AutenticacionSlave(new GestorAutenticacion());
$branchSlave = new SucursalSlave();
$billboardSlave = new CarteleraSlave();

$ordenarBoletoMaster = new OrdenarBoletoMaster($authSlave, $branchSlave, $billboardSlave);
$resultado = $ordenarBoletoMaster->ordenarBoleto("usuario123@example.com", "contrasenia", 2, "Avengers: Endgame");
echo $resultado;
