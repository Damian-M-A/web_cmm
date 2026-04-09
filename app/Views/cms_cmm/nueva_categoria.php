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
                        <i class="bi bi-plus-circle me-2"></i>Crear Nuevo Artículo
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    <?php echo form_open('guardar-categoria');?>
                    <p>
                        <?php echo form_label('Nombre','nombre');?>
                        <?php echo form_input('nombre','',['id'=>'nombre']);?>
                    </p>
                    <p>
                        <?php echo form_submit('submit','GUARDAR');?>
                    </p>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('cms_cmm/layout/footer.php') ?>