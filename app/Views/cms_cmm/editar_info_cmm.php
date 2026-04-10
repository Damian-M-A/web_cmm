<?php helper('form'); ?>
<?= view('cms_cmm/layout/header.php') ?>

<main class="flex-grow-1">
    <div class="container py-5">
        <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger shadow-sm mb-4">
                <ul class="mb-0">
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
        <div class="row justify-content-center d-flex">
            <div class="col-lg-8"> 
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="mb-0 fw-bold text-primary">
                            <i class="bi bi-plus-circle me-2"></i>Editando Informacion CMM
                        </h5>
                    </div>
                    
                    <div class="card-body p-4">
                        <?= form_open('admin/info-cmm/actualizar/'. $informacion['id']); ?>
                            
                            <div class="mb-4">
                                <label for="nombre" class="form-label small fw-bold text-uppercase text-muted">Contenido</label>
                                <textarea class="form-control border-2" id="texto" name="texto" rows="8"><?= set_value('texto', $informacion['texto']) ?></textarea>
                                <div class="text-danger small"><?= validation_show_error('texto') ?></div>
                                
                            </div>

                            <div class="d-flex justify-content-end gap-2 border-top pt-4">
                                <a href="<?= base_url('admin/info-cmm') ?>" class="btn btn-outline-danger px-4">
                                    <i class="bi bi-x-circle me-1"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-success px-4 fw-bold shadow-sm">
                                    <i class="bi bi-check-lg me-1"></i> Guardar
                                </button>
                            </div>

                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<?= view('cms_cmm/layout/footer.php') ?>