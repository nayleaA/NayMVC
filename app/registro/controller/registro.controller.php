<?php

    switch ($request_method) {
        case 'GET':
            require_once("./app/registro/view/getView.php");
            break;

        case 'POST':
            require_once("./app/registro/view/postView.php");
            break;
        
        default:
            header("HTTP/1.1 400 Bad Request");
            break;
    }
?>