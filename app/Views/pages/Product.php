<?php
extract($product);
?>

<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/Product.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?><?= $brand . " " . $model ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
  <section class='product-section'>
    <div class='img-product'>
      <img src='<?= base_url() ?>assets/img/sneakers/<?= $img ?>' alt='<?= $brand . " " . $model ?>'>
    </div>
    <div class='product-body'>
      <?php $discount2 = number_format($discount, 0); ?>
      <?php if ($discount > 0) echo "<div class='text-success'>$discount2% de descuento</div>" ?>
      <h1><?= $brand . " " . $model ?></h1>
      <div class='prices'>
        <?php if ($discount > 0) echo "<span class='prev-price'>$ $price</span>" ?>
        <span class='price'>$ <?= number_format($price * (1 - $discount / 100), 3); ?></span>
      </div>
      <p><?= $description ?></p>
      <div class='sizes'>
        <?php
        foreach ($sizes as $size) {
          extract($size);
          if ($stock > 0) {
        ?>
            <button class='btn-size'><?= $size ?></button>
        <?php
          }
        }
        ?>
      </div>
      <button class='btn-product px-4 py-2'><i class='bi bi-cart4'></i>Agregar al carrito</button>
      <a href='<?= base_url('commercialization/#payments-methods') ?>' class='text-black py-4 text-center'>Ver metodos de pago</a>
    </div>
  </section>
</main>
<?= $this->endSection() ?>