<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='<?= base_url() ?>/assets/styles/AboutUsSection.component.css'>
<link rel='stylesheet' href='<?= base_url() ?>/assets/styles/TeamSection.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Sobre Nosotros<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php include('components/AboutUsSection.php') ?>
<?php include('components/TeamSection.php') ?>
<?= $this->endSection() ?>