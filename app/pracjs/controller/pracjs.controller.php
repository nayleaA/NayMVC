<?php

    switch ($request_method) {
        case 'GET':
            require_once("./app/pracjs/view/pracjs.html");
            break;
        
        default:
            # code...
            break;
    }
    ?>