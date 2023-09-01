<?php snippet('layout', slots: true) ?>

<h1 class="scaled"><?= $page->title()->html() ?></h1>

<section>
  <p class="scaled--small"><?= $page->intro()->kti() ?></p>
  <address class="scaled--small">
    <strong><?= $page->name()->smartypants() ?></strong><br>
    <?= $page->street()->smartypants() ?> <?= $page->number()->smartypants() ?><br>
    <?= $page->zipcode()->smartypants() ?> <?= $page->city()->smartypants() ?><br>
    <?= $page->country()->smartypants() ?>
  </address>
  <ul class="contacts scaled--small">
    <?php if ($page->email()->isNotEmpty()) : ?><li><?= kirbytag(['email' => $page->email(), 'class' => 'contact']) ?></li><?php endif ?>
    <?php if ($page->tel()->isNotEmpty()) : ?><li><?= kirbytag(['tel' => $page->tel(), 'text' => preg_replace('/(\d{4})/', '$1 ', preg_replace('/^(\+\d{2})/', '$1 (0) ', $page->tel()), 1), 'class' => 'contact']) ?></li><?php endif ?>
  </ul>
  <?php if ($page->additionalInformation()->isNotEmpty()) : ?>
  <?= $page->additionalInformation()->kt() ?>
  <?php endif ?>
</section>
