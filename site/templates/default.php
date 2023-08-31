<?php snippet('layout', slots: true) ?>

<h1 class="scaled"><?= $page->title()->html() ?></h1>

<section>
  <?= $page->text()->kirbytext() ?>
</section>
