<?php
class Modelo {
    private $datos = [];
    private $conn;

    public function __construct() {
        // Conectar a la base de datos
        $this->conn = new mysqli('localhost', 'root', '', 'ial_landingpfc');

        /* Web */
        /* $this->conn = new mysqli('localhost', 'root', '', 'ial_dblanding'); */

        // Verificar la conexión
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function buscarAlumnoPorDNI($dni) {
        $stmt = $this->conn->prepare("SELECT * FROM alumnos WHERE dni = ?");
        /* $stmt = $this->conn->prepare("SELECT * FROM landing_pfc WHERE dni = ?"); */
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Retorna el primer alumno encontrado
        } else {
            return null; // No se encontró ningún alumno
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>
