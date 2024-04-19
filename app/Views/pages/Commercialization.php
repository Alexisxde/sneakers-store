<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='assets/styles/Commercialization.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Comercialización<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
  <section class='commercialization-section'>
    <h1>Comercialización</h1>
    <p>Bienvenido a nuestra sección de comercialización de zapatillas. En esta página, encontrarás toda la información necesaria sobre los tipos de entregas, formas de envíos, opciones de pago y cualquier otra información relevante para tu experiencia de compra.</p>
    <div>
      <h2>Tipos de Entregas</h2>
      <ul>
        <li>Entrega Estándar: Esta opción de entrega suele demorar entre 3 a 5 días hábiles después de que se procesa tu pedido. Es ideal para aquellos que no tienen prisa y desean ahorrar en costos de envío.</li>
        <li>Entrega Express: ¿Necesitas tus zapatillas con urgencia? Opta por nuestra entrega express para recibir tu pedido en 24 horas (sujeto a disponibilidad y restricciones geográficas).</li>
      </ul>
    </div>
    <div>
      <h2>Formas de Envíos</h2>
      <ul>
        <li>Envío a Domicilio: Entregamos tus zapatillas directamente en la dirección que nos proporciones al momento de realizar tu pedido. Asegúrate de proporcionar una dirección válida y completa para evitar contratiempos en la entrega.</li>
        <li>Retiro en Tienda: ¿Prefieres recoger tu pedido en persona? Puedes seleccionar la opción de recogida en tienda y pasar a buscar tus zapatillas en nuestra sucursal más cercana.</li>
      </ul>
    </div>
    <div id='payments-methods' class="methods-payment-section">
      <h2>Metodos de pagos</h2>
      <p>Ofrecemos diversas opciones de pago para mayor comodidad</p>
      <p>Podés pagar tus compras con cualquiera de estos medios. Es rápido y seguro, siempre.</p>
      <hr>
      <div class='method-payment'>
        <span>Tarjetas de crédito</span>
        <span>Acreditación instantánea.</span>
        <p>Hasta 12 cuotas con interés</p>
        <div>
          <img src='assets/img/payments/visa.svg' alt='Visa'>
          <img src='assets/img/payments/master-card.svg' alt='MasterCard'>
          <img src='assets/img/payments/amex.svg' alt='American Express'>
        </div>
      </div>
      <hr>
      <div class='method-payment'>
        <span>Dinero disponible en Mercado Pago</span>
        <span>Acreditación instantánea.</span>
        <p>Al finalizar tu compra, pagás con el dinero disponible en tu cuenta. Podés ingresar dinero a Mercado Pago por Débito inmediato, tranferencia bancaria o en efectivo.</p>
        <div>
          <img src='assets/img/payments/logo-mercado-pago.svg' alt='Mercado Pago'>
        </div>
      </div>
      <hr>
      <div class='method-payment'>
        <span>Tarjetas de débito</span>
        <span>Acreditación instantánea.</span>
        <div>
          <img src='assets/img/payments/maestro.svg' alt='Maestro'>
          <img src='assets/img/payments/visa-debito.svg' alt='Visa Débito'>
          <img src='assets/img/payments/master-card-debito.svg' alt='MasterCard Débito'>
        </div>
      </div>
      <hr>
      <div class='method-payment'>
        <span>Efectivo</span>
        <span class='pb-2'>Acreditación hasta en 1 día hábil.</span>
        <div>
          <img src='assets/img/payments/pago-facil.svg' alt='Maestro'>
          <img src='assets/img/payments/rapipago.svg' alt='Visa Débito'>
        </div>
      </div>
    </div>
    <div>
      <h2>Información Adicional</h2>
      <p>Además de nuestras opciones de entrega, formas de envío y pagos, queremos asegurarnos de que tu experiencia de compra sea lo más satisfactoria posible. Si tienes alguna pregunta o necesitas ayuda adicional, no dudes en ponerte en contacto con nuestro equipo de atención al cliente. Estamos aquí para ayudarte en todo lo que necesites.</p>
      <p>¡Gracias por elegirnos para adquirir tus zapatillas!</p>
    </div>
  </section>
</main>
<?= $this->endSection() ?>