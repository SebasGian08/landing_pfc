<?php
class Modelo {
    private $datos = [];


    public function buscarAlumnoPorDNI($dni) {
        // Aquí se realizaría la consulta a la base de datos o API
        $url = "https://istalcursos.edu.pe/apirest/alumnos";
        $response = file_get_contents($url . "?documento=" . $dni);
        return json_decode($response, true);
    }
}
?>
