<?php snippet('layout', slots: true) ?>

<?php $code = $kirby->response()->code() ?>

<h1 class="scaled"><?= $code === 404 ? t('Not found') : $page->title()->smartypants() ?></h1>

<?php if ($code === 404) : ?>
  <p><?= t('I’ve searched a long time, but I couldn’t find what you were looking for!') ?></p>
<?php else : ?>
  <p><?= t('I don’t know what happened …') ?></p>
<?php endif ?>

<a class="back scaled--small" href="<?= $site->url() ?>">← <?= t('Back to home page') ?></a>
