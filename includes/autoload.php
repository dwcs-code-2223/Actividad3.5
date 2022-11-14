<?php

spl_autoload_register(function ($nombre_clase) {

    /* Cuando se usan espacios de nombres:
     * $nombre_clase incluye el nombre del espacio de nombres:  pago\TarjetaCreditoPago
     *      Cambiamos barra invertida del ns por el separador de directorios del Sist. Operativo
     */


    echo "### dirname. " . dirname(__DIR__) . "<br/>";
    //https://www.php.net/manual/en/language.constants.magic.php
    //__DIR__ The directory of the file. If used inside an include, the directory of the included file is returned
    //https://www.php.net/manual/en/function.dirname.php
    //dirname: Returns a parent directory's path
    $nombre_ruta_fichero = dirname(__DIR__) . '\\class\\' . $nombre_clase . '.php';

    //Reemplazamos \\ por el separador de directorios dependiente del Sist. Operativo:    
    $nombre_ruta_fichero = str_replace("\\", DIRECTORY_SEPARATOR, $nombre_ruta_fichero);
    echo "#### nombre ruta fichero: " . $nombre_ruta_fichero . "<br/>";

   
    if (file_exists($nombre_ruta_fichero)) {
        echo "###Existe!<br/>";
        include_once $nombre_ruta_fichero;
    }
});
