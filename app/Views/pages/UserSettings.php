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

<?= $this->section('content') ?>
<section class="user-settings" style="max-width:700px; margin: 0 auto;">
  <form class="form" aria-autocomplete="none">
    <h1 class="form__title">Opciones de Usuario</h1>
    <p class="form__subtitle">Actualiza tu información personal.</p>
    <img style="width: 50px; height: 50px;" src="https://th.bing.com/th/id/R.8e2c571ff125b3531705198a15d3103c?rik=gzhbzBpXBa%2bxMA&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fuser-png-icon-big-image-png-2240.png&ehk=VeWsrun%2fvDy5QDv2Z6Xm8XnIMXyeaz2fhR3AgxlvxAc%3d&risl=&pid=ImgRaw&r=0" alt="User Image">
    <section class="form__inputs">
      <label class="form__label">
        <input class="form__input" placeholder=" " name="" type="text">
        <span class="form__text">Nombre de usuario</span>
      </label>
      <label class="form__label">
        <input class="form__input" placeholder=" " name="" type="text">
        <span class="form__text">Nombre</span>
      </label>
      <label class="form__label">
        <input class="form__input" placeholder=" " name="" type="text">
        <span class="form__text">Apellido</span>
      </label>
      <label class="form__label">
        <input class="form__input" placeholder=" " name="" type="text">
        <span class="form__text">Correo electrónico</span>
      </label>
      <label class="form__label">
        <input class="form__input" placeholder=" " name="" type="password">
        <span class="form__text">Contraseña</span>
      </label>
      <label class="form__label">
        <input class="form__input" placeholder=" " name="" type="password">
        <span class="form__text">Confirmar contraseña</span>
      </label>
    </section>
    <div class="form__btns">
      <button class="btn btn-dark fw-semibold">Guardar cambios</button>
      <button class="btn btn-danger fw-semibold">Eliminar cuenta</button>
    </div>
  </form>
</section>
<?= $this->endSection() ?>