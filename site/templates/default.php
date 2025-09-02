<?php snippet('layout', slots: true) ?>

<h1><?= $page->title()->html() ?></h1>

<section>
  <?= $page->text()->kt() ?>
</section>
