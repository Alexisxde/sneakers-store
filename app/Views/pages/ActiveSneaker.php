<?= $this->extend('Layout') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('title') ?><?= $brand . " " . $model ?> <?= $is_active === 0 ? "Desactivada" : "Activada" ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Zapatilla <?= $brand . " " . $model ?> <?= $is_active === 0 ? "Desactivada" : "Activada" ?></h1>
<a href="<?= base_url("/sneakers") ?>">Volver</a>
<?= $this->endSection() ?>