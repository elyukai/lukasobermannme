  </main>
  <footer>
    <div class="wrapper">
      <nav>
        <ul>
          <?php foreach ($site->children()->listed() as $menuPage): ?>
          <li><a href="<?= $menuPage->url() ?>"><?= $menuPage->title()->html() ?></a></li>
          <?php endforeach ?>
        </ul>
      </nav>
      <ul class="legal">
        <li><a href="/privacy">Privacy Policy</a></li>
        <li><a href="/imprint">Imprint</a></li>
        <li class="copy"><?= $site->copy()->html() ?></li>
      </ul>
    </div>
  </footer>

  <?= js([
    'assets/js/enabled.js',
    'assets/js/slideshow.js',
    '@auto',
  ]) ?>

</body>
</html>
