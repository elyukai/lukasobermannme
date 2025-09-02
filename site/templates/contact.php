<?php snippet('layout', slots: true) ?>

<h1><?= $page->title()->html() ?></h1>

<section>
  <p class="scaled--small"><?= $page->intro()->kti() ?></p>
  <ul class="contacts scaled">
    <?php foreach ($site->contactOptions()->toStructure() as $contactOption) : ?>
    <li><a class="contact" href="<?= $contactOption->link()->toUrl() ?>" target="_blank" rel="noopener noreferrer"><?= $contactOption->name()->html() ?></a></li>
    <?php endforeach ?>
  </ul>
</section>
