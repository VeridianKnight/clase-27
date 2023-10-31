<?php
    session_destroy();
    session_unset();
    $_SESSION['usuario']=array();
         header("Location:./index.php");
$nombre ='';
$email = '';
$id_usuario ='';
?>