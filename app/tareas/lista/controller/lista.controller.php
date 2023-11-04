<?php

    switch ($request_method) {
        case 'GET':
            require_once("./app/tareas/lista/view/lista.php");
            break;
        
        default:
            header("Location: .");
            break;
    }
?>