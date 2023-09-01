<figure id="slideshow">
  <?php if ($files->count() > 1) : ?>
    <ul class="images">
      <?php foreach ($files as $file) : ?>
        <li id="<?= $file->filename() ?>">
          <?php snippet('slideshowElement', ['file' => $file]) ?>
        </li>
      <?php endforeach ?>
    </ul>
    <ul class="controls" aria-hidden="true"></ul>
    <button id="slideshow-previous" aria-hidden="true"><?php echo t('previous picture') ?></button>
    <button id="slideshow-next" aria-hidden="true"><?php echo t('next picture') ?></button>
  <?php else : ?>
    <?php $file = $files->first() ?>
    <?php snippet('slideshowElement', ['file' => $file]) ?>
  <?php endif ?>
</figure>
