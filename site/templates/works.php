<?php snippet('layout', slots: true) ?>

<h1 class="scaled aos"><?= $page->title()->html() ?></h1>

<section class="works works--all">
  <div class="grid">
    <?php
    foreach ($page->children()->listed() as $work) : ?>
      <?php snippet('workTeaser', ['work' => $work]) ?>
    <?php endforeach ?>
  </div>
</section>
