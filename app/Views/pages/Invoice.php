<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/styles/Invoice.component.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>Factura<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="sales">
  <?php extract($details) ?>
  <div class="invoice">
    <h1><strong>SNEAKERS</strong></h1>
    <div class="invoice__details">
      <p><strong>Dirección:</strong> 123 Fake Street, Falselandia</p>
      <p><strong>Telefono:</strong> +123 456 7890 | +098 765 4321</p>
      <p><strong>Correo electrónico:</strong> sneakersstore@gmail.com | sneakersshop@hotmail.com</p>
    </div>
    <hr>
    <div class="invoice__details">
      <p><strong>N° de factura:</strong> <?= $id_sale ?></p>
      <p><strong>Facturado a:</strong> <?= $fullname ?></p>
      <p><strong>Correo electrónico:</strong> <?= $email ?></p>
      <p><strong>Fecha de compra:</strong> <?php $fecha = new DateTime($date);
                                            $formattedDate = $fecha->format('d/m/Y');
                                            echo $formattedDate; ?></p>
      <p><strong>Método de pago:</strong> <?= $payment ?></p>
    </div>
    <hr>
    <table class="invoice__table">
      <thead>
        <tr>
          <th>CANT.</th>
          <th>DESCRIPCIÓN</th>
          <th>TALLE</th>
          <th>PRECIO UNITARIO</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($detail as $d) : ?>
          <tr>
            <?php extract($d) ?>
            <td><?= $quantity ?></td>
            <td><?= $brand . " " . $model ?></td>
            <td><?= $size ?></td>
            <td>$<?= $price ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <div class="total">
      <strong>TOTAL: $<?= $total ?></strong>
    </div>
  </div>
  <div class="invoice__button-download">
    <button onclick="imprimirPagina()">Descargar</button>
  </div>
</section>
<script>
  function imprimirPagina() {
    window.print();
  }
</script>
<?= $this->endSection() ?>