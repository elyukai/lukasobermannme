<?php use Kirby\Cms\Page; ?>
<?php snippet('layout', slots: true) ?>

<h1 class="sr-only"><?= $page->title()->html() ?></h1>

<p class="intro scaled"><?= $page->intro()->html() ?></p>

<section class="works">
  <h2><?= t('Selected Work') ?></h2>
  <div class="grid">
    <?php
    foreach ($page->selectedWork()->toPages() as $work) : ?>
      <article class="work">
        <a href="<?= $work->url() ?>">
          <?php if ($cover = $work->gallery()->toFile()) : ?>
            <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->html() ?>" aria-hidden="true">
          <?php endif ?>
          <h3 class="title"><?= $work->title()->html() ?></h3>
          <span class="areas"><?= $work->scopes()->html() ?></span><!--
       --><span class="arrow" aria-hidden="true">&nbsp;→</span>
        </a>
      </article>
    <?php endforeach ?>
  </div>
  <a href="<?= $page->selectedWork()->toPage()?->parent()->url() ?>" class="more"><span class="arrow" aria-hidden="true">→ </span><?= t('View all works') ?></a>
</section>

<p class="intro scaled"><?= $page->contactHook()->html() ?> →&nbsp;<a class="contact" href="mailto:lukas@lukasobermann.me">Mail</a> →&nbsp;<a class="contact" href="https://twitter.com/@elyukai" target="_blank" rel="noopener noreferrer">Twitter</a> →&nbsp;<a class="contact" href="https://mastodon.social/@elyukai" target="_blank" rel="noopener noreferrer">Mastodon</a> →&nbsp;<a class="contact" href="https://github.com/elyukai" target="_blank" rel="noopener noreferrer">GitHub</a></p>

<section class="aboutme">
  <h2><?= t('About Me') ?></h2>
  <div class="scaled--small">
    <?= $page->aboutMe()->kirbytext() ?>
  </div>
  <a href="<?= $site->find("page://jLnMUVj7Z35jOjEk")?->url() ?>" class="more"><span class="arrow" aria-hidden="true">→ </span><?= t('View my profile/CV') ?></a>
</section>
