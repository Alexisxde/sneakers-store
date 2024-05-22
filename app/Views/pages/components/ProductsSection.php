<section class='products-section'>
  <div class='products-cards'>
    <?php
    foreach ($products as $product) {
      extract($product);
    ?>
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
    <?php
    }
    ?>
  </div>
</section>