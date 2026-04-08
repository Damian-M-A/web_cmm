<?php echo view('layout/header'); ?>

<style>
    .project-container {
        max-width: 800px; /* Limitar el ancho mejora la lectura */
        margin: 0 auto;
    }
    .img-detail {
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
        width: 100%;
        height: auto;
        object-fit: cover;
    }
    .project-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
    }
    /* Estilo para los elementos que vienen de la base de datos */
    .project-content p { margin-bottom: 1.5rem; }
    .project-content h2, .project-content h3 { 
        color: var(--cmm-deep); 
        margin-top: 2rem;
    }
    .meta-info {
        border-left: 3px solid var(--cmm-deep);
        padding-left: 1rem;
        color: #666;
    }
    .btn-download {
        background-color: #0084AD;
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        transition: transform 0.2s;
        text-decoration: none;
        display: inline-block;
    }
    .btn-download:hover {
        transform: translateY(-2px);
        color: white;
        opacity: 0.9;
    }
</style>

<main role="main" class="container pt-5 mt-5 pb-5">
    <article class="project-container">
        
        <header class="mb-4">
            <h1 class="display-5 fw-bold" style="color: var(--cmm-title);"><?= esc($noticia['titulo']) ?></h1>
            <div class="meta-info mt-3">
                <small class="d-block">
                    <i class="bi bi-calendar3"></i> Publicado el: <?= date('d/m/Y', strtotime($noticia['subido_el'])) ?>
                </small>
            </div>
        </header>

        <div class="text-center">
            <?php 
            $rutaImg = !empty($noticia['imagen']) 
                       ? base_url(['img',  $noticia['imagen']]) 
                       : base_url('img/generica.jpg'); 
            ?>
            <img src="<?= $rutaImg ?>" class="img-detail" alt="<?= esc($noticia['titulo']) ?>">
        </div>

        <div class="project-content" style="text-align: justify;">
            <?= $noticia['contenido'] ?>
        </div>

        <footer class="mt-5 pt-4 border-top">
            <?php if (!empty($noticia['adjunto'])): ?>
                <div class="alert alert-light d-flex align-items-center justify-content-between p-4 shadow-sm">
                    <div>
                        <h6 class="mb-1 fw-bold">Documentación Relacionada</h6>
                        <p class="mb-0 small text-muted">Descarga los archivos relaciados a la noticia.</p>
                    </div>
                    <a href="<?= base_url(['files', $noticia['adjunto']]) ?>" class="btn-download" target="_blank">
                        <i class="bi bi-file-earmark-pdf"></i> Descargar Adjunto
                    </a>
                </div>
            <?php endif; ?>

            <div class="mt-4">
                <a href="<?= base_url('noticias') ?>" class="text-decoration-none text-muted">
                    <i class="bi bi-arrow-left"></i> Volver al listado de noticias
                </a>
            </div>
        </footer>

    </article>
</main>

<?= view('layout/footer') ?>