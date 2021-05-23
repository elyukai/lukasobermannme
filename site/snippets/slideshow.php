<figure id="slideshow">
  <?php if ($files->count() > 1) : ?>
    <ul class="images">
      <?php foreach ($files as $file) : ?>
        <li id="<?= $file->filename() ?>">
          <?php if ($file->type() === "video") : ?>
            <!-- <div class="image image--video image--rect image--outlined"> -->
            <video controls>
              <source src="<?= $file->url() ?>" type="<?= $file->mime() ?>">
            </video>
            <!-- </div> -->
          <?php else : ?>
            <!-- <div class="image image--rect image--outlined"> -->
            <img src="<?= $file->url() ?>" alt="<?= $file->content()->alt() ?>">
            <!-- </div> -->
          <?php endif ?>
        </li>
      <?php endforeach ?>
    </ul>
    <ul class="controls" aria-hidden="true"></ul>
    <button id="slideshow-previous" aria-hidden="true"><?php echo t('previous picture') ?></button>
    <button id="slideshow-next" aria-hidden="true"><?php echo t('next picture') ?></button>
  <?php else : ?>
    <?php
    $file = $files->first();
    if ($file->type() === "video") : ?>
      <!-- <div class="image image--rect image--outlined"> -->
      <video controls>
        <source src="<?= $file->url() ?>" type="<?= $file->mime() ?>">
      </video>
      <!-- </div> -->
    <?php else : ?>
      <!-- <div class="image image--rect image--outlined"> -->
      <img src="<?= $file->url() ?>" alt="<?= $file->content()->alt() ?>">
      <!-- </div> -->
    <?php endif ?>
  <?php endif ?>
</figure>
