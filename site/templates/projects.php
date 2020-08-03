<?php snippet("header") ?>

<div class="title">
  <div class="wrapper">
    <h1><?= $page->title()->html() ?></h1>
  </div>
</div>
<section class="projects">
  <div class="wrapper">
    <?php foreach ($page->children()->listed() as $project) : ?>
      <article>
        <a href="<?= $project->url() ?>">
          <?php $cover = $project->cover()->toFile() ?>
          <img src="<?= $cover->url() ?>" alt="<?= $cover->alt() ?>">
          <h2><?= $project->title()->html() ?></h2>
          <ul>
            <?php foreach ($project->scopes()->split() as $scope) : ?>
              <li><?= $scope ?></li>
            <?php endforeach ?>
          </ul>
          <p class="read-more">Read More</p>
        </a>
      </article>
    <?php endforeach ?>
  </div>
</section>

<?php snippet("aboutme") ?>

<?php snippet("footer") ?>
