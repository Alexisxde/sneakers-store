<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>/assets/styles/Register.component.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>Registrarse<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="register">
  <div class="register-img">
    <img src="<?= base_url() ?>/assets/img/secureregister.svg" alt="">
  </div>
  <div class="register-body">
    <h1>Crear una cuenta</h1>
    <p>Por favor, <strong>registrate</strong> para poder iniciar sesión.</p>
    <form class="register-form" action="">
      <label for="username">
        <input placeholder="Username" id="username" type="text">
      </label>
      <label for="name">
        <input placeholder="Nombre" id="name" type="text">
      </label>
      <label for="surname">
        <input placeholder="Apellido" id="surname" type="text">
      </label>
      <label for="email">
        <input placeholder="Email" id="email" type="email">
      </label>
      <label for="password">
        <input placeholder="********" id="password" type="password">
      </label>
      <button class="register-button">Registrarte</button>
    </form>
    <footer>
      <span>¿Quieres ver la pagina sin <strong>Registrarte</strong>? <a href=<?= base_url() ?>>Click aquí</a></span>
      <span>¿Ya tienes cuenta? <a href=<?= base_url("login") ?>>Iniciá sesión aquí</a></span>
    </footer>
  </div>
</section>
<?= $this->endSection() ?>