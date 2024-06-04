<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('title') ?>Lista de Usuarios<?= $this->endSection() ?>

<?= $this->section('content') ?>
<table id="example" class="table table-striped" style="width: 100%;">
  <thead>
    <tr>
      <th scope="col">NOMBRE DE USUARIO</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">CORREO ELECTRÓNICO</th>
      <th scope="col">ACTIVO</th>
      <th scope="col">ROL</th>
      <th scope="col">DESACTIVAR</th>
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
        <td><?= $is_active === "0" ? "No" : "Si" ?></td>
        <td><?= $rol ?></td>
        <td><a href=<?= base_url("/status-user/") . $id_user ?>>Desactivar</a></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<a class="button__black" href='<?= base_url() ?>'>VOLVER</a>
<?= $this->endSection() ?>