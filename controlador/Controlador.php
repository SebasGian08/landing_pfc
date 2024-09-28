<?php
require_once __DIR__ . '/../modelo/Modelo.php';

class Controlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Modelo();
    }

    public function manejarSolicitud($tipoVista) {
        switch ($tipoVista) {
            case 'masoterapia':
                include __DIR__ . '/../vista/masoterapia.php';
                break;
            case 'nutricion':
                include __DIR__ . '/../vista/nutricion.php';
                break;
            default:
                include __DIR__ . '/../vista/manejointegraldeheridas.php';
                break;
        }
    }
}
?>
