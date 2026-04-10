<?= view('cms_cmm/layout/header.php') ?>
<main role="main">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <a class="btn btn-secondary shadow-sm" href="<?= base_url('admin/dashboard') ?>">
                <i class = "bi bi-skip-backward-fill"></i> Volver
            </a>

        </div>
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-dark">Informacion CMM</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="text-align: center;">Nombre</th>
                                <th style="text-align: center;"> Texto</th>
                                <th class="text-end pe-4">Acciones</th>
                            </tr>
                        </thead>
                            <?php foreach ($informacion as $info): ?>
                        <tbody>
                            
                            <tr>
                                <td style="text-align: center;"> <?= $info['tipo'] ?></td>
                                <td style="text-align: justify;"> <?= word_limiter($info['texto'], 10)?></td>
                                <td class="text-end pe-4">
                                    <a href="<?= base_url('') ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
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