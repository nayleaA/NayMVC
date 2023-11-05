<?php

    switch ($request_method) {
        case 'GET':
            require_once("./app/tareas/recovery/view/recovery.view.php");
            break;
        
        case 'POST':
            include_once("./app/tareas/repository/usuario.repository.php");
            if ( !isset( $_POST['usuario'] ) ) {
                header("Location: /NayMVC/tareas/recovery?error=Asegurese de ingresar un usuario válido");
                break;
            }

            $user_name = $_POST['usuario'];
            $usuario = UsuariosRepository::getInstance()->findUsuarioByUsuario($user_name);

            if ( !$usuario ){
                header("Location: /NayMVC/tareas/recovery?error=No fue posible encontrar al usuario {$user_name}, revise su escritura e intente de nuevo");
                break;
            }

            $_SESSION['recovery_user_id']   = $usuario->getId();
            $_SESSION['recovery_user_name'] = $usuario->getUsuario();
            $_SESSION['recovery_user_pass'] = $usuario->getPassword();
            
            header("Location: /NayMVC/tareas/recovery-s2");
            break;
        default:
            # code...
            break;
    }