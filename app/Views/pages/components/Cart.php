<style>
  .offcanvas {

    .offcanvas__header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px;

      .offcanvas__title {
        font-weight: bold;
        margin: 0;
      }

      .offcanvas__toggle {
        &:focus {
          outline: none;
          box-shadow: none;
        }
      }
    }

    .offcanvas__body {
      flex-grow: 1;
      padding: 16px;

      .sneaker {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 5px;
        width: 100%;
        padding: 5px;
        border-bottom: 1px solid #00000050;

        &:last-child {
          border: none;
        }

        .sneaker__img {
          position: relative;

          img {
            width: 65px;
            height: 65px;
            aspect-ratio: 1 / 1;
          }

          .discount {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 12px;
            color: green;
            font-weight: 600;
          }
        }

        .sneaker__body {
          display: flex;
          flex-direction: column;
          align-items: start;
          justify-content: space-between;
          flex-grow: 1;

          /* .sneaker__title {} */
          .sneaker__data {
            font-weight: 600;

            .price {
              color: black;
              opacity: 75%;
              text-decoration: line-through;
            }

            .price-discount {
              color: green;
            }
          }

          .sneaker__size {
            font-weight: 600;
            font-size: 12px;
          }

        }

        .sneaker__button-delete {
          border: none;
          background-color: transparent;
          color: black;
          transition: color .3s ease;

          &:hover {
            color: red;
          }
        }

      }
    }

    .offcanvas__footer {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
      padding: 16px;

      .sneaker__total {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        font-size: 20px;
        font-weight: 600;
      }

      .sneaker__button {
        border: none;
        width: 100%;
        background-color: black;
        color: white;
        padding: 8px 24px;
        margin: 5px;
      }
    }
  }
</style>

<side class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <header class="offcanvas__header">
    <h5 class="offcanvas__title" id="offcanvasRightLabel">Carrito de compras</h5>
    <button type="button" class="btn-close offcanvas__toggle" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </header>
  <section class="offcanvas__body">
    <article class="sneaker">
      <div class="sneaker__img">
        <img src="<?= base_url() ?>assets/img/sneakers/66540a38b0026.jfif" alt="">
        <span class="discount">-12%</span>
      </div>
      <div class="sneaker__body">
        <span class="sneaker__title">Nike Revolution 6 Next Nature</span>
        <div class="sneaker__data">
          <span class="price">$175,000</span>
          <span class="price-discount">$154,000</span>
        </div>
        <span class="sneaker__size">Talle 38</span>
      </div>
      <button class="sneaker__button-delete"><i class="bi bi-trash3-fill"></i></button>
    </article>
    <article class="sneaker">
      <div class="sneaker__img">
        <img src="<?= base_url() ?>assets/img/sneakers/66540a38b0026.jfif" alt="">
        <span class="discount">-12%</span>
      </div>
      <div class="sneaker__body">
        <span class="sneaker__title">Nike Revolution 6 Next Nature</span>
        <div class="sneaker__data">
          <span class="price">$175,000</span>
          <span class="price-discount">$154,000</span>
        </div>
        <span class="sneaker__size">Talle 38</span>
      </div>
      <button class="sneaker__button-delete"><i class="bi bi-trash3-fill"></i></button>
    </article>
    <article class="sneaker">
      <div class="sneaker__img">
        <img src="<?= base_url() ?>assets/img/sneakers/66540a38b0026.jfif" alt="">
        <span class="discount">-12%</span>
      </div>
      <div class="sneaker__body">
        <span class="sneaker__title">Nike Revolution 6 Next Nature</span>
        <div class="sneaker__data">
          <span class="price">$175,000</span>
          <span class="price-discount">$154,000</span>
        </div>
        <span class="sneaker__size">Talle 38</span>
      </div>
      <button class="sneaker__button-delete"><i class="bi bi-trash3-fill"></i></button>
    </article>
  </section>
  <footer class="offcanvas__footer">
    <div class="sneaker__total">
      <span>Total:</span><span>$1,000,000</span>
    </div>
    <button class="sneaker__button">Vaciar carrito</button>
    <button class="sneaker__button">Finalizar la compra</button>
  </footer>
</side>