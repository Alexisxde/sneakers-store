<section class='cards-section'>
  <div class='cards-presentation text-center'>
    <span>SNEAKERS</span>
    <span>featured</span>
  </div>
  <div class='row'>
    <?php
    $ruta_json = APPPATH . 'Json/products.json';
    $jsonData = file_get_contents($ruta_json);
    $products = json_decode($jsonData, true);

    if (count($products['featured']) != 0) {
      foreach ($products['featured'] as $featured) {
        // [
        //   'id' => $id,
        //   'title' => $title,
        //   'img' => $img,
        //   'stars' => $stars,
        //   'discount' => $discount,
        //   'price' => $price
        // ] = $featured;
        extract($featured)
    ?>
        <div class='card'>
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
              <span class='prev-price'>$ <?= $price ?></span>
              <span>$ <?= number_format($price * (1 - $discount / 100), 3); ?></span>
              <div class='text-success'><?= $discount ?>% de descuento</div>
            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>
  <a href="<?= base_url("/products") ?>" class="btn-products px-4 py-2 mb-4">Ver productos</a>
</section>