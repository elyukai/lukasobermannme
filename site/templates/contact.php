<?php snippet('layout', slots: true) ?>

<h1 class="scaled"><?= $page->title()->html() ?></h1>

<section>
  <p class="scaled--small">You can find me on multiple platforms! Feel free to use the platform of your choice!</p>
  <dl>
    <dt>E-Mail</dt>
    <dd><a href="mailto:<?= $page->email()->html() ?>"><?= $page->email()->html() ?></a></dd>
    <dt>GitHub</dt>
    <dd><a href="https://github.com/<?= $page->github()->html() ?>"><?= $page->github()->html() ?></a></dd>
    <dt>Twitter</dt>
    <dd><a href="https://twitter.com/<?= $page->twitter()->html() ?>">@<?= $page->twitter()->html() ?></a></dd>
    <?php if ($page->facebook()->isNotEmpty()) : ?>
    <dt>Facebook</dt>
    <dd><a href="https://facebook.com/<?= $page->facebook()->html() ?>"><?= $page->facebook()->html() ?></a></dd>
    <?php endif ?>
  </dl>
</section>
