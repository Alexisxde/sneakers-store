<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>/assets/styles/Login.component.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="login">
  <div class="login-img">
    <img src="<?= base_url() ?>/assets/img/securelogin.svg" alt="">
  </div>
  <div class="login-body">
    <h1>Iniciar Sesión</h1>
    <p>Por favor, <strong>Inicia sesión</strong> para continuar</p>
    <form class="login-form" action="">
      <!-- Input Username -->
      <label for="username">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
          <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
        </svg>
        <input placeholder="Username" id="username" type="text">
      </label>
      <!-- Input Password -->
      <label for="password">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
          <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
          <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
        </svg>
        <input placeholder="********" id="password" type="password">
      </label>
      <button class="login-button">Iniciar Sesión</button>
    </form>
    <footer>
      <span>¿Quieres ver la pagina sin <strong>Iniciar sesión</strong>? <a href=<?= base_url() ?>>Click aquí</a></span>
      <span>¿Aún no tienes cuenta? <a href=<?= base_url("register") ?>>Registrate aquí</a></span>
    </footer>
  </div>
</section>
<?= $this->endSection() ?>