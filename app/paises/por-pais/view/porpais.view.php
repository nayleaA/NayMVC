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
        <h3 class="col-12 text-center">Paises</h3>
        <hr class="col-12">
        <input type="text" 
            class="col-12 form-control" 
            value=""
            placeholder="Pais"
            onkeypress = "onKeyPress(event)" autofocus>

        <hr class="col-12">
        <div id="paises-container" class="col-12 row justify-content-between">

        </div>
    </section>
</main>
<script src="/NayMVC/app/paises/por-pais/controller/porpais.controller.js"></script>
<script src="/NayMVC/app/paises/helper/renderPaises.helper.js"></script>