 
<?php
include '../../conexion/conexionBadeDeDatos.php';
// SELECT user_name, password, email, token FROM users WHERE 1
class ABMusers
{
    public static function AgregarUser($datos)
    { 
        $sql =  "INSERT INTO user( use_name, password, mail, activo) VALUES ( ?, ? ,? ,?)";
        $db = new BaseDeDatos();
        $conexion = $db->Conexion33(); // Obtenemos la conexión PDO desde la clase BaseDeDatos
        try {
            $stmt = $conexion->prepare($sql); // Preparamos la consulta con la conexión PDO
            $insertado=$stmt->execute([$datos["username"],$datos["password"], $datos["email"],1]);
            $idCreado = $conexion->lastInsertId();
            $db->desconectar();
            // Verificamos si la consulta se ejecutó con éxito
            if ($insertado) {
                // // paso dos valores en el array el que me dice si se dccargo bien el registro y si fue asi paso el ultimo id
                $resultado = array("insertado" =>$insertado,"ultimo" => $idCreado);
                return $resultado;
            } else {
                $resultado = array("mensaje" =>"error al creae nuevo Registro");
                return $resultado;
            }
        } catch (PDOException $e) {
            // echo "Error: " . $e->getMessage();
            return "error" . $e->getMessage();; // También puedes manejar el error de alguna manera más específica aquí
        }
    }

    public static function RegresarUsuario($user,$pass)
    // // SELECT * FROM user`WHERE use_name='Ramon' AND password=12345;
    {  $sql="SELECT * FROM user WHERE use_name=? AND password=?";
        // $sql = "SELECT * FROM users WHERE id_user= ?";
        $db = new BaseDeDatos();
        $conexion = $db->Conexion33();
        try {
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$user, $pass]); // Pasa el ID como un arreglo
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $db->desconectar();
                return $resultado; // Devuelve el resultado encontrado
        } catch (PDOException $e) {
            // Puedes manejar el error de manera más específica aquí
            return "error: " . $e->getMessage();
        }
    }
    public static function EliminarUser($id)
    {
        $sql = "DELETE FROM users WHERE id_user = ?";
        $db = new BaseDeDatos();
        $conexion = $db->Conexion33();

        try {
            $stmt = $conexion->prepare($sql);
            $repuesta=$stmt->execute([$id]);   
            $db->desconectar();
            return $repuesta;
          
        } catch (PDOException $e) {
            return "error: " . $e->getMessage(); // Puedes manejar el error de manera más específica aquí
        }
    }
    public static function ActualizarUser($id, $datos)
    {
        $sql = "UPDATE users SET id= ?,nombre=?,precio=? WHERE id_users= ?";
        $db = new BaseDeDatos();
        $conexion = $db->Conexion33();
        try {
            $stmt = $conexion->prepare($sql); // Preparamos la consulta con la conexión PDO
            $resultado = $stmt->execute([$datos['id'],$datos['nombre'], $datos['precio'],$id]);
            $db->desconectar();
                return $resultado; // Devuelve el resultado encontrado
        } catch (PDOException $e) {
            // Puedes manejar el error de manera más específica aquí
            return "error: " . $e->getMessage();
        }
    }
}
?>
