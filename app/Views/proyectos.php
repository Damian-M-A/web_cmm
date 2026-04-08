<?php echo view('layout/header'); ?>

<style>
    .pagination-container ul.pagination {
        gap: 8px;
        border: none;
        padding-left: 0; 
        flex-wrap: wrap; 
        justify-content: center;
    }

    .pagination-container li.page-item {
        list-style: none;
    }

    .pagination-container li.page-item a, 
    .pagination-container li.page-item span {
        border-radius: 8px !important;
        border: 1px solid rgba(0,0,0,0.05);
        color: var(--cmm-deep);
        padding: 8px 14px; 
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        display: block;
    }

    .pagination-container li.active span {
        background-color: var(--cmm-deep) !important;
        color: white !important;
        border-color: var(--cmm-deep) !important;
    }

    
    @media (max-width: 576px) {
        .pagination-container li.page-item a, 
        .pagination-container li.page-item span {
            padding: 6px 10px;
            font-size: 14px;
        }
    }
</style>

<main role="main" class="container pt-5 mt-5">
    <section class="py-5">
        <div class="row g-4"> 
            <?php if (!empty($proyectos)): ?>
                <?php foreach($proyectos as $proyecto): ?>
                <div class="col-sm-6 col-md-4"> <div class="card-glass h-100 shadow-sm">
                        <img class="card-img-top" src="<?= !empty($proyecto['imagen']) ? base_url(['img', $proyecto['imagen']]) : base_url('img/generica.jpg') ?>" alt="sin_imagen" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold" style="color: var(--cmm-title);"><?= esc($proyecto['titulo']) ?></h5>
                            <p class="card-text text-muted"><?= word_limiter(strip_tags($proyecto['contenido']), 20) ?></p>
                            <a href="<?= base_url('proyectos/'.$proyecto['id']) ?>" class="badge-accent text-decoration-none">
                                <i class="bi bi-arrow-right-short"></i> Ver más
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>

                <div class="col-12 mt-5 mb-4">
                    <nav aria-label="Navegación de proyectos">
                        <div class="pagination-container d-flex justify-content-center">
                            <?= $pager->links('group1', 'default_full') ?>
                        </div>
                    </nav>
                </div>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="lead">No se encontraron proyectos disponibles.</p>
                </div>
            <?php endif;?>
        </div>
    </section>
</main>

<?= view('layout/footer') ?>