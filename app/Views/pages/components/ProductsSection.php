<section class='products-section'>
  <div class='products-cards'>
    <?php
    $rutaJson = APPPATH . 'Json/products.json';
    $jsonData = file_get_contents($rutaJson);
    $products = json_decode($jsonData, true);

    if (count($products['allProducts']) != 0) {
      foreach ($products['allProducts'] as $product) {
        // [
        //   'id' => $id,
        //   'title' => $title,
        //   'img' => $img,
        //   'stars' => $stars,
        //   'discount' => $discount,
        //   'price' => $price
        // ] = $product;
        extract($product);
    ?>
        <a href='<?= base_url('/products/' . $id) ?>' class='card'>
          <img src='<?= $img ?>' alt='<?= $title ?>'>
          <div class='card-body'>
            <h5 class='text-center'><?= $title ?></h5>
            <div class='text-center pb-1'>
              <?php
              $wholeStars = floor($stars);
              $halfStar = ($stars - $wholeStars) >= 0.5;

              for ($i = 0; $i < $wholeStars; $i++) echo "<i class='bi bi-star-fill'></i> ";
              if ($halfStar) echo "<i class='bi bi-star-half'></i> ";
              for ($i = 0; $i < (5 - $wholeStars - ($halfStar ? 1 : 0)); $i++) echo "<i class='bi bi-star'></i> ";
              ?>
            </div>
            <div class='prices text-center'>
              <?php if ($discount > 0) echo "<span class='prev-price'>$ $price </span>" ?>
              <span>$ <?= number_format($price * (1 - $discount / 100), 3) ?></span>
              <?php if ($discount > 0) echo "<div class='text-success'> $discount% de descuento</div>" ?>
            </div>
          </div>
        </a>
    <?php
      }
    }
    ?>
  </div>
</section>