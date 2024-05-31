<?= $this->extend('LayoutTwo') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('title') ?>Lista de Mensajes<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="">Mensajes</h1>
<div class="">
  <?php foreach ($messages as [
    'id_message' => $id_message,
    'lastname' => $lastname,
    'email' => $email,
    'message' => $message,
  ]) : ?>
    <div class="">
      <div class="">
        <div class="">
          <h3 class=""><?= $lastname ?></h3>
          <p class=""><?= $message ?></p>
        </div>
        <button>Eliminar</button>
      </div>
    </div>
  <?php endforeach ?>
</div>
<a href='<?= base_url() ?>'>VOLVER</a>
<?= $pager->links('default', 'my_pagination') ?>
<?= $this->endSection() ?>