<?php

require_once('conexion.php');
$conexion = new Cconexion();
$conexion->ConexionBD();

class docente {
    private $conn; // Declarar una propiedad privada para la conexión

    function __construct($conexion) {
        $this->conn = $conexion; // Asignar la conexión a la propiedad
    }

    function get() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
            // Obtener datos del formulario
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];

            // Llamar al procedimiento almacenado para insertar un nuevo registro
            $sql = "EXEC InsertarUsuario ?, ?";
            $params = array($nombre, $email);
            $stmt = sqlsrv_query($this->conn, $sql, $params); // Usar $this->conn

            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }
    }
}

// Crear una instancia de la clase docente y pasar la conexión como argumento
$docente = new docente($conexion);
$docente->get();

?>