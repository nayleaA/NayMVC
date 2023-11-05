<h1 class="text-center">App Paises</h1>
<hr>
<main class="row">
    <!-- Menu -->
    <section class="col-12 col-sm-6 col-md-4 col-lg-3">
        <?php
            require_once("./app/paises/common/menu/menu.php");
        ?>
    </section>

    <section class="col">
        <div class="col-12">
            <h3>Paises</h3>
            <hr>
        </div>
        <div id="button-container" class="col-12 text-center"></div>
        <div id="paises-container" class="col-12 row">
            <div class="card border-primary p-1 col-12 col-sm-6 col-md-6 col-lg-4">
                <img src="https://flagcdn.com/uz.svg" alt="weas" class="card-img-top">
                <div class="card p-1 mt-2 border-secondary">
                    <h3 class="text-center">🇺🇿 Uzbekistan</h3>
                    <div class="d-flex justify-content-between">
                        <div><strong>Official:</strong></div>
                        <div class="text-end">Republic of Uzbekistan</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><strong>Native:</strong></div>
                        <div class="text-end">Республика Узбекистан</div>
                    </div>
                </div>

                <div class="card mt-2 p-1 border-secondary">
                    <div class="d-flex justify-content-between">
                        <div><strong>Capital:</strong></div>
                        <div class="text-end">Tashkent</div>
                    </div>
                </div>

                <div class="card mt-2 p-1 border-secondary">
                    <div class="d-flex justify-content-between">
                        <div><strong>Population:</strong></div>
                        <div class="text-end">34232050</div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="" class="btn btn-primary">Ver más...</a>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="/NayMVC/app/paises/por-continente/controller/porcontinente.controller.js"></script>