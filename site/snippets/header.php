<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Lukas Obermann">
  <meta name="description" content="The personal website for Lukas Obermann, showcasing previous and current projects as well as being a digital CV.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page->title()->html() ?> | <?= $site->title()->html() ?></title>
  <link rel="stylesheet" href="https://use.typekit.net/dgn5czr.css">
  <link rel="shortcut icon" href="/favicon.png" type="image/png">
  <?= css(['assets/css/site.css', '@auto']) ?>
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
