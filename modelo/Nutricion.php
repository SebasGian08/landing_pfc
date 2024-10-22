<?php
class Nutricion {
    private $datos = [];
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'ial_landingpfc');

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function buscarAlumnoNutricion($dni) {
        $stmt = $this->conn->prepare("SELECT * FROM alumnos WHERE dni = ? AND curso_id = ?");
        $curso_id = 3;
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
