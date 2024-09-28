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
            case 'agregarAlumno':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $dni = $_POST['documento'] ?? '';
                        $resultado = $this->modelo->agregarAlumnoPorDNI($dni);
                        if ($resultado) {
                            echo json_encode(['success' => true, 'message' => 'Alumno agregado exitosamente.']);
                        } else {
                            echo json_encode(['success' => false, 'message' => 'El alumno ya existe.']);
                        }
                    } else {
                        include __DIR__ . '/../vista/agregarAlumno.php';
                    }
                    break;
            case 'buscarAlumno':
                $dni = $_POST['documento'] ?? '';
                $alumno = $this->modelo->buscarAlumnoPorDNI($dni);
                if ($alumno) {
                    echo json_encode(['success' => true, 'data' => $alumno]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'No se encontró un alumno con ese DNI.']);
                }
                break;
            default:
                include __DIR__ . '/../vista/manejointegraldeheridas.php';
                break;
        }
    }
}
?>