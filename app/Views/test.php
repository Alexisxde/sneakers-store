<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?><?= $this->endSection() ?>

<?= $this->section('title') ?>Test<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid" style="max-width: 1920px; margin: 0 auto;">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 p-4 m-3">
    <!-- <div class="d-grid col pb-4">
      <div class="card border-0 shadow-sm p-3 rounded">
        <div class="card-img-top position-relative">
          <img class="img-fluid" src="https://www.medias-stylo.com/wp-content/uploads/2023/03/LR06510-700x700.jpg" alt="">
          <div class="rounded-circle shadow-sm position-absolute top-0 end-0 m-3 p-3 m-sm-2 p-sm-2"><i class="bi bi-cart"></i></div>
        </div>
        <div class="card-body p-3 pb-1 d-flex flex-column">
          <h5 class="card-title flex-grow-1">Pack x3 Tennis Morley</h5>
          <div class="card-group d-flex gap-1">
            <div class="rounded-circle" style="background-color: #f0f0f0; width: 25px; height: 25px;"></div>
            <div class="rounded-circle" style="background-color: #b6bebf; width: 25px; height: 25px;"></div>
            <div class="rounded-circle" style="background-color: #2c2f33; width: 25px; height: 25px;"></div>
          </div>
          <div class="card-text fw-bold text-success fs-5">$16,080.00</div>
        </div>
      </div>
    </div> -->

    <!-- @foreach -->
    <div class="d-grid col pb-4">
      <div class="card border-0 shadow-sm p-3 rounded">
        <img class="card-img-top img-fluid rounded-3" src="https://th.bing.com/th/id/OIP.cJYPt6aeggNerKbVQrDdVQHaHa?rs=1&pid=ImgDetMain" alt="">
        <div class="card-body p-3 pb-1 d-flex flex-column">
          <h5 class="card-title flex-grow-1">Nike MatchFit White</h5>
          <div class="card-group d-flex gap-1">
            <div class="rounded-circle" style="background-color: #f0f0f0; width: 25px; height: 25px;"></div>
            <div class="rounded-circle" style="background-color: #b6bebf; width: 25px; height: 25px;"></div>
            <div class="rounded-circle" style="background-color: #2c2f33; width: 25px; height: 25px;"></div>
          </div>
          <div class="card-text fw-bold text-success fs-5 mt-1">$2,800.00</div>
          <button class="btn btn-dark mt-1">Añadir al carrito</button>
        </div>
      </div>
    </div>
    <!-- @endforeach -->

    <div class="d-grid col pb-4">
      <div class="card border-0 shadow-sm p-3 rounded">
        <img class="card-img-top img-fluid rounded-3" src="https://www.medias-stylo.com/wp-content/uploads/2023/03/LR06510-700x700.jpg" alt="">
        <div class="card-body p-3 pb-1 d-flex flex-column">
          <h5 class="card-title flex-grow-1">Pack x3 Tennis Morley</h5>
          <div class="card-group d-flex gap-1">
            <div class="rounded-circle" style="background-color: #f0f0f0; width: 25px; height: 25px;"></div>
            <div class="rounded-circle" style="background-color: #b6bebf; width: 25px; height: 25px;"></div>
            <div class="rounded-circle" style="background-color: #2c2f33; width: 25px; height: 25px;"></div>
          </div>
          <div class="card-text fw-bold text-success fs-5 mt-1">$16,080.00</div>
          <button class="btn btn-dark mt-1">Añadir al carrito</button>
        </div>
      </div>
    </div>

  </div>
</div>
</div>

<?= $this->endSection() ?>