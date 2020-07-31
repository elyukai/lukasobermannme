<?php snippet("header") ?>

<div class="title">
  <div class="wrapper">
    <h1><?= $page->title()->html() ?></h1>
  </div>
</div>
<section>
  <div class="wrapper">
    <p>You can find me on multiple platforms! Feel free to use the platform of your choice!</p>
    <dl>
      <dt>E-Mail</dt>
      <dd><a href="mailto:<?= $page->email()->html() ?>"><?= $page->email()->html() ?></a></dd>
      <dt>Facebook</dt>
      <dd><a href="https://facebook.com/<?= $page->facebook()->html() ?>"><?= $page->facebook()->html() ?></a></dd>
      <dt>Twitter</dt>
      <dd><a href="https://twitter.com/<?= $page->twitter()->html() ?>">@<?= $page->twitter()->html() ?></a></dd>
      <dt>GitHub</dt>
      <dd><a href="https://github.com/<?= $page->github()->html() ?>"><?= $page->github()->html() ?></a></dd>
    </dl>
  </div>
</section>

<?php snippet("aboutme") ?>

<?php snippet("footer") ?>
