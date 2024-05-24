<style>
  .card-body {
    display: flex;
    flex-direction: column;

    h5 {
      flex-grow: 1;
      text-wrap: pretty;
    }
  }

  .products__links {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    a {
      text-decoration: none;
      color: black;

      i {
        color: black;
      }
    }
  }
</style>

<section class='products-section'>
  <div class='products-cards'>
    <?php
    foreach ($products as $product) {
      extract($product);
    ?>
      <?php if (isset(session()->username) && session()->rol === 'admin') :  ?>
        <div href="<?= base_url() . "sneakers/" . $id_sneaker ?>" class='card'>
          <img src='<?= base_url() ?>assets/img/snakers/<?= $img ?>' alt='<?= $brand . " " . $model ?>'>
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
            <div class='prices text-center'>
              <?php if ($discount > 0) echo "<span class='prev-price'>$ $price </span>" ?>
              <span>$ <?= number_format($price * (1 - $discount / 100), 3) ?></span>
              <?php if ($discount > 0) echo "<div class='text-success'> $discount2% de descuento</div>" ?>
            </div>
          </div>
          <div class="products__links">
            <div><a href="<?= base_url() . "sneakers/" . $id_sneaker ?>">Ver</a></div>
            <div>
              <i class="bi bi-pencil-square"></i>
              <a href="#">Editar</a>
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
            <img src='<?= base_url() ?>assets/img/snakers/<?= $img ?>' alt='<?= $brand . " " . $model ?>'>
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
              <div class='prices text-center'>
                <?php if ($discount > 0) echo "<span class='prev-price'>$ $price </span>" ?>
                <span>$ <?= number_format($price * (1 - $discount / 100), 3) ?></span>
                <?php if ($discount > 0) echo "<div class='text-success'> $discount2% de descuento</div>" ?>
              </div>
            </div>
          </a>
        <?php endif ?>
      <?php endif ?>
    <?php
    }
    ?>
  </div>
</section>