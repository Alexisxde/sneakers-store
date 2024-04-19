<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='assets/styles/ProductsSection.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Catalogo<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
  <?php include('components/ProductsSection.php') ?>
</main>
<?= $this->endSection() ?>