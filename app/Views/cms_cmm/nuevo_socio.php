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
                            <i class="bi bi-plus-circle me-2"></i>Crear Nuevo Socio
                        </h5>
                    </div>
                    
                    <div class="card-body p-4">
                        <?= form_open('admin/socios/guardar-socio'); ?>
                            
                            <div class="mb-4">
                                <label for="nombre" class="form-label small fw-bold text-uppercase text-muted">Nombre</label>
                                <input type="text" 
                                    name="nombre" 
                                    id="nombre" 
                                    class="form-control form-control-lg border-2"
                                    value="<?= set_value('nombre') ?>" 
                                    required>
                                
                            </div>
                        
                            <div class="md-4">
                                <div class="p-3 bg-light rounded-3 border">
                                    <label for="imagen" class="form-label small fw-bold text-uppercase text-muted">
                                        <i class="bi bi-image me-1"></i> Imagen Colaborador
                                    </label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                                    <div class="form-text text-xs text-muted">JPG, PNG o JPEG (Máx. 2MB)</div>
                                    <div class="text-danger small"><?= validation_show_error('imagen') ?></div>
                                </div>
                            </div>
                        

                            <div class="d-flex justify-content-end gap-2 border-top pt-4">
                                <a href="<?= base_url('admin/socios') ?>" class="btn btn-outline-danger px-4">
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