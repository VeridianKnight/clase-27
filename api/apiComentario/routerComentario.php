<?php
session_start();
// array(5) {
    // ["username"]=>string(5) "Ramon"["autor_id"]=>string(1) "2"["title"]=>string(6) "pppppp"["content"]=>string(17) "piiiiiiiiiiiiiiii"["crearCometario"]=>string(5) "Crear"
    //   }
    
    // // // echo ('<pre>');
    // // // var_dump($_POST)."<br/>";
    // // // echo ('<pre>');
    
    include './apiComentario.php';
    include '../../conexion/conexionBadeDeDatos.php';

$metodo='';
$data[]=array();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if ($_GET["accion"] == 'delete') {$metodo = strtoupper($_GET["accion"]); $id = $_GET["id"];}  

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST["crearCometario"] === "Crear") {
                if (($_POST["post_id"] !=="") && ($_POST["autor_id"] !=="")) {
                   $metodo='POST'; 
                   $data=$_POST;   
            }
            }
} else {
    // Otro método HTTP
    // Puedes manejar otros métodos, como PUT, DELETE, etc., si es necesario
    // Asegúrate de manejar adecuadamente estas solicitudes
}

$api=new APIComentario();



switch ($metodo) {
    case 'GET':
        if ($id !== null) {
            $api->GetBuscarComentario($id);
        } else {
            $listaComentario=$api->GetComentario();
            var_dump($listaComentario);
        }
        break;
    case 'POST':
       $repuesta=$api->PostComentario($data);
     header("Location:");
     if($repuesta["insertado"]){
         require_once '../../index2.php';
     }else{
         echo 'El Registro No fue Cargado';         
     }        
        break;
    // case 'PUT':
    //     $api->PutComentario($id);
    //     break;
    case 'DELETE':
        $api->DeleteComentario($id);
        break;
    default:
        echo ' Metodo no Permitido';        
        break;
}
?>