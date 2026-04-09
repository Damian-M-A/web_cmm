<?php helper('form'); ?>
<?= view('cms_cmm/layout/header.php') ?>

<div class="container py-5">
    <?php if (session()->has('errors')) : ?>
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                <?php foreach (session('errors') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <div class="row justify-content-center">
        <div class="col-lg-8"> 
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-pencil-square me-2"></i>Editar: <?= esc($noticias['titulo']) ?>
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    <?= form_open_multipart('admin/noticias/guardar-cambios/' . $noticias['id']) ?>
                        
                        <div class="row mb-2">
                            <label for="tipo_articulo" class="form-label small fw-bold text-uppercase text-muted">Tipo de Artículo</label>
                            <select class="form-select border-2" id="tipo_articulo" name="tipo_articulo">
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?= $categoria['id'] ?>" <?= set_select('tipo_articulo', $categoria['id'], ($categoria['id'] == $noticias['id_categoria'])) ?>>
                                        <?= esc($categoria['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="text-danger small"><?= validation_show_error('tipo_articulo') ?></div>
                        </div>

                        <hr class="text-light">

                        <div class="mb-3">
                            <label for="titulo" class="form-label small fw-bold text-uppercase text-muted">Título del Artículo</label>
                            <input type="text" class="form-control form-control-lg border-2" id="titulo" name="titulo" 
                                   value="<?= set_value('titulo', $noticias['titulo']) ?>" maxlength="100">
                            <div class="text-danger small"><?= validation_show_error('titulo') ?></div>
                        </div>

                        <div class="mb-4">
                            <label for="texto" class="form-label small fw-bold text-uppercase text-muted">Cuerpo del Artículo</label>
                            <textarea class="form-control border-2" id="texto" name="texto" rows="8"><?= set_value('texto', $noticias['contenido']) ?></textarea>
                            <div class="text-danger small"><?= validation_show_error('texto') ?></div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border h-100">
                                    <label class="form-label small fw-bold text-uppercase text-muted">
                                        <i class="bi bi-image me-1"></i> Imagen Principal
                                    </label>
                                    
                                    <?php if (!empty($noticias['imagen'])): ?>
                                        <div class="mb-2 position-relative">
                                            <img src="<?= base_url(['img', $noticias['imagen']]) ?>" alt="Actual" class="img-thumbnail shadow-sm" style="max-height: 100px;">
                                            <div class="small text-muted mt-1 italic">Imagen actual</div>
                                        </div>
                                    <?php endif; ?>

                                    <input type="file" class="form-control form-control-sm" id="imagen" name="imagen" accept="image/*">
                                    <div class="form-text text-xs text-muted">Subir nueva para cambiar (Máx. 2MB)</div>
                                    <div class="text-danger small"><?= validation_show_error('imagen') ?></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border h-100">
                                    <label class="form-label small fw-bold text-uppercase text-muted">
                                        <i class="bi bi-file-earmark-pdf me-1"></i> Documento Adjunto
                                    </label>

                                    <?php if (!empty($noticias['adjunto'])): ?>
                                        <div class="mb-2 d-flex align-items-center p-2 bg-white rounded border">
                                            <i class="bi bi-file-pdf text-danger fs-4 me-2"></i>
                                            <a href="<?= base_url(['files', $noticias['adjunto']]) ?>" target="_blank" class="text-decoration-none small text-truncate">
                                                Ver archivo actual
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <input type="file" class="form-control form-control-sm" id="archivo_pdf" name="archivo_pdf" accept=".pdf">
                                    <div class="form-text text-xs text-muted">Subir nuevo para reemplazar (Máx. 5MB)</div>
                                    <div class="text-danger small"><?= validation_show_error('archivo_pdf') ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 border-top pt-4">
                            <a href="<?= base_url('admin/noticias') ?>" class="btn btn-outline-danger px-4">
                                <i class="bi bi-arrow-left me-1"></i> Volver
                            </a>
                            <button type="submit" class="btn btn-success px-4 fw-bold shadow-sm">
                                <i class="bi bi-save me-1"></i> Guardar Cambios
                            </button>
                        </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('cms_cmm/layout/footer.php') ?>