<?php snippet('layout', slots: true) ?>

<h1 class="aos"><?= $page->title()->html() ?></h1>

<section>
  <?= $page->text()->kt() ?>
</section>
