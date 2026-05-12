<?php echo view('layout/header'); ?>

<main role="main" class="container pt-5 pb-3 mt-4">
    <div class="container mt-3">
        <div class="row g-4 justify-content-center"> 
            <?php foreach ($colaboradores as $colab): ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card-colaborador h-100"> <div class="card-glass-profile text-center p-4">
                            
                            <div class="profile-image-container mb-3">
                                <img src="<?= base_url(['img',  $colab['imagen']]) ?>" 
                                    class="img-profile" 
                                    alt="<?= $colab['nombre'] ?>">
                            </div>
                            
                            <h5 class="fw-bold mb-1 text-dark"><?= $colab['nombre'] ?></h5>
                            
                            <span class="badge-cargo mb-3">
                                <?= $colab['cargo'] ?? 'Colaborador' ?>
                            </span>
                            
                            <p class="text-muted small px-2">
                                <?= word_limiter($colab['descripcion'],20)?>
                            </p>
                            <button type="button" 
                                class="btn btn-sm btn-outline-primary btn-ver-perfil" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalColaborador"
                                data-nombre="<?= $colab['nombre'] ?>"
                                data-cargo="<?= $colab['cargo'] ?? 'Colaborador' ?>"
                                data-descripcion="<?= $colab['descripcion'] ?>"
                                data-imagen="<?= base_url(['img', $colab['imagen']]) ?>">
                                Ver Mas
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            
        </div>
    </div>

</main>
<div class="modal fade" id="modalColaborador" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="m-nombre">Nombre del Colaborador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="m-imagen" src="" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #eee;">
                <h6 id="m-cargo" class="text-primary fw-bold">Cargo</h6>
                <hr>
                <p id="m-descripcion" class="text-muted"></p>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const modalColab = document.getElementById('modalColaborador');
    modalColab.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const nombre = button.getAttribute('data-nombre');
        const cargo = button.getAttribute('data-cargo');
        const descripcion = button.getAttribute('data-descripcion');
        const imagen = button.getAttribute('data-imagen');
        modalColab.querySelector('#m-nombre').textContent = nombre;
        modalColab.querySelector('#m-cargo').textContent = cargo;
        modalColab.querySelector('#m-descripcion').textContent = descripcion;
        modalColab.querySelector('#m-imagen').src = imagen;
    });
});
</script>

<?= view('layout/footer') ?>
