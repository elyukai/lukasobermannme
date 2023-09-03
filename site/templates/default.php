<?php snippet('layout', slots: true) ?>

<h1 class="scaled aos"><?= $page->title()->html() ?></h1>

<section>
  <?= $page->text()->kt() ?>
</section>
