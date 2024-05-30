<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('title') ?>Lista de Usuarios<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="text-center fw-bold">Usuarios</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE DE USUARIO</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">CORREO ELECTRÓNICO</th>
      <th scope="col">ROL</th>
      <th scope="col">EDITAR</th>
      <th scope="col">DESACTIVAR</th>
    </tr>
  </thead>
  <?php
  foreach ($users as $user) {
    extract($user);
  ?>
    <tbody>
      <tr>
        <th scope="row"><?= $id_user ?></th>
        <td><?= $username ?></td>
        <td><?= $surname ?></td>
        <td><?= $name ?></td>
        <td><?= $email ?></td>
        <td><?= $rol ?></td>
        <td><a href=<?= base_url("/edit-user/") . $id_user ?>>Editar</a></td>
        <td><a href=<?= base_url("/status-user/") . $id_user ?>>Desactivar</a></td>
      </tr>
    </tbody>
  <?php
  }
  ?>
</table>
<a href='<?= base_url() ?>'>VOLVER</a>
<?= $this->endSection() ?>