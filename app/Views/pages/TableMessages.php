<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>
<link href="<?= base_url() ?>assets/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/styles/Table.components.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('title') ?>Lista de Usuarios<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section>
  <div class="text-start pt-4 px-5 pb-1">
    <a href=<?= base_url() ?> class="button__black">VOLVER</a>
  </div>
  <table id="users" class="table table-hover" style="width: 100%;">
    <thead>
      <tr>
        <th>NOMBRE Y APELLIDO</th>
        <th>CORREO ELECTRÓNICO</th>
        <th>MENSAJE</th>
        <th>ESTADO</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($messages !== null) : ?>
        <?php foreach ($messages as $message) : ?>
          <?php extract($message) ?>
          <tr>
            <td><?= $lastname ?></td>
            <td><?= $email ?></td>
            <td><?= $message ?></td>
            <?php if ($message_read == 0) : ?>
              <td><a href="<?= base_url("read_message/$id_message") ?>"><span class="badge badge-not-active">No leido</span></a></td>
            <?php else : ?>
              <td><span class="badge badge-active">Leido</span></td>
            <?php endif ?>
          </tr>
        <?php endforeach ?>
      <?php endif ?>
    </tbody>
  </table>
</section>
<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function() {
    $('#users').DataTable({
      language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ mensajes",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando mensajes del _START_ al _END_ de un total de _TOTAL_ mensajes",
        sInfoEmpty: "Mostrando mensajes del 0 al 0 de un total de 0 mensajes",
        sInfoFiltered: "(filtrado de un total de _MAX_ mensajes)",
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