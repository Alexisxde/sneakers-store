<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='/assets/styles/ContactSection.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Contactos<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
  <?php include('components/ContactSection.php') ?>
</main>
<?= $this->endSection() ?>