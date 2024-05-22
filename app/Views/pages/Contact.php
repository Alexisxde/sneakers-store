<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>
<link rel='stylesheet' href='<?= base_url() ?>assets/styles/ContactSection.component.css'>
<?= $this->endSection() ?>

<?= $this->section('title') ?>Contactos<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php include('components/ContactSection.php') ?>
<?= $this->endSection() ?>