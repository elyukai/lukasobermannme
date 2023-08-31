<?php snippet('layout', slots: true) ?>

<h1 class="scaled"><?= $page->title()->html() ?></h1>

<section class="works works--all">
  <div class="grid">
    <?php
    foreach ($page->children()->listed() as $work) : ?>
      <article class="work">
        <a href="<?= $work->url() ?>">
          <?php
          $cover = $work->gallery()->toFile();

          if ($cover?->type() == "video") {
            $cover = $cover->thumbnail()->toFile();
          }

          if ($cover) : ?>
            <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->html() ?>" aria-hidden="true">
          <?php endif ?>
          <h3 class="title"><?= $work->title()->html() ?></h3>
          <span class="areas"><?= $work->scopes()->html() ?></span><!--
        --><span class="arrow" aria-hidden="true">&nbsp;→</span>
        </a>
      </article>
    <?php endforeach ?>
  </div>
</section>
