<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/Checkout.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Finalizar compra<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php

use Config\Services;

$cart = Services::cart();
?>
<section class="checkout">
  <header class="checkout__header">
    <h1>Finalizar compra</h1>
  </header>
  <section class="checkout__body">
    <?php foreach ($cart->contents() as $c) : ?>
      <?php extract($c) ?>
      <article class="sneaker">
        <input type="hidden" name="rowid" value="<?= $rowid ?>">
        <a href="<?= base_url() . "sneakers/$id" ?>" class="sneaker__img">
          <img src="<?= base_url() . "assets/img/sneakers/" . $options['img'] ?>" alt="">
          <span class="discount">-<?= number_format($options['discount'], 0) ?>%</span>
        </a>
        <div class="sneaker__body">
          <span class="sneaker__title"><?= $name ?></span>
          <div class="sneaker__data">
            <span class="price">$<?= $options['priceprev'] ?></span>
            <span class="price-discount">$<?= $options['price'] ?></span>
          </div>
          <span class="sneaker__size">Talle <?= $options['size'] ?></span>
        </div>
      </article>
    <?php endforeach ?>
  </section>
  <footer class="checkout__footer">
    <div class="sneaker__total">
      <span>Total:</span><span>$<?= number_format($cart->total(), 3, '.', '') ?></span>
    </div>
    <a href="<?= base_url('shop_user') ?>" class="sale__button" type="submit">Comprar</a>
  </footer>
</section>
<?= $this->endSection() ?>