<!DOCTYPE html>
<html lang='es'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0'>
  <link href='<?= base_url() ?>/assets/css/bootstrap.min.css' rel='stylesheet' integrity='' crossorigin=''>
  <link href='<?= base_url() ?>/assets/icons/bootstrap-icons.min.css' rel='stylesheet' integrity='' crossorigin=''>
  <link rel='stylesheet' href='<?= base_url() ?>/assets/global.css'>
  <link rel='icon' href='<?= base_url() ?>/assets/icon-web/favicon.svg' type='image/svg'>
  <link rel='stylesheet' href='<?= base_url() ?>/assets/styles/Nav.component.css'>
  <?= $this->renderSection('css') ?>
  <link rel='stylesheet' href='<?= base_url() ?>/assets/styles/Footer.component.css'>
  <title><?= $this->renderSection('title') ?> | Skeakers Store</title>
</head>

<body>
  <?= $this->include('Nav.php') ?>
  <main>
    <?= $this->renderSection('content') ?>
  </main>
  <?= $this->include('Footer.php') ?>
</body>
<?= $this->renderSection('script') ?>
<script src='<?= base_url() ?>/assets/js/bootstrap.min.js' integrity='' crossorigin=''></script>

</html>