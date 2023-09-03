<article class="work aos">
  <a href="<?= $work->url() ?>">
    <?php
      $cover = $work->gallery()->toFile();

      if ($cover?->type() == "video" && $cover->thumbnail()->isNotEmpty()) {
        $cover = $cover->thumbnail()->toFile();
      }

      if ($cover) : ?>
      <?php $sizes = "(min-width: 2200px) 700px, (min-width: 1440px) 33vw, (min-width: 900px) 50vw, 100vw" ?>
      <picture>
        <!-- <source
          srcset="<?php /* echo $cover->srcset([
            '400w' => ['width' => 400, 'format' => 'avif'],
            '600w' => ['width' => 600, 'format' => 'avif'],
            '800w' => ['width' => 800, 'format' => 'avif'],
            '1200w' => ['width' => 1200, 'format' => 'avif'],
            '1600w' => ['width' => 1600, 'format' => 'avif']]) */ ?>"
          sizes="<?php /* echo $sizes */ ?>"
          type="image/avif"
        > -->

        <source
          srcset="<?= $cover->srcset([
            '400w' => ['width' => 400, 'format' => 'webp'],
            '600w' => ['width' => 600, 'format' => 'webp'],
            '800w' => ['width' => 800, 'format' => 'webp'],
            '1200w' => ['width' => 1200, 'format' => 'webp'],
            '1600w' => ['width' => 1600, 'format' => 'webp']]) ?>"
          sizes="<?= $sizes ?>"
          type="image/webp"
        >
        <img
          src="<?= $cover->url() ?>"
          srcset="<?= $cover->srcset([400, 600, 800, 1200, 1600]) ?>"
          sizes="<?= $sizes ?>"
          alt="<?= $cover->alt()->html() ?>"
          aria-hidden="true"
          width="<?= $cover->width() ?>"
          height="<?= $cover->height() ?>"
        >
      </picture>
    <?php endif ?>
    <h3 class="title"><?= $work->title()->html() ?></h3>
    <span class="areas"><?= $work->scopes()->html() ?></span><!--
 --><span class="arrow" aria-hidden="true">&nbsp;→</span>
  </a>
</article>
