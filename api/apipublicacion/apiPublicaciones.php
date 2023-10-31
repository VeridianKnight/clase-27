<?php

include './abmPublicaciones.php';

class APIPublicacioness{
function GetPublicacioness(){ 
    //traigo con la estarioca el valor del producto de acuerdo a id recibido por el gee
    $resultado= ABMPublicaciones::ListarPublicaciones();
    echo json_encode($resultado) ;    
}
function PostPublicacioness($data){

$resultado= ABMPublicaciones::AgregarPublicaciones($data);
            if ($resultado['insertado']) {
                   return (array('mensaje'=>$resultado['insertado']));
                }else{
                      return (array('mensaje'=>'error')) ;
                    }    
                    
}
function DeletePublicacioness($id){

    $resultado= ABMPublicaciones::EliminarPublicaciones($id);
    if ($resultado) {
      return $resultado;
    }else{
       return $resultado;
    }    
}
function PutPublicacioness($id){
    $datos = json_decode(file_get_contents('php://input'), true);
    $resultado= ABMPublicaciones::ActualizarPublicaciones($id, $datos);
 
    if ($resultado) {
       echo json_encode(array('mensaje'=>'el ELEMENTO tiene nuevos valores'));
    }else{
        echo json_encode(array('mensaje'=>'El ELEMENTO no pudo ser modificado'));
    }    
}
function GetBuscarPublicacioness($id){ 

    $resultado= ABMPublicaciones::BuscarPublicaciones($id);

    if ($resultado) {
        $controlResultado=count($resultado);
        if ($controlResultado>0) {
           echo json_encode($resultado);
        }
    }else{
        echo json_encode(array('mensaje'=>'El ELEMENTO no fue localizado'));
    }
}




}