<!DOCTYPE html>
<html lang='es'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0'>
  <link href='assets/css/bootstrap.min.css' rel='stylesheet' integrity='' crossorigin=''>
  <link href='assets/icons/bootstrap-icons.min.css' rel='stylesheet' integrity='' crossorigin=''>
  <link rel='stylesheet' href='assets/global.css'>
  <link rel='icon' href='assets/icon-web/favicon.svg' type='image/svg'>
  <link rel='stylesheet' href='assets/styles/Nav.component.css'>
  <?= $this->renderSection('css') ?>
  <link rel='stylesheet' href='assets/styles/Footer.component.css'>
  <title><?= $this->renderSection('title') ?> | Skeakers Store</title>
</head>

<body>
  <?= $this->include('Nav.php') ?>
  <?= $this->renderSection('content') ?>
  <?= $this->include('Footer.php') ?>
</body>
<?= $this->renderSection('script') ?>
<script src='assets/js/bootstrap.min.js' integrity='' crossorigin=''></script>

</html>