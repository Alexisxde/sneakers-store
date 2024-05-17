<section class='cards-section'>
  <div class='cards-presentation text-center'>
    <span>SNEAKERS</span>
    <span>featured</span>
  </div>
  <div class='row'>
    <?php

    use App\Controllers\Sneaker;

    $products = new Sneaker();

    foreach ($products->featured() as $featured) {
      extract($featured);
    ?>
      <a href="<?= base_url() . "sneakers/" . $id_sneaker ?>" class='card'>
        <img src='<?= base_url() ?>/assets/img/snakers/<?= $img ?>' alt='<?= $brand . " " . $model ?>'>
        <div class='card-body'>
          <h5 class='text-center'><?= $brand . " " . $model ?></h5>
          <div class='text-center pb-1'>
            <?php
            $wholeStars = floor($stars);
            $halfStar = ($stars - $wholeStars) >= 0.5;
            $discount2 = number_format($discount);

            for ($i = 0; $i < $wholeStars; $i++) echo "<i class='bi bi-star-fill'></i> ";
            if ($halfStar) echo "<i class='bi bi-star-half'></i> ";
            for ($i = 0; $i < (5 - $wholeStars - ($halfStar ? 1 : 0)); $i++) echo "<i class='bi bi-star'></i> ";
            ?>
          </div>
          <div class='prices text-center'>
            <span class='prev-price'>$ <?= $price ?></span>
            <span>$ <?= number_format($price * (1 - $discount / 100), 3); ?></span>
            <div class='text-success'><?= $discount2 ?>% de descuento</div>
          </div>
        </div>
      </a>
    <?php
    }
    ?>
  </div>
  <a href="<?= base_url("/products") ?>" class="btn-products px-4 py-2 mb-4">Ver productos</a>
</section>