<?php
/**
 * @var \Kirby\Cms\App $kirby
 * @var \Kirby\Cms\Site $site
 * @var \Kirby\Cms\Page $page
 */
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if ($site->metaAuthor()->isNotEmpty()) : ?>
  <meta name="author" content="<?= $page->metaAuthor()->esc() ?>">
<?php endif ?>
<?php if ($site->metaDescription()->isNotEmpty()) : ?>
  <meta name="description" content="<?= $page->metaDescription()->esc() ?>">
<?php endif ?>
<meta name="date" content="<?= $page->modified('Y-m-d') ?>">

<link rel="canonical" href="<?= $page->url() ?>" />
