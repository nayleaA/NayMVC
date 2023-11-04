<?php
    if ( !isset($path_components[2]) )
        $path_components[2] = '';
        
    switch ($path_components[2]) {
        case '':
        case 'lista':
            require_once("./app/tareas/lista/controller/lista.controller.php");
            break;

       case 'registro':
            require_once("./app/tareas/registro/controller/registro.controller.php");
            break;
        
        default:
            header("Location: /NayMVC/tareas");
            break;
    }
?>