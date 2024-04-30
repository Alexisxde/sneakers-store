<h1>Usuarios</h1>
<?php
foreach ($users as $usuario) {
  extract($usuario);
  ?>
    <div>
      <span><?= $nombre ?></span>
      <span><?= $apellido ?></span>
      <span><?= $email ?></span>
      <span><?= $pass ?></span>
    </div>
  <?php
}
?>