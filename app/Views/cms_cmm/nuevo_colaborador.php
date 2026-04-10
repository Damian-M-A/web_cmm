<?php helper('form'); ?>
<?= view('cms_cmm/layout/header.php') ?>
<?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger">
        <?php foreach (session('errors') as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </div>
<?php endif ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8"> 
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-plus-circle me-2"></i>Crear Nuevo Colaborador
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    <?= form_open_multipart('') ?>
                        
                        <div class="row mb-2">
                            <label for="cargos" class="form-label small fw-bold text-uppercase text-muted">Cargos</label>
                            <select class="form-select border-2" id="cargos" name="cargos">
                                <option selected disabled>Seleccionar...</option>
                                <?php foreach ($cargos as $cargo): ?>
                                    <option value="<?= $cargo['id'] ?>" <?= set_select('cargos', $cargo['id']) ?>>
                                        <?= esc($cargo['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="text-danger small"><?= validation_show_error('equipos') ?></div>
                        </div>

                        <div class="row mb-2">
                            <label for="equipos" class="form-label small fw-bold text-uppercase text-muted">Equipos</label>
                            <select class="form-select border-2" id="equipos" name="equipos">
                                <option selected disabled>Seleccionar...</option>
                                <?php foreach ($equipos as $equipo): ?>
                                    <option value="<?= $equipo['id'] ?>" <?= set_select('equipos', $equipo['id']) ?>>
                                        <?= esc($equipo['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="text-danger small"><?= validation_show_error('equipos') ?></div>
                        </div>

                        <hr class="text-light">

                        <div class="mb-3">
                            <label for="titulo" class="form-label small fw-bold text-uppercase text-muted">Título del Artículo</label>
                            <input type="text" class="form-control form-control-lg border-2" id="titulo" name="titulo" 
                                   value="<?= set_value('nombre') ?>" maxlength="100" placeholder="Juanito Alcachofa">
                            <div class="text-danger small"><?= validation_show_error('nombre') ?></div>
                        </div>
                        <div class="mb-4">
                            <label for="texto" class="form-label small fw-bold text-uppercase text-muted">Profesión</label>
                            <textarea class="form-control border-2" id="texto" name="texto" rows="8" 
                                      placeholder="Escribe la profesión del colaborador aqui..."><?= set_value('profesion') ?></textarea>
                            <div class="text-danger small"><?= validation_show_error('profesion') ?></div>
                        </div>

                        <div class="mb-4">
                            <label for="texto" class="form-label small fw-bold text-uppercase text-muted">Descripción</label>
                            <textarea class="form-control border-2" id="texto" name="texto" rows="8" 
                                      placeholder="Escribe la descripción del colaborador aqui..."><?= set_value('descripcion') ?></textarea>
                            <div class="text-danger small"><?= validation_show_error('descripcion') ?></div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border">
                                    <label for="imagen" class="form-label small fw-bold text-uppercase text-muted">
                                        <i class="bi bi-image me-1"></i> Imagen Colaborador
                                    </label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                                    <div class="form-text text-xs text-muted">JPG, PNG o JPEG (Máx. 2MB)</div>
                                    <div class="text-danger small"><?= validation_show_error('imagen') ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 border-top pt-4">
                            <a href="<?= base_url('admin/noticias') ?>" class="btn btn-danger px-4">
                                <i class="bi bi-x-lg me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success px-4 fw-bold shadow-sm">
                                <i class="bi bi-check-lg me-1"></i> Guardar
                            </button>
                        </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('cms_cmm/layout/footer.php') ?>