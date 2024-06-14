<?php

use Config\Services;

$cart = Services::cart();
?>

<link rel='stylesheet' href='<?= base_url() ?>assets/styles/Cart.component.css'>

<side class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <header class="offcanvas__header">
    <h5 class="offcanvas__title" id="offcanvasRightLabel">Carrito de compras</h5>
    <button type="button" class="btn-close offcanvas__toggle" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </header>
  <?php if ($cart->total() > 0) : ?>
    <section class="offcanvas__body">
      <?php foreach ($cart->contents() as $c) : ?>
        <?php extract($c) ?>
        <form class="sneaker" action="<?= base_url("delete_sneaker_cart") ?>" method="post">
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
          <button type="submit" class="sneaker__button-delete"><i class="bi bi-trash3-fill"></i></button>
        </form>
      <?php endforeach ?>
    </section>
    <form class="offcanvas__footer" action="<?= base_url("destroy_sneakers_cart") ?>" method="post">
      <div class="sneaker__total">
        <span>Total:</span><span>$<?= number_format($cart->total(), 3, '.', '') ?></span>
      </div>
      <button class="sneaker__button" type="submit">Vaciar carrito</button>
      <a href="<?= base_url('checkout') ?>" class="sneaker__button">Finalizar la compra</a>
    </form>
  <?php else : ?>
    <section class="offcanvas__notsneakers">
      <span class="offcanvas__notsneakers-title">Carrito Vacio</span>
      <a href="<?= base_url('sneakers') ?>">Ver zapatillas</a>
    </section>
  <?php endif ?>
</side>