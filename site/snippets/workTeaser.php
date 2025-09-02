<article class="work">
  <a href="<?= $work->url() ?>">
    <?php

            use Kirby\Toolkit\Str;

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
    <span class="areas"><?= join(", ", array_map(function ($scope) {
      return match ($scope) {
        'web' => t('Web Design'),
        'ui' => t('User Interface Design'),
        'ux' => t('User Experience Design'),
        'cd' => t('Corporate Design'),
        'gd' => t('Graphic Design'),
        'gamed' => t('Game Design'),
        'envd' => t('Environment Design'),
        'mg' => t('Motion Graphics'),
        'pm' => t('Project Management'),
        'frontenddev' => t('Frontend Development'),
        'backenddev' => t('Backend Development'),
        'appdev' => t('Application Development'),
        'cms' => t('Content Management Systems'),
        'seo' => t('Search Engine Optimization'),
        default => $scope,
      };
    }, Str::split($work->scopes()->toArray()['scopes']))) ?></span><!--
 --><span class="arrow" aria-hidden="true">&nbsp;→</span>
  </a>
</article>
