<?php echo view('layout/header'); ?>

<main role="main" class="container py-3">
    <div class="container mt-3">
            <div class="row g-4 justify-content-center"> 
        <?php foreach ($colaboradores as $colab): ?>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card-colaborador h-100"> <div class="card-glass-profile text-center p-4">
                        
                        <div class="profile-image-container mb-3">
                            <img src="<?= base_url(['img',  $colab['imagen']]) ?>" 
                                 class="img-profile" 
                                 alt="<?= $colab['nombre'] ?>">
                        </div>
                        
                        <h5 class="fw-bold mb-1 text-dark"><?= $colab['nombre'] ?></h5>
                        
                        <span class="badge-cargo mb-3">
                            <?= $colab['cargo'] ?? 'Colaborador' ?>
                        </span>
                        
                        <p class="text-muted small px-2">
                            <?= word_limiter($colab['descripcion'],20)?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>
    </div>

</main>

<?= view('layout/footer') ?>