<?= $this->extend('LayoutTwo') ?>
<?= $this->section('css') ?>
<style>
  .form {
    .form__btns {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Configuración<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if (validation_show_error('id_user')) : ?>
  <div class="notification error">
    <div class="notification__body"><?= validation_show_error('id_user') ?></div>
  </div>
<?php endif ?>
<?php if (validation_show_error('username')) : ?>
  <div class="notification error">
    <div class="notification__body"><?= validation_show_error('username') ?></div>
  </div>
<?php endif ?>
<section class="user-settings" style="max-width:700px; margin: 0 auto;">
  <form class="form" action="<?= base_url("settings") ?>" method="post" autocomplete="off" enctype="multipart/form-data" aria-autocomplete="none">
    <h1 class="form__title">Actualizar contraseña</h1>
    <p class="form__subtitle">Actualiza tu contraseña.</p>
    <section class="form__inputs">
      <input name="id_user" type="hidden" value="<?= session('id_user') ?>">
      <input name="username" type="hidden" value="<?= session('username') ?>">
      <label class="form__label">
        <input class="form__input" placeholder=" " name="newpassword" type="password" value="<?= set_value('newpassword') ?>">
        <span class="form__text">Nueva contraseña</span>
        <?php if (validation_show_error('newpassword')) : ?>
          <span class="form__error"><?= validation_show_error('newpassword') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" placeholder=" " name="newconfirmpassword" type="password" value="<?= set_value('newconfirmpassword') ?>">
        <span class="form__text">Confirmar nueva contraseña</span>
        <?php if (validation_show_error('newconfirmpassword')) : ?>
          <span class="form__error"><?= validation_show_error('newconfirmpassword') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" placeholder=" " name="password" type="password">
        <span class="form__text">Antigua contraseña</span>
        <?php if (validation_show_error('password')) : ?>
          <span class="form__error"><?= validation_show_error('password') ?></span>
        <?php endif; ?>
        <?php if (session('error')) : ?>
          <span class="form__error"><?= session('error') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" placeholder=" " name="confirmpassword" type="password">
        <span class="form__text">Confirmar antigua contraseña</span>
        <?php if (validation_show_error('confirmpassword')) : ?>
          <span class="form__error"><?= validation_show_error('confirmpassword') ?></span>
        <?php endif; ?>
      </label>
    </section>
    <div class="form__btns">
      <a href="<?= base_url('user_delete') ?>" class="btn btn-danger fw-semibold">Eliminar cuenta</a>
      <button type="submit" class="btn btn-dark fw-semibold">Guardar cambios</button>
    </div>
  </form>
</section>
<?= $this->endSection() ?>