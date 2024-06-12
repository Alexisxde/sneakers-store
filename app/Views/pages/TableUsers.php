<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>
<link href="<?= base_url() ?>assets/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/styles/TableUsers.components.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('title') ?>Lista de Usuarios<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="back">
  <a class="ms-4 mt-4 btn btn-dark" href='<?= base_url() ?>'>VOLVER</a>
</div>
<table id="users" class="table table-hover" style="width: 100%;">
  <thead>
    <tr>
      <th scope="col">NOMBRE DE USUARIO</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">CORREO ELECTRÓNICO</th>
      <th scope="col">ROL</th>
      <th scope="col">ESTADO</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($users as $user) {
      extract($user);
    ?>
      <tr>
        <td scope="row"><?= $username ?></td>
        <td><?= $surname ?></td>
        <td><?= $name ?></td>
        <td><?= $email ?></td>
        <td><a href=<?= base_url("rol_user/$id_user") ?>><?= $rol === "admin" ? '<span class="badge badge-admin">Admin</span>' : '<span class="badge">Usuario</span>' ?></a></td>
        <td><a href=<?= base_url("status_user/$id_user") ?>><?= $is_active === "0" ? '<span class="badge badge-active">Activar</span>' : '<span class="badge badge-not-active">Desactivar</span>' ?></a></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function() {
    $('#users').DataTable({
      language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
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