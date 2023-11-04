<?php

    switch ($request_method) {
        case 'GET':
            require_once("./app/tareas/registro/view/formulario.php");
            break;

        case 'POST':
                include_once("./app/tareas/repository/tareas.repository.php");
    
                $idUsuario = $_SESSION['userId'];
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $status = "Pendiente";
                if ( isset( $_POST['status'] ) )
                    $status = $_POST['status'];
    
                //$tarea = new Tarea(0, $titulo, $descripcion, "");
                $tarea = new Tarea( 0, idUsuario:$idUsuario, titulo:$titulo, descripcion:$descripcion, status:$status );
    
                if ( !TareasRepository::getInstance()->saveNewTarea($tarea) ) {
                    $error = TareasRepository::getInstance()->getMysqli()->error;
                    header("Location: /NayMVC/tareas/registro?error=ERROR: {$error}");
                    // header("Location: /mvc/tareas/registro?error=ERROR: No fue posible crear la tarea");
                    break;
                }
            default:
                header("Location: /NayMVC/tareas/lista");
                break;
    }
?>