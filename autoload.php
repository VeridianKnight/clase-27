<?php
// Define una función de autoloading
function miAutoloader($clase) {
    // Transforma el nombre de la clase en la ruta del archivo
    $ruta = __DIR__ . '/clases/' . $clase . '.php';
    
    // Verifica si el archivo de la clase existe
    if (file_exists($ruta)) {
        require $ruta;
    }
}

// Registra la función de autoloading


?>