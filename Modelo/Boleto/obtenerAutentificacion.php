<?php

// Clase Esclava AutenticacionSlave
require_once "../Modelo/al/gestorAute.php";

class AutenticacionSlave {
    private $gestorAutenticacion;

    public function __construct(GestorAutenticacion $gestorAutenticacion) {
        $this->gestorAutenticacion = $gestorAutenticacion;
    }

    public function autenticar($correo, $contrasenia) {
        // Lógica para autenticar al usuario utilizando el gestor de autenticación
        return $this->gestorAutenticacion->autenticarUsuario($correo, $contrasenia);
    }
}

