<?= $this->extend('LayoutTwo') ?>
<?= extract($sneaker) ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/styles/FormAddSneaker.component.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>Editar <?= $brand . " " . $model ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="form__sneaker">
  <form class="form" action="<?= base_url("edit_sneaker") ?>" method="post" autocomplete="off" enctype="multipart/form-data">
    <div class="form__back">
      <a href=<?= base_url("/sneakers") ?> class="button__black">VOLVER</a>
    </div>
    <h2 class="form__title">Editar <?= $brand . " " . $model ?></h2>
    <input type="hidden" name="sneaker_id" value="<?= $id_sneaker ?>">
    <section class="form__inputs">
      <label class="form__label">
        <input class="form__input" name="sneaker_brand" type="text" placeholder=" " value="<?= $brand ?>">
        <span class="form__text">Ingresa marca</span>
        <?php if (validation_show_error('sneaker_brand')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_brand') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" name="sneaker_model" type="text" placeholder=" " value="<?= $model ?>">
        <span class="form__text">Ingresa modelo</span>
        <?php if (validation_show_error('sneaker_model')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_model') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" name="sneaker_price" min="0" type="number" placeholder=" " value="<?= $price ?>">
        <span class="form__text">Ingresa precio</span>
        <?php if (validation_show_error('sneaker_price')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_price') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" name="sneaker_discount" value="<?= $discount ?>" min="0" max="100" type="number" placeholder=" ">
        <span class="form__text">Ingresa descuento</span>
        <?php if (validation_show_error('sneaker_discount')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_discount') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" name="sneaker_stars" min="1" max="5" type="text" placeholder=" " value="<?= $stars ?>">
        <span class="form__text">Ingresa la valoración</span>
        <?php if (validation_show_error('sneaker_stars')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_stars') ?></span>
        <?php endif; ?>
      </label>
      <label class="ms-3">
        <input type="checkbox" name="sneaker_active" <?php echo $is_active == 1 ? "checked" : "" ?>>
        <span>Mostrar en la tienda?</span>
      </label>
      <label class="form__label">
        <textarea class="form__input form__input-textarea" name="sneaker_description" placeholder=" "><?= $description ?></textarea>
        <span class="form__text form__textarea">Ingresa descripción</span>
        <?php if (validation_show_error('sneaker_description')) : ?>
          <span class="form__error"><?= validation_show_error('sneaker_description') ?></span>
        <?php endif; ?>
      </label>
      <label class="form__label">
        <input class="form__input" name="sneaker_img" type="file" onchange="mostrarImagenSeleccionada(event)" accept="image/jpeg, image/png, image/webp, image/jfif">
        <img class="preview-image" id="preview_image" src="<?= base_url() . "assets/img/sneakers/" . $img ?>" alt="<?= $brand . " " . $model ?>">
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