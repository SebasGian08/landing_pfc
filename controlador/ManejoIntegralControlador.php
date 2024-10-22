<?php
require_once __DIR__ . '/../modelo/ManejoIntegral.php';

class ManejoIntegralControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new ManejoIntegral(); 
    }

    public function mostrarVista() {
        include __DIR__ . '/../vista/manejointegraldeheridas.php';
    }


    public function BuscarAlumnoPorManejoIntegral() {
        $dni = $_POST['documento'] ?? ''; 
        $alumno = $this->modelo->buscarAlumnoManejoIntegral($dni); 
    
        header('Content-Type: application/json');
    
        if ($alumno) {
            echo json_encode(['success' => true, 'data' => $alumno]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontró un alumno con ese DNI.']);
        }
        exit; // Asegúrate de salir después de enviar la respuesta
    }
    
}
?>