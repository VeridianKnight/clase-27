 
<?php
// require '../../autoload.php';
// spl_autoload_register('miAutoloader');
// require_once 'C:\xampp2\htdocs\clases Arg progama\clase17\clase27\clase27-hector\conexion\conexionBadeDeDatos.php';

class ABMPublicaciones
{

    public static function AgregarPublicaciones($data)       {
 
        // "{"username":"Ramon","autor_id":"2","title":"eee","content":"sss","submit":"submit"}"
        $sql = "INSERT INTO publicaciones( title, content, autor_id) VALUES (? ,? ,? )";
        $db =new BaseDeDatos();
        $conexion = $db->Conexion33(); // Obtenemos la conexión PDO desde la clase BaseDeDatos
        try {
            $stmt = $conexion->prepare($sql); // Preparamos la consulta con la conexión PDO
            $insertado = $stmt->execute([$data['title'], $data['content'], $data['autor_id']]);

            $idCreado = $conexion->lastInsertId();
            $db->desconectar();
            // Verificamos si la consulta se ejecutó con éxito
            if ($insertado) {
                // // paso dos valores en el array el que me dice si se dccargo bien el registro y si fue asi paso el ultimo id
                $resultado = array("insertado" => $insertado, "ultimo" => $idCreado);
                return $resultado;
            } else {
                $resultado = array("insertado" => false, "ultimo" => "Registro no Ingresdado");
                return $resultado;
            }
        } catch (PDOException $e) {
            // echo "Error: " . $e->getMessage();
            return array("insertado" => "error", "ultimo" =>$e->getMessage() ) ; // También puedes manejar el error de alguna manera más específica aquí
        }        
    }    
    public static function ListarPublicaciones()
    {
        $sql = "SELECT * FROM publicaciones ORDER BY create_ad DESC ";
        $db = new BaseDeDatos();
        $conexion = $db->Conexion33(); // Obtenemos la conexión PDO desde la clase BaseDeDatos
        try {
            $resultado = $conexion->query($sql); // Preparamos la consulta con la conexión PDO
            $db->desconectar();
            if ($resultado) {
                $listadoRecuperado = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $listadoRecuperado;
            } else {
                echo "Error al ejecutar la consulta: " . $conexion->errorInfo()[2];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db->desconectar(); // Aseguramos que la desconexión se realice
        }
    }
    public static function BuscarPublicaciones($id)
    {
        // $sql = "SELECT  title, content, create_ad,user.username FROM publicaciones INNER JOIN user ON publicaciones.autor_id=user.id WHERE id_publicaciones= ?";
        $sql = "SELECT  title, content, create_ad,user.username FROM publicaciones INNER JOIN user ON publicaciones.autor_id=user.id WHERE id_publicaciones= ?";
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

    public static function EliminarPublicaciones($id)
    {
// echo 'estamos eliminando la publicacion '.$id;

        $sql = "DELETE FROM publicaciones WHERE id_publicaciones = ?";
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
    
    public static function ActualizarPublicaciones($id, $publicaciones)
    {
        // Verifica que el array $publicaciones no sea nulo y que contenga los valores necesarios
        if ( isset($publicaciones['title'], $publicaciones['content'])) {
// var_dump($publicaciones);
            $sql =  " UPDATE  publicaciones  SET  title = ?, content = ? WHERE id_publicaciones =?";
        
            $db = new BaseDeDatos();
            $conexion = $db->Conexion33();
            
            try {
                $stmt = $conexion->prepare($sql);
                $resultado = $stmt->execute([$publicaciones['title'], $publicaciones['content'], $id]);
                $db->desconectar();
                return $resultado;
            } catch (PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            return "Error: Los datos de la publicación no están completos o son nulos.";
        }
    }

    }
  
?>
