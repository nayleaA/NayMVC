<section class="vh-100">
    <div class="container px-5 px-sm-2 h-100 py-3">
        <div class="row align-items-center justify-content-center h-100">
            <div class="card p-4 col-11 col-sm-8 col-lg-7 border-black align-self-center">
                <div class="card-body text-center">

                    <?php
                        if (isset($query_params)) {
                            $error = $query_params['error'];
                            echo "
                                <div id='alerta'>
                                    <div class='alert alert-danger alert-dismissable fade show'>
                                        <strong>Atención:</strong> {$error}
                                    </div>
                                    <hr>
                                </div>
                            ";
                        }
                    ?>

                    <div class="row  align-items-center mb-3">
                        <i class="col-12 col-md-12 col-lg-3"> <img src="/NayMVC/app/assets/logo.png" width="150px" alt="Logo" srcset="" /></i>
                        <span class="h1 fw-bold mb-0 col">Bienvenido</span>
                    </div>
                    <hr>
                    <h5 class="fw-normal mb-3 pb-3">Recuperación de contraseña</h5>
                    <form action="" method="post">

                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="usuario" id="usuario" placeholder="" required>
                                <label class="form-label" for="usuario">Nombre de usuario</label>
                            </div>

                        <button class="btn btn-outline-primary" type="submit"><?php echo isset( $user_name ) ? "Cambiar contraseña" : "Buscar"; ?></button>
                    </form>

                    <p class="mb-5 pb-lg-2" style="color: #393f81;">
                        ¿Ya tienes cuenta? <a href="/NayMVC/tareas/login" style="color: #393f81;">Inicia sesión aquí</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    setTimeout(() => {
        let alerta = document.getElementById('alerta');
        if (alerta)
            alerta.remove();
    }, 7000);
</script>