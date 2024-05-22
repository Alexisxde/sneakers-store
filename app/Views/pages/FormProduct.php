<?= $this->extend('Layout') ?>

<?= $this->section('title') ?>Añadir un producto<?= $this->endSection() ?>

<?= $this->section('content') ?>
<form class="form" action="<?= base_url("add_product") ?>" method="post" autocomplete="off">
  <h2 class="form__title">Registrar nuevo producto</h2>
  <section class="form__inputs">
    <label class="form__label">
      <input class="form__input" name="product_brand" type="text" placeholder=" ">
      <span class="form__text">Ingresa marca</span>
    </label>
    <label class="form__label">
      <input class="form__input" name="product_model" type="text" placeholder=" ">
      <span class="form__text">Ingresa modelo</span>
    </label>
    <label class="form__label">
      <input class="form__input" name="product_price" type="text" placeholder=" ">
      <span class="form__text">Ingresa precio</span>
    </label>
    <label class="form__label">
      <input class="form__input" name="product_discount" value="0" min="0" max="100" type="number" placeholder=" ">
      <span class="form__text">Ingresa descuento</span>
    </label>
    <label class="form__label">
      <input class="form__input" name="product_stars" type="text" placeholder=" ">
      <span class="form__text">Ingresa la valoración</span>
    </label>
    <label class="form__label">
      <textarea class="form__input form__input-textarea" name="product_active" placeholder=" "></textarea>
      <span class="form__text form__textarea">Ingresa descripción</span>
    </label>
    <label class="form__label">
      <input class="form__input" id="product_img" name="product_img" type="file" onchange="mostrarImagenSeleccionada(event)">
      <img class="preview-image" id="preview_image" src="#" alt="Vista previa de la imagen">
    </label>
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