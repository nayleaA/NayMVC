<h1 class="text-center">Mis tareas</h1>
<hr>
<section class="row">
    <div class="col-md-4 col-lg-3 col-sm-6 col-12">
        <h3 class="text-center">Menu</h3>
        <hr>
        <div class="card border-primary text-center mb-3">
            <div class="card-body">
                <i class="card-img-top"> <img src="/NayMVC/app/assets/user_avatar.jpg" width="150px" alt="Logo" srcset="" /></i>
                <h3 class="card-title"><?php echo $_SESSION['user_name']; ?></h3>
            </div>
            <div class="card-footer">
                <p class="card-text" style="color: #393f81;">
                    <a href="/NayMVC/tareas/log-out" class="btn btn btn-outline-link"
                    title="Cerrar Sesión"
                    ><i class="bi bi-box-arrow-left"></i></a>
                </p>
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="/NayMVC/tareas/registro" class="btn btn-link">Nueva tarea</a>
            </li>
            <li class="list-group-item bg-primary">
                <a href="/NayMVC/tareas" class="btn btn-link text-white">Mis tareas</a>
            </li>
        </ul>
    </div>
    <div class="col row">
        <h3 class="text-center">Tareas</h3>
        <hr>
        <?php
            include_once("./app/tareas/repository/tareas.repository.php");
            $idUsuario = $_SESSION['userId'];
            $tareas = TareasRepository::getInstance()->getAllTareasByUserId($idUsuario);

            // print_r($tareas);

            for ($i=0; $i < count($tareas); $i++) {
                $color = "";
                switch ($tareas[$i]->getStatus()) {
                    case 'Pendiente':
                        $color = "primary";
                        break;

                    case 'Revisado':
                        $color = "success";
                        break;
                    
                    default:
                        $color = "danger";
                        break;
                }

                $button = "";

                if ($tareas[$i]->getStatus() != "Revisado") {
                    $button = "
                    <a class='btn btn-success btn-sm'
                        href='/NayMVC/tareas/completar?id={$tareas[$i]->getId()}' 
                        title='Marcar tarea como Completada'
                        >
                        <i class='bi bi-bookmark-check'></i>
                    </a>
                    ";
                }

                $html = "
                    <div class='col-12 mx-3'>
                        <div class='card mt-3 border-black'>
                            <div class='card-header bg-{$color}'>
                                <h4 class='card-title text-center text-white'>
                                    {$tareas[$i]->getTitulo()}
                                </h4>
                            </div>

                            <div class='card-body'>
                                <p class='card-text'>
                                    {$tareas[$i]->getDescripcion()}
                                </p>
                            </div>

                            <div class='card-footer'>
                                <div class='row justify-content-end'>
                                    <p class='col-4 card-text text-center text-{$color}'>
                                        <strong>&squf;</strong>{$tareas[$i]->getStatus()}
                                    </p>
                                    <p class='col-4 self-align-end card-text text-end'>
                                        {$button}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
                echo $html;
            }

            
        ?>
    </div>
</section>