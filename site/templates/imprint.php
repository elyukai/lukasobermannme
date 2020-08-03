<?php snippet("header") ?>

<div class="title">
  <div class="wrapper">
    <h1><?= $page->title()->html() ?></h1>
  </div>
</div>
<section>
  <div class="wrapper">
    <p>This website is made by:</p>
    <address>
      <strong><?= $page->name()->html() ?></strong><br>
      <?= $page->street()->html() ?> <?= $page->number()->html() ?><br>
      <?= $page->zipcode()->html() ?> <?= $page->city()->html() ?><br>
      <?= $page->country()->html() ?>
    </address>
    <dl>
      <dt>E-Mail</dt>
      <dd><a href="mailto:<?= $page->email()->html() ?>"><?= $page->email()->html() ?></a></dd>
      <dt>Phone</dt>
      <dd><a href="tel:<?= $page->tel()->html() ?>">
        <?php
        $number = $page->tel()->html();
        $strippedPrefix = preg_replace('/\+\d{2}/', '0', $number);
        $addedSpaces = preg_replace('/(\d{5})/', '$1 ', $strippedPrefix, 1);
        echo $addedSpaces ?>
      </a></dd>
    </dl>
  </div>
</section>

<?php snippet("aboutme") ?>

<?php snippet("footer") ?>
