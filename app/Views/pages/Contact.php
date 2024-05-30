<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/ContactSection.component.css'>
<style>
  .form {
    padding: 0;

    .form__inputs {
      margin: 0;
    }
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Contacto<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class='contact-section'>
  <div class='contact'>
    <div>
      <i class='bi bi-geo-alt-fill'></i>
      <span class='title'>Dirección</span>
      <span>123 Fake Street, Falselandia</span>
    </div>
    <div>
      <i class='bi bi-telephone-fill'></i>
      <span class='title'>Telefono</span>
      <span>+123 456 7890</span>
      <span>+098 765 4321</span>
    </div>
    <div>
      <i class='bi bi-envelope-fill'></i>
      <span class='title'>Email</span>
      <span>sneakersstore@gmail.com</span>
      <span>sneakersshop@hotmail.com</span>
    </div>
  </div>
  <div class='form-contact'>
    <form class="form" aria-autocomplete="none">
      <h1 class="form__title">Envianos tu mensaje</h1>
      <p class="form__subtitle">Si necesitas más información o deseas realizar un pedido, no dudes en contactarnos. Estamos aquí para ayudarte en todo lo que necesites.</p>
      <section class="form__inputs">
        <label class="form__label">
          <input class="form__input" placeholder=" " type="text">
          <span class="form__text">Nombre y Apellido</span>
        </label>
        <label class="form__label">
          <input class="form__input" placeholder=" " type="email">
          <span class="form__text">Correo electrónico</span>
        </label>
        <label class="form__label">
          <textarea class="form__input form__input-textarea" placeholder=" " rows="4" cols="50"></textarea>
          <span class="form__text form__textarea">Descripción</span>
        </label>
        <button class="button__black" type="submit">Enviar</button>
      </section>
    </form>
  </div>
</section>
<?= $this->endSection() ?>