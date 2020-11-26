<?php snippet("header") ?>

<div class="title">
  <div class="wrapper">
    <h1><?= $page->title()->smartypants() ?></h1>
  </div>
</div>
<section>
  <div class="wrapper">
    <?= $page->text()->kirbytext() ?>
  </div>
</section>

<?php snippet("aboutme") ?>

<?php snippet("footer") ?>
