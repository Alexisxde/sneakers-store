<section class='cards-section'>
  <div class='cards-presentation text-center'>
    <span>SNEAKERS</span>
    <span>featured</span>
  </div>
  <div class='cards__featured'>
    <?php

    use App\Controllers\Sneaker;

    $products = new Sneaker();

    foreach ($products->featured() as $featured) {
      extract($featured);
    ?>
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
              <span class='prev-price'>$<?= number_format($price, 0) ?> </span>
            <?php endif ?>
            <span>$ <?= number_format($price * (1 - $discount / 100), 0) ?></span>
            <?php if ($discount > 0) : ?>
              <div class='text-success'><?= $discount2 ?>% de descuento</div>
            <?php endif ?>
          </div>
          <button class="button__black mt-1">Añadir al carrito</button>
        </div>
      </div>
    <?php } ?>
  </div>
</section>