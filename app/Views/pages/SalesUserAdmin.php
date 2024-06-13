<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>
<link href="<?= base_url() ?>assets/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/styles/TableUsers.components.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url() ?>assets/styles/SalesUsers.component.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>Compras realizadas<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="sales">
  <?php if ($all_headers_sales === null) : ?>
    <div class="sales__history">
      <h1><strong>No hay compras</strong></h1>
      <p>Todavía nadie compró</p>
    </div>
  <?php else : ?>
    <div class="sales__history">
      <h1><strong>HISTORIAL DE VENTAS</strong></h1>
      <hr>
      <table id="sales" class="table table-hover" style="width: 100%;">
        <thead>
          <tr>
            <th>N° de Factura</th>
            <th>Fecha de compra</th>
            <th>Total</th>
            <th>Factura</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($all_headers_sales as $header) : ?>
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
<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#sales').DataTable({
      language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ facturas",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando facturas del _START_ al _END_ de un total de _TOTAL_ facturas",
        sInfoEmpty: "Mostrando facturas del 0 al 0 de un total de 0 facturas",
        sInfoFiltered: "(filtrado de un total de _MAX_ facturas)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior"
        },
      }
    });
  });
</script>
<?= $this->endSection() ?>