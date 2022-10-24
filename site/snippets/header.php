<!DOCTYPE html>
<html lang="en">

<head>
  <?php snippet("seo") ?>
  <title><?= $page->title()->html() ?> | <?= $site->title()->html() ?></title>
  <link rel="stylesheet" href="https://use.typekit.net/dgn5czr.css">
  <link rel="shortcut icon" href="/favicon.png" type="image/png">
  <?= css(['assets/css/styles.css', '@auto']) ?>
</head>

<body class="<?= $page->template()->name() ?>">
  <header>
    <nav>
      <ul>
        <?php foreach ($site->children()->listed() as $menuPage) : ?>
          <li <?= ($menuPage->id() === $page->id() || $menuPage->isAncestorOf($page)) ? ' class="active"' : '' ?>>
            <a href="<?= $menuPage->url() ?>"><span><?= $menuPage->title()->html() ?></span></a>
          </li>
        <?php endforeach ?>
      </ul>
    </nav>
  </header>
  <main>
