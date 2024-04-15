<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='/assets/styles/CaruselSection.component.css'>
<link rel='stylesheet' href='/assets/styles/ImageSection.component.css'>
<link rel='stylesheet' href='/assets/styles/FeaturedSection.component.css'>
<link rel='stylesheet' href='/assets/styles/GalerySection.component.css'>
<link rel='stylesheet' href='/assets/styles/BrandsSection.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Inicio<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
  <?php include('components/CaruselSection.php') ?>
  <?php include('components/ImageSection.php') ?>
  <?php include('components/FeaturedSection.php') ?>
  <?php include('components/GalerySection.php') ?>
  <?php include('components/BrandsSection.php') ?>
</main>
<?= $this->endSection() ?>