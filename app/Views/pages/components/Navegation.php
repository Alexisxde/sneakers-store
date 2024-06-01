<nav class='navbar navbar-expand-lg bg-white p-2'>
  <div class='container-fluid'>
    <div class='fw-bold text-center fs-4 m-2'>
      <a class='logo' href='<?= base_url() ?>'>SNEAKERS</a>
    </div>
    <button class='navbar-toggler' data-bs-target='#navbarSupportedContent' data-bs-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class='bi bi-list text-black fs-1'></i>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <div class='ms-auto'>
        <ul class='navbar-nav text-center'>
          <li class='nav-item'>
            <a class='nav-link' href='<?= base_url('about-us') ?>'>NOSOTROS</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='<?= base_url('contacts') ?>'>CONTACTO</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='<?= base_url('commercialization') ?>'>COMERCIALIZACIÓN</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='<?= base_url('sneakers') ?>'>SNEAKERS</a>
          </li>
          <?php if (session('logged_in') && session('rol') === 'admin') : ?>
            <li class='nav-item'>
              <a class='nav-link' href='<?= base_url('users') ?>'>USUARIOS</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
      <div class='nav-btns ms-auto text-center'>
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class='px-4 py-2'><i class='bi bi-cart4'></i></button>
        <?php if (session('logged_in')) : ?>
          <button><a href="<?= base_url('logout') ?>" class='button__black'>CERRAR SESIÓN</a></button>
        <?php else : ?>
          <button><a href="<?= base_url('login') ?>" class='button__black'>INGRESAR</a></button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>