<?php $pager->setSurroundCount(2) ?>

<div class="pagination">
  <?php if ($pager->hasPrevious()) : ?>
    <a href="<?= $pager->getPrevious() ?>" class="page">Anterior</a>
  <?php endif ?>

  <?php foreach ($pager->links() as $link) : ?>
    <a href="<?= $link['uri'] ?>" class="page <?= $link['active'] ? 'active' : '' ?>">
      <?= $link['title'] ?>
    </a>
  <?php endforeach ?>

  <?php if ($pager->hasNext()) : ?>
    <a href="<?= $pager->getNext() ?>" class="page">Siguiente</a>
  <?php endif ?>
</div>