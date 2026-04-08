
<?php
// Incluir header
echo view('layout/header');
?>

<main role="main" style="padding-top: 0;">
<!-- CARROUSEL -->
  <div id="carouselCMM" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselCMM" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselCMM" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselCMM" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselCMM" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.1), rgba(0,0,0,0.2)), url('<?= base_url('img/banner/b1.jpg') ?>'); background-size: cover;">
        <div class="carousel-caption-custom">
          <h2>Centro Mario Molina</h2>
          <p>Centro de Investigación & Desarrollo para un futuro sostenible</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.1), rgba(0,0,0,0.2)), url('<?= base_url('img/banner/b2.jpg') ?>'); background-size: cover;">
        <div class="carousel-caption-custom">
            <h2>Innovación ambiental</h2>
            <p>Calidad de vida · Medio ambiente</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.1), rgba(0,0,0,0.2)), url('<?= base_url('img/banner/b3.jpg') ?>'); background-size: cover;">
        <div class="carousel-caption-custom">
          <h2>Compromiso climático</h2>
          <p>Liderazgo en políticas de aire limpio y transición energética</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.1), rgba(0,0,0,0.2)), url('<?= base_url('img/banner/b4.jpg') ?>'); background-size: cover;">
        <div class="carousel-caption-custom">
          <h2>Ciencia aplicada</h2>
          <p>Redes de colaboración internacional</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCMM" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselCMM" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>

<!-- SECCIÓN NOTICIAS -->
<section class="py-5">
    <div class="container">
        <div class="row mb-4 align-items-end">
            <div class="col-md-8">
                <h5 class="fw-bold"><span class="border-start border-4 border-warning ps-3">Noticias</span> <span class="text-accent">Recientes</span></h5>
                <p class="text-secondary">Mantente informado sobre nuestros avances en investigación y desarrollo sostenible.</p>
            </div>
         
        </div>

        
        <div class="row g-4 d-none d-md-flex">
            <?php foreach($noticias as $noticia): ?>
            <div class="col-md-4">
                <div class="card-glass h-100">
                    <img class="card-img-top" src="<?= base_url(['img',$noticia['imagen']]) ?>" alt="sin_imagen">
                     <div class="card-body p-4">
                        <h5 class="card-title fw-bold" style="color: var(--cmm-title);"><?=$noticia['titulo'] ?></h5>
                        <p class="card-text"><?= word_limiter($noticia['contenido'], 20) ?></p>
                        <a href="<?= base_url('noticias/'.$noticia['id']) ?>" class="badge-accent">
                            <i class="bi bi-arrow-right-short"></i> Ver más
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            
        </div>
        <div id="noticiasCarousel" class="carousel slide d-block d-md-none" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <?php foreach($noticias as $key => $noticia): ?>
                    <div class="carousel-item <?= ($key === 0) ? 'active' : '' ?>">
                        <div class="card-glass">
                            <img class="card-img-top" src="<?= base_url(['img', 'img_anteriores', $noticia['imagen']]) ?>" alt="sin_imagen">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold" style="color: var(--cmm-deep);"><?= $noticia['titulo'] ?></h5>
                                <p class="card-text"><?= word_limiter(strip_tags($noticia['contenido']), 20) ?></p>
                                <a href="#" class="badge-accent"><i class="bi bi-arrow-right-short"></i> Ver más</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

   
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="<?=  base_url('noticias') ?>" class="btn btn-primary-corporate"><i class="bi bi-newspaper"></i> Ver más noticias</a>
            </div>
        </div>
    </div>
</section>
  <!-- JUMBOTRON MENSAJE EMPRESA -->


  <!-- SECCIÓN REDES DE COLABORACIÓN -->
  <section class="bg-networks py-5">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12">
          <h5 class="fw-bold" style="color: white;"><span class="border-start border-4 border-warning ps-3">Redes</span> de Colaboración</h5>
        </div>
      </div>
      <div class="row align-items-center justify-content-center g-5 ">
        <?php foreach($partners as $pa ): ?>
        <div class="col-7 col-md-2 text-center">
            <?php if (!empty($pa['url_pagina'])): ?>
                <a href="<?= $pa['url_pagina'] ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?= base_url(['img',  $pa['imagen']]); ?>" class="partner-img img-fluid" alt="sin_imagen">
                </a>
            <?php else: ?>
                <img src="<?= base_url(['img', 'img_anteriores', $pa['imagen']]); ?>" class="partner-img img-fluid" alt="sin_imagen">
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>
<script>
    // Forzar autoplay en el carrusel principal si es necesario
    var myCarousel = document.querySelector('#carouselCMM');
    if (myCarousel) {
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000,
            ride: 'carousel'
        });
    }
</script>
<?= view('layout/footer') ?>