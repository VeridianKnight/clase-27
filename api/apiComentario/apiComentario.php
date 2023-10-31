<?php

include './ABMcomentario.php';


class APIComentario{
function GetComentario(){ 
    //traigo con la estarioca el valor del producto de acuerdo a id recibido por el gee
    $resultado= ABMcomentario::ListarComentario();
    return $resultado ;    
}
function PostComentario($datos){  
    $resultado=ABMcomentario::AgregarComentario($datos);
    return $resultado;
    //%datos es ahora un array asociativo que lo pasamos directamente como pareametro
    // si todo andubo bien el condicional nos da el valor del ultimo valr del id regoistrado
}
function DeleteComentario($id){
    // // traigo el producto de acuerdo a id recibido 
    // // el valor traido es un booleano
    $resultado= ABMcomentario::EliminarComentario($id);
    if ($resultado) {
      return $resultado;
    }else{
        return 'error';
    }    
}
function ActualizarComentario($id, $datos){
    $resultado= ABMcomentario::ActualizarComentario($id, $datos);
    if ($resultado) {
       return $resultado;
    }else{
        return 'error';
    }    
}
function GetBuscarComentario($id){ 
    $resultado= ABMcomentario::BuscarComentario($id);
    //si $resultado trae desde el return u false es porqie no localizo el registro
    //caso contrario muestra el json    
    if ($resultado) {
        $controlResultado=count($resultado);
        if ($controlResultado>0) {
           return ($resultado);
        }
    }else{
        return(array('mensaje'=>'El ELEMENTO no fue localizado'));
    }
}
}