<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/styles/SalesUsers.component.css">

<?= $this->endSection() ?>

<?= $this->section('title') ?>Compras realizadas<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="sales">
  <?php if ($header_sale === null) : ?>
    <div class="sales__history">
      <h1><strong>No posee historial de compras</strong></h1>
      <a href="<?= base_url('sneakers') ?>">Vea nuestro catalogo de zapatillas</a>
    </div>
  <?php else : ?>
    <div class="sales__history">
      <h1><strong>HISTORIAL DE COMPRAS</strong></h1>
      <hr>
      <table class="sales__table">
        <thead>
          <tr>
            <th>N° de Factura</th>
            <th>Fecha de compra</th>
            <th>Total</th>
            <th>Factura</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($header_sale as $header) : ?>
            <?php extract($header) ?>
            <tr>
              <td><?= $id_sale ?></td>
              <td><?php
                  $fecha = new DateTime($date);
                  $formattedDate = $fecha->format('d/m/Y \a \l\a\s H:i');
                  echo $formattedDate;
                  ?></td>
              <td>$<?= $total ?></td>
              <td><a href="<?= base_url() . "invoice/" . $id_sale ?>">Ver</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  <?php endif ?>
</section>
<?= $this->endSection() ?>