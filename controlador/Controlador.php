<?php
require_once __DIR__ . '/../modelo/Modelo.php';

class Controlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Modelo();
    }

    public function manejarSolicitud() {

        
        // Incluye la vista
        include __DIR__ . '/../vista/vista.php';
    }


    
}
?>
