<!DOCTYPE html>
<html lang="en">

<head>

  <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0'>
    <link href='<?= base_url() ?>/assets/css/bootstrap.min.css' rel='stylesheet' integrity='' crossorigin=''>
    <link href='<?= base_url() ?>/assets/icons/bootstrap-icons.min.css' rel='stylesheet' integrity='' crossorigin=''>
    <link rel='stylesheet' href='<?= base_url() ?>/assets/global.css'>
    <link rel='icon' href='<?= base_url() ?>/assets/icon-web/favicon.svg' type='image/svg'>
    <title>Usuarios | Skeakers Store</title>
  </head>
</head>

<body>
  <main class="container p-5 vh-100">
    <h1 class="text-center fw-bold">Usuarios</h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">USERNAME</th>
          <th scope="col">SURNAME</th>
          <th scope="col">NAME</th>
          <th scope="col">EMAIL</th>
          <th scope="col">ROL</th>
        </tr>
      </thead>
      <?php
      foreach ($users as $usuario) {
        extract($usuario);
      ?>
        <tbody>
          <tr>
            <th scope="row"><?= $id ?></th>
            <td><?= $username ?></td>
            <td><?= $surname ?></td>
            <td><?= $name ?></td>
            <td><?= $email ?></td>
            <td><?= $rol ?></td>
          </tr>
        </tbody>
      <?php
      }
      ?>
    </table>
    <a href='<?= base_url() ?>'>
      < VOLVER</a>
  </main>
</body>

</html>