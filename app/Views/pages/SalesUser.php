<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>
<style>
  .sales {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;

    .invoice {
      width: 100%;
      border: 1px solid #ccc;
      padding: 20px;
      background: #f0f0f0;

      .invoice__details {
        margin-bottom: 20px;

        p {
          margin: 5px 0;
        }
      }

      .invoice__table {
        width: 100%;
        text-align: center;
      }
    }

    .total {
      margin-top: 20px;
      text-align: right;
    }

    .invoice__button-download {
      width: 100%;
      text-align: right;
      padding: 10px;

      button {
        color: white;
        background-color: black;
        border: none;
        padding: 8px 24px;
        border-radius: 5px;
        transition: background-color .3s ease;

        &:hover {
          background-color: darkblue;
        }
      }
    }
  }

  @media print {
    .invoice__button-download {
      display: none;
    }
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Compras realizadas<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="sales">
  <?php if ($sales === null) : ?>
    <div class="invoce text-center">
      <h1><strong>No posee historial de compras</strong></h1>
      <a href="<?= base_url('sneakers') ?>">Vea nuestro catalogo de zapatillas</a>
    </div>
  <?php else : ?>
    <div class="invoice">
      <h1><strong>SNEAKERS</strong></h1>
      <div class="invoice__details">
        <p><strong>Dirección:</strong> 123 Fake Street, Falselandia</p>
        <p><strong>Telefono:</strong> +123 456 7890 | +098 765 4321</p>
        <p><strong>Correo electrónico:</strong> sneakersstore@gmail.com | sneakersshop@hotmail.com</p>
      </div>
      <hr>
      <?php $total = 0; ?>
      <table class="invoice__table">
        <thead>
          <tr>
            <th>Marca y Modelo</th>
            <th>Talle</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Fecha de compra</th>
          </tr>
        </thead>
        <?php foreach ($sneakers as $i => $sneaker) : ?>
          <?php extract($sneaker)  ?>
          <?php $total += $sales[$i]['price']; ?>
          <tbody>
            <tr>
              <td><?= $brand . " " . $model ?></td>
              <td><?= $sales[$i]['size'] ?></td>
              <td>$<?= $sales[$i]['price'] ?></td>
              <td><?= $sales[$i]['quantity'] ?></td>
              <td>
                <?php
                $fecha_objeto = new DateTime($sales[$i]['date_sale']);
                echo $fecha_formateada = $fecha_objeto->format('d/m/Y');
                ?>
              </td>
            </tr>
          </tbody>
        <?php endforeach ?>
      </table>
      <div class="total"><strong>TOTAL: $<?= number_format($total, 3, '.', '') ?></strong></div>
    </div>
    <div class="invoice__button-download">
      <button onclick="imprimirPagina()">Descargar</button>
    </div>
  <?php endif ?>
</section>
<script>
  function imprimirPagina() {
    window.print();
  }
</script>
<?= $this->endSection() ?>