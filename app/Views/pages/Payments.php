<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='/assets/styles/PaymentSection.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Metodos de Pago<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
  <?php include('components/PaymentSection.php') ?>
</main>
<?= $this->endSection() ?>