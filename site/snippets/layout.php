<!DOCTYPE html>
<html lang="<?= preg_replace('/_/', '-', $site->lang()) ?>">

<head>
  <?php snippet('seo/head') ?>
  <title><?= $page->title()->html() ?> | <?= $site->title()->html() ?></title>
  <link rel="shortcut icon" href="/favicon.png" type="image/png">
  <meta name="theme-color" media="(prefers-color-scheme: light)" content="#eae8f0">
  <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#141221">
  <?= css(['assets/css/styles.css', '@auto']) ?>
</head>

<body class="<?= $page->template()->name() ?>">
  <a href="#content" class="skip-link">Skip to main content</a>
  <header>
    <nav class="main">
      <h2 class="sr-only"><?= t('Primary Navigation') ?></h2>
      <ul>
        <?php foreach ($site->children()->listed() as $menuPage) : ?>
          <li>
            <a href="<?= $menuPage->url() ?>"<?= ($menuPage->id() === $page->id() || $menuPage->isAncestorOf($page)) ? ' aria-current="page"' : '' ?>><span><?= $menuPage->title()->html() ?></span></a>
          </li>
        <?php endforeach ?>
      </ul>
    </nav>
    <nav class="languages">
      <h2 class="sr-only"><?= t('Language Menu') ?></h2>
      <ul>
        <?php foreach($kirby->languages() as $language): ?>
        <li<?php e($kirby->language() == $language, ' class="active"') ?>>
          <a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>"><?= html($language->name()) ?></a>
        </li>
        <?php endforeach ?>
      </ul>
    </nav>
  </header>
  <main id="content">
    <?= $slots->default() ?>
  </main>
  <footer>
    <?php $footerMenu = $site->footerMenu()->toPages(); ?>
    <?php if ($footerMenu->isNotEmpty()) : ?>
    <nav class="footer">
      <ul>
        <?php foreach ($footerMenu as $footerMenuItem): ?>
        <li><a href="<?= $footerMenuItem->url() ?>"<?= ($footerMenuItem->id() === $page->id() || $footerMenuItem->isAncestorOf($page)) ? ' aria-current="page"' : '' ?>><?= $footerMenuItem->title()->html() ?></a></li>
        <?php endforeach ?>
      </ul>
    </nav>
    <?php endif ?>
    <p class="copyright"><?= $site->copyright()->html() ?></p>
  </footer>

  <?= js([
    'assets/js/enabled.js',
    'assets/js/slideshow.js',
    '@auto',
  ]) ?>

  <?php snippet('seo/schemas') ?>
</body>
</html>
