<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('title') ?>Lista de Mensajes<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="text-center fw-bold">Mensajes</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">NOMBRE y APELLIDO</th>
      <th scope="col">CORREO ELECTRÓNICO</th>
      <th scope="col">MENSAJE</th>
    </tr>
  </thead>
  <?php
  foreach ($messages as $message) {
    extract($message);
  ?>
    <tbody>
      <tr>
        <td><?= $lastname ?></td>
        <td><?= $email ?></td>
        <td><?= $message ?></td>
      </tr>
    </tbody>
  <?php
  }
  ?>
</table>
<a href='<?= base_url() ?>'>VOLVER</a>
<?= $this->endSection() ?>