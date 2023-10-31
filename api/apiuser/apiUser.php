<?php

include './abmUsers.php';

class APIUsers{
function GetUsers(){ 
    //traigo con la estarioca el valor del producto de acuerdo a id recibido por el gee
    $resultado= ABMusers::ListarUser();
 
}
function PostUsers($data){
$resultado=ABMusers::AgregarUser($data);
return ($resultado) ;
// array(2) { ["insertado"]=> bool(true) ["ultimo"]=> string(1) "5" }
}
function DeleteUsers($id){
   
}
function PutUsers($id){
  
}
function GetBuscarUsers($username,$pass){ 
$resultado=ABMusers::RegresarUsuario($username,$pass);
return $resultado;

}




}