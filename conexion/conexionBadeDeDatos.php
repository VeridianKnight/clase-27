<?php


class BaseDeDatos {
    private $host;
    private $dbname;
    private $usuario;
    private $contrasena;
    private $conectar;

    public function __construct() {
        $this->host = 'localhost';
        $this->dbname = 'ejercicio27';
        $this->usuario = 'root';
        $this->contrasena = '';

        try {
            $this->conectar = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->usuario, $this->contrasena);
            $this->conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // // echo 'Conexion Exitosa';
        } catch (PDOException $e) {
            // Manejo de errores de conexión
            echo "Error de conexión: " . $e->getMessage();
            die(); // Detener la ejecución del script en caso de error crítico
        }
    }
    public function Conexion33() {
        return $this->conectar;
    }
    public function desconectar() {
        // Método para cerrar la conexión
        $this->conectar = null;
    }
}
$con=new BaseDeDatos();
$con->Conexion33();
?>
