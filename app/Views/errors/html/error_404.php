<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?= lang('Errors.pageNotFound') ?></title>
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
</head>

<body>
  <div class="container">
    <h1 class="text-center">404</h1>
    <p class="text-center">
      <?php if (ENVIRONMENT !== 'production') : ?>
        <?= nl2br(esc($message)) ?>
      <?php else : ?>
        the page you are looking for not avaible!
      <?php endif; ?>
    </p>
  </div>
</body>

</html>