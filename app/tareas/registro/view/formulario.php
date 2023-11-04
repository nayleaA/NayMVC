<h1 class="text-center">Nueva tarea</h1>
<hr>
<?php
if (isset($query_params)) {
    $error = $query_params['error'];
    echo "
            <div id='alerta'>
                <div class='alert alert-danger alert-dismissable fade show'>
                    <strong>Error:</strong> {$error}
                </div>
                <hr>
            </div>
        ";
}
?>
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
                    <a href="/mvc/tareas/log-out" class="btn btn btn-outline-link" title="Cerrar Sesión"><i class="bi bi-box-arrow-left"></i></a>
                </p>
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item bg-primary">
                <a href="/mvc/tareas/registro" class="btn btn-link text-white">Nueva tarea</a>
            </li>
            <li class="list-group-item">
                <a href="/mvc/tareas" class="btn btn-link">Mis tareas</a>
            </li>
        </ul>
    </div>
    <div class="col">
        <h3 class="text-center">Tarea</h3>
        <hr>
        <form action="" method="post">
            <div class="form-floating mt-3">
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="" required>
                <label for="titulo">Titulo tarea</label>
            </div>

            <div class="form-floating">
                <textarea class="form-control" name="descripcion" id="descripcion" placeholder="" required></textarea>
                <label for="descripcion">Descripcion</label>
            </div>

            <div class="form-floating">
                <select class="form-select" name="status" id="status" aria-label="Floating" required>
                    <option selected hidden></option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Retrasado">Retrasado</option>
                    <option value="Completado">Completado</option>
                </select>
                <label for="status">Status</label>
            </div>

            <button type="submit" class="btn btn-primary mt-3">
                Guardar
            </button>
        </form>
    </div>
</section>
<script type src="./app/tareas/registro/view/js/formulario.js"></script>

<script>
    setTimeout(() => {
        let alerta = document.getElementById('alerta');
        if (alerta)
            alerta.remove();
    }, 4000);
</script>