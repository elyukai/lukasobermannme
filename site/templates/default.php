<?php snippet('layout', slots: true) ?>

<h1 class="scaled aos"><?= $page->title()->html() ?></h1>

<section class="aos-parent">
  <?= $page->text()->kt() ?>
</section>
