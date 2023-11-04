<?php

switch ($request_method) {
    case 'GET':
        require_once("./app/tareas/login/view/login.view.php");
        break;

    case 'POST':
        include_once("./app/tareas/repository/usuario.repository.php");

        $user_name  = $_POST['usuario'];
        $password   = $_POST['password'];

        $usuario = new Usuario( 0, usuario:$user_name, password:$password);

        $ur = UsuariosRepository::getInstance();

        $usuario = $ur->loginUsuario($usuario);

        if ( $usuario->getId() == 0 ) {
            header("Location: /NayMVC/tareas/login?error=El usuario o contraseña son incorrectos");
            break;
        }

        $_SESSION['userId'] = $usuario->getId();
        $_SESSION['user_name'] = $usuario->getUsuario();

        header("Location: /NayMVC/tareas/lista");
        break;

    default:
        # code...
        break;
}
