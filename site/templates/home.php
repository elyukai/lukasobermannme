<?php use Kirby\Cms\Page; ?>
<?php snippet('layout', slots: true) ?>

<h1 class="sr-only"><?= $page->title()->html() ?></h1>

<p class="intro scaled"><?= $page->intro()->html() ?></p>

<section class="works">
  <h2><?= t('Selected Work') ?></h2>
  <div class="grid">
    <?php
    foreach ($page->selectedWork()->toPages() as $work) : ?>
      <?php snippet('workTeaser', ['work' => $work]) ?>
    <?php endforeach ?>
  </div>
  <a href="<?= $page->selectedWork()->toPage()?->parent()->url() ?>" class="more"><span class="arrow" aria-hidden="true">→ </span><?= t('View all works') ?></a>
</section>

<p class="intro scaled"><?= $page->contactHook()->html() ?> <?php if ($site->mail()->isNotEmpty()) : ?>→&nbsp;<?= kirbytag(['email' => $site->mail(), 'text' => t('Mail'), 'class' => 'contact']) ?><?php endif ?><?php foreach ($site->otherContactOptions()->toStructure() as $contactOption) : ?> →&nbsp;<a class="contact" href="<?= $contactOption->url() ?>" target="_blank" rel="noopener noreferrer"><?= $contactOption->name()->html() ?></a><?php endforeach ?></p>

<section class="aboutme">
  <h2><?= t('About Me') ?></h2>
  <div class="scaled--small">
    <?= $page->aboutMe()->kirbytext() ?>
  </div>
  <a href="<?= $site->find("page://jLnMUVj7Z35jOjEk")?->url() ?>" class="more"><span class="arrow" aria-hidden="true">→ </span><?= t('View my profile/CV') ?></a>
</section>
