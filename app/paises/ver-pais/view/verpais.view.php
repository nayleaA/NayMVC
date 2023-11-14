<h1 class="text-center">Ver Pais</h1>
<hr>
 <main class="row">
    <!-- Menu -->
    <section class="col-12 col-sm-6 col-md-4 col-lg-3">
            <?php
                require_once("./app/paises/common/menu/menu.php");
            ?>
    </section>

    <section class="col">
        <div class="col-12 text-center">
            <h3 >Informacion del Pais</h3>
            <hr>
        </div>
        <div id="pais-container" class="col-12 row">
            
        </div>
    </section>

 </main>
 <script src="/NayMVC/app/paises/ver-pais/controller/verpais.controller.js"></script>