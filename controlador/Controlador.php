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
            case 'nutricion':
            case 'agregarAlumno':
                $this->gestionarVista($tipoVista);
                break;
            case 'buscarAlumno':
                $this->buscarAlumno();
                break;
            case 'obtenerAlumnos':
                $this->obtenerAlumnos();
                break;
            default:
                include __DIR__ . '/../vista/manejointegraldeheridas.php';
                break;
        }
    }

    private function gestionarVista($vista) {
        if ($vista === 'agregarAlumno' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $dni = $_POST['documento'] ?? '';
            $resultado = $this->modelo->agregarAlumnoPorDNI($dni);
            echo json_encode($resultado ? 
                ['success' => true, 'message' => 'Alumno agregado exitosamente.'] : 
                ['success' => false, 'message' => 'El alumno ya existe.']);
        } else {
            include __DIR__ . '/../vista/' . $vista . '.php';
        }
    }

    private function buscarAlumno() {
        $dni = $_POST['documento'] ?? '';
        $alumno = $this->modelo->buscarAlumnoPorDNI($dni);
        echo json_encode($alumno ? 
            ['success' => true, 'data' => $alumno] : 
            ['success' => false, 'message' => 'No se encontró un alumno con ese DNI.']);
    }


    private function obtenerAlumnos() {
        $alumnos = $this->modelo->obtenerTodosLosAlumnos(); // Método que deberías implementar en tu modelo
        echo json_encode(['success' => true, 'data' => $alumnos]);
    }
}
?>