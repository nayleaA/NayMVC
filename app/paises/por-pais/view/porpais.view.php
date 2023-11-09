<h1 class="text-center">App Paises</h1>
<hr>
<main class="row">
    <!-- Menu -->
    <section class="col-12 col-sm-6 col-md-4 col-lg-3">
        <?php
            require_once("./app/paises/common/menu/menu.php");
        ?>
    </section>

    <!-- Container -->
    <section class="col">
        <div class="col-12">
            <h3>Paises</h3>
            <hr>
            <form action="" method="post">

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="country" id="country" placeholder=" escribe un nombre de un  pais" required>
                    <label class="form-label" for="usuario">Pais</label>
                </div>
            </form>
        </div>
    </section>
</main>