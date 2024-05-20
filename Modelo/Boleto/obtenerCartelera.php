<?php

require_once "../Modelo/Boleto/GestoBoleto.php";
require_once "../Modelo/Cartelera/horario.php";
require_once "../Modelo/Boleto/FuncioCine.php";
require_once "../Modelo/Boleto/ordenBoleto.php";

class CarteleraSlave {
    public function obtenerInfoCartelera($pelicula) {
        // Simulación de obtener la información de la cartelera desde una fuente de datos, como una base de datos
        $peliculaInfo = $this->consultarPelicula($pelicula);
        $horarios = $this->consultarHorarios($pelicula);
        // Aquí puedes incluir lógica adicional, como consultar la sala asociada a la película

        return ["pelicula" => $peliculaInfo->getNombre(), "horarios" => $horarios];
    }

    private function consultarPelicula($pelicula) {
        // Lógica para consultar la información de la película desde la base de datos o alguna otra fuente de datos
        // Aquí podrías usar la clase pelicula
        // Aquí simplemente devolveré un objeto de película ficticio
        return new pelicula(1, "Nombre de la Película", "Sinopsis", "Duración", "Imagen", "Género", "Estado");
    }

    private function consultarHorarios($pelicula) {
        // Lógica para consultar los horarios de la película desde la base de datos o alguna otra fuente de datos
        // Aquí podrías usar la clase horario
        // Aquí simplemente devolveré un array de horarios ficticios
        return [new horario(1, "2024-05-20 10:00"), new horario(2, "2024-05-20 15:00"), new horario(3, "2024-05-20 20:00")];
    }
}


?>
