<?php
class ManejoIntegral {
    private $datos = [];
    private $conn;

    public function __construct() {
        /* $this->conn = new mysqli('localhost', 'root', '', 'ial_landingpfc'); */
        $this->conn = new mysqli('localhost', 'root', '', 'ial_landingpfc');

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function buscarAlumnoManejoIntegral($dni) {
        $stmt = $this->conn->prepare("SELECT * FROM alumnos WHERE dni = ? AND curso_id = ?");
        /* $stmt = $this->conn->prepare("SELECT * FROM landing_pfc WHERE dni = ? AND curso_id = ?"); */
        $curso_id = 1;
        $stmt->bind_param("si", $dni, $curso_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null; 
        }
    }
    
    public function __destruct() {
        $this->conn->close();
    }
}
?>
