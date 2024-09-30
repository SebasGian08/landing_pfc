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

<?php
class Modelo {
    private $datos = [];
    private $conn;

    public function __construct() {
        // Conectar a la base de datos
        $this->conn = new mysqli('localhost', 'root', '', 'ial_landingpfc');

        // Verificar la conexión
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function buscarAlumnoPorDNI($dni) {
        $stmt = $this->conn->prepare("SELECT * FROM alumnos WHERE dni = ?");
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Retorna el primer alumno encontrado
        } else {
            return null; // No se encontró ningún alumno
        }
    }

    public function agregarAlumnoPorDNI($dni) {
        // Primero, verifica si ya existe un alumno con ese DNI
        if ($this->buscarAlumnoPorDNI($dni)) {
            return false; // El alumno ya existe
        }

        // Prepara la consulta de inserción
        $stmt = $this->conn->prepare("INSERT INTO alumnos (dni) VALUES (?)");
        $stmt->bind_param("s", $dni);
        if ($stmt->execute()) {
            return ['dni' => $dni, 'mensaje' => 'Alumno registrado.'];
        } else {
            return false; // Fallo en la inserción
        }
    }


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
