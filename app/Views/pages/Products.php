<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/ProductsSection.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Catalogo<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php include('components/ProductsSection.php') ?>
<?= $this->endSection() ?>