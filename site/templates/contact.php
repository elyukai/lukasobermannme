<?php snippet('layout', slots: true) ?>

<h1 class="aos"><?= $page->title()->html() ?></h1>

<section>
  <p class="scaled--small aos"><?= $page->intro()->kti() ?></p>
  <ul class="contacts scaled">
    <?php if ($site->mail()->isNotEmpty()) : ?><li class="aos"><?= kirbytag(['email' => $site->mail(), 'text' => t('Mail'), 'class' => 'contact']) ?></li><?php endif ?>
    <?php foreach ($site->otherContactOptions()->toStructure() as $contactOption) : ?>
    <li class="aos"><a class="contact" href="<?= $contactOption->url() ?>" target="_blank" rel="noopener noreferrer"><?= $contactOption->name()->html() ?></a></li>
    <?php endforeach ?>
  </ul>
</section>
