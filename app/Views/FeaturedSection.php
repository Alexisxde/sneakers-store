<link rel="stylesheet" href="./assets/styles/FeaturedSection.component.css">

<section class="cards-section">
  <div class="cards-presentation text-center">
    <span>SNEAKERS</span>
    <span>featured</span>
  </div>
  <div class="row">
    <?php
    $ruta_json = APPPATH . 'Json/products.json';
    $jsonData = file_get_contents($ruta_json);
    $products = json_decode($jsonData, true);

    if (count($products["featured"]) != 0) {
      foreach ($products["featured"] as $featured) {
    ?>
        <div class="card col-2 col-lg-4">
          <img src="<?= $featured["img"] ?>">
          <div class="card-body">
            <h5 class="text-center"><?= $featured["title"] ?></h5>
            <div class="text-center pb-1">
              <?php
              $stars = $featured["stars"];
              $wholeStars = floor($stars);
              $halfStar = ($stars - $wholeStars) >= 0.5;

              for ($i = 0; $i < $wholeStars; $i++) echo '<i class="bi bi-star-fill"></i> ';
              if ($halfStar) echo '<i class="bi bi-star-half"></i> ';
              for ($i = 0; $i < (5 - $wholeStars - ($halfStar ? 1 : 0)); $i++) echo '<i class="bi bi-star"></i> ';
              ?>
            </div>
            <div class="prices text-center">
              <span class="prev-price">$ <?= $featured["price"] ?></span>
              <span>$ <?= number_format($featured["price"] * (1 - $featured["discount"] / 100), 3); ?></span>
              <div class="text-success"><?= $featured["discount"] ?>% de descuento</div>
            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>
</section>