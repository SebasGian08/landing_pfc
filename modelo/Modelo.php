<?php
class Modelo {
    private $datos = [];
    private $conn;

    public function __construct() {
        // Conectar a la base de datos
        /* $this->conn = new mysqli('localhost', 'root', '', 'ial_landingpfc'); */
        $this->conn = new mysqli('localhost', 'root', '', 'ial_landingpfc');

        // Verificar la conexión
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }


    //Buscar Alumno en general
    public function buscarAlumnoPorDNI($dni) {
        $stmt = $this->conn->prepare("SELECT * FROM alumnos WHERE dni = ?");
        /* $stmt = $this->conn->prepare("SELECT * FROM landing_pfc WHERE dni = ?"); */
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null; 
        }
    }


    //Agregar Alumno
    public function agregarAlumnoPorDNI($dni) {
        if ($this->buscarAlumnoPorDNI($dni)) {
            return false;
        }
        $stmt = $this->conn->prepare("INSERT INTO alumnos (dni) VALUES (?)");
        $stmt->bind_param("s", $dni);
        if ($stmt->execute()) {
            $id = $stmt->insert_id;
            return ['id' => $id, 'dni' => $dni, 'success' => true, 'message' => 'Alumno registrado.'];
        } else {
            return ['success' => false, 'message' => 'Error al registrar el alumno.'];
        }
    }

    //Listado de todos los alumnos
    public function obtenerTodosLosAlumnos() {
        $stmt = $this->conn->prepare("SELECT * FROM alumnos");
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC); // Retorna todos los alumnos como un array asociativo
    }
    

    public function __destruct() {
        $this->conn->close();
    }
}

?>