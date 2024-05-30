<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/styles/Register.component.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>Registrarse<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="form__register">
  <div class="form__register-body">
    <form class="form" action="<?= base_url("register") ?>" class="register-form" method="post" aria-autocomplete="none">
      <h1 class="form__title">Crear una cuenta</h1>
      <p class="form__subtitle">Por favor, <strong>registrate</strong> para poder iniciar sesión.</p>
      <section class="form__inputs">
        <label class="form__label">
          <input class="form__input" placeholder=" " name="username" type="text" value="<?= set_value('username') ?>">
          <span class="form__text">Nombre de usuario</span>
          <?php if (validation_show_error('username')) : ?>
            <span class="form__error"><?= validation_show_error('username') ?></span>
          <?php endif; ?>
        </label>
        <label class="form__label">
          <input class="form__input" placeholder=" " name="name" type="text" value=<?= set_value('name') ?>>
          <span class="form__text">Nombre</span>
          <?php if (validation_show_error('name')) : ?>
            <span class="form__error"><?= validation_show_error('name') ?></span>
          <?php endif; ?>
        </label>
        <label class="form__label">
          <input class="form__input" placeholder=" " name="surname" type="text" value="<?= set_value('surname') ?>">
          <span class="form__text">Apellido</span>
          <?php if (validation_show_error('surname')) : ?>
            <span class="form__error"><?= validation_show_error('surname') ?></span>
          <?php endif; ?>
        </label>
        <label class="form__label">
          <input class="form__input" placeholder=" " name="email" type="email" value="<?= set_value('email') ?>">
          <span class="form__text">Correo electrónico</span>
          <?php if (validation_show_error('email')) : ?>
            <span class="form__error"><?= validation_show_error('email') ?></span>
          <?php endif; ?>
        </label>
        <label class="form__label">
          <input class="form__input" placeholder=" " name="password" type="password">
          <span class="form__text">Contraseña</span>
          <?php if (validation_show_error('password')) : ?>
            <span class="form__error"><?= validation_show_error('password') ?></span>
          <?php endif; ?>
        </label>
      </section>
      <button class="button__black">Registrarte</button>
    </form>
    <footer>
      <span>¿Quieres ver la pagina sin <strong>Registrarte</strong>? <a href=<?= base_url() ?>>Click aquí</a></span>
      <span>¿Ya tienes cuenta? <a href=<?= base_url("login") ?>>Iniciá sesión aquí</a></span>
    </footer>
  </div>
</section>
<?= $this->endSection() ?>