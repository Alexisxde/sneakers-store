<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?= lang('Errors.pageNotFound') ?></title>
  <style>
    body {
      font-family: 'Lato', sans-serif;
      color: black;
      margin: 0;

      main {
        display: table;
        width: 100%;
        height: 100vh;
        text-align: center;

        .fof {
          display: table-cell;
          vertical-align: middle;

          h1 {
            font-size: 50px;
            margin: 0;
          }

          p {
            display: inline-block;
            padding-right: 3px;
            animation: type .5s alternate infinite;
          }

          span {
            display: block;

            a {
              color: black;
            }
          }
        }
      }
    }

    @keyframes type {
      from {
        box-shadow: inset -3px 0px 0px black;
      }

      to {
        box-shadow: inset -3px 0px 0px transparent;
      }
    }
  </style>
</head>

<body>
  <main>
    <div class="fof">
      <h1>Error 404</h1>
      <p class="text-center">
        <?php if (ENVIRONMENT !== 'production') : ?>
          <?= nl2br(esc($message)) ?>
        <?php else : ?>
          the page you are looking for not avaible!
        <?php endif; ?>
      </p>
      <span>go to <a href="<?= base_url() ?>">home</a></span>
    </div>
  </main>
</body>

</html>