<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='assets/styles/AboutUsSection.component.css'>
<link rel='stylesheet' href='assets/styles/TeamSection.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Sobre Nosotros<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
  <?php include('components/AboutUsSection.php') ?>
  <?php include('components/TeamSection.php') ?>
</main>
<?= $this->endSection() ?>