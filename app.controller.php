<?php
switch ($path_components[1]) {
    case '':
    case 'pracjs':
        require_once('app/pracjs/controller/pracjs.controller.php');
        break;
    
    case 'registro':
        require_once('app/registro/controller/registro.controller.php');
        break;

    case 'tareas':
        require_once("app/tareas/tareas.controller.php");
        break;
    
    case 'app-paises':
        require_once("app/paises/paises.controller.php");
        break;
        
    default:
        header("HTTP/1.1 404 Not Found");
        break;
}
?>