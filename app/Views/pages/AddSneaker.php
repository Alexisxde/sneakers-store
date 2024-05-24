<?= $this->extend('Layout') ?>

<?= $this->section('title') ?>Añadir una zapatilla<?= $this->endSection() ?>

<?= $this->section('content') ?>
<form class="form" action="<?= base_url("add_sneaker") ?>" method="post" autocomplete="off" enctype="multipart/form-data">
  <h2 class="form__title">Registrar nuevoa zapatilla</h2>
  <section class="form__inputs">
    <label class="form__label">
      <input class="form__input" name="sneaker_brand" type="text" placeholder=" " value="<?= set_value('sneaker_brand') ?>">
      <span class="form__text">Ingresa marca</span>
    </label>
    <?php if (validation_show_error('sneaker_brand')) : ?>
      <span class="alert alert-danger py-0 m-0"><?= validation_show_error('sneaker_brand') ?></span>
    <?php endif; ?>
    <label class="form__label">
      <input class="form__input" name="sneaker_model" type="text" placeholder=" " value="<?= set_value('sneaker_model') ?>">
      <span class="form__text">Ingresa modelo</span>
    </label>
    <?php if (validation_show_error('sneaker_model')) : ?>
      <span class="alert alert-danger py-0 m-0"><?= validation_show_error('sneaker_model') ?></span>
    <?php endif; ?>
    <label class="form__label">
      <input class="form__input" name="sneaker_price" min="0" type="number" placeholder=" " value="<?= set_value('sneaker_price') ?>">
      <span class="form__text">Ingresa precio</span>
    </label>
    <?php if (validation_show_error('sneaker_price')) : ?>
      <span class="alert alert-danger py-0 m-0"><?= validation_show_error('sneaker_price') ?></span>
    <?php endif; ?>
    <label class="form__label">
      <input class="form__input" name="sneaker_discount" value="<?= set_value('sneaker_discount') ?>" min="0" max="100" type="number" placeholder=" ">
      <span class="form__text">Ingresa descuento</span>
    </label>
    <?php if (validation_show_error('sneaker_discount')) : ?>
      <span class="alert alert-danger py-0 m-0"><?= validation_show_error('sneaker_discount') ?></span>
    <?php endif; ?>
    <label class="form__label">
      <input class="form__input" name="sneaker_stars" min="1" max="5" type="text" placeholder=" " value="<?= set_value('sneaker_stars') ?>">
      <span class="form__text">Ingresa la valoración</span>
    </label>
    <?php if (validation_show_error('sneaker_stars')) : ?>
      <span class="alert alert-danger py-0 m-0"><?= validation_show_error('sneaker_stars') ?></span>
    <?php endif; ?>
    <label class="ms-3">
      <input type="checkbox" name="sneaker_active" value="<?= set_value('sneaker_active') ?>">
      <span>Mostrar en la tienda?</span>
    </label>
    <label class="form__label">
      <textarea class="form_input form_input-textarea" name="sneaker_description" placeholder=" " value="<?= set_value('sneaker_description') ?>"></textarea>
      <span class="form_text form_textarea">Ingresa descripción</span>
    </label>
    <?php if (validation_show_error('sneaker_description')) : ?>
      <span class="alert alert-danger py-0 m-0"><?= validation_show_error('sneaker_description') ?></span>
    <?php endif; ?>
    <label class="form__label">
      <input class="form__input" name="sneaker_img" type="file" onchange="mostrarImagenSeleccionada(event)">
      <img class="preview-image" id="preview_image" src="#" alt="Vista previa de la imagen">
    </label>
    <?php if (validation_show_error('sneaker_img')) : ?>
      <span class="alert alert-danger py-0 m-0"><?= validation_show_error('sneaker_img') ?></span>
    <?php endif; ?>
  </section>
  <button class="form__submit" type="submit">Guardar</button>
</form>
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