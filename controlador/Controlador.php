<?php

require_once __DIR__ . '/../modelo/Modelo.php';
require_once __DIR__ . '/../controlador/MasoterapiaControlador.php';
require_once __DIR__ . '/../controlador/ManejoIntegralControlador.php';
require_once __DIR__ . '/../controlador/NutricionControlador.php';

class Controlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Modelo();
    }

   public function manejarSolicitud($tipoVista) {
    $rutaVista = __DIR__ . '/../vista/' . $tipoVista . '/index.php';

    switch ($tipoVista) {
        case 'BuscarAlumnoPorNutricion':
            $manejoControlador = new NutricionControlador();
            $manejoControlador->BuscarAlumnoPorNutricion();
            exit; // Evitar que se ejecute más código
        case 'BuscarAlumnoPorManejoIntegral':
            $manejoControlador = new ManejoIntegralControlador();
            $manejoControlador->BuscarAlumnoPorManejoIntegral();
            exit; // Evitar que se ejecute más código
        case 'BuscarAlumnoPorMasoterapia':
            $masoterapiaControlador = new MasoterapiaControlador();
            $masoterapiaControlador->BuscarAlumnoPorMasoterapia();
            exit; // Evitar que se ejecute más código
        case 'agregarAlumno':
            $this->gestionarVista($tipoVista);
            exit; // Evitar que se ejecute más código
        case 'obtenerAlumnos':
            $this->obtenerAlumnos();
            exit; // Evitar que se ejecute más código
        default:
            // Verifica si la vista existe y la incluye, de lo contrario muestra una página 404
            if (file_exists($rutaVista)) {
                include $rutaVista;
            } else {
                include __DIR__ . '/../vista/notfound.php';
            }
            break;
    }
}

    public function gestionarVista($vista) {
        if ($vista === 'agregarAlumno' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lógica para agregar alumno
            $dni = $_POST['documento'] ?? '';
            $resultado = $this->modelo->agregarAlumnoPorDNI($dni);
            
            header('Content-Type: application/json'); 
            echo json_encode($resultado ? 
                ['success' => true, 'message' => 'Alumno agregado exitosamente.'] : 
                ['success' => false, 'message' => 'El alumno ya existe.']);
            exit; // Detenemos la ejecución aquí
        } else {
            include __DIR__ . '/../vista/' . $vista . '.php';
        }
    }
    

    private function obtenerAlumnos() {
        $alumnos = $this->modelo->obtenerTodosLosAlumnos(); // Método que deberías implementar en tu modelo
        echo json_encode(['success' => true, 'data' => $alumnos]);
    }
}
?>