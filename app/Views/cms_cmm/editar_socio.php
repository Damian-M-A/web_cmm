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
                        <?= form_open_multipart('admin/socios/actualizar-socio/' .$socio['id']); ?>
                            
                            <div class="mb-4">
                                <label for="nombre" class="form-label small fw-bold text-uppercase text-muted">Nombre</label>
                                <input type="text" 
                                    name="nombre" 
                                    id="nombre" 
                                    class="form-control form-control-lg border-2"
                                    value="<?= set_value('nombre', $socio['nombre']) ?>" 
                                    required>
                                
                            </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border h-100">
                                    <label class="form-label small fw-bold text-uppercase text-muted">
                                        <i class="bi bi-image me-1"></i> Imagen Principal
                                    </label>
                                    
                                    <?php if (!empty($socio['imagen'])): ?>
                                        <div class="mb-2 position-relative">
                                            <img src="<?= base_url(['img', $socio['imagen']]) ?>" alt="Actual" class="img-thumbnail shadow-sm" style="max-height: 100px;">
                                            <div class="small text-muted mt-1 italic">Imagen actual</div>
                                        </div>
                                    <?php endif; ?>

                                    <input type="file" class="form-control form-control-sm" id="imagen" name="imagen" accept="image/*">
                                    <div class="form-text text-xs text-muted">Subir nueva para cambiar (Máx. 2MB)</div>
                                    <div class="text-danger small"><?= validation_show_error('imagen') ?></div>
                                </div>
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