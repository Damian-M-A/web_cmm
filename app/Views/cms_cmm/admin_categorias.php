<?= view('cms_cmm/layout/header.php') ?>
<main role="main">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a class="btn btn-secondary shadow-sm" href="<?= base_url('admin/noticias') ?>">
                <i class = "bi bi-skip-backward-fill"></i>Volver
            </a>
            <a class="btn btn-primary shadow-sm" href="<?=base_url('')?>">
                <i class="bi bi-plus-lg me-1"></i> Añadir nueva categoria
            </a>
        </div>
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-dark">Lista de categorias</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Nombre</th>
                                <th class="text-end pe-4">Acciones</th>
                            </tr>
                        </thead>
                            <?php foreach ($categorias as $categoria): ?>
                        <tbody>
                            
                            <tr>
                                <td style="text-align: center;"> <?= $categoria['id'] ?></td>
                                <td style="text-align: justify;"> <?= $categoria['nombre']?></td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end align-items-center gap-2">
                                        <a href="<?= base_url('') ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
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