<?php snippet("header") ?>

<?php $code = $kirby->response()->code() ?>

<div class="title">
  <div class="wrapper">
    <h1><?= $code === 404 ? 'Not found' : $page->title()->smartypants() ?></h1>
  </div>
</div>
<section>
  <div class="wrapper">
    <?php if ($code === 404) : ?>
      <p>I've searched a long time, but I couldn't find what you were looking for!</p>
    <?php else : ?>
      <p>I don't know what happened...</p>
    <?php endif ?>
    <a class="back" href="<?= $site->url() ?>">Back to home page</a>
  </div>
</section>

<?php snippet("aboutme") ?>

<?php snippet("footer") ?>
