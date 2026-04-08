<?php echo view('layout/header'); ?>

<style>
    
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    
    
    .pagination-container ul.pagination {
        gap: 8px;
        justify-content: center;
        padding-left: 0;
    }
</style>

<main role="main" class="container pt-5 mt-5">
    <section class="py-5">
        <div class="row g-4">
            <?php if (!empty($transparencia)): ?>
                <?php foreach($transparencia as $trans): ?>
                <div class="col-12 col-md-4">
                    <div class="card-glass h-100 shadow-sm">
                        <img class="card-img-top" src="<?= !empty($trans['imagen']) ? base_url(['img', $trans['imagen']]) : base_url('img/generica.jpg') ?>" alt="transparencia">
                        
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold" style="color: var(--cmm-deep);"><?= esc($trans['titulo']) ?></h5>
                            
                            <p class="card-text text-muted">
                                <?= word_limiter(strip_tags($trans['contenido']), 20) ?>
                            </p>
                            
                            <a href="<?= base_url('transparencia/'.$trans['id']) ?>" class="badge-accent text-decoration-none">
                                <i class="bi bi-arrow-right-short"></i> Ver más
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="lead text-muted">No se encontraron datos de transparencia disponibles.</p>
                </div>
            <?php endif;?>
        </div>
    </section>
</main>

<?= view('layout/footer') ?>