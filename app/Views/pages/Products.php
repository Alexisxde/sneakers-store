<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/Products.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Catalogo<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class='products-section'>
  <?php if (session('msg')) : ?>
    <div class="notification <?= session('msg.type') ?>">
      <div class="notification__body"><?= session('msg.body') ?></div>
    </div>
  <?php endif ?>
  <div class="product__search">
    <form class="form" method="get">
      <section class="form__inputs">
        <label class="form__label">
          <input required name="search" class="form__input" type="text" placeholder=" ">
          <span class="form__text">Buscar</span>
        </label>
        <button class="btn btn-dark p-2"><i class="bi bi-search"></i></button>
      </section>
    </form>
    <?php if (session()->rol === 'admin') : ?>
      <div class="products__new">
        <a href=<?= base_url("add_sneaker") ?> class="products__new-button">NUEVA ZAPATILLA</a>
      </div>
    <?php endif ?>
  </div>
  <div class='products-cards'>
    <?php if (count($products) === 0) : ?>
      <div style="height: 50dvh;">
        <h1 class="text-center p-5">No hay zapatillas sobre busqueda.</h1>
      </div>
    <?php endif ?>
    <?php foreach ($products as $product) {
      extract($product);
    ?>
      <?php if (session('logged_in') && session()->rol === 'admin') :  ?>
        <div class='card'>
          <a href="<?= base_url() . "sneakers/" . $id_sneaker ?>">
            <img src='<?= base_url() ?>assets/img/sneakers/<?= $img ?>' alt='<?= $brand . " " . $model ?>'>
          </a>
          <div class='card-body'>
            <h5 class='text-center'><?= $brand . " " . $model ?></h5>
            <div class='text-center pb-1'>
              <?php
              $wholeStars = floor($stars);
              $halfStar = ($stars - $wholeStars) >= 0.5;
              $discount2 = number_format($discount, 0);

              for ($i = 0; $i < $wholeStars; $i++) echo "<i class='bi bi-star-fill'></i> ";
              if ($halfStar) echo "<i class='bi bi-star-half'></i> ";
              for ($i = 0; $i < (5 - $wholeStars - ($halfStar ? 1 : 0)); $i++) echo "<i class='bi bi-star'></i> ";
              ?>
            </div>
            <div class='prices text-center fw-bold'>
              <?php if ($discount > 0) : ?>
                <span class='prev-price'>$<?= number_format($price, 0, ',', '.') ?></span>
              <?php endif ?>
              <span>$ <?= number_format($price * (1 - $discount / 100), 0, ',', '.') ?></span>
              <?php if ($discount > 0) : ?>
                <div class='text-success'><?= $discount2 ?>% de descuento</div>
              <?php endif ?>
            </div>
          </div>
          <div class="products__links">
            <div>
              <i class="bi bi-pencil-square"></i>
              <a href="<?= base_url() . "edit_sneaker/$id_sneaker" ?>">Editar</a>
            </div>
            <?php if ($is_active == 1) : ?>
              <div class="link-danger">
                <i class="bi bi-eye-slash"></i>
                <a class="link-danger" href="<?= base_url() . "edit_status/$id_sneaker" ?>">Desactivar</a>
              </div>
            <?php else : ?>
              <div class="link-success">
                <i class="bi bi-eye"></i>
                <a class="link-success" href="<?= base_url() . "edit_status/$id_sneaker" ?>">Activar</a>
              </div>
            <?php endif ?>
          </div>
        </div>
      <?php else : ?>
        <div class='card'>
          <a href="<?= base_url() . "sneakers/" . $id_sneaker ?>">
            <img src='<?= base_url() ?>assets/img/sneakers/<?= $img ?>' alt='<?= $brand . " " . $model ?>'>
          </a>
          <div class='card-body'>
            <h5 class='text-center'><?= $brand . " " . $model ?></h5>
            <div class='text-center pb-1'>
              <?php
              $wholeStars = floor($stars);
              $halfStar = ($stars - $wholeStars) >= 0.5;
              $discount2 = number_format($discount, 0);

              for ($i = 0; $i < $wholeStars; $i++) echo "<i class='bi bi-star-fill'></i> ";
              if ($halfStar) echo "<i class='bi bi-star-half'></i> ";
              for ($i = 0; $i < (5 - $wholeStars - ($halfStar ? 1 : 0)); $i++) echo "<i class='bi bi-star'></i> ";
              ?>
            </div>
            <div class='prices text-center fw-bold'>
              <?php if ($discount > 0) : ?>
                <span class='prev-price'>$<?= number_format($price, 0, ',', '.') ?> </span>
              <?php endif ?>
              <span>$ <?= number_format($price * (1 - $discount / 100), 0, ',', '.') ?></span>
              <?php if ($discount > 0) : ?>
                <div class='text-success'><?= $discount2 ?>% de descuento</div>
              <?php endif ?>
            </div>
          </div>
        </div>
      <?php endif ?>
    <?php } ?>
  </div>
  <?= $pager->links('default', 'my_pagination') ?>
</section>
<?= $this->endSection() ?>