<?= view('cms_cmm/layout/header.php') ?>
<main role="main">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a class="btn btn-secondary shadow-sm" href="<?= base_url('admin/dashboard') ?>">
                <i class = "bi bi-skip-backward-fill"></i>Volver
            </a>
            <a class="btn btn-primary shadow-sm" href="<?=base_url('admin/noticias/nueva-noticia')?>">
                <i class="bi bi-plus-lg me-1"></i> Añadir nueva noticia
            </a>
            <a class="btn btn-info shadow-sm" href="<?=base_url('admin/categorias')?>">
                <i class="bi bi-bookmark-fill"></i> Ver categorias
            </a>

        </div>
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-dark">Lista de Noticias</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="text-align: center;">categoria</th>
                                <th style="text-align: center;">Titulo</th>
                                <th style="text-align: center;">Contenido</th>
                                <th style="text-align: center;">Estado</th>
                                <th style="text-align: center;">Subido_el</th>
                                <th class="text-end pe-4">Acciones</th>
                            </tr>
                        </thead>
                            <?php foreach ($noticias as $noticia): ?>
                        <tbody>
                            
                            <tr>
                                <td style="text-align: center;"> <?= $noticia['categorias'] ?></td>
                                <td style="text-align: justify;"> <?= word_limiter($noticia['titulo'], 10) ?></td>
                                <td style="text-align: justify;"><?= word_limiter($noticia['contenido'], 10) ?></td>
                                <?php if ($noticia['activo'] == 't'): ?>
                                <td style="text-align: center;"> Activo </td>
                                <?php else: ?>
                                <td style="text-align: center;"> Desactivado </td>
                                <?php endif; ?>
                                <td style="text-align: center;"><?= date('d/m/Y', strtotime($noticia['subido_el'])) ?></td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end align-items-center gap-2">
                                        <a href="<?= base_url('admin/noticias/actualizar-noticia/'.  $noticia['id']) ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="<?= base_url('admin/noticias/eliminar/'.$noticia['id']) ?>" method="POST" 
                                            onsubmit="return confirm('¿Estás seguro de eliminar esta noticia?')" class="m-0">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?= view('cms_cmm/layout/footer.php') ?>