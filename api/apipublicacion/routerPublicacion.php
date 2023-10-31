<?php
include 'apiPublicaciones.php';
// // // // include_once '../controlers/abmPublicaciones.php';


// // //    echo ('<pre>');
// // //         var_dump($_POST)."<br/>";
// // //    echo ('<pre>');

$metodo='';
$data[]=array();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if ($_GET["accion"] == 'delete') {$metodo = strtoupper($_GET["accion"]); $id = $_GET["id"];}
    if ($_GET["accion"] == 'delete') {$metodo = strtoupper($_GET["accion"]); $id = $_GET["id"];}

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // array(5) {["username"]=>string(6) "Ramon "["autor_id"]=>string(1) "2"["title"]=>string(4) "RRRR"["content"]=>string(7) "FFFFFFF"["AccionPublicacion"]=>
    //     string(5) "nueva"
    if (isset($_POST)) {
        if (isset($_POST["AccionPublicacion"])) {
            if ($_POST["AccionPublicacion"] == "Alta") {
                if (($_POST["username"] !== "") && ($_POST["autor_id"] !== "")&& ($_POST["title"] !=="")&& ($_POST["content"] !=="")) {
                    $data=$_POST;
                    $metodo='POST';                   
                }
            }
        }    
    }
} else {
    // Otro método HTTP
    // Puedes manejar otros métodos, como PUT, DELETE, etc., si es necesario
    // Asegúrate de manejar adecuadamente estas solicitudes
}


// // // // // echo $metodo;
// // // // // echo $id;

// // // // // if (isset($_GET['accion'])) {

// // // // // }
// // // // // $buscarId= explode('/',$path);

// // // // // $id=($path!=='/')? end($buscarId):null;
$api=new APIPublicacioness();



$metodo = $_SERVER['REQUEST_METHOD'];

$data=( $_POST);


switch ($metodo) {
    case 'GET':
        if ($id !== null) {
            $api->GetBuscarPublicacioness($id);
        } else {
            $api->GetPublicacioness();
        }
        break;
    case 'POST':
        $repuesta=$api->PostPublicacioness($data);                
        if ($repuesta) {
            header("Location:./publicacion.php?estado=exito");            
        }else{
            header("Location:./publicacion.php?estado=error");
        }
        break;
    case 'PUT':
        $api->PutPublicacioness($id);
        break;
    case 'DELETE':
        $api->DeletePublicacioness($id);
        break;
        
    default:
        echo ' Metodo no Permitido';        
        break;
}
?>