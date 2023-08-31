<?php snippet('layout', slots: true) ?>

<h1 class="scaled"><?= $page->title()->html() ?></h1>

<section>
  <p>This website uses <a href="https://getkirby.com">Kirby</a> and is made by:</p>
  <address>
    <strong><?= $page->name()->smartypants() ?></strong><br>
    <?= $page->street()->smartypants() ?> <?= $page->number()->smartypants() ?><br>
    <?= $page->zipcode()->smartypants() ?> <?= $page->city()->smartypants() ?><br>
    <?= $page->country()->smartypants() ?>
  </address>
  <dl>
    <dt>E-Mail</dt>
    <dd><a href="mailto:<?= $page->email()->html() ?>"><?= $page->email()->html() ?></a></dd>
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
</section>
