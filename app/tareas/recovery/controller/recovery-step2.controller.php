<?php

    switch ($request_method) {
        case 'GET':
            require_once("./app/tareas/recovery/view/recover-step2.view.php");
            break;
        
        case 'POST':
            include_once("./app/tareas/repository/usuario.repository.php");
            if ( !isset( $_POST['password'] ) ){
                header("Location: /NayMVC/tareas/recovery-s2?error=No ingresó contraseña");
                break;
            }

            $id   = $_SESSION['recovery_user_id'];
            $user = $_SESSION['recovery_user_name'];
            $pass = $_SESSION['recovery_user_pass'];

            $usuario = new Usuario($id, $user, $pass);
            $password = $_POST['password'];

            $usuario->setPassword($password);

            if ( !UsuariosRepository::getInstance()->changeUsuarioPassword($usuario) ){
                header("Location: /NayMVC/tareas/recovery?error=No fue posible cambiar la contraseña, inténtelo más tarde");
                break;
            }
            session_destroy();
            header("Location: /NayMVC/tareas/login");
            break;
        default:
            # code...
            break;
    }