<h1 class="text-center">Nueva tarea</h1>
<hr>
<section class="row">
    <div class="col-md-4 col-lg-3 col-sm-6 col-12">
        <h3 class="text-center">Menu</h3>
        <hr>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="/mvc/tareas/registro" class="btn btn-link">Nueva tarea</a>
            </li>
            <li class="list-group-item bg-primary">
                <a href="/mvc/tareas" class="btn btn-link text-white">Mis tareas</a>
            </li>
        </ul>
    </div>
    <div class="col">
        <h3 class="text-center">Tareas</h3>
        <hr>
        <?php
            include_once("./app/tareas/repository/tareas.repository.php");

            $tareas = TareasRepository::getInstance()->getAllTareas();

            print_r($tareas);
        ?>
    </div>
</section>