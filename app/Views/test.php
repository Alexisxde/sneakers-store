<style>
  .logo {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 150px;
    height: 50px;
  }

  form,
  .cart-register-login {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .navbar-custom .navbar-nav .nav-link {
    color: #fff;
  }

  .navbar-custom .navbar-nav .nav-link:hover {
    color: #ccc;
  }

  a {
    font-size: 50px;
  }

  #cart:hover {
    color: #ccc;
  }

  .dropdown-item {
    color: #fff;
  }

  .btn:hover {
    color: #ccc;
  }
</style>

<header class="container-fluid p-0 m-0">
  <nav class="navbar navbar-expand-lg p-2" style="background-color: #004c8a;">
    <div class="container-fluid">
      <div class="logo">
        <a href="#">
          <img class="w-100 h-100" src="assets/img/payments/master-card.svg" alt="Logo Cazur">
        </a>
      </div>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Acerca de</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">
              Productos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #004c8a; color:#fff">
              <li><a class="dropdown-item" href="#">Medias</a></li>
              <li><a class="dropdown-item" href="#">Pins</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Ofertas</a></li>
            </ul>
          </li>
        </ul>
        <div class="ms-auto">
          <form>
            <input class="form-control-lg me-2" type="search" placeholder="Buscar producto" aria-label="Search">
            <button class="btn btn-outline-light ml-2" style="background-color:#003366;" type="submit">Buscar</button>
          </form>
        </div>
        <div class="cart-register-login">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="bi bi-cart"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Registrarse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Ingresar</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>