<?php $session = session() ?>
<header>
  <nav class='navbar navbar-expand-lg bg-white p-2'>
    <div class='container-fluid'>
      <div class='fw-bold text-center fs-4 m-2'>
        <a class='logo' href='<?= base_url() ?>'>SNEAKERS</a>
      </div>
      <button class='navbar-toggler' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'>
        <i class='bi bi-list text-black fs-1'></i>
      </button>
      <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <div class='ms-auto'>
          <ul class='navbar-nav text-center'>
            <?php if (isset($session->username) && $session->rol === 'admin') : ?>
              <li class='nav-item'>
                <a class='nav-link' href='<?= base_url('sneakers') ?>'>VER SNEAKERS</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' href='<?= base_url('users') ?>'>VER USUARIOS</a>
              </li>
            <?php else : ?>
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
            <?php endif; ?>
          </ul>
        </div>
        <div class='nav-btns ms-auto text-center'>
          <button class='px-4 py-2'><i class='bi bi-cart4'></i></button>
          <?php if (isset($session->username)) : ?>
            <button><a href="<?= base_url('logout') ?>" class='button__black'>CERRAR SESIÓN</a></button>
          <?php else : ?>
            <button><a href="<?= base_url('login') ?>" class='button__black'>INGRESAR</a></button>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>
</header>