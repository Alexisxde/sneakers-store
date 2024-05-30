<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/CaruselSection.component.css'>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/ImageSection.component.css'>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/FeaturedSection.component.css'>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/GalerySection.component.css'>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/PaymentSection.component.css'>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/BrandsSection.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Inicio<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if (session('msg')) : ?>
  <div class="notification <?= session('msg.type') ?>">
    <div class="notification__body"><?= session('msg.body') ?></div>
  </div>
<?php endif ?>
<?php include('components/CaruselSection.php') ?>
<?php include('components/ImageSection.php') ?>
<?php include('components/FeaturedSection.php') ?>
<?php include('components/GalerySection.php') ?>
<?php include('components/PaymentSection.php') ?>
<?php include('components/BrandsSection.php') ?>
<?= $this->endSection() ?>