<footer class="footer-corporate">
  <div class="container">
    <div class="row g-3">
      <div class="col-md-3">
        <div class="footer-logo-symbol">
          <img src="<?= base_url('img/marca.png') ?>" alt="Logo CMM" style="max-width: 100%; height: auto;">
        </div>
        <p class="mt-2" style="text-align: justify;">Nuestra misión es desarrollar capacidades para enfrentar los problemas de la contaminación del aire y el cambio climático en Latinoamérica.</p>
        <div class="mt-3 d-flex gap-3">
          <i class="bi bi-geo-alt-fill text-accent"></i> <span>Avenida El Alfalfal 471,Bodega 229 ,Lampa, Región Metropolitana, Chile</span>
        </div>
      </div>
      <div class="col-md-3 col-sm-6"></div>
      <div class="col-md-3 col-sm-6"></div>
      <div class="col-md-3 col-sm-6 py-4">
        <h6 class="heading7">Contacto</h6>
        <p><i class="bi bi-envelope-fill me-2 text-accent"></i>cmmolina@cmmolina.cl</p>
        <p><i class="bi bi-clock-fill me-2 text-accent"></i>Lun - Vie | 08:00 - 17:00</p>
        <div class="mt-3 d-flex gap-3">
            <a href="https://www.instagram.com/centromariomolina.cl/" class="text-white-50" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-instagram fs-5"></i>
            </a>

            <a href="https://www.linkedin.com/company/centro-mario-molina-chile/" class="text-white-50" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-linkedin fs-5"></i>
            </a>
          
        </div>
      </div>
    </div>
    <hr class="mt-4 opacity-25">
    <div class="text-center small opacity-75">
      © <?= date('Y') ?> Centro Mario Molina - Investigación & Desarrollo. Todos los derechos reservados.
    </div>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  (function() {
    const nav = document.querySelector('.navbar-apple-glass');
    if (nav) {
      window.addEventListener('scroll', () => {
        if (window.scrollY > 25) {
          nav.classList.add('scrolled');
        } else {
          nav.classList.remove('scrolled');
        }
      });
    }
    document.querySelectorAll('a[href="#"]').forEach(link => {
      link.addEventListener('click', (e) => e.preventDefault());
    });
  })();
</script>
</body>
</html>