<?php echo view('layout/header'); ?>

<main role="main" class="container pt-5 mt-5">
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="position-relative">
                        <img src="<?= base_url('img/55053-cms.jpeg') ?>" 
                             class="img-fluid rounded-4 shadow-lg" 
                             alt="Nuestra Historia"
                             style="width: 100%; height: 400px; object-fit: cover;">
                    </div>
                </div>
                <div class="col-md-6 ps-md-5">
                    
                    <h2 class="display-5 fw-bold mb-4">Sobre Nosotros</h2>
                    <div class="text-muted lh-lg">
                        <p style="text-align: justify;"><?= $Quienes['texto']; ?></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card-glass h-100 p-4 border-0 shadow-sm">
                        <div class="d-flex align-items-center mb-3">
                            <h3 class="fw-bold m-0">Nuestra Misión</h3>
                        </div>
                        <div class="text-muted lh-lg">
                            <p style="text-align: justify;"><?= $mision['texto']; ?></p> 
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card-glass h-100 p-4 border-0 shadow-sm">
                        <div class="d-flex align-items-center mb-3">

                            <h3 class="fw-bold m-0">Nuestra Visión</h3>
                        </div>
                        <div class="text-muted lh-lg">
                            <p style="text-align: justify;"> <?= $vision['texto']; ?></p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?= view('layout/footer') ?>