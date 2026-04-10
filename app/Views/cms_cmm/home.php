<?= view('cms_cmm/layout/header.php') ?>

<main role="main">
    <section id="Noticias" class="py-2">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="text-secondary border-bottom pb-2">
                        <span class="fw-bold text-dark">Seleccione</span> / Items a administrar
                    </h5>
                </div>
            </div>

            <div class="row g-3 justify-content-center"> 
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card h-100 text-center shadow-sm border-0">
                        <img src="<?= base_url('img/web.webp')?>" class="card-img-top" alt="Sitio">
                        <div class="card-body">
                            <a href="<?= base_url()?>" type="button" class="btn btn-outline-info btn-sm fw-bold">Ver Sitio</a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card h-100 text-center shadow-sm border-0">
                        <img src="<?= base_url('img/articulo.jpg')?>" class="card-img-top" alt="Artículos">
                        <div class="card-body">
                            <a href="<?= base_url('admin/noticias') ?>" type="button" class="btn btn-outline-info btn-sm fw-bold">Ver Noticias</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card h-100 text-center shadow-sm border-0">
                        <img src="<?= base_url('img/colaboradores.png')?>" class="card-img-top" alt="Colaboradores">
                        <div class="card-body">
                            <a href="<?= base_url('admin/colaboradores') ?>" type="button" class="btn btn-outline-info btn-sm fw-bold">Ver Colaboradores</a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card h-100 text-center shadow-sm border-0">
                        <img src="<?= base_url('img/ajustes.jpeg')?>" class="card-img-top" alt="Ajustes">
                        <div class="card-body">
                            <a href="<?= base_url('admin/info-cmm') ?>" type="button" class="btn btn-outline-info btn-sm fw-bold">Ver Información CMM</a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card h-100 text-center shadow-sm border-0">
                        <img src="<?= base_url('img/socios-28285184.jpg')?>" class="card-img-top" alt="Socios">
                        <div class="card-body">
                            <a href="<?= base_url('admin/socios') ?>" type="button" class="btn btn-outline-info btn-sm fw-bold">Ver Partners</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr class="mt-5">
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?= view('cms_cmm/layout/footer') ?>

</body>
</html>