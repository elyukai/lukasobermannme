<!DOCTYPE html>
<html lang="<?= preg_replace('/_/', '-', $site->lang()) ?>">

<head>
  <?php snippet('seo/head') ?>
  <title><?= $page->title()->html() ?> | <?= $site->title()->html() ?></title>
  <link rel="shortcut icon" href="/favicon.png" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" media="(prefers-color-scheme: light)" content="<?= isset($themeColorLight) ? $themeColorLight : '#eae8f0' ?>">
  <meta name="theme-color" media="(prefers-color-scheme: dark)" content="<?= isset($themeColorDark) ? $themeColorDark : '#141221' ?>">
  <?= css([
    'assets/css/fonts.css',
    'assets/css/variables.css',
    'assets/css/global.css',
    'assets/css/scroll-enabled.css',
    'assets/css/simple-typewriter.css',
    'assets/css/header.css',
    'assets/css/gallery.css',
    'assets/css/works.css',
    'assets/css/footer.css',
    '@auto',
  ]) ?>
  <?php if (isset($style)) : ?>
  <style>
    <?= $style ?>
  </style>
  <?php endif ?>
  <link rel="preload" as="font" type="font/woff2" crossorigin href="/assets/fonts/borna-bold.woff2">
  <link rel="preload" as="font" type="font/woff2" crossorigin href="/assets/fonts/borna-bolditalic.woff2">
  <link rel="preload" as="font" type="font/woff2" crossorigin href="/assets/fonts/borna-medium.woff2">
  <link rel="preload" as="font" type="font/woff2" crossorigin href="/assets/fonts/borna-mediumitalic.woff2">
  <link rel="preload" as="font" type="font/woff2" crossorigin href="/assets/fonts/borna-regular.woff2">
  <link rel="preload" as="font" type="font/woff2" crossorigin href="/assets/fonts/borna-regularitalic.woff2">
  <link rel="preload" as="font" type="font/woff2" crossorigin href="/assets/fonts/borna-semibold.woff2">
  <link rel="preload" as="font" type="font/woff2" crossorigin href="/assets/fonts/borna-semibolditalic.woff2">
</head>

<body class="<?= $page->template()->name() ?>">
  <div class="max-width">
    <a href="#content" class="skip-link">Skip to main content</a>
    <header>
      <nav class="main">
        <h2 class="sr-only"><?= t('Primary Navigation') ?></h2>
        <ul>
          <?php $headerMenu = $site->headerMenu()->toPages(); ?>
          <?php foreach ($headerMenu as $headerMenuItem) : ?>
            <li>
              <a href="<?= $headerMenuItem->url() ?>"<?= ($headerMenuItem->id() === $page->id() || $headerMenuItem->isAncestorOf($page)) ? ' aria-current="page"' : '' ?>><?= $headerMenuItem->title()->html() ?></a>
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
      <p class="copyright"><?= $site->copyright()->kti() ?></p>
    </footer>
  </div>

  <?= js([
    'assets/js/enabled.js',
    'assets/js/gallery.js',
    'assets/js/scroll-animate.js',
    'assets/js/simple-typewriter.js',
    '@auto',
  ]) ?>

  <?php snippet('seo/schemas') ?>
</body>
</html>
