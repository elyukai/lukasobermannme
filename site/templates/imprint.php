<?php snippet("header") ?>

<div class="title">
  <div class="wrapper">
    <h1><?= $page->title()->smartypants() ?></h1>
  </div>
</div>
<section>
  <div class="wrapper">
    <p>This website uses <a href="https://getkirby.com">Kirby</a> and is made by:</p>
    <address>
      <strong><?= $page->name()->smartypants() ?></strong><br>
      <?= $page->street()->smartypants() ?> <?= $page->number()->smartypants() ?><br>
      <?= $page->zipcode()->smartypants() ?> <?= $page->city()->smartypants() ?><br>
      <?= $page->country()->smartypants() ?>
    </address>
    <dl>
      <dt>E-Mail</dt>
      <dd><a href="mailto:<?= $page->email()->html() ?>"><?= $page->email()->smartypants() ?></a></dd>
      <dt>Phone</dt>
      <dd>
        <a href="tel:<?= $page->tel()->html() ?>">
          <?php
          $number = $page->tel()->smartypants();
          $strippedPrefix = preg_replace('/\+\d{2}/', '0', $number);
          $addedSpaces = preg_replace('/(\d{5})/', '$1 ', $strippedPrefix, 1);
          echo $addedSpaces ?>
        </a>
      </dd>
    </dl>
  </div>
</section>

<?php snippet("aboutme") ?>

<?php snippet("footer") ?>
