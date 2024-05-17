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
    <form action="<?= base_url("register") ?>" class="register-form" method="post" autocomplete="off">
      <label for="username">
        <input placeholder="Username" name="username" id="username" type="text" value="<?= set_value('username') ?>">
      </label>
      <?php if (validation_show_error('username')) : ?>
        <span class="alert alert-danger py-0 m-0"><?= validation_show_error('username') ?></span>
      <?php endif; ?>
      <label for="name">
        <input placeholder="Nombre" name="name" id="name" type="text" value=<?= set_value('name') ?>>
      </label>
      <?php if (validation_show_error('name')) : ?>
        <span class="alert alert-danger py-0 m-0"><?= validation_show_error('name') ?></span>
      <?php endif; ?>
      <label for="surname">
        <input placeholder="Apellido" name="surname" id="surname" type="text" value="<?= set_value('surname') ?>">
      </label>
      <?php if (validation_show_error('surname')) : ?>
        <span class="alert alert-danger py-0 m-0"><?= validation_show_error('surname') ?></span>
      <?php endif; ?>
      <label for="email">
        <input placeholder="Email" name="email" id="email" type="email" value="<?= set_value('email') ?>">
      </label>
      <?php if (validation_show_error('email')) : ?>
        <span class="alert alert-danger py-0 m-0"><?= validation_show_error('email') ?></span>
      <?php endif; ?>
      <label for="password">
        <input placeholder="********" name="password" id="password" type="password" value="<?= set_value('password') ?>">
      </label>
      <?php if (validation_show_error('password')) : ?>
        <span class="alert alert-danger py-0 m-0"><?= validation_show_error('password') ?></span>
      <?php endif; ?>
      <button class="register-button">Registrarte</button>
    </form>
    <footer>
      <span>¿Quieres ver la pagina sin <strong>Registrarte</strong>? <a href=<?= base_url() ?>>Click aquí</a></span>
      <span>¿Ya tienes cuenta? <a href=<?= base_url("login") ?>>Iniciá sesión aquí</a></span>
    </footer>
  </div>
</section>
<?= $this->endSection() ?>