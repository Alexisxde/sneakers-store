<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/ContactSection.component.css'>
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
    <form class="form" aria-autocomplete="none" action="<?= base_url('submit_message') ?>" method="post">
      <h1 class="form__title">Envianos tu mensaje</h1>
      <p class="form__subtitle" style="z-index: 100;">Si necesitas más información o deseas realizar un pedido, no dudes en contactarnos. Estamos aquí para ayudarte en todo lo que necesites.</p>
      <section class="form__inputs">
        <label class="form__label">
          <?php
          $name = session('name');
          $surname = session('surname');
          $lastname = "$surname $name"
          ?>
          <input class="form__input" name="lastname" placeholder=" " type="text" value="<?= $lastname === " " ? set_value('lastname') : $lastname ?>">
          <span class="form__text">Nombre y Apellido</span>
          <?php if (validation_show_error('lastname')) : ?>
            <span class="form__error"><?= validation_show_error('lastname') ?></span>
          <?php endif; ?>
        </label>
        <label class="form__label">
          <input class="form__input" name="email" placeholder=" " type="email" value="<?= session('email') ?? set_value('email') ?>">
          <span class="form__text">Correo electrónico</span>
          <?php if (validation_show_error('email')) : ?>
            <span class="form__error"><?= validation_show_error('email') ?></span>
          <?php endif; ?>
        </label>
        <label class="form__label">
          <textarea name="message" class="form__input form__input-textarea" placeholder=" "><?= set_value('message') ?></textarea>
          <span class="form__text form__textarea">Descripción</span>
          <?php if (validation_show_error('message')) : ?>
            <span class="form__error"><?= validation_show_error('message') ?></span>
          <?php endif; ?>
        </label>
        <button class="button__black" type="submit">Enviar</button>
      </section>
    </form>
  </div>
</section>
<?= $this->endSection() ?>