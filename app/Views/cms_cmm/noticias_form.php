<?php helper('form'); ?>
<?= view('cms_cmm/layout/header.php') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8"> 
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-plus-circle me-2"></i>Crear Nuevo Artículo
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    <?= form_open_multipart('admin/noticias/guardar-noticia') ?>
                        
                        <div class="row mb-2">
                            <label for="tipo_articulo" class="form-label small fw-bold text-uppercase text-muted">Tipo de Artículo</label>
                            <select class="form-select border-2" id="tipo_articulo" name="tipo_articulo">
                                <option selected disabled>Seleccionar...</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?= $categoria['id'] ?>" <?= set_select('tipo_articulo', $categoria['id']) ?>>
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
                                   value="<?= set_value('titulo') ?>" maxlength="100" placeholder="Escribe un título llamativo...">
                            <div class="text-danger small"><?= validation_show_error('titulo') ?></div>
                        </div>

                        <div class="mb-4">
                            <label for="texto" class="form-label small fw-bold text-uppercase text-muted">Cuerpo del Artículo</label>
                            <textarea class="form-control border-2" id="texto" name="texto" rows="8" 
                                      placeholder="Escribe el contenido aquí..."><?= set_value('texto') ?></textarea>
                            <div class="text-danger small"><?= validation_show_error('texto') ?></div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border">
                                    <label for="imagen" class="form-label small fw-bold text-uppercase text-muted">
                                        <i class="bi bi-image me-1"></i> Imagen Principal
                                    </label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                                    <div class="form-text text-xs text-muted">JPG, PNG o GIF (Máx. 2MB)</div>
                                    <div class="text-danger small"><?= validation_show_error('imagen') ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border">
                                    <label for="archivo_pdf" class="form-label small fw-bold text-uppercase text-muted">
                                        <i class="bi bi-file-earmark-pdf me-1"></i> Documento PDF
                                    </label>
                                    <input type="file" class="form-control" id="archivo_pdf" name="archivo_pdf" accept=".pdf">
                                    <div class="form-text text-xs text-muted">PDF o PPT (Máx. 5MB)</div>
                                    <div class="text-danger small"><?= validation_show_error('archivo_pdf') ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 border-top pt-4">
                            <a href="<?= base_url('admin/noticias') ?>" class="btn btn-danger px-4">
                                <i class="bi bi-x-lg me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                <i class="bi bi-check-lg me-1"></i> Publicar
                            </button>
                        </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('cms_cmm/layout/footer.php') ?>