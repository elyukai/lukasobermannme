<figure
  class="gallery aos"
  data-id="main"
  data-tab-list-label="<?= t('Pictures') ?>"
  data-prev-button-label="<?= t('Previous picture') ?>"
  data-next-button-label="<?= t('Next picture') ?>"
  data-tab-panel-role-description="<?= t('Picture') ?>"
  data-tab-panel-label="<?= t('Picture {0} of {1}') ?>"
  data-tab-label="<?= t('Picture {0}') ?>"
  >
  <?php if ($files->count() > 1) : ?>
    <ul>
      <?php foreach ($files as $file) : ?>
        <li id="<?= $file->filename() ?>">
          <?php snippet('galleryElement', ['file' => $file]) ?>
        </li>
      <?php endforeach ?>
    </ul>
    <span class="icon--arrow-left">←</span>
    <span class="icon--arrow-right">→</span>
  <?php else : ?>
    <?php $file = $files->first() ?>
    <?php snippet('galleryElement', ['file' => $file]) ?>
  <?php endif ?>
</figure>
