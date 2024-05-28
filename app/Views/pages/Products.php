<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/ProductsSection.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Catalogo<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class='products-section'>
  <?php if (session('msg')) : ?>
    <div class="<?= session('msg.type') ?>"><?= session('msg.body') ?></div>
  <?php endif ?>
  <div class="products__new">
    <a href=<?= base_url("add_sneaker") ?> class="button__black">NUEVA ZAPATILLA</a>
  </div>
  <div class='products-cards'>
    <?php foreach ($products as $product) {
      extract($product);
    ?>
      <?php if (isset(session()->username) && session()->rol === 'admin') :  ?>
        <div href="<?= base_url() . "sneakers/" . $id_sneaker ?>" class='card'>
          <img src='<?= base_url() ?>assets/img/sneakers/<?= $img ?>' alt='<?= $brand . " " . $model ?>'>
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
                <span class='prev-price'>$<?= number_format($price, 0) ?></span>
              <?php endif ?>
              <span>$ <?= number_format($price * (1 - $discount / 100), 0) ?></span>
              <?php if ($discount > 0) : ?>
                <div class='text-success'><?= $discount2 ?>% de descuento</div>
              <?php endif ?>
            </div>
          </div>
          <div class="products__links">
            <div><a href="<?= base_url() . "sneakers/" . $id_sneaker ?>">Ver</a></div>
            <div>
              <i class="bi bi-pencil-square"></i>
              <a href="<?= base_url() . "edit_sneaker/" . $id_sneaker ?>">Editar</a>
            </div>
            <?php if ($is_active == 1) : ?>
              <div class="link-danger">
                <i class="bi bi-eye-slash"></i>
                <a class="link-danger" href="<?= base_url() . "status/" . $id_sneaker ?>">Desactivar</a>
              </div>
            <?php else : ?>
              <div class="link-success">
                <i class="bi bi-eye"></i>
                <a class="link-success" href="<?= base_url() . "status/" . $id_sneaker ?>">Activar</a>
              </div>
            <?php endif ?>
          </div>
        </div>
      <?php else : ?>
        <?php if ($is_active == 1) : ?>
          <a href="<?= base_url() . "sneakers/" . $id_sneaker ?>" class='card'>
            <img src='<?= base_url() ?>assets/img/sneakers/<?= $img ?>' alt='<?= $brand . " " . $model ?>'>
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
                  <span class='prev-price'>$<?= number_format($price, 0) ?> </span>
                <?php endif ?>
                <span>$ <?= number_format($price * (1 - $discount / 100), 0) ?></span>
                <?php if ($discount > 0) : ?>
                  <div class='text-success'><?= $discount2 ?>% de descuento</div>
                <?php endif ?>
              </div>
            </div>
          </a>
        <?php endif ?>
      <?php endif ?>
    <?php } ?>
  </div>
</section>
<?= $this->endSection() ?>