<?php

use Kirby\Cms\Page;

snippet("header") ?>

<div class="title">
  <div class="wrapper">
    <span>Hello, I'm</span>
    <h1><?= $site->title()->html() ?></h1>
    <span>and I <strong>develop</strong> and <strong>design</strong> software for <strong>web</strong>, <strong>mobile</strong> and <strong>desktop</strong>.</span>
  </div>
</div>
<section class="projects">
  <div class="wrapper">
    <h2>Projects</h2>
    <?php
    $projects = $site->children()->find('projects');
    $featured = $projects->featured()->split();
    foreach ($projects->children()->listed()->filter(function (Page $project) use ($featured) {
      return in_array($project->id(), $featured);
    }) as $project): ?>
    <article>
      <a href="<?= $project->url() ?>">
        <?php $cover = $project->cover()->toFile() ?>
        <img src="<?= $cover->url() ?>" alt="<?= $cover->alt() ?>">
        <h3><?= $project->title()->html() ?></h3>
      </a>
    </article>
    <?php endforeach ?>
    <a class="all-projects" href="<?= $projects->url() ?>">All projects</a>
  </div>
</section>

<?php snippet("aboutme") ?>

<?php snippet("footer") ?>
