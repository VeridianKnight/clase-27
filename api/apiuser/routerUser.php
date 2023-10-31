<?php
session_start();
include './apiUser.php';
// array(3) { ["username"]=> string(17) "ucelayh@gmail.com" ["password"]=> string(5) "12345" ["loguarse"]=> string(9) "Registrar" }

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if ($_GET["accion"] == 'delete') {$metodo = strtoupper($_GET["accion"]); $id = $_GET["id"];}  

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST["loguarse"] = "Ingresar") {
                if (($_POST["username"]!== "") && ($_POST["password"] !== "")) {
                   $metodo='GET'; 
                   $username=$_POST["username"];                
                   $pass=$_POST["password"];                
                }
            }
            if ($_POST["loguarse"] == "Registrar") {
                if (($_POST["username"]!== "") && ($_POST["password"] !== "")) {
                   $metodo='POST'; 
                   $data=$_POST;                
               
                }
            }
} else {
    // Otro método HTTP
    // Puedes manejar otros métodos, como PUT, DELETE, etc., si es necesario
    // Asegúrate de manejar adecuadamente estas solicitudes
}
$api=new APIUsers();

switch ($metodo) {
    case 'GET':
            $repuesta=$api->GetBuscarUsers($username,$pass);
            // array(5) { ["id"]=> string(1) "2" ["use_name"]=> string(5) "Ramon" ["password"]=> string(5) "12345" ["mail"]=> string(17) "ucelayh@gmail.com" ["activo"]=> string(1) "1" }
            if (count($repuesta)>0) {
                $_SESSION['usuario'] = $repuesta;
            }
                 header("Location:../../index2.php");
        break;
    case 'POST':
       $repuestapost=$api->PostUsers($data);
           //imrpimir las variavles ordenadamente
      echo ('<pre>');
           var_dump($repuestapost)."<br/>";
      echo ('<pre>');
      
            // // //  header("Location:./registrarUsuario.php?reg=$repuestapost[insertado]");
        break;
    case 'PUT':
        $api->PutUsers($id);
        break;
    case 'DELETE':
        $api->DeleteUsers($id);
        break;
    default:
        echo ' Metodo no Permitido';        
        break;
}
?>