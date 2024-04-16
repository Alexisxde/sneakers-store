<footer class='footer'>
  <header class='fw-bold text-center'>
    <a class='logo' id='logo'>SNEAKERS</a>
  </header>
  <section>
    <a class='btn btn-link' href='https://web.whatsapp.com'><i class='bi bi-whatsapp'></i></a>
    <a class='btn btn-link' href='https://facebook.com'><i class='bi bi-facebook'></i></a>
    <a class='btn btn-link' href='https://x.com'><i class='bi bi-twitter-x'></i></a>
    <a class='btn btn-link' href='https://instagram.com'><i class='bi bi-instagram'></i></a>
    <a class='btn btn-link' href='https://github.com/Alexisxde/store-sneakers'><i class='bi bi-github'></i></a>
  </section>
  <div class='copyright'>
    Copyright <?= date('Y') ?> © SNEAKERS. Todos los derechos reservados.
  </div>
  <div class='legal_links'>
    <a href=<?= base_url('terms-conditions') ?>>Términos y Condiciones</a>
    <a href=<?= base_url('privacy-policy') ?>>Política de privacidad</a>
  </div>
</footer>
<script>
  document.getElementById('logo').addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
</script>