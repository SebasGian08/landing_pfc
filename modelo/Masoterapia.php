<?php
class Masoterapia {
    private $datos = [];
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'ial_landingpfc');
         /* $this->conn = new mysqli('localhost', 'root', '', 'ial_landingpfc'); */

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function buscarAlumnoMasoterapia($dni) {
        $stmt = $this->conn->prepare("SELECT * FROM alumnos WHERE dni = ? AND curso_id = ?");
        /* $stmt = $this->conn->prepare("SELECT * FROM landing_pfc WHERE dni = ? AND curso_id = ?"); */
        $curso_id = 2; // ID del curso que deseas verificar
        $stmt->bind_param("si", $dni, $curso_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null; // No se encontró ningún alumno con ese DNI y curso_id = 2
        }
    }
    
    public function __destruct() {
        $this->conn->close();
    }
}
?>
