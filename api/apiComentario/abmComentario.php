 
<?php
// require 'C:\xampp2\htdocs\clases Arg progama\clase17\clase27\clase27-hector\conexion\conexionBadeDeDatos.php';
// SELECT user_name, password, email, token FROM comentario WHERE 1
// require '../../conexion/conexionBadeDeDatos.php';
class ABMcomentario
{
    public static function AgregarComentario($datos)
    { 

        $sql = "INSERT INTO comentarios( post_id, content, autor_id, create_ad) VALUES (? ,? ,? ,?)";
        // var_dump($datos);
        $db = new BaseDeDatos();
        $conexion = $db->Conexion33(); // Obtenemos la conexión PDO desde la clase BaseDeDatos
        try {
            $stmt = $conexion->prepare($sql); // Preparamos la consulta con la conexión PDO
            $fechaActual = date('Y-m-d H:i:s');
            $insertado=$stmt->execute([$datos['post_id'],$datos['content'], $datos['autor_id'],$fechaActual]);
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
            return "error" . $e->getMessage(); // También puedes manejar el error de alguna manera más específica aquí
        }
    }
    public static function ListarComentario()
    {
        $sql = "SELECT *, user.use_name FROM comentarios INNER JOIN user ON user.id=comentarios.autor_id";
        $db = new BaseDeDatos();
        $conexion = $db->Conexion33(); // Obtenemos la conexión PDO desde la clase BaseDeDatos
        try {
            $resultado = $conexion->query($sql); // Preparamos la consulta con la conexión PDO

            if ($resultado) {
                $listadoRecuperado = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $listadoRecuperado;
            } else {
                // echo "Error al ejecutar la consulta: " . $conexion->errorInfo();
                echo "error";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db->desconectar(); // Aseguramos que la desconexión se realice
        }
    }
    public static function BuscarComentario($id)    {

        $sql = "SELECT id_comentario,post_id,content,autor_id,create_ad, user.username FROM comentarios INNER JOIN user ON user.id=comentarios.autor_id WHERE id_comentario= ?";
        $db = new BaseDeDatos();
        $conexion = $db->Conexion33();
        try {
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$id]); // Pasa el ID como un arreglo
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $db->desconectar();
                return $resultado; // Devuelve el resultado encontrado
        } catch (PDOException $e) {
            // Puedes manejar el error de manera más específica aquí
            return "error: " . $e->getMessage();
        }
    }
     public static function EliminarComentario($id)
    {
        $sql = "DELETE FROM comentarios WHERE id_comentario = ?";
        $db = new BaseDeDatos();
        $conexion = $db->Conexion33();
        try {
            $stmt = $conexion->prepare($sql);
            $repuesta=$stmt->execute([$id]);   
            $db->desconectar();
            var_dump($repuesta);
            // return $repuesta;
          
        } catch (PDOException $e) {
            return "error: " . $e->getMessage(); // Puedes manejar el error de manera más específica aquí
        }
    }
    public static function ActualizarComentario($id, $datos)
    // $sql = "SELECT id_comentario,post_id,t,autor_id,create_ad, user.username FROM comentarios INNER JOIN user ON user.id=comentarios.autor_id WHERE id_comentario= ?";
    {
        $sql = "UPDATE comentarios SET content= ? WHERE id_comentario= ?";
        $db = new BaseDeDatos();
        $conexion = $db->Conexion33();
        try {
            $stmt = $conexion->prepare($sql); // Preparamos la consulta con la conexión PDO
            $resultado = $stmt->execute([$datos['content'],$id]);
            $db->desconectar();
                return $resultado; // Devuelve el resultado encontrado
        } catch (PDOException $e) {
            // Puedes manejar el error de manera más específica aquí
            return "error: " . $e->getMessage();
        }
    }
}
?>
