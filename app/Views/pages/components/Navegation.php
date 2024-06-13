<nav class='navbar navbar-expand-lg bg-white p-2'>
  <div class='container-fluid'>
    <button class='navbar-toggler' data-bs-target='#navbarSupportedContent' data-bs-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class='bi bi-list text-black fs-1'></i>
    </button>
    <div class='fw-bold text-center fs-4 m-2'>
      <a class='logo' href='<?= base_url() ?>'>SNEAKERS</a>
    </div>
    <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class='navbar-toggler button-cart px-4 py-2'><i class='bi bi-cart4'></i></button>
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
          <?php if (session('logged_in')) : ?>
            <li class='nav-item'>
              <a class='nav-link' href='<?= base_url('sales') ?>'>COMPRAS</a>
            </li>
          <?php endif; ?>
          <?php if (session('logged_in') && session('rol') === 'admin') : ?>
            <li class='nav-item'>
              <a class='nav-link' href='<?= base_url('sales_admin') ?>'>VENTAS</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='<?= base_url('users') ?>'>USUARIOS</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
      <div class='nav-btns ms-auto text-center'>
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class='button-cart px-4 py-2'><i class='bi bi-cart4'></i></button>
        <?php if (session('logged_in')) : ?>
          <div class="dropdown" id="dropdown">
            <button>
              <span><i class="bi bi-person-circle"></i></span>
              <span><?= ucfirst(session('username')) ?></span>
              <span class="chevron"><i class="bi bi-chevron-down"></i></span>
            </button>
            <div id="menu" class="menu">
              <div class="menu__inner">
                <a href="<?= base_url('settings') ?>">Configuración</a>
                <a href="<?= base_url('logout') ?>">Cerrar sesión</a>
              </div>
            </div>
          </div>
        <?php else : ?>
          <button><a href="<?= base_url('login') ?>" class='button__black'>INGRESAR</a></button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
<style>
  .dropdown {
    position: relative;
    perspective: 200px;

    &:is(:hover, .open)>a {
      background: rgb(0 0 0 / 35%);
    }

    button {
      display: flex;
      align-items: center;
      gap: 10px;
      color: white;
      background: black;
      border-radius: 8px;
      border: 0;
      padding: 8px 24px;
    }

    >button {
      position: relative;
      z-index: 2;
      transition: 0.2s;
    }

    .menu {
      position: absolute;
      z-index: 1;
      width: 100%;
      padding-top: 10px;
      opacity: 0;
      scale: 0;
      right: 0;
      transform-origin: 100% 0;
      visibility: hidden;
      transition: 0.4s;

      .menu__inner {
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border-radius: 8px;
        background: black;
        gap: 2.5px;
        padding: 5px;

        a {
          color: white;
          text-decoration: none;
        }
      }

      button {
        border: 0;
        width: 100%;
        height: 56px;
        border-radius: 0;

        &:hover {
          background: rgb(0 0 0 / 26%);
        }
      }
    }

    &.open .menu {
      scale: 1;
      opacity: 1;
      visibility: visible;
    }

    &.open .chevron {
      transition: rotate 0.4s ease;
      rotate: -180deg;
    }
  }
</style>
<script>
  let dropdown = document.getElementById("dropdown")
  dropdown.addEventListener('click', () => {
    dropdown.classList.contains('open') ? dropdown.classList.remove('open') : dropdown.classList.add('open');
  })
</script>