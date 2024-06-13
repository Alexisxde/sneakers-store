<?= $this->extend('LayoutTwo') ?>
<?php

use Config\Services;

$cart = Services::cart();
?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/Checkout.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Finalizar compra<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="checkout">
  <?php if (session('msg')) : ?>
    <div class="notification <?= session('msg.type') ?>">
      <div class="notification__body"><?= session('msg.body') ?></div>
    </div>
  <?php endif ?>
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
  <form class="checkout__footer" action="<?= base_url('shop_user') ?>" method="post">
    <div class="sneaker__total">
      <span>Total:</span><span>$<?= number_format($cart->total(), 3, '.', '') ?></span>
    </div>
    <select class="form-select my-2" name="payment">
      <option value="Mercado Pago">Mercado Pago</option>
      <option value="Tarjeta de débíto">Tarjeta de débíto</option>
      <option value="Tarjeta de crédito">Tarjeta de crédito</option>
    </select>
    <button class="sale__button">Comprar</button>
    <a href="<?= base_url() ?>" class="sale__button">Volver</a>
  </form>
</section>
<?= $this->endSection() ?>