<?php
require_once __DIR__ . '/../modelo/Masoterapia.php';

class MasoterapiaControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Masoterapia();
    }

    public function mostrarVista() {
        include __DIR__ . '/../vista/masoterapia.php'; 
    }


    public function BuscarAlumnoPorMasoterapia() {
        $dni = $_POST['documento'] ?? ''; 
        $alumno = $this->modelo->buscarAlumnoMasoterapia($dni); 
    
        header('Content-Type: application/json');
    
        if ($alumno) {
            echo json_encode(['success' => true, 'data' => $alumno]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontró un alumno con ese DNI.']);
        }
        exit; 
    }
    
    
}
?>