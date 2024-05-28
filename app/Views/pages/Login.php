<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/styles/Login.component.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>Iniciar Sesión<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if (session('msg')) : ?>
  <div class="<?= session('msg.type') ?>"><?= session('msg.body') ?></div>
<?php endif ?>
<section class="form__login">
  <div class="form__login-body">
    <form class="form" action="<?= base_url("login") ?>" method="post">
      <h1 class="form__title">Iniciar Sesión</h1>
      <p class="form__subtitle">Por favor, <strong>Inicia sesión</strong> para continuar</p>
      <section class="form__inputs">
        <label class="form__label">
          <input class="form__input" placeholder=" " name="username" id="username" type="text" value="<?= set_value('username') ?>">
          <span class="form__text">Nombre de usuario</span>
          <?php if (validation_show_error('username')) : ?>
            <span class="form__error"><?= validation_show_error('username') ?></span>
          <?php endif; ?>
        </label>
        <label class="form__label">
          <input class="form__input" placeholder=" " name="password" id="password" type="password" value="<?= set_value('password') ?>">
          <span class="form__text">Contraseña</span>
          <?php if (session()->getFlashdata('error')) : ?>
            <span class="form__error"><?= session()->getFlashdata('error') ?></span>
          <?php endif; ?>
        </label>
      </section>
      <button class="button__black">Iniciar Sesión</button>
    </form>
    <footer>
      <span>¿Quieres ver la pagina sin <strong>Iniciar sesión</strong>? <a href=<?= base_url() ?>>Click aquí</a></span>
      <span>¿Aún no tienes cuenta? <a href=<?= base_url("register") ?>>Registrate aquí</a></span>
    </footer>
  </div>
</section>
<?= $this->endSection() ?>