<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/styles/FormAddSneaker.component.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>Añadir una zapatilla<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if (session('msg')) : ?>
  <div class="notification <?= session('msg.type') ?>">
    <div class="notification__body"><?= session('msg.body') ?></div>
  </div>
<?php endif ?>
<section class="form__sneaker">
  <form class="form" action="<?= base_url("add_sneaker") ?>" method="post" autocomplete="off" enctype="multipart/form-data">
    <div class="form__back">
      <a href=<?= base_url("/sneakers") ?> class="button__black">VOLVER</a>
    </div>
    <h2 class="form__title">Registrar nueva zapatilla</h2>
    <section class="form__inputs">
      <label class="form__label">
        <input class="form__input" name="sneaker_brand" type="text" placeholder=" " value="<?= set_value('sneaker_brand') ?>">
        <span class="form__text">Ingresa marca</span>
        <?php if (validation_show_error('sneaker_brand')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_brand') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" name="sneaker_model" type="text" placeholder=" " value="<?= set_value('sneaker_model') ?>">
        <span class="form__text">Ingresa modelo</span>
        <?php if (validation_show_error('sneaker_model')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_model') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" name="sneaker_price" min="0" type="number" placeholder=" " value="<?= set_value('sneaker_price') ?>">
        <span class="form__text">Ingresa precio</span>
        <?php if (validation_show_error('sneaker_price')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_price') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" name="sneaker_discount" value="<?= set_value('sneaker_discount') ?>" min="0" max="100" type="number" placeholder=" ">
        <span class="form__text">Ingresa descuento</span>
        <?php if (validation_show_error('sneaker_discount')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_discount') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" name="sneaker_stars" min="1" max="5" type="text" placeholder=" " value="<?= set_value('sneaker_stars') ?>">
        <span class="form__text">Ingresa la valoración</span>
        <?php if (validation_show_error('sneaker_stars')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_stars') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <textarea class="form__input form__input-textarea" name="sneaker_description" placeholder=" "><?= set_value('sneaker_description') ?></textarea>
        <span class="form__text form__textarea">Ingresa descripción</span>
        <?php if (validation_show_error('sneaker_description')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_description') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" name="sneaker_img" type="file" onchange="mostrarImagenSeleccionada(event)" accept="image/jpeg, image/png, image/webp, image/jfif">
        <img style="display: none;" class="preview-image" id="preview_image" src="#" alt="Vista previa de la imagen">
        <?php if (validation_show_error('sneaker_img')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_img') ?></span>
        <?php endif; ?>
      </label>
    </section>
    <button class="button__black" type="submit">Guardar</button>
  </form>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  function mostrarImagenSeleccionada(event) {
    let input = event.target;
    let reader = new FileReader();
    reader.onload = function() {
      let imagen = document.getElementById('preview_image');
      imagen.src = reader.result;
      imagen.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
  }
</script>
<?= $this->endSection() ?>