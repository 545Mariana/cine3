<?php

require_once '../Modelo/Modulo_Zona/Gestor_zona.php';
require_once '../ServiciosExternos/proxy_zona.php';
require_once 'zona.php';
require_once 'sucursal.php';

class SucursalSlave {
    public function obtenerInfoSucursal() {
        // Utilizamos el gestor de zona para obtener la información de sucursales
        $gestorZona = new GestorZona();
        $sucursales = $gestorZona->obtenerSucursales();

        // Por ahora, solo devolvemos la primera sucursal encontrada
        if (!empty($sucursales)) {
            $sucursal = $sucursales[0];
            return ["sucursal" => $sucursal->getNombreSucursal(), "direccion" => ""]; // No hay dirección disponible en la clase Sucursal
        } else {
            return ["sucursal" => "No disponible", "direccion" => "No disponible"];
        }
    }
}

