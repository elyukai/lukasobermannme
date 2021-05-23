<?php

use Kirby\Cms\Page;

snippet("header") ?>

<div class="title">
  <div class="wrapper">
    <span><?= $page->introStart()->kirbytextinline() ?></span>
    <h1><?= $site->title()->smartypants() ?></h1>
    <span><?= $page->introEnd()->kirbytextinline() ?></span>
  </div>
</div>
<section class="projects">
  <div class="wrapper">
    <?php $projects = $site->children()->find('projects'); ?>
    <h2><?php echo $projects->title()->smartypants() ?></h2>
    <?php
    foreach ($page->projectsShowcase()->toPages() as $project) : ?>
      <article>
        <a href="<?= $project->url() ?>">
          <?php if ($cover = $project->gallery()->toFile()) : ?>
            <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->smartypants() ?>">
          <?php endif ?>
          <h3><?= $project->title()->smartypants() ?></h3>
        </a>
      </article>
    <?php endforeach ?>
    <a class="all-projects" href="<?= $projects->url() ?>">All projects</a>
  </div>
</section>

<?php snippet("aboutme") ?>

<?php snippet("footer") ?>
