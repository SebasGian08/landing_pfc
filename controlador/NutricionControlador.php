<?php
require_once __DIR__ . '/../modelo/Nutricion.php';

class NutricionControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Nutricion(); // Inicializa el modelo aquí
    }

    public function mostrarVista() {
        include __DIR__ . '/../vista/nutricion.php'; // Incluye la vista
    }


    public function BuscarAlumnoPorNutricion() {
        $dni = $_POST['documento'] ?? ''; 
        $alumno = $this->modelo->buscarAlumnoNutricion($dni); 
    
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