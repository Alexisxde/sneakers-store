<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='/assets/styles/Product.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
  <section class='product-section'>
    <div class='img-product'>
      <img src=<?= $img ?>>
    </div>
    <div class='product-body'>
      <?php if ($discount > 0) echo "<div class='text-success'>" . $discount . "% de descuento</div>"; ?>
      <h1><?= $title ?></h1>
      <div class='prices'>
        <?php if ($discount > 0) echo "<span class='prev-price'>$" . $price . "</span>" ?>
        <span class='price'>$ <?= number_format($price * (1 - $discount / 100), 3); ?></span>
      </div>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, iste inventore. Quo, repudiandae nam mollitia doloremque animi esse commodi itaque id dolorem et consectetur atque maiores ex. Minima, eos eum!
      </p>
      <button class='btn-product px-4 py-2'><i class='bi bi-cart4'></i>Agregar al carrito</button>
      <a href='<?= base_url('commercialization/#payments-methods') ?>' class='text-black py-4 text-center'>Ver metodos de pago</a>
    </div>
  </section>
</main>
<?= $this->endSection() ?>